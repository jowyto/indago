<?php

/**
* dataset actions.
*
* @package    indago
* @subpackage dataset
* @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class datasetActions extends sfActions
{
	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex(sfWebRequest $request)
	{
		$this->forward('default', 'module');
	}

	public function executePreview(sfWebRequest $request){
		$this->forward404Unless($id = $request->getParameter('id'));
		$this->dataset = DatasetQuery::create()->findPk($id);
	}

	public function executeDetalle(sfWebRequest $request){
		$this->forward404Unless($id = $request->getParameter('id'));
		$this->dataset = DatasetQuery::create()->findPk($id);	
	}

	public function executeValorizador(sfWebRequest $request){
		$this->forward404Unless($id = $request->getParameter('idBox'));
		$this->forward404Unless($id = $request->getParameter('rate'));

		$id = intval( $request->getParameter('idBox') );
		$rate = floatval( $request->getParameter('rate') );

		$val = DatasetValoracionQuery::create()->filterByDatasetId($id)->findOneOrCreate();

		$val->addVoto($rate)->save();

		return $this->renderText(json_encode(array('status'=>1)));
	}
}
