<?php



class DmMediaFileMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmMediaFileMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmMediaFilePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmMediaFilePeer::TABLE_NAME);
		$tMap->setPhpName('DmMediaFile');
		$tMap->setClassname('DmMediaFile');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('DM_MEDIA_FOLDER_ID', 'DmMediaFolderId', 'INTEGER', 'dm_media_folder', 'ID', true, null);

		$tMap->addColumn('NOM', 'Nom', 'VARCHAR', true, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null);

		$tMap->addColumn('LEGEND', 'Legend', 'VARCHAR', false, 255);

		$tMap->addColumn('AUTHOR', 'Author', 'VARCHAR', false, 255);

		$tMap->addColumn('COPYRIGHT', 'Copyright', 'VARCHAR', false, 255);

		$tMap->addColumn('TYPE', 'Type', 'VARCHAR', false, 10);

		$tMap->addColumn('FILESIZE', 'Filesize', 'INTEGER', false, null);

		$tMap->addColumn('DIM', 'Dim', 'VARCHAR', false, 15);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 