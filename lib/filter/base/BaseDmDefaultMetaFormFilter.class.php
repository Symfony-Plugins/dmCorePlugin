<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmDefaultMeta filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmDefaultMetaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title_prefix'       => new sfWidgetFormFilterInput(),
      'title_suffix'       => new sfWidgetFormFilterInput(),
      'description_prefix' => new sfWidgetFormFilterInput(),
      'description_suffix' => new sfWidgetFormFilterInput(),
      'is_approved'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'title_prefix'       => new sfValidatorPass(array('required' => false)),
      'title_suffix'       => new sfValidatorPass(array('required' => false)),
      'description_prefix' => new sfValidatorPass(array('required' => false)),
      'description_suffix' => new sfValidatorPass(array('required' => false)),
      'is_approved'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dm_default_meta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmDefaultMeta';
  }

  public function getFields()
  {
    return array(
      'title_prefix'       => 'Text',
      'title_suffix'       => 'Text',
      'description_prefix' => 'Text',
      'description_suffix' => 'Text',
      'is_approved'        => 'Boolean',
      'updated_at'         => 'Date',
      'id'                 => 'Number',
    );
  }
}
