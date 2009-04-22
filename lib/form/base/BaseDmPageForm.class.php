<?php

/**
 * DmPage form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmPageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_page_view_id' => new sfWidgetFormPropelChoice(array('model' => 'DmPageView', 'add_empty' => false)),
      'tree_left'       => new sfWidgetFormInput(),
      'tree_right'      => new sfWidgetFormInput(),
      'tree_parent'     => new sfWidgetFormPropelChoice(array('model' => 'DmPage', 'add_empty' => true)),
      'topic_id'        => new sfWidgetFormInput(),
      'module'          => new sfWidgetFormInput(),
      'action'          => new sfWidgetFormInput(),
      'object_id'       => new sfWidgetFormInput(),
      'is_approved'     => new sfWidgetFormInputCheckbox(),
      'is_public'       => new sfWidgetFormInputCheckbox(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'dm_page_view_id' => new sfValidatorPropelChoice(array('model' => 'DmPageView', 'column' => 'id')),
      'tree_left'       => new sfValidatorInteger(),
      'tree_right'      => new sfValidatorInteger(),
      'tree_parent'     => new sfValidatorPropelChoice(array('model' => 'DmPage', 'column' => 'id', 'required' => false)),
      'topic_id'        => new sfValidatorInteger(array('required' => false)),
      'module'          => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'action'          => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'object_id'       => new sfValidatorInteger(array('required' => false)),
      'is_approved'     => new sfValidatorBoolean(),
      'is_public'       => new sfValidatorBoolean(),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'id'              => new sfValidatorPropelChoice(array('model' => 'DmPage', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmPage', 'column' => array('module', 'action', 'object_id')))
    );

    $this->widgetSchema->setNameFormat('dm_page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmPage';
  }

  public function getI18nModelName()
  {
    return 'DmPageI18n';
  }

  public function getI18nFormClass()
  {
    return 'DmPageI18nForm';
  }

}
