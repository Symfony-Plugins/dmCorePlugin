<?php

/**
 * DmAutoSeoI18n form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmAutoSeoI18nForm extends BaseFormPropel
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
      'slug'        => new sfValidatorString(array('max_length' => 255)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'h1'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'strip_words' => new sfValidatorString(array('max_length' => 255)),
      'id'          => new sfValidatorPropelChoice(array('model' => 'DmAutoSeo', 'column' => 'id', 'required' => false)),
      'culture'     => new sfValidatorPropelChoice(array('model' => 'DmAutoSeoI18n', 'column' => 'culture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_auto_seo_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmAutoSeoI18n';
  }


}
