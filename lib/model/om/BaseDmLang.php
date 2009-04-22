<?php


abstract class BaseDmLang extends BaseObject  implements Persistent {


  const PEER = 'DmLangPeer';

	
	protected static $peer;

	
	protected $name;

	
	protected $lang;

	
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
		$this->lang = 'en';
	}

	
	public function getName()
	{
		return $this->name;
	}

	
	public function getLang()
	{
		return $this->lang;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DmLangPeer::NAME;
		}

		return $this;
	} 
	
	public function setLang($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lang !== $v || $v === 'en') {
			$this->lang = $v;
			$this->modifiedColumns[] = DmLangPeer::LANG;
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
			$this->modifiedColumns[] = DmLangPeer::ID;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmLangPeer::LANG))) {
				return false;
			}

			if ($this->lang !== 'en') {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->name = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->lang = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmLang object", $e);
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
			$con = Propel::getConnection(DmLangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmLangPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmLang.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmLang:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmLangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmLangPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmLang.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmLang:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmLang.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmLang:save:pre') as $callable)
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
			$con = Propel::getConnection(DmLangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmLang.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmLang:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmLangPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = DmLangPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmLangPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmLangPeer::doUpdate($this, $con);
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


			if (($retval = DmLangPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmLangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLang();
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
		$keys = DmLangPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getName(),
			$keys[1] => $this->getLang(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmLangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setName($value);
				break;
			case 1:
				$this->setLang($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmLangPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setName($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLang($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmLangPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmLangPeer::NAME)) $criteria->add(DmLangPeer::NAME, $this->name);
		if ($this->isColumnModified(DmLangPeer::LANG)) $criteria->add(DmLangPeer::LANG, $this->lang);
		if ($this->isColumnModified(DmLangPeer::ID)) $criteria->add(DmLangPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmLangPeer::DATABASE_NAME);

		$criteria->add(DmLangPeer::ID, $this->id);

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

		$copyObj->setName($this->name);

		$copyObj->setLang($this->lang);


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
			self::$peer = new DmLangPeer();
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
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmLang.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmLang:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmLang::%s', $method));
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