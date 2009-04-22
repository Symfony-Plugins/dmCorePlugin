<?php



class DmSentMailMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmSentMailMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmSentMailPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmSentMailPeer::TABLE_NAME);
		$tMap->setPhpName('DmSentMail');
		$tMap->setClassname('DmSentMail');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', false, 255);

		$tMap->addColumn('HEADER', 'Header', 'LONGVARCHAR', false, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 