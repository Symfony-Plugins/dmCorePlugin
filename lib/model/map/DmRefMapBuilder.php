<?php



class DmRefMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmRefMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmRefPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmRefPeer::TABLE_NAME);
		$tMap->setPhpName('DmRef');
		$tMap->setClassname('DmRef');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('MODULE', 'Module', 'VARCHAR', true, 127);

		$tMap->addColumn('ACTION', 'Action', 'VARCHAR', true, 127);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 