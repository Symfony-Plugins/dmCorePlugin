<?php



class DmBlobI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmBlobI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmBlobI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmBlobI18nPeer::TABLE_NAME);
		$tMap->setPhpName('DmBlobI18n');
		$tMap->setClassname('DmBlobI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', false, 255);

		$tMap->addColumn('TEXT', 'Text', 'LONGVARCHAR', false, null);

		$tMap->addForeignKey('DM_MEDIA_FILE_ID', 'DmMediaFileId', 'INTEGER', 'dm_media_file', 'ID', false, null);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'dm_blob', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

	} 
} 