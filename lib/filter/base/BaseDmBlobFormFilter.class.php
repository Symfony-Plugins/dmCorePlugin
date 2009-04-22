<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DmBlob filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDmBlobFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'style'          => new sfWidgetFormFilterInput(),
      'jpg_quality'    => new sfWidgetFormFilterInput(),
      'title_position' => new sfWidgetFormFilterInput(),
      'image_position' => new sfWidgetFormFilterInput(),
      'image_width'    => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'style'          => new sfValidatorPass(array('required' => false)),
      'jpg_quality'    => new sfValidatorPass(array('required' => false)),
      'title_position' => new sfValidatorPass(array('required' => false)),
      'image_position' => new sfValidatorPass(array('required' => false)),
      'image_width'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dm_blob_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmBlob';
  }

  public function getFields()
  {
    return array(
      'style'          => 'Text',
      'jpg_quality'    => 'Text',
      'title_position' => 'Text',
      'image_position' => 'Text',
      'image_width'    => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'id'             => 'Number',
    );
  }
}
