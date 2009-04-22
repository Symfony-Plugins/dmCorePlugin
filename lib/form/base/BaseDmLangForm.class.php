<?php

/**
 * DmLang form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmLangForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormInput(),
      'lang' => new sfWidgetFormInput(),
      'id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorString(array('max_length' => 255)),
      'lang' => new sfValidatorString(array('max_length' => 255)),
      'id'   => new sfValidatorPropelChoice(array('model' => 'DmLang', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmLang', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('dm_lang[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmLang';
  }


}
