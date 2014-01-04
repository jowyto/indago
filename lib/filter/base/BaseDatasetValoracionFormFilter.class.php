<?php

/**
 * DatasetValoracion filter form base class.
 *
 * @package    indago
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDatasetValoracionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dataset_id' => new sfWidgetFormPropelChoice(array('model' => 'Dataset', 'add_empty' => true)),
      'promedio'   => new sfWidgetFormFilterInput(),
      'nvotos'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'dataset_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Dataset', 'column' => 'id')),
      'promedio'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nvotos'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('dataset_valoracion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DatasetValoracion';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'dataset_id' => 'ForeignKey',
      'promedio'   => 'Number',
      'nvotos'     => 'Number',
    );
  }
}
