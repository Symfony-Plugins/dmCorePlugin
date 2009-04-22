<?php


abstract class BaseDmZonePeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_zone';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmZone';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const DM_PAGE_VIEW_ID = 'dm_zone.DM_PAGE_VIEW_ID';

	
	const DM_LAYOUT_PART_ID = 'dm_zone.DM_LAYOUT_PART_ID';

	
	const CSS_CLASS = 'dm_zone.CSS_CLASS';

	
	const RANK = 'dm_zone.RANK';

	
	const UPDATED_AT = 'dm_zone.UPDATED_AT';

	
	const ID = 'dm_zone.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DmPageViewId', 'DmLayoutPartId', 'CssClass', 'Rank', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmPageViewId', 'dmLayoutPartId', 'cssClass', 'rank', 'updatedAt', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::DM_PAGE_VIEW_ID, self::DM_LAYOUT_PART_ID, self::CSS_CLASS, self::RANK, self::UPDATED_AT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_page_view_id', 'dm_layout_part_id', 'css_class', 'rank', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DmPageViewId' => 0, 'DmLayoutPartId' => 1, 'CssClass' => 2, 'Rank' => 3, 'UpdatedAt' => 4, 'Id' => 5, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmPageViewId' => 0, 'dmLayoutPartId' => 1, 'cssClass' => 2, 'rank' => 3, 'updatedAt' => 4, 'id' => 5, ),
		BasePeer::TYPE_COLNAME => array (self::DM_PAGE_VIEW_ID => 0, self::DM_LAYOUT_PART_ID => 1, self::CSS_CLASS => 2, self::RANK => 3, self::UPDATED_AT => 4, self::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_page_view_id' => 0, 'dm_layout_part_id' => 1, 'css_class' => 2, 'rank' => 3, 'updated_at' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

  public static function build()
  {
    return new DmZone();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmZoneMapBuilder();
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
		return str_replace(DmZonePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmZonePeer::DM_PAGE_VIEW_ID);

		$criteria->addSelectColumn(DmZonePeer::DM_LAYOUT_PART_ID);

		$criteria->addSelectColumn(DmZonePeer::CSS_CLASS);

		$criteria->addSelectColumn(DmZonePeer::RANK);

		$criteria->addSelectColumn(DmZonePeer::UPDATED_AT);

		$criteria->addSelectColumn(DmZonePeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmZonePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmZonePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmZonePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $criteria, $con);
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
		$objects = DmZonePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmZonePeer::populateObjects(DmZonePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmZonePeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmZonePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmZone $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmZone) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmZone object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 5] === null) {
			return null;
		}
		return (string) $row[$startcol + 5];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmZonePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmZonePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmZonePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmZonePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmPageView(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmZonePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmZonePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmZonePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmZonePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinDmLayoutPart(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmZonePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmZonePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmZonePeer::DM_LAYOUT_PART_ID,), array(DmLayoutPartPeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmZonePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmPageView(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmZonePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmZonePeer::addSelectColumns($c);
		$startcol = (DmZonePeer::NUM_COLUMNS - DmZonePeer::NUM_LAZY_LOAD_COLUMNS);
		DmPageViewPeer::addSelectColumns($c);

		$c->addJoin(array(DmZonePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmZonePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmZonePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmZonePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmZonePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmPageViewPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmPageViewPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmPageViewPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmPageViewPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmZone($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinDmLayoutPart(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmZonePeer::addSelectColumns($c);
		$startcol = (DmZonePeer::NUM_COLUMNS - DmZonePeer::NUM_LAZY_LOAD_COLUMNS);
		DmLayoutPartPeer::addSelectColumns($c);

		$c->addJoin(array(DmZonePeer::DM_LAYOUT_PART_ID,), array(DmLayoutPartPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmZonePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmZonePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmZonePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmZonePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmLayoutPartPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmLayoutPartPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmLayoutPartPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmLayoutPartPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmZone($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmZonePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmZonePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmZonePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DmZonePeer::DM_LAYOUT_PART_ID,), array(DmLayoutPartPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmZonePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmZonePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmZonePeer::addSelectColumns($c);
		$startcol2 = (DmZonePeer::NUM_COLUMNS - DmZonePeer::NUM_LAZY_LOAD_COLUMNS);

		DmPageViewPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmPageViewPeer::NUM_COLUMNS - DmPageViewPeer::NUM_LAZY_LOAD_COLUMNS);

		DmLayoutPartPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DmLayoutPartPeer::NUM_COLUMNS - DmLayoutPartPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmZonePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);
		$c->addJoin(array(DmZonePeer::DM_LAYOUT_PART_ID,), array(DmLayoutPartPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmZonePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmZonePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmZonePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmZonePeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmPageViewPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmPageViewPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmPageViewPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmPageViewPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmZone($obj1);
			} 
			
			$key3 = DmLayoutPartPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = DmLayoutPartPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = DmLayoutPartPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DmLayoutPartPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDmZone($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptDmPageView(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmZonePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DmZonePeer::DM_LAYOUT_PART_ID,), array(DmLayoutPartPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmZonePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDmLayoutPart(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmZonePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DmZonePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmZonePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptDmPageView(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmZonePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmZonePeer::addSelectColumns($c);
		$startcol2 = (DmZonePeer::NUM_COLUMNS - DmZonePeer::NUM_LAZY_LOAD_COLUMNS);

		DmLayoutPartPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmLayoutPartPeer::NUM_COLUMNS - DmLayoutPartPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DmZonePeer::DM_LAYOUT_PART_ID,), array(DmLayoutPartPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmZonePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmZonePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmZonePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmZonePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DmLayoutPartPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DmLayoutPartPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DmLayoutPartPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmLayoutPartPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmZone($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDmLayoutPart(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmZonePeer::addSelectColumns($c);
		$startcol2 = (DmZonePeer::NUM_COLUMNS - DmZonePeer::NUM_LAZY_LOAD_COLUMNS);

		DmPageViewPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmPageViewPeer::NUM_COLUMNS - DmPageViewPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DmZonePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmZonePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmZonePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmZonePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmZonePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DmPageViewPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DmPageViewPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DmPageViewPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmPageViewPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmZone($obj1);

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
		return DmZonePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmZonePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmZonePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmZonePeer::ID) && $criteria->keyContainsValue(DmZonePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmZonePeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmZonePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmZonePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmZonePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmZonePeer::ID);
			$selectCriteria->add(DmZonePeer::ID, $criteria->remove(DmZonePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmZonePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmZonePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += DmZonePeer::doOnDeleteCascade(new Criteria(DmZonePeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmZonePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmZonePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmZone) {
						DmZonePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmZonePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmZonePeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += DmZonePeer::doOnDeleteCascade($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmZonePeer::clearInstancePool();
				} else { 					DmZonePeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmSlotPeer::clearInstancePool();

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

				$objects = DmZonePeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(DmSlotPeer::DATABASE_NAME);
			
			$c->add(DmSlotPeer::DM_ZONE_ID, $obj->getId());
			$affectedRows += DmSlotPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(DmZone $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmZonePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmZonePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmZonePeer::DATABASE_NAME, DmZonePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmZonePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmZonePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmZonePeer::DATABASE_NAME);
		$criteria->add(DmZonePeer::ID, $pk);

		$v = DmZonePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmZonePeer::DATABASE_NAME);
			$criteria->add(DmZonePeer::ID, $pks, Criteria::IN);
			$objs = DmZonePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmZonePeer::DATABASE_NAME)->addTableBuilder(BaseDmZonePeer::TABLE_NAME, BaseDmZonePeer::getMapBuilder());

