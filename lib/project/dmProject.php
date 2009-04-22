<?php

class dmProject
{

  protected static
    $key,
    $models;

  /*
   * Returns project key based on his dir_name
   */
  public static function getKey()
  {
    if (self::$key === null)
    {
      self::$key = basename(sfConfig::get("sf_root_dir"));
    }
    return self::$key;
  }

  public static function getModels()
  {
    if (self::$models === null)
    {
      $map_files = sfFinder::type('file')
      ->max_depth(0)
      ->name("*MapBuilder.php")
      ->in(dmOs::join(sfConfig::get("sf_lib_dir"), "model/map"));

      self::$models = array();
      foreach($map_files as $map_file)
      {
        self::$models[] = str_replace('MapBuilder.php', '', $map_file);
      }
    }
    return self::$models;
  }
}