<?php

/**
 * DmSentMail form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmSentMailForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormInput(),
      'header'      => new sfWidgetFormTextarea(),
      'description' => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'header'      => new sfValidatorString(array('required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'id'          => new sfValidatorPropelChoice(array('model' => 'DmSentMail', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_sent_mail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmSentMail';
  }


}
