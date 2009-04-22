<?php


abstract class BaseDmSite extends BaseObject  implements Persistent {


  const PEER = 'DmSitePeer';

	
	protected static $peer;

	
	protected $xiti;

	
	protected $xiti_active;

	
	protected $gdata_key;

	
	protected $gmap_key;

	
	protected $translation;

	
	protected $language_test;

	
	protected $refresh_index;

	
	protected $jpg_quality;

	
	protected $image;

	
	protected $is_first_launch;

	
	protected $is_working_copy;

	
	protected $index_populated_at;

	
	protected $updated_at;

	
	protected $id;

	
	protected $collDmSiteI18ns;

	
	private $lastDmSiteI18nCriteria = null;

	
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
		$this->xiti_active = false;
		$this->translation = false;
		$this->language_test = false;
		$this->refresh_index = true;
		$this->jpg_quality = 92;
		$this->is_first_launch = true;
		$this->is_working_copy = true;
	}

	
	public function getXiti()
	{
		return $this->xiti;
	}

	
	public function getXitiActive()
	{
		return $this->xiti_active;
	}

	
	public function getGdataKey()
	{
		return $this->gdata_key;
	}

	
	public function getGmapKey()
	{
		return $this->gmap_key;
	}

	
	public function getTranslation()
	{
		return $this->translation;
	}

	
	public function getLanguageTest()
	{
		return $this->language_test;
	}

	
	public function getRefreshIndex()
	{
		return $this->refresh_index;
	}

	
	public function getJpgQuality()
	{
		return $this->jpg_quality;
	}

	
	public function getImage()
	{
		return $this->image;
	}

	
	public function getIsFirstLaunch()
	{
		return $this->is_first_launch;
	}

	
	public function getIsWorkingCopy()
	{
		return $this->is_working_copy;
	}

	
	public function getIndexPopulatedAt($format = 'Y-m-d')
	{
		if ($this->index_populated_at === null) {
			return null;
		}


		if ($this->index_populated_at === '0000-00-00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->index_populated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->index_populated_at, true), $x);
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

	
	public function setXiti($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->xiti !== $v) {
			$this->xiti = $v;
			$this->modifiedColumns[] = DmSitePeer::XITI;
		}

		return $this;
	} 
	
	public function setXitiActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->xiti_active !== $v || $v === false) {
			$this->xiti_active = $v;
			$this->modifiedColumns[] = DmSitePeer::XITI_ACTIVE;
		}

		return $this;
	} 
	
	public function setGdataKey($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->gdata_key !== $v) {
			$this->gdata_key = $v;
			$this->modifiedColumns[] = DmSitePeer::GDATA_KEY;
		}

		return $this;
	} 
	
	public function setGmapKey($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->gmap_key !== $v) {
			$this->gmap_key = $v;
			$this->modifiedColumns[] = DmSitePeer::GMAP_KEY;
		}

		return $this;
	} 
	
	public function setTranslation($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->translation !== $v || $v === false) {
			$this->translation = $v;
			$this->modifiedColumns[] = DmSitePeer::TRANSLATION;
		}

		return $this;
	} 
	
	public function setLanguageTest($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->language_test !== $v || $v === false) {
			$this->language_test = $v;
			$this->modifiedColumns[] = DmSitePeer::LANGUAGE_TEST;
		}

		return $this;
	} 
	
	public function setRefreshIndex($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->refresh_index !== $v || $v === true) {
			$this->refresh_index = $v;
			$this->modifiedColumns[] = DmSitePeer::REFRESH_INDEX;
		}

		return $this;
	} 
	
	public function setJpgQuality($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->jpg_quality !== $v || $v === 92) {
			$this->jpg_quality = $v;
			$this->modifiedColumns[] = DmSitePeer::JPG_QUALITY;
		}

		return $this;
	} 
	
	public function setImage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->image !== $v) {
			$this->image = $v;
			$this->modifiedColumns[] = DmSitePeer::IMAGE;
		}

		return $this;
	} 
	
	public function setIsFirstLaunch($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_first_launch !== $v || $v === true) {
			$this->is_first_launch = $v;
			$this->modifiedColumns[] = DmSitePeer::IS_FIRST_LAUNCH;
		}

		return $this;
	} 
	
	public function setIsWorkingCopy($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_working_copy !== $v || $v === true) {
			$this->is_working_copy = $v;
			$this->modifiedColumns[] = DmSitePeer::IS_WORKING_COPY;
		}

		return $this;
	} 
	
	public function setIndexPopulatedAt($v)
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

		if ( $this->index_populated_at !== null || $dt !== null ) {
			
			$currNorm = ($this->index_populated_at !== null && $tmpDt = new DateTime($this->index_populated_at)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->index_populated_at = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = DmSitePeer::INDEX_POPULATED_AT;
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
				$this->modifiedColumns[] = DmSitePeer::UPDATED_AT;
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
			$this->modifiedColumns[] = DmSitePeer::ID;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmSitePeer::XITI_ACTIVE,DmSitePeer::TRANSLATION,DmSitePeer::LANGUAGE_TEST,DmSitePeer::REFRESH_INDEX,DmSitePeer::JPG_QUALITY,DmSitePeer::IS_FIRST_LAUNCH,DmSitePeer::IS_WORKING_COPY))) {
				return false;
			}

			if ($this->xiti_active !== false) {
				return false;
			}

			if ($this->translation !== false) {
				return false;
			}

			if ($this->language_test !== false) {
				return false;
			}

			if ($this->refresh_index !== true) {
				return false;
			}

			if ($this->jpg_quality !== 92) {
				return false;
			}

			if ($this->is_first_launch !== true) {
				return false;
			}

			if ($this->is_working_copy !== true) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->xiti = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->xiti_active = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
			$this->gdata_key = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->gmap_key = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->translation = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->language_test = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->refresh_index = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
			$this->jpg_quality = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->image = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->is_first_launch = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->is_working_copy = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
			$this->index_populated_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->updated_at = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmSite object", $e);
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
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmSitePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collDmSiteI18ns = null;
			$this->lastDmSiteI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSite.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmSite:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmSitePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmSite.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmSite:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSite.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmSite:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(DmSitePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmSitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmSite.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmSite:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmSitePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = DmSitePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmSitePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmSitePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmSiteI18ns !== null) {
				foreach ($this->collDmSiteI18ns as $referrerFK) {
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


			if (($retval = DmSitePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmSiteI18ns !== null) {
					foreach ($this->collDmSiteI18ns as $referrerFK) {
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
		$pos = DmSitePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getXiti();
				break;
			case 1:
				return $this->getXitiActive();
				break;
			case 2:
				return $this->getGdataKey();
				break;
			case 3:
				return $this->getGmapKey();
				break;
			case 4:
				return $this->getTranslation();
				break;
			case 5:
				return $this->getLanguageTest();
				break;
			case 6:
				return $this->getRefreshIndex();
				break;
			case 7:
				return $this->getJpgQuality();
				break;
			case 8:
				return $this->getImage();
				break;
			case 9:
				return $this->getIsFirstLaunch();
				break;
			case 10:
				return $this->getIsWorkingCopy();
				break;
			case 11:
				return $this->getIndexPopulatedAt();
				break;
			case 12:
				return $this->getUpdatedAt();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmSitePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getXiti(),
			$keys[1] => $this->getXitiActive(),
			$keys[2] => $this->getGdataKey(),
			$keys[3] => $this->getGmapKey(),
			$keys[4] => $this->getTranslation(),
			$keys[5] => $this->getLanguageTest(),
			$keys[6] => $this->getRefreshIndex(),
			$keys[7] => $this->getJpgQuality(),
			$keys[8] => $this->getImage(),
			$keys[9] => $this->getIsFirstLaunch(),
			$keys[10] => $this->getIsWorkingCopy(),
			$keys[11] => $this->getIndexPopulatedAt(),
			$keys[12] => $this->getUpdatedAt(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmSitePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setXiti($value);
				break;
			case 1:
				$this->setXitiActive($value);
				break;
			case 2:
				$this->setGdataKey($value);
				break;
			case 3:
				$this->setGmapKey($value);
				break;
			case 4:
				$this->setTranslation($value);
				break;
			case 5:
				$this->setLanguageTest($value);
				break;
			case 6:
				$this->setRefreshIndex($value);
				break;
			case 7:
				$this->setJpgQuality($value);
				break;
			case 8:
				$this->setImage($value);
				break;
			case 9:
				$this->setIsFirstLaunch($value);
				break;
			case 10:
				$this->setIsWorkingCopy($value);
				break;
			case 11:
				$this->setIndexPopulatedAt($value);
				break;
			case 12:
				$this->setUpdatedAt($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmSitePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setXiti($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setXitiActive($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGdataKey($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGmapKey($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTranslation($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLanguageTest($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefreshIndex($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setJpgQuality($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setImage($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIsFirstLaunch($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIsWorkingCopy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIndexPopulatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmSitePeer::DATABASE_NAME);

		if ($this->isColumnModified(DmSitePeer::XITI)) $criteria->add(DmSitePeer::XITI, $this->xiti);
		if ($this->isColumnModified(DmSitePeer::XITI_ACTIVE)) $criteria->add(DmSitePeer::XITI_ACTIVE, $this->xiti_active);
		if ($this->isColumnModified(DmSitePeer::GDATA_KEY)) $criteria->add(DmSitePeer::GDATA_KEY, $this->gdata_key);
		if ($this->isColumnModified(DmSitePeer::GMAP_KEY)) $criteria->add(DmSitePeer::GMAP_KEY, $this->gmap_key);
		if ($this->isColumnModified(DmSitePeer::TRANSLATION)) $criteria->add(DmSitePeer::TRANSLATION, $this->translation);
		if ($this->isColumnModified(DmSitePeer::LANGUAGE_TEST)) $criteria->add(DmSitePeer::LANGUAGE_TEST, $this->language_test);
		if ($this->isColumnModified(DmSitePeer::REFRESH_INDEX)) $criteria->add(DmSitePeer::REFRESH_INDEX, $this->refresh_index);
		if ($this->isColumnModified(DmSitePeer::JPG_QUALITY)) $criteria->add(DmSitePeer::JPG_QUALITY, $this->jpg_quality);
		if ($this->isColumnModified(DmSitePeer::IMAGE)) $criteria->add(DmSitePeer::IMAGE, $this->image);
		if ($this->isColumnModified(DmSitePeer::IS_FIRST_LAUNCH)) $criteria->add(DmSitePeer::IS_FIRST_LAUNCH, $this->is_first_launch);
		if ($this->isColumnModified(DmSitePeer::IS_WORKING_COPY)) $criteria->add(DmSitePeer::IS_WORKING_COPY, $this->is_working_copy);
		if ($this->isColumnModified(DmSitePeer::INDEX_POPULATED_AT)) $criteria->add(DmSitePeer::INDEX_POPULATED_AT, $this->index_populated_at);
		if ($this->isColumnModified(DmSitePeer::UPDATED_AT)) $criteria->add(DmSitePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DmSitePeer::ID)) $criteria->add(DmSitePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmSitePeer::DATABASE_NAME);

		$criteria->add(DmSitePeer::ID, $this->id);

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

		$copyObj->setXiti($this->xiti);

		$copyObj->setXitiActive($this->xiti_active);

		$copyObj->setGdataKey($this->gdata_key);

		$copyObj->setGmapKey($this->gmap_key);

		$copyObj->setTranslation($this->translation);

		$copyObj->setLanguageTest($this->language_test);

		$copyObj->setRefreshIndex($this->refresh_index);

		$copyObj->setJpgQuality($this->jpg_quality);

		$copyObj->setImage($this->image);

		$copyObj->setIsFirstLaunch($this->is_first_launch);

		$copyObj->setIsWorkingCopy($this->is_working_copy);

		$copyObj->setIndexPopulatedAt($this->index_populated_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDmSiteI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmSiteI18n($relObj->copy($deepCopy));
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
			self::$peer = new DmSitePeer();
		}
		return self::$peer;
	}

	
	public function clearDmSiteI18ns()
	{
		$this->collDmSiteI18ns = null; 	}

	
	public function initDmSiteI18ns()
	{
		$this->collDmSiteI18ns = array();
	}

	
	public function getDmSiteI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmSitePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmSiteI18ns === null) {
			if ($this->isNew()) {
			   $this->collDmSiteI18ns = array();
			} else {

				$criteria->add(DmSiteI18nPeer::ID, $this->id);

				DmSiteI18nPeer::addSelectColumns($criteria);
				$this->collDmSiteI18ns = DmSiteI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmSiteI18nPeer::ID, $this->id);

				DmSiteI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmSiteI18nCriteria) || !$this->lastDmSiteI18nCriteria->equals($criteria)) {
					$this->collDmSiteI18ns = DmSiteI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmSiteI18nCriteria = $criteria;
		return $this->collDmSiteI18ns;
	}

	
	public function countDmSiteI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmSitePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmSiteI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmSiteI18nPeer::ID, $this->id);

				$count = DmSiteI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmSiteI18nPeer::ID, $this->id);

				if (!isset($this->lastDmSiteI18nCriteria) || !$this->lastDmSiteI18nCriteria->equals($criteria)) {
					$count = DmSiteI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmSiteI18ns);
				}
			} else {
				$count = count($this->collDmSiteI18ns);
			}
		}
		return $count;
	}

	
	public function addDmSiteI18n(DmSiteI18n $l)
	{
		if ($this->collDmSiteI18ns === null) {
			$this->initDmSiteI18ns();
		}
		if (!in_array($l, $this->collDmSiteI18ns, true)) { 			array_push($this->collDmSiteI18ns, $l);
			$l->setDmSite($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmSiteI18ns) {
				foreach ((array) $this->collDmSiteI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmSiteI18ns = null;
	}


  
  public function getCulture()
  {
    return $this->culture;
  }

  
  public function setCulture($culture)
  {
    $this->culture = $culture;
  }

  public function getName($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setName($value);
    return $this;
  }

  public function getGoogleFileName($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getGoogleFileName();
  }

  public function setGoogleFileName($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setGoogleFileName($value);
    return $this;
  }

  public function getUrchinTracker($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getUrchinTracker();
  }

  public function setUrchinTracker($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setUrchinTracker($value);
    return $this;
  }

  public function getUrchinTrackerActive($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getUrchinTrackerActive();
  }

  public function setUrchinTrackerActive($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setUrchinTrackerActive($value);
    return $this;
  }

  public function getYahooFileName($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getYahooFileName();
  }

  public function setYahooFileName($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setYahooFileName($value);
    return $this;
  }

  public function getYahooFileContent($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getYahooFileContent();
  }

  public function setYahooFileContent($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setYahooFileContent($value);
    return $this;
  }

  public function getYahooActive($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getYahooActive();
  }

  public function setYahooActive($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setYahooActive($value);
    return $this;
  }

  public function getIsPublished($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getIsPublished();
  }

  public function setIsPublished($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setIsPublished($value);
    return $this;
  }

  public function getIsIndexable($culture = null)
  {
    return $this->getCurrentDmSiteI18n($culture)->getIsIndexable();
  }

  public function setIsIndexable($value, $culture = null)
  {
    $this->getCurrentDmSiteI18n($culture)->setIsIndexable($value);
    return $this;
  }

  protected $current_i18n = array();

  public function getCurrentDmSiteI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = DmSiteI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setDmSiteI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setDmSiteI18nForCulture(new DmSiteI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setDmSiteI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addDmSiteI18n($object);
  }

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmSite.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmSite:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmSite::%s', $method));
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