<?php


abstract class BaseDmPage extends BaseObject  implements Persistent {


  const PEER = 'DmPagePeer';

	
	protected static $peer;

	
	protected $dm_page_view_id;

	
	protected $tree_left;

	
	protected $tree_right;

	
	protected $tree_parent;

	
	protected $topic_id;

	
	protected $module;

	
	protected $action;

	
	protected $object_id;

	
	protected $is_approved;

	
	protected $is_public;

	
	protected $updated_at;

	
	protected $id;

	
	protected $aDmPageView;

	
	protected $aDmPageRelatedByTreeParent;

	
	protected $collDmSessions;

	
	private $lastDmSessionCriteria = null;

	
	protected $collDmPagesRelatedByTreeParent;

	
	private $lastDmPageRelatedByTreeParentCriteria = null;

	
	protected $collDmPageI18ns;

	
	private $lastDmPageI18nCriteria = null;

	
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
		$this->is_approved = true;
		$this->is_public = true;
	}

	
	public function getDmPageViewId()
	{
		return $this->dm_page_view_id;
	}

	
	public function getTreeLeft()
	{
		return $this->tree_left;
	}

	
	public function getTreeRight()
	{
		return $this->tree_right;
	}

	
	public function getTreeParent()
	{
		return $this->tree_parent;
	}

	
	public function getTopicId()
	{
		return $this->topic_id;
	}

	
	public function getModule()
	{
		return $this->module;
	}

	
	public function getAction()
	{
		return $this->action;
	}

	
	public function getObjectId()
	{
		return $this->object_id;
	}

	
	public function getIsApproved()
	{
		return $this->is_approved;
	}

	
	public function getIsPublic()
	{
		return $this->is_public;
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
			$this->modifiedColumns[] = DmPagePeer::DM_PAGE_VIEW_ID;
		}

		if ($this->aDmPageView !== null && $this->aDmPageView->getId() !== $v) {
			$this->aDmPageView = null;
		}

		return $this;
	} 
	
	public function setTreeLeft($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tree_left !== $v) {
			$this->tree_left = $v;
			$this->modifiedColumns[] = DmPagePeer::TREE_LEFT;
		}

		return $this;
	} 
	
	public function setTreeRight($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tree_right !== $v) {
			$this->tree_right = $v;
			$this->modifiedColumns[] = DmPagePeer::TREE_RIGHT;
		}

		return $this;
	} 
	
	public function setTreeParent($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tree_parent !== $v) {
			$this->tree_parent = $v;
			$this->modifiedColumns[] = DmPagePeer::TREE_PARENT;
		}

		if ($this->aDmPageRelatedByTreeParent !== null && $this->aDmPageRelatedByTreeParent->getId() !== $v) {
			$this->aDmPageRelatedByTreeParent = null;
		}

		return $this;
	} 
	
	public function setTopicId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->topic_id !== $v) {
			$this->topic_id = $v;
			$this->modifiedColumns[] = DmPagePeer::TOPIC_ID;
		}

		return $this;
	} 
	
	public function setModule($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = DmPagePeer::MODULE;
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
			$this->modifiedColumns[] = DmPagePeer::ACTION;
		}

		return $this;
	} 
	
	public function setObjectId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->object_id !== $v) {
			$this->object_id = $v;
			$this->modifiedColumns[] = DmPagePeer::OBJECT_ID;
		}

		return $this;
	} 
	
	public function setIsApproved($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_approved !== $v || $v === true) {
			$this->is_approved = $v;
			$this->modifiedColumns[] = DmPagePeer::IS_APPROVED;
		}

		return $this;
	} 
	
	public function setIsPublic($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_public !== $v || $v === true) {
			$this->is_public = $v;
			$this->modifiedColumns[] = DmPagePeer::IS_PUBLIC;
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
				$this->modifiedColumns[] = DmPagePeer::UPDATED_AT;
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
			$this->modifiedColumns[] = DmPagePeer::ID;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmPagePeer::IS_APPROVED,DmPagePeer::IS_PUBLIC))) {
				return false;
			}

			if ($this->is_approved !== true) {
				return false;
			}

			if ($this->is_public !== true) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->dm_page_view_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->tree_left = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->tree_right = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->tree_parent = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->topic_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->module = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->action = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->object_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->is_approved = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
			$this->is_public = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmPage object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmPageView !== null && $this->dm_page_view_id !== $this->aDmPageView->getId()) {
			$this->aDmPageView = null;
		}
		if ($this->aDmPageRelatedByTreeParent !== null && $this->tree_parent !== $this->aDmPageRelatedByTreeParent->getId()) {
			$this->aDmPageRelatedByTreeParent = null;
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
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmPagePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmPageView = null;
			$this->aDmPageRelatedByTreeParent = null;
			$this->collDmSessions = null;
			$this->lastDmSessionCriteria = null;

			$this->collDmPagesRelatedByTreeParent = null;
			$this->lastDmPageRelatedByTreeParentCriteria = null;

			$this->collDmPageI18ns = null;
			$this->lastDmPageI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmPage.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmPage:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmPagePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmPage.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmPage:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmPage.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmPage:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(DmPagePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DmPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmPage.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmPage:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmPagePeer::addInstanceToPool($this);
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

			if ($this->aDmPageRelatedByTreeParent !== null) {
				if ($this->aDmPageRelatedByTreeParent->isModified() || ($this->aDmPageRelatedByTreeParent->getCulture() && $this->aDmPageRelatedByTreeParent->getCurrentDmPageI18n()->isModified()) || $this->aDmPageRelatedByTreeParent->isNew()) {
					$affectedRows += $this->aDmPageRelatedByTreeParent->save($con);
				}
				$this->setDmPageRelatedByTreeParent($this->aDmPageRelatedByTreeParent);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DmPagePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmPagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmPagePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmSessions !== null) {
				foreach ($this->collDmSessions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDmPagesRelatedByTreeParent !== null) {
				foreach ($this->collDmPagesRelatedByTreeParent as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDmPageI18ns !== null) {
				foreach ($this->collDmPageI18ns as $referrerFK) {
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

			if ($this->aDmPageRelatedByTreeParent !== null) {
				if (!$this->aDmPageRelatedByTreeParent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmPageRelatedByTreeParent->getValidationFailures());
				}
			}


			if (($retval = DmPagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmSessions !== null) {
					foreach ($this->collDmSessions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDmPagesRelatedByTreeParent !== null) {
					foreach ($this->collDmPagesRelatedByTreeParent as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDmPageI18ns !== null) {
					foreach ($this->collDmPageI18ns as $referrerFK) {
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
		$pos = DmPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTreeLeft();
				break;
			case 2:
				return $this->getTreeRight();
				break;
			case 3:
				return $this->getTreeParent();
				break;
			case 4:
				return $this->getTopicId();
				break;
			case 5:
				return $this->getModule();
				break;
			case 6:
				return $this->getAction();
				break;
			case 7:
				return $this->getObjectId();
				break;
			case 8:
				return $this->getIsApproved();
				break;
			case 9:
				return $this->getIsPublic();
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
		$keys = DmPagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDmPageViewId(),
			$keys[1] => $this->getTreeLeft(),
			$keys[2] => $this->getTreeRight(),
			$keys[3] => $this->getTreeParent(),
			$keys[4] => $this->getTopicId(),
			$keys[5] => $this->getModule(),
			$keys[6] => $this->getAction(),
			$keys[7] => $this->getObjectId(),
			$keys[8] => $this->getIsApproved(),
			$keys[9] => $this->getIsPublic(),
			$keys[10] => $this->getUpdatedAt(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDmPageViewId($value);
				break;
			case 1:
				$this->setTreeLeft($value);
				break;
			case 2:
				$this->setTreeRight($value);
				break;
			case 3:
				$this->setTreeParent($value);
				break;
			case 4:
				$this->setTopicId($value);
				break;
			case 5:
				$this->setModule($value);
				break;
			case 6:
				$this->setAction($value);
				break;
			case 7:
				$this->setObjectId($value);
				break;
			case 8:
				$this->setIsApproved($value);
				break;
			case 9:
				$this->setIsPublic($value);
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
		$keys = DmPagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDmPageViewId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTreeLeft($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTreeRight($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTreeParent($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTopicId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setModule($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAction($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObjectId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsApproved($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIsPublic($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmPagePeer::DATABASE_NAME);

		if ($this->isColumnModified(DmPagePeer::DM_PAGE_VIEW_ID)) $criteria->add(DmPagePeer::DM_PAGE_VIEW_ID, $this->dm_page_view_id);
		if ($this->isColumnModified(DmPagePeer::TREE_LEFT)) $criteria->add(DmPagePeer::TREE_LEFT, $this->tree_left);
		if ($this->isColumnModified(DmPagePeer::TREE_RIGHT)) $criteria->add(DmPagePeer::TREE_RIGHT, $this->tree_right);
		if ($this->isColumnModified(DmPagePeer::TREE_PARENT)) $criteria->add(DmPagePeer::TREE_PARENT, $this->tree_parent);
		if ($this->isColumnModified(DmPagePeer::TOPIC_ID)) $criteria->add(DmPagePeer::TOPIC_ID, $this->topic_id);
		if ($this->isColumnModified(DmPagePeer::MODULE)) $criteria->add(DmPagePeer::MODULE, $this->module);
		if ($this->isColumnModified(DmPagePeer::ACTION)) $criteria->add(DmPagePeer::ACTION, $this->action);
		if ($this->isColumnModified(DmPagePeer::OBJECT_ID)) $criteria->add(DmPagePeer::OBJECT_ID, $this->object_id);
		if ($this->isColumnModified(DmPagePeer::IS_APPROVED)) $criteria->add(DmPagePeer::IS_APPROVED, $this->is_approved);
		if ($this->isColumnModified(DmPagePeer::IS_PUBLIC)) $criteria->add(DmPagePeer::IS_PUBLIC, $this->is_public);
		if ($this->isColumnModified(DmPagePeer::UPDATED_AT)) $criteria->add(DmPagePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DmPagePeer::ID)) $criteria->add(DmPagePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmPagePeer::DATABASE_NAME);

		$criteria->add(DmPagePeer::ID, $this->id);

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

		$copyObj->setTreeLeft($this->tree_left);

		$copyObj->setTreeRight($this->tree_right);

		$copyObj->setTreeParent($this->tree_parent);

		$copyObj->setTopicId($this->topic_id);

		$copyObj->setModule($this->module);

		$copyObj->setAction($this->action);

		$copyObj->setObjectId($this->object_id);

		$copyObj->setIsApproved($this->is_approved);

		$copyObj->setIsPublic($this->is_public);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDmSessions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmSession($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDmPagesRelatedByTreeParent() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmPageRelatedByTreeParent($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDmPageI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmPageI18n($relObj->copy($deepCopy));
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
			self::$peer = new DmPagePeer();
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
			$v->addDmPage($this);
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

	
	public function setDmPageRelatedByTreeParent(DmPage $v = null)
	{
		if ($v === null) {
			$this->setTreeParent(NULL);
		} else {
			$this->setTreeParent($v->getId());
		}

		$this->aDmPageRelatedByTreeParent = $v;

						if ($v !== null) {
			$v->addDmPageRelatedByTreeParent($this);
		}

		return $this;
	}


	
	public function getDmPageRelatedByTreeParent(PropelPDO $con = null)
	{
		if ($this->aDmPageRelatedByTreeParent === null && ($this->tree_parent !== null)) {
			$c = new Criteria(DmPagePeer::DATABASE_NAME);
			$c->add(DmPagePeer::ID, $this->tree_parent);
			$this->aDmPageRelatedByTreeParent = DmPagePeer::doSelectOne($c, $con);
			
		}
		return $this->aDmPageRelatedByTreeParent;
	}

	
	public function clearDmSessions()
	{
		$this->collDmSessions = null; 	}

	
	public function initDmSessions()
	{
		$this->collDmSessions = array();
	}

	
	public function getDmSessions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmSessions === null) {
			if ($this->isNew()) {
			   $this->collDmSessions = array();
			} else {

				$criteria->add(DmSessionPeer::DM_PAGE_ID, $this->id);

				DmSessionPeer::addSelectColumns($criteria);
				$this->collDmSessions = DmSessionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmSessionPeer::DM_PAGE_ID, $this->id);

				DmSessionPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmSessionCriteria) || !$this->lastDmSessionCriteria->equals($criteria)) {
					$this->collDmSessions = DmSessionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmSessionCriteria = $criteria;
		return $this->collDmSessions;
	}

	
	public function countDmSessions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmSessions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmSessionPeer::DM_PAGE_ID, $this->id);

				$count = DmSessionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmSessionPeer::DM_PAGE_ID, $this->id);

				if (!isset($this->lastDmSessionCriteria) || !$this->lastDmSessionCriteria->equals($criteria)) {
					$count = DmSessionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmSessions);
				}
			} else {
				$count = count($this->collDmSessions);
			}
		}
		return $count;
	}

	
	public function addDmSession(DmSession $l)
	{
		if ($this->collDmSessions === null) {
			$this->initDmSessions();
		}
		if (!in_array($l, $this->collDmSessions, true)) { 			array_push($this->collDmSessions, $l);
			$l->setDmPage($this);
		}
	}


	
	public function getDmSessionsJoinDmProfile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmSessions === null) {
			if ($this->isNew()) {
				$this->collDmSessions = array();
			} else {

				$criteria->add(DmSessionPeer::DM_PAGE_ID, $this->id);

				$this->collDmSessions = DmSessionPeer::doSelectJoinDmProfile($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DmSessionPeer::DM_PAGE_ID, $this->id);

			if (!isset($this->lastDmSessionCriteria) || !$this->lastDmSessionCriteria->equals($criteria)) {
				$this->collDmSessions = DmSessionPeer::doSelectJoinDmProfile($criteria, $con, $join_behavior);
			}
		}
		$this->lastDmSessionCriteria = $criteria;

		return $this->collDmSessions;
	}

	
	public function clearDmPagesRelatedByTreeParent()
	{
		$this->collDmPagesRelatedByTreeParent = null; 	}

	
	public function initDmPagesRelatedByTreeParent()
	{
		$this->collDmPagesRelatedByTreeParent = array();
	}

	
	public function getDmPagesRelatedByTreeParent($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmPagesRelatedByTreeParent === null) {
			if ($this->isNew()) {
			   $this->collDmPagesRelatedByTreeParent = array();
			} else {

				$criteria->add(DmPagePeer::TREE_PARENT, $this->id);

				DmPagePeer::addSelectColumns($criteria);
				$this->collDmPagesRelatedByTreeParent = DmPagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmPagePeer::TREE_PARENT, $this->id);

				DmPagePeer::addSelectColumns($criteria);
				if (!isset($this->lastDmPageRelatedByTreeParentCriteria) || !$this->lastDmPageRelatedByTreeParentCriteria->equals($criteria)) {
					$this->collDmPagesRelatedByTreeParent = DmPagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmPageRelatedByTreeParentCriteria = $criteria;
		return $this->collDmPagesRelatedByTreeParent;
	}

	
	public function countDmPagesRelatedByTreeParent(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmPagesRelatedByTreeParent === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmPagePeer::TREE_PARENT, $this->id);

				$count = DmPagePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmPagePeer::TREE_PARENT, $this->id);

				if (!isset($this->lastDmPageRelatedByTreeParentCriteria) || !$this->lastDmPageRelatedByTreeParentCriteria->equals($criteria)) {
					$count = DmPagePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmPagesRelatedByTreeParent);
				}
			} else {
				$count = count($this->collDmPagesRelatedByTreeParent);
			}
		}
		return $count;
	}

	
	public function addDmPageRelatedByTreeParent(DmPage $l)
	{
		if ($this->collDmPagesRelatedByTreeParent === null) {
			$this->initDmPagesRelatedByTreeParent();
		}
		if (!in_array($l, $this->collDmPagesRelatedByTreeParent, true)) { 			array_push($this->collDmPagesRelatedByTreeParent, $l);
			$l->setDmPageRelatedByTreeParent($this);
		}
	}


	
	public function getDmPagesRelatedByTreeParentJoinDmPageView($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmPagesRelatedByTreeParent === null) {
			if ($this->isNew()) {
				$this->collDmPagesRelatedByTreeParent = array();
			} else {

				$criteria->add(DmPagePeer::TREE_PARENT, $this->id);

				$this->collDmPagesRelatedByTreeParent = DmPagePeer::doSelectJoinDmPageView($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DmPagePeer::TREE_PARENT, $this->id);

			if (!isset($this->lastDmPageRelatedByTreeParentCriteria) || !$this->lastDmPageRelatedByTreeParentCriteria->equals($criteria)) {
				$this->collDmPagesRelatedByTreeParent = DmPagePeer::doSelectJoinDmPageView($criteria, $con, $join_behavior);
			}
		}
		$this->lastDmPageRelatedByTreeParentCriteria = $criteria;

		return $this->collDmPagesRelatedByTreeParent;
	}

	
	public function clearDmPageI18ns()
	{
		$this->collDmPageI18ns = null; 	}

	
	public function initDmPageI18ns()
	{
		$this->collDmPageI18ns = array();
	}

	
	public function getDmPageI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmPageI18ns === null) {
			if ($this->isNew()) {
			   $this->collDmPageI18ns = array();
			} else {

				$criteria->add(DmPageI18nPeer::ID, $this->id);

				DmPageI18nPeer::addSelectColumns($criteria);
				$this->collDmPageI18ns = DmPageI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmPageI18nPeer::ID, $this->id);

				DmPageI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmPageI18nCriteria) || !$this->lastDmPageI18nCriteria->equals($criteria)) {
					$this->collDmPageI18ns = DmPageI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmPageI18nCriteria = $criteria;
		return $this->collDmPageI18ns;
	}

	
	public function countDmPageI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmPagePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmPageI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmPageI18nPeer::ID, $this->id);

				$count = DmPageI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmPageI18nPeer::ID, $this->id);

				if (!isset($this->lastDmPageI18nCriteria) || !$this->lastDmPageI18nCriteria->equals($criteria)) {
					$count = DmPageI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmPageI18ns);
				}
			} else {
				$count = count($this->collDmPageI18ns);
			}
		}
		return $count;
	}

	
	public function addDmPageI18n(DmPageI18n $l)
	{
		if ($this->collDmPageI18ns === null) {
			$this->initDmPageI18ns();
		}
		if (!in_array($l, $this->collDmPageI18ns, true)) { 			array_push($this->collDmPageI18ns, $l);
			$l->setDmPage($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmSessions) {
				foreach ((array) $this->collDmSessions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDmPagesRelatedByTreeParent) {
				foreach ((array) $this->collDmPagesRelatedByTreeParent as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDmPageI18ns) {
				foreach ((array) $this->collDmPageI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmSessions = null;
		$this->collDmPagesRelatedByTreeParent = null;
		$this->collDmPageI18ns = null;
			$this->aDmPageView = null;
			$this->aDmPageRelatedByTreeParent = null;
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
    return $this->getCurrentDmPageI18n($culture)->getSlug();
  }

  public function setSlug($value, $culture = null)
  {
    $this->getCurrentDmPageI18n($culture)->setSlug($value);
    return $this;
  }

  public function getSlugCache($culture = null)
  {
    return $this->getCurrentDmPageI18n($culture)->getSlugCache();
  }

  public function setSlugCache($value, $culture = null)
  {
    $this->getCurrentDmPageI18n($culture)->setSlugCache($value);
    return $this;
  }

  public function getName($culture = null)
  {
    return $this->getCurrentDmPageI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentDmPageI18n($culture)->setName($value);
    return $this;
  }

  public function getNameCache($culture = null)
  {
    return $this->getCurrentDmPageI18n($culture)->getNameCache();
  }

  public function setNameCache($value, $culture = null)
  {
    $this->getCurrentDmPageI18n($culture)->setNameCache($value);
    return $this;
  }

  public function getTitle($culture = null)
  {
    return $this->getCurrentDmPageI18n($culture)->getTitle();
  }

  public function setTitle($value, $culture = null)
  {
    $this->getCurrentDmPageI18n($culture)->setTitle($value);
    return $this;
  }

  public function getH1($culture = null)
  {
    return $this->getCurrentDmPageI18n($culture)->getH1();
  }

  public function setH1($value, $culture = null)
  {
    $this->getCurrentDmPageI18n($culture)->setH1($value);
    return $this;
  }

  public function getDescription($culture = null)
  {
    return $this->getCurrentDmPageI18n($culture)->getDescription();
  }

  public function setDescription($value, $culture = null)
  {
    $this->getCurrentDmPageI18n($culture)->setDescription($value);
    return $this;
  }

  protected $current_i18n = array();

  public function getCurrentDmPageI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = DmPageI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setDmPageI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setDmPageI18nForCulture(new DmPageI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setDmPageI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addDmPageI18n($object);
  }

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmPage.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmPage:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmPage::%s', $method));
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