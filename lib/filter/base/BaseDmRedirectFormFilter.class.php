<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmRedirect filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmRedirectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'source' => new sfWidgetFormFilterInput(),
      'dest'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'source' => new sfValidatorPass(array('required' => false)),
      'dest'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_redirect_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmRedirect';
  }

  public function getFields()
  {
    return array(
      'source' => 'Text',
      'dest'   => 'Text',
      'id'     => 'Number',
    );
  }
}
