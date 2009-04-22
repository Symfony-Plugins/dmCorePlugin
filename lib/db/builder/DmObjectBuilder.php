<?php

class DmObjectBuilder extends SfObjectBuilder
{
  public function build()
  {
    $objectCode = parent::build();

    return $objectCode;
  }


  /**
   * @see SfObjectBuilder
   */
  protected function addClassBody(& $script)
  {
    parent::addClassBody($script);

    if (DataModelBuilder::getBuildProperty('builderAddBehaviors'))
    {
      $this->addProcessEvent($script);
    }
  }

  /**
   * Add function to process modifications attached to sfPropelEvent objects.
   */
  protected function addProcessEvent(& $script)
  {
    $method = <<<EOF

  /**
   * Process any modifications attached to a dmPropelEvent object.
   *
   * @param   dmPropelEvent \$event
   *
   * @return  boolean Whether the event was processed
   */
  protected function processEvent(dmPropelEvent \$event)
  {
    if (\$event->isProcessed())
    {
      foreach (\$event->getModifications() as \$property => \$value)
      {
        \$this->\$property = \$value;
      }

      return true;
    }
    else
    {
      return false;
    }
  }

EOF;

    $script .= $method;
  }

  protected function addSave(&$script)
  {
    if (!DataModelBuilder::getBuildProperty('builderAddBehaviors'))
    {
      return parent::addSave($script);
    }

    $tmp = '';
    parent::addSave($tmp);

    // pre_save
    $preSave = <<<EOF

    \$wasNew = \$this->isNew();
    \$modifiedColumns = \$this->modifiedColumns;
    \$event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent(\$this, 'Base{$this->getTable()->getPhpName()}.pre_save', array(
      'modified_columns'  => \$modifiedColumns
    )));
    if (\$this->processEvent(\$event) && is_int(\$event->getReturnValue()))
    {
      return \$event->getReturnValue();
    }
EOF;

    $pos = strpos($tmp, '{') + 1;
    $tmp = substr($tmp, 0, $pos).$preSave.substr($tmp, $pos);

    // post_save
    $postSave = <<<EOF

    dm::getEventDispatcher()->notify(new dmPropelEvent(\$this, 'Base{$this->getTable()->getPhpName()}.post_save', array(
      'was_new'           => \$wasNew,
      'affected_rows'     => \$affectedRows,
      'modified_columns'  => \$modifiedColumns
    )));

EOF;

    $pos = strrpos($tmp, 'foreach');
    $tmp = substr($tmp, 0, $pos).$postSave.substr($tmp, $pos);

    $script .= $tmp;
  }

   /**
   * Add dispatch of BaseXXX.pre_delete and BaseXXX.post_delete events.
   *
   * @see SfObjectBuilder
   */
  protected function addDelete(& $script)
  {
    if (!DataModelBuilder::getBuildProperty('builderAddBehaviors'))
    {
      return parent::addDelete($script);
    }

    $tmp = '';
    parent::addDelete($tmp);

    // pre_delete
    $preDelete = <<<EOF

    \$event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent(\$this, 'Base{$this->getTable()->getPhpName()}.pre_delete', array()));
    if (\$event->isProcessed() && \$event->getReturnValue())
    {
      return \$event->getReturnValue();
    }
EOF;

    $pos = strpos($tmp, '{') + 1;
    $tmp = substr($tmp, 0, $pos).$preDelete.substr($tmp, $pos);

    // post_delete
    $postDelete = <<<EOF

    dm::getEventDispatcher()->notify(new dmPropelEvent(\$this, 'Base{$this->getTable()->getPhpName()}.post_delete', array()));

EOF;

    $pos = strrpos($tmp, 'foreach');
    $tmp = substr($tmp, 0, $pos).$postDelete.substr($tmp, $pos);

    $script .= $tmp;
  }

/**
   * Add dispatch of BaseXXX.method_not_found event.
   *
   * @see SfObjectBuilder
   */
  protected function addCall(& $script)
  {
    $tmp = '';
    parent::addCall($tmp);

    $call = <<<EOF

    \$event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent(\$this, 'Base{$this->getTable()->getPhpName()}.method_not_found', array(
      'method'            => \$method,
      'arguments'         => \$arguments
    )));
    if (\$this->processEvent(\$event))
    {
      return \$event->getReturnValue();
    }

EOF;

    $pos = strpos($tmp, '{') + 1;
    $tmp = substr($tmp, 0, $pos).$call.substr($tmp, $pos);

    $script .= $tmp;
  }
}