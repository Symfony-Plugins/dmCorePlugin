<?php



class DmLayoutMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmLayoutMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmLayoutPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmLayoutPeer::TABLE_NAME);
		$tMap->setPhpName('DmLayout');
		$tMap->setClassname('DmLayout');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 127);

		$tMap->addColumn('HAS_HEAD', 'HasHead', 'BOOLEAN', true, null);

		$tMap->addColumn('HAS_FOOT', 'HasFoot', 'BOOLEAN', true, null);

		$tMap->addColumn('HAS_LEFT', 'HasLeft', 'BOOLEAN', true, null);

		$tMap->addColumn('HAS_RIGHT', 'HasRight', 'BOOLEAN', true, null);

		$tMap->addColumn('CSS_CLASS', 'CssClass', 'VARCHAR', false, 127);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 