<?php

/**
 * DmSession form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmSessionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sess_id'          => new sfWidgetFormInput(),
      'last_time'        => new sfWidgetFormInput(),
      'arrival_time'     => new sfWidgetFormInput(),
      'ip'               => new sfWidgetFormInput(),
      'address'          => new sfWidgetFormTextarea(),
      'dm_profile_id'    => new sfWidgetFormPropelChoice(array('model' => 'DmProfile', 'add_empty' => true)),
      'dm_page_id'       => new sfWidgetFormPropelChoice(array('model' => 'DmPage', 'add_empty' => true)),
      'url'              => new sfWidgetFormInput(),
      'nb_pages'         => new sfWidgetFormInput(),
      'browser_name'     => new sfWidgetFormInput(),
      'browser_version'  => new sfWidgetFormInput(),
      'platform'         => new sfWidgetFormInput(),
      'is_crawler'       => new sfWidgetFormInputCheckbox(),
      'is_rss_reader'    => new sfWidgetFormInputCheckbox(),
      'is_banned'        => new sfWidgetFormInputCheckbox(),
      'is_mobile_device' => new sfWidgetFormInputCheckbox(),
      'user_agent'       => new sfWidgetFormInput(),
      'status_code'      => new sfWidgetFormInput(),
      'content_type'     => new sfWidgetFormInput(),
      'content_length'   => new sfWidgetFormInput(),
      'time'             => new sfWidgetFormInput(),
      'history'          => new sfWidgetFormTextarea(),
      'is_cached'        => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'DmSession', 'column' => 'id', 'required' => false)),
      'sess_id'          => new sfValidatorString(array('max_length' => 127)),
      'last_time'        => new sfValidatorInteger(),
      'arrival_time'     => new sfValidatorInteger(),
      'ip'               => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'address'          => new sfValidatorString(array('required' => false)),
      'dm_profile_id'    => new sfValidatorPropelChoice(array('model' => 'DmProfile', 'column' => 'id', 'required' => false)),
      'dm_page_id'       => new sfValidatorPropelChoice(array('model' => 'DmPage', 'column' => 'id', 'required' => false)),
      'url'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nb_pages'         => new sfValidatorInteger(),
      'browser_name'     => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'browser_version'  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'platform'         => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'is_crawler'       => new sfValidatorBoolean(),
      'is_rss_reader'    => new sfValidatorBoolean(),
      'is_banned'        => new sfValidatorBoolean(),
      'is_mobile_device' => new sfValidatorBoolean(),
      'user_agent'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status_code'      => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'content_type'     => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'content_length'   => new sfValidatorInteger(array('required' => false)),
      'time'             => new sfValidatorInteger(array('required' => false)),
      'history'          => new sfValidatorString(array('required' => false)),
      'is_cached'        => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmSession', 'column' => array('sess_id')))
    );

    $this->widgetSchema->setNameFormat('dm_session[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmSession';
  }


}
