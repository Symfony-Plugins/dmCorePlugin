<?php


abstract class BaseDmPageI18nPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_page_i18n';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmPageI18n';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const SLUG = 'dm_page_i18n.SLUG';

	
	const SLUG_CACHE = 'dm_page_i18n.SLUG_CACHE';

	
	const NAME = 'dm_page_i18n.NAME';

	
	const NAME_CACHE = 'dm_page_i18n.NAME_CACHE';

	
	const TITLE = 'dm_page_i18n.TITLE';

	
	const H1 = 'dm_page_i18n.H1';

	
	const DESCRIPTION = 'dm_page_i18n.DESCRIPTION';

	
	const ID = 'dm_page_i18n.ID';

	
	const CULTURE = 'dm_page_i18n.CULTURE';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Slug', 'SlugCache', 'Name', 'NameCache', 'Title', 'H1', 'Description', 'Id', 'Culture', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('slug', 'slugCache', 'name', 'nameCache', 'title', 'h1', 'description', 'id', 'culture', ),
		BasePeer::TYPE_COLNAME => array (self::SLUG, self::SLUG_CACHE, self::NAME, self::NAME_CACHE, self::TITLE, self::H1, self::DESCRIPTION, self::ID, self::CULTURE, ),
		BasePeer::TYPE_FIELDNAME => array ('slug', 'slug_cache', 'name', 'name_cache', 'title', 'h1', 'description', 'id', 'culture', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Slug' => 0, 'SlugCache' => 1, 'Name' => 2, 'NameCache' => 3, 'Title' => 4, 'H1' => 5, 'Description' => 6, 'Id' => 7, 'Culture' => 8, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('slug' => 0, 'slugCache' => 1, 'name' => 2, 'nameCache' => 3, 'title' => 4, 'h1' => 5, 'description' => 6, 'id' => 7, 'culture' => 8, ),
		BasePeer::TYPE_COLNAME => array (self::SLUG => 0, self::SLUG_CACHE => 1, self::NAME => 2, self::NAME_CACHE => 3, self::TITLE => 4, self::H1 => 5, self::DESCRIPTION => 6, self::ID => 7, self::CULTURE => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('slug' => 0, 'slug_cache' => 1, 'name' => 2, 'name_cache' => 3, 'title' => 4, 'h1' => 5, 'description' => 6, 'id' => 7, 'culture' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

  public static function build()
  {
    return new DmPageI18n();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmPageI18nMapBuilder();
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
		return str_replace(DmPageI18nPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmPageI18nPeer::SLUG);

		$criteria->addSelectColumn(DmPageI18nPeer::SLUG_CACHE);

		$criteria->addSelectColumn(DmPageI18nPeer::NAME);

		$criteria->addSelectColumn(DmPageI18nPeer::NAME_CACHE);

		$criteria->addSelectColumn(DmPageI18nPeer::TITLE);

		$criteria->addSelectColumn(DmPageI18nPeer::H1);

		$criteria->addSelectColumn(DmPageI18nPeer::DESCRIPTION);

		$criteria->addSelectColumn(DmPageI18nPeer::ID);

		$criteria->addSelectColumn(DmPageI18nPeer::CULTURE);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmPageI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmPageI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmPageI18nPeer', $criteria, $con);
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
		$objects = DmPageI18nPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmPageI18nPeer::populateObjects(DmPageI18nPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmPageI18nPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmPageI18nPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmPageI18n $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmPageI18n) {
				$key = serialize(array((string) $value->getId(), (string) $value->getCulture()));
			} elseif (is_array($value) && count($value) === 2) {
								$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmPageI18n object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 7] === null && $row[$startcol + 8] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol + 7], (string) $row[$startcol + 8]));
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmPageI18nPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmPageI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmPageI18nPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmPageI18nPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmPage(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmPageI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmPageI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmPageI18nPeer::ID,), array(DmPagePeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmPageI18nPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmPage(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmPageI18nPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmPageI18nPeer::addSelectColumns($c);
		$startcol = (DmPageI18nPeer::NUM_COLUMNS - DmPageI18nPeer::NUM_LAZY_LOAD_COLUMNS);
		DmPagePeer::addSelectColumns($c);

		$c->addJoin(array(DmPageI18nPeer::ID,), array(DmPagePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmPageI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmPageI18nPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmPageI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmPageI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmPagePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmPagePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmPagePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmPagePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmPageI18n($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmPageI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmPageI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmPageI18nPeer::ID,), array(DmPagePeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmPageI18nPeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmPageI18nPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmPageI18nPeer::addSelectColumns($c);
		$startcol2 = (DmPageI18nPeer::NUM_COLUMNS - DmPageI18nPeer::NUM_LAZY_LOAD_COLUMNS);

		DmPagePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmPagePeer::NUM_COLUMNS - DmPagePeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmPageI18nPeer::ID,), array(DmPagePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmPageI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmPageI18nPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmPageI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmPageI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmPagePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmPagePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmPagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmPagePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmPageI18n($obj1);
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
		return DmPageI18nPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmPageI18nPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

		
    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmPageI18nPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmPageI18nPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmPageI18nPeer::ID);
			$selectCriteria->add(DmPageI18nPeer::ID, $criteria->remove(DmPageI18nPeer::ID), $comparison);

			$comparison = $criteria->getComparison(DmPageI18nPeer::CULTURE);
			$selectCriteria->add(DmPageI18nPeer::CULTURE, $criteria->remove(DmPageI18nPeer::CULTURE), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmPageI18nPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmPageI18nPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DmPageI18nPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmPageI18nPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmPageI18n) {
						DmPageI18nPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
												if (count($values) == count($values, COUNT_RECURSIVE)) {
								$values = array($values);
			}

			foreach ($values as $value) {

				$criterion = $criteria->getNewCriterion(DmPageI18nPeer::ID, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(DmPageI18nPeer::CULTURE, $value[1]));
				$criteria->addOr($criterion);

								DmPageI18nPeer::removeInstanceFromPool($value);
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

	
	public static function doValidate(DmPageI18n $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmPageI18nPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmPageI18nPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmPageI18nPeer::DATABASE_NAME, DmPageI18nPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmPageI18nPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($id, $culture, PropelPDO $con = null) {
		$key = serialize(array((string) $id, (string) $culture));
 		if (null !== ($obj = DmPageI18nPeer::getInstanceFromPool($key))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmPageI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(DmPageI18nPeer::DATABASE_NAME);
		$criteria->add(DmPageI18nPeer::ID, $id);
		$criteria->add(DmPageI18nPeer::CULTURE, $culture);
		$v = DmPageI18nPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 

Propel::getDatabaseMap(BaseDmPageI18nPeer::DATABASE_NAME)->addTableBuilder(BaseDmPageI18nPeer::TABLE_NAME, BaseDmPageI18nPeer::getMapBuilder());

