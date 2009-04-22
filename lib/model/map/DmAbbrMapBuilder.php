<?php



class DmAbbrMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmAbbrMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmAbbrPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmAbbrPeer::TABLE_NAME);
		$tMap->setPhpName('DmAbbr');
		$tMap->setClassname('DmAbbr');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('NANME', 'Nanme', 'VARCHAR', true, 255);

		$tMap->addColumn('TITLE', 'Title', 'VARCHAR', true, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 