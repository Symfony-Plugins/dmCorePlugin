<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmSite filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmSiteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'xiti'               => new sfWidgetFormFilterInput(),
      'xiti_active'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'gdata_key'          => new sfWidgetFormFilterInput(),
      'gmap_key'           => new sfWidgetFormFilterInput(),
      'translation'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'language_test'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'refresh_index'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'jpg_quality'        => new sfWidgetFormFilterInput(),
      'image'              => new sfWidgetFormFilterInput(),
      'is_first_launch'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_working_copy'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'index_populated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'xiti'               => new sfValidatorPass(array('required' => false)),
      'xiti_active'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'gdata_key'          => new sfValidatorPass(array('required' => false)),
      'gmap_key'           => new sfValidatorPass(array('required' => false)),
      'translation'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'language_test'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'refresh_index'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'jpg_quality'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'image'              => new sfValidatorPass(array('required' => false)),
      'is_first_launch'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_working_copy'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'index_populated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dm_site_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmSite';
  }

  public function getFields()
  {
    return array(
      'xiti'               => 'Text',
      'xiti_active'        => 'Boolean',
      'gdata_key'          => 'Text',
      'gmap_key'           => 'Text',
      'translation'        => 'Boolean',
      'language_test'      => 'Boolean',
      'refresh_index'      => 'Boolean',
      'jpg_quality'        => 'Number',
      'image'              => 'Text',
      'is_first_launch'    => 'Boolean',
      'is_working_copy'    => 'Boolean',
      'index_populated_at' => 'Date',
      'updated_at'         => 'Date',
      'id'                 => 'Number',
    );
  }
}
