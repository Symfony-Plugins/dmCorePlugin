<?php



class DmZoneMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmZoneMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmZonePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmZonePeer::TABLE_NAME);
		$tMap->setPhpName('DmZone');
		$tMap->setClassname('DmZone');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('DM_PAGE_VIEW_ID', 'DmPageViewId', 'INTEGER', 'dm_page_view', 'ID', false, null);

		$tMap->addForeignKey('DM_LAYOUT_PART_ID', 'DmLayoutPartId', 'INTEGER', 'dm_layout_part', 'ID', false, null);

		$tMap->addColumn('CSS_CLASS', 'CssClass', 'VARCHAR', false, 127);

		$tMap->addColumn('RANK', 'Rank', 'INTEGER', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 