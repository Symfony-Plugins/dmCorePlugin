<?php


abstract class BaseDmBlobI18n extends BaseObject  implements Persistent {


  const PEER = 'DmBlobI18nPeer';

	
	protected static $peer;

	
	protected $name;

	
	protected $text;

	
	protected $dm_media_file_id;

	
	protected $id;

	
	protected $culture;

	
	protected $aDmMediaFile;

	
	protected $aDmBlob;

	
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

	
	public function getName()
	{
		return $this->name;
	}

	
	public function getText()
	{
		return $this->text;
	}

	
	public function getDmMediaFileId()
	{
		return $this->dm_media_file_id;
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
			$this->modifiedColumns[] = DmBlobI18nPeer::NAME;
		}

		return $this;
	} 
	
	public function setText($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->text !== $v) {
			$this->text = $v;
			$this->modifiedColumns[] = DmBlobI18nPeer::TEXT;
		}

		return $this;
	} 
	
	public function setDmMediaFileId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dm_media_file_id !== $v) {
			$this->dm_media_file_id = $v;
			$this->modifiedColumns[] = DmBlobI18nPeer::DM_MEDIA_FILE_ID;
		}

		if ($this->aDmMediaFile !== null && $this->aDmMediaFile->getId() !== $v) {
			$this->aDmMediaFile = null;
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
			$this->modifiedColumns[] = DmBlobI18nPeer::ID;
		}

		if ($this->aDmBlob !== null && $this->aDmBlob->getId() !== $v) {
			$this->aDmBlob = null;
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
			$this->modifiedColumns[] = DmBlobI18nPeer::CULTURE;
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

			$this->name = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->text = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->dm_media_file_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->culture = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmBlobI18n object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmMediaFile !== null && $this->dm_media_file_id !== $this->aDmMediaFile->getId()) {
			$this->aDmMediaFile = null;
		}
		if ($this->aDmBlob !== null && $this->id !== $this->aDmBlob->getId()) {
			$this->aDmBlob = null;
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
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmBlobI18nPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmMediaFile = null;
			$this->aDmBlob = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmBlobI18n.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmBlobI18n:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmBlobI18nPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmBlobI18n.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmBlobI18n:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmBlobI18n.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmBlobI18n:save:pre') as $callable)
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
			$con = Propel::getConnection(DmBlobI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmBlobI18n.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmBlobI18n:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmBlobI18nPeer::addInstanceToPool($this);
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

												
			if ($this->aDmMediaFile !== null) {
				if ($this->aDmMediaFile->isModified() || $this->aDmMediaFile->isNew()) {
					$affectedRows += $this->aDmMediaFile->save($con);
				}
				$this->setDmMediaFile($this->aDmMediaFile);
			}

			if ($this->aDmBlob !== null) {
				if ($this->aDmBlob->isModified() || ($this->aDmBlob->getCulture() && $this->aDmBlob->getCurrentDmBlobI18n()->isModified()) || $this->aDmBlob->isNew()) {
					$affectedRows += $this->aDmBlob->save($con);
				}
				$this->setDmBlob($this->aDmBlob);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmBlobI18nPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DmBlobI18nPeer::doUpdate($this, $con);
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


												
			if ($this->aDmMediaFile !== null) {
				if (!$this->aDmMediaFile->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmMediaFile->getValidationFailures());
				}
			}

			if ($this->aDmBlob !== null) {
				if (!$this->aDmBlob->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmBlob->getValidationFailures());
				}
			}


			if (($retval = DmBlobI18nPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmBlobI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getText();
				break;
			case 2:
				return $this->getDmMediaFileId();
				break;
			case 3:
				return $this->getId();
				break;
			case 4:
				return $this->getCulture();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmBlobI18nPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getName(),
			$keys[1] => $this->getText(),
			$keys[2] => $this->getDmMediaFileId(),
			$keys[3] => $this->getId(),
			$keys[4] => $this->getCulture(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmBlobI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setName($value);
				break;
			case 1:
				$this->setText($value);
				break;
			case 2:
				$this->setDmMediaFileId($value);
				break;
			case 3:
				$this->setId($value);
				break;
			case 4:
				$this->setCulture($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmBlobI18nPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setName($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setText($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDmMediaFileId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCulture($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmBlobI18nPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmBlobI18nPeer::NAME)) $criteria->add(DmBlobI18nPeer::NAME, $this->name);
		if ($this->isColumnModified(DmBlobI18nPeer::TEXT)) $criteria->add(DmBlobI18nPeer::TEXT, $this->text);
		if ($this->isColumnModified(DmBlobI18nPeer::DM_MEDIA_FILE_ID)) $criteria->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, $this->dm_media_file_id);
		if ($this->isColumnModified(DmBlobI18nPeer::ID)) $criteria->add(DmBlobI18nPeer::ID, $this->id);
		if ($this->isColumnModified(DmBlobI18nPeer::CULTURE)) $criteria->add(DmBlobI18nPeer::CULTURE, $this->culture);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmBlobI18nPeer::DATABASE_NAME);

		$criteria->add(DmBlobI18nPeer::ID, $this->id);
		$criteria->add(DmBlobI18nPeer::CULTURE, $this->culture);

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

		$copyObj->setText($this->text);

		$copyObj->setDmMediaFileId($this->dm_media_file_id);

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
			self::$peer = new DmBlobI18nPeer();
		}
		return self::$peer;
	}

	
	public function setDmMediaFile(DmMediaFile $v = null)
	{
		if ($v === null) {
			$this->setDmMediaFileId(NULL);
		} else {
			$this->setDmMediaFileId($v->getId());
		}

		$this->aDmMediaFile = $v;

						if ($v !== null) {
			$v->addDmBlobI18n($this);
		}

		return $this;
	}


	
	public function getDmMediaFile(PropelPDO $con = null)
	{
		if ($this->aDmMediaFile === null && ($this->dm_media_file_id !== null)) {
			$c = new Criteria(DmMediaFilePeer::DATABASE_NAME);
			$c->add(DmMediaFilePeer::ID, $this->dm_media_file_id);
			$this->aDmMediaFile = DmMediaFilePeer::doSelectOne($c, $con);
			
		}
		return $this->aDmMediaFile;
	}

	
	public function setDmBlob(DmBlob $v = null)
	{
		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getId());
		}

		$this->aDmBlob = $v;

						if ($v !== null) {
			$v->addDmBlobI18n($this);
		}

		return $this;
	}


	
	public function getDmBlob(PropelPDO $con = null)
	{
		if ($this->aDmBlob === null && ($this->id !== null)) {
			$c = new Criteria(DmBlobPeer::DATABASE_NAME);
			$c->add(DmBlobPeer::ID, $this->id);
			$this->aDmBlob = DmBlobPeer::doSelectOne($c, $con);
			
		}
		return $this->aDmBlob;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aDmMediaFile = null;
			$this->aDmBlob = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmBlobI18n.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmBlobI18n:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmBlobI18n::%s', $method));
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