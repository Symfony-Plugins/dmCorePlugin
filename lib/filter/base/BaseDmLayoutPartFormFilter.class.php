<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmLayoutPart filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmLayoutPartFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_layout_id' => new sfWidgetFormPropelChoice(array('model' => 'DmLayout', 'add_empty' => true)),
      'type'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'dm_layout_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmLayout', 'column' => 'id')),
      'type'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_layout_part_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmLayoutPart';
  }

  public function getFields()
  {
    return array(
      'dm_layout_id' => 'ForeignKey',
      'type'         => 'Text',
      'id'           => 'Number',
    );
  }
}
