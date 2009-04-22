<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmMediaFolder filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmMediaFolderFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'           => new sfWidgetFormFilterInput(),
      'tree_left'     => new sfWidgetFormFilterInput(),
      'tree_right'    => new sfWidgetFormFilterInput(),
      'tree_parent'   => new sfWidgetFormPropelChoice(array('model' => 'DmMediaFolder', 'add_empty' => true)),
      'topic_id'      => new sfWidgetFormFilterInput(),
      'relative_path' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'           => new sfValidatorPass(array('required' => false)),
      'tree_left'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tree_right'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tree_parent'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmMediaFolder', 'column' => 'id')),
      'topic_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'relative_path' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_media_folder_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmMediaFolder';
  }

  public function getFields()
  {
    return array(
      'nom'           => 'Text',
      'tree_left'     => 'Number',
      'tree_right'    => 'Number',
      'tree_parent'   => 'ForeignKey',
      'topic_id'      => 'Number',
      'relative_path' => 'Text',
      'id'            => 'Number',
    );
  }
}
