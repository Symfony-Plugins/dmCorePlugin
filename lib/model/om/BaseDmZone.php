<?php


abstract class BaseDmZone extends BaseObject  implements Persistent {


  const PEER = 'DmZonePeer';

	
	protected static $peer;

	
	protected $dm_page_view_id;

	
	protected $dm_layout_part_id;

	
	protected $css_class;

	
	protected $rank;

	
	protected $updated_at;

	
	protected $id;

	
	protected $aDmPageView;

	
	protected $aDmLayoutPart;

	
	protected $collDmSlots;

	
	private $lastDmSlotCriteria = null;

	
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

	
	public function getDmPageViewId()
	{
		return $this->dm_page_view_id;
	}

	
	public function getDmLayoutPartId()
	{
		return $this->dm_layout_part_id;
	}

	
	public function getCssClass()
	{
		return $this->css_class;
	}

	
	public function getRank()
	{
		return $this->rank;
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

	
	public function setDmPageViewId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dm_page_view_id !== $v) {
			$this->dm_page_view_id = $v;
			$this->modifiedColumns[] = DmZonePeer::DM_PAGE_VIEW_ID;
		}

		if ($this->aDmPageView !== null && $this->aDmPageView->getId() !== $v) {
			$this->aDmPageView = null;
		}

		return $this;
	} 
	
	public function setDmLayoutPartId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dm_layout_part_id !== $v) {
			$this->dm_layout_part_id = $v;
			$this->modifiedColumns[] = DmZonePeer::DM_LAYOUT_PART_ID;
		}

		if ($this->aDmLayoutPart !== null && $this->aDmLayoutPart->getId() !== $v) {
			$this->aDmLayoutPart = null;
		}

		return $this;
	} 
	
	public function setCssClass($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->css_class !== $v) {
			$this->css_class = $v;
			$this->modifiedColumns[] = DmZonePeer::CSS_CLASS;
		}

		return $this;
	} 
	
	public function setRank($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = DmZonePeer::RANK;
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
				$this->modifiedColumns[] = DmZonePeer::UPDATED_AT;
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
			$this->modifiedColumns[] = DmZonePeer::ID;
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

			$this->dm_page_view_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->dm_layout_part_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->css_class = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->rank = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->updated_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmZone object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmPageView !== null && $this->dm_page_view_id !== $this->aDmPageView->getId()) {
			$this->aDmPageView = null;
		}
		if ($this->aDmLayoutPart !== null && $this->dm_layout_part_id !== $this->aDmLayoutPart->getId()) {
			$this->aDmLayoutPart = null;
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
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmZonePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmPageView = null;
			$this->aDmLayoutPart = null;
			$this->collDmSlots = null;
			$this->lastDmSlotCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmZone.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmZone:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmZonePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmZone.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmZone:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmZone.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmZone:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(DmZonePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmZonePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmZone.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmZone:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmZonePeer::addInstanceToPool($this);
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

												
			if ($this->aDmPageView !== null) {
				if ($this->aDmPageView->isModified() || $this->aDmPageView->isNew()) {
					$affectedRows += $this->aDmPageView->save($con);
				}
				$this->setDmPageView($this->aDmPageView);
			}

			if ($this->aDmLayoutPart !== null) {
				if ($this->aDmLayoutPart->isModified() || $this->aDmLayoutPart->isNew()) {
					$affectedRows += $this->aDmLayoutPart->save($con);
				}
				$this->setDmLayoutPart($this->aDmLayoutPart);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DmZonePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmZonePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmZonePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmSlots !== null) {
				foreach ($this->collDmSlots as $referrerFK) {
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


												
			if ($this->aDmPageView !== null) {
				if (!$this->aDmPageView->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmPageView->getValidationFailures());
				}
			}

			if ($this->aDmLayoutPart !== null) {
				if (!$this->aDmLayoutPart->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmLayoutPart->getValidationFailures());
				}
			}


			if (($retval = DmZonePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmSlots !== null) {
					foreach ($this->collDmSlots as $referrerFK) {
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
		$pos = DmZonePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDmPageViewId();
				break;
			case 1:
				return $this->getDmLayoutPartId();
				break;
			case 2:
				return $this->getCssClass();
				break;
			case 3:
				return $this->getRank();
				break;
			case 4:
				return $this->getUpdatedAt();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmZonePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDmPageViewId(),
			$keys[1] => $this->getDmLayoutPartId(),
			$keys[2] => $this->getCssClass(),
			$keys[3] => $this->getRank(),
			$keys[4] => $this->getUpdatedAt(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmZonePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDmPageViewId($value);
				break;
			case 1:
				$this->setDmLayoutPartId($value);
				break;
			case 2:
				$this->setCssClass($value);
				break;
			case 3:
				$this->setRank($value);
				break;
			case 4:
				$this->setUpdatedAt($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmZonePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDmPageViewId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDmLayoutPartId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCssClass($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRank($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmZonePeer::DATABASE_NAME);

		if ($this->isColumnModified(DmZonePeer::DM_PAGE_VIEW_ID)) $criteria->add(DmZonePeer::DM_PAGE_VIEW_ID, $this->dm_page_view_id);
		if ($this->isColumnModified(DmZonePeer::DM_LAYOUT_PART_ID)) $criteria->add(DmZonePeer::DM_LAYOUT_PART_ID, $this->dm_layout_part_id);
		if ($this->isColumnModified(DmZonePeer::CSS_CLASS)) $criteria->add(DmZonePeer::CSS_CLASS, $this->css_class);
		if ($this->isColumnModified(DmZonePeer::RANK)) $criteria->add(DmZonePeer::RANK, $this->rank);
		if ($this->isColumnModified(DmZonePeer::UPDATED_AT)) $criteria->add(DmZonePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DmZonePeer::ID)) $criteria->add(DmZonePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmZonePeer::DATABASE_NAME);

		$criteria->add(DmZonePeer::ID, $this->id);

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

		$copyObj->setDmPageViewId($this->dm_page_view_id);

		$copyObj->setDmLayoutPartId($this->dm_layout_part_id);

		$copyObj->setCssClass($this->css_class);

		$copyObj->setRank($this->rank);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDmSlots() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmSlot($relObj->copy($deepCopy));
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
			self::$peer = new DmZonePeer();
		}
		return self::$peer;
	}

	
	public function setDmPageView(DmPageView $v = null)
	{
		if ($v === null) {
			$this->setDmPageViewId(NULL);
		} else {
			$this->setDmPageViewId($v->getId());
		}

		$this->aDmPageView = $v;

						if ($v !== null) {
			$v->addDmZone($this);
		}

		return $this;
	}


	
	public function getDmPageView(PropelPDO $con = null)
	{
		if ($this->aDmPageView === null && ($this->dm_page_view_id !== null)) {
			$c = new Criteria(DmPageViewPeer::DATABASE_NAME);
			$c->add(DmPageViewPeer::ID, $this->dm_page_view_id);
			$this->aDmPageView = DmPageViewPeer::doSelectOne($c, $con);
			
		}
		return $this->aDmPageView;
	}

	
	public function setDmLayoutPart(DmLayoutPart $v = null)
	{
		if ($v === null) {
			$this->setDmLayoutPartId(NULL);
		} else {
			$this->setDmLayoutPartId($v->getId());
		}

		$this->aDmLayoutPart = $v;

						if ($v !== null) {
			$v->addDmZone($this);
		}

		return $this;
	}


	
	public function getDmLayoutPart(PropelPDO $con = null)
	{
		if ($this->aDmLayoutPart === null && ($this->dm_layout_part_id !== null)) {
			$c = new Criteria(DmLayoutPartPeer::DATABASE_NAME);
			$c->add(DmLayoutPartPeer::ID, $this->dm_layout_part_id);
			$this->aDmLayoutPart = DmLayoutPartPeer::doSelectOne($c, $con);
			
		}
		return $this->aDmLayoutPart;
	}

	
	public function clearDmSlots()
	{
		$this->collDmSlots = null; 	}

	
	public function initDmSlots()
	{
		$this->collDmSlots = array();
	}

	
	public function getDmSlots($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmZonePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmSlots === null) {
			if ($this->isNew()) {
			   $this->collDmSlots = array();
			} else {

				$criteria->add(DmSlotPeer::DM_ZONE_ID, $this->id);

				DmSlotPeer::addSelectColumns($criteria);
				$this->collDmSlots = DmSlotPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmSlotPeer::DM_ZONE_ID, $this->id);

				DmSlotPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmSlotCriteria) || !$this->lastDmSlotCriteria->equals($criteria)) {
					$this->collDmSlots = DmSlotPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmSlotCriteria = $criteria;
		return $this->collDmSlots;
	}

	
	public function countDmSlots(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmZonePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmSlots === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmSlotPeer::DM_ZONE_ID, $this->id);

				$count = DmSlotPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmSlotPeer::DM_ZONE_ID, $this->id);

				if (!isset($this->lastDmSlotCriteria) || !$this->lastDmSlotCriteria->equals($criteria)) {
					$count = DmSlotPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmSlots);
				}
			} else {
				$count = count($this->collDmSlots);
			}
		}
		return $count;
	}

	
	public function addDmSlot(DmSlot $l)
	{
		if ($this->collDmSlots === null) {
			$this->initDmSlots();
		}
		if (!in_array($l, $this->collDmSlots, true)) { 			array_push($this->collDmSlots, $l);
			$l->setDmZone($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmSlots) {
				foreach ((array) $this->collDmSlots as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmSlots = null;
			$this->aDmPageView = null;
			$this->aDmLayoutPart = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmZone.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmZone:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmZone::%s', $method));
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