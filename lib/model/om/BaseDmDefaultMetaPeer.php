<?php


abstract class BaseDmDefaultMetaPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_default_meta';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmDefaultMeta';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const TITLE_PREFIX = 'dm_default_meta.TITLE_PREFIX';

	
	const TITLE_SUFFIX = 'dm_default_meta.TITLE_SUFFIX';

	
	const DESCRIPTION_PREFIX = 'dm_default_meta.DESCRIPTION_PREFIX';

	
	const DESCRIPTION_SUFFIX = 'dm_default_meta.DESCRIPTION_SUFFIX';

	
	const IS_APPROVED = 'dm_default_meta.IS_APPROVED';

	
	const UPDATED_AT = 'dm_default_meta.UPDATED_AT';

	
	const ID = 'dm_default_meta.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('TitlePrefix', 'TitleSuffix', 'DescriptionPrefix', 'DescriptionSuffix', 'IsApproved', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('titlePrefix', 'titleSuffix', 'descriptionPrefix', 'descriptionSuffix', 'isApproved', 'updatedAt', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::TITLE_PREFIX, self::TITLE_SUFFIX, self::DESCRIPTION_PREFIX, self::DESCRIPTION_SUFFIX, self::IS_APPROVED, self::UPDATED_AT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('title_prefix', 'title_suffix', 'description_prefix', 'description_suffix', 'is_approved', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('TitlePrefix' => 0, 'TitleSuffix' => 1, 'DescriptionPrefix' => 2, 'DescriptionSuffix' => 3, 'IsApproved' => 4, 'UpdatedAt' => 5, 'Id' => 6, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('titlePrefix' => 0, 'titleSuffix' => 1, 'descriptionPrefix' => 2, 'descriptionSuffix' => 3, 'isApproved' => 4, 'updatedAt' => 5, 'id' => 6, ),
		BasePeer::TYPE_COLNAME => array (self::TITLE_PREFIX => 0, self::TITLE_SUFFIX => 1, self::DESCRIPTION_PREFIX => 2, self::DESCRIPTION_SUFFIX => 3, self::IS_APPROVED => 4, self::UPDATED_AT => 5, self::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('title_prefix' => 0, 'title_suffix' => 1, 'description_prefix' => 2, 'description_suffix' => 3, 'is_approved' => 4, 'updated_at' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

  public static function build()
  {
    return new DmDefaultMeta();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmDefaultMetaMapBuilder();
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
		return str_replace(DmDefaultMetaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmDefaultMetaPeer::TITLE_PREFIX);

		$criteria->addSelectColumn(DmDefaultMetaPeer::TITLE_SUFFIX);

		$criteria->addSelectColumn(DmDefaultMetaPeer::DESCRIPTION_PREFIX);

		$criteria->addSelectColumn(DmDefaultMetaPeer::DESCRIPTION_SUFFIX);

		$criteria->addSelectColumn(DmDefaultMetaPeer::IS_APPROVED);

		$criteria->addSelectColumn(DmDefaultMetaPeer::UPDATED_AT);

		$criteria->addSelectColumn(DmDefaultMetaPeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmDefaultMetaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmDefaultMetaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmDefaultMetaPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmDefaultMetaPeer', $criteria, $con);
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
		$objects = DmDefaultMetaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmDefaultMetaPeer::populateObjects(DmDefaultMetaPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmDefaultMetaPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmDefaultMetaPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmDefaultMetaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmDefaultMeta $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmDefaultMeta) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmDefaultMeta object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 6] === null) {
			return null;
		}
		return (string) $row[$startcol + 6];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmDefaultMetaPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmDefaultMetaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmDefaultMetaPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmDefaultMetaPeer::addInstanceToPool($obj, $key);
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
		return DmDefaultMetaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmDefaultMetaPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmDefaultMetaPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmDefaultMetaPeer::ID) && $criteria->keyContainsValue(DmDefaultMetaPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmDefaultMetaPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmDefaultMetaPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmDefaultMetaPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmDefaultMetaPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmDefaultMetaPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmDefaultMetaPeer::ID);
			$selectCriteria->add(DmDefaultMetaPeer::ID, $criteria->remove(DmDefaultMetaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmDefaultMetaPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmDefaultMetaPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DmDefaultMetaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmDefaultMetaPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmDefaultMeta) {
						DmDefaultMetaPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmDefaultMetaPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmDefaultMetaPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(DmDefaultMeta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmDefaultMetaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmDefaultMetaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmDefaultMetaPeer::DATABASE_NAME, DmDefaultMetaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmDefaultMetaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmDefaultMetaPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmDefaultMetaPeer::DATABASE_NAME);
		$criteria->add(DmDefaultMetaPeer::ID, $pk);

		$v = DmDefaultMetaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmDefaultMetaPeer::DATABASE_NAME);
			$criteria->add(DmDefaultMetaPeer::ID, $pks, Criteria::IN);
			$objs = DmDefaultMetaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmDefaultMetaPeer::DATABASE_NAME)->addTableBuilder(BaseDmDefaultMetaPeer::TABLE_NAME, BaseDmDefaultMetaPeer::getMapBuilder());

