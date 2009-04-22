<?php

/**
 * DmAbbr form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmAbbrForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nanme' => new sfWidgetFormInput(),
      'title' => new sfWidgetFormInput(),
      'id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'nanme' => new sfValidatorString(array('max_length' => 255)),
      'title' => new sfValidatorString(array('max_length' => 255)),
      'id'    => new sfValidatorPropelChoice(array('model' => 'DmAbbr', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmAbbr', 'column' => array('nanme')))
    );

    $this->widgetSchema->setNameFormat('dm_abbr[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmAbbr';
  }


}
