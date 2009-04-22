<?php


abstract class BaseTransUnitPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'trans_unit';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.TransUnit';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const MSG_ID = 'trans_unit.MSG_ID';

	
	const CAT_ID = 'trans_unit.CAT_ID';

	
	const SOURCE = 'trans_unit.SOURCE';

	
	const TARGET = 'trans_unit.TARGET';

	
	const META = 'trans_unit.META';

	
	const IS_APPROVED = 'trans_unit.IS_APPROVED';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('MsgId', 'CatId', 'Source', 'Target', 'Meta', 'IsApproved', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('msgId', 'catId', 'source', 'target', 'meta', 'isApproved', ),
		BasePeer::TYPE_COLNAME => array (self::MSG_ID, self::CAT_ID, self::SOURCE, self::TARGET, self::META, self::IS_APPROVED, ),
		BasePeer::TYPE_FIELDNAME => array ('msg_id', 'cat_id', 'source', 'target', 'meta', 'is_approved', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('MsgId' => 0, 'CatId' => 1, 'Source' => 2, 'Target' => 3, 'Meta' => 4, 'IsApproved' => 5, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('msgId' => 0, 'catId' => 1, 'source' => 2, 'target' => 3, 'meta' => 4, 'isApproved' => 5, ),
		BasePeer::TYPE_COLNAME => array (self::MSG_ID => 0, self::CAT_ID => 1, self::SOURCE => 2, self::TARGET => 3, self::META => 4, self::IS_APPROVED => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('msg_id' => 0, 'cat_id' => 1, 'source' => 2, 'target' => 3, 'meta' => 4, 'is_approved' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

  public static function build()
  {
    return new TransUnit();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new TransUnitMapBuilder();
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
		return str_replace(TransUnitPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TransUnitPeer::MSG_ID);

		$criteria->addSelectColumn(TransUnitPeer::CAT_ID);

		$criteria->addSelectColumn(TransUnitPeer::SOURCE);

		$criteria->addSelectColumn(TransUnitPeer::TARGET);

		$criteria->addSelectColumn(TransUnitPeer::META);

		$criteria->addSelectColumn(TransUnitPeer::IS_APPROVED);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(TransUnitPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TransUnitPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseTransUnitPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseTransUnitPeer', $criteria, $con);
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
		$objects = TransUnitPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return TransUnitPeer::populateObjects(TransUnitPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseTransUnitPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseTransUnitPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			TransUnitPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(TransUnit $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getMsgId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof TransUnit) {
				$key = (string) $value->getMsgId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TransUnit object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = TransUnitPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = TransUnitPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = TransUnitPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				TransUnitPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinCatalogue(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(TransUnitPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TransUnitPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(TransUnitPeer::CAT_ID,), array(CataloguePeer::CAT_ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseTransUnitPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseTransUnitPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinCatalogue(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseTransUnitPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseTransUnitPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TransUnitPeer::addSelectColumns($c);
		$startcol = (TransUnitPeer::NUM_COLUMNS - TransUnitPeer::NUM_LAZY_LOAD_COLUMNS);
		CataloguePeer::addSelectColumns($c);

		$c->addJoin(array(TransUnitPeer::CAT_ID,), array(CataloguePeer::CAT_ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TransUnitPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TransUnitPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = TransUnitPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				TransUnitPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = CataloguePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CataloguePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CataloguePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CataloguePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addTransUnit($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(TransUnitPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TransUnitPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(TransUnitPeer::CAT_ID,), array(CataloguePeer::CAT_ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseTransUnitPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseTransUnitPeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseTransUnitPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseTransUnitPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TransUnitPeer::addSelectColumns($c);
		$startcol2 = (TransUnitPeer::NUM_COLUMNS - TransUnitPeer::NUM_LAZY_LOAD_COLUMNS);

		CataloguePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CataloguePeer::NUM_COLUMNS - CataloguePeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(TransUnitPeer::CAT_ID,), array(CataloguePeer::CAT_ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TransUnitPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TransUnitPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = TransUnitPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				TransUnitPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = CataloguePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = CataloguePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CataloguePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CataloguePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addTransUnit($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array();
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return TransUnitPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseTransUnitPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseTransUnitPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(TransUnitPeer::MSG_ID) && $criteria->keyContainsValue(TransUnitPeer::MSG_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.TransUnitPeer::MSG_ID.')');
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

		
    foreach (sfMixer::getCallables('BaseTransUnitPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseTransUnitPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseTransUnitPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseTransUnitPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(TransUnitPeer::MSG_ID);
			$selectCriteria->add(TransUnitPeer::MSG_ID, $criteria->remove(TransUnitPeer::MSG_ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseTransUnitPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseTransUnitPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(TransUnitPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												TransUnitPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof TransUnit) {
						TransUnitPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TransUnitPeer::MSG_ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								TransUnitPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public static function doValidate(TransUnit $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TransUnitPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TransUnitPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TransUnitPeer::DATABASE_NAME, TransUnitPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TransUnitPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = TransUnitPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(TransUnitPeer::DATABASE_NAME);
		$criteria->add(TransUnitPeer::MSG_ID, $pk);

		$v = TransUnitPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(TransUnitPeer::DATABASE_NAME);
			$criteria->add(TransUnitPeer::MSG_ID, $pks, Criteria::IN);
			$objs = TransUnitPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseTransUnitPeer::DATABASE_NAME)->addTableBuilder(BaseTransUnitPeer::TABLE_NAME, BaseTransUnitPeer::getMapBuilder());

