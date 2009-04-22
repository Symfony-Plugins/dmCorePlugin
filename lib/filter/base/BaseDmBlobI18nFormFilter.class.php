<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmBlobI18n filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmBlobI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(),
      'text'             => new sfWidgetFormFilterInput(),
      'dm_media_file_id' => new sfWidgetFormPropelChoice(array('model' => 'DmMediaFile', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'text'             => new sfValidatorPass(array('required' => false)),
      'dm_media_file_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmMediaFile', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dm_blob_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmBlobI18n';
  }

  public function getFields()
  {
    return array(
      'name'             => 'Text',
      'text'             => 'Text',
      'dm_media_file_id' => 'ForeignKey',
      'id'               => 'ForeignKey',
      'culture'          => 'Text',
    );
  }
}
