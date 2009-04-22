<?php



class DmSiteMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmSiteMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmSitePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmSitePeer::TABLE_NAME);
		$tMap->setPhpName('DmSite');
		$tMap->setClassname('DmSite');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('XITI', 'Xiti', 'LONGVARCHAR', false, null);

		$tMap->addColumn('XITI_ACTIVE', 'XitiActive', 'BOOLEAN', true, null);

		$tMap->addColumn('GDATA_KEY', 'GdataKey', 'VARCHAR', false, 127);

		$tMap->addColumn('GMAP_KEY', 'GmapKey', 'VARCHAR', false, 127);

		$tMap->addColumn('TRANSLATION', 'Translation', 'BOOLEAN', true, null);

		$tMap->addColumn('LANGUAGE_TEST', 'LanguageTest', 'BOOLEAN', true, null);

		$tMap->addColumn('REFRESH_INDEX', 'RefreshIndex', 'BOOLEAN', true, null);

		$tMap->addColumn('JPG_QUALITY', 'JpgQuality', 'INTEGER', true, null);

		$tMap->addColumn('IMAGE', 'Image', 'VARCHAR', false, 127);

		$tMap->addColumn('IS_FIRST_LAUNCH', 'IsFirstLaunch', 'BOOLEAN', true, null);

		$tMap->addColumn('IS_WORKING_COPY', 'IsWorkingCopy', 'BOOLEAN', true, null);

		$tMap->addColumn('INDEX_POPULATED_AT', 'IndexPopulatedAt', 'DATE', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 