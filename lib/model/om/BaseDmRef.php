<?php


abstract class BaseDmRef extends BaseObject  implements Persistent {


  const PEER = 'DmRefPeer';

	
	protected static $peer;

	
	protected $module;

	
	protected $action;

	
	protected $id;

	
	protected $collDmRefI18ns;

	
	private $lastDmRefI18nCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $culture;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
	}

	
	public function getModule()
	{
		return $this->module;
	}

	
	public function getAction()
	{
		return $this->action;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function setModule($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = DmRefPeer::MODULE;
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
			$this->modifiedColumns[] = DmRefPeer::ACTION;
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
			$this->modifiedColumns[] = DmRefPeer::ID;
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

			$this->module = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->action = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmRef object", $e);
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
			$con = Propel::getConnection(DmRefPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmRefPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collDmRefI18ns = null;
			$this->lastDmRefI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmRef.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmRef:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmRefPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmRefPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmRef.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmRef:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmRef.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmRef:save:pre') as $callable)
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
			$con = Propel::getConnection(DmRefPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmRef.post_save', array(
      'arguments'         => $arguments,
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmRef:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmRefPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = DmRefPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmRefPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmRefPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmRefI18ns !== null) {
				foreach ($this->collDmRefI18ns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = DmRefPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmRefI18ns !== null) {
					foreach ($this->collDmRefI18ns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmRefPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getModule();
				break;
			case 1:
				return $this->getAction();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmRefPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getModule(),
			$keys[1] => $this->getAction(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmRefPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setModule($value);
				break;
			case 1:
				$this->setAction($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmRefPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setModule($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAction($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmRefPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmRefPeer::MODULE)) $criteria->add(DmRefPeer::MODULE, $this->module);
		if ($this->isColumnModified(DmRefPeer::ACTION)) $criteria->add(DmRefPeer::ACTION, $this->action);
		if ($this->isColumnModified(DmRefPeer::ID)) $criteria->add(DmRefPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmRefPeer::DATABASE_NAME);

		$criteria->add(DmRefPeer::ID, $this->id);

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

		$copyObj->setModule($this->module);

		$copyObj->setAction($this->action);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDmRefI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmRefI18n($relObj->copy($deepCopy));
				}
			}

		} 

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
			self::$peer = new DmRefPeer();
		}
		return self::$peer;
	}

	
	public function clearDmRefI18ns()
	{
		$this->collDmRefI18ns = null; 	}

	
	public function initDmRefI18ns()
	{
		$this->collDmRefI18ns = array();
	}

	
	public function getDmRefI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmRefPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmRefI18ns === null) {
			if ($this->isNew()) {
			   $this->collDmRefI18ns = array();
			} else {

				$criteria->add(DmRefI18nPeer::ID, $this->id);

				DmRefI18nPeer::addSelectColumns($criteria);
				$this->collDmRefI18ns = DmRefI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmRefI18nPeer::ID, $this->id);

				DmRefI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmRefI18nCriteria) || !$this->lastDmRefI18nCriteria->equals($criteria)) {
					$this->collDmRefI18ns = DmRefI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmRefI18nCriteria = $criteria;
		return $this->collDmRefI18ns;
	}

	
	public function countDmRefI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmRefPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmRefI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmRefI18nPeer::ID, $this->id);

				$count = DmRefI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmRefI18nPeer::ID, $this->id);

				if (!isset($this->lastDmRefI18nCriteria) || !$this->lastDmRefI18nCriteria->equals($criteria)) {
					$count = DmRefI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmRefI18ns);
				}
			} else {
				$count = count($this->collDmRefI18ns);
			}
		}
		return $count;
	}

	
	public function addDmRefI18n(DmRefI18n $l)
	{
		if ($this->collDmRefI18ns === null) {
			$this->initDmRefI18ns();
		}
		if (!in_array($l, $this->collDmRefI18ns, true)) { 			array_push($this->collDmRefI18ns, $l);
			$l->setDmRef($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmRefI18ns) {
				foreach ((array) $this->collDmRefI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmRefI18ns = null;
	}


  
  public function getCulture()
  {
    return $this->culture;
  }

  
  public function setCulture($culture)
  {
    $this->culture = $culture;
  }

  public function getSlug($culture = null)
  {
    return $this->getCurrentDmRefI18n($culture)->getSlug();
  }

  public function setSlug($value, $culture = null)
  {
    $this->getCurrentDmRefI18n($culture)->setSlug($value);
    return $this;
  }

  public function getName($culture = null)
  {
    return $this->getCurrentDmRefI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentDmRefI18n($culture)->setName($value);
    return $this;
  }

  public function getTitle($culture = null)
  {
    return $this->getCurrentDmRefI18n($culture)->getTitle();
  }

  public function setTitle($value, $culture = null)
  {
    $this->getCurrentDmRefI18n($culture)->setTitle($value);
    return $this;
  }

  public function getH1($culture = null)
  {
    return $this->getCurrentDmRefI18n($culture)->getH1();
  }

  public function setH1($value, $culture = null)
  {
    $this->getCurrentDmRefI18n($culture)->setH1($value);
    return $this;
  }

  public function getDescription($culture = null)
  {
    return $this->getCurrentDmRefI18n($culture)->getDescription();
  }

  public function setDescription($value, $culture = null)
  {
    $this->getCurrentDmRefI18n($culture)->setDescription($value);
    return $this;
  }

  public function getStripWords($culture = null)
  {
    return $this->getCurrentDmRefI18n($culture)->getStripWords();
  }

  public function setStripWords($value, $culture = null)
  {
    $this->getCurrentDmRefI18n($culture)->setStripWords($value);
    return $this;
  }

  protected $current_i18n = array();

  public function getCurrentDmRefI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = DmRefI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setDmRefI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setDmRefI18nForCulture(new DmRefI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setDmRefI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addDmRefI18n($object);
  }

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmRef.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmRef:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmRef::%s', $method));
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