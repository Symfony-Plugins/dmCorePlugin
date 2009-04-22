<?php

class dmString extends sfInflector
{
	const PARTS_SEPARATOR = ".";

	protected static
	  $cache = array(
	    'camelize' => array()
	  );

	/*
	 * Separate 2 parts if concatenated with self::PARTS_SEPARATOR
	 * part1, part2 => part1, part2
	 * part1.part2, null => part1, part2
	 */
	public static function separate($part1, $part2 = null)
	{
    if ($part2 === null && strpos($part1, self::PARTS_SEPARATOR))
    {
      list($part1, $part2) = explode(self::PARTS_SEPARATOR, $part1);
    }
    return array($part1, $part2);
	}

	/*
	 * Adds a final 's'
	 */
	public static function pluralize($word)
	{
		return $word[strlen($word)-1] == "s" ? $word : $word."s";
	}

  /*
   * Returns a module formatted string
   * ModuleName => moduleName
   * module_name => moduleName
   */
  public static function modulize($something)
  {
    if ($model = self::modelize($something))
    {
      $model[0] = strtolower($model[0]);
    }
    return $model;
  }

  /*
   * Returns a camelized string from a lower case and underscored string by
   * upper-casing each letter preceded by an underscore.
   * modelName => ModelName
   * model_name => ModelName
   */
  public static function camelize($something)
  {
    if (is_object($something))
    {
      if ($something instanceof dmsModule)
      {
        return $something->getModel();
      }
      return get_class($something);
    }

    if (!is_string($something))
    {
      return null;
    }

    if (!isset(self::$cache['camelize'][$something]))
    {
      self::$cache['camelize'][$something] = preg_replace(
	      '/(^|_)(.)/e',
	      "strtoupper('\\2')",
	      str_replace('Peer', '', $something)
	    );
    }

    return self::$cache['camelize'][$something];
  }

	 /**
   * Converts string to array
   *
   * @param  string $string  the value to convert to array
   *
   * @return array
   */
	public static function toArray($string)
	{
    if(is_array($string))
    {
      return $string;
    }

    if (empty($string))
    {
      return null;
    }

    $timer = dmDebug::timer("dmString::toArray");

    $array = array();

    // JQUERY STYLE - css expression
    self::retrieveCssFromString($string, $array);

    // DMS STYLE - string opt in name
    self::retrieveOptFromString($string, $array);

    $timer->addTime();

    return $array;
	}

  // retire les attributs css de $string et les met dans le tableau $opt
  // div#id.class devient div, array("id"=>"id", "class"=>"class")
  public static function retrieveCssFromString(&$string, &$opt)
  {
    if (empty($string))
    {
      return null;
    }

    if (strpos($string, "#") !== false)
    {
      // récupération de l'id
      preg_match('/#([\w\-_]*)/', $string, $id);
      if (isset($id[1]))
      {
        $opt["id"] = $id[1];
        $string = str_replace("#".$id[1], "", $string);
      }
    }

    if (strpos($string, ".") !== false)
    {
      // récupération des classes
      preg_match_all('/\.([\w\-_]*)/', $string, $classes);
      if (isset($classes[1]))
      {
        if (!isset($opt["class"]))
        {
          $opt["class"] = array();
        }
        $opt['class'] = array_merge($opt['class'], $classes[1]);

        $string = str_replace(".".implode(".", $classes[1]), "", $string);
      }
    }
  }

  public static function retrieveOptFromString(&$string, &$opt)
  {
    if (empty($string))
    {
      return null;
    }

    $opt = array_merge(
      $opt,
      sfToolkit::stringToArray($string)
    );
    $string = "";
  }

	/*
	 * Returns a random string
	 */
  public static function random($length = 8)
  {
    $val = "";
    $values = "abcdefghijklmnopqrstuvwxyz0123456789";
    for ( $i = 0; $i < $length; $i++ )
    {
      $val .= $values[mt_rand( 0, 35 )];
    }
    return $val;
  }

}