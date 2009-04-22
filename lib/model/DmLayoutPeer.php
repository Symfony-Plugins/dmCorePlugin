<?php

class DmLayoutPeer extends BaseDmLayoutPeer
{

	public static function getFirstOrCreate()
	{
		if(!$layout = dm::db('DmLayout')->findOne())
		{
			$layout = new DmLayout();
			$layout->setName('Global');
			$layout->save();
		}
		return $layout;
	}

}