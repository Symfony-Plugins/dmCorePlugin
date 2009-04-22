<?php


abstract class BaseDmAutoSeo extends BaseObject  implements Persistent {


  const PEER = 'DmAutoSeoPeer';

	
	protected static $peer;

	
	protected $module;

	
	protected $action;

	
	protected $id;

	
	protected $collDmAutoSeoI18ns;

	
	private $lastDmAutoSeoI18nCriteria = null;

	
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
			$this->modifiedColumns[] = DmAutoSeoPeer::MODULE;
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
			$this->modifiedColumns[] = DmAutoSeoPeer::ACTION;
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
			$this->modifiedColumns[] = DmAutoSeoPeer::ID;
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
			throw new PropelException("Error populating DmAutoSeo object", $e);
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
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmAutoSeoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collDmAutoSeoI18ns = null;
			$this->lastDmAutoSeoI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmAutoSeo.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmAutoSeo:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmAutoSeoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmAutoSeo.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmAutoSeo:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmAutoSeo.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmAutoSeo:save:pre') as $callable)
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
			$con = Propel::getConnection(DmAutoSeoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmAutoSeo.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmAutoSeo:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmAutoSeoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = DmAutoSeoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmAutoSeoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmAutoSeoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmAutoSeoI18ns !== null) {
				foreach ($this->collDmAutoSeoI18ns as $referrerFK) {
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


			if (($retval = DmAutoSeoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmAutoSeoI18ns !== null) {
					foreach ($this->collDmAutoSeoI18ns as $referrerFK) {
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
		$pos = DmAutoSeoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = DmAutoSeoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getModule(),
			$keys[1] => $this->getAction(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmAutoSeoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = DmAutoSeoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setModule($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAction($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmAutoSeoPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmAutoSeoPeer::MODULE)) $criteria->add(DmAutoSeoPeer::MODULE, $this->module);
		if ($this->isColumnModified(DmAutoSeoPeer::ACTION)) $criteria->add(DmAutoSeoPeer::ACTION, $this->action);
		if ($this->isColumnModified(DmAutoSeoPeer::ID)) $criteria->add(DmAutoSeoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmAutoSeoPeer::DATABASE_NAME);

		$criteria->add(DmAutoSeoPeer::ID, $this->id);

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

			foreach ($this->getDmAutoSeoI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmAutoSeoI18n($relObj->copy($deepCopy));
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
			self::$peer = new DmAutoSeoPeer();
		}
		return self::$peer;
	}

	
	public function clearDmAutoSeoI18ns()
	{
		$this->collDmAutoSeoI18ns = null; 	}

	
	public function initDmAutoSeoI18ns()
	{
		$this->collDmAutoSeoI18ns = array();
	}

	
	public function getDmAutoSeoI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmAutoSeoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmAutoSeoI18ns === null) {
			if ($this->isNew()) {
			   $this->collDmAutoSeoI18ns = array();
			} else {

				$criteria->add(DmAutoSeoI18nPeer::ID, $this->id);

				DmAutoSeoI18nPeer::addSelectColumns($criteria);
				$this->collDmAutoSeoI18ns = DmAutoSeoI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmAutoSeoI18nPeer::ID, $this->id);

				DmAutoSeoI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmAutoSeoI18nCriteria) || !$this->lastDmAutoSeoI18nCriteria->equals($criteria)) {
					$this->collDmAutoSeoI18ns = DmAutoSeoI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmAutoSeoI18nCriteria = $criteria;
		return $this->collDmAutoSeoI18ns;
	}

	
	public function countDmAutoSeoI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmAutoSeoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmAutoSeoI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmAutoSeoI18nPeer::ID, $this->id);

				$count = DmAutoSeoI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmAutoSeoI18nPeer::ID, $this->id);

				if (!isset($this->lastDmAutoSeoI18nCriteria) || !$this->lastDmAutoSeoI18nCriteria->equals($criteria)) {
					$count = DmAutoSeoI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmAutoSeoI18ns);
				}
			} else {
				$count = count($this->collDmAutoSeoI18ns);
			}
		}
		return $count;
	}

	
	public function addDmAutoSeoI18n(DmAutoSeoI18n $l)
	{
		if ($this->collDmAutoSeoI18ns === null) {
			$this->initDmAutoSeoI18ns();
		}
		if (!in_array($l, $this->collDmAutoSeoI18ns, true)) { 			array_push($this->collDmAutoSeoI18ns, $l);
			$l->setDmAutoSeo($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmAutoSeoI18ns) {
				foreach ((array) $this->collDmAutoSeoI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmAutoSeoI18ns = null;
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
    return $this->getCurrentDmAutoSeoI18n($culture)->getSlug();
  }

  public function setSlug($value, $culture = null)
  {
    $this->getCurrentDmAutoSeoI18n($culture)->setSlug($value);
    return $this;
  }

  public function getName($culture = null)
  {
    return $this->getCurrentDmAutoSeoI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentDmAutoSeoI18n($culture)->setName($value);
    return $this;
  }

  public function getTitle($culture = null)
  {
    return $this->getCurrentDmAutoSeoI18n($culture)->getTitle();
  }

  public function setTitle($value, $culture = null)
  {
    $this->getCurrentDmAutoSeoI18n($culture)->setTitle($value);
    return $this;
  }

  public function getH1($culture = null)
  {
    return $this->getCurrentDmAutoSeoI18n($culture)->getH1();
  }

  public function setH1($value, $culture = null)
  {
    $this->getCurrentDmAutoSeoI18n($culture)->setH1($value);
    return $this;
  }

  public function getDescription($culture = null)
  {
    return $this->getCurrentDmAutoSeoI18n($culture)->getDescription();
  }

  public function setDescription($value, $culture = null)
  {
    $this->getCurrentDmAutoSeoI18n($culture)->setDescription($value);
    return $this;
  }

  public function getStripWords($culture = null)
  {
    return $this->getCurrentDmAutoSeoI18n($culture)->getStripWords();
  }

  public function setStripWords($value, $culture = null)
  {
    $this->getCurrentDmAutoSeoI18n($culture)->setStripWords($value);
    return $this;
  }

  protected $current_i18n = array();

  public function getCurrentDmAutoSeoI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = DmAutoSeoI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setDmAutoSeoI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setDmAutoSeoI18nForCulture(new DmAutoSeoI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setDmAutoSeoI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addDmAutoSeoI18n($object);
  }

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmAutoSeo.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmAutoSeo:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmAutoSeo::%s', $method));
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