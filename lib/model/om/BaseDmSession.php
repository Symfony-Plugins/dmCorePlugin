<?php


abstract class BaseDmSession extends BaseObject  implements Persistent {


  const PEER = 'DmSessionPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $sess_id;

	
	protected $last_time;

	
	protected $arrival_time;

	
	protected $ip;

	
	protected $address;

	
	protected $dm_profile_id;

	
	protected $dm_page_id;

	
	protected $url;

	
	protected $nb_pages;

	
	protected $browser_name;

	
	protected $browser_version;

	
	protected $platform;

	
	protected $is_crawler;

	
	protected $is_rss_reader;

	
	protected $is_banned;

	
	protected $is_mobile_device;

	
	protected $user_agent;

	
	protected $status_code;

	
	protected $content_type;

	
	protected $content_length;

	
	protected $time;

	
	protected $history;

	
	protected $is_cached;

	
	protected $aDmProfile;

	
	protected $aDmPage;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->nb_pages = 0;
		$this->is_crawler = false;
		$this->is_rss_reader = false;
		$this->is_banned = false;
		$this->is_mobile_device = false;
		$this->is_cached = false;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getSessId()
	{
		return $this->sess_id;
	}

	
	public function getLastTime()
	{
		return $this->last_time;
	}

	
	public function getArrivalTime()
	{
		return $this->arrival_time;
	}

	
	public function getIp()
	{
		return $this->ip;
	}

	
	public function getAddress()
	{
		return $this->address;
	}

	
	public function getDmProfileId()
	{
		return $this->dm_profile_id;
	}

	
	public function getDmPageId()
	{
		return $this->dm_page_id;
	}

	
	public function getUrl()
	{
		return $this->url;
	}

	
	public function getNbPages()
	{
		return $this->nb_pages;
	}

	
	public function getBrowserName()
	{
		return $this->browser_name;
	}

	
	public function getBrowserVersion()
	{
		return $this->browser_version;
	}

	
	public function getPlatform()
	{
		return $this->platform;
	}

	
	public function getIsCrawler()
	{
		return $this->is_crawler;
	}

	
	public function getIsRssReader()
	{
		return $this->is_rss_reader;
	}

	
	public function getIsBanned()
	{
		return $this->is_banned;
	}

	
	public function getIsMobileDevice()
	{
		return $this->is_mobile_device;
	}

	
	public function getUserAgent()
	{
		return $this->user_agent;
	}

	
	public function getStatusCode()
	{
		return $this->status_code;
	}

	
	public function getContentType()
	{
		return $this->content_type;
	}

	
	public function getContentLength()
	{
		return $this->content_length;
	}

	
	public function getTime()
	{
		return $this->time;
	}

	
	public function getHistory()
	{
		return $this->history;
	}

	
	public function getIsCached()
	{
		return $this->is_cached;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DmSessionPeer::ID;
		}

		return $this;
	} 
	
	public function setSessId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sess_id !== $v) {
			$this->sess_id = $v;
			$this->modifiedColumns[] = DmSessionPeer::SESS_ID;
		}

		return $this;
	} 
	
	public function setLastTime($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->last_time !== $v) {
			$this->last_time = $v;
			$this->modifiedColumns[] = DmSessionPeer::LAST_TIME;
		}

		return $this;
	} 
	
	public function setArrivalTime($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->arrival_time !== $v) {
			$this->arrival_time = $v;
			$this->modifiedColumns[] = DmSessionPeer::ARRIVAL_TIME;
		}

		return $this;
	} 
	
	public function setIp($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ip !== $v) {
			$this->ip = $v;
			$this->modifiedColumns[] = DmSessionPeer::IP;
		}

		return $this;
	} 
	
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = DmSessionPeer::ADDRESS;
		}

		return $this;
	} 
	
	public function setDmProfileId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dm_profile_id !== $v) {
			$this->dm_profile_id = $v;
			$this->modifiedColumns[] = DmSessionPeer::DM_PROFILE_ID;
		}

		if ($this->aDmProfile !== null && $this->aDmProfile->getId() !== $v) {
			$this->aDmProfile = null;
		}

		return $this;
	} 
	
	public function setDmPageId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dm_page_id !== $v) {
			$this->dm_page_id = $v;
			$this->modifiedColumns[] = DmSessionPeer::DM_PAGE_ID;
		}

		if ($this->aDmPage !== null && $this->aDmPage->getId() !== $v) {
			$this->aDmPage = null;
		}

		return $this;
	} 
	
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = DmSessionPeer::URL;
		}

		return $this;
	} 
	
	public function setNbPages($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->nb_pages !== $v || $v === 0) {
			$this->nb_pages = $v;
			$this->modifiedColumns[] = DmSessionPeer::NB_PAGES;
		}

		return $this;
	} 
	
	public function setBrowserName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->browser_name !== $v) {
			$this->browser_name = $v;
			$this->modifiedColumns[] = DmSessionPeer::BROWSER_NAME;
		}

		return $this;
	} 
	
	public function setBrowserVersion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->browser_version !== $v) {
			$this->browser_version = $v;
			$this->modifiedColumns[] = DmSessionPeer::BROWSER_VERSION;
		}

		return $this;
	} 
	
	public function setPlatform($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->platform !== $v) {
			$this->platform = $v;
			$this->modifiedColumns[] = DmSessionPeer::PLATFORM;
		}

		return $this;
	} 
	
	public function setIsCrawler($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_crawler !== $v || $v === false) {
			$this->is_crawler = $v;
			$this->modifiedColumns[] = DmSessionPeer::IS_CRAWLER;
		}

		return $this;
	} 
	
	public function setIsRssReader($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_rss_reader !== $v || $v === false) {
			$this->is_rss_reader = $v;
			$this->modifiedColumns[] = DmSessionPeer::IS_RSS_READER;
		}

		return $this;
	} 
	
	public function setIsBanned($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_banned !== $v || $v === false) {
			$this->is_banned = $v;
			$this->modifiedColumns[] = DmSessionPeer::IS_BANNED;
		}

		return $this;
	} 
	
	public function setIsMobileDevice($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_mobile_device !== $v || $v === false) {
			$this->is_mobile_device = $v;
			$this->modifiedColumns[] = DmSessionPeer::IS_MOBILE_DEVICE;
		}

		return $this;
	} 
	
	public function setUserAgent($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_agent !== $v) {
			$this->user_agent = $v;
			$this->modifiedColumns[] = DmSessionPeer::USER_AGENT;
		}

		return $this;
	} 
	
	public function setStatusCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = DmSessionPeer::STATUS_CODE;
		}

		return $this;
	} 
	
	public function setContentType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->content_type !== $v) {
			$this->content_type = $v;
			$this->modifiedColumns[] = DmSessionPeer::CONTENT_TYPE;
		}

		return $this;
	} 
	
	public function setContentLength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->content_length !== $v) {
			$this->content_length = $v;
			$this->modifiedColumns[] = DmSessionPeer::CONTENT_LENGTH;
		}

		return $this;
	} 
	
	public function setTime($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->time !== $v) {
			$this->time = $v;
			$this->modifiedColumns[] = DmSessionPeer::TIME;
		}

		return $this;
	} 
	
	public function setHistory($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->history !== $v) {
			$this->history = $v;
			$this->modifiedColumns[] = DmSessionPeer::HISTORY;
		}

		return $this;
	} 
	
	public function setIsCached($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_cached !== $v || $v === false) {
			$this->is_cached = $v;
			$this->modifiedColumns[] = DmSessionPeer::IS_CACHED;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmSessionPeer::NB_PAGES,DmSessionPeer::IS_CRAWLER,DmSessionPeer::IS_RSS_READER,DmSessionPeer::IS_BANNED,DmSessionPeer::IS_MOBILE_DEVICE,DmSessionPeer::IS_CACHED))) {
				return false;
			}

			if ($this->nb_pages !== 0) {
				return false;
			}

			if ($this->is_crawler !== false) {
				return false;
			}

			if ($this->is_rss_reader !== false) {
				return false;
			}

			if ($this->is_banned !== false) {
				return false;
			}

			if ($this->is_mobile_device !== false) {
				return false;
			}

			if ($this->is_cached !== false) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->sess_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->last_time = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->arrival_time = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->ip = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->address = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->dm_profile_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->dm_page_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->url = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->nb_pages = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->browser_name = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->browser_version = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->platform = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->is_crawler = ($row[$startcol + 13] !== null) ? (boolean) $row[$startcol + 13] : null;
			$this->is_rss_reader = ($row[$startcol + 14] !== null) ? (boolean) $row[$startcol + 14] : null;
			$this->is_banned = ($row[$startcol + 15] !== null) ? (boolean) $row[$startcol + 15] : null;
			$this->is_mobile_device = ($row[$startcol + 16] !== null) ? (boolean) $row[$startcol + 16] : null;
			$this->user_agent = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->status_code = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->content_type = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->content_length = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
			$this->time = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
			$this->history = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->is_cached = ($row[$startcol + 23] !== null) ? (boolean) $row[$startcol + 23] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 24; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmSession object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmProfile !== null && $this->dm_profile_id !== $this->aDmProfile->getId()) {
			$this->aDmProfile = null;
		}
		if ($this->aDmPage !== null && $this->dm_page_id !== $this->aDmPage->getId()) {
			$this->aDmPage = null;
		}
	} 
	
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmSessionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmProfile = null;
			$this->aDmPage = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSession.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmSession:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmSessionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmSession.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmSession:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSession.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmSession:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSessionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmSession.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmSession:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmSessionPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

												
			if ($this->aDmProfile !== null) {
				if ($this->aDmProfile->isModified() || $this->aDmProfile->isNew()) {
					$affectedRows += $this->aDmProfile->save($con);
				}
				$this->setDmProfile($this->aDmProfile);
			}

			if ($this->aDmPage !== null) {
				if ($this->aDmPage->isModified() || ($this->aDmPage->getCulture() && $this->aDmPage->getCurrentDmPageI18n()->isModified()) || $this->aDmPage->isNew()) {
					$affectedRows += $this->aDmPage->save($con);
				}
				$this->setDmPage($this->aDmPage);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DmSessionPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmSessionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmSessionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aDmProfile !== null) {
				if (!$this->aDmProfile->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmProfile->getValidationFailures());
				}
			}

			if ($this->aDmPage !== null) {
				if (!$this->aDmPage->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmPage->getValidationFailures());
				}
			}


			if (($retval = DmSessionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmSessionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSessId();
				break;
			case 2:
				return $this->getLastTime();
				break;
			case 3:
				return $this->getArrivalTime();
				break;
			case 4:
				return $this->getIp();
				break;
			case 5:
				return $this->getAddress();
				break;
			case 6:
				return $this->getDmProfileId();
				break;
			case 7:
				return $this->getDmPageId();
				break;
			case 8:
				return $this->getUrl();
				break;
			case 9:
				return $this->getNbPages();
				break;
			case 10:
				return $this->getBrowserName();
				break;
			case 11:
				return $this->getBrowserVersion();
				break;
			case 12:
				return $this->getPlatform();
				break;
			case 13:
				return $this->getIsCrawler();
				break;
			case 14:
				return $this->getIsRssReader();
				break;
			case 15:
				return $this->getIsBanned();
				break;
			case 16:
				return $this->getIsMobileDevice();
				break;
			case 17:
				return $this->getUserAgent();
				break;
			case 18:
				return $this->getStatusCode();
				break;
			case 19:
				return $this->getContentType();
				break;
			case 20:
				return $this->getContentLength();
				break;
			case 21:
				return $this->getTime();
				break;
			case 22:
				return $this->getHistory();
				break;
			case 23:
				return $this->getIsCached();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmSessionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSessId(),
			$keys[2] => $this->getLastTime(),
			$keys[3] => $this->getArrivalTime(),
			$keys[4] => $this->getIp(),
			$keys[5] => $this->getAddress(),
			$keys[6] => $this->getDmProfileId(),
			$keys[7] => $this->getDmPageId(),
			$keys[8] => $this->getUrl(),
			$keys[9] => $this->getNbPages(),
			$keys[10] => $this->getBrowserName(),
			$keys[11] => $this->getBrowserVersion(),
			$keys[12] => $this->getPlatform(),
			$keys[13] => $this->getIsCrawler(),
			$keys[14] => $this->getIsRssReader(),
			$keys[15] => $this->getIsBanned(),
			$keys[16] => $this->getIsMobileDevice(),
			$keys[17] => $this->getUserAgent(),
			$keys[18] => $this->getStatusCode(),
			$keys[19] => $this->getContentType(),
			$keys[20] => $this->getContentLength(),
			$keys[21] => $this->getTime(),
			$keys[22] => $this->getHistory(),
			$keys[23] => $this->getIsCached(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmSessionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSessId($value);
				break;
			case 2:
				$this->setLastTime($value);
				break;
			case 3:
				$this->setArrivalTime($value);
				break;
			case 4:
				$this->setIp($value);
				break;
			case 5:
				$this->setAddress($value);
				break;
			case 6:
				$this->setDmProfileId($value);
				break;
			case 7:
				$this->setDmPageId($value);
				break;
			case 8:
				$this->setUrl($value);
				break;
			case 9:
				$this->setNbPages($value);
				break;
			case 10:
				$this->setBrowserName($value);
				break;
			case 11:
				$this->setBrowserVersion($value);
				break;
			case 12:
				$this->setPlatform($value);
				break;
			case 13:
				$this->setIsCrawler($value);
				break;
			case 14:
				$this->setIsRssReader($value);
				break;
			case 15:
				$this->setIsBanned($value);
				break;
			case 16:
				$this->setIsMobileDevice($value);
				break;
			case 17:
				$this->setUserAgent($value);
				break;
			case 18:
				$this->setStatusCode($value);
				break;
			case 19:
				$this->setContentType($value);
				break;
			case 20:
				$this->setContentLength($value);
				break;
			case 21:
				$this->setTime($value);
				break;
			case 22:
				$this->setHistory($value);
				break;
			case 23:
				$this->setIsCached($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmSessionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSessId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLastTime($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setArrivalTime($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAddress($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDmProfileId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDmPageId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUrl($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNbPages($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setBrowserName($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBrowserVersion($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPlatform($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setIsCrawler($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setIsRssReader($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setIsBanned($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setIsMobileDevice($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUserAgent($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setStatusCode($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setContentType($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setContentLength($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setTime($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setHistory($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setIsCached($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmSessionPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmSessionPeer::ID)) $criteria->add(DmSessionPeer::ID, $this->id);
		if ($this->isColumnModified(DmSessionPeer::SESS_ID)) $criteria->add(DmSessionPeer::SESS_ID, $this->sess_id);
		if ($this->isColumnModified(DmSessionPeer::LAST_TIME)) $criteria->add(DmSessionPeer::LAST_TIME, $this->last_time);
		if ($this->isColumnModified(DmSessionPeer::ARRIVAL_TIME)) $criteria->add(DmSessionPeer::ARRIVAL_TIME, $this->arrival_time);
		if ($this->isColumnModified(DmSessionPeer::IP)) $criteria->add(DmSessionPeer::IP, $this->ip);
		if ($this->isColumnModified(DmSessionPeer::ADDRESS)) $criteria->add(DmSessionPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(DmSessionPeer::DM_PROFILE_ID)) $criteria->add(DmSessionPeer::DM_PROFILE_ID, $this->dm_profile_id);
		if ($this->isColumnModified(DmSessionPeer::DM_PAGE_ID)) $criteria->add(DmSessionPeer::DM_PAGE_ID, $this->dm_page_id);
		if ($this->isColumnModified(DmSessionPeer::URL)) $criteria->add(DmSessionPeer::URL, $this->url);
		if ($this->isColumnModified(DmSessionPeer::NB_PAGES)) $criteria->add(DmSessionPeer::NB_PAGES, $this->nb_pages);
		if ($this->isColumnModified(DmSessionPeer::BROWSER_NAME)) $criteria->add(DmSessionPeer::BROWSER_NAME, $this->browser_name);
		if ($this->isColumnModified(DmSessionPeer::BROWSER_VERSION)) $criteria->add(DmSessionPeer::BROWSER_VERSION, $this->browser_version);
		if ($this->isColumnModified(DmSessionPeer::PLATFORM)) $criteria->add(DmSessionPeer::PLATFORM, $this->platform);
		if ($this->isColumnModified(DmSessionPeer::IS_CRAWLER)) $criteria->add(DmSessionPeer::IS_CRAWLER, $this->is_crawler);
		if ($this->isColumnModified(DmSessionPeer::IS_RSS_READER)) $criteria->add(DmSessionPeer::IS_RSS_READER, $this->is_rss_reader);
		if ($this->isColumnModified(DmSessionPeer::IS_BANNED)) $criteria->add(DmSessionPeer::IS_BANNED, $this->is_banned);
		if ($this->isColumnModified(DmSessionPeer::IS_MOBILE_DEVICE)) $criteria->add(DmSessionPeer::IS_MOBILE_DEVICE, $this->is_mobile_device);
		if ($this->isColumnModified(DmSessionPeer::USER_AGENT)) $criteria->add(DmSessionPeer::USER_AGENT, $this->user_agent);
		if ($this->isColumnModified(DmSessionPeer::STATUS_CODE)) $criteria->add(DmSessionPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(DmSessionPeer::CONTENT_TYPE)) $criteria->add(DmSessionPeer::CONTENT_TYPE, $this->content_type);
		if ($this->isColumnModified(DmSessionPeer::CONTENT_LENGTH)) $criteria->add(DmSessionPeer::CONTENT_LENGTH, $this->content_length);
		if ($this->isColumnModified(DmSessionPeer::TIME)) $criteria->add(DmSessionPeer::TIME, $this->time);
		if ($this->isColumnModified(DmSessionPeer::HISTORY)) $criteria->add(DmSessionPeer::HISTORY, $this->history);
		if ($this->isColumnModified(DmSessionPeer::IS_CACHED)) $criteria->add(DmSessionPeer::IS_CACHED, $this->is_cached);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmSessionPeer::DATABASE_NAME);

		$criteria->add(DmSessionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setSessId($this->sess_id);

		$copyObj->setLastTime($this->last_time);

		$copyObj->setArrivalTime($this->arrival_time);

		$copyObj->setIp($this->ip);

		$copyObj->setAddress($this->address);

		$copyObj->setDmProfileId($this->dm_profile_id);

		$copyObj->setDmPageId($this->dm_page_id);

		$copyObj->setUrl($this->url);

		$copyObj->setNbPages($this->nb_pages);

		$copyObj->setBrowserName($this->browser_name);

		$copyObj->setBrowserVersion($this->browser_version);

		$copyObj->setPlatform($this->platform);

		$copyObj->setIsCrawler($this->is_crawler);

		$copyObj->setIsRssReader($this->is_rss_reader);

		$copyObj->setIsBanned($this->is_banned);

		$copyObj->setIsMobileDevice($this->is_mobile_device);

		$copyObj->setUserAgent($this->user_agent);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setContentType($this->content_type);

		$copyObj->setContentLength($this->content_length);

		$copyObj->setTime($this->time);

		$copyObj->setHistory($this->history);

		$copyObj->setIsCached($this->is_cached);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DmSessionPeer();
		}
		return self::$peer;
	}

	
	public function setDmProfile(DmProfile $v = null)
	{
		if ($v === null) {
			$this->setDmProfileId(NULL);
		} else {
			$this->setDmProfileId($v->getId());
		}

		$this->aDmProfile = $v;

						if ($v !== null) {
			$v->addDmSession($this);
		}

		return $this;
	}


	
	public function getDmProfile(PropelPDO $con = null)
	{
		if ($this->aDmProfile === null && ($this->dm_profile_id !== null)) {
			$c = new Criteria(DmProfilePeer::DATABASE_NAME);
			$c->add(DmProfilePeer::ID, $this->dm_profile_id);
			$this->aDmProfile = DmProfilePeer::doSelectOne($c, $con);
			
		}
		return $this->aDmProfile;
	}

	
	public function setDmPage(DmPage $v = null)
	{
		if ($v === null) {
			$this->setDmPageId(NULL);
		} else {
			$this->setDmPageId($v->getId());
		}

		$this->aDmPage = $v;

						if ($v !== null) {
			$v->addDmSession($this);
		}

		return $this;
	}


	
	public function getDmPage(PropelPDO $con = null)
	{
		if ($this->aDmPage === null && ($this->dm_page_id !== null)) {
			$c = new Criteria(DmPagePeer::DATABASE_NAME);
			$c->add(DmPagePeer::ID, $this->dm_page_id);
			$this->aDmPage = DmPagePeer::doSelectOne($c, $con);
			
		}
		return $this->aDmPage;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aDmProfile = null;
			$this->aDmPage = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSession.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmSession:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmSession::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }

  
  protected function processEvent(dmPropelEvent $event)
  {
    if ($event->isProcessed())
    {
      foreach ($event->getModifications() as $property => $value)
      {
        $this->$property = $value;
      }

      return true;
    }
    else
    {
      return false;
    }
  }

} 