<?php

/**
 * DmBlobI18n form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmBlobI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormInput(),
      'text'             => new sfWidgetFormTextarea(),
      'dm_media_file_id' => new sfWidgetFormPropelChoice(array('model' => 'DmMediaFile', 'add_empty' => true)),
      'id'               => new sfWidgetFormInputHidden(),
      'culture'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'text'             => new sfValidatorString(array('required' => false)),
      'dm_media_file_id' => new sfValidatorPropelChoice(array('model' => 'DmMediaFile', 'column' => 'id', 'required' => false)),
      'id'               => new sfValidatorPropelChoice(array('model' => 'DmBlob', 'column' => 'id', 'required' => false)),
      'culture'          => new sfValidatorPropelChoice(array('model' => 'DmBlobI18n', 'column' => 'culture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_blob_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmBlobI18n';
  }


}
