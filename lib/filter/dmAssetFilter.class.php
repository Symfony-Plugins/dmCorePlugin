<?php

/**
 * Includes Assets
 */
abstract class dmAssetFilter extends dmFilter
{

	protected
	  $assets = array(
	    "stylesheets" => array(),
	    "javascripts" => array()
	  );

  /**
   * Executes this filter.
   *
   * @param sfFilterChain $filterChain A sfFilterChain instance
   */
  public function execute($filterChain)
  {
    $response = $this->context->getResponse();

    foreach($this->getStylesheets() as $stylesheet)
    {
      $response->addStylesheet($stylesheet);
    }

    foreach($this->getJavascripts() as $javascript)
    {
      $response->addJavascript($javascript);
    }

    // execute next filter
    $filterChain->execute();
  }

  protected function addStylesheet($stylesheet)
  {
  }

  protected function addAssets($type, $assets)
  {
  	if(is_array($stylesheet))
  	{
  		$this->stylesheets = array_merge(
  		  $this->stylesheets,
  		  $stylesheet
  		);
  	}
  	elseif(is_string($stylesheet))
  	{
  		$this->stylesheets[] = $stylesheet;
  	}
  }

  protected function getStylesheets()
  {
    return (array) $this->stylesheets;
  }

  protected function getJavascripts()
  {
    return (array) $this->javascripts;
  }
}