<?php



class DmMediaFolderMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.dmCorePlugin.lib.model.map.DmMediaFolderMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DmMediaFolderPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DmMediaFolderPeer::TABLE_NAME);
		$tMap->setPhpName('DmMediaFolder');
		$tMap->setClassname('DmMediaFolder');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('NOM', 'Nom', 'VARCHAR', true, 255);

		$tMap->addColumn('TREE_LEFT', 'TreeLeft', 'INTEGER', true, null);

		$tMap->addColumn('TREE_RIGHT', 'TreeRight', 'INTEGER', true, null);

		$tMap->addForeignKey('TREE_PARENT', 'TreeParent', 'INTEGER', 'dm_media_folder', 'ID', false, null);

		$tMap->addColumn('TOPIC_ID', 'TopicId', 'INTEGER', false, null);

		$tMap->addColumn('RELATIVE_PATH', 'RelativePath', 'VARCHAR', true, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 