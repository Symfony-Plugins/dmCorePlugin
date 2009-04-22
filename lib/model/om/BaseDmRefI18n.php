<?php


abstract class BaseDmRefI18n extends BaseObject  implements Persistent {


  const PEER = 'DmRefI18nPeer';

	
	protected static $peer;

	
	protected $slug;

	
	protected $name;

	
	protected $title;

	
	protected $h1;

	
	protected $description;

	
	protected $strip_words;

	
	protected $id;

	
	protected $culture;

	
	protected $aDmRef;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->strip_words = 'a, de, du, des, ou, et, en, les, la, le, l, d, un, une, au, pour';
	}

	
	public function getSlug()
	{
		return $this->slug;
	}

	
	public function getName()
	{
		return $this->name;
	}

	
	public function getTitle()
	{
		return $this->title;
	}

	
	public function getH1()
	{
		return $this->h1;
	}

	
	public function getDescription()
	{
		return $this->description;
	}

	
	public function getStripWords()
	{
		return $this->strip_words;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getCulture()
	{
		return $this->culture;
	}

	
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = DmRefI18nPeer::SLUG;
		}

		return $this;
	} 
	
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DmRefI18nPeer::NAME;
		}

		return $this;
	} 
	
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = DmRefI18nPeer::TITLE;
		}

		return $this;
	} 
	
	public function setH1($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->h1 !== $v) {
			$this->h1 = $v;
			$this->modifiedColumns[] = DmRefI18nPeer::H1;
		}

		return $this;
	} 
	
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = DmRefI18nPeer::DESCRIPTION;
		}

		return $this;
	} 
	
	public function setStripWords($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->strip_words !== $v || $v === 'a, de, du, des, ou, et, en, les, la, le, l, d, un, une, au, pour') {
			$this->strip_words = $v;
			$this->modifiedColumns[] = DmRefI18nPeer::STRIP_WORDS;
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
			$this->modifiedColumns[] = DmRefI18nPeer::ID;
		}

		if ($this->aDmRef !== null && $this->aDmRef->getId() !== $v) {
			$this->aDmRef = null;
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
			$this->modifiedColumns[] = DmRefI18nPeer::CULTURE;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmRefI18nPeer::STRIP_WORDS))) {
				return false;
			}

			if ($this->strip_words !== 'a, de, du, des, ou, et, en, les, la, le, l, d, un, une, au, pour') {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->slug = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->title = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->h1 = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->strip_words = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->culture = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmRefI18n object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmRef !== null && $this->id !== $this->aDmRef->getId()) {
			$this->aDmRef = null;
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
			$con = Propel::getConnection(DmRefI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmRefI18nPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmRef = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmRefI18n.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmRefI18n:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmRefI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmRefI18nPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmRefI18n.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmRefI18n:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmRefI18n.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmRefI18n:save:pre') as $callable)
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
			$con = Propel::getConnection(DmRefI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmRefI18n.post_save', array(
      'arguments'         => $arguments,
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmRefI18n:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmRefI18nPeer::addInstanceToPool($this);
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

												
			if ($this->aDmRef !== null) {
				if ($this->aDmRef->isModified() || ($this->aDmRef->getCulture() && $this->aDmRef->getCurrentDmRefI18n()->isModified()) || $this->aDmRef->isNew()) {
					$affectedRows += $this->aDmRef->save($con);
				}
				$this->setDmRef($this->aDmRef);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmRefI18nPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DmRefI18nPeer::doUpdate($this, $con);
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


												
			if ($this->aDmRef !== null) {
				if (!$this->aDmRef->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmRef->getValidationFailures());
				}
			}


			if (($retval = DmRefI18nPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmRefI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSlug();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getTitle();
				break;
			case 3:
				return $this->getH1();
				break;
			case 4:
				return $this->getDescription();
				break;
			case 5:
				return $this->getStripWords();
				break;
			case 6:
				return $this->getId();
				break;
			case 7:
				return $this->getCulture();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmRefI18nPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSlug(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getH1(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getStripWords(),
			$keys[6] => $this->getId(),
			$keys[7] => $this->getCulture(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmRefI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSlug($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setTitle($value);
				break;
			case 3:
				$this->setH1($value);
				break;
			case 4:
				$this->setDescription($value);
				break;
			case 5:
				$this->setStripWords($value);
				break;
			case 6:
				$this->setId($value);
				break;
			case 7:
				$this->setCulture($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmRefI18nPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSlug($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setH1($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStripWords($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCulture($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmRefI18nPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmRefI18nPeer::SLUG)) $criteria->add(DmRefI18nPeer::SLUG, $this->slug);
		if ($this->isColumnModified(DmRefI18nPeer::NAME)) $criteria->add(DmRefI18nPeer::NAME, $this->name);
		if ($this->isColumnModified(DmRefI18nPeer::TITLE)) $criteria->add(DmRefI18nPeer::TITLE, $this->title);
		if ($this->isColumnModified(DmRefI18nPeer::H1)) $criteria->add(DmRefI18nPeer::H1, $this->h1);
		if ($this->isColumnModified(DmRefI18nPeer::DESCRIPTION)) $criteria->add(DmRefI18nPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(DmRefI18nPeer::STRIP_WORDS)) $criteria->add(DmRefI18nPeer::STRIP_WORDS, $this->strip_words);
		if ($this->isColumnModified(DmRefI18nPeer::ID)) $criteria->add(DmRefI18nPeer::ID, $this->id);
		if ($this->isColumnModified(DmRefI18nPeer::CULTURE)) $criteria->add(DmRefI18nPeer::CULTURE, $this->culture);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmRefI18nPeer::DATABASE_NAME);

		$criteria->add(DmRefI18nPeer::ID, $this->id);
		$criteria->add(DmRefI18nPeer::CULTURE, $this->culture);

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

		$copyObj->setSlug($this->slug);

		$copyObj->setName($this->name);

		$copyObj->setTitle($this->title);

		$copyObj->setH1($this->h1);

		$copyObj->setDescription($this->description);

		$copyObj->setStripWords($this->strip_words);

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
			self::$peer = new DmRefI18nPeer();
		}
		return self::$peer;
	}

	
	public function setDmRef(DmRef $v = null)
	{
		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getId());
		}

		$this->aDmRef = $v;

						if ($v !== null) {
			$v->addDmRefI18n($this);
		}

		return $this;
	}


	
	public function getDmRef(PropelPDO $con = null)
	{
		if ($this->aDmRef === null && ($this->id !== null)) {
			$c = new Criteria(DmRefPeer::DATABASE_NAME);
			$c->add(DmRefPeer::ID, $this->id);
			$this->aDmRef = DmRefPeer::doSelectOne($c, $con);
			
		}
		return $this->aDmRef;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aDmRef = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmRefI18n.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmRefI18n:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmRefI18n::%s', $method));
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