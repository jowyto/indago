<?php

/**
 * Formato filter form base class.
 *
 * @package    indago
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFormatoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'formato' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'formato' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('formato_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Formato';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'formato' => 'Text',
    );
  }
}
