<?php


abstract class BaseDmSlotPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_slot';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmSlot';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const DM_ZONE_ID = 'dm_slot.DM_ZONE_ID';

	
	const TYPE = 'dm_slot.TYPE';

	
	const MODULE = 'dm_slot.MODULE';

	
	const ACTION = 'dm_slot.ACTION';

	
	const VALUE = 'dm_slot.VALUE';

	
	const RANK = 'dm_slot.RANK';

	
	const UPDATED_AT = 'dm_slot.UPDATED_AT';

	
	const ID = 'dm_slot.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DmZoneId', 'Type', 'Module', 'Action', 'Value', 'Rank', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmZoneId', 'type', 'module', 'action', 'value', 'rank', 'updatedAt', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::DM_ZONE_ID, self::TYPE, self::MODULE, self::ACTION, self::VALUE, self::RANK, self::UPDATED_AT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_zone_id', 'type', 'module', 'action', 'value', 'rank', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DmZoneId' => 0, 'Type' => 1, 'Module' => 2, 'Action' => 3, 'Value' => 4, 'Rank' => 5, 'UpdatedAt' => 6, 'Id' => 7, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmZoneId' => 0, 'type' => 1, 'module' => 2, 'action' => 3, 'value' => 4, 'rank' => 5, 'updatedAt' => 6, 'id' => 7, ),
		BasePeer::TYPE_COLNAME => array (self::DM_ZONE_ID => 0, self::TYPE => 1, self::MODULE => 2, self::ACTION => 3, self::VALUE => 4, self::RANK => 5, self::UPDATED_AT => 6, self::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_zone_id' => 0, 'type' => 1, 'module' => 2, 'action' => 3, 'value' => 4, 'rank' => 5, 'updated_at' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

  public static function build()
  {
    return new DmSlot();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmSlotMapBuilder();
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
		return str_replace(DmSlotPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmSlotPeer::DM_ZONE_ID);

		$criteria->addSelectColumn(DmSlotPeer::TYPE);

		$criteria->addSelectColumn(DmSlotPeer::MODULE);

		$criteria->addSelectColumn(DmSlotPeer::ACTION);

		$criteria->addSelectColumn(DmSlotPeer::VALUE);

		$criteria->addSelectColumn(DmSlotPeer::RANK);

		$criteria->addSelectColumn(DmSlotPeer::UPDATED_AT);

		$criteria->addSelectColumn(DmSlotPeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSlotPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSlotPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmSlotPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSlotPeer', $criteria, $con);
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
		$objects = DmSlotPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmSlotPeer::populateObjects(DmSlotPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSlotPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmSlotPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmSlotPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmSlot $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmSlot) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmSlot object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 7] === null) {
			return null;
		}
		return (string) $row[$startcol + 7];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmSlotPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmSlotPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmSlotPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmSlotPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmZone(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSlotPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSlotPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmSlotPeer::DM_ZONE_ID,), array(DmZonePeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmSlotPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSlotPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmZone(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmSlotPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmSlotPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSlotPeer::addSelectColumns($c);
		$startcol = (DmSlotPeer::NUM_COLUMNS - DmSlotPeer::NUM_LAZY_LOAD_COLUMNS);
		DmZonePeer::addSelectColumns($c);

		$c->addJoin(array(DmSlotPeer::DM_ZONE_ID,), array(DmZonePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSlotPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSlotPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmSlotPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSlotPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmZonePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmZonePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmZonePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmZonePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSlot($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSlotPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSlotPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmSlotPeer::DM_ZONE_ID,), array(DmZonePeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmSlotPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSlotPeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmSlotPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmSlotPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSlotPeer::addSelectColumns($c);
		$startcol2 = (DmSlotPeer::NUM_COLUMNS - DmSlotPeer::NUM_LAZY_LOAD_COLUMNS);

		DmZonePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmZonePeer::NUM_COLUMNS - DmZonePeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmSlotPeer::DM_ZONE_ID,), array(DmZonePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSlotPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSlotPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmSlotPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSlotPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmZonePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmZonePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmZonePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmZonePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSlot($obj1);
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
		return DmSlotPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSlotPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmSlotPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmSlotPeer::ID) && $criteria->keyContainsValue(DmSlotPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmSlotPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmSlotPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmSlotPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSlotPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmSlotPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmSlotPeer::ID);
			$selectCriteria->add(DmSlotPeer::ID, $criteria->remove(DmSlotPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmSlotPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmSlotPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DmSlotPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmSlotPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmSlot) {
						DmSlotPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmSlotPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmSlotPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(DmSlot $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmSlotPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmSlotPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmSlotPeer::DATABASE_NAME, DmSlotPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmSlotPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmSlotPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmSlotPeer::DATABASE_NAME);
		$criteria->add(DmSlotPeer::ID, $pk);

		$v = DmSlotPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmSlotPeer::DATABASE_NAME);
			$criteria->add(DmSlotPeer::ID, $pks, Criteria::IN);
			$objs = DmSlotPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmSlotPeer::DATABASE_NAME)->addTableBuilder(BaseDmSlotPeer::TABLE_NAME, BaseDmSlotPeer::getMapBuilder());

