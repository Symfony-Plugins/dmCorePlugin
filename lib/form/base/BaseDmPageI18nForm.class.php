<?php

/**
 * DmPageI18n form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmPageI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'        => new sfWidgetFormInput(),
      'slug_cache'  => new sfWidgetFormInput(),
      'name'        => new sfWidgetFormInput(),
      'name_cache'  => new sfWidgetFormInput(),
      'title'       => new sfWidgetFormInput(),
      'h1'          => new sfWidgetFormInput(),
      'description' => new sfWidgetFormInput(),
      'id'          => new sfWidgetFormInputHidden(),
      'culture'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slug_cache'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name_cache'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'h1'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'          => new sfValidatorPropelChoice(array('model' => 'DmPage', 'column' => 'id', 'required' => false)),
      'culture'     => new sfValidatorPropelChoice(array('model' => 'DmPageI18n', 'column' => 'culture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_page_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmPageI18n';
  }


}
