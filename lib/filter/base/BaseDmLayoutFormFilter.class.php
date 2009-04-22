<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmLayout filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmLayoutFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(),
      'has_head'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'has_foot'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'has_left'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'has_right'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'css_class'  => new sfWidgetFormFilterInput(),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'has_head'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'has_foot'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'has_left'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'has_right'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'css_class'  => new sfValidatorPass(array('required' => false)),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dm_layout_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmLayout';
  }

  public function getFields()
  {
    return array(
      'name'       => 'Text',
      'has_head'   => 'Boolean',
      'has_foot'   => 'Boolean',
      'has_left'   => 'Boolean',
      'has_right'  => 'Boolean',
      'css_class'  => 'Text',
      'updated_at' => 'Date',
      'id'         => 'Number',
    );
  }
}
