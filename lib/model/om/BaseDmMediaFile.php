<?php


abstract class BaseDmMediaFile extends BaseObject  implements Persistent {


  const PEER = 'DmMediaFilePeer';

	
	protected static $peer;

	
	protected $dm_media_folder_id;

	
	protected $nom;

	
	protected $description;

	
	protected $legend;

	
	protected $author;

	
	protected $copyright;

	
	protected $type;

	
	protected $filesize;

	
	protected $dim;

	
	protected $created_at;

	
	protected $updated_at;

	
	protected $id;

	
	protected $aDmMediaFolder;

	
	protected $collDmBlobI18ns;

	
	private $lastDmBlobI18nCriteria = null;

	
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

	
	public function getDmMediaFolderId()
	{
		return $this->dm_media_folder_id;
	}

	
	public function getNom()
	{
		return $this->nom;
	}

	
	public function getDescription()
	{
		return $this->description;
	}

	
	public function getLegend()
	{
		return $this->legend;
	}

	
	public function getAuthor()
	{
		return $this->author;
	}

	
	public function getCopyright()
	{
		return $this->copyright;
	}

	
	public function getType()
	{
		return $this->type;
	}

	
	public function getFilesize()
	{
		return $this->filesize;
	}

	
	public function getDim()
	{
		return $this->dim;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
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

	
	public function setDmMediaFolderId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dm_media_folder_id !== $v) {
			$this->dm_media_folder_id = $v;
			$this->modifiedColumns[] = DmMediaFilePeer::DM_MEDIA_FOLDER_ID;
		}

		if ($this->aDmMediaFolder !== null && $this->aDmMediaFolder->getId() !== $v) {
			$this->aDmMediaFolder = null;
		}

		return $this;
	} 
	
	public function setNom($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nom !== $v) {
			$this->nom = $v;
			$this->modifiedColumns[] = DmMediaFilePeer::NOM;
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
			$this->modifiedColumns[] = DmMediaFilePeer::DESCRIPTION;
		}

		return $this;
	} 
	
	public function setLegend($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->legend !== $v) {
			$this->legend = $v;
			$this->modifiedColumns[] = DmMediaFilePeer::LEGEND;
		}

		return $this;
	} 
	
	public function setAuthor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->author !== $v) {
			$this->author = $v;
			$this->modifiedColumns[] = DmMediaFilePeer::AUTHOR;
		}

		return $this;
	} 
	
	public function setCopyright($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->copyright !== $v) {
			$this->copyright = $v;
			$this->modifiedColumns[] = DmMediaFilePeer::COPYRIGHT;
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
			$this->modifiedColumns[] = DmMediaFilePeer::TYPE;
		}

		return $this;
	} 
	
	public function setFilesize($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->filesize !== $v) {
			$this->filesize = $v;
			$this->modifiedColumns[] = DmMediaFilePeer::FILESIZE;
		}

		return $this;
	} 
	
	public function setDim($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->dim !== $v) {
			$this->dim = $v;
			$this->modifiedColumns[] = DmMediaFilePeer::DIM;
		}

		return $this;
	} 
	
	public function setCreatedAt($v)
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

		if ( $this->created_at !== null || $dt !== null ) {
			
			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DmMediaFilePeer::CREATED_AT;
			}
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
				$this->modifiedColumns[] = DmMediaFilePeer::UPDATED_AT;
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
			$this->modifiedColumns[] = DmMediaFilePeer::ID;
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

			$this->dm_media_folder_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nom = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->legend = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->author = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->copyright = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->type = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->filesize = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->dim = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmMediaFile object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmMediaFolder !== null && $this->dm_media_folder_id !== $this->aDmMediaFolder->getId()) {
			$this->aDmMediaFolder = null;
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
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmMediaFilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmMediaFolder = null;
			$this->collDmBlobI18ns = null;
			$this->lastDmBlobI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmMediaFile.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmMediaFile:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmMediaFilePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmMediaFile.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmMediaFile:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmMediaFile.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmMediaFile:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(DmMediaFilePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(DmMediaFilePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmMediaFilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmMediaFile.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmMediaFile:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmMediaFilePeer::addInstanceToPool($this);
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

												
			if ($this->aDmMediaFolder !== null) {
				if ($this->aDmMediaFolder->isModified() || $this->aDmMediaFolder->isNew()) {
					$affectedRows += $this->aDmMediaFolder->save($con);
				}
				$this->setDmMediaFolder($this->aDmMediaFolder);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DmMediaFilePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmMediaFilePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmMediaFilePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmBlobI18ns !== null) {
				foreach ($this->collDmBlobI18ns as $referrerFK) {
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


												
			if ($this->aDmMediaFolder !== null) {
				if (!$this->aDmMediaFolder->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmMediaFolder->getValidationFailures());
				}
			}


			if (($retval = DmMediaFilePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmBlobI18ns !== null) {
					foreach ($this->collDmBlobI18ns as $referrerFK) {
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
		$pos = DmMediaFilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDmMediaFolderId();
				break;
			case 1:
				return $this->getNom();
				break;
			case 2:
				return $this->getDescription();
				break;
			case 3:
				return $this->getLegend();
				break;
			case 4:
				return $this->getAuthor();
				break;
			case 5:
				return $this->getCopyright();
				break;
			case 6:
				return $this->getType();
				break;
			case 7:
				return $this->getFilesize();
				break;
			case 8:
				return $this->getDim();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmMediaFilePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDmMediaFolderId(),
			$keys[1] => $this->getNom(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getLegend(),
			$keys[4] => $this->getAuthor(),
			$keys[5] => $this->getCopyright(),
			$keys[6] => $this->getType(),
			$keys[7] => $this->getFilesize(),
			$keys[8] => $this->getDim(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getUpdatedAt(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmMediaFilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDmMediaFolderId($value);
				break;
			case 1:
				$this->setNom($value);
				break;
			case 2:
				$this->setDescription($value);
				break;
			case 3:
				$this->setLegend($value);
				break;
			case 4:
				$this->setAuthor($value);
				break;
			case 5:
				$this->setCopyright($value);
				break;
			case 6:
				$this->setType($value);
				break;
			case 7:
				$this->setFilesize($value);
				break;
			case 8:
				$this->setDim($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmMediaFilePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDmMediaFolderId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLegend($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAuthor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCopyright($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setType($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFilesize($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDim($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmMediaFilePeer::DATABASE_NAME);

		if ($this->isColumnModified(DmMediaFilePeer::DM_MEDIA_FOLDER_ID)) $criteria->add(DmMediaFilePeer::DM_MEDIA_FOLDER_ID, $this->dm_media_folder_id);
		if ($this->isColumnModified(DmMediaFilePeer::NOM)) $criteria->add(DmMediaFilePeer::NOM, $this->nom);
		if ($this->isColumnModified(DmMediaFilePeer::DESCRIPTION)) $criteria->add(DmMediaFilePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(DmMediaFilePeer::LEGEND)) $criteria->add(DmMediaFilePeer::LEGEND, $this->legend);
		if ($this->isColumnModified(DmMediaFilePeer::AUTHOR)) $criteria->add(DmMediaFilePeer::AUTHOR, $this->author);
		if ($this->isColumnModified(DmMediaFilePeer::COPYRIGHT)) $criteria->add(DmMediaFilePeer::COPYRIGHT, $this->copyright);
		if ($this->isColumnModified(DmMediaFilePeer::TYPE)) $criteria->add(DmMediaFilePeer::TYPE, $this->type);
		if ($this->isColumnModified(DmMediaFilePeer::FILESIZE)) $criteria->add(DmMediaFilePeer::FILESIZE, $this->filesize);
		if ($this->isColumnModified(DmMediaFilePeer::DIM)) $criteria->add(DmMediaFilePeer::DIM, $this->dim);
		if ($this->isColumnModified(DmMediaFilePeer::CREATED_AT)) $criteria->add(DmMediaFilePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(DmMediaFilePeer::UPDATED_AT)) $criteria->add(DmMediaFilePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DmMediaFilePeer::ID)) $criteria->add(DmMediaFilePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmMediaFilePeer::DATABASE_NAME);

		$criteria->add(DmMediaFilePeer::ID, $this->id);

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

		$copyObj->setDmMediaFolderId($this->dm_media_folder_id);

		$copyObj->setNom($this->nom);

		$copyObj->setDescription($this->description);

		$copyObj->setLegend($this->legend);

		$copyObj->setAuthor($this->author);

		$copyObj->setCopyright($this->copyright);

		$copyObj->setType($this->type);

		$copyObj->setFilesize($this->filesize);

		$copyObj->setDim($this->dim);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDmBlobI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmBlobI18n($relObj->copy($deepCopy));
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
			self::$peer = new DmMediaFilePeer();
		}
		return self::$peer;
	}

	
	public function setDmMediaFolder(DmMediaFolder $v = null)
	{
		if ($v === null) {
			$this->setDmMediaFolderId(NULL);
		} else {
			$this->setDmMediaFolderId($v->getId());
		}

		$this->aDmMediaFolder = $v;

						if ($v !== null) {
			$v->addDmMediaFile($this);
		}

		return $this;
	}


	
	public function getDmMediaFolder(PropelPDO $con = null)
	{
		if ($this->aDmMediaFolder === null && ($this->dm_media_folder_id !== null)) {
			$c = new Criteria(DmMediaFolderPeer::DATABASE_NAME);
			$c->add(DmMediaFolderPeer::ID, $this->dm_media_folder_id);
			$this->aDmMediaFolder = DmMediaFolderPeer::doSelectOne($c, $con);
			
		}
		return $this->aDmMediaFolder;
	}

	
	public function clearDmBlobI18ns()
	{
		$this->collDmBlobI18ns = null; 	}

	
	public function initDmBlobI18ns()
	{
		$this->collDmBlobI18ns = array();
	}

	
	public function getDmBlobI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmMediaFilePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmBlobI18ns === null) {
			if ($this->isNew()) {
			   $this->collDmBlobI18ns = array();
			} else {

				$criteria->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, $this->id);

				DmBlobI18nPeer::addSelectColumns($criteria);
				$this->collDmBlobI18ns = DmBlobI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, $this->id);

				DmBlobI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmBlobI18nCriteria) || !$this->lastDmBlobI18nCriteria->equals($criteria)) {
					$this->collDmBlobI18ns = DmBlobI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmBlobI18nCriteria = $criteria;
		return $this->collDmBlobI18ns;
	}

	
	public function countDmBlobI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmMediaFilePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmBlobI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, $this->id);

				$count = DmBlobI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, $this->id);

				if (!isset($this->lastDmBlobI18nCriteria) || !$this->lastDmBlobI18nCriteria->equals($criteria)) {
					$count = DmBlobI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmBlobI18ns);
				}
			} else {
				$count = count($this->collDmBlobI18ns);
			}
		}
		return $count;
	}

	
	public function addDmBlobI18n(DmBlobI18n $l)
	{
		if ($this->collDmBlobI18ns === null) {
			$this->initDmBlobI18ns();
		}
		if (!in_array($l, $this->collDmBlobI18ns, true)) { 			array_push($this->collDmBlobI18ns, $l);
			$l->setDmMediaFile($this);
		}
	}


	
	public function getDmBlobI18nsJoinDmBlob($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmMediaFilePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmBlobI18ns === null) {
			if ($this->isNew()) {
				$this->collDmBlobI18ns = array();
			} else {

				$criteria->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, $this->id);

				$this->collDmBlobI18ns = DmBlobI18nPeer::doSelectJoinDmBlob($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DmBlobI18nPeer::DM_MEDIA_FILE_ID, $this->id);

			if (!isset($this->lastDmBlobI18nCriteria) || !$this->lastDmBlobI18nCriteria->equals($criteria)) {
				$this->collDmBlobI18ns = DmBlobI18nPeer::doSelectJoinDmBlob($criteria, $con, $join_behavior);
			}
		}
		$this->lastDmBlobI18nCriteria = $criteria;

		return $this->collDmBlobI18ns;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmBlobI18ns) {
				foreach ((array) $this->collDmBlobI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmBlobI18ns = null;
			$this->aDmMediaFolder = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmMediaFile.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmMediaFile:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmMediaFile::%s', $method));
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