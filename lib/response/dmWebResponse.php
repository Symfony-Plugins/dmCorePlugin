<?php

abstract class dmWebResponse extends sfWebResponse
{

	abstract function getStylesheet();

	abstract function getJavascript();

	public function initialize(sfEventDispatcher $dispatcher, $options = array())
  {
  	parent::initialize($dispatcher, $options);

  	$this->addDefaultAssets(array(
  	  "stylesheet" => $this->getStylesheet(),
  	  "javascript" => $this->getJavascript()
  	));
  }

  protected function addDefaultAssets($types)
  {
  	foreach($types as $type => $assets)
  	{
  		$add_method = "add".sfInflector::camelize($type);
  		foreach($assets as $file => $position)
  		{
  			$this->$add_method('/'.$file, $position);
  		}
  	}
  }

}