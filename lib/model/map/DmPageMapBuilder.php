<?php



class DmPageMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmPageMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmPagePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmPagePeer::TABLE_NAME);
		$tMap->setPhpName('DmPage');
		$tMap->setClassname('DmPage');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('DM_PAGE_VIEW_ID', 'DmPageViewId', 'INTEGER', 'dm_page_view', 'ID', true, null);

		$tMap->addColumn('TREE_LEFT', 'TreeLeft', 'INTEGER', true, null);

		$tMap->addColumn('TREE_RIGHT', 'TreeRight', 'INTEGER', true, null);

		$tMap->addForeignKey('TREE_PARENT', 'TreeParent', 'INTEGER', 'dm_page', 'ID', false, null);

		$tMap->addColumn('TOPIC_ID', 'TopicId', 'INTEGER', false, null);

		$tMap->addColumn('MODULE', 'Module', 'VARCHAR', false, 127);

		$tMap->addColumn('ACTION', 'Action', 'VARCHAR', false, 127);

		$tMap->addColumn('OBJECT_ID', 'ObjectId', 'INTEGER', false, null);

		$tMap->addColumn('IS_APPROVED', 'IsApproved', 'BOOLEAN', true, null);

		$tMap->addColumn('IS_PUBLIC', 'IsPublic', 'BOOLEAN', true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 