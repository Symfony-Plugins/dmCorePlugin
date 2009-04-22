<?php



class DmRefI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmRefI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmRefI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmRefI18nPeer::TABLE_NAME);
		$tMap->setPhpName('DmRefI18n');
		$tMap->setClassname('DmRefI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('SLUG', 'Slug', 'VARCHAR', false, 127);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', false, 127);

		$tMap->addColumn('TITLE', 'Title', 'VARCHAR', false, 127);

		$tMap->addColumn('H1', 'H1', 'VARCHAR', false, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255);

		$tMap->addColumn('STRIP_WORDS', 'StripWords', 'VARCHAR', true, 255);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'dm_ref', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

	} 
} 