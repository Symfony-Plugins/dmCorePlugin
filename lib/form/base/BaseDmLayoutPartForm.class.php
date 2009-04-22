<?php

/**
 * DmLayoutPart form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmLayoutPartForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_layout_id' => new sfWidgetFormPropelChoice(array('model' => 'DmLayout', 'add_empty' => false)),
      'type'         => new sfWidgetFormInput(),
      'id'           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'dm_layout_id' => new sfValidatorPropelChoice(array('model' => 'DmLayout', 'column' => 'id')),
      'type'         => new sfValidatorString(array('max_length' => 31)),
      'id'           => new sfValidatorPropelChoice(array('model' => 'DmLayoutPart', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmLayoutPart', 'column' => array('dm_layout_id', 'type')))
    );

    $this->widgetSchema->setNameFormat('dm_layout_part[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmLayoutPart';
  }


}
