<?php

class dmArray
{

	/*
	 * Returns the value of an array, if the key exists
	 */
	public static function get($array, $key, $default = null, $default_if_null = false)
	{
		if (!is_array($array))
		{
			if ($array)
			{
				dmDebug::bug(array(
          "dmArray::get() : $array is not an array",
				  var_dump($array)
				));
			}
			return $default;
		}

		if (false === $default_if_null)
		{
			if(isset($array[$key]))
			{
				return $array[$key];
			}
			else
			{
				return $default;
			}
		}

		if(!empty($array[$key]))
		{
			return $array[$key];
		}
		else
		{
			return $default;
		}
	}


  // retourne la première valeur d'un tableau
  public static function first($array)
  {
    if(!is_array($array))
    {
      return $array;
    }

    if(empty($array))
    {
      return null;
    }

    $a = array_shift($array);
    unset($array);

    return $a;
  }

  // retourne la première clé d'un tableau
  public static function firstKey($array)
  {
    return self::firstEntryIn(array_keys($array));
  }

  // retourne les premières valeurs d'un tableau
  public static function firsts($array, $nb)
  {
    if(!is_array($array))
    {
      return $array;
    }

    if(empty($array))
    {
      return null;
    }

    $nb = min(array($nb, count($array)));

    $return_entries = array();

    for($it = 0; $it < $nb; $it++)
    {
      if ($entry = array_shift($array))
      {
        $return_entries[] = $entry;
      }
    }

    unset($array);

    return $return_entries;
  }

}