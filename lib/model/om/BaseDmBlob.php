<?php


abstract class BaseDmBlob extends BaseObject  implements Persistent {


  const PEER = 'DmBlobPeer';

	
	protected static $peer;

	
	protected $style;

	
	protected $jpg_quality;

	
	protected $title_position;

	
	protected $image_position;

	
	protected $image_width;

	
	protected $created_at;

	
	protected $updated_at;

	
	protected $id;

	
	protected $collDmBlobI18ns;

	
	private $lastDmBlobI18nCriteria = null;

	
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
		$this->style = 'default';
		$this->jpg_quality = 'default';
		$this->title_position = 'title_out';
		$this->image_position = 'img_left';
		$this->image_width = 200;
	}

	
	public function getStyle()
	{
		return $this->style;
	}

	
	public function getJpgQuality()
	{
		return $this->jpg_quality;
	}

	
	public function getTitlePosition()
	{
		return $this->title_position;
	}

	
	public function getImagePosition()
	{
		return $this->image_position;
	}

	
	public function getImageWidth()
	{
		return $this->image_width;
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

	
	public function setStyle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->style !== $v || $v === 'default') {
			$this->style = $v;
			$this->modifiedColumns[] = DmBlobPeer::STYLE;
		}

		return $this;
	} 
	
	public function setJpgQuality($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->jpg_quality !== $v || $v === 'default') {
			$this->jpg_quality = $v;
			$this->modifiedColumns[] = DmBlobPeer::JPG_QUALITY;
		}

		return $this;
	} 
	
	public function setTitlePosition($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title_position !== $v || $v === 'title_out') {
			$this->title_position = $v;
			$this->modifiedColumns[] = DmBlobPeer::TITLE_POSITION;
		}

		return $this;
	} 
	
	public function setImagePosition($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->image_position !== $v || $v === 'img_left') {
			$this->image_position = $v;
			$this->modifiedColumns[] = DmBlobPeer::IMAGE_POSITION;
		}

		return $this;
	} 
	
	public function setImageWidth($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->image_width !== $v || $v === 200) {
			$this->image_width = $v;
			$this->modifiedColumns[] = DmBlobPeer::IMAGE_WIDTH;
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
				$this->modifiedColumns[] = DmBlobPeer::CREATED_AT;
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
				$this->modifiedColumns[] = DmBlobPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = DmBlobPeer::ID;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmBlobPeer::STYLE,DmBlobPeer::JPG_QUALITY,DmBlobPeer::TITLE_POSITION,DmBlobPeer::IMAGE_POSITION,DmBlobPeer::IMAGE_WIDTH))) {
				return false;
			}

			if ($this->style !== 'default') {
				return false;
			}

			if ($this->jpg_quality !== 'default') {
				return false;
			}

			if ($this->title_position !== 'title_out') {
				return false;
			}

			if ($this->image_position !== 'img_left') {
				return false;
			}

			if ($this->image_width !== 200) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->style = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->jpg_quality = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->title_position = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->image_position = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->image_width = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmBlob object", $e);
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
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmBlobPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collDmBlobI18ns = null;
			$this->lastDmBlobI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmBlob.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmBlob:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmBlobPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmBlob.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmBlob:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmBlob.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmBlob:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(DmBlobPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(DmBlobPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmBlobPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmBlob.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmBlob:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmBlobPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = DmBlobPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmBlobPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmBlobPeer::doUpdate($this, $con);
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


			if (($retval = DmBlobPeer::doValidate($this, $columns)) !== true) {
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
		$pos = DmBlobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getStyle();
				break;
			case 1:
				return $this->getJpgQuality();
				break;
			case 2:
				return $this->getTitlePosition();
				break;
			case 3:
				return $this->getImagePosition();
				break;
			case 4:
				return $this->getImageWidth();
				break;
			case 5:
				return $this->getCreatedAt();
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
		$keys = DmBlobPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getStyle(),
			$keys[1] => $this->getJpgQuality(),
			$keys[2] => $this->getTitlePosition(),
			$keys[3] => $this->getImagePosition(),
			$keys[4] => $this->getImageWidth(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmBlobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setStyle($value);
				break;
			case 1:
				$this->setJpgQuality($value);
				break;
			case 2:
				$this->setTitlePosition($value);
				break;
			case 3:
				$this->setImagePosition($value);
				break;
			case 4:
				$this->setImageWidth($value);
				break;
			case 5:
				$this->setCreatedAt($value);
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
		$keys = DmBlobPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setStyle($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setJpgQuality($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitlePosition($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setImagePosition($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setImageWidth($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmBlobPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmBlobPeer::STYLE)) $criteria->add(DmBlobPeer::STYLE, $this->style);
		if ($this->isColumnModified(DmBlobPeer::JPG_QUALITY)) $criteria->add(DmBlobPeer::JPG_QUALITY, $this->jpg_quality);
		if ($this->isColumnModified(DmBlobPeer::TITLE_POSITION)) $criteria->add(DmBlobPeer::TITLE_POSITION, $this->title_position);
		if ($this->isColumnModified(DmBlobPeer::IMAGE_POSITION)) $criteria->add(DmBlobPeer::IMAGE_POSITION, $this->image_position);
		if ($this->isColumnModified(DmBlobPeer::IMAGE_WIDTH)) $criteria->add(DmBlobPeer::IMAGE_WIDTH, $this->image_width);
		if ($this->isColumnModified(DmBlobPeer::CREATED_AT)) $criteria->add(DmBlobPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(DmBlobPeer::UPDATED_AT)) $criteria->add(DmBlobPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DmBlobPeer::ID)) $criteria->add(DmBlobPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmBlobPeer::DATABASE_NAME);

		$criteria->add(DmBlobPeer::ID, $this->id);

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

		$copyObj->setStyle($this->style);

		$copyObj->setJpgQuality($this->jpg_quality);

		$copyObj->setTitlePosition($this->title_position);

		$copyObj->setImagePosition($this->image_position);

		$copyObj->setImageWidth($this->image_width);

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
			self::$peer = new DmBlobPeer();
		}
		return self::$peer;
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
			$criteria = new Criteria(DmBlobPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmBlobI18ns === null) {
			if ($this->isNew()) {
			   $this->collDmBlobI18ns = array();
			} else {

				$criteria->add(DmBlobI18nPeer::ID, $this->id);

				DmBlobI18nPeer::addSelectColumns($criteria);
				$this->collDmBlobI18ns = DmBlobI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmBlobI18nPeer::ID, $this->id);

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
			$criteria = new Criteria(DmBlobPeer::DATABASE_NAME);
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

				$criteria->add(DmBlobI18nPeer::ID, $this->id);

				$count = DmBlobI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmBlobI18nPeer::ID, $this->id);

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
			$l->setDmBlob($this);
		}
	}


	
	public function getDmBlobI18nsJoinDmMediaFile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmBlobPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmBlobI18ns === null) {
			if ($this->isNew()) {
				$this->collDmBlobI18ns = array();
			} else {

				$criteria->add(DmBlobI18nPeer::ID, $this->id);

				$this->collDmBlobI18ns = DmBlobI18nPeer::doSelectJoinDmMediaFile($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DmBlobI18nPeer::ID, $this->id);

			if (!isset($this->lastDmBlobI18nCriteria) || !$this->lastDmBlobI18nCriteria->equals($criteria)) {
				$this->collDmBlobI18ns = DmBlobI18nPeer::doSelectJoinDmMediaFile($criteria, $con, $join_behavior);
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
    return $this->getCurrentDmBlobI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentDmBlobI18n($culture)->setName($value);
    return $this;
  }

  public function getText($culture = null)
  {
    return $this->getCurrentDmBlobI18n($culture)->getText();
  }

  public function setText($value, $culture = null)
  {
    $this->getCurrentDmBlobI18n($culture)->setText($value);
    return $this;
  }

  public function getDmMediaFileId($culture = null)
  {
    return $this->getCurrentDmBlobI18n($culture)->getDmMediaFileId();
  }

  public function setDmMediaFileId($value, $culture = null)
  {
    $this->getCurrentDmBlobI18n($culture)->setDmMediaFileId($value);
    return $this;
  }

  protected $current_i18n = array();

  public function getCurrentDmBlobI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = DmBlobI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setDmBlobI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setDmBlobI18nForCulture(new DmBlobI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setDmBlobI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addDmBlobI18n($object);
  }

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmBlob.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmBlob:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmBlob::%s', $method));
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