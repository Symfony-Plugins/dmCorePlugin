<?php

class dmModule
{

	protected static
	  $default_options = array(
	    "auto" => true
	  );

  protected
    $key,
    $params,
    $components = array(),
    $views = array();

  public static function get($key)
  {
    return dmModuleManager::get()->getModule($key);
  }

  // CONSTRUCTEUR

  public function __construct($key, $config = array())
  {
    $this->key = $key;

    $name = dmArray::get($config, "name", dmString::humanize($this->key));

    $this->params = array(
      "name" =>       $name,
      "plural" =>     dmArray::get($config, "plural", dmString::pluralize($name)),
      "options" =>    array_merge(
        self::$default_options,
        sfToolkit::stringToArray(dmArray::get($config, "options", array()))
      )
    );

    foreach(dmArray::get($config, "components", array()) as $component_key => $component_config)
    {
    	if (is_integer($component_key))
    	{
    		$component = new dmComponent($component_config, array());
    	}
    	else
    	{
    		$component = new dmComponent($component_key, $component_config);
    	}
      $this->components[$component_key] = $component;
    }

    foreach(dmArray::get($config, "views", array()) as $view_key => $view_config)
    {
      if (is_integer($view_key))
      {
        $view = new dmView($view_config, array());
      }
      else
      {
        $view = new dmView($view_key, $view_config);
      }
      $this->views[$view_key] = $view;
    }
  }

  public function hasPage()
  {
  	return $this->hasComponent('show');
  }

  // ACCESSEURS

  public function __toString()
  {
    return $this->getKey();
  }

  public function getKey()
  {
    return $this->key;
  }

  public function getParam($key)
  {
    return $this->param[$key];
  }

  public function setParam($key, $value)
  {
    return $this->param[$key] = $value;
  }

  public function getName()
  {
    return $this->getParam("name");
  }

  public function getPlural()
  {
    return $this->getParam("plural");
  }

  public function getOptions()
  {
    return $this->getParam("options");
  }

  public function getOption($option_key, $default = null)
  {
    return dmArray::get($this->getOptions(), $option_key, $default);
  }

  public function getModel()
  {
    return dmString::camelize($this->getKey());
  }

  public function hasModel()
  {
    return in_array($this->getModel(), dmProject::getModels());
  }

  public function getComponents()
  {
    return $this->getParam("components");
  }

  public function getComponent($component_key)
  {
    return dmArray::get($this->getComponents(), $component_key);
  }

  public function hasComponent($component_key)
  {
    return array_key_exists($component_key, $this->getComponents());
  }

  public function getViews()
  {
    return $this->getParam("views");
  }

  public function getViewsName()
  {
    $views_name = array();
    foreach($this->getViews() as $key => $view)
    {
      $views_name[$key] = $view->getName();
    }
    return $views_name;
  }

  public function getView($view_key)
  {
    return dmArray::get($this->getViews(), $view_key);
  }

  public function getParent()
  {
  	dmDebug::bug("Not implemented yet");
  }

  public function getParents()
  {
    dmDebug::bug("Not implemented yet");
  }

}