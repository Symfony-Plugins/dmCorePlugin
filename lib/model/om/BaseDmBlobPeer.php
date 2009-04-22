<?php


abstract class BaseDmBlobPeer {

	
	const IS_I18N = true;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_blob';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmBlob';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const STYLE = 'dm_blob.STYLE';

	
	const JPG_QUALITY = 'dm_blob.JPG_QUALITY';

	
	const TITLE_POSITION = 'dm_blob.TITLE_POSITION';

	
	const IMAGE_POSITION = 'dm_blob.IMAGE_POSITION';

	
	const IMAGE_WIDTH = 'dm_blob.IMAGE_WIDTH';

	
	const CREATED_AT = 'dm_blob.CREATED_AT';

	
	const UPDATED_AT = 'dm_blob.UPDATED_AT';

	
	const ID = 'dm_blob.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Style', 'JpgQuality', 'TitlePosition', 'ImagePosition', 'ImageWidth', 'CreatedAt', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('style', 'jpgQuality', 'titlePosition', 'imagePosition', 'imageWidth', 'createdAt', 'updatedAt', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::STYLE, self::JPG_QUALITY, self::TITLE_POSITION, self::IMAGE_POSITION, self::IMAGE_WIDTH, self::CREATED_AT, self::UPDATED_AT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('style', 'jpg_quality', 'title_position', 'image_position', 'image_width', 'created_at', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Style' => 0, 'JpgQuality' => 1, 'TitlePosition' => 2, 'ImagePosition' => 3, 'ImageWidth' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, 'Id' => 7, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('style' => 0, 'jpgQuality' => 1, 'titlePosition' => 2, 'imagePosition' => 3, 'imageWidth' => 4, 'createdAt' => 5, 'updatedAt' => 6, 'id' => 7, ),
		BasePeer::TYPE_COLNAME => array (self::STYLE => 0, self::JPG_QUALITY => 1, self::TITLE_POSITION => 2, self::IMAGE_POSITION => 3, self::IMAGE_WIDTH => 4, self::CREATED_AT => 5, self::UPDATED_AT => 6, self::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('style' => 0, 'jpg_quality' => 1, 'title_position' => 2, 'image_position' => 3, 'image_width' => 4, 'created_at' => 5, 'updated_at' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

  public static function build()
  {
    return new DmBlob();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmBlobMapBuilder();
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
		return str_replace(DmBlobPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmBlobPeer::STYLE);

		$criteria->addSelectColumn(DmBlobPeer::JPG_QUALITY);

		$criteria->addSelectColumn(DmBlobPeer::TITLE_POSITION);

		$criteria->addSelectColumn(DmBlobPeer::IMAGE_POSITION);

		$criteria->addSelectColumn(DmBlobPeer::IMAGE_WIDTH);

		$criteria->addSelectColumn(DmBlobPeer::CREATED_AT);

		$criteria->addSelectColumn(DmBlobPeer::UPDATED_AT);

		$criteria->addSelectColumn(DmBlobPeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmBlobPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmBlobPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmBlobPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobPeer', $criteria, $con);
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
		$objects = DmBlobPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmBlobPeer::populateObjects(DmBlobPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmBlobPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmBlobPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmBlob $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmBlob) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmBlob object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = DmBlobPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmBlobPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmBlobPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmBlobPeer::addInstanceToPool($obj, $key);
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


    foreach (sfMixer::getCallables('BaseDmBlobPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobPeer', $c, $con);
    }


        if ($c->getDbName() == Propel::getDefaultDB())
    {
      $c->setDbName(self::DATABASE_NAME);
    }

    DmBlobPeer::addSelectColumns($c);
    $startcol = (DmBlobPeer::NUM_COLUMNS - DmBlobPeer::NUM_LAZY_LOAD_COLUMNS);

    DmBlobI18nPeer::addSelectColumns($c);

    $c->addJoin(DmBlobPeer::ID, DmBlobI18nPeer::ID);
    $c->add(DmBlobI18nPeer::CULTURE, $culture);

    $stmt = BasePeer::doSelect($c, $con);
    $results = array();

    while($row = $stmt->fetch(PDO::FETCH_NUM)) {

      $omClass = DmBlobPeer::getOMClass();

      $cls = Propel::importClass($omClass);
      $obj1 = new $cls();
      $obj1->hydrate($row);
      $obj1->setCulture($culture);

      $omClass = DmBlobI18nPeer::getOMClass();

      $cls = Propel::importClass($omClass);
      $obj2 = new $cls();
      $obj2->hydrate($row, $startcol);

      $obj1->setDmBlobI18nForCulture($obj2, $culture);
      $obj2->setDmBlob($obj1);

      $results[] = $obj1;
    }
    return $results;
  }


  
  public static function getI18nModel()
  {
    return 'DmBlobI18n';
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
		return DmBlobPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmBlobPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmBlobPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmBlobPeer::ID) && $criteria->keyContainsValue(DmBlobPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmBlobPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmBlobPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmBlobPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmBlobPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmBlobPeer::ID);
			$selectCriteria->add(DmBlobPeer::ID, $criteria->remove(DmBlobPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmBlobPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += DmBlobPeer::doOnDeleteCascade(new Criteria(DmBlobPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmBlobPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmBlobPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmBlob) {
						DmBlobPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmBlobPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmBlobPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += DmBlobPeer::doOnDeleteCascade($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmBlobPeer::clearInstancePool();
				} else { 					DmBlobPeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmBlobI18nPeer::clearInstancePool();

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

				$objects = DmBlobPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(DmBlobI18nPeer::DATABASE_NAME);
			
			$c->add(DmBlobI18nPeer::ID, $obj->getId());
			$affectedRows += DmBlobI18nPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(DmBlob $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmBlobPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmBlobPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmBlobPeer::DATABASE_NAME, DmBlobPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmBlobPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmBlobPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmBlobPeer::DATABASE_NAME);
		$criteria->add(DmBlobPeer::ID, $pk);

		$v = DmBlobPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmBlobPeer::DATABASE_NAME);
			$criteria->add(DmBlobPeer::ID, $pks, Criteria::IN);
			$objs = DmBlobPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmBlobPeer::DATABASE_NAME)->addTableBuilder(BaseDmBlobPeer::TABLE_NAME, BaseDmBlobPeer::getMapBuilder());

