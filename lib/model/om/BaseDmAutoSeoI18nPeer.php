<?php


abstract class BaseDmAutoSeoI18nPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_auto_seo_i18n';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmAutoSeoI18n';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const SLUG = 'dm_auto_seo_i18n.SLUG';

	
	const NAME = 'dm_auto_seo_i18n.NAME';

	
	const TITLE = 'dm_auto_seo_i18n.TITLE';

	
	const H1 = 'dm_auto_seo_i18n.H1';

	
	const DESCRIPTION = 'dm_auto_seo_i18n.DESCRIPTION';

	
	const STRIP_WORDS = 'dm_auto_seo_i18n.STRIP_WORDS';

	
	const ID = 'dm_auto_seo_i18n.ID';

	
	const CULTURE = 'dm_auto_seo_i18n.CULTURE';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Slug', 'Name', 'Title', 'H1', 'Description', 'StripWords', 'Id', 'Culture', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('slug', 'name', 'title', 'h1', 'description', 'stripWords', 'id', 'culture', ),
		BasePeer::TYPE_COLNAME => array (self::SLUG, self::NAME, self::TITLE, self::H1, self::DESCRIPTION, self::STRIP_WORDS, self::ID, self::CULTURE, ),
		BasePeer::TYPE_FIELDNAME => array ('slug', 'name', 'title', 'h1', 'description', 'strip_words', 'id', 'culture', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Slug' => 0, 'Name' => 1, 'Title' => 2, 'H1' => 3, 'Description' => 4, 'StripWords' => 5, 'Id' => 6, 'Culture' => 7, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('slug' => 0, 'name' => 1, 'title' => 2, 'h1' => 3, 'description' => 4, 'stripWords' => 5, 'id' => 6, 'culture' => 7, ),
		BasePeer::TYPE_COLNAME => array (self::SLUG => 0, self::NAME => 1, self::TITLE => 2, self::H1 => 3, self::DESCRIPTION => 4, self::STRIP_WORDS => 5, self::ID => 6, self::CULTURE => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('slug' => 0, 'name' => 1, 'title' => 2, 'h1' => 3, 'description' => 4, 'strip_words' => 5, 'id' => 6, 'culture' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

  public static function build()
  {
    return new DmAutoSeoI18n();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmAutoSeoI18nMapBuilder();
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
		return str_replace(DmAutoSeoI18nPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmAutoSeoI18nPeer::SLUG);

		$criteria->addSelectColumn(DmAutoSeoI18nPeer::NAME);

		$criteria->addSelectColumn(DmAutoSeoI18nPeer::TITLE);

		$criteria->addSelectColumn(DmAutoSeoI18nPeer::H1);

		$criteria->addSelectColumn(DmAutoSeoI18nPeer::DESCRIPTION);

		$criteria->addSelectColumn(DmAutoSeoI18nPeer::STRIP_WORDS);

		$criteria->addSelectColumn(DmAutoSeoI18nPeer::ID);

		$criteria->addSelectColumn(DmAutoSeoI18nPeer::CULTURE);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmAutoSeoI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmAutoSeoI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $criteria, $con);
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
		$objects = DmAutoSeoI18nPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmAutoSeoI18nPeer::populateObjects(DmAutoSeoI18nPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmAutoSeoI18nPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmAutoSeoI18n $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmAutoSeoI18n) {
				$key = serialize(array((string) $value->getId(), (string) $value->getCulture()));
			} elseif (is_array($value) && count($value) === 2) {
								$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmAutoSeoI18n object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 6] === null && $row[$startcol + 7] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol + 6], (string) $row[$startcol + 7]));
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmAutoSeoI18nPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmAutoSeoI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmAutoSeoI18nPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmAutoSeoI18nPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmAutoSeo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmAutoSeoI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmAutoSeoI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmAutoSeoI18nPeer::ID,), array(DmAutoSeoPeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmAutoSeo(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmAutoSeoI18nPeer::addSelectColumns($c);
		$startcol = (DmAutoSeoI18nPeer::NUM_COLUMNS - DmAutoSeoI18nPeer::NUM_LAZY_LOAD_COLUMNS);
		DmAutoSeoPeer::addSelectColumns($c);

		$c->addJoin(array(DmAutoSeoI18nPeer::ID,), array(DmAutoSeoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmAutoSeoI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmAutoSeoI18nPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmAutoSeoI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmAutoSeoI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmAutoSeoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmAutoSeoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmAutoSeoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmAutoSeoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmAutoSeoI18n($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmAutoSeoI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmAutoSeoI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmAutoSeoI18nPeer::ID,), array(DmAutoSeoPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmAutoSeoI18nPeer::addSelectColumns($c);
		$startcol2 = (DmAutoSeoI18nPeer::NUM_COLUMNS - DmAutoSeoI18nPeer::NUM_LAZY_LOAD_COLUMNS);

		DmAutoSeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmAutoSeoPeer::NUM_COLUMNS - DmAutoSeoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmAutoSeoI18nPeer::ID,), array(DmAutoSeoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmAutoSeoI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmAutoSeoI18nPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmAutoSeoI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmAutoSeoI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmAutoSeoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmAutoSeoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmAutoSeoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmAutoSeoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmAutoSeoI18n($obj1);
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
		return DmAutoSeoI18nPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

		
    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmAutoSeoI18nPeer::ID);
			$selectCriteria->add(DmAutoSeoI18nPeer::ID, $criteria->remove(DmAutoSeoI18nPeer::ID), $comparison);

			$comparison = $criteria->getComparison(DmAutoSeoI18nPeer::CULTURE);
			$selectCriteria->add(DmAutoSeoI18nPeer::CULTURE, $criteria->remove(DmAutoSeoI18nPeer::CULTURE), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmAutoSeoI18nPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoI18nPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DmAutoSeoI18nPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmAutoSeoI18nPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmAutoSeoI18n) {
						DmAutoSeoI18nPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
												if (count($values) == count($values, COUNT_RECURSIVE)) {
								$values = array($values);
			}

			foreach ($values as $value) {

				$criterion = $criteria->getNewCriterion(DmAutoSeoI18nPeer::ID, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(DmAutoSeoI18nPeer::CULTURE, $value[1]));
				$criteria->addOr($criterion);

								DmAutoSeoI18nPeer::removeInstanceFromPool($value);
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

	
	public static function doValidate(DmAutoSeoI18n $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmAutoSeoI18nPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmAutoSeoI18nPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmAutoSeoI18nPeer::DATABASE_NAME, DmAutoSeoI18nPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmAutoSeoI18nPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($id, $culture, PropelPDO $con = null) {
		$key = serialize(array((string) $id, (string) $culture));
 		if (null !== ($obj = DmAutoSeoI18nPeer::getInstanceFromPool($key))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(DmAutoSeoI18nPeer::DATABASE_NAME);
		$criteria->add(DmAutoSeoI18nPeer::ID, $id);
		$criteria->add(DmAutoSeoI18nPeer::CULTURE, $culture);
		$v = DmAutoSeoI18nPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 

Propel::getDatabaseMap(BaseDmAutoSeoI18nPeer::DATABASE_NAME)->addTableBuilder(BaseDmAutoSeoI18nPeer::TABLE_NAME, BaseDmAutoSeoI18nPeer::getMapBuilder());

