<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmSession filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmSessionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sess_id'          => new sfWidgetFormFilterInput(),
      'last_time'        => new sfWidgetFormFilterInput(),
      'arrival_time'     => new sfWidgetFormFilterInput(),
      'ip'               => new sfWidgetFormFilterInput(),
      'address'          => new sfWidgetFormFilterInput(),
      'dm_profile_id'    => new sfWidgetFormPropelChoice(array('model' => 'DmProfile', 'add_empty' => true)),
      'dm_page_id'       => new sfWidgetFormPropelChoice(array('model' => 'DmPage', 'add_empty' => true)),
      'url'              => new sfWidgetFormFilterInput(),
      'nb_pages'         => new sfWidgetFormFilterInput(),
      'browser_name'     => new sfWidgetFormFilterInput(),
      'browser_version'  => new sfWidgetFormFilterInput(),
      'platform'         => new sfWidgetFormFilterInput(),
      'is_crawler'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_rss_reader'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_banned'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_mobile_device' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'user_agent'       => new sfWidgetFormFilterInput(),
      'status_code'      => new sfWidgetFormFilterInput(),
      'content_type'     => new sfWidgetFormFilterInput(),
      'content_length'   => new sfWidgetFormFilterInput(),
      'time'             => new sfWidgetFormFilterInput(),
      'history'          => new sfWidgetFormFilterInput(),
      'is_cached'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'sess_id'          => new sfValidatorPass(array('required' => false)),
      'last_time'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'arrival_time'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ip'               => new sfValidatorPass(array('required' => false)),
      'address'          => new sfValidatorPass(array('required' => false)),
      'dm_profile_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmProfile', 'column' => 'id')),
      'dm_page_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmPage', 'column' => 'id')),
      'url'              => new sfValidatorPass(array('required' => false)),
      'nb_pages'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'browser_name'     => new sfValidatorPass(array('required' => false)),
      'browser_version'  => new sfValidatorPass(array('required' => false)),
      'platform'         => new sfValidatorPass(array('required' => false)),
      'is_crawler'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_rss_reader'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_banned'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_mobile_device' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'user_agent'       => new sfValidatorPass(array('required' => false)),
      'status_code'      => new sfValidatorPass(array('required' => false)),
      'content_type'     => new sfValidatorPass(array('required' => false)),
      'content_length'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'history'          => new sfValidatorPass(array('required' => false)),
      'is_cached'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('dm_session_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmSession';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sess_id'          => 'Text',
      'last_time'        => 'Number',
      'arrival_time'     => 'Number',
      'ip'               => 'Text',
      'address'          => 'Text',
      'dm_profile_id'    => 'ForeignKey',
      'dm_page_id'       => 'ForeignKey',
      'url'              => 'Text',
      'nb_pages'         => 'Number',
      'browser_name'     => 'Text',
      'browser_version'  => 'Text',
      'platform'         => 'Text',
      'is_crawler'       => 'Boolean',
      'is_rss_reader'    => 'Boolean',
      'is_banned'        => 'Boolean',
      'is_mobile_device' => 'Boolean',
      'user_agent'       => 'Text',
      'status_code'      => 'Text',
      'content_type'     => 'Text',
      'content_length'   => 'Number',
      'time'             => 'Number',
      'history'          => 'Text',
      'is_cached'        => 'Boolean',
    );
  }
}
