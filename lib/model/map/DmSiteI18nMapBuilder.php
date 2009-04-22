<?php



class DmSiteI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmSiteI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmSiteI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmSiteI18nPeer::TABLE_NAME);
		$tMap->setPhpName('DmSiteI18n');
		$tMap->setClassname('DmSiteI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 127);

		$tMap->addColumn('GOOGLE_FILE_NAME', 'GoogleFileName', 'VARCHAR', false, 31);

		$tMap->addColumn('URCHIN_TRACKER', 'UrchinTracker', 'VARCHAR', false, 31);

		$tMap->addColumn('URCHIN_TRACKER_ACTIVE', 'UrchinTrackerActive', 'BOOLEAN', true, null);

		$tMap->addColumn('YAHOO_FILE_NAME', 'YahooFileName', 'VARCHAR', false, 31);

		$tMap->addColumn('YAHOO_FILE_CONTENT', 'YahooFileContent', 'VARCHAR', false, 31);

		$tMap->addColumn('YAHOO_ACTIVE', 'YahooActive', 'BOOLEAN', true, null);

		$tMap->addColumn('IS_PUBLISHED', 'IsPublished', 'BOOLEAN', true, null);

		$tMap->addColumn('IS_INDEXABLE', 'IsIndexable', 'BOOLEAN', true, null);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'dm_site', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

	} 
} 