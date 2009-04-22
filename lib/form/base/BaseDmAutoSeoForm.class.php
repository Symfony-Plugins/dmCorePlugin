<?php

/**
 * DmAutoSeo form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmAutoSeoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'module' => new sfWidgetFormInput(),
      'action' => new sfWidgetFormInput(),
      'id'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'module' => new sfValidatorString(array('max_length' => 127)),
      'action' => new sfValidatorString(array('max_length' => 127)),
      'id'     => new sfValidatorPropelChoice(array('model' => 'DmAutoSeo', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmAutoSeo', 'column' => array('module', 'action')))
    );

    $this->widgetSchema->setNameFormat('dm_auto_seo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmAutoSeo';
  }

  public function getI18nModelName()
  {
    return 'DmAutoSeoI18n';
  }

  public function getI18nFormClass()
  {
    return 'DmAutoSeoI18nForm';
  }

}
