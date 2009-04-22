<?php

/**
 * TransUnit form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTransUnitForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'msg_id'      => new sfWidgetFormInputHidden(),
      'cat_id'      => new sfWidgetFormPropelChoice(array('model' => 'Catalogue', 'add_empty' => false)),
      'source'      => new sfWidgetFormTextarea(),
      'target'      => new sfWidgetFormTextarea(),
      'meta'        => new sfWidgetFormInput(),
      'is_approved' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'msg_id'      => new sfValidatorPropelChoice(array('model' => 'TransUnit', 'column' => 'msg_id', 'required' => false)),
      'cat_id'      => new sfValidatorPropelChoice(array('model' => 'Catalogue', 'column' => 'cat_id')),
      'source'      => new sfValidatorString(),
      'target'      => new sfValidatorString(),
      'meta'        => new sfValidatorString(array('max_length' => 63, 'required' => false)),
      'is_approved' => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('trans_unit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransUnit';
  }


}
