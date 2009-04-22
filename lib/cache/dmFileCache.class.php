<?php

class dmFileCache extends sfFileCache implements dmCacheInterface
{

	public function __construct($name)
	{
	  $name = str_replace(":", DIRECTORY_SEPARATOR, $name);
    $this->initialize(array(
      "cache_dir" => sfConfig::get("sf_cache_dir").DIRECTORY_SEPARATOR.$name
    ));
	}

  public function setObjects($key, $data)
  {
    return parent::set($key, serialize($data));
  }

  public function getObjects($key)
  {
    $data = parent::get($key);
    return empty($data) ? false : unserialize($data);
  }

  public function clear($mode = sfCache::ALL)
  {
    if (is_dir($this->getOption("cache_dir")))
    {
      $this->removePattern("**");
    }
  }
}