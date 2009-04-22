<?php


abstract class BaseDmPageView extends BaseObject  implements Persistent {


  const PEER = 'DmPageViewPeer';

	
	protected static $peer;

	
	protected $dm_layout_id;

	
	protected $id;

	
	protected $aDmLayout;

	
	protected $collDmPages;

	
	private $lastDmPageCriteria = null;

	
	protected $collDmZones;

	
	private $lastDmZoneCriteria = null;

	
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

	
	public function getDmLayoutId()
	{
		return $this->dm_layout_id;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function setDmLayoutId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dm_layout_id !== $v) {
			$this->dm_layout_id = $v;
			$this->modifiedColumns[] = DmPageViewPeer::DM_LAYOUT_ID;
		}

		if ($this->aDmLayout !== null && $this->aDmLayout->getId() !== $v) {
			$this->aDmLayout = null;
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
			$this->modifiedColumns[] = DmPageViewPeer::ID;
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

			$this->dm_layout_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmPageView object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmLayout !== null && $this->dm_layout_id !== $this->aDmLayout->getId()) {
			$this->aDmLayout = null;
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
			$con = Propel::getConnection(DmPageViewPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmPageViewPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmLayout = null;
			$this->collDmPages = null;
			$this->lastDmPageCriteria = null;

			$this->collDmZones = null;
			$this->lastDmZoneCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmPageView.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmPageView:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmPageViewPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmPageViewPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmPageView.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmPageView:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmPageView.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmPageView:save:pre') as $callable)
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
			$con = Propel::getConnection(DmPageViewPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmPageView.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmPageView:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmPageViewPeer::addInstanceToPool($this);
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

												
			if ($this->aDmLayout !== null) {
				if ($this->aDmLayout->isModified() || $this->aDmLayout->isNew()) {
					$affectedRows += $this->aDmLayout->save($con);
				}
				$this->setDmLayout($this->aDmLayout);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DmPageViewPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmPageViewPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmPageViewPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmPages !== null) {
				foreach ($this->collDmPages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDmZones !== null) {
				foreach ($this->collDmZones as $referrerFK) {
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


												
			if ($this->aDmLayout !== null) {
				if (!$this->aDmLayout->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmLayout->getValidationFailures());
				}
			}


			if (($retval = DmPageViewPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmPages !== null) {
					foreach ($this->collDmPages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDmZones !== null) {
					foreach ($this->collDmZones as $referrerFK) {
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
		$pos = DmPageViewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDmLayoutId();
				break;
			case 1:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmPageViewPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDmLayoutId(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmPageViewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDmLayoutId($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmPageViewPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDmLayoutId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmPageViewPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmPageViewPeer::DM_LAYOUT_ID)) $criteria->add(DmPageViewPeer::DM_LAYOUT_ID, $this->dm_layout_id);
		if ($this->isColumnModified(DmPageViewPeer::ID)) $criteria->add(DmPageViewPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmPageViewPeer::DATABASE_NAME);

		$criteria->add(DmPageViewPeer::ID, $this->id);

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

		$copyObj->setDmLayoutId($this->dm_layout_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDmPages() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmPage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDmZones() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmZone($relObj->copy($deepCopy));
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
			self::$peer = new DmPageViewPeer();
		}
		return self::$peer;
	}

	
	public function setDmLayout(DmLayout $v = null)
	{
		if ($v === null) {
			$this->setDmLayoutId(NULL);
		} else {
			$this->setDmLayoutId($v->getId());
		}

		$this->aDmLayout = $v;

						if ($v !== null) {
			$v->addDmPageView($this);
		}

		return $this;
	}


	
	public function getDmLayout(PropelPDO $con = null)
	{
		if ($this->aDmLayout === null && ($this->dm_layout_id !== null)) {
			$c = new Criteria(DmLayoutPeer::DATABASE_NAME);
			$c->add(DmLayoutPeer::ID, $this->dm_layout_id);
			$this->aDmLayout = DmLayoutPeer::doSelectOne($c, $con);
			
		}
		return $this->aDmLayout;
	}

	
	public function clearDmPages()
	{
		$this->collDmPages = null; 	}

	
	public function initDmPages()
	{
		$this->collDmPages = array();
	}

	
	public function getDmPages($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPageViewPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmPages === null) {
			if ($this->isNew()) {
			   $this->collDmPages = array();
			} else {

				$criteria->add(DmPagePeer::DM_PAGE_VIEW_ID, $this->id);

				DmPagePeer::addSelectColumns($criteria);
				$this->collDmPages = DmPagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmPagePeer::DM_PAGE_VIEW_ID, $this->id);

				DmPagePeer::addSelectColumns($criteria);
				if (!isset($this->lastDmPageCriteria) || !$this->lastDmPageCriteria->equals($criteria)) {
					$this->collDmPages = DmPagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmPageCriteria = $criteria;
		return $this->collDmPages;
	}

	
	public function countDmPages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPageViewPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmPages === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmPagePeer::DM_PAGE_VIEW_ID, $this->id);

				$count = DmPagePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmPagePeer::DM_PAGE_VIEW_ID, $this->id);

				if (!isset($this->lastDmPageCriteria) || !$this->lastDmPageCriteria->equals($criteria)) {
					$count = DmPagePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmPages);
				}
			} else {
				$count = count($this->collDmPages);
			}
		}
		return $count;
	}

	
	public function addDmPage(DmPage $l)
	{
		if ($this->collDmPages === null) {
			$this->initDmPages();
		}
		if (!in_array($l, $this->collDmPages, true)) { 			array_push($this->collDmPages, $l);
			$l->setDmPageView($this);
		}
	}


	
	public function getDmPagesJoinDmPageRelatedByTreeParent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPageViewPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmPages === null) {
			if ($this->isNew()) {
				$this->collDmPages = array();
			} else {

				$criteria->add(DmPagePeer::DM_PAGE_VIEW_ID, $this->id);

				$this->collDmPages = DmPagePeer::doSelectJoinDmPageRelatedByTreeParent($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DmPagePeer::DM_PAGE_VIEW_ID, $this->id);

			if (!isset($this->lastDmPageCriteria) || !$this->lastDmPageCriteria->equals($criteria)) {
				$this->collDmPages = DmPagePeer::doSelectJoinDmPageRelatedByTreeParent($criteria, $con, $join_behavior);
			}
		}
		$this->lastDmPageCriteria = $criteria;

		return $this->collDmPages;
	}

	
	public function clearDmZones()
	{
		$this->collDmZones = null; 	}

	
	public function initDmZones()
	{
		$this->collDmZones = array();
	}

	
	public function getDmZones($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPageViewPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmZones === null) {
			if ($this->isNew()) {
			   $this->collDmZones = array();
			} else {

				$criteria->add(DmZonePeer::DM_PAGE_VIEW_ID, $this->id);

				DmZonePeer::addSelectColumns($criteria);
				$this->collDmZones = DmZonePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmZonePeer::DM_PAGE_VIEW_ID, $this->id);

				DmZonePeer::addSelectColumns($criteria);
				if (!isset($this->lastDmZoneCriteria) || !$this->lastDmZoneCriteria->equals($criteria)) {
					$this->collDmZones = DmZonePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmZoneCriteria = $criteria;
		return $this->collDmZones;
	}

	
	public function countDmZones(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPageViewPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmZones === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmZonePeer::DM_PAGE_VIEW_ID, $this->id);

				$count = DmZonePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmZonePeer::DM_PAGE_VIEW_ID, $this->id);

				if (!isset($this->lastDmZoneCriteria) || !$this->lastDmZoneCriteria->equals($criteria)) {
					$count = DmZonePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmZones);
				}
			} else {
				$count = count($this->collDmZones);
			}
		}
		return $count;
	}

	
	public function addDmZone(DmZone $l)
	{
		if ($this->collDmZones === null) {
			$this->initDmZones();
		}
		if (!in_array($l, $this->collDmZones, true)) { 			array_push($this->collDmZones, $l);
			$l->setDmPageView($this);
		}
	}


	
	public function getDmZonesJoinDmLayoutPart($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPageViewPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmZones === null) {
			if ($this->isNew()) {
				$this->collDmZones = array();
			} else {

				$criteria->add(DmZonePeer::DM_PAGE_VIEW_ID, $this->id);

				$this->collDmZones = DmZonePeer::doSelectJoinDmLayoutPart($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DmZonePeer::DM_PAGE_VIEW_ID, $this->id);

			if (!isset($this->lastDmZoneCriteria) || !$this->lastDmZoneCriteria->equals($criteria)) {
				$this->collDmZones = DmZonePeer::doSelectJoinDmLayoutPart($criteria, $con, $join_behavior);
			}
		}
		$this->lastDmZoneCriteria = $criteria;

		return $this->collDmZones;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmPages) {
				foreach ((array) $this->collDmPages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDmZones) {
				foreach ((array) $this->collDmZones as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmPages = null;
		$this->collDmZones = null;
			$this->aDmLayout = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmPageView.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmPageView:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmPageView::%s', $method));
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