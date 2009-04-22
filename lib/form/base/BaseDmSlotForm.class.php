<?php

/**
 * DmSlot form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmSlotForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_zone_id' => new sfWidgetFormPropelChoice(array('model' => 'DmZone', 'add_empty' => false)),
      'type'       => new sfWidgetFormInput(),
      'module'     => new sfWidgetFormInput(),
      'action'     => new sfWidgetFormInput(),
      'value'      => new sfWidgetFormTextarea(),
      'rank'       => new sfWidgetFormInput(),
      'updated_at' => new sfWidgetFormDateTime(),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'dm_zone_id' => new sfValidatorPropelChoice(array('model' => 'DmZone', 'column' => 'id')),
      'type'       => new sfValidatorString(array('max_length' => 127)),
      'module'     => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'action'     => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'value'      => new sfValidatorString(array('required' => false)),
      'rank'       => new sfValidatorInteger(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'id'         => new sfValidatorPropelChoice(array('model' => 'DmSlot', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_slot[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmSlot';
  }


}
