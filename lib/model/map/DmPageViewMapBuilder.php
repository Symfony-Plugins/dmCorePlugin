<?php



class DmPageViewMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmPageViewMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmPageViewPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmPageViewPeer::TABLE_NAME);
		$tMap->setPhpName('DmPageView');
		$tMap->setClassname('DmPageView');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('DM_LAYOUT_ID', 'DmLayoutId', 'INTEGER', 'dm_layout', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 