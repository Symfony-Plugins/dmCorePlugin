<?php



class CatalogueMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.CatalogueMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(CataloguePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CataloguePeer::TABLE_NAME);
		$tMap->setPhpName('Catalogue');
		$tMap->setClassname('Catalogue');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('CAT_ID', 'CatId', 'INTEGER', true, null);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 63);

		$tMap->addColumn('SOURCE_LANG', 'SourceLang', 'VARCHAR', true, 63);

		$tMap->addColumn('TARGET_LANG', 'TargetLang', 'VARCHAR', true, 63);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'INTEGER', true, null);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'INTEGER', true, null);

	} 
} 