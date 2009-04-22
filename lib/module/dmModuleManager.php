<?php

class dmModuleManager
{
  protected static
    $instance;

  protected
    $config,
    $modules,
    $empty_module;

  public function __construct()
  {
  }

  public function getConfig()
  {
  	if ($this->config === null)
  	{
      $this->config = include(sfContext::getInstance()->getConfigCache()->checkConfig('config/dm/modules.yml'));
  	}
  	return $this->config;
  }

  public function getModules()
  {
  	if($this->modules === null)
  	{
  		$this->modules = array();
  		foreach($this->getConfig() as $module_key => $module_config)
  		{
  			$this->modules[$module_key] = new dmModule($module_key, $module_config);
  		}
  	}
  	return $this->modules;
  }

  public function getModulesWithShowPage()
  {
    $modules = $this->getModules();

    foreach($modules as $key => $module)
    {
      if (!$module->hasShowPage())
      {
        unset($modules[$key]);
      }
    }
    return $modules;
  }

  public function getModulesByHierarchyLevel($level = 1, $only_wich_have_detail_page = false)
  {
    $modules = $this->getModules($only_wich_have_detail_page);

    foreach($modules as $key => $module)
    {
      if (!$module->hasHierarchyLevel($level))
      {
        unset($modules[$key]);
      }
    }
    return $modules;
  }

  public function getModule($something)
  {
    if ($something instanceof dmsModule)
    {
      return $something;
    }

    $module_key = dmString::modulize($something);

    if (!$module = dmArray::get($this->getModules(), $module_key))
    {
      dmDebug::bug("The $module module does not exist");
    }

    return $module;
  }

  public function getModulesName($only_wich_have_a_page = false)
  {
    $modules_name = array();
    foreach($this->getModules($only_wich_have_a_page) as $key => $module)
    {
      $modules_name[$key] = $module->getName();
    }
    return $modules_name;
  }

  public static function get()
  {
    if (self::$instance === null)
    {
      self::$instance = new self();
    }
    return self::$instance;
  }
}