<?php

/**
 * DmSiteI18n form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmSiteI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                  => new sfWidgetFormInput(),
      'google_file_name'      => new sfWidgetFormInput(),
      'urchin_tracker'        => new sfWidgetFormInput(),
      'urchin_tracker_active' => new sfWidgetFormInputCheckbox(),
      'yahoo_file_name'       => new sfWidgetFormInput(),
      'yahoo_file_content'    => new sfWidgetFormInput(),
      'yahoo_active'          => new sfWidgetFormInputCheckbox(),
      'is_published'          => new sfWidgetFormInputCheckbox(),
      'is_indexable'          => new sfWidgetFormInputCheckbox(),
      'id'                    => new sfWidgetFormInputHidden(),
      'culture'               => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'name'                  => new sfValidatorString(array('max_length' => 127)),
      'google_file_name'      => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'urchin_tracker'        => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'urchin_tracker_active' => new sfValidatorBoolean(),
      'yahoo_file_name'       => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'yahoo_file_content'    => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'yahoo_active'          => new sfValidatorBoolean(),
      'is_published'          => new sfValidatorBoolean(),
      'is_indexable'          => new sfValidatorBoolean(),
      'id'                    => new sfValidatorPropelChoice(array('model' => 'DmSite', 'column' => 'id', 'required' => false)),
      'culture'               => new sfValidatorPropelChoice(array('model' => 'DmSiteI18n', 'column' => 'culture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_site_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmSiteI18n';
  }


}
