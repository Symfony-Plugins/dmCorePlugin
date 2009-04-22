<?php


abstract class BaseDmLayoutPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_layout';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmLayout';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const NAME = 'dm_layout.NAME';

	
	const HAS_HEAD = 'dm_layout.HAS_HEAD';

	
	const HAS_FOOT = 'dm_layout.HAS_FOOT';

	
	const HAS_LEFT = 'dm_layout.HAS_LEFT';

	
	const HAS_RIGHT = 'dm_layout.HAS_RIGHT';

	
	const CSS_CLASS = 'dm_layout.CSS_CLASS';

	
	const UPDATED_AT = 'dm_layout.UPDATED_AT';

	
	const ID = 'dm_layout.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Name', 'HasHead', 'HasFoot', 'HasLeft', 'HasRight', 'CssClass', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('name', 'hasHead', 'hasFoot', 'hasLeft', 'hasRight', 'cssClass', 'updatedAt', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::NAME, self::HAS_HEAD, self::HAS_FOOT, self::HAS_LEFT, self::HAS_RIGHT, self::CSS_CLASS, self::UPDATED_AT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('name', 'has_head', 'has_foot', 'has_left', 'has_right', 'css_class', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Name' => 0, 'HasHead' => 1, 'HasFoot' => 2, 'HasLeft' => 3, 'HasRight' => 4, 'CssClass' => 5, 'UpdatedAt' => 6, 'Id' => 7, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('name' => 0, 'hasHead' => 1, 'hasFoot' => 2, 'hasLeft' => 3, 'hasRight' => 4, 'cssClass' => 5, 'updatedAt' => 6, 'id' => 7, ),
		BasePeer::TYPE_COLNAME => array (self::NAME => 0, self::HAS_HEAD => 1, self::HAS_FOOT => 2, self::HAS_LEFT => 3, self::HAS_RIGHT => 4, self::CSS_CLASS => 5, self::UPDATED_AT => 6, self::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('name' => 0, 'has_head' => 1, 'has_foot' => 2, 'has_left' => 3, 'has_right' => 4, 'css_class' => 5, 'updated_at' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

  public static function build()
  {
    return new DmLayout();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmLayoutMapBuilder();
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
		return str_replace(DmLayoutPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmLayoutPeer::NAME);

		$criteria->addSelectColumn(DmLayoutPeer::HAS_HEAD);

		$criteria->addSelectColumn(DmLayoutPeer::HAS_FOOT);

		$criteria->addSelectColumn(DmLayoutPeer::HAS_LEFT);

		$criteria->addSelectColumn(DmLayoutPeer::HAS_RIGHT);

		$criteria->addSelectColumn(DmLayoutPeer::CSS_CLASS);

		$criteria->addSelectColumn(DmLayoutPeer::UPDATED_AT);

		$criteria->addSelectColumn(DmLayoutPeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmLayoutPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmLayoutPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmLayoutPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPeer', $criteria, $con);
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
		$objects = DmLayoutPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmLayoutPeer::populateObjects(DmLayoutPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmLayoutPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmLayoutPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmLayout $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmLayout) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmLayout object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = DmLayoutPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmLayoutPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmLayoutPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmLayoutPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

  static public function getUniqueColumnNames()
  {
    return array(array('name'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DmLayoutPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmLayoutPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmLayoutPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmLayoutPeer::ID) && $criteria->keyContainsValue(DmLayoutPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmLayoutPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmLayoutPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmLayoutPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmLayoutPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmLayoutPeer::ID);
			$selectCriteria->add(DmLayoutPeer::ID, $criteria->remove(DmLayoutPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmLayoutPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmLayoutPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += DmLayoutPeer::doOnDeleteCascade(new Criteria(DmLayoutPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmLayoutPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmLayoutPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmLayout) {
						DmLayoutPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmLayoutPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmLayoutPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += DmLayoutPeer::doOnDeleteCascade($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmLayoutPeer::clearInstancePool();
				} else { 					DmLayoutPeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmPageViewPeer::clearInstancePool();

						DmLayoutPartPeer::clearInstancePool();

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

				$objects = DmLayoutPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(DmPageViewPeer::DATABASE_NAME);
			
			$c->add(DmPageViewPeer::DM_LAYOUT_ID, $obj->getId());
			$affectedRows += DmPageViewPeer::doDelete($c, $con);

						$c = new Criteria(DmLayoutPartPeer::DATABASE_NAME);
			
			$c->add(DmLayoutPartPeer::DM_LAYOUT_ID, $obj->getId());
			$affectedRows += DmLayoutPartPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(DmLayout $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmLayoutPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmLayoutPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmLayoutPeer::DATABASE_NAME, DmLayoutPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmLayoutPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmLayoutPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmLayoutPeer::DATABASE_NAME);
		$criteria->add(DmLayoutPeer::ID, $pk);

		$v = DmLayoutPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmLayoutPeer::DATABASE_NAME);
			$criteria->add(DmLayoutPeer::ID, $pks, Criteria::IN);
			$objs = DmLayoutPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmLayoutPeer::DATABASE_NAME)->addTableBuilder(BaseDmLayoutPeer::TABLE_NAME, BaseDmLayoutPeer::getMapBuilder());

