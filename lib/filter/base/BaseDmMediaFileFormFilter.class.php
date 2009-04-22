<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmMediaFile filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmMediaFileFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_media_folder_id' => new sfWidgetFormPropelChoice(array('model' => 'DmMediaFolder', 'add_empty' => true)),
      'nom'                => new sfWidgetFormFilterInput(),
      'description'        => new sfWidgetFormFilterInput(),
      'legend'             => new sfWidgetFormFilterInput(),
      'author'             => new sfWidgetFormFilterInput(),
      'copyright'          => new sfWidgetFormFilterInput(),
      'type'               => new sfWidgetFormFilterInput(),
      'filesize'           => new sfWidgetFormFilterInput(),
      'dim'                => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'dm_media_folder_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmMediaFolder', 'column' => 'id')),
      'nom'                => new sfValidatorPass(array('required' => false)),
      'description'        => new sfValidatorPass(array('required' => false)),
      'legend'             => new sfValidatorPass(array('required' => false)),
      'author'             => new sfValidatorPass(array('required' => false)),
      'copyright'          => new sfValidatorPass(array('required' => false)),
      'type'               => new sfValidatorPass(array('required' => false)),
      'filesize'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dim'                => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dm_media_file_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmMediaFile';
  }

  public function getFields()
  {
    return array(
      'dm_media_folder_id' => 'ForeignKey',
      'nom'                => 'Text',
      'description'        => 'Text',
      'legend'             => 'Text',
      'author'             => 'Text',
      'copyright'          => 'Text',
      'type'               => 'Text',
      'filesize'           => 'Number',
      'dim'                => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'id'                 => 'Number',
    );
  }
}
