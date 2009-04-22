<?php



class DmLayoutPartMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmLayoutPartMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmLayoutPartPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmLayoutPartPeer::TABLE_NAME);
		$tMap->setPhpName('DmLayoutPart');
		$tMap->setClassname('DmLayoutPart');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('DM_LAYOUT_ID', 'DmLayoutId', 'INTEGER', 'dm_layout', 'ID', true, null);

		$tMap->addColumn('TYPE', 'Type', 'VARCHAR', true, 31);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 