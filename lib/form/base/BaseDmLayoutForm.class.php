<?php

/**
 * DmLayout form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmLayoutForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormInput(),
      'has_head'   => new sfWidgetFormInputCheckbox(),
      'has_foot'   => new sfWidgetFormInputCheckbox(),
      'has_left'   => new sfWidgetFormInputCheckbox(),
      'has_right'  => new sfWidgetFormInputCheckbox(),
      'css_class'  => new sfWidgetFormInput(),
      'updated_at' => new sfWidgetFormDateTime(),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorString(array('max_length' => 127)),
      'has_head'   => new sfValidatorBoolean(),
      'has_foot'   => new sfValidatorBoolean(),
      'has_left'   => new sfValidatorBoolean(),
      'has_right'  => new sfValidatorBoolean(),
      'css_class'  => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'id'         => new sfValidatorPropelChoice(array('model' => 'DmLayout', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmLayout', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('dm_layout[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmLayout';
  }


}
