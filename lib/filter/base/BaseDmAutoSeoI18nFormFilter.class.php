<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmAutoSeoI18n filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmAutoSeoI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'        => new sfWidgetFormFilterInput(),
      'name'        => new sfWidgetFormFilterInput(),
      'title'       => new sfWidgetFormFilterInput(),
      'h1'          => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'strip_words' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'slug'        => new sfValidatorPass(array('required' => false)),
      'name'        => new sfValidatorPass(array('required' => false)),
      'title'       => new sfValidatorPass(array('required' => false)),
      'h1'          => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'strip_words' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dm_auto_seo_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmAutoSeoI18n';
  }

  public function getFields()
  {
    return array(
      'slug'        => 'Text',
      'name'        => 'Text',
      'title'       => 'Text',
      'h1'          => 'Text',
      'description' => 'Text',
      'strip_words' => 'Text',
      'id'          => 'ForeignKey',
      'culture'     => 'Text',
    );
  }
}
