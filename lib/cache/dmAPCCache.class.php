<?php

class dmAPCCache extends sfAPCCache implements dmCacheInterface
{
	protected static
	  $enabled;

  public function __construct($name)
  {
    $this->initialize(array(
      "prefix" => dmConfig::getProjectKey()."/".$name,
    ));
  }

  public function setObjects($key, $data)
  {
    return parent::set($key, new ArrayObject($data));
  }

  public function getObjects($key)
  {
    $data = parent::get($key);
    return empty($data) ? false : $data->getArrayCopy();
  }

  public function clear()
  {
    $this->removePattern("**");
    //aze::debug();
    // cache systeme puis user
    //apc_clear_cache('user');
    //aze::debug(apc_cache_info("user"));
  }

  public static function isEnabled($val = null)
  {
    if ($val !== null)
    {
      self::$enabled = function_exists('apc_store') && ini_get('apc.enabled') && $val;
      dmsCacheManager::clearInstances();
    }
    if (self::$enabled === null)
    {
      self::$enabled = dmConfig::get("cache", "apc_enabled", true) && function_exists('apc_store') && ini_get('apc.enabled');
    }
    return self::$enabled;
  }

}