<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmConfigI18n filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseDmConfigI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                  => new sfWidgetFormFilterInput(),
      'contact_email'         => new sfWidgetFormFilterInput(),
      'google_file_name'      => new sfWidgetFormFilterInput(),
      'urchin_tracker'        => new sfWidgetFormFilterInput(),
      'urchin_tracker_active' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'yahoo_file_name'       => new sfWidgetFormFilterInput(),
      'yahoo_file_content'    => new sfWidgetFormFilterInput(),
      'yahoo_active'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_published'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_indexable'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'name'                  => new sfValidatorPass(array('required' => false)),
      'contact_email'         => new sfValidatorPass(array('required' => false)),
      'google_file_name'      => new sfValidatorPass(array('required' => false)),
      'urchin_tracker'        => new sfValidatorPass(array('required' => false)),
      'urchin_tracker_active' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'yahoo_file_name'       => new sfValidatorPass(array('required' => false)),
      'yahoo_file_content'    => new sfValidatorPass(array('required' => false)),
      'yahoo_active'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_published'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_indexable'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('dm_config_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmConfigI18n';
  }

  public function getFields()
  {
    return array(
      'name'                  => 'Text',
      'contact_email'         => 'Text',
      'google_file_name'      => 'Text',
      'urchin_tracker'        => 'Text',
      'urchin_tracker_active' => 'Boolean',
      'yahoo_file_name'       => 'Text',
      'yahoo_file_content'    => 'Text',
      'yahoo_active'          => 'Boolean',
      'is_published'          => 'Boolean',
      'is_indexable'          => 'Boolean',
      'id'                    => 'ForeignKey',
      'culture'               => 'Text',
    );
  }
}
