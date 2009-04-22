<?php



class DmSlotMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmSlotMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmSlotPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmSlotPeer::TABLE_NAME);
		$tMap->setPhpName('DmSlot');
		$tMap->setClassname('DmSlot');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('DM_ZONE_ID', 'DmZoneId', 'INTEGER', 'dm_zone', 'ID', true, null);

		$tMap->addColumn('TYPE', 'Type', 'VARCHAR', true, 127);

		$tMap->addColumn('MODULE', 'Module', 'VARCHAR', false, 127);

		$tMap->addColumn('ACTION', 'Action', 'VARCHAR', false, 127);

		$tMap->addColumn('VALUE', 'Value', 'LONGVARCHAR', false, null);

		$tMap->addColumn('RANK', 'Rank', 'INTEGER', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 