<?php



class DmAutoSeoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmAutoSeoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmAutoSeoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmAutoSeoPeer::TABLE_NAME);
		$tMap->setPhpName('DmAutoSeo');
		$tMap->setClassname('DmAutoSeo');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('MODULE', 'Module', 'VARCHAR', true, 127);

		$tMap->addColumn('ACTION', 'Action', 'VARCHAR', true, 127);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 