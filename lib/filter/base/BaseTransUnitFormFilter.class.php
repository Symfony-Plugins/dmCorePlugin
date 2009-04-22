<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * TransUnit filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTransUnitFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cat_id'      => new sfWidgetFormPropelChoice(array('model' => 'Catalogue', 'add_empty' => true)),
      'source'      => new sfWidgetFormFilterInput(),
      'target'      => new sfWidgetFormFilterInput(),
      'meta'        => new sfWidgetFormFilterInput(),
      'is_approved' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'cat_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Catalogue', 'column' => 'cat_id')),
      'source'      => new sfValidatorPass(array('required' => false)),
      'target'      => new sfValidatorPass(array('required' => false)),
      'meta'        => new sfValidatorPass(array('required' => false)),
      'is_approved' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('trans_unit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransUnit';
  }

  public function getFields()
  {
    return array(
      'msg_id'      => 'Number',
      'cat_id'      => 'ForeignKey',
      'source'      => 'Text',
      'target'      => 'Text',
      'meta'        => 'Text',
      'is_approved' => 'Boolean',
    );
  }
}
