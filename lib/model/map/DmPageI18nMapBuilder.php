<?php



class DmPageI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmPageI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmPageI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmPageI18nPeer::TABLE_NAME);
		$tMap->setPhpName('DmPageI18n');
		$tMap->setClassname('DmPageI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('SLUG', 'Slug', 'VARCHAR', false, 255);

		$tMap->addColumn('SLUG_CACHE', 'SlugCache', 'VARCHAR', false, 255);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', false, 255);

		$tMap->addColumn('NAME_CACHE', 'NameCache', 'VARCHAR', false, 255);

		$tMap->addColumn('TITLE', 'Title', 'VARCHAR', false, 255);

		$tMap->addColumn('H1', 'H1', 'VARCHAR', false, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'dm_page', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

	} 
} 