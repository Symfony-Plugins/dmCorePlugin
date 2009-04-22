<?php


abstract class BaseDmBlobI18nPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_blob_i18n';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmBlobI18n';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const NAME = 'dm_blob_i18n.NAME';

	
	const TEXT = 'dm_blob_i18n.TEXT';

	
	const DM_MEDIA_FILE_ID = 'dm_blob_i18n.DM_MEDIA_FILE_ID';

	
	const ID = 'dm_blob_i18n.ID';

	
	const CULTURE = 'dm_blob_i18n.CULTURE';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Name', 'Text', 'DmMediaFileId', 'Id', 'Culture', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('name', 'text', 'dmMediaFileId', 'id', 'culture', ),
		BasePeer::TYPE_COLNAME => array (self::NAME, self::TEXT, self::DM_MEDIA_FILE_ID, self::ID, self::CULTURE, ),
		BasePeer::TYPE_FIELDNAME => array ('name', 'text', 'dm_media_file_id', 'id', 'culture', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Name' => 0, 'Text' => 1, 'DmMediaFileId' => 2, 'Id' => 3, 'Culture' => 4, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('name' => 0, 'text' => 1, 'dmMediaFileId' => 2, 'id' => 3, 'culture' => 4, ),
		BasePeer::TYPE_COLNAME => array (self::NAME => 0, self::TEXT => 1, self::DM_MEDIA_FILE_ID => 2, self::ID => 3, self::CULTURE => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('name' => 0, 'text' => 1, 'dm_media_file_id' => 2, 'id' => 3, 'culture' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

  public static function build()
  {
    return new DmBlobI18n();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmBlobI18nMapBuilder();
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
		return str_replace(DmBlobI18nPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmBlobI18nPeer::NAME);

		$criteria->addSelectColumn(DmBlobI18nPeer::TEXT);

		$criteria->addSelectColumn(DmBlobI18nPeer::DM_MEDIA_FILE_ID);

		$criteria->addSelectColumn(DmBlobI18nPeer::ID);

		$criteria->addSelectColumn(DmBlobI18nPeer::CULTURE);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmBlobI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmBlobI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $criteria, $con);
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
		$objects = DmBlobI18nPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmBlobI18nPeer::populateObjects(DmBlobI18nPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmBlobI18nPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmBlobI18n $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmBlobI18n) {
				$key = serialize(array((string) $value->getId(), (string) $value->getCulture()));
			} elseif (is_array($value) && count($value) === 2) {
								$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmBlobI18n object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 3] === null && $row[$startcol + 4] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol + 3], (string) $row[$startcol + 4]));
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmBlobI18nPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmBlobI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmBlobI18nPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmBlobI18nPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmMediaFile(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmBlobI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmBlobI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmBlobI18nPeer::DM_MEDIA_FILE_ID,), array(DmMediaFilePeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinDmBlob(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmBlobI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmBlobI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmBlobI18nPeer::ID,), array(DmBlobPeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmMediaFile(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmBlobI18nPeer::addSelectColumns($c);
		$startcol = (DmBlobI18nPeer::NUM_COLUMNS - DmBlobI18nPeer::NUM_LAZY_LOAD_COLUMNS);
		DmMediaFilePeer::addSelectColumns($c);

		$c->addJoin(array(DmBlobI18nPeer::DM_MEDIA_FILE_ID,), array(DmMediaFilePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmBlobI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmBlobI18nPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmBlobI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmBlobI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmMediaFilePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmMediaFilePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmMediaFilePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmMediaFilePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmBlobI18n($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinDmBlob(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmBlobI18nPeer::addSelectColumns($c);
		$startcol = (DmBlobI18nPeer::NUM_COLUMNS - DmBlobI18nPeer::NUM_LAZY_LOAD_COLUMNS);
		DmBlobPeer::addSelectColumns($c);

		$c->addJoin(array(DmBlobI18nPeer::ID,), array(DmBlobPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmBlobI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmBlobI18nPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmBlobI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmBlobI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmBlobPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmBlobPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmBlobPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmBlobPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmBlobI18n($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmBlobI18nPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmBlobI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmBlobI18nPeer::DM_MEDIA_FILE_ID,), array(DmMediaFilePeer::ID,), $join_behavior);
		$criteria->addJoin(array(DmBlobI18nPeer::ID,), array(DmBlobPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmBlobI18nPeer::addSelectColumns($c);
		$startcol2 = (DmBlobI18nPeer::NUM_COLUMNS - DmBlobI18nPeer::NUM_LAZY_LOAD_COLUMNS);

		DmMediaFilePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmMediaFilePeer::NUM_COLUMNS - DmMediaFilePeer::NUM_LAZY_LOAD_COLUMNS);

		DmBlobPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DmBlobPeer::NUM_COLUMNS - DmBlobPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmBlobI18nPeer::DM_MEDIA_FILE_ID,), array(DmMediaFilePeer::ID,), $join_behavior);
		$c->addJoin(array(DmBlobI18nPeer::ID,), array(DmBlobPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmBlobI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmBlobI18nPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmBlobI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmBlobI18nPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmMediaFilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmMediaFilePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmMediaFilePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmMediaFilePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmBlobI18n($obj1);
			} 
			
			$key3 = DmBlobPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = DmBlobPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = DmBlobPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DmBlobPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDmBlobI18n($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptDmMediaFile(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmBlobI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DmBlobI18nPeer::ID,), array(DmBlobPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDmBlob(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmBlobI18nPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DmBlobI18nPeer::DM_MEDIA_FILE_ID,), array(DmMediaFilePeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptDmMediaFile(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmBlobI18nPeer::addSelectColumns($c);
		$startcol2 = (DmBlobI18nPeer::NUM_COLUMNS - DmBlobI18nPeer::NUM_LAZY_LOAD_COLUMNS);

		DmBlobPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmBlobPeer::NUM_COLUMNS - DmBlobPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DmBlobI18nPeer::ID,), array(DmBlobPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmBlobI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmBlobI18nPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmBlobI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmBlobI18nPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DmBlobPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DmBlobPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DmBlobPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmBlobPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmBlobI18n($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDmBlob(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmBlobI18nPeer::addSelectColumns($c);
		$startcol2 = (DmBlobI18nPeer::NUM_COLUMNS - DmBlobI18nPeer::NUM_LAZY_LOAD_COLUMNS);

		DmMediaFilePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmMediaFilePeer::NUM_COLUMNS - DmMediaFilePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DmBlobI18nPeer::DM_MEDIA_FILE_ID,), array(DmMediaFilePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmBlobI18nPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmBlobI18nPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmBlobI18nPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmBlobI18nPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DmMediaFilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DmMediaFilePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DmMediaFilePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmMediaFilePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmBlobI18n($obj1);

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
		return DmBlobI18nPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmBlobI18nPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

		
    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmBlobI18nPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmBlobI18nPeer::ID);
			$selectCriteria->add(DmBlobI18nPeer::ID, $criteria->remove(DmBlobI18nPeer::ID), $comparison);

			$comparison = $criteria->getComparison(DmBlobI18nPeer::CULTURE);
			$selectCriteria->add(DmBlobI18nPeer::CULTURE, $criteria->remove(DmBlobI18nPeer::CULTURE), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmBlobI18nPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmBlobI18nPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DmBlobI18nPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmBlobI18nPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmBlobI18n) {
						DmBlobI18nPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
												if (count($values) == count($values, COUNT_RECURSIVE)) {
								$values = array($values);
			}

			foreach ($values as $value) {

				$criterion = $criteria->getNewCriterion(DmBlobI18nPeer::ID, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(DmBlobI18nPeer::CULTURE, $value[1]));
				$criteria->addOr($criterion);

								DmBlobI18nPeer::removeInstanceFromPool($value);
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

	
	public static function doValidate(DmBlobI18n $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmBlobI18nPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmBlobI18nPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmBlobI18nPeer::DATABASE_NAME, DmBlobI18nPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmBlobI18nPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($id, $culture, PropelPDO $con = null) {
		$key = serialize(array((string) $id, (string) $culture));
 		if (null !== ($obj = DmBlobI18nPeer::getInstanceFromPool($key))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(DmBlobI18nPeer::DATABASE_NAME);
		$criteria->add(DmBlobI18nPeer::ID, $id);
		$criteria->add(DmBlobI18nPeer::CULTURE, $culture);
		$v = DmBlobI18nPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 

Propel::getDatabaseMap(BaseDmBlobI18nPeer::DATABASE_NAME)->addTableBuilder(BaseDmBlobI18nPeer::TABLE_NAME, BaseDmBlobI18nPeer::getMapBuilder());

