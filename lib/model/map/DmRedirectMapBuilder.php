<?php



class DmRedirectMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmRedirectMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmRedirectPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmRedirectPeer::TABLE_NAME);
		$tMap->setPhpName('DmRedirect');
		$tMap->setClassname('DmRedirect');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('SOURCE', 'Source', 'VARCHAR', true, 255);

		$tMap->addColumn('DEST', 'Dest', 'VARCHAR', false, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 