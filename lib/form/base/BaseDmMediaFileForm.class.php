<?php

/**
 * DmMediaFile form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmMediaFileForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_media_folder_id' => new sfWidgetFormPropelChoice(array('model' => 'DmMediaFolder', 'add_empty' => false)),
      'nom'                => new sfWidgetFormInput(),
      'description'        => new sfWidgetFormTextarea(),
      'legend'             => new sfWidgetFormInput(),
      'author'             => new sfWidgetFormInput(),
      'copyright'          => new sfWidgetFormInput(),
      'type'               => new sfWidgetFormInput(),
      'filesize'           => new sfWidgetFormInput(),
      'dim'                => new sfWidgetFormInput(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'id'                 => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'dm_media_folder_id' => new sfValidatorPropelChoice(array('model' => 'DmMediaFolder', 'column' => 'id')),
      'nom'                => new sfValidatorString(array('max_length' => 255)),
      'description'        => new sfValidatorString(array('required' => false)),
      'legend'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'author'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'copyright'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'type'               => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'filesize'           => new sfValidatorInteger(array('required' => false)),
      'dim'                => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'id'                 => new sfValidatorPropelChoice(array('model' => 'DmMediaFile', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DmMediaFile', 'column' => array('dm_media_folder_id', 'nom')))
    );

    $this->widgetSchema->setNameFormat('dm_media_file[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmMediaFile';
  }


}
