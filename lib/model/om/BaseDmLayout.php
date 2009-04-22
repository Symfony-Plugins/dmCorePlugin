<?php


abstract class BaseDmLayout extends BaseObject  implements Persistent {


  const PEER = 'DmLayoutPeer';

	
	protected static $peer;

	
	protected $name;

	
	protected $has_head;

	
	protected $has_foot;

	
	protected $has_left;

	
	protected $has_right;

	
	protected $css_class;

	
	protected $updated_at;

	
	protected $id;

	
	protected $collDmPageViews;

	
	private $lastDmPageViewCriteria = null;

	
	protected $collDmLayoutParts;

	
	private $lastDmLayoutPartCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->has_head = true;
		$this->has_foot = true;
		$this->has_left = true;
		$this->has_right = true;
	}

	
	public function getName()
	{
		return $this->name;
	}

	
	public function getHasHead()
	{
		return $this->has_head;
	}

	
	public function getHasFoot()
	{
		return $this->has_foot;
	}

	
	public function getHasLeft()
	{
		return $this->has_left;
	}

	
	public function getHasRight()
	{
		return $this->has_right;
	}

	
	public function getCssClass()
	{
		return $this->css_class;
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

	
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DmLayoutPeer::NAME;
		}

		return $this;
	} 
	
	public function setHasHead($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->has_head !== $v || $v === true) {
			$this->has_head = $v;
			$this->modifiedColumns[] = DmLayoutPeer::HAS_HEAD;
		}

		return $this;
	} 
	
	public function setHasFoot($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->has_foot !== $v || $v === true) {
			$this->has_foot = $v;
			$this->modifiedColumns[] = DmLayoutPeer::HAS_FOOT;
		}

		return $this;
	} 
	
	public function setHasLeft($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->has_left !== $v || $v === true) {
			$this->has_left = $v;
			$this->modifiedColumns[] = DmLayoutPeer::HAS_LEFT;
		}

		return $this;
	} 
	
	public function setHasRight($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->has_right !== $v || $v === true) {
			$this->has_right = $v;
			$this->modifiedColumns[] = DmLayoutPeer::HAS_RIGHT;
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
			$this->modifiedColumns[] = DmLayoutPeer::CSS_CLASS;
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
				$this->modifiedColumns[] = DmLayoutPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = DmLayoutPeer::ID;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmLayoutPeer::HAS_HEAD,DmLayoutPeer::HAS_FOOT,DmLayoutPeer::HAS_LEFT,DmLayoutPeer::HAS_RIGHT))) {
				return false;
			}

			if ($this->has_head !== true) {
				return false;
			}

			if ($this->has_foot !== true) {
				return false;
			}

			if ($this->has_left !== true) {
				return false;
			}

			if ($this->has_right !== true) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->name = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->has_head = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
			$this->has_foot = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
			$this->has_left = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->has_right = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->css_class = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmLayout object", $e);
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
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmLayoutPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collDmPageViews = null;
			$this->lastDmPageViewCriteria = null;

			$this->collDmLayoutParts = null;
			$this->lastDmLayoutPartCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmLayout.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmLayout:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmLayoutPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmLayout.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmLayout:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmLayout.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmLayout:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(DmLayoutPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmLayoutPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmLayout.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmLayout:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmLayoutPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = DmLayoutPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmLayoutPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmLayoutPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmPageViews !== null) {
				foreach ($this->collDmPageViews as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDmLayoutParts !== null) {
				foreach ($this->collDmLayoutParts as $referrerFK) {
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


			if (($retval = DmLayoutPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmPageViews !== null) {
					foreach ($this->collDmPageViews as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDmLayoutParts !== null) {
					foreach ($this->collDmLayoutParts as $referrerFK) {
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
		$pos = DmLayoutPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getHasHead();
				break;
			case 2:
				return $this->getHasFoot();
				break;
			case 3:
				return $this->getHasLeft();
				break;
			case 4:
				return $this->getHasRight();
				break;
			case 5:
				return $this->getCssClass();
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
		$keys = DmLayoutPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getName(),
			$keys[1] => $this->getHasHead(),
			$keys[2] => $this->getHasFoot(),
			$keys[3] => $this->getHasLeft(),
			$keys[4] => $this->getHasRight(),
			$keys[5] => $this->getCssClass(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmLayoutPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setName($value);
				break;
			case 1:
				$this->setHasHead($value);
				break;
			case 2:
				$this->setHasFoot($value);
				break;
			case 3:
				$this->setHasLeft($value);
				break;
			case 4:
				$this->setHasRight($value);
				break;
			case 5:
				$this->setCssClass($value);
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
		$keys = DmLayoutPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setName($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setHasHead($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHasFoot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHasLeft($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHasRight($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCssClass($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmLayoutPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmLayoutPeer::NAME)) $criteria->add(DmLayoutPeer::NAME, $this->name);
		if ($this->isColumnModified(DmLayoutPeer::HAS_HEAD)) $criteria->add(DmLayoutPeer::HAS_HEAD, $this->has_head);
		if ($this->isColumnModified(DmLayoutPeer::HAS_FOOT)) $criteria->add(DmLayoutPeer::HAS_FOOT, $this->has_foot);
		if ($this->isColumnModified(DmLayoutPeer::HAS_LEFT)) $criteria->add(DmLayoutPeer::HAS_LEFT, $this->has_left);
		if ($this->isColumnModified(DmLayoutPeer::HAS_RIGHT)) $criteria->add(DmLayoutPeer::HAS_RIGHT, $this->has_right);
		if ($this->isColumnModified(DmLayoutPeer::CSS_CLASS)) $criteria->add(DmLayoutPeer::CSS_CLASS, $this->css_class);
		if ($this->isColumnModified(DmLayoutPeer::UPDATED_AT)) $criteria->add(DmLayoutPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DmLayoutPeer::ID)) $criteria->add(DmLayoutPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmLayoutPeer::DATABASE_NAME);

		$criteria->add(DmLayoutPeer::ID, $this->id);

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

		$copyObj->setHasHead($this->has_head);

		$copyObj->setHasFoot($this->has_foot);

		$copyObj->setHasLeft($this->has_left);

		$copyObj->setHasRight($this->has_right);

		$copyObj->setCssClass($this->css_class);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDmPageViews() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmPageView($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDmLayoutParts() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmLayoutPart($relObj->copy($deepCopy));
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
			self::$peer = new DmLayoutPeer();
		}
		return self::$peer;
	}

	
	public function clearDmPageViews()
	{
		$this->collDmPageViews = null; 	}

	
	public function initDmPageViews()
	{
		$this->collDmPageViews = array();
	}

	
	public function getDmPageViews($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmLayoutPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmPageViews === null) {
			if ($this->isNew()) {
			   $this->collDmPageViews = array();
			} else {

				$criteria->add(DmPageViewPeer::DM_LAYOUT_ID, $this->id);

				DmPageViewPeer::addSelectColumns($criteria);
				$this->collDmPageViews = DmPageViewPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmPageViewPeer::DM_LAYOUT_ID, $this->id);

				DmPageViewPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmPageViewCriteria) || !$this->lastDmPageViewCriteria->equals($criteria)) {
					$this->collDmPageViews = DmPageViewPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmPageViewCriteria = $criteria;
		return $this->collDmPageViews;
	}

	
	public function countDmPageViews(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmLayoutPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmPageViews === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmPageViewPeer::DM_LAYOUT_ID, $this->id);

				$count = DmPageViewPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmPageViewPeer::DM_LAYOUT_ID, $this->id);

				if (!isset($this->lastDmPageViewCriteria) || !$this->lastDmPageViewCriteria->equals($criteria)) {
					$count = DmPageViewPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmPageViews);
				}
			} else {
				$count = count($this->collDmPageViews);
			}
		}
		return $count;
	}

	
	public function addDmPageView(DmPageView $l)
	{
		if ($this->collDmPageViews === null) {
			$this->initDmPageViews();
		}
		if (!in_array($l, $this->collDmPageViews, true)) { 			array_push($this->collDmPageViews, $l);
			$l->setDmLayout($this);
		}
	}

	
	public function clearDmLayoutParts()
	{
		$this->collDmLayoutParts = null; 	}

	
	public function initDmLayoutParts()
	{
		$this->collDmLayoutParts = array();
	}

	
	public function getDmLayoutParts($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmLayoutPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmLayoutParts === null) {
			if ($this->isNew()) {
			   $this->collDmLayoutParts = array();
			} else {

				$criteria->add(DmLayoutPartPeer::DM_LAYOUT_ID, $this->id);

				DmLayoutPartPeer::addSelectColumns($criteria);
				$this->collDmLayoutParts = DmLayoutPartPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmLayoutPartPeer::DM_LAYOUT_ID, $this->id);

				DmLayoutPartPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmLayoutPartCriteria) || !$this->lastDmLayoutPartCriteria->equals($criteria)) {
					$this->collDmLayoutParts = DmLayoutPartPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmLayoutPartCriteria = $criteria;
		return $this->collDmLayoutParts;
	}

	
	public function countDmLayoutParts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmLayoutPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmLayoutParts === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmLayoutPartPeer::DM_LAYOUT_ID, $this->id);

				$count = DmLayoutPartPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmLayoutPartPeer::DM_LAYOUT_ID, $this->id);

				if (!isset($this->lastDmLayoutPartCriteria) || !$this->lastDmLayoutPartCriteria->equals($criteria)) {
					$count = DmLayoutPartPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmLayoutParts);
				}
			} else {
				$count = count($this->collDmLayoutParts);
			}
		}
		return $count;
	}

	
	public function addDmLayoutPart(DmLayoutPart $l)
	{
		if ($this->collDmLayoutParts === null) {
			$this->initDmLayoutParts();
		}
		if (!in_array($l, $this->collDmLayoutParts, true)) { 			array_push($this->collDmLayoutParts, $l);
			$l->setDmLayout($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmPageViews) {
				foreach ((array) $this->collDmPageViews as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDmLayoutParts) {
				foreach ((array) $this->collDmLayoutParts as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmPageViews = null;
		$this->collDmLayoutParts = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmLayout.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmLayout:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmLayout::%s', $method));
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