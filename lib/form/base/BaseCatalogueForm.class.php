<?php

/**
 * Catalogue form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCatalogueForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cat_id'        => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInput(),
      'source_lang'   => new sfWidgetFormInput(),
      'target_lang'   => new sfWidgetFormInput(),
      'date_created'  => new sfWidgetFormInput(),
      'date_modified' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'cat_id'        => new sfValidatorPropelChoice(array('model' => 'Catalogue', 'column' => 'cat_id', 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 63)),
      'source_lang'   => new sfValidatorString(array('max_length' => 63)),
      'target_lang'   => new sfValidatorString(array('max_length' => 63)),
      'date_created'  => new sfValidatorInteger(),
      'date_modified' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('catalogue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Catalogue';
  }


}
