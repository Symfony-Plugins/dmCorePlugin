<?php

class DmSitePeer extends BaseDmSitePeer
{

	protected static
	  $instance;

	public static function getInstance()
	{
		if(self::$instance === null)
		{
			self::$instance = dm::db('DmSite')->findOne();
		}
		return self::$instance;
	}

}