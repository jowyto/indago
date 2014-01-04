<?php

/**
 * Dataset form base class.
 *
 * @method Dataset getObject() Returns the current form's model object
 *
 * @package    indago
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDatasetForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'dataset'       => new sfWidgetFormInputText(),
      'url'           => new sfWidgetFormTextarea(),
      'descripcion'   => new sfWidgetFormTextarea(),
      'tags'          => new sfWidgetFormTextarea(),
      'formato_id'    => new sfWidgetFormPropelChoice(array('model' => 'Formato', 'add_empty' => true)),
      'compresion_id' => new sfWidgetFormPropelChoice(array('model' => 'Compresion', 'add_empty' => true)),
      'cabeceras'     => new sfWidgetFormTextarea(),
      'created_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'dataset'       => new sfValidatorString(array('max_length' => 255)),
      'url'           => new sfValidatorString(),
      'descripcion'   => new sfValidatorString(array('required' => false)),
      'tags'          => new sfValidatorString(array('required' => false)),
      'formato_id'    => new sfValidatorPropelChoice(array('model' => 'Formato', 'column' => 'id', 'required' => false)),
      'compresion_id' => new sfValidatorPropelChoice(array('model' => 'Compresion', 'column' => 'id', 'required' => false)),
      'cabeceras'     => new sfValidatorString(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dataset[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dataset';
  }


}
