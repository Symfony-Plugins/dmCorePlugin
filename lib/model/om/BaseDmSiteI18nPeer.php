<?php


abstract class BaseDmSiteI18nPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_site_i18n';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmSiteI18n';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const NAME = 'dm_site_i18n.NAME';

	
	const GOOGLE_FILE_NAME = 'dm_site_i18n.GOOGLE_FILE_NAME';

	
	const URCHIN_TRACKER = 'dm_site_i18n.URCHIN_TRACKER';

	
	const URCHIN_TRACKER_ACTIVE = 'dm_site_i18n.URCHIN_TRACKER_ACTIVE';

	
	const YAHOO_FILE_NAME = 'dm_site_i18n.YAHOO_FILE_NAME';

	
	const YAHOO_FILE_CONTENT = 'dm_site_i18n.YAHOO_FILE_CONTENT';

	
	const YAHOO_ACTIVE = 'dm_site_i18n.YAHOO_ACTIVE';

	
	const IS_PUBLISHED = 'dm_site_i18n.IS_PUBLISHED';

	
	const IS_INDEXABLE = 'dm_site_i18n.IS_INDEXABLE';

	
	const ID = 'dm_site_i18n.ID';

	
	const CULTURE = 'dm_site_i18n.CULTURE';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Name', 'GoogleFileName', 'UrchinTracker', 'UrchinTrackerActive', 'YahooFileName', 'YahooFileContent', 'YahooActive', 'IsPublished', 'IsIndexable', 'Id', 'Culture', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('name', 'googleFileName', 'urchinTracker', 'urchinTrackerActive', 'yahooFileName', 'yahooFileContent', 'yahooActive', 'isPublished', 'isIndexable', 'id', 'culture', ),
		BasePeer::TYPE_COLNAME => array (self::NAME, self::GOOGLE_FILE_NAME, self::URCHIN_TRACKER, self::URCHIN_TRACKER_ACTIVE, self::YAHOO_FILE_NAME, self::YAHOO_FILE_CONTENT, self::YAHOO_ACTIVE, self::IS_PUBLISHED, self::IS_INDEXABLE, self::ID, self::CULTURE, ),
		BasePeer::TYPE_FIELDNAME => array ('name', 'google_file_name', 'urchin_tracker', 'urchin_tracker_active', 'yahoo_file_name', 'yahoo_file_content', 'yahoo_active', 'is_published', 'is_indexable', 'id', 'culture', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Name' => 0, 'GoogleFileName' => 1, 'UrchinTracker' => 2, 'UrchinTrackerActive' => 3, 'YahooFileName' => 4, 'YahooFileContent' => 5, 'YahooActive' => 6, 'IsPublished' => 7, 'IsIndexable' => 8, 'Id' => 9, 'Culture' => 10, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('name' => 0, 'googleFileName' => 1, 'urchinTracker' => 2, 'urchinTrackerActive' => 3, 'yahooFileName' => 4, 'yahooFileContent' => 5, 'yahooActive' => 6, 'isPublished' => 7, 'isIndexable' => 8, 'id' => 9, 'culture' => 10, ),
		BasePeer::TYPE_COLNAME => array (self::NAME => 0, self::GOOGLE_FILE_NAME => 1, self::URCHIN_TRACKER => 2, self::URCHIN_TRACKER_ACTIVE => 3, self::YAHOO_FILE_NAME => 4, self::YAHOO_FILE_CONTENT => 5, self::YAHOO_ACTIVE => 6, self::IS_PUBLISHED => 7, self::IS_INDEXABLE => 8, self::ID => 9, self::CULTURE => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('name' => 0, 'google_file_name' => 1, 'urchin_tracker' => 2, 'urchin_tracker_active' => 3, 'yahoo_file_name' => 4, 'yahoo_file_content' => 5, 'yahoo_active' => 6, 'is_published' => 7, 'is_indexable' => 8, 'id' => 9, 'culture' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

  public static function build()
  {
    return new DmSiteI18n();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmSiteI18nMapBuilder();
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
		return str_replace(DmSiteI18nPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmSiteI18nPeer::NAME);

		$criteria->addSelectColumn(DmSiteI18nPeer::GOOGLE_FILE_NAME);

		$criteria->addSelectColumn(DmSiteI18nPeer::URCHIN_TRACKER);

		$criteria->addSelectColumn(DmSiteI18nPeer::URCHIN_TRACKER_ACTIVE);

		$criteria->addSelectColumn(DmSiteI18nPeer::YAHOO_FILE_NAME);

		$criteria->addSelectColumn(DmSiteI18nPeer::YAHOO_FILE_CONTENT);

		$criteria->addSelectColumn(DmSiteI18nPeer::YAHOO_ACTIVE);

		$criteria->addSelectColumn(DmSiteI18nPeer::IS_PUBLISHED);

		$criteria->addSelectColumn(DmSiteI18nPeer::IS_INDEXABLE);

		$criteria->addSelectColumn(DmSiteI18nPeer::ID);

		$criteria->addSelectColumn(DmSiteI18nPeer::CULTURE);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSiteI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSiteI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSiteI18nPeer', $criteria, $con);
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
		$objects = DmSiteI18nPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmSiteI18nPeer::populateObjects(DmSiteI18nPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmSiteI18nPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmSiteI18nPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmSiteI18n $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = serialize(array((string) $obj->getId(), (string) $obj->getCulture()));
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof DmSiteI18n) {
				$key = serialize(array((string) $value->getId(), (string) $value->getCulture()));
			} elseif (is_array($value) && count($value) === 2) {
								$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmSiteI18n object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 9] === null && $row[$startcol + 10] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol + 9], (string) $row[$startcol + 10]));
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmSiteI18nPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmSiteI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmSiteI18nPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmSiteI18nPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmSite(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSiteI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSiteI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmSiteI18nPeer::ID,), array(DmSitePeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSiteI18nPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmSite(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmSiteI18nPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSiteI18nPeer::addSelectColumns($c);
		$startcol = (DmSiteI18nPeer::NUM_COLUMNS - DmSiteI18nPeer::NUM_LAZY_LOAD_COLUMNS);
		DmSitePeer::addSelectColumns($c);

		$c->addJoin(array(DmSiteI18nPeer::ID,), array(DmSitePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSiteI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSiteI18nPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmSiteI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSiteI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmSitePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmSitePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmSitePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmSitePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSiteI18n($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSiteI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSiteI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmSiteI18nPeer::ID,), array(DmSitePeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSiteI18nPeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmSiteI18nPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSiteI18nPeer::addSelectColumns($c);
		$startcol2 = (DmSiteI18nPeer::NUM_COLUMNS - DmSiteI18nPeer::NUM_LAZY_LOAD_COLUMNS);

		DmSitePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmSitePeer::NUM_COLUMNS - DmSitePeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmSiteI18nPeer::ID,), array(DmSitePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSiteI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSiteI18nPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmSiteI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSiteI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmSitePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmSitePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmSitePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmSitePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSiteI18n($obj1);
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
		return DmSiteI18nPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmSiteI18nPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmSiteI18nPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmSiteI18nPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmSiteI18nPeer::ID);
			$selectCriteria->add(DmSiteI18nPeer::ID, $criteria->remove(DmSiteI18nPeer::ID), $comparison);

			$comparison = $criteria->getComparison(DmSiteI18nPeer::CULTURE);
			$selectCriteria->add(DmSiteI18nPeer::CULTURE, $criteria->remove(DmSiteI18nPeer::CULTURE), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmSiteI18nPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmSiteI18nPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DmSiteI18nPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmSiteI18nPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmSiteI18n) {
						DmSiteI18nPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
												if (count($values) == count($values, COUNT_RECURSIVE)) {
								$values = array($values);
			}

			foreach ($values as $value) {

				$criterion = $criteria->getNewCriterion(DmSiteI18nPeer::ID, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(DmSiteI18nPeer::CULTURE, $value[1]));
				$criteria->addOr($criterion);

								DmSiteI18nPeer::removeInstanceFromPool($value);
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

	
	public static function doValidate(DmSiteI18n $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmSiteI18nPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmSiteI18nPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmSiteI18nPeer::DATABASE_NAME, DmSiteI18nPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmSiteI18nPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($id, $culture, PropelPDO $con = null) {
		$key = serialize(array((string) $id, (string) $culture));
 		if (null !== ($obj = DmSiteI18nPeer::getInstanceFromPool($key))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(DmSiteI18nPeer::DATABASE_NAME);
		$criteria->add(DmSiteI18nPeer::ID, $id);
		$criteria->add(DmSiteI18nPeer::CULTURE, $culture);
		$v = DmSiteI18nPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 

Propel::getDatabaseMap(BaseDmSiteI18nPeer::DATABASE_NAME)->addTableBuilder(BaseDmSiteI18nPeer::TABLE_NAME, BaseDmSiteI18nPeer::getMapBuilder());

