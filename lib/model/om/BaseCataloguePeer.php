<?php


abstract class BaseCataloguePeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catalogue';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.Catalogue';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const CAT_ID = 'catalogue.CAT_ID';

	
	const NAME = 'catalogue.NAME';

	
	const SOURCE_LANG = 'catalogue.SOURCE_LANG';

	
	const TARGET_LANG = 'catalogue.TARGET_LANG';

	
	const DATE_CREATED = 'catalogue.DATE_CREATED';

	
	const DATE_MODIFIED = 'catalogue.DATE_MODIFIED';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CatId', 'Name', 'SourceLang', 'TargetLang', 'DateCreated', 'DateModified', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('catId', 'name', 'sourceLang', 'targetLang', 'dateCreated', 'dateModified', ),
		BasePeer::TYPE_COLNAME => array (self::CAT_ID, self::NAME, self::SOURCE_LANG, self::TARGET_LANG, self::DATE_CREATED, self::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('cat_id', 'name', 'source_lang', 'target_lang', 'date_created', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CatId' => 0, 'Name' => 1, 'SourceLang' => 2, 'TargetLang' => 3, 'DateCreated' => 4, 'DateModified' => 5, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('catId' => 0, 'name' => 1, 'sourceLang' => 2, 'targetLang' => 3, 'dateCreated' => 4, 'dateModified' => 5, ),
		BasePeer::TYPE_COLNAME => array (self::CAT_ID => 0, self::NAME => 1, self::SOURCE_LANG => 2, self::TARGET_LANG => 3, self::DATE_CREATED => 4, self::DATE_MODIFIED => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('cat_id' => 0, 'name' => 1, 'source_lang' => 2, 'target_lang' => 3, 'date_created' => 4, 'date_modified' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

  public static function build()
  {
    return new Catalogue();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new CatalogueMapBuilder();
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
		return str_replace(CataloguePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CataloguePeer::CAT_ID);

		$criteria->addSelectColumn(CataloguePeer::NAME);

		$criteria->addSelectColumn(CataloguePeer::SOURCE_LANG);

		$criteria->addSelectColumn(CataloguePeer::TARGET_LANG);

		$criteria->addSelectColumn(CataloguePeer::DATE_CREATED);

		$criteria->addSelectColumn(CataloguePeer::DATE_MODIFIED);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(CataloguePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CataloguePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseCataloguePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseCataloguePeer', $criteria, $con);
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
		$objects = CataloguePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return CataloguePeer::populateObjects(CataloguePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseCataloguePeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseCataloguePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CataloguePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Catalogue $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getCatId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Catalogue) {
				$key = (string) $value->getCatId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Catalogue object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = CataloguePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CataloguePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CataloguePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CataloguePeer::addInstanceToPool($obj, $key);
			} 		}
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
		return CataloguePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseCataloguePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCataloguePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(CataloguePeer::CAT_ID) && $criteria->keyContainsValue(CataloguePeer::CAT_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CataloguePeer::CAT_ID.')');
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

		
    foreach (sfMixer::getCallables('BaseCataloguePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseCataloguePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseCataloguePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCataloguePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(CataloguePeer::CAT_ID);
			$selectCriteria->add(CataloguePeer::CAT_ID, $criteria->remove(CataloguePeer::CAT_ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseCataloguePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseCataloguePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(CataloguePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												CataloguePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Catalogue) {
						CataloguePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CataloguePeer::CAT_ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								CataloguePeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Catalogue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CataloguePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CataloguePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CataloguePeer::DATABASE_NAME, CataloguePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CataloguePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CataloguePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CataloguePeer::DATABASE_NAME);
		$criteria->add(CataloguePeer::CAT_ID, $pk);

		$v = CataloguePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CataloguePeer::DATABASE_NAME);
			$criteria->add(CataloguePeer::CAT_ID, $pks, Criteria::IN);
			$objs = CataloguePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseCataloguePeer::DATABASE_NAME)->addTableBuilder(BaseCataloguePeer::TABLE_NAME, BaseCataloguePeer::getMapBuilder());

