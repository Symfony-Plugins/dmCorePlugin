<?php


abstract class BaseDmAutoSeoPeer {

	
	const IS_I18N = true;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_auto_seo';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmAutoSeo';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const MODULE = 'dm_auto_seo.MODULE';

	
	const ACTION = 'dm_auto_seo.ACTION';

	
	const ID = 'dm_auto_seo.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Module', 'Action', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('module', 'action', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::MODULE, self::ACTION, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('module', 'action', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Module' => 0, 'Action' => 1, 'Id' => 2, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('module' => 0, 'action' => 1, 'id' => 2, ),
		BasePeer::TYPE_COLNAME => array (self::MODULE => 0, self::ACTION => 1, self::ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('module' => 0, 'action' => 1, 'id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

  public static function build()
  {
    return new DmAutoSeo();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmAutoSeoMapBuilder();
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
		return str_replace(DmAutoSeoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmAutoSeoPeer::MODULE);

		$criteria->addSelectColumn(DmAutoSeoPeer::ACTION);

		$criteria->addSelectColumn(DmAutoSeoPeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmAutoSeoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmAutoSeoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmAutoSeoPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoPeer', $criteria, $con);
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
		$objects = DmAutoSeoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmAutoSeoPeer::populateObjects(DmAutoSeoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmAutoSeoPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmAutoSeoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmAutoSeo $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmAutoSeo) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmAutoSeo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = DmAutoSeoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmAutoSeoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmAutoSeoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmAutoSeoPeer::addInstanceToPool($obj, $key);
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


    foreach (sfMixer::getCallables('BaseDmAutoSeoPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoPeer', $c, $con);
    }


        if ($c->getDbName() == Propel::getDefaultDB())
    {
      $c->setDbName(self::DATABASE_NAME);
    }

    DmAutoSeoPeer::addSelectColumns($c);
    $startcol = (DmAutoSeoPeer::NUM_COLUMNS - DmAutoSeoPeer::NUM_LAZY_LOAD_COLUMNS);

    DmAutoSeoI18nPeer::addSelectColumns($c);

    $c->addJoin(DmAutoSeoPeer::ID, DmAutoSeoI18nPeer::ID);
    $c->add(DmAutoSeoI18nPeer::CULTURE, $culture);

    $stmt = BasePeer::doSelect($c, $con);
    $results = array();

    while($row = $stmt->fetch(PDO::FETCH_NUM)) {

      $omClass = DmAutoSeoPeer::getOMClass();

      $cls = Propel::importClass($omClass);
      $obj1 = new $cls();
      $obj1->hydrate($row);
      $obj1->setCulture($culture);

      $omClass = DmAutoSeoI18nPeer::getOMClass();

      $cls = Propel::importClass($omClass);
      $obj2 = new $cls();
      $obj2->hydrate($row, $startcol);

      $obj1->setDmAutoSeoI18nForCulture($obj2, $culture);
      $obj2->setDmAutoSeo($obj1);

      $results[] = $obj1;
    }
    return $results;
  }


  
  public static function getI18nModel()
  {
    return 'DmAutoSeoI18n';
  }


  static public function getUniqueColumnNames()
  {
    return array(array('module', 'action'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DmAutoSeoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmAutoSeoPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmAutoSeoPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmAutoSeoPeer::ID) && $criteria->keyContainsValue(DmAutoSeoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmAutoSeoPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmAutoSeoPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmAutoSeoPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmAutoSeoPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmAutoSeoPeer::ID);
			$selectCriteria->add(DmAutoSeoPeer::ID, $criteria->remove(DmAutoSeoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmAutoSeoPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmAutoSeoPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += DmAutoSeoPeer::doOnDeleteCascade(new Criteria(DmAutoSeoPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmAutoSeoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmAutoSeoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmAutoSeo) {
						DmAutoSeoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmAutoSeoPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmAutoSeoPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += DmAutoSeoPeer::doOnDeleteCascade($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmAutoSeoPeer::clearInstancePool();
				} else { 					DmAutoSeoPeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmAutoSeoI18nPeer::clearInstancePool();

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

				$objects = DmAutoSeoPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(DmAutoSeoI18nPeer::DATABASE_NAME);
			
			$c->add(DmAutoSeoI18nPeer::ID, $obj->getId());
			$affectedRows += DmAutoSeoI18nPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(DmAutoSeo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmAutoSeoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmAutoSeoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmAutoSeoPeer::DATABASE_NAME, DmAutoSeoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmAutoSeoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmAutoSeoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmAutoSeoPeer::DATABASE_NAME);
		$criteria->add(DmAutoSeoPeer::ID, $pk);

		$v = DmAutoSeoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmAutoSeoPeer::DATABASE_NAME);
			$criteria->add(DmAutoSeoPeer::ID, $pks, Criteria::IN);
			$objs = DmAutoSeoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmAutoSeoPeer::DATABASE_NAME)->addTableBuilder(BaseDmAutoSeoPeer::TABLE_NAME, BaseDmAutoSeoPeer::getMapBuilder());

