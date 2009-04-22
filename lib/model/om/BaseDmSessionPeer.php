<?php


abstract class BaseDmSessionPeer {

	
	const IS_I18N = false;

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dm_session';

	
	const CLASS_DEFAULT = 'plugins.dmCorePlugin.lib.model.DmSession';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'dm_session.ID';

	
	const SESS_ID = 'dm_session.SESS_ID';

	
	const LAST_TIME = 'dm_session.LAST_TIME';

	
	const ARRIVAL_TIME = 'dm_session.ARRIVAL_TIME';

	
	const IP = 'dm_session.IP';

	
	const ADDRESS = 'dm_session.ADDRESS';

	
	const DM_PROFILE_ID = 'dm_session.DM_PROFILE_ID';

	
	const DM_PAGE_ID = 'dm_session.DM_PAGE_ID';

	
	const URL = 'dm_session.URL';

	
	const NB_PAGES = 'dm_session.NB_PAGES';

	
	const BROWSER_NAME = 'dm_session.BROWSER_NAME';

	
	const BROWSER_VERSION = 'dm_session.BROWSER_VERSION';

	
	const PLATFORM = 'dm_session.PLATFORM';

	
	const IS_CRAWLER = 'dm_session.IS_CRAWLER';

	
	const IS_RSS_READER = 'dm_session.IS_RSS_READER';

	
	const IS_BANNED = 'dm_session.IS_BANNED';

	
	const IS_MOBILE_DEVICE = 'dm_session.IS_MOBILE_DEVICE';

	
	const USER_AGENT = 'dm_session.USER_AGENT';

	
	const STATUS_CODE = 'dm_session.STATUS_CODE';

	
	const CONTENT_TYPE = 'dm_session.CONTENT_TYPE';

	
	const CONTENT_LENGTH = 'dm_session.CONTENT_LENGTH';

	
	const TIME = 'dm_session.TIME';

	
	const HISTORY = 'dm_session.HISTORY';

	
	const IS_CACHED = 'dm_session.IS_CACHED';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'SessId', 'LastTime', 'ArrivalTime', 'Ip', 'Address', 'DmProfileId', 'DmPageId', 'Url', 'NbPages', 'BrowserName', 'BrowserVersion', 'Platform', 'IsCrawler', 'IsRssReader', 'IsBanned', 'IsMobileDevice', 'UserAgent', 'StatusCode', 'ContentType', 'ContentLength', 'Time', 'History', 'IsCached', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'sessId', 'lastTime', 'arrivalTime', 'ip', 'address', 'dmProfileId', 'dmPageId', 'url', 'nbPages', 'browserName', 'browserVersion', 'platform', 'isCrawler', 'isRssReader', 'isBanned', 'isMobileDevice', 'userAgent', 'statusCode', 'contentType', 'contentLength', 'time', 'history', 'isCached', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SESS_ID, self::LAST_TIME, self::ARRIVAL_TIME, self::IP, self::ADDRESS, self::DM_PROFILE_ID, self::DM_PAGE_ID, self::URL, self::NB_PAGES, self::BROWSER_NAME, self::BROWSER_VERSION, self::PLATFORM, self::IS_CRAWLER, self::IS_RSS_READER, self::IS_BANNED, self::IS_MOBILE_DEVICE, self::USER_AGENT, self::STATUS_CODE, self::CONTENT_TYPE, self::CONTENT_LENGTH, self::TIME, self::HISTORY, self::IS_CACHED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'sess_id', 'last_time', 'arrival_time', 'ip', 'address', 'dm_profile_id', 'dm_page_id', 'url', 'nb_pages', 'browser_name', 'browser_version', 'platform', 'is_crawler', 'is_rss_reader', 'is_banned', 'is_mobile_device', 'user_agent', 'status_code', 'content_type', 'content_length', 'time', 'history', 'is_cached', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'SessId' => 1, 'LastTime' => 2, 'ArrivalTime' => 3, 'Ip' => 4, 'Address' => 5, 'DmProfileId' => 6, 'DmPageId' => 7, 'Url' => 8, 'NbPages' => 9, 'BrowserName' => 10, 'BrowserVersion' => 11, 'Platform' => 12, 'IsCrawler' => 13, 'IsRssReader' => 14, 'IsBanned' => 15, 'IsMobileDevice' => 16, 'UserAgent' => 17, 'StatusCode' => 18, 'ContentType' => 19, 'ContentLength' => 20, 'Time' => 21, 'History' => 22, 'IsCached' => 23, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'sessId' => 1, 'lastTime' => 2, 'arrivalTime' => 3, 'ip' => 4, 'address' => 5, 'dmProfileId' => 6, 'dmPageId' => 7, 'url' => 8, 'nbPages' => 9, 'browserName' => 10, 'browserVersion' => 11, 'platform' => 12, 'isCrawler' => 13, 'isRssReader' => 14, 'isBanned' => 15, 'isMobileDevice' => 16, 'userAgent' => 17, 'statusCode' => 18, 'contentType' => 19, 'contentLength' => 20, 'time' => 21, 'history' => 22, 'isCached' => 23, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SESS_ID => 1, self::LAST_TIME => 2, self::ARRIVAL_TIME => 3, self::IP => 4, self::ADDRESS => 5, self::DM_PROFILE_ID => 6, self::DM_PAGE_ID => 7, self::URL => 8, self::NB_PAGES => 9, self::BROWSER_NAME => 10, self::BROWSER_VERSION => 11, self::PLATFORM => 12, self::IS_CRAWLER => 13, self::IS_RSS_READER => 14, self::IS_BANNED => 15, self::IS_MOBILE_DEVICE => 16, self::USER_AGENT => 17, self::STATUS_CODE => 18, self::CONTENT_TYPE => 19, self::CONTENT_LENGTH => 20, self::TIME => 21, self::HISTORY => 22, self::IS_CACHED => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'sess_id' => 1, 'last_time' => 2, 'arrival_time' => 3, 'ip' => 4, 'address' => 5, 'dm_profile_id' => 6, 'dm_page_id' => 7, 'url' => 8, 'nb_pages' => 9, 'browser_name' => 10, 'browser_version' => 11, 'platform' => 12, 'is_crawler' => 13, 'is_rss_reader' => 14, 'is_banned' => 15, 'is_mobile_device' => 16, 'user_agent' => 17, 'status_code' => 18, 'content_type' => 19, 'content_length' => 20, 'time' => 21, 'history' => 22, 'is_cached' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

  public static function build()
  {
    return new DmSession();
  }

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DmSessionMapBuilder();
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
		return str_replace(DmSessionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DmSessionPeer::ID);

		$criteria->addSelectColumn(DmSessionPeer::SESS_ID);

		$criteria->addSelectColumn(DmSessionPeer::LAST_TIME);

		$criteria->addSelectColumn(DmSessionPeer::ARRIVAL_TIME);

		$criteria->addSelectColumn(DmSessionPeer::IP);

		$criteria->addSelectColumn(DmSessionPeer::ADDRESS);

		$criteria->addSelectColumn(DmSessionPeer::DM_PROFILE_ID);

		$criteria->addSelectColumn(DmSessionPeer::DM_PAGE_ID);

		$criteria->addSelectColumn(DmSessionPeer::URL);

		$criteria->addSelectColumn(DmSessionPeer::NB_PAGES);

		$criteria->addSelectColumn(DmSessionPeer::BROWSER_NAME);

		$criteria->addSelectColumn(DmSessionPeer::BROWSER_VERSION);

		$criteria->addSelectColumn(DmSessionPeer::PLATFORM);

		$criteria->addSelectColumn(DmSessionPeer::IS_CRAWLER);

		$criteria->addSelectColumn(DmSessionPeer::IS_RSS_READER);

		$criteria->addSelectColumn(DmSessionPeer::IS_BANNED);

		$criteria->addSelectColumn(DmSessionPeer::IS_MOBILE_DEVICE);

		$criteria->addSelectColumn(DmSessionPeer::USER_AGENT);

		$criteria->addSelectColumn(DmSessionPeer::STATUS_CODE);

		$criteria->addSelectColumn(DmSessionPeer::CONTENT_TYPE);

		$criteria->addSelectColumn(DmSessionPeer::CONTENT_LENGTH);

		$criteria->addSelectColumn(DmSessionPeer::TIME);

		$criteria->addSelectColumn(DmSessionPeer::HISTORY);

