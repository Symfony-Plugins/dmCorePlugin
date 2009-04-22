<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmPageView filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmPageViewFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dm_layout_id' => new sfWidgetFormPropelChoice(array('model' => 'DmLayout', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'dm_layout_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DmLayout', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dm_page_view_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmPageView';
  }

  public function getFields()
  {
    return array(
      'dm_layout_id' => 'ForeignKey',
      'id'           => 'Number',
    );
  }
}
