<?php


abstract class BaseDmSiteI18n extends BaseObject  implements Persistent {


  const PEER = 'DmSiteI18nPeer';

	
	protected static $peer;

	
	protected $name;

	
	protected $google_file_name;

	
	protected $urchin_tracker;

	
	protected $urchin_tracker_active;

	
	protected $yahoo_file_name;

	
	protected $yahoo_file_content;

	
	protected $yahoo_active;

	
	protected $is_published;

	
	protected $is_indexable;

	
	protected $id;

	
	protected $culture;

	
	protected $aDmSite;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->urchin_tracker_active = false;
		$this->yahoo_active = false;
		$this->is_published = true;
		$this->is_indexable = false;
	}

	
	public function getName()
	{
		return $this->name;
	}

	
	public function getGoogleFileName()
	{
		return $this->google_file_name;
	}

	
	public function getUrchinTracker()
	{
		return $this->urchin_tracker;
	}

	
	public function getUrchinTrackerActive()
	{
		return $this->urchin_tracker_active;
	}

	
	public function getYahooFileName()
	{
		return $this->yahoo_file_name;
	}

	
	public function getYahooFileContent()
	{
		return $this->yahoo_file_content;
	}

	
	public function getYahooActive()
	{
		return $this->yahoo_active;
	}

	
	public function getIsPublished()
	{
		return $this->is_published;
	}

	
	public function getIsIndexable()
	{
		return $this->is_indexable;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getCulture()
	{
		return $this->culture;
	}

	
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::NAME;
		}

		return $this;
	} 
	
	public function setGoogleFileName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->google_file_name !== $v) {
			$this->google_file_name = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::GOOGLE_FILE_NAME;
		}

		return $this;
	} 
	
	public function setUrchinTracker($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->urchin_tracker !== $v) {
			$this->urchin_tracker = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::URCHIN_TRACKER;
		}

		return $this;
	} 
	
	public function setUrchinTrackerActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->urchin_tracker_active !== $v || $v === false) {
			$this->urchin_tracker_active = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::URCHIN_TRACKER_ACTIVE;
		}

		return $this;
	} 
	
	public function setYahooFileName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->yahoo_file_name !== $v) {
			$this->yahoo_file_name = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::YAHOO_FILE_NAME;
		}

		return $this;
	} 
	
	public function setYahooFileContent($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->yahoo_file_content !== $v) {
			$this->yahoo_file_content = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::YAHOO_FILE_CONTENT;
		}

		return $this;
	} 
	
	public function setYahooActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->yahoo_active !== $v || $v === false) {
			$this->yahoo_active = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::YAHOO_ACTIVE;
		}

		return $this;
	} 
	
	public function setIsPublished($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_published !== $v || $v === true) {
			$this->is_published = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::IS_PUBLISHED;
		}

		return $this;
	} 
	
	public function setIsIndexable($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_indexable !== $v || $v === false) {
			$this->is_indexable = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::IS_INDEXABLE;
		}

		return $this;
	} 
	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::ID;
		}

		if ($this->aDmSite !== null && $this->aDmSite->getId() !== $v) {
			$this->aDmSite = null;
		}

		return $this;
	} 
	
	public function setCulture($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->culture !== $v) {
			$this->culture = $v;
			$this->modifiedColumns[] = DmSiteI18nPeer::CULTURE;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmSiteI18nPeer::URCHIN_TRACKER_ACTIVE,DmSiteI18nPeer::YAHOO_ACTIVE,DmSiteI18nPeer::IS_PUBLISHED,DmSiteI18nPeer::IS_INDEXABLE))) {
				return false;
			}

			if ($this->urchin_tracker_active !== false) {
				return false;
			}

			if ($this->yahoo_active !== false) {
				return false;
			}

			if ($this->is_published !== true) {
				return false;
			}

			if ($this->is_indexable !== false) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->name = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->google_file_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->urchin_tracker = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->urchin_tracker_active = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->yahoo_file_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->yahoo_file_content = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->yahoo_active = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
			$this->is_published = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->is_indexable = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
			$this->id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->culture = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmSiteI18n object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmSite !== null && $this->id !== $this->aDmSite->getId()) {
			$this->aDmSite = null;
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
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmSiteI18nPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmSite = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSiteI18n.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmSiteI18n:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmSiteI18nPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmSiteI18n.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmSiteI18n:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSiteI18n.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmSiteI18n:save:pre') as $callable)
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
			$con = Propel::getConnection(DmSiteI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmSiteI18n.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmSiteI18n:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmSiteI18nPeer::addInstanceToPool($this);
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

												
			if ($this->aDmSite !== null) {
				if ($this->aDmSite->isModified() || ($this->aDmSite->getCulture() && $this->aDmSite->getCurrentDmSiteI18n()->isModified()) || $this->aDmSite->isNew()) {
					$affectedRows += $this->aDmSite->save($con);
				}
				$this->setDmSite($this->aDmSite);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmSiteI18nPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DmSiteI18nPeer::doUpdate($this, $con);
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


												
			if ($this->aDmSite !== null) {
				if (!$this->aDmSite->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmSite->getValidationFailures());
				}
			}


			if (($retval = DmSiteI18nPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmSiteI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getName();
				break;
			case 1:
				return $this->getGoogleFileName();
				break;
			case 2:
				return $this->getUrchinTracker();
				break;
			case 3:
				return $this->getUrchinTrackerActive();
				break;
			case 4:
				return $this->getYahooFileName();
				break;
			case 5:
				return $this->getYahooFileContent();
				break;
			case 6:
				return $this->getYahooActive();
				break;
			case 7:
				return $this->getIsPublished();
				break;
			case 8:
				return $this->getIsIndexable();
				break;
			case 9:
				return $this->getId();
				break;
			case 10:
				return $this->getCulture();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmSiteI18nPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getName(),
			$keys[1] => $this->getGoogleFileName(),
			$keys[2] => $this->getUrchinTracker(),
			$keys[3] => $this->getUrchinTrackerActive(),
			$keys[4] => $this->getYahooFileName(),
			$keys[5] => $this->getYahooFileContent(),
			$keys[6] => $this->getYahooActive(),
			$keys[7] => $this->getIsPublished(),
			$keys[8] => $this->getIsIndexable(),
			$keys[9] => $this->getId(),
			$keys[10] => $this->getCulture(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmSiteI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setName($value);
				break;
			case 1:
				$this->setGoogleFileName($value);
				break;
			case 2:
				$this->setUrchinTracker($value);
				break;
			case 3:
				$this->setUrchinTrackerActive($value);
				break;
			case 4:
				$this->setYahooFileName($value);
				break;
			case 5:
				$this->setYahooFileContent($value);
				break;
			case 6:
				$this->setYahooActive($value);
				break;
			case 7:
				$this->setIsPublished($value);
				break;
			case 8:
				$this->setIsIndexable($value);
				break;
			case 9:
				$this->setId($value);
				break;
			case 10:
				$this->setCulture($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmSiteI18nPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setName($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGoogleFileName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUrchinTracker($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUrchinTrackerActive($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setYahooFileName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setYahooFileContent($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setYahooActive($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsPublished($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsIndexable($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCulture($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmSiteI18nPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmSiteI18nPeer::NAME)) $criteria->add(DmSiteI18nPeer::NAME, $this->name);
		if ($this->isColumnModified(DmSiteI18nPeer::GOOGLE_FILE_NAME)) $criteria->add(DmSiteI18nPeer::GOOGLE_FILE_NAME, $this->google_file_name);
		if ($this->isColumnModified(DmSiteI18nPeer::URCHIN_TRACKER)) $criteria->add(DmSiteI18nPeer::URCHIN_TRACKER, $this->urchin_tracker);
		if ($this->isColumnModified(DmSiteI18nPeer::URCHIN_TRACKER_ACTIVE)) $criteria->add(DmSiteI18nPeer::URCHIN_TRACKER_ACTIVE, $this->urchin_tracker_active);
		if ($this->isColumnModified(DmSiteI18nPeer::YAHOO_FILE_NAME)) $criteria->add(DmSiteI18nPeer::YAHOO_FILE_NAME, $this->yahoo_file_name);
		if ($this->isColumnModified(DmSiteI18nPeer::YAHOO_FILE_CONTENT)) $criteria->add(DmSiteI18nPeer::YAHOO_FILE_CONTENT, $this->yahoo_file_content);
		if ($this->isColumnModified(DmSiteI18nPeer::YAHOO_ACTIVE)) $criteria->add(DmSiteI18nPeer::YAHOO_ACTIVE, $this->yahoo_active);
		if ($this->isColumnModified(DmSiteI18nPeer::IS_PUBLISHED)) $criteria->add(DmSiteI18nPeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(DmSiteI18nPeer::IS_INDEXABLE)) $criteria->add(DmSiteI18nPeer::IS_INDEXABLE, $this->is_indexable);
		if ($this->isColumnModified(DmSiteI18nPeer::ID)) $criteria->add(DmSiteI18nPeer::ID, $this->id);
		if ($this->isColumnModified(DmSiteI18nPeer::CULTURE)) $criteria->add(DmSiteI18nPeer::CULTURE, $this->culture);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmSiteI18nPeer::DATABASE_NAME);

		$criteria->add(DmSiteI18nPeer::ID, $this->id);
		$criteria->add(DmSiteI18nPeer::CULTURE, $this->culture);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getId();

		$pks[1] = $this->getCulture();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setId($keys[0]);

		$this->setCulture($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setGoogleFileName($this->google_file_name);

		$copyObj->setUrchinTracker($this->urchin_tracker);

		$copyObj->setUrchinTrackerActive($this->urchin_tracker_active);

		$copyObj->setYahooFileName($this->yahoo_file_name);

		$copyObj->setYahooFileContent($this->yahoo_file_content);

		$copyObj->setYahooActive($this->yahoo_active);

		$copyObj->setIsPublished($this->is_published);

		$copyObj->setIsIndexable($this->is_indexable);

		$copyObj->setId($this->id);

		$copyObj->setCulture($this->culture);


		$copyObj->setNew(true);

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
			self::$peer = new DmSiteI18nPeer();
		}
		return self::$peer;
	}

	
	public function setDmSite(DmSite $v = null)
	{
		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getId());
		}

		$this->aDmSite = $v;

						if ($v !== null) {
			$v->addDmSiteI18n($this);
		}

		return $this;
	}


	
	public function getDmSite(PropelPDO $con = null)
	{
		if ($this->aDmSite === null && ($this->id !== null)) {
			$c = new Criteria(DmSitePeer::DATABASE_NAME);
			$c->add(DmSitePeer::ID, $this->id);
			$this->aDmSite = DmSitePeer::doSelectOne($c, $con);
			
		}
		return $this->aDmSite;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aDmSite = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSiteI18n.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmSiteI18n:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmSiteI18n::%s', $method));
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