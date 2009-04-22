<?php

class dmMetaCache extends sfCache implements dmCacheInterface
{

  protected
    $cache;

  public function __construct($options = array())
  {
    $cache_class = self::getCacheClass();
    $this->cache = new $cache_class($options);
  }

  public function getCache()
  {
  	return $this->cache;
  }

  public function getCacheClass()
  {
    if (dmAPCCache::isEnabled())
    {
      $class = "dmAPCCache";
    }
    else
    {
      $class = "dmFileCache";
    }
    return $class;
  }

  public function get($key, $default = null)
  {
    return $this->cache->get($key, $default);
  }

  public function has($key)
  {
    return $this->cache->has($key);
  }

  public function set($key, $data, $lifetime = null)
  {
    return $this->cache->set($key, $data, $lifetime);
  }

  public function remove($key)
  {
    return $this->cache->remove($key);
  }

  public function removePattern($pattern)
  {
    return $this->cache->removePattern($pattern);
  }

  public function clean($mode = self::ALL)
  {
    return $this->cache->clean($mode);
  }

  public function getTimeout($key)
  {
    return $this->getTimeout($key);
  }

  public function getLastModified($key)
  {
    return $this->cache->getLastModified($key);
  }

}