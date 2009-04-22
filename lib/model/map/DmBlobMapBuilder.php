<?php



class DmBlobMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmBlobMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmBlobPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmBlobPeer::TABLE_NAME);
		$tMap->setPhpName('DmBlob');
		$tMap->setClassname('DmBlob');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('STYLE', 'Style', 'VARCHAR', true, 31);

		$tMap->addColumn('JPG_QUALITY', 'JpgQuality', 'VARCHAR', true, 31);

		$tMap->addColumn('TITLE_POSITION', 'TitlePosition', 'VARCHAR', true, 31);

		$tMap->addColumn('IMAGE_POSITION', 'ImagePosition', 'VARCHAR', true, 31);

		$tMap->addColumn('IMAGE_WIDTH', 'ImageWidth', 'INTEGER', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 