<?php

class checkElasticaTask extends sfBaseTask
{
	protected function configure()
	{
		// // add your own arguments here
		// $this->addArguments(array(
		//   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
		// ));

		$this->addOptions(array(
			new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
			new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
			new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
			// add your own options here
			));

		$this->namespace        = '';
		$this->name             = 'checkElastica';
		$this->briefDescription = '';
		$this->detailedDescription = <<<EOF
		[checkElastica|INFO] verifica que el indice de ElasticSearch tenga todos los datasets.

		[php symfony checkElastica|INFO]
EOF;
	}

	protected function execute($arguments = array(), $options = array())
	{
		// initialize the database connection
		$databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'])->getConnection();

		$datasets = DatasetQuery::create()->find();
		$elastic = sfElasticSearch::getInstance();
		
		if(!$elastic->getStatus()->indexExists('datasets'))
			$index = $elastic->getIndex('datasets')->create();
		else{
			$index = $elastic->getIndex('datasets');
		}

		$type = $index->getType('dataset');
		
		foreach ($datasets as $dataset) {
			// si no existe el dataset en el indice
			$idsFilter = new Elastica_Filter_Ids($type, array($dataset->getId()));
			$query = Elastica_Query::create($idsFilter);
			$result = $type->search($query);

			//var_dump($result);

			if( !$result->count() ){
				// lo agregamos
				$doc = new Elastica_Document($dataset->getId(), $dataset->toArray());
				$type->addDocument($doc);
				$index->refresh();
				echo 'documento creado';
			}
		}
	}
}
