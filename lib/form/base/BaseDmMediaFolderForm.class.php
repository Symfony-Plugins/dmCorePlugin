<?php

/**
 * DmMediaFolder form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmMediaFolderForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'           => new sfWidgetFormInput(),
      'tree_left'     => new sfWidgetFormInput(),
      'tree_right'    => new sfWidgetFormInput(),
      'tree_parent'   => new sfWidgetFormPropelChoice(array('model' => 'DmMediaFolder', 'add_empty' => true)),
      'topic_id'      => new sfWidgetFormInput(),
      'relative_path' => new sfWidgetFormInput(),
      'id'            => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'nom'           => new sfValidatorString(array('max_length' => 255)),
      'tree_left'     => new sfValidatorInteger(),
      'tree_right'    => new sfValidatorInteger(),
      'tree_parent'   => new sfValidatorPropelChoice(array('model' => 'DmMediaFolder', 'column' => 'id', 'required' => false)),
      'topic_id'      => new sfValidatorInteger(array('required' => false)),
      'relative_path' => new sfValidatorString(array('max_length' => 255)),
      'id'            => new sfValidatorPropelChoice(array('model' => 'DmMediaFolder', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmMediaFolder', 'column' => array('relative_path')))
    );

    $this->widgetSchema->setNameFormat('dm_media_folder[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmMediaFolder';
  }


}
