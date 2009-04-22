<?php

class dmCacheManager
{

	protected static
	  $instances = array();

	public static function getInstance($name)
	{
		if (!isset(self::$instances[$name]))
		{
			self::$instances[$name] = new dmMetaCache($name);
		}
		return self::$instances[$name];
	}

	public static function clearAll($throw_exceptions = false)
	{
		$success = true;

		// Always clear file cache
		$success &= self::clearFile($throw_exceptions);

		if (dmsAPCCache::isEnabled())
		{
			$success &= self::clearApc();
		}

		dmsMediaTools::rebuildSubTree(DmsMediaFolderPeer::getRoot());

		aze::log("dmsCacheManager::clearAll() : $success");

		return $success;
	}

	public static function clearPageCache()
	{
	  self::clearTemplates();
	  self::getInstance("dms/page")->clear();
	}

	protected static function clearApc()
	{
		aze::log("CLEAR ALL APC");
		apc_clear_cache();
		return apc_clear_cache('user');
	}

	protected static function clearFile($throw_exceptions = false)
	{
		$fs = new dmsFilesystem();
		$cache_dir = sfConfig::get('sf_cache_dir');

		$success = $fs->deleteDirContent($cache_dir, $throw_exceptions);

		return $success;
	}

	public static function clearTemplates()
	{
		foreach(dmsEnv::get()->getEnvsNameInMySpace() as $env)
		{
			self::getInstance("front/$env/template")->clear();
		}
	}

	public static function clearInstances()
	{
		foreach(array_keys(self::$instances) as $instance_key)
		{
			unset(self::$instances[$instance_key]);
		}
	}

	public static function clearThumbnails($dir = "")
	{
		$thumbs_dirs = sfFinder::type('dir')->name(".*")->in(sfConfig::get("sf_upload_dir")."/".$dir);

		$fs = dmsFilesystem::get();

		$success = true;

		foreach($thumbs_dirs as $thumb_dir)
		{
			$success &= $fs->deleteDir($thumb_dir);
		}

		return $success;
	}

	public static function getCacheFilesInUl($depth = 0)
	{
		$fs = new dmsFilesystem();
		$files = $fs->find()->maxdepth($depth)->in(sfConfig::get("sf_cache_dir"));
		if (!count($files))
		{
			return false;
		}
		$output = '<ul>';
		foreach($files as $file)
		{
			$guid = $fs->getFileInfos($file);
			$output .= '<li>'.$file." (".$fs->getFileInfos($file).')</li>';
		}
		$output .= '</li>';
		return $output;
	}

	public static function getSlugCacheKey($slug)
	{
    $host_name = aze::getRequest()->getHost();
    $host_name = preg_replace('/[^a-z0-9]/i', '_', $host_name);
    $host_name = strtolower(preg_replace('/_+/', '_', $host_name));

    $cache_key = '/'.$host_name.'/all/dmsCore/index/slug/'.$slug;

    // replace multiple /
    $cache_key = preg_replace('#/+#', '/', $cache_key);

    return $cache_key;
	}

  public static function isPageInCache(DmsPage $page, $mode = null)
  {
    return self::isSlugInCache($page->getSlugRef(), $mode);
  }

  public static function destroyPageCache(DmsPage $page)
  {
    $cache_key = self::getSlugCacheKey($page->getSlugRef());

    $cache = new dmsMetaCache(array(
      "cache_dir" => "front/prod/template"
    ));

    return $cache->remove($cache_key);
  }

  public static function isSlugInCache($slug, $mode = null)
  {
    $env = dmsEnv::getEnvNameBySpaceAndMode(null, $mode);

    $cache_key = self::getSlugCacheKey($slug);

    $cache = new dmsMetaCache(array(
      "cache_dir" => "front/$env/template"
    ));

    return $cache->has($cache_key);
  }

}