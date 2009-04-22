<?php

/**
 * DmRef form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseDmRefForm extends BaseFormPropel
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
      'id'     => new sfValidatorPropelChoice(array('model' => 'DmRef', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmRef', 'column' => array('module', 'action')))
    );

    $this->widgetSchema->setNameFormat('dm_ref[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmRef';
  }

  public function getI18nModelName()
  {
    return 'DmRefI18n';
  }

  public function getI18nFormClass()
  {
    return 'DmRefI18nForm';
  }

}
