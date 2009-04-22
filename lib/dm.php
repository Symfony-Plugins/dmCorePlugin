<?php

/*
 * Povides shortcuts to Symfony & Diem static methods
 */
class dm
{

	/*
	 * Symfony common objects accessors
	 */

  public static function getContext()
  {
    return sfContext::getInstance();
  }

  public static function getRequest()
  {
    return sfContext::getInstance()->getRequest();
  }

  public static function getResponse()
  {
    return sfContext::getInstance()->getResponse();
  }

  public static function getController()
  {
    return sfContext::getInstance()->getController();
  }

  public static function getEventDispatcher()
  {
    return sfContext::hasInstance()
    ? sfContext::getInstance()->getEventDispatcher()
    : ProjectConfiguration::getActive()->getEventDispatcher();
  }

  /*
   * Diem common features shortcuts
   */

  public static function debug()
  {
  	return dmDebug::debug(func_get_args());
  }

  public static function db($model)
  {
  	return dmFinder::from($model);
  }
}