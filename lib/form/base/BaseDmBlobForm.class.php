<?php

/**
 * DmBlob form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmBlobForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'style'          => new sfWidgetFormInput(),
      'jpg_quality'    => new sfWidgetFormInput(),
      'title_position' => new sfWidgetFormInput(),
      'image_position' => new sfWidgetFormInput(),
      'image_width'    => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'id'             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'style'          => new sfValidatorString(array('max_length' => 31)),
      'jpg_quality'    => new sfValidatorString(array('max_length' => 31)),
      'title_position' => new sfValidatorString(array('max_length' => 31)),
      'image_position' => new sfValidatorString(array('max_length' => 31)),
      'image_width'    => new sfValidatorInteger(),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'id'             => new sfValidatorPropelChoice(array('model' => 'DmBlob', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_blob[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmBlob';
  }

  public function getI18nModelName()
  {
    return 'DmBlobI18n';
  }

  public function getI18nFormClass()
  {
    return 'DmBlobI18nForm';
  }

}
