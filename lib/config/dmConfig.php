<?php

class dmConfig
{

	public static function get($key1, $key2 = null, $default = null)
	{
		if ($key2 !== null)
		{
		  return sfConfig::get('dm_'.$key1.'_'.$key2, $default);
		}
		return sfConfig::get('dm_'.$key1, $default);
	}


	public static function isCli()
	{
    return !isset($_SERVER['HTTP_HOST']);
	}

	/*
	 * Excludes unwanted plugins depending on current app and php context ( web / cli )
	 */
  public static function excludePlugins($plugins)
  {
    if (self::isCli()) // via une console
    {
      return $plugins;
    }
    if (sfConfig::get("sf_app") == "admin")
    {
      $plugins[] = "dmFrontPlugin";
    }
    else
    {
      $plugins[] = "dmAdminPlugin";
    }
    return array_unique($plugins);
  }
}