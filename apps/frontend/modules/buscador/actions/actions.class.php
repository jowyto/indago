<?php

/**
* buscador actions.
*
* @package    indago
* @subpackage buscador
* @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class buscadorActions extends sfActions
{
	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex(sfWebRequest $request)
	{

	}

	public function executeNuevo(sfWebRequest $request){
		$this->form = new DatasetNuevoForm();

		if($request->isMethod('post')){
			$this->form->bind(
				$request->getParameter($this->form->getName()),
				$request->getFiles($this->form->getName())
				);

			if ($this->form->isValid()){
				$dataset = $this->form->save();
				return $this->renderPartial('nuevosuccess');
			}
		}
	}

	public function executeBuscar(sfWebRequest $request){
		$elastic = sfElasticSearch::getInstance();
		
		if(!$elastic->getStatus()->indexExists('datasets'))
			$index = $elastic->getIndex('datasets')->create();
		else{
			$index = $elastic->getIndex('datasets');
		}

		$query = $this->limpiaQuery($request->getParameter('query'));
		// echo '<pre>'; var_dump($query); echo '</pre>'; return;

		if($query){
			$queryString = new Elastica_Query_QueryString( $query );
			$queryObject = new Elastica_Query($queryString);
			$resultSet = $index->search($queryObject);

			$salida = array();
			foreach ($resultSet as $result) {
				$dataset = new Dataset();
				$dataset->fromArray($result->getSource());
				$salida[] = array('id'=>$dataset->getId(), 'value'=>$dataset->getDataset());
			}
		}
		
		if(!$query || !$salida)
			$salida = array(array('id'=>0, 'value'=>'No hay resultados'));

		return $this->renderText( $request->getParameter('callback').'('.json_encode($salida).')' );
	}

	private function limpiaQuery($query){
		$elim = array("a","ante","con","de","en","para","por","sin","sobre","tras","y","e","o","u");

		$query = strtolower(trim($query));
		$query = explode(' ', $query);
		$query = array_diff($query, $elim);
		$query = implode('~ ', $query);
		//if($query && substr($query, -1)!='~') $query .= '~*';
		$query .= '~';
		return $query;
	}
}
