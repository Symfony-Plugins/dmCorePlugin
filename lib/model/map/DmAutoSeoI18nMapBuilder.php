<?php



class DmAutoSeoI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmAutoSeoI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmAutoSeoI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmAutoSeoI18nPeer::TABLE_NAME);
		$tMap->setPhpName('DmAutoSeoI18n');
		$tMap->setClassname('DmAutoSeoI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('SLUG', 'Slug', 'VARCHAR', true, 255);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 255);

		$tMap->addColumn('TITLE', 'Title', 'VARCHAR', true, 255);

		$tMap->addColumn('H1', 'H1', 'VARCHAR', false, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255);

		$tMap->addColumn('STRIP_WORDS', 'StripWords', 'VARCHAR', true, 255);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'dm_auto_seo', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

	} 
} 