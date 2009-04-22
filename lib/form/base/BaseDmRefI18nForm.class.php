<?php

/**
 * DmRefI18n form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseDmRefI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'        => new sfWidgetFormInput(),
      'name'        => new sfWidgetFormInput(),
      'title'       => new sfWidgetFormInput(),
      'h1'          => new sfWidgetFormInput(),
      'description' => new sfWidgetFormInput(),
      'strip_words' => new sfWidgetFormInput(),
      'id'          => new sfWidgetFormInputHidden(),
      'culture'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'slug'        => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'h1'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'strip_words' => new sfValidatorString(array('max_length' => 255)),
      'id'          => new sfValidatorPropelChoice(array('model' => 'DmRef', 'column' => 'id', 'required' => false)),
      'culture'     => new sfValidatorPropelChoice(array('model' => 'DmRefI18n', 'column' => 'culture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_ref_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmRefI18n';
  }


}
