<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmSlot filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmSlotFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_zone_id' => new sfWidgetFormPropelChoice(array('model' => 'DmZone', 'add_empty' => true)),
      'type'       => new sfWidgetFormFilterInput(),
      'module'     => new sfWidgetFormFilterInput(),
      'action'     => new sfWidgetFormFilterInput(),
      'value'      => new sfWidgetFormFilterInput(),
      'rank'       => new sfWidgetFormFilterInput(),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'dm_zone_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmZone', 'column' => 'id')),
      'type'       => new sfValidatorPass(array('required' => false)),
      'module'     => new sfValidatorPass(array('required' => false)),
      'action'     => new sfValidatorPass(array('required' => false)),
      'value'      => new sfValidatorPass(array('required' => false)),
      'rank'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dm_slot_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmSlot';
  }

  public function getFields()
  {
    return array(
      'dm_zone_id' => 'ForeignKey',
      'type'       => 'Text',
      'module'     => 'Text',
      'action'     => 'Text',
      'value'      => 'Text',
      'rank'       => 'Number',
      'updated_at' => 'Date',
      'id'         => 'Number',
    );
  }
}
