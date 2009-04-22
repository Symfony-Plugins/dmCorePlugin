<?php


abstract class BaseTransUnit extends BaseObject  implements Persistent {


  const PEER = 'TransUnitPeer';

	
	protected static $peer;

	
	protected $msg_id;

	
	protected $cat_id;

	
	protected $source;

	
	protected $target;

	
	protected $meta;

	
	protected $is_approved;

	
	protected $aCatalogue;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->cat_id = 1;
		$this->is_approved = false;
	}

	
	public function getMsgId()
	{
		return $this->msg_id;
	}

	
	public function getCatId()
	{
		return $this->cat_id;
	}

	
	public function getSource()
	{
		return $this->source;
	}

	
	public function getTarget()
	{
		return $this->target;
	}

	
	public function getMeta()
	{
		return $this->meta;
	}

	
	public function getIsApproved()
	{
		return $this->is_approved;
	}

	
	public function setMsgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->msg_id !== $v) {
			$this->msg_id = $v;
			$this->modifiedColumns[] = TransUnitPeer::MSG_ID;
		}

		return $this;
	} 
	
	public function setCatId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cat_id !== $v || $v === 1) {
			$this->cat_id = $v;
			$this->modifiedColumns[] = TransUnitPeer::CAT_ID;
		}

		if ($this->aCatalogue !== null && $this->aCatalogue->getCatId() !== $v) {
			$this->aCatalogue = null;
		}

		return $this;
	} 
	
	public function setSource($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->source !== $v) {
			$this->source = $v;
			$this->modifiedColumns[] = TransUnitPeer::SOURCE;
		}

		return $this;
	} 
	
	public function setTarget($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->target !== $v) {
			$this->target = $v;
			$this->modifiedColumns[] = TransUnitPeer::TARGET;
		}

		return $this;
	} 
	
	public function setMeta($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meta !== $v) {
			$this->meta = $v;
			$this->modifiedColumns[] = TransUnitPeer::META;
		}

		return $this;
	} 
	
	public function setIsApproved($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_approved !== $v || $v === false) {
			$this->is_approved = $v;
			$this->modifiedColumns[] = TransUnitPeer::IS_APPROVED;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(TransUnitPeer::CAT_ID,TransUnitPeer::IS_APPROVED))) {
				return false;
			}

			if ($this->cat_id !== 1) {
				return false;
			}

			if ($this->is_approved !== false) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->msg_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->cat_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->source = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->target = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->meta = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->is_approved = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TransUnit object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aCatalogue !== null && $this->cat_id !== $this->aCatalogue->getCatId()) {
			$this->aCatalogue = null;
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
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = TransUnitPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aCatalogue = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseTransUnit.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseTransUnit:delete:pre') as $callable)
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
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			TransUnitPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseTransUnit.post_delete', array()));
foreach (sfMixer::getCallables('BaseTransUnit:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseTransUnit.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseTransUnit:save:pre') as $callable)
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
			$con = Propel::getConnection(TransUnitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseTransUnit.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseTransUnit:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			TransUnitPeer::addInstanceToPool($this);
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

												
			if ($this->aCatalogue !== null) {
				if ($this->aCatalogue->isModified() || $this->aCatalogue->isNew()) {
					$affectedRows += $this->aCatalogue->save($con);
				}
				$this->setCatalogue($this->aCatalogue);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = TransUnitPeer::MSG_ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TransUnitPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setMsgId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TransUnitPeer::doUpdate($this, $con);
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


												
			if ($this->aCatalogue !== null) {
				if (!$this->aCatalogue->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatalogue->getValidationFailures());
				}
			}


			if (($retval = TransUnitPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TransUnitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMsgId();
				break;
			case 1:
				return $this->getCatId();
				break;
			case 2:
				return $this->getSource();
				break;
			case 3:
				return $this->getTarget();
				break;
			case 4:
				return $this->getMeta();
				break;
			case 5:
				return $this->getIsApproved();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = TransUnitPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMsgId(),
			$keys[1] => $this->getCatId(),
			$keys[2] => $this->getSource(),
			$keys[3] => $this->getTarget(),
			$keys[4] => $this->getMeta(),
			$keys[5] => $this->getIsApproved(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TransUnitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMsgId($value);
				break;
			case 1:
				$this->setCatId($value);
				break;
			case 2:
				$this->setSource($value);
				break;
			case 3:
				$this->setTarget($value);
				break;
			case 4:
				$this->setMeta($value);
				break;
			case 5:
				$this->setIsApproved($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TransUnitPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMsgId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSource($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTarget($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMeta($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIsApproved($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TransUnitPeer::DATABASE_NAME);

		if ($this->isColumnModified(TransUnitPeer::MSG_ID)) $criteria->add(TransUnitPeer::MSG_ID, $this->msg_id);
		if ($this->isColumnModified(TransUnitPeer::CAT_ID)) $criteria->add(TransUnitPeer::CAT_ID, $this->cat_id);
		if ($this->isColumnModified(TransUnitPeer::SOURCE)) $criteria->add(TransUnitPeer::SOURCE, $this->source);
		if ($this->isColumnModified(TransUnitPeer::TARGET)) $criteria->add(TransUnitPeer::TARGET, $this->target);
		if ($this->isColumnModified(TransUnitPeer::META)) $criteria->add(TransUnitPeer::META, $this->meta);
		if ($this->isColumnModified(TransUnitPeer::IS_APPROVED)) $criteria->add(TransUnitPeer::IS_APPROVED, $this->is_approved);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TransUnitPeer::DATABASE_NAME);

		$criteria->add(TransUnitPeer::MSG_ID, $this->msg_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getMsgId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setMsgId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCatId($this->cat_id);

		$copyObj->setSource($this->source);

		$copyObj->setTarget($this->target);

		$copyObj->setMeta($this->meta);

		$copyObj->setIsApproved($this->is_approved);


		$copyObj->setNew(true);

		$copyObj->setMsgId(NULL); 
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
			self::$peer = new TransUnitPeer();
		}
		return self::$peer;
	}

	
	public function setCatalogue(Catalogue $v = null)
	{
		if ($v === null) {
			$this->setCatId(1);
		} else {
			$this->setCatId($v->getCatId());
		}

		$this->aCatalogue = $v;

						if ($v !== null) {
			$v->addTransUnit($this);
		}

		return $this;
	}


	
	public function getCatalogue(PropelPDO $con = null)
	{
		if ($this->aCatalogue === null && ($this->cat_id !== null)) {
			$c = new Criteria(CataloguePeer::DATABASE_NAME);
			$c->add(CataloguePeer::CAT_ID, $this->cat_id);
			$this->aCatalogue = CataloguePeer::doSelectOne($c, $con);
			
		}
		return $this->aCatalogue;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aCatalogue = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseTransUnit.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseTransUnit:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTransUnit::%s', $method));
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