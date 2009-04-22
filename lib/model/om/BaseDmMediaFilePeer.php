<?php


abstract class BaseDmMediaFilePeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_media_file';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmMediaFile';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const DM_MEDIA_FOLDER_ID = 'dm_media_file.DM_MEDIA_FOLDER_ID';

	
	const NOM = 'dm_media_file.NOM';

	
	const DESCRIPTION = 'dm_media_file.DESCRIPTION';

	
	const LEGEND = 'dm_media_file.LEGEND';

	
	const AUTHOR = 'dm_media_file.AUTHOR';

	
	const COPYRIGHT = 'dm_media_file.COPYRIGHT';

	
	const TYPE = 'dm_media_file.TYPE';

	
	const FILESIZE = 'dm_media_file.FILESIZE';

	
	const DIM = 'dm_media_file.DIM';

	
	const CREATED_AT = 'dm_media_file.CREATED_AT';

	
	const UPDATED_AT = 'dm_media_file.UPDATED_AT';

	
	const ID = 'dm_media_file.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DmMediaFolderId', 'Nom', 'Description', 'Legend', 'Author', 'Copyright', 'Type', 'Filesize', 'Dim', 'CreatedAt', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmMediaFolderId', 'nom', 'description', 'legend', 'author', 'copyright', 'type', 'filesize', 'dim', 'createdAt', 'updatedAt', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::DM_MEDIA_FOLDER_ID, self::NOM, self::DESCRIPTION, self::LEGEND, self::AUTHOR, self::COPYRIGHT, self::TYPE, self::FILESIZE, self::DIM, self::CREATED_AT, self::UPDATED_AT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_media_folder_id', 'nom', 'description', 'legend', 'author', 'copyright', 'type', 'filesize', 'dim', 'created_at', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DmMediaFolderId' => 0, 'Nom' => 1, 'Description' => 2, 'Legend' => 3, 'Author' => 4, 'Copyright' => 5, 'Type' => 6, 'Filesize' => 7, 'Dim' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, 'Id' => 11, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmMediaFolderId' => 0, 'nom' => 1, 'description' => 2, 'legend' => 3, 'author' => 4, 'copyright' => 5, 'type' => 6, 'filesize' => 7, 'dim' => 8, 'createdAt' => 9, 'updatedAt' => 10, 'id' => 11, ),
		BasePeer::TYPE_COLNAME => array (self::DM_MEDIA_FOLDER_ID => 0, self::NOM => 1, self::DESCRIPTION => 2, self::LEGEND => 3, self::AUTHOR => 4, self::COPYRIGHT => 5, self::TYPE => 6, self::FILESIZE => 7, self::DIM => 8, self::CREATED_AT => 9, self::UPDATED_AT => 10, self::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_media_folder_id' => 0, 'nom' => 1, 'description' => 2, 'legend' => 3, 'author' => 4, 'copyright' => 5, 'type' => 6, 'filesize' => 7, 'dim' => 8, 'created_at' => 9, 'updated_at' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

  public static function build()
  {
    return new DmMediaFile();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmMediaFileMapBuilder();
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
		return str_replace(DmMediaFilePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmMediaFilePeer::DM_MEDIA_FOLDER_ID);

		$criteria->addSelectColumn(DmMediaFilePeer::NOM);

		$criteria->addSelectColumn(DmMediaFilePeer::DESCRIPTION);

		$criteria->addSelectColumn(DmMediaFilePeer::LEGEND);

		$criteria->addSelectColumn(DmMediaFilePeer::AUTHOR);

		$criteria->addSelectColumn(DmMediaFilePeer::COPYRIGHT);

		$criteria->addSelectColumn(DmMediaFilePeer::TYPE);

		$criteria->addSelectColumn(DmMediaFilePeer::FILESIZE);

		$criteria->addSelectColumn(DmMediaFilePeer::DIM);

		$criteria->addSelectColumn(DmMediaFilePeer::CREATED_AT);

		$criteria->addSelectColumn(DmMediaFilePeer::UPDATED_AT);

		$criteria->addSelectColumn(DmMediaFilePeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmMediaFilePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmMediaFilePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFilePeer', $criteria, $con);
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
		$objects = DmMediaFilePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmMediaFilePeer::populateObjects(DmMediaFilePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFilePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmMediaFilePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmMediaFile $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmMediaFile) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmMediaFile object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 11] === null) {
			return null;
		}
		return (string) $row[$startcol + 11];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmMediaFilePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmMediaFilePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmMediaFilePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmMediaFilePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmMediaFolder(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmMediaFilePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmMediaFilePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmMediaFilePeer::DM_MEDIA_FOLDER_ID,), array(DmMediaFolderPeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFilePeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmMediaFolder(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFilePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmMediaFilePeer::addSelectColumns($c);
		$startcol = (DmMediaFilePeer::NUM_COLUMNS - DmMediaFilePeer::NUM_LAZY_LOAD_COLUMNS);
		DmMediaFolderPeer::addSelectColumns($c);

		$c->addJoin(array(DmMediaFilePeer::DM_MEDIA_FOLDER_ID,), array(DmMediaFolderPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmMediaFilePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmMediaFilePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmMediaFilePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmMediaFilePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmMediaFolderPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmMediaFolderPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmMediaFolderPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmMediaFolderPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmMediaFile($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmMediaFilePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmMediaFilePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmMediaFilePeer::DM_MEDIA_FOLDER_ID,), array(DmMediaFolderPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFilePeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFilePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmMediaFilePeer::addSelectColumns($c);
		$startcol2 = (DmMediaFilePeer::NUM_COLUMNS - DmMediaFilePeer::NUM_LAZY_LOAD_COLUMNS);

		DmMediaFolderPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmMediaFolderPeer::NUM_COLUMNS - DmMediaFolderPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmMediaFilePeer::DM_MEDIA_FOLDER_ID,), array(DmMediaFolderPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmMediaFilePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmMediaFilePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmMediaFilePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmMediaFilePeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmMediaFolderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmMediaFolderPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmMediaFolderPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmMediaFolderPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmMediaFile($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array(array('dm_media_folder_id', 'nom'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DmMediaFilePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmMediaFilePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmMediaFilePeer::ID) && $criteria->keyContainsValue(DmMediaFilePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmMediaFilePeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFilePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmMediaFilePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmMediaFilePeer::ID);
			$selectCriteria->add(DmMediaFilePeer::ID, $criteria->remove(DmMediaFilePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmMediaFilePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmMediaFilePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			DmMediaFilePeer::doOnDeleteSetNull(new Criteria(DmMediaFilePeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmMediaFilePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmMediaFilePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmMediaFile) {
						DmMediaFilePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmMediaFilePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmMediaFilePeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			DmMediaFilePeer::doOnDeleteSetNull($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmMediaFilePeer::clearInstancePool();
				} else { 					DmMediaFilePeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmBlobI18nPeer::clearInstancePool();

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected static function doOnDeleteSetNull(Criteria $criteria, PropelPDO $con)
	{

				$objects = DmMediaFilePeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {

						$selectCriteria = new Criteria(DmMediaFilePeer::DATABASE_NAME);
			$updateValues = new Criteria(DmMediaFilePeer::DATABASE_NAME);
			$selectCriteria->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, $obj->getId());
			$updateValues->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, null);

					BasePeer::doUpdate($selectCriteria, $updateValues, $con); 
		}
	}

	
	public static function doValidate(DmMediaFile $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmMediaFilePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmMediaFilePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmMediaFilePeer::DATABASE_NAME, DmMediaFilePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmMediaFilePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmMediaFilePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmMediaFilePeer::DATABASE_NAME);
		$criteria->add(DmMediaFilePeer::ID, $pk);

		$v = DmMediaFilePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmMediaFilePeer::DATABASE_NAME);
			$criteria->add(DmMediaFilePeer::ID, $pks, Criteria::IN);
			$objs = DmMediaFilePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmMediaFilePeer::DATABASE_NAME)->addTableBuilder(BaseDmMediaFilePeer::TABLE_NAME, BaseDmMediaFilePeer::getMapBuilder());

