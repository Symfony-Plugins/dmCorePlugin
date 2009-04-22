<?php



class TransUnitMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.TransUnitMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TransUnitPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TransUnitPeer::TABLE_NAME);
		$tMap->setPhpName('TransUnit');
		$tMap->setClassname('TransUnit');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('MSG_ID', 'MsgId', 'INTEGER', true, null);

		$tMap->addForeignKey('CAT_ID', 'CatId', 'INTEGER', 'catalogue', 'CAT_ID', true, null);

		$tMap->addColumn('SOURCE', 'Source', 'LONGVARCHAR', true, null);

		$tMap->addColumn('TARGET', 'Target', 'LONGVARCHAR', true, null);

		$tMap->addColumn('META', 'Meta', 'VARCHAR', false, 63);

		$tMap->addColumn('IS_APPROVED', 'IsApproved', 'BOOLEAN', true, null);

	} 
} 