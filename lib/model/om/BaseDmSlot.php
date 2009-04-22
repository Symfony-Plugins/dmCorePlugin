<?php


abstract class BaseDmSlot extends BaseObject  implements Persistent {


  const PEER = 'DmSlotPeer';

	
	protected static $peer;

	
	protected $dm_zone_id;

	
	protected $type;

	
	protected $module;

	
	protected $action;

	
	protected $value;

	
	protected $rank;

	
	protected $updated_at;

	
	protected $id;

	
	protected $aDmZone;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
	}

	
	public function getDmZoneId()
	{
		return $this->dm_zone_id;
	}

	
	public function getType()
	{
		return $this->type;
	}

	
	public function getModule()
	{
		return $this->module;
	}

	
	public function getAction()
	{
		return $this->action;
	}

	
	public function getValue()
	{
		return $this->value;
	}

	
	public function getRank()
	{
		return $this->rank;
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
			}
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function setDmZoneId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dm_zone_id !== $v) {
			$this->dm_zone_id = $v;
			$this->modifiedColumns[] = DmSlotPeer::DM_ZONE_ID;
		}

		if ($this->aDmZone !== null && $this->aDmZone->getId() !== $v) {
			$this->aDmZone = null;
		}

		return $this;
	} 
	
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = DmSlotPeer::TYPE;
		}

		return $this;
	} 
	
	public function setModule($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = DmSlotPeer::MODULE;
		}

		return $this;
	} 
	
	public function setAction($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->action !== $v) {
			$this->action = $v;
			$this->modifiedColumns[] = DmSlotPeer::ACTION;
		}

		return $this;
	} 
	
	public function setValue($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->value !== $v) {
			$this->value = $v;
			$this->modifiedColumns[] = DmSlotPeer::VALUE;
		}

		return $this;
	} 
	
	public function setRank($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = DmSlotPeer::RANK;
		}

		return $this;
	} 
	
	public function setUpdatedAt($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->updated_at !== null || $dt !== null ) {
			
			$currNorm = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DmSlotPeer::UPDATED_AT;
			}
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
			$this->modifiedColumns[] = DmSlotPeer::ID;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->dm_zone_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->type = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->module = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->action = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->value = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->rank = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmSlot object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmZone !== null && $this->dm_zone_id !== $this->aDmZone->getId()) {
			$this->aDmZone = null;
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
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmSlotPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmZone = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSlot.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmSlot:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmSlotPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmSlot.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmSlot:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSlot.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmSlot:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(DmSlotPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSlotPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmSlot.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmSlot:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmSlotPeer::addInstanceToPool($this);
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

												
			if ($this->aDmZone !== null) {
				if ($this->aDmZone->isModified() || $this->aDmZone->isNew()) {
					$affectedRows += $this->aDmZone->save($con);
				}
				$this->setDmZone($this->aDmZone);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DmSlotPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmSlotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmSlotPeer::doUpdate($this, $con);
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


												
			if ($this->aDmZone !== null) {
				if (!$this->aDmZone->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmZone->getValidationFailures());
				}
			}


			if (($retval = DmSlotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmSlotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDmZoneId();
				break;
			case 1:
				return $this->getType();
				break;
			case 2:
				return $this->getModule();
				break;
			case 3:
				return $this->getAction();
				break;
			case 4:
				return $this->getValue();
				break;
			case 5:
				return $this->getRank();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmSlotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDmZoneId(),
			$keys[1] => $this->getType(),
			$keys[2] => $this->getModule(),
			$keys[3] => $this->getAction(),
			$keys[4] => $this->getValue(),
			$keys[5] => $this->getRank(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmSlotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDmZoneId($value);
				break;
			case 1:
				$this->setType($value);
				break;
			case 2:
				$this->setModule($value);
				break;
			case 3:
				$this->setAction($value);
				break;
			case 4:
				$this->setValue($value);
				break;
			case 5:
				$this->setRank($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmSlotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDmZoneId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setModule($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAction($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValue($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRank($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmSlotPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmSlotPeer::DM_ZONE_ID)) $criteria->add(DmSlotPeer::DM_ZONE_ID, $this->dm_zone_id);
		if ($this->isColumnModified(DmSlotPeer::TYPE)) $criteria->add(DmSlotPeer::TYPE, $this->type);
		if ($this->isColumnModified(DmSlotPeer::MODULE)) $criteria->add(DmSlotPeer::MODULE, $this->module);
		if ($this->isColumnModified(DmSlotPeer::ACTION)) $criteria->add(DmSlotPeer::ACTION, $this->action);
		if ($this->isColumnModified(DmSlotPeer::VALUE)) $criteria->add(DmSlotPeer::VALUE, $this->value);
		if ($this->isColumnModified(DmSlotPeer::RANK)) $criteria->add(DmSlotPeer::RANK, $this->rank);
		if ($this->isColumnModified(DmSlotPeer::UPDATED_AT)) $criteria->add(DmSlotPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DmSlotPeer::ID)) $criteria->add(DmSlotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmSlotPeer::DATABASE_NAME);

		$criteria->add(DmSlotPeer::ID, $this->id);

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

		$copyObj->setDmZoneId($this->dm_zone_id);

		$copyObj->setType($this->type);

		$copyObj->setModule($this->module);

		$copyObj->setAction($this->action);

		$copyObj->setValue($this->value);

		$copyObj->setRank($this->rank);

		$copyObj->setUpdatedAt($this->updated_at);


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
			self::$peer = new DmSlotPeer();
		}
		return self::$peer;
	}

	
	public function setDmZone(DmZone $v = null)
	{
		if ($v === null) {
			$this->setDmZoneId(NULL);
		} else {
			$this->setDmZoneId($v->getId());
		}

		$this->aDmZone = $v;

						if ($v !== null) {
			$v->addDmSlot($this);
		}

		return $this;
	}


	
	public function getDmZone(PropelPDO $con = null)
	{
		if ($this->aDmZone === null && ($this->dm_zone_id !== null)) {
			$c = new Criteria(DmZonePeer::DATABASE_NAME);
			$c->add(DmZonePeer::ID, $this->dm_zone_id);
			$this->aDmZone = DmZonePeer::doSelectOne($c, $con);
			
		}
		return $this->aDmZone;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aDmZone = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSlot.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmSlot:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmSlot::%s', $method));
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