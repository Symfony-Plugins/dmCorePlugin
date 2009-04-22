<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmPage filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmPageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_page_view_id' => new sfWidgetFormPropelChoice(array('model' => 'DmPageView', 'add_empty' => true)),
      'tree_left'       => new sfWidgetFormFilterInput(),
      'tree_right'      => new sfWidgetFormFilterInput(),
      'tree_parent'     => new sfWidgetFormPropelChoice(array('model' => 'DmPage', 'add_empty' => true)),
      'topic_id'        => new sfWidgetFormFilterInput(),
      'module'          => new sfWidgetFormFilterInput(),
      'action'          => new sfWidgetFormFilterInput(),
      'object_id'       => new sfWidgetFormFilterInput(),
      'is_approved'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_public'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'dm_page_view_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmPageView', 'column' => 'id')),
      'tree_left'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tree_right'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tree_parent'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmPage', 'column' => 'id')),
      'topic_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'module'          => new sfValidatorPass(array('required' => false)),
      'action'          => new sfValidatorPass(array('required' => false)),
      'object_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_approved'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_public'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dm_page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmPage';
  }

  public function getFields()
  {
    return array(
      'dm_page_view_id' => 'ForeignKey',
      'tree_left'       => 'Number',
      'tree_right'      => 'Number',
      'tree_parent'     => 'ForeignKey',
      'topic_id'        => 'Number',
      'module'          => 'Text',
      'action'          => 'Text',
      'object_id'       => 'Number',
      'is_approved'     => 'Boolean',
      'is_public'       => 'Boolean',
      'updated_at'      => 'Date',
      'id'              => 'Number',
    );
  }
}
