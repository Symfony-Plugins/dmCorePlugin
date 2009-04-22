<?php

class DmPageFinder extends dmFinder
{
  protected $class = 'DmPage';

  public function whereRoot()
  {
  	return $this->where('TreeParent', 'is null');
  }

  public function whereModuleAction($module, $action = null)
  {
  	list($module, $action) = dmString::separate($module, $action);
    return $this->where('Module', $module)->where('Action', $action);
  }
}
