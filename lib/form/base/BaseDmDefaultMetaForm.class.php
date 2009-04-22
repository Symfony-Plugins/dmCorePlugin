<?php

/**
 * DmDefaultMeta form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmDefaultMetaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title_prefix'       => new sfWidgetFormInput(),
      'title_suffix'       => new sfWidgetFormInput(),
      'description_prefix' => new sfWidgetFormInput(),
      'description_suffix' => new sfWidgetFormInput(),
      'is_approved'        => new sfWidgetFormInputCheckbox(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'id'                 => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'title_prefix'       => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'title_suffix'       => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'description_prefix' => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'description_suffix' => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'is_approved'        => new sfValidatorBoolean(),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'id'                 => new sfValidatorPropelChoice(array('model' => 'DmDefaultMeta', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_default_meta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmDefaultMeta';
  }


}
