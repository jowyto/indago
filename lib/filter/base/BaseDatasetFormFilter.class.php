<?php

/**
 * Dataset filter form base class.
 *
 * @package    indago
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDatasetFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dataset'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'   => new sfWidgetFormFilterInput(),
      'tags'          => new sfWidgetFormFilterInput(),
      'formato_id'    => new sfWidgetFormPropelChoice(array('model' => 'Formato', 'add_empty' => true)),
      'compresion_id' => new sfWidgetFormPropelChoice(array('model' => 'Compresion', 'add_empty' => true)),
      'cabeceras'     => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'dataset'       => new sfValidatorPass(array('required' => false)),
      'url'           => new sfValidatorPass(array('required' => false)),
      'descripcion'   => new sfValidatorPass(array('required' => false)),
      'tags'          => new sfValidatorPass(array('required' => false)),
      'formato_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Formato', 'column' => 'id')),
      'compresion_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Compresion', 'column' => 'id')),
      'cabeceras'     => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dataset_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dataset';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'dataset'       => 'Text',
      'url'           => 'Text',
      'descripcion'   => 'Text',
      'tags'          => 'Text',
      'formato_id'    => 'ForeignKey',
      'compresion_id' => 'ForeignKey',
      'cabeceras'     => 'Text',
      'created_at'    => 'Date',
    );
  }
}
