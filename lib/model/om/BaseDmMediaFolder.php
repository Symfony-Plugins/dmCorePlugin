<?php


abstract class BaseDmMediaFolder extends BaseObject  implements Persistent {


  const PEER = 'DmMediaFolderPeer';

	
	protected static $peer;

	
	protected $nom;

	
	protected $tree_left;

	
	protected $tree_right;

	
	protected $tree_parent;

	
	protected $topic_id;

	
	protected $relative_path;

	
	protected $id;

	
	protected $aDmMediaFolderRelatedByTreeParent;

	
	protected $collDmMediaFoldersRelatedByTreeParent;

	
	private $lastDmMediaFolderRelatedByTreeParentCriteria = null;

	
	protected $collDmMediaFiles;

	
	private $lastDmMediaFileCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->relative_path = '';
	}

	
	public function getNom()
	{
		return $this->nom;
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

	
	public function getRelativePath()
	{
		return $this->relative_path;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function setNom($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nom !== $v) {
			$this->nom = $v;
			$this->modifiedColumns[] = DmMediaFolderPeer::NOM;
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
			$this->modifiedColumns[] = DmMediaFolderPeer::TREE_LEFT;
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
			$this->modifiedColumns[] = DmMediaFolderPeer::TREE_RIGHT;
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
			$this->modifiedColumns[] = DmMediaFolderPeer::TREE_PARENT;
		}

		if ($this->aDmMediaFolderRelatedByTreeParent !== null && $this->aDmMediaFolderRelatedByTreeParent->getId() !== $v) {
			$this->aDmMediaFolderRelatedByTreeParent = null;
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
			$this->modifiedColumns[] = DmMediaFolderPeer::TOPIC_ID;
		}

		return $this;
	} 
	
	public function setRelativePath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->relative_path !== $v || $v === '') {
			$this->relative_path = $v;
			$this->modifiedColumns[] = DmMediaFolderPeer::RELATIVE_PATH;
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
			$this->modifiedColumns[] = DmMediaFolderPeer::ID;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DmMediaFolderPeer::RELATIVE_PATH))) {
				return false;
			}

			if ($this->relative_path !== '') {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->nom = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->tree_left = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->tree_right = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->tree_parent = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->topic_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->relative_path = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DmMediaFolder object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDmMediaFolderRelatedByTreeParent !== null && $this->tree_parent !== $this->aDmMediaFolderRelatedByTreeParent->getId()) {
			$this->aDmMediaFolderRelatedByTreeParent = null;
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
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DmMediaFolderPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDmMediaFolderRelatedByTreeParent = null;
			$this->collDmMediaFoldersRelatedByTreeParent = null;
			$this->lastDmMediaFolderRelatedByTreeParentCriteria = null;

			$this->collDmMediaFiles = null;
			$this->lastDmMediaFileCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmMediaFolder.pre_delete', array()));
    if ($event->isProcessed() && $event->getReturnValue())
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmMediaFolder:delete:pre') as $callable)
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
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DmMediaFolderPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmMediaFolder.post_delete', array()));
foreach (sfMixer::getCallables('BaseDmMediaFolder:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save(PropelPDO $con = null)
	{
    $wasNew = $this->isNew();
    $modifiedColumns = $this->modifiedColumns;
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmMediaFolder.pre_save', array(
      'modified_columns'  => $modifiedColumns
    )));
    if ($this->processEvent($event) && is_int($event->getReturnValue()))
    {
      return $event->getReturnValue();
    }

    foreach (sfMixer::getCallables('BaseDmMediaFolder:save:pre') as $callable)
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
			$con = Propel::getConnection(DmMediaFolderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    
    dm::getEventDispatcher()->notify(new dmPropelEvent($this, 'BaseDmMediaFolder.post_save', array(
      'was_new'           => $wasNew,
      'affected_rows'     => $affectedRows,
      'modified_columns'  => $modifiedColumns
    )));
foreach (sfMixer::getCallables('BaseDmMediaFolder:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			DmMediaFolderPeer::addInstanceToPool($this);
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

												
			if ($this->aDmMediaFolderRelatedByTreeParent !== null) {
				if ($this->aDmMediaFolderRelatedByTreeParent->isModified() || $this->aDmMediaFolderRelatedByTreeParent->isNew()) {
					$affectedRows += $this->aDmMediaFolderRelatedByTreeParent->save($con);
				}
				$this->setDmMediaFolderRelatedByTreeParent($this->aDmMediaFolderRelatedByTreeParent);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DmMediaFolderPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DmMediaFolderPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DmMediaFolderPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDmMediaFoldersRelatedByTreeParent !== null) {
				foreach ($this->collDmMediaFoldersRelatedByTreeParent as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDmMediaFiles !== null) {
				foreach ($this->collDmMediaFiles as $referrerFK) {
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


												
			if ($this->aDmMediaFolderRelatedByTreeParent !== null) {
				if (!$this->aDmMediaFolderRelatedByTreeParent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDmMediaFolderRelatedByTreeParent->getValidationFailures());
				}
			}


			if (($retval = DmMediaFolderPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDmMediaFoldersRelatedByTreeParent !== null) {
					foreach ($this->collDmMediaFoldersRelatedByTreeParent as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDmMediaFiles !== null) {
					foreach ($this->collDmMediaFiles as $referrerFK) {
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
		$pos = DmMediaFolderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNom();
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
				return $this->getRelativePath();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DmMediaFolderPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNom(),
			$keys[1] => $this->getTreeLeft(),
			$keys[2] => $this->getTreeRight(),
			$keys[3] => $this->getTreeParent(),
			$keys[4] => $this->getTopicId(),
			$keys[5] => $this->getRelativePath(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DmMediaFolderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNom($value);
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
				$this->setRelativePath($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DmMediaFolderPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTreeLeft($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTreeRight($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTreeParent($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTopicId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRelativePath($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DmMediaFolderPeer::DATABASE_NAME);

		if ($this->isColumnModified(DmMediaFolderPeer::NOM)) $criteria->add(DmMediaFolderPeer::NOM, $this->nom);
		if ($this->isColumnModified(DmMediaFolderPeer::TREE_LEFT)) $criteria->add(DmMediaFolderPeer::TREE_LEFT, $this->tree_left);
		if ($this->isColumnModified(DmMediaFolderPeer::TREE_RIGHT)) $criteria->add(DmMediaFolderPeer::TREE_RIGHT, $this->tree_right);
		if ($this->isColumnModified(DmMediaFolderPeer::TREE_PARENT)) $criteria->add(DmMediaFolderPeer::TREE_PARENT, $this->tree_parent);
		if ($this->isColumnModified(DmMediaFolderPeer::TOPIC_ID)) $criteria->add(DmMediaFolderPeer::TOPIC_ID, $this->topic_id);
		if ($this->isColumnModified(DmMediaFolderPeer::RELATIVE_PATH)) $criteria->add(DmMediaFolderPeer::RELATIVE_PATH, $this->relative_path);
		if ($this->isColumnModified(DmMediaFolderPeer::ID)) $criteria->add(DmMediaFolderPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DmMediaFolderPeer::DATABASE_NAME);

		$criteria->add(DmMediaFolderPeer::ID, $this->id);

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

		$copyObj->setNom($this->nom);

		$copyObj->setTreeLeft($this->tree_left);

		$copyObj->setTreeRight($this->tree_right);

		$copyObj->setTreeParent($this->tree_parent);

		$copyObj->setTopicId($this->topic_id);

		$copyObj->setRelativePath($this->relative_path);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDmMediaFoldersRelatedByTreeParent() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmMediaFolderRelatedByTreeParent($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDmMediaFiles() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDmMediaFile($relObj->copy($deepCopy));
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
			self::$peer = new DmMediaFolderPeer();
		}
		return self::$peer;
	}

	
	public function setDmMediaFolderRelatedByTreeParent(DmMediaFolder $v = null)
	{
		if ($v === null) {
			$this->setTreeParent(NULL);
		} else {
			$this->setTreeParent($v->getId());
		}

		$this->aDmMediaFolderRelatedByTreeParent = $v;

						if ($v !== null) {
			$v->addDmMediaFolderRelatedByTreeParent($this);
		}

		return $this;
	}


	
	public function getDmMediaFolderRelatedByTreeParent(PropelPDO $con = null)
	{
		if ($this->aDmMediaFolderRelatedByTreeParent === null && ($this->tree_parent !== null)) {
			$c = new Criteria(DmMediaFolderPeer::DATABASE_NAME);
			$c->add(DmMediaFolderPeer::ID, $this->tree_parent);
			$this->aDmMediaFolderRelatedByTreeParent = DmMediaFolderPeer::doSelectOne($c, $con);
			
		}
		return $this->aDmMediaFolderRelatedByTreeParent;
	}

	
	public function clearDmMediaFoldersRelatedByTreeParent()
	{
		$this->collDmMediaFoldersRelatedByTreeParent = null; 	}

	
	public function initDmMediaFoldersRelatedByTreeParent()
	{
		$this->collDmMediaFoldersRelatedByTreeParent = array();
	}

	
	public function getDmMediaFoldersRelatedByTreeParent($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmMediaFolderPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmMediaFoldersRelatedByTreeParent === null) {
			if ($this->isNew()) {
			   $this->collDmMediaFoldersRelatedByTreeParent = array();
			} else {

				$criteria->add(DmMediaFolderPeer::TREE_PARENT, $this->id);

				DmMediaFolderPeer::addSelectColumns($criteria);
				$this->collDmMediaFoldersRelatedByTreeParent = DmMediaFolderPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmMediaFolderPeer::TREE_PARENT, $this->id);

				DmMediaFolderPeer::addSelectColumns($criteria);
				if (!isset($this->lastDmMediaFolderRelatedByTreeParentCriteria) || !$this->lastDmMediaFolderRelatedByTreeParentCriteria->equals($criteria)) {
					$this->collDmMediaFoldersRelatedByTreeParent = DmMediaFolderPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmMediaFolderRelatedByTreeParentCriteria = $criteria;
		return $this->collDmMediaFoldersRelatedByTreeParent;
	}

	
	public function countDmMediaFoldersRelatedByTreeParent(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmMediaFolderPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmMediaFoldersRelatedByTreeParent === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmMediaFolderPeer::TREE_PARENT, $this->id);

				$count = DmMediaFolderPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmMediaFolderPeer::TREE_PARENT, $this->id);

				if (!isset($this->lastDmMediaFolderRelatedByTreeParentCriteria) || !$this->lastDmMediaFolderRelatedByTreeParentCriteria->equals($criteria)) {
					$count = DmMediaFolderPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmMediaFoldersRelatedByTreeParent);
				}
			} else {
				$count = count($this->collDmMediaFoldersRelatedByTreeParent);
			}
		}
		return $count;
	}

	
	public function addDmMediaFolderRelatedByTreeParent(DmMediaFolder $l)
	{
		if ($this->collDmMediaFoldersRelatedByTreeParent === null) {
			$this->initDmMediaFoldersRelatedByTreeParent();
		}
		if (!in_array($l, $this->collDmMediaFoldersRelatedByTreeParent, true)) { 			array_push($this->collDmMediaFoldersRelatedByTreeParent, $l);
			$l->setDmMediaFolderRelatedByTreeParent($this);
		}
	}

	
	public function clearDmMediaFiles()
	{
		$this->collDmMediaFiles = null; 	}

	
	public function initDmMediaFiles()
	{
		$this->collDmMediaFiles = array();
	}

	
	public function getDmMediaFiles($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmMediaFolderPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDmMediaFiles === null) {
			if ($this->isNew()) {
			   $this->collDmMediaFiles = array();
			} else {

				$criteria->add(DmMediaFilePeer::DM_MEDIA_FOLDER_ID, $this->id);

				DmMediaFilePeer::addSelectColumns($criteria);
				$this->collDmMediaFiles = DmMediaFilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmMediaFilePeer::DM_MEDIA_FOLDER_ID, $this->id);

				DmMediaFilePeer::addSelectColumns($criteria);
				if (!isset($this->lastDmMediaFileCriteria) || !$this->lastDmMediaFileCriteria->equals($criteria)) {
					$this->collDmMediaFiles = DmMediaFilePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDmMediaFileCriteria = $criteria;
		return $this->collDmMediaFiles;
	}

	
	public function countDmMediaFiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DmMediaFolderPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDmMediaFiles === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DmMediaFilePeer::DM_MEDIA_FOLDER_ID, $this->id);

				$count = DmMediaFilePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DmMediaFilePeer::DM_MEDIA_FOLDER_ID, $this->id);

				if (!isset($this->lastDmMediaFileCriteria) || !$this->lastDmMediaFileCriteria->equals($criteria)) {
					$count = DmMediaFilePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDmMediaFiles);
				}
			} else {
				$count = count($this->collDmMediaFiles);
			}
		}
		return $count;
	}

	
	public function addDmMediaFile(DmMediaFile $l)
	{
		if ($this->collDmMediaFiles === null) {
			$this->initDmMediaFiles();
		}
		if (!in_array($l, $this->collDmMediaFiles, true)) { 			array_push($this->collDmMediaFiles, $l);
			$l->setDmMediaFolder($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDmMediaFoldersRelatedByTreeParent) {
				foreach ((array) $this->collDmMediaFoldersRelatedByTreeParent as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDmMediaFiles) {
				foreach ((array) $this->collDmMediaFiles as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDmMediaFoldersRelatedByTreeParent = null;
		$this->collDmMediaFiles = null;
			$this->aDmMediaFolderRelatedByTreeParent = null;
	}

  public function __call($method, $arguments)
  {
    $event = dm::getEventDispatcher()->notifyUntil(new dmPropelEvent($this, 'BaseDmMediaFolder.method_not_found', array(
      'method'            => $method,
      'arguments'         => $arguments
    )));
    if ($this->processEvent($event))
    {
      return $event->getReturnValue();
    }

    if (!$callable = sfMixer::getCallable('BaseDmMediaFolder:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDmMediaFolder::%s', $method));
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