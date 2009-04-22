<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmRef filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmRefFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'module' => new sfWidgetFormFilterInput(),
      'action' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'module' => new sfValidatorPass(array('required' => false)),
      'action' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_ref_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmRef';
  }

  public function getFields()
  {
    return array(
      'module' => 'Text',
      'action' => 'Text',
      'id'     => 'Number',
    );
  }
}
