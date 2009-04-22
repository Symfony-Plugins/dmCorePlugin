<?php



class DmLangMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmLangMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmLangPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmLangPeer::TABLE_NAME);
		$tMap->setPhpName('DmLang');
		$tMap->setClassname('DmLang');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 255);

		$tMap->addColumn('LANG', 'Lang', 'VARCHAR', true, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 