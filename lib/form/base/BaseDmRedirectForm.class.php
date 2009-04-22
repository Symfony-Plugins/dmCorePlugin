<?php

/**
 * DmRedirect form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmRedirectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'source' => new sfWidgetFormInput(),
      'dest'   => new sfWidgetFormInput(),
      'id'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'source' => new sfValidatorString(array('max_length' => 255)),
      'dest'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'     => new sfValidatorPropelChoice(array('model' => 'DmRedirect', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmRedirect', 'column' => array('source')))
    );

    $this->widgetSchema->setNameFormat('dm_redirect[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmRedirect';
  }


}
