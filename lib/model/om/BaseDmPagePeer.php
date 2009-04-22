<?php


abstract class BaseDmPagePeer {

	
	const IS_I18N = true;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_page';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmPage';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const DM_PAGE_VIEW_ID = 'dm_page.DM_PAGE_VIEW_ID';

	
	const TREE_LEFT = 'dm_page.TREE_LEFT';

	
	const TREE_RIGHT = 'dm_page.TREE_RIGHT';

	
	const TREE_PARENT = 'dm_page.TREE_PARENT';

	
	const TOPIC_ID = 'dm_page.TOPIC_ID';

	
	const MODULE = 'dm_page.MODULE';

	
	const ACTION = 'dm_page.ACTION';

	
	const OBJECT_ID = 'dm_page.OBJECT_ID';

	
	const IS_APPROVED = 'dm_page.IS_APPROVED';

	
	const IS_PUBLIC = 'dm_page.IS_PUBLIC';

	
	const UPDATED_AT = 'dm_page.UPDATED_AT';

	
	const ID = 'dm_page.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DmPageViewId', 'TreeLeft', 'TreeRight', 'TreeParent', 'TopicId', 'Module', 'Action', 'ObjectId', 'IsApproved', 'IsPublic', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmPageViewId', 'treeLeft', 'treeRight', 'treeParent', 'topicId', 'module', 'action', 'objectId', 'isApproved', 'isPublic', 'updatedAt', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::DM_PAGE_VIEW_ID, self::TREE_LEFT, self::TREE_RIGHT, self::TREE_PARENT, self::TOPIC_ID, self::MODULE, self::ACTION, self::OBJECT_ID, self::IS_APPROVED, self::IS_PUBLIC, self::UPDATED_AT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_page_view_id', 'tree_left', 'tree_right', 'tree_parent', 'topic_id', 'module', 'action', 'object_id', 'is_approved', 'is_public', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DmPageViewId' => 0, 'TreeLeft' => 1, 'TreeRight' => 2, 'TreeParent' => 3, 'TopicId' => 4, 'Module' => 5, 'Action' => 6, 'ObjectId' => 7, 'IsApproved' => 8, 'IsPublic' => 9, 'UpdatedAt' => 10, 'Id' => 11, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('dmPageViewId' => 0, 'treeLeft' => 1, 'treeRight' => 2, 'treeParent' => 3, 'topicId' => 4, 'module' => 5, 'action' => 6, 'objectId' => 7, 'isApproved' => 8, 'isPublic' => 9, 'updatedAt' => 10, 'id' => 11, ),
		BasePeer::TYPE_COLNAME => array (self::DM_PAGE_VIEW_ID => 0, self::TREE_LEFT => 1, self::TREE_RIGHT => 2, self::TREE_PARENT => 3, self::TOPIC_ID => 4, self::MODULE => 5, self::ACTION => 6, self::OBJECT_ID => 7, self::IS_APPROVED => 8, self::IS_PUBLIC => 9, self::UPDATED_AT => 10, self::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('dm_page_view_id' => 0, 'tree_left' => 1, 'tree_right' => 2, 'tree_parent' => 3, 'topic_id' => 4, 'module' => 5, 'action' => 6, 'object_id' => 7, 'is_approved' => 8, 'is_public' => 9, 'updated_at' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

  public static function build()
  {
    return new DmPage();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmPageMapBuilder();
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
		return str_replace(DmPagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmPagePeer::DM_PAGE_VIEW_ID);

		$criteria->addSelectColumn(DmPagePeer::TREE_LEFT);

		$criteria->addSelectColumn(DmPagePeer::TREE_RIGHT);

		$criteria->addSelectColumn(DmPagePeer::TREE_PARENT);

		$criteria->addSelectColumn(DmPagePeer::TOPIC_ID);

		$criteria->addSelectColumn(DmPagePeer::MODULE);

		$criteria->addSelectColumn(DmPagePeer::ACTION);

		$criteria->addSelectColumn(DmPagePeer::OBJECT_ID);

		$criteria->addSelectColumn(DmPagePeer::IS_APPROVED);

		$criteria->addSelectColumn(DmPagePeer::IS_PUBLIC);

		$criteria->addSelectColumn(DmPagePeer::UPDATED_AT);

		$criteria->addSelectColumn(DmPagePeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmPagePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmPagePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmPagePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $criteria, $con);
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
		$objects = DmPagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmPagePeer::populateObjects(DmPagePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmPagePeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmPagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmPage $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmPage) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmPage object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 11] === null) {
			return null;
		}
		return (string) $row[$startcol + 11];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = DmPagePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmPagePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmPagePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmPagePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmPageView(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmPagePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmPagePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmPagePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmPagePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmPagePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmPagePeer::addSelectColumns($c);
		$startcol = (DmPagePeer::NUM_COLUMNS - DmPagePeer::NUM_LAZY_LOAD_COLUMNS);
		DmPageViewPeer::addSelectColumns($c);

		$c->addJoin(array(DmPagePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmPagePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmPagePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmPagePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmPagePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDmPage($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmPagePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmPagePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmPagePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmPagePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmPagePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmPagePeer::addSelectColumns($c);
		$startcol2 = (DmPagePeer::NUM_COLUMNS - DmPagePeer::NUM_LAZY_LOAD_COLUMNS);

		DmPageViewPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmPageViewPeer::NUM_COLUMNS - DmPageViewPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmPagePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmPagePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmPagePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmPagePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmPagePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDmPage($obj1);
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
			DmPagePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	

    foreach (sfMixer::getCallables('BaseDmPagePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDmPageRelatedByTreeParent(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmPagePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DmPagePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmPagePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmPagePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmPagePeer::addSelectColumns($c);
		$startcol2 = (DmPagePeer::NUM_COLUMNS - DmPagePeer::NUM_LAZY_LOAD_COLUMNS);


		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmPagePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmPagePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmPagePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmPagePeer::addInstanceToPool($obj1, $key1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDmPageRelatedByTreeParent(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmPagePeer::addSelectColumns($c);
		$startcol2 = (DmPagePeer::NUM_COLUMNS - DmPagePeer::NUM_LAZY_LOAD_COLUMNS);

		DmPageViewPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmPageViewPeer::NUM_COLUMNS - DmPageViewPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DmPagePeer::DM_PAGE_VIEW_ID,), array(DmPageViewPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmPagePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmPagePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmPagePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmPagePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDmPage($obj1);

			} 
			$results[] = $obj1;
		}
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


    foreach (sfMixer::getCallables('BaseDmPagePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $c, $con);
    }


        if ($c->getDbName() == Propel::getDefaultDB())
    {
      $c->setDbName(self::DATABASE_NAME);
    }

    DmPagePeer::addSelectColumns($c);
    $startcol = (DmPagePeer::NUM_COLUMNS - DmPagePeer::NUM_LAZY_LOAD_COLUMNS);

    DmPageI18nPeer::addSelectColumns($c);

    $c->addJoin(DmPagePeer::ID, DmPageI18nPeer::ID);
    $c->add(DmPageI18nPeer::CULTURE, $culture);

    $stmt = BasePeer::doSelect($c, $con);
    $results = array();

    while($row = $stmt->fetch(PDO::FETCH_NUM)) {

      $omClass = DmPagePeer::getOMClass();

      $cls = Propel::importClass($omClass);
      $obj1 = new $cls();
      $obj1->hydrate($row);
      $obj1->setCulture($culture);

      $omClass = DmPageI18nPeer::getOMClass();

      $cls = Propel::importClass($omClass);
      $obj2 = new $cls();
      $obj2->hydrate($row, $startcol);

      $obj1->setDmPageI18nForCulture($obj2, $culture);
      $obj2->setDmPage($obj1);

      $results[] = $obj1;
    }
    return $results;
  }


  
  public static function getI18nModel()
  {
    return 'DmPageI18n';
  }


  static public function getUniqueColumnNames()
  {
    return array(array('module', 'action', 'object_id'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DmPagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmPagePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmPagePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmPagePeer::ID) && $criteria->keyContainsValue(DmPagePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmPagePeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmPagePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmPagePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmPagePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmPagePeer::ID);
			$selectCriteria->add(DmPagePeer::ID, $criteria->remove(DmPagePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmPagePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmPagePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += DmPagePeer::doOnDeleteCascade(new Criteria(DmPagePeer::DATABASE_NAME), $con);
			DmPagePeer::doOnDeleteSetNull(new Criteria(DmPagePeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(DmPagePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmPagePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmPage) {
						DmPagePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmPagePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmPagePeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += DmPagePeer::doOnDeleteCascade($criteria, $con);
			DmPagePeer::doOnDeleteSetNull($criteria, $con);
			
																if ($values instanceof Criteria) {
					DmPagePeer::clearInstancePool();
				} else { 					DmPagePeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						DmSessionPeer::clearInstancePool();

						DmPageI18nPeer::clearInstancePool();

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

				$objects = DmPagePeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(DmPageI18nPeer::DATABASE_NAME);
			
			$c->add(DmPageI18nPeer::ID, $obj->getId());
			$affectedRows += DmPageI18nPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	protected static function doOnDeleteSetNull(Criteria $criteria, PropelPDO $con)
	{

				$objects = DmPagePeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {

						$selectCriteria = new Criteria(DmPagePeer::DATABASE_NAME);
			$updateValues = new Criteria(DmPagePeer::DATABASE_NAME);
			$selectCriteria->add(DmSessionPeer::DM_PAGE_ID, $obj->getId());
			$updateValues->add(DmSessionPeer::DM_PAGE_ID, null);

					BasePeer::doUpdate($selectCriteria, $updateValues, $con); 
		}
	}

	
	public static function doValidate(DmPage $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmPagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmPagePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmPagePeer::DATABASE_NAME, DmPagePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmPagePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmPagePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		$criteria->add(DmPagePeer::ID, $pk);

		$v = DmPagePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
			$criteria->add(DmPagePeer::ID, $pks, Criteria::IN);
			$objs = DmPagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmPagePeer::DATABASE_NAME)->addTableBuilder(BaseDmPagePeer::TABLE_NAME, BaseDmPagePeer::getMapBuilder());

