<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmAbbr filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmAbbrFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nanme' => new sfWidgetFormFilterInput(),
      'title' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nanme' => new sfValidatorPass(array('required' => false)),
      'title' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_abbr_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmAbbr';
  }

  public function getFields()
  {
    return array(
      'nanme' => 'Text',
      'title' => 'Text',
      'id'    => 'Number',
    );
  }
}
