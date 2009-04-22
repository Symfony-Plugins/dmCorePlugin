<?php


abstract class BaseDmLayoutPartPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_layout_part';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmLayoutPart';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const DM_LAYOUT_ID = 'dm_layout_part.DM_LAYOUT_ID';

	
	const TYPE = 'dm_layout_part.TYPE';

	
	const ID = 'dm_layout_part.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DmLayoutId', 'Type', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmLayoutId', 'type', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::DM_LAYOUT_ID, self::TYPE, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_layout_id', 'type', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DmLayoutId' => 0, 'Type' => 1, 'Id' => 2, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmLayoutId' => 0, 'type' => 1, 'id' => 2, ),
		BasePeer::TYPE_COLNAME => array (self::DM_LAYOUT_ID => 0, self::TYPE => 1, self::ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_layout_id' => 0, 'type' => 1, 'id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

  public static function build()
  {
    return new DmLayoutPart();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmLayoutPartMapBuilder();
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
		return str_replace(DmLayoutPartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmLayoutPartPeer::DM_LAYOUT_ID);

		$criteria->addSelectColumn(DmLayoutPartPeer::TYPE);

		$criteria->addSelectColumn(DmLayoutPartPeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmLayoutPartPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmLayoutPartPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPartPeer', $criteria, $con);
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
		$objects = DmLayoutPartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmLayoutPartPeer::populateObjects(DmLayoutPartPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPartPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmLayoutPartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmLayoutPart $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmLayoutPart) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmLayoutPart object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 2] === null) {
			return null;
		}
		return (string) $row[$startcol + 2];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmLayoutPartPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmLayoutPartPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmLayoutPartPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmLayoutPartPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmLayout(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmLayoutPartPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmLayoutPartPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmLayoutPartPeer::DM_LAYOUT_ID,), array(DmLayoutPeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPartPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmLayout(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPartPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmLayoutPartPeer::addSelectColumns($c);
		$startcol = (DmLayoutPartPeer::NUM_COLUMNS - DmLayoutPartPeer::NUM_LAZY_LOAD_COLUMNS);
		DmLayoutPeer::addSelectColumns($c);

		$c->addJoin(array(DmLayoutPartPeer::DM_LAYOUT_ID,), array(DmLayoutPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmLayoutPartPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmLayoutPartPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmLayoutPartPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmLayoutPartPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmLayoutPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmLayoutPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmLayoutPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmLayoutPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmLayoutPart($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmLayoutPartPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmLayoutPartPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmLayoutPartPeer::DM_LAYOUT_ID,), array(DmLayoutPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPartPeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPartPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmLayoutPartPeer::addSelectColumns($c);
		$startcol2 = (DmLayoutPartPeer::NUM_COLUMNS - DmLayoutPartPeer::NUM_LAZY_LOAD_COLUMNS);

		DmLayoutPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmLayoutPeer::NUM_COLUMNS - DmLayoutPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmLayoutPartPeer::DM_LAYOUT_ID,), array(DmLayoutPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmLayoutPartPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmLayoutPartPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmLayoutPartPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmLayoutPartPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmLayoutPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmLayoutPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmLayoutPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmLayoutPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmLayoutPart($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array(array('dm_layout_id', 'type'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DmLayoutPartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmLayoutPartPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmLayoutPartPeer::ID) && $criteria->keyContainsValue(DmLayoutPartPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmLayoutPartPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPartPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmLayoutPartPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmLayoutPartPeer::ID);
			$selectCriteria->add(DmLayoutPartPeer::ID, $criteria->remove(DmLayoutPartPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmLayoutPartPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPartPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += DmLayoutPartPeer::doOnDeleteCascade(new Criteria(DmLayoutPartPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmLayoutPartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmLayoutPartPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmLayoutPart) {
						DmLayoutPartPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmLayoutPartPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmLayoutPartPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += DmLayoutPartPeer::doOnDeleteCascade($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmLayoutPartPeer::clearInstancePool();
				} else { 					DmLayoutPartPeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmZonePeer::clearInstancePool();

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

				$objects = DmLayoutPartPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(DmZonePeer::DATABASE_NAME);
			
			$c->add(DmZonePeer::DM_LAYOUT_PART_ID, $obj->getId());
			$affectedRows += DmZonePeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(DmLayoutPart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmLayoutPartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmLayoutPartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmLayoutPartPeer::DATABASE_NAME, DmLayoutPartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmLayoutPartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmLayoutPartPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmLayoutPartPeer::DATABASE_NAME);
		$criteria->add(DmLayoutPartPeer::ID, $pk);

		$v = DmLayoutPartPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmLayoutPartPeer::DATABASE_NAME);
			$criteria->add(DmLayoutPartPeer::ID, $pks, Criteria::IN);
			$objs = DmLayoutPartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmLayoutPartPeer::DATABASE_NAME)->addTableBuilder(BaseDmLayoutPartPeer::TABLE_NAME, BaseDmLayoutPartPeer::getMapBuilder());

