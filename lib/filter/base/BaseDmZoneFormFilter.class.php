<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmZone filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmZoneFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_page_view_id'   => new sfWidgetFormPropelChoice(array('model' => 'DmPageView', 'add_empty' => true)),
      'dm_layout_part_id' => new sfWidgetFormPropelChoice(array('model' => 'DmLayoutPart', 'add_empty' => true)),
      'css_class'         => new sfWidgetFormFilterInput(),
      'rank'              => new sfWidgetFormFilterInput(),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'dm_page_view_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmPageView', 'column' => 'id')),
      'dm_layout_part_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmLayoutPart', 'column' => 'id')),
      'css_class'         => new sfValidatorPass(array('required' => false)),
      'rank'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dm_zone_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmZone';
  }

  public function getFields()
  {
    return array(
      'dm_page_view_id'   => 'ForeignKey',
      'dm_layout_part_id' => 'ForeignKey',
      'css_class'         => 'Text',
      'rank'              => 'Number',
      'updated_at'        => 'Date',
      'id'                => 'Number',
    );
  }
}
