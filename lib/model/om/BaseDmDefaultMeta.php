<?php


abstract class BaseDmDefaultMeta extends BaseObject  implements Persistent {


  const PEER = 'DmDefaultMetaPeer';

	
	protected static $peer;

	
	protected $title_prefix;

	
	protected $title_suffix;

	
	protected $description_prefix;

	
	protected $description_suffix;

	
	protected $is_approved;

	
	protected $updated_at;

	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->is_approved = true;
	}

	
	public function getTitlePrefix()
	{
		return $this->title_prefix;
	}

	
	public function getTitleSuffix()
	{
		return $this->title_suffix;
	}

	
	public function getDescriptionPrefix()
	{
		return $this->description_prefix;
	}

	
	public function getDescriptionSuffix()
	{
		return $this->description_suffix;
	}

	
	public function getIsApproved()
	{
		return $this->is_approved;
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

	
	public function setTitlePrefix($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title_prefix !== $v) {
			$this->title_prefix = $v;
			$this->modifiedColumns[] = DmDefaultMetaPeer::TITLE_PREFIX;
		}

		return $this;
	} 
	
	public function setTitleSuffix($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title_suffix !== $v) {
			$this->title_suffix = $v;
			$this->modifiedColumns[] = DmDefaultMetaPeer::TITLE_SUFFIX;
		}

		return $this;
	} 
	
	public function setDescriptionPrefix($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description_prefix !== $v) {
			$this->description_prefix = $v;
			$this->modifiedColumns[] = DmDefaultMetaPeer::DESCRIPTION_PREFIX;
		}

		return $this;
	} 
	
	public function setDescriptionSuffix($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description_suffix !== $v) {
			$this->description_suffix = $v;
			$this->modifiedColumns[] = DmDefaultMetaPeer::DESCRIPTION_SUFFIX;
		}

		return $this;
	} 
	
	public function setIsApproved($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_approved !== $v || $v === true) {
			$this->is_approved = $v;
			$this->modifiedColumns[] = DmDefaultMetaPeer::IS_APPROVED;
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
				$this->modifiedColumns[] = DmDefaultMetaPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = DmDefaultMetaPeer::ID;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmDefaultMetaPeer::IS_APPROVED))) {
				return false;
			}

			if ($this->is_approved !== true) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->title_prefix = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->title_suffix = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->description_prefix = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->description_suffix = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->is_approved = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->updated_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmDefaultMeta object", $e);
		}
	}

	
	public function ensureConsistency()
	{

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
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmDefaultMetaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmDefaultMeta.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmDefaultMeta:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmDefaultMetaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmDefaultMeta.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmDefaultMeta:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmDefaultMeta.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmDefaultMeta:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(DmDefaultMetaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmDefaultMetaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmDefaultMeta.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmDefaultMeta:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmDefaultMetaPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DmDefaultMetaPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmDefaultMetaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmDefaultMetaPeer::doUpdate($this, $con);
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


			if (($retval = DmDefaultMetaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmDefaultMetaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTitlePrefix();
				break;
			case 1:
				return $this->getTitleSuffix();
				break;
			case 2:
				return $this->getDescriptionPrefix();
				break;
			case 3:
				return $this->getDescriptionSuffix();
				break;
			case 4:
				return $this->getIsApproved();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmDefaultMetaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTitlePrefix(),
			$keys[1] => $this->getTitleSuffix(),
			$keys[2] => $this->getDescriptionPrefix(),
			$keys[3] => $this->getDescriptionSuffix(),
			$keys[4] => $this->getIsApproved(),
			$keys[5] => $this->getUpdatedAt(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmDefaultMetaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTitlePrefix($value);
				break;
			case 1:
				$this->setTitleSuffix($value);
				break;
			case 2:
				$this->setDescriptionPrefix($value);
				break;
			case 3:
				$this->setDescriptionSuffix($value);
				break;
			case 4:
				$this->setIsApproved($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmDefaultMetaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTitlePrefix($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitleSuffix($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescriptionPrefix($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescriptionSuffix($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsApproved($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmDefaultMetaPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmDefaultMetaPeer::TITLE_PREFIX)) $criteria->add(DmDefaultMetaPeer::TITLE_PREFIX, $this->title_prefix);
		if ($this->isColumnModified(DmDefaultMetaPeer::TITLE_SUFFIX)) $criteria->add(DmDefaultMetaPeer::TITLE_SUFFIX, $this->title_suffix);
		if ($this->isColumnModified(DmDefaultMetaPeer::DESCRIPTION_PREFIX)) $criteria->add(DmDefaultMetaPeer::DESCRIPTION_PREFIX, $this->description_prefix);
		if ($this->isColumnModified(DmDefaultMetaPeer::DESCRIPTION_SUFFIX)) $criteria->add(DmDefaultMetaPeer::DESCRIPTION_SUFFIX, $this->description_suffix);
		if ($this->isColumnModified(DmDefaultMetaPeer::IS_APPROVED)) $criteria->add(DmDefaultMetaPeer::IS_APPROVED, $this->is_approved);
		if ($this->isColumnModified(DmDefaultMetaPeer::UPDATED_AT)) $criteria->add(DmDefaultMetaPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DmDefaultMetaPeer::ID)) $criteria->add(DmDefaultMetaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmDefaultMetaPeer::DATABASE_NAME);

		$criteria->add(DmDefaultMetaPeer::ID, $this->id);

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

		$copyObj->setTitlePrefix($this->title_prefix);

		$copyObj->setTitleSuffix($this->title_suffix);

		$copyObj->setDescriptionPrefix($this->description_prefix);

		$copyObj->setDescriptionSuffix($this->description_suffix);

		$copyObj->setIsApproved($this->is_approved);

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
			self::$peer = new DmDefaultMetaPeer();
		}
		return self::$peer;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmDefaultMeta.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmDefaultMeta:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmDefaultMeta::%s', $method));
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