<?php

/**
 * Compresion filter form base class.
 *
 * @package    indago
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCompresionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'compresion' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'compresion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('compresion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Compresion';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'compresion' => 'Text',
    );
  }
}
