<?php

class dmComponent
{

	protected
	  $key,
	  $params;

	public function __construct($key, $config)
	{
    $this->key = $key;

    $this->params = array(
      "name" =>     dmArray::get($config, "name", dmString::humanize($key)),
      "options" =>  dmArray::get($config, "options", array())
    );
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
    return $this->getParam('name');
  }
}