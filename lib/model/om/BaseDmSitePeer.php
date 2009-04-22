<?php


abstract class BaseDmSitePeer {

	
	const IS_I18N = true;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_site';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmSite';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const XITI = 'dm_site.XITI';

	
	const XITI_ACTIVE = 'dm_site.XITI_ACTIVE';

	
	const GDATA_KEY = 'dm_site.GDATA_KEY';

	
	const GMAP_KEY = 'dm_site.GMAP_KEY';

	
	const TRANSLATION = 'dm_site.TRANSLATION';

	
	const LANGUAGE_TEST = 'dm_site.LANGUAGE_TEST';

	
	const REFRESH_INDEX = 'dm_site.REFRESH_INDEX';

	
	const JPG_QUALITY = 'dm_site.JPG_QUALITY';

	
	const IMAGE = 'dm_site.IMAGE';

	
	const IS_FIRST_LAUNCH = 'dm_site.IS_FIRST_LAUNCH';

	
	const IS_WORKING_COPY = 'dm_site.IS_WORKING_COPY';

	
	const INDEX_POPULATED_AT = 'dm_site.INDEX_POPULATED_AT';

	
	const UPDATED_AT = 'dm_site.UPDATED_AT';

	
	const ID = 'dm_site.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Xiti', 'XitiActive', 'GdataKey', 'GmapKey', 'Translation', 'LanguageTest', 'RefreshIndex', 'JpgQuality', 'Image', 'IsFirstLaunch', 'IsWorkingCopy', 'IndexPopulatedAt', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('xiti', 'xitiActive', 'gdataKey', 'gmapKey', 'translation', 'languageTest', 'refreshIndex', 'jpgQuality', 'image', 'isFirstLaunch', 'isWorkingCopy', 'indexPopulatedAt', 'updatedAt', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::XITI, self::XITI_ACTIVE, self::GDATA_KEY, self::GMAP_KEY, self::TRANSLATION, self::LANGUAGE_TEST, self::REFRESH_INDEX, self::JPG_QUALITY, self::IMAGE, self::IS_FIRST_LAUNCH, self::IS_WORKING_COPY, self::INDEX_POPULATED_AT, self::UPDATED_AT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('xiti', 'xiti_active', 'gdata_key', 'gmap_key', 'translation', 'language_test', 'refresh_index', 'jpg_quality', 'image', 'is_first_launch', 'is_working_copy', 'index_populated_at', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Xiti' => 0, 'XitiActive' => 1, 'GdataKey' => 2, 'GmapKey' => 3, 'Translation' => 4, 'LanguageTest' => 5, 'RefreshIndex' => 6, 'JpgQuality' => 7, 'Image' => 8, 'IsFirstLaunch' => 9, 'IsWorkingCopy' => 10, 'IndexPopulatedAt' => 11, 'UpdatedAt' => 12, 'Id' => 13, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('xiti' => 0, 'xitiActive' => 1, 'gdataKey' => 2, 'gmapKey' => 3, 'translation' => 4, 'languageTest' => 5, 'refreshIndex' => 6, 'jpgQuality' => 7, 'image' => 8, 'isFirstLaunch' => 9, 'isWorkingCopy' => 10, 'indexPopulatedAt' => 11, 'updatedAt' => 12, 'id' => 13, ),
		BasePeer::TYPE_COLNAME => array (self::XITI => 0, self::XITI_ACTIVE => 1, self::GDATA_KEY => 2, self::GMAP_KEY => 3, self::TRANSLATION => 4, self::LANGUAGE_TEST => 5, self::REFRESH_INDEX => 6, self::JPG_QUALITY => 7, self::IMAGE => 8, self::IS_FIRST_LAUNCH => 9, self::IS_WORKING_COPY => 10, self::INDEX_POPULATED_AT => 11, self::UPDATED_AT => 12, self::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('xiti' => 0, 'xiti_active' => 1, 'gdata_key' => 2, 'gmap_key' => 3, 'translation' => 4, 'language_test' => 5, 'refresh_index' => 6, 'jpg_quality' => 7, 'image' => 8, 'is_first_launch' => 9, 'is_working_copy' => 10, 'index_populated_at' => 11, 'updated_at' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

  public static function build()
  {
    return new DmSite();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmSiteMapBuilder();
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
		return str_replace(DmSitePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmSitePeer::XITI);

		$criteria->addSelectColumn(DmSitePeer::XITI_ACTIVE);

		$criteria->addSelectColumn(DmSitePeer::GDATA_KEY);

		$criteria->addSelectColumn(DmSitePeer::GMAP_KEY);

		$criteria->addSelectColumn(DmSitePeer::TRANSLATION);

		$criteria->addSelectColumn(DmSitePeer::LANGUAGE_TEST);

		$criteria->addSelectColumn(DmSitePeer::REFRESH_INDEX);

		$criteria->addSelectColumn(DmSitePeer::JPG_QUALITY);

		$criteria->addSelectColumn(DmSitePeer::IMAGE);

		$criteria->addSelectColumn(DmSitePeer::IS_FIRST_LAUNCH);

		$criteria->addSelectColumn(DmSitePeer::IS_WORKING_COPY);

		$criteria->addSelectColumn(DmSitePeer::INDEX_POPULATED_AT);

		$criteria->addSelectColumn(DmSitePeer::UPDATED_AT);

		$criteria->addSelectColumn(DmSitePeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSitePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSitePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmSitePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSitePeer', $criteria, $con);
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
		$objects = DmSitePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmSitePeer::populateObjects(DmSitePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSitePeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmSitePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmSitePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmSite $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmSite) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmSite object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 13] === null) {
			return null;
		}
		return (string) $row[$startcol + 13];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmSitePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmSitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmSitePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmSitePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

  
  public static function doSelectWithI18n(Criteria $c, $culture = null, PropelPDO $con = null)
  {
        $c = clone $c;
    if ($culture === null)
    {
      $culture = sfPropel::getDefaultCulture();
    }


    foreach (sfMixer::getCallables('BaseDmSitePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmSitePeer', $c, $con);
    }


        if ($c->getDbName() == Propel::getDefaultDB())
    {
      $c->setDbName(self::DATABASE_NAME);
    }

    DmSitePeer::addSelectColumns($c);
    $startcol = (DmSitePeer::NUM_COLUMNS - DmSitePeer::NUM_LAZY_LOAD_COLUMNS);

    DmSiteI18nPeer::addSelectColumns($c);

    $c->addJoin(DmSitePeer::ID, DmSiteI18nPeer::ID);
    $c->add(DmSiteI18nPeer::CULTURE, $culture);

    $stmt = BasePeer::doSelect($c, $con);
    $results = array();

    while($row = $stmt->fetch(PDO::FETCH_NUM)) {

      $omClass = DmSitePeer::getOMClass();

      $cls = Propel::importClass($omClass);
      $obj1 = new $cls();
      $obj1->hydrate($row);
      $obj1->setCulture($culture);

      $omClass = DmSiteI18nPeer::getOMClass();

      $cls = Propel::importClass($omClass);
      $obj2 = new $cls();
      $obj2->hydrate($row, $startcol);

      $obj1->setDmSiteI18nForCulture($obj2, $culture);
      $obj2->setDmSite($obj1);

      $results[] = $obj1;
    }
    return $results;
  }


  
  public static function getI18nModel()
  {
    return 'DmSiteI18n';
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
		return DmSitePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSitePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmSitePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmSitePeer::ID) && $criteria->keyContainsValue(DmSitePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmSitePeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmSitePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmSitePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSitePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmSitePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmSitePeer::ID);
			$selectCriteria->add(DmSitePeer::ID, $criteria->remove(DmSitePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmSitePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmSitePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += DmSitePeer::doOnDeleteCascade(new Criteria(DmSitePeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmSitePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmSitePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmSite) {
						DmSitePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmSitePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmSitePeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += DmSitePeer::doOnDeleteCascade($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmSitePeer::clearInstancePool();
				} else { 					DmSitePeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmSiteI18nPeer::clearInstancePool();

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

				$objects = DmSitePeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(DmSiteI18nPeer::DATABASE_NAME);
			
			$c->add(DmSiteI18nPeer::ID, $obj->getId());
			$affectedRows += DmSiteI18nPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(DmSite $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmSitePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmSitePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmSitePeer::DATABASE_NAME, DmSitePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmSitePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmSitePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmSitePeer::DATABASE_NAME);
		$criteria->add(DmSitePeer::ID, $pk);

		$v = DmSitePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmSitePeer::DATABASE_NAME);
			$criteria->add(DmSitePeer::ID, $pks, Criteria::IN);
			$objs = DmSitePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmSitePeer::DATABASE_NAME)->addTableBuilder(BaseDmSitePeer::TABLE_NAME, BaseDmSitePeer::getMapBuilder());

