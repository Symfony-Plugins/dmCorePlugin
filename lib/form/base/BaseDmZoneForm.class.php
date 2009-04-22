<?php

/**
 * DmZone form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmZoneForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_page_view_id'   => new sfWidgetFormPropelChoice(array('model' => 'DmPageView', 'add_empty' => true)),
      'dm_layout_part_id' => new sfWidgetFormPropelChoice(array('model' => 'DmLayoutPart', 'add_empty' => true)),
      'css_class'         => new sfWidgetFormInput(),
      'rank'              => new sfWidgetFormInput(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'id'                => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'dm_page_view_id'   => new sfValidatorPropelChoice(array('model' => 'DmPageView', 'column' => 'id', 'required' => false)),
      'dm_layout_part_id' => new sfValidatorPropelChoice(array('model' => 'DmLayoutPart', 'column' => 'id', 'required' => false)),
      'css_class'         => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'rank'              => new sfValidatorInteger(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'id'                => new sfValidatorPropelChoice(array('model' => 'DmZone', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_zone[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmZone';
  }


}
