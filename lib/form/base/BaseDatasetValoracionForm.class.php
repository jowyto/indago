<?php

/**
 * DatasetValoracion form base class.
 *
 * @method DatasetValoracion getObject() Returns the current form's model object
 *
 * @package    indago
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDatasetValoracionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'dataset_id' => new sfWidgetFormPropelChoice(array('model' => 'Dataset', 'add_empty' => true)),
      'promedio'   => new sfWidgetFormInputText(),
      'nvotos'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'dataset_id' => new sfValidatorPropelChoice(array('model' => 'Dataset', 'column' => 'id', 'required' => false)),
      'promedio'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'nvotos'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dataset_valoracion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DatasetValoracion';
  }


}
