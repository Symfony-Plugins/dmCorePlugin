<?php

/**
 * DmPageView form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmPageViewForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_layout_id' => new sfWidgetFormPropelChoice(array('model' => 'DmLayout', 'add_empty' => false)),
      'id'           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'dm_layout_id' => new sfValidatorPropelChoice(array('model' => 'DmLayout', 'column' => 'id')),
      'id'           => new sfValidatorPropelChoice(array('model' => 'DmPageView', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_page_view[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmPageView';
  }


}
