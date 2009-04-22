<?php



class DmSessionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmSessionMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(DmSessionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmSessionPeer::TABLE_NAME);
		$tMap->setPhpName('DmSession');
		$tMap->setClassname('DmSession');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('SESS_ID', 'SessId', 'VARCHAR', true, 127);

		$tMap->addColumn('LAST_TIME', 'LastTime', 'INTEGER', true, null);

		$tMap->addColumn('ARRIVAL_TIME', 'ArrivalTime', 'INTEGER', true, null);

		$tMap->addColumn('IP', 'Ip', 'VARCHAR', false, 31);

		$tMap->addColumn('ADDRESS', 'Address', 'LONGVARCHAR', false, null);

		$tMap->addForeignKey('DM_PROFILE_ID', 'DmProfileId', 'INTEGER', 'dm_profile', 'ID', false, null);

		$tMap->addForeignKey('DM_PAGE_ID', 'DmPageId', 'INTEGER', 'dm_page', 'ID', false, null);

		$tMap->addColumn('URL', 'Url', 'VARCHAR', false, 255);

		$tMap->addColumn('NB_PAGES', 'NbPages', 'INTEGER', true, null);

		$tMap->addColumn('BROWSER_NAME', 'BrowserName', 'VARCHAR', false, 31);

		$tMap->addColumn('BROWSER_VERSION', 'BrowserVersion', 'VARCHAR', false, 15);

		$tMap->addColumn('PLATFORM', 'Platform', 'VARCHAR', false, 31);

		$tMap->addColumn('IS_CRAWLER', 'IsCrawler', 'BOOLEAN', true, null);

		$tMap->addColumn('IS_RSS_READER', 'IsRssReader', 'BOOLEAN', true, null);

		$tMap->addColumn('IS_BANNED', 'IsBanned', 'BOOLEAN', true, null);

		$tMap->addColumn('IS_MOBILE_DEVICE', 'IsMobileDevice', 'BOOLEAN', true, null);

		$tMap->addColumn('USER_AGENT', 'UserAgent', 'VARCHAR', false, 255);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'VARCHAR', false, 3);

		$tMap->addColumn('CONTENT_TYPE', 'ContentType', 'VARCHAR', false, 31);

		$tMap->addColumn('CONTENT_LENGTH', 'ContentLength', 'INTEGER', false, null);

		$tMap->addColumn('TIME', 'Time', 'INTEGER', false, null);

		$tMap->addColumn('HISTORY', 'History', 'LONGVARCHAR', false, null);

		$tMap->addColumn('IS_CACHED', 'IsCached', 'BOOLEAN', true, null);

	} 
} 