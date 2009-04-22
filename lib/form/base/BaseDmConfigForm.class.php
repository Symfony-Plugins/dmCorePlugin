<?php

/**
 * DmConfig form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseDmConfigForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'xiti'                => new sfWidgetFormTextarea(),
      'xiti_active'         => new sfWidgetFormInputCheckbox(),
      'gdata_key'           => new sfWidgetFormInput(),
      'gmap_key'            => new sfWidgetFormInput(),
      'translation'         => new sfWidgetFormInputCheckbox(),
      'language_test'       => new sfWidgetFormInputCheckbox(),
      'refresh_index'       => new sfWidgetFormInputCheckbox(),
      'jpg_quality'         => new sfWidgetFormInput(),
      'image'               => new sfWidgetFormInput(),
      'is_first_launch'     => new sfWidgetFormInputCheckbox(),
      'external_link_blank' => new sfWidgetFormInputCheckbox(),
      'is_working_copy'     => new sfWidgetFormInputCheckbox(),
      'index_populated_at'  => new sfWidgetFormDate(),
      'index_optimized_at'  => new sfWidgetFormDate(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'id'                  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'xiti'                => new sfValidatorString(array('required' => false)),
      'xiti_active'         => new sfValidatorBoolean(),
      'gdata_key'           => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'gmap_key'            => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'translation'         => new sfValidatorBoolean(),
      'language_test'       => new sfValidatorBoolean(),
      'refresh_index'       => new sfValidatorBoolean(),
      'jpg_quality'         => new sfValidatorInteger(),
      'image'               => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'is_first_launch'     => new sfValidatorBoolean(),
      'external_link_blank' => new sfValidatorBoolean(),
      'is_working_copy'     => new sfValidatorBoolean(),
      'index_populated_at'  => new sfValidatorDate(array('required' => false)),
      'index_optimized_at'  => new sfValidatorDate(array('required' => false)),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
      'id'                  => new sfValidatorPropelChoice(array('model' => 'DmConfig', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_config[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmConfig';
  }

  public function getI18nModelName()
  {
    return 'DmConfigI18n';
  }

  public function getI18nFormClass()
  {
    return 'DmConfigI18nForm';
  }

}