		$criteria->addSelectColumn(DmSessionPeer::IS_CACHED);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSessionPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSessionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseDmSessionPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $criteria, $con);
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
		$objects = DmSessionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DmSessionPeer::populateObjects(DmSessionPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DmSessionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(DmSession $obj, $key = null)
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
			if (is_object($value) && $value instanceof DmSession) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DmSession object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = DmSessionPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DmSessionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DmSessionPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DmSessionPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDmProfile(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSessionPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSessionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmSessionPeer::DM_PROFILE_ID,), array(DmProfilePeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmSessionPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinDmPage(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSessionPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSessionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmSessionPeer::DM_PAGE_ID,), array(DmPagePeer::ID,), $join_behavior);


    foreach (sfMixer::getCallables('BaseDmSessionPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDmProfile(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSessionPeer::addSelectColumns($c);
		$startcol = (DmSessionPeer::NUM_COLUMNS - DmSessionPeer::NUM_LAZY_LOAD_COLUMNS);
		DmProfilePeer::addSelectColumns($c);

		$c->addJoin(array(DmSessionPeer::DM_PROFILE_ID,), array(DmProfilePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSessionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSessionPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmSessionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSessionPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmProfilePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmProfilePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmProfilePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmProfilePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSession($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinDmPage(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSessionPeer::addSelectColumns($c);
		$startcol = (DmSessionPeer::NUM_COLUMNS - DmSessionPeer::NUM_LAZY_LOAD_COLUMNS);
		DmPagePeer::addSelectColumns($c);

		$c->addJoin(array(DmSessionPeer::DM_PAGE_ID,), array(DmPagePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSessionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSessionPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DmSessionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSessionPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DmPagePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DmPagePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmPagePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DmPagePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSession($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DmSessionPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSessionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DmSessionPeer::DM_PROFILE_ID,), array(DmProfilePeer::ID,), $join_behavior);
		$criteria->addJoin(array(DmSessionPeer::DM_PAGE_ID,), array(DmPagePeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $criteria, $con);
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

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSessionPeer::addSelectColumns($c);
		$startcol2 = (DmSessionPeer::NUM_COLUMNS - DmSessionPeer::NUM_LAZY_LOAD_COLUMNS);

		DmProfilePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmProfilePeer::NUM_COLUMNS - DmProfilePeer::NUM_LAZY_LOAD_COLUMNS);

		DmPagePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DmPagePeer::NUM_COLUMNS - DmPagePeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DmSessionPeer::DM_PROFILE_ID,), array(DmProfilePeer::ID,), $join_behavior);
		$c->addJoin(array(DmSessionPeer::DM_PAGE_ID,), array(DmPagePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSessionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSessionPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmSessionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSessionPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DmProfilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DmProfilePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DmProfilePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmProfilePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSession($obj1);
			} 
			
			$key3 = DmPagePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = DmPagePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = DmPagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DmPagePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDmSession($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptDmProfile(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSessionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DmSessionPeer::DM_PAGE_ID,), array(DmPagePeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDmPage(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DmSessionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DmSessionPeer::DM_PROFILE_ID,), array(DmProfilePeer::ID,), $join_behavior);

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $criteria, $con);
    }


		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptDmProfile(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSessionPeer::addSelectColumns($c);
		$startcol2 = (DmSessionPeer::NUM_COLUMNS - DmSessionPeer::NUM_LAZY_LOAD_COLUMNS);

		DmPagePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmPagePeer::NUM_COLUMNS - DmPagePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DmSessionPeer::DM_PAGE_ID,), array(DmPagePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSessionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSessionPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmSessionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSessionPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DmPagePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DmPagePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DmPagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmPagePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSession($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDmPage(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DmSessionPeer::addSelectColumns($c);
		$startcol2 = (DmSessionPeer::NUM_COLUMNS - DmSessionPeer::NUM_LAZY_LOAD_COLUMNS);

		DmProfilePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DmProfilePeer::NUM_COLUMNS - DmProfilePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DmSessionPeer::DM_PROFILE_ID,), array(DmProfilePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DmSessionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DmSessionPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DmSessionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DmSessionPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DmProfilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DmProfilePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DmProfilePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DmProfilePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDmSession($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array(array('sess_id'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DmSessionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmSessionPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DmSessionPeer::ID) && $criteria->keyContainsValue(DmSessionPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DmSessionPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseDmSessionPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDmSessionPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DmSessionPeer::ID);
			$selectCriteria->add(DmSessionPeer::ID, $criteria->remove(DmSessionPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDmSessionPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDmSessionPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DmSessionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DmSessionPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof DmSession) {
						DmSessionPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DmSessionPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DmSessionPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(DmSession $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DmSessionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DmSessionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DmSessionPeer::DATABASE_NAME, DmSessionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DmSessionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DmSessionPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DmSessionPeer::DATABASE_NAME);
		$criteria->add(DmSessionPeer::ID, $pk);

		$v = DmSessionPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DmSessionPeer::DATABASE_NAME);
			$criteria->add(DmSessionPeer::ID, $pks, Criteria::IN);
			$objs = DmSessionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDmSessionPeer::DATABASE_NAME)->addTableBuilder(BaseDmSessionPeer::TABLE_NAME, BaseDmSessionPeer::getMapBuilder());

