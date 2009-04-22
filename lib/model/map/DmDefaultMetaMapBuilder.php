<?php



class DmDefaultMetaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmDefaultMetaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmDefaultMetaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmDefaultMetaPeer::TABLE_NAME);
		$tMap->setPhpName('DmDefaultMeta');
		$tMap->setClassname('DmDefaultMeta');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('TITLE_PREFIX', 'TitlePrefix', 'VARCHAR', false, 127);

		$tMap->addColumn('TITLE_SUFFIX', 'TitleSuffix', 'VARCHAR', false, 127);

		$tMap->addColumn('DESCRIPTION_PREFIX', 'DescriptionPrefix', 'VARCHAR', false, 127);

		$tMap->addColumn('DESCRIPTION_SUFFIX', 'DescriptionSuffix', 'VARCHAR', false, 127);

		$tMap->addColumn('IS_APPROVED', 'IsApproved', 'BOOLEAN', true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 