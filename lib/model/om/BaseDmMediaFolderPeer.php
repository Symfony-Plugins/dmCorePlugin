<?php


abstract class BaseDmMediaFolderPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_media_folder';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmMediaFolder';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const NOM = 'dm_media_folder.NOM';

	
	const TREE_LEFT = 'dm_media_folder.TREE_LEFT';

	
	const TREE_RIGHT = 'dm_media_folder.TREE_RIGHT';

	
	const TREE_PARENT = 'dm_media_folder.TREE_PARENT';

	
	const TOPIC_ID = 'dm_media_folder.TOPIC_ID';

	
	const RELATIVE_PATH = 'dm_media_folder.RELATIVE_PATH';

	
	const ID = 'dm_media_folder.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nom', 'TreeLeft', 'TreeRight', 'TreeParent', 'TopicId', 'RelativePath', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('nom', 'treeLeft', 'treeRight', 'treeParent', 'topicId', 'relativePath', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::NOM, self::TREE_LEFT, self::TREE_RIGHT, self::TREE_PARENT, self::TOPIC_ID, self::RELATIVE_PATH, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nom', 'tree_left', 'tree_right', 'tree_parent', 'topic_id', 'relative_path', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nom' => 0, 'TreeLeft' => 1, 'TreeRight' => 2, 'TreeParent' => 3, 'TopicId' => 4, 'RelativePath' => 5, 'Id' => 6, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('nom' => 0, 'treeLeft' => 1, 'treeRight' => 2, 'treeParent' => 3, 'topicId' => 4, 'relativePath' => 5, 'id' => 6, ),
		BasePeer::TYPE_COLNAME => array (self::NOM => 0, self::TREE_LEFT => 1, self::TREE_RIGHT => 2, self::TREE_PARENT => 3, self::TOPIC_ID => 4, self::RELATIVE_PATH => 5, self::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('nom' => 0, 'tree_left' => 1, 'tree_right' => 2, 'tree_parent' => 3, 'topic_id' => 4, 'relative_path' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

  public static function build()
  {
    return new DmMediaFolder();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmMediaFolderMapBuilder();
		}
		return self::$mapBuilder;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(DmMediaFolderPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmMediaFolderPeer::NOM);

		$criteria->addSelectColumn(DmMediaFolderPeer::TREE_LEFT);

		$criteria->addSelectColumn(DmMediaFolderPeer::TREE_RIGHT);

		$criteria->addSelectColumn(DmMediaFolderPeer::TREE_PARENT);

		$criteria->addSelectColumn(DmMediaFolderPeer::TOPIC_ID);

		$criteria->addSelectColumn(DmMediaFolderPeer::RELATIVE_PATH);

		$criteria->addSelectColumn(DmMediaFolderPeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmMediaFolderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmMediaFolderPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmMediaFolderPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFolderPeer', $criteria, $con);
    }


				$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}
	
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = DmMediaFolderPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmMediaFolderPeer::populateObjects(DmMediaFolderPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmMediaFolderPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFolderPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmMediaFolderPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmMediaFolder $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof DmMediaFolder) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmMediaFolder object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} 
	
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; 	}
	
	
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
				if ($row[$startcol + 6] === null) {
			return null;
		}
		return (string) $row[$startcol + 6];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmMediaFolderPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmMediaFolderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmMediaFolderPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmMediaFolderPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmMediaFolderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmMediaFolderPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmMediaFolderPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFolderPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}

	
	public static function doSelectJoinAll(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmMediaFolderPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFolderPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmMediaFolderPeer::addSelectColumns($c);
		$startcol2 = (DmMediaFolderPeer::NUM_COLUMNS - DmMediaFolderPeer::NUM_LAZY_LOAD_COLUMNS);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmMediaFolderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmMediaFolderPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmMediaFolderPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmMediaFolderPeer::addInstanceToPool($obj1, $key1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array(array('relative_path'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DmMediaFolderPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmMediaFolderPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmMediaFolderPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmMediaFolderPeer::ID) && $criteria->keyContainsValue(DmMediaFolderPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmMediaFolderPeer::ID.')');
		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseDmMediaFolderPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFolderPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmMediaFolderPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmMediaFolderPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmMediaFolderPeer::ID);
			$selectCriteria->add(DmMediaFolderPeer::ID, $criteria->remove(DmMediaFolderPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmMediaFolderPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFolderPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += DmMediaFolderPeer::doOnDeleteCascade(new Criteria(DmMediaFolderPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmMediaFolderPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmMediaFolderPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmMediaFolder) {
						DmMediaFolderPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmMediaFolderPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmMediaFolderPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += DmMediaFolderPeer::doOnDeleteCascade($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmMediaFolderPeer::clearInstancePool();
				} else { 					DmMediaFolderPeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmMediaFilePeer::clearInstancePool();

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
	{
				$affectedRows = 0;

				$objects = DmMediaFolderPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(DmMediaFilePeer::DATABASE_NAME);
			
			$c->add(DmMediaFilePeer::DM_MEDIA_FOLDER_ID, $obj->getId());
			$affectedRows += DmMediaFilePeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(DmMediaFolder $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmMediaFolderPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmMediaFolderPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(DmMediaFolderPeer::DATABASE_NAME, DmMediaFolderPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmMediaFolderPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmMediaFolderPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmMediaFolderPeer::DATABASE_NAME);
		$criteria->add(DmMediaFolderPeer::ID, $pk);

		$v = DmMediaFolderPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmMediaFolderPeer::DATABASE_NAME);
			$criteria->add(DmMediaFolderPeer::ID, $pks, Criteria::IN);
			$objs = DmMediaFolderPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmMediaFolderPeer::DATABASE_NAME)->addTableBuilder(BaseDmMediaFolderPeer::TABLE_NAME, BaseDmMediaFolderPeer::getMapBuilder());

