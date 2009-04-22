<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Catalogue filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCatalogueFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(),
      'source_lang'   => new sfWidgetFormFilterInput(),
      'target_lang'   => new sfWidgetFormFilterInput(),
      'date_created'  => new sfWidgetFormFilterInput(),
      'date_modified' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'source_lang'   => new sfValidatorPass(array('required' => false)),
      'target_lang'   => new sfValidatorPass(array('required' => false)),
      'date_created'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_modified' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('catalogue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Catalogue';
  }

  public function getFields()
  {
    return array(
      'cat_id'        => 'Number',
      'name'          => 'Text',
      'source_lang'   => 'Text',
      'target_lang'   => 'Text',
      'date_created'  => 'Number',
      'date_modified' => 'Number',
    );
  }
}
