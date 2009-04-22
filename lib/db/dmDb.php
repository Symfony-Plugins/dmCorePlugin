<?php

class dmDb
{

  public static function getPropelConfiguration($db = null)
  {
  	if ($db === null)
  	{
  		$db = Propel::getDefaultDB();
  	}
  	return dmArray::get(
      dmArray::get(
        dmArray::get(
          Propel::getConfiguration(),
          "datasources"
        ),
        $db
      ),
      "connection"
    );
  }
  //$propel_config = Propel::getConfiguration();
}