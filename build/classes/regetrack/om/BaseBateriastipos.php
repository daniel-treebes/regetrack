<?php


/**
 * Base class that represents a row from the 'bateriastipos' table.
 *
 *
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseBateriastipos extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'BateriastiposPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BateriastiposPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the idsucursal field.
     * @var        int
     */
    protected $idsucursal;

    /**
     * The value for the volts field.
     * @var        int
     */
    protected $volts;

    /**
     * The value for the ah field.
     * @var        int
     */
    protected $ah;

    /**
     * @var        Sucursal
     */
    protected $aSucursal;

    /**
     * @var        PropelObjectCollection|Baterias[] Collection to store aggregation of Baterias objects.
     */
    protected $collBateriass;
    protected $collBateriassPartial;

    /**
     * @var        PropelObjectCollection|Cargadores[] Collection to store aggregation of Cargadores objects.
     */
    protected $collCargadoress;
    protected $collCargadoressPartial;

    /**
     * @var        PropelObjectCollection|Montacargas[] Collection to store aggregation of Montacargas objects.
     */
    protected $collMontacargass;
    protected $collMontacargassPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bateriassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cargadoressScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $montacargassScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [idsucursal] column value.
     *
     * @return int
     */
    public function getIdsucursal()
    {

        return $this->idsucursal;
    }

    /**
     * Get the [volts] column value.
     *
     * @return int
     */
    public function getVolts()
    {

        return $this->volts;
    }

    /**
     * Get the [ah] column value.
     *
     * @return int
     */
    public function getAh()
    {

        return $this->ah;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = BateriastiposPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [idsucursal] column.
     *
     * @param  int $v new value
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function setIdsucursal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idsucursal !== $v) {
            $this->idsucursal = $v;
            $this->modifiedColumns[] = BateriastiposPeer::IDSUCURSAL;
        }

        if ($this->aSucursal !== null && $this->aSucursal->getIdsucursal() !== $v) {
            $this->aSucursal = null;
        }


        return $this;
    } // setIdsucursal()

    /**
     * Set the value of [volts] column.
     *
     * @param  int $v new value
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function setVolts($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->volts !== $v) {
            $this->volts = $v;
            $this->modifiedColumns[] = BateriastiposPeer::VOLTS;
        }


        return $this;
    } // setVolts()

    /**
     * Set the value of [ah] column.
     *
     * @param  int $v new value
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function setAh($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ah !== $v) {
            $this->ah = $v;
            $this->modifiedColumns[] = BateriastiposPeer::AH;
        }


        return $this;
    } // setAh()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idsucursal = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->volts = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->ah = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = BateriastiposPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Bateriastipos object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aSucursal !== null && $this->idsucursal !== $this->aSucursal->getIdsucursal()) {
            $this->aSucursal = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(BateriastiposPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BateriastiposPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSucursal = null;
            $this->collBateriass = null;

            $this->collCargadoress = null;

            $this->collMontacargass = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(BateriastiposPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BateriastiposQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(BateriastiposPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                BateriastiposPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSucursal !== null) {
                if ($this->aSucursal->isModified() || $this->aSucursal->isNew()) {
                    $affectedRows += $this->aSucursal->save($con);
                }
                $this->setSucursal($this->aSucursal);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->bateriassScheduledForDeletion !== null) {
                if (!$this->bateriassScheduledForDeletion->isEmpty()) {
                    BateriasQuery::create()
                        ->filterByPrimaryKeys($this->bateriassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bateriassScheduledForDeletion = null;
                }
            }

            if ($this->collBateriass !== null) {
                foreach ($this->collBateriass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cargadoressScheduledForDeletion !== null) {
                if (!$this->cargadoressScheduledForDeletion->isEmpty()) {
                    CargadoresQuery::create()
                        ->filterByPrimaryKeys($this->cargadoressScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cargadoressScheduledForDeletion = null;
                }
            }

            if ($this->collCargadoress !== null) {
                foreach ($this->collCargadoress as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->montacargassScheduledForDeletion !== null) {
                if (!$this->montacargassScheduledForDeletion->isEmpty()) {
                    MontacargasQuery::create()
                        ->filterByPrimaryKeys($this->montacargassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->montacargassScheduledForDeletion = null;
                }
            }

            if ($this->collMontacargass !== null) {
                foreach ($this->collMontacargass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = BateriastiposPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BateriastiposPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BateriastiposPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(BateriastiposPeer::IDSUCURSAL)) {
            $modifiedColumns[':p' . $index++]  = '`idsucursal`';
        }
        if ($this->isColumnModified(BateriastiposPeer::VOLTS)) {
            $modifiedColumns[':p' . $index++]  = '`volts`';
        }
        if ($this->isColumnModified(BateriastiposPeer::AH)) {
            $modifiedColumns[':p' . $index++]  = '`ah`';
        }

        $sql = sprintf(
            'INSERT INTO `bateriastipos` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`idsucursal`':
                        $stmt->bindValue($identifier, $this->idsucursal, PDO::PARAM_INT);
                        break;
                    case '`volts`':
                        $stmt->bindValue($identifier, $this->volts, PDO::PARAM_INT);
                        break;
                    case '`ah`':
                        $stmt->bindValue($identifier, $this->ah, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSucursal !== null) {
                if (!$this->aSucursal->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSucursal->getValidationFailures());
                }
            }


            if (($retval = BateriastiposPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBateriass !== null) {
                    foreach ($this->collBateriass as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCargadoress !== null) {
                    foreach ($this->collCargadoress as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMontacargass !== null) {
                    foreach ($this->collMontacargass as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = BateriastiposPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getIdsucursal();
                break;
            case 2:
                return $this->getVolts();
                break;
            case 3:
                return $this->getAh();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Bateriastipos'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Bateriastipos'][$this->getPrimaryKey()] = true;
        $keys = BateriastiposPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getIdsucursal(),
            $keys[2] => $this->getVolts(),
            $keys[3] => $this->getAh(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSucursal) {
                $result['Sucursal'] = $this->aSucursal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBateriass) {
                $result['Bateriass'] = $this->collBateriass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCargadoress) {
                $result['Cargadoress'] = $this->collCargadoress->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMontacargass) {
                $result['Montacargass'] = $this->collMontacargass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = BateriastiposPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setIdsucursal($value);
                break;
            case 2:
                $this->setVolts($value);
                break;
            case 3:
                $this->setAh($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = BateriastiposPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdsucursal($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setVolts($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAh($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BateriastiposPeer::DATABASE_NAME);

        if ($this->isColumnModified(BateriastiposPeer::ID)) $criteria->add(BateriastiposPeer::ID, $this->id);
        if ($this->isColumnModified(BateriastiposPeer::IDSUCURSAL)) $criteria->add(BateriastiposPeer::IDSUCURSAL, $this->idsucursal);
        if ($this->isColumnModified(BateriastiposPeer::VOLTS)) $criteria->add(BateriastiposPeer::VOLTS, $this->volts);
        if ($this->isColumnModified(BateriastiposPeer::AH)) $criteria->add(BateriastiposPeer::AH, $this->ah);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(BateriastiposPeer::DATABASE_NAME);
        $criteria->add(BateriastiposPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Bateriastipos (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdsucursal($this->getIdsucursal());
        $copyObj->setVolts($this->getVolts());
        $copyObj->setAh($this->getAh());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBateriass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBaterias($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCargadoress() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCargadores($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMontacargass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMontacargas($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Bateriastipos Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return BateriastiposPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BateriastiposPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sucursal object.
     *
     * @param                  Sucursal $v
     * @return Bateriastipos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSucursal(Sucursal $v = null)
    {
        if ($v === null) {
            $this->setIdsucursal(NULL);
        } else {
            $this->setIdsucursal($v->getIdsucursal());
        }

        $this->aSucursal = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sucursal object, it will not be re-added.
        if ($v !== null) {
            $v->addBateriastipos($this);
        }


        return $this;
    }


    /**
     * Get the associated Sucursal object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sucursal The associated Sucursal object.
     * @throws PropelException
     */
    public function getSucursal(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSucursal === null && ($this->idsucursal !== null) && $doQuery) {
            $this->aSucursal = SucursalQuery::create()->findPk($this->idsucursal, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSucursal->addBateriastiposs($this);
             */
        }

        return $this->aSucursal;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Baterias' == $relationName) {
            $this->initBateriass();
        }
        if ('Cargadores' == $relationName) {
            $this->initCargadoress();
        }
        if ('Montacargas' == $relationName) {
            $this->initMontacargass();
        }
    }

    /**
     * Clears out the collBateriass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bateriastipos The current object (for fluent API support)
     * @see        addBateriass()
     */
    public function clearBateriass()
    {
        $this->collBateriass = null; // important to set this to null since that means it is uninitialized
        $this->collBateriassPartial = null;

        return $this;
    }

    /**
     * reset is the collBateriass collection loaded partially
     *
     * @return void
     */
    public function resetPartialBateriass($v = true)
    {
        $this->collBateriassPartial = $v;
    }

    /**
     * Initializes the collBateriass collection.
     *
     * By default this just sets the collBateriass collection to an empty array (like clearcollBateriass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBateriass($overrideExisting = true)
    {
        if (null !== $this->collBateriass && !$overrideExisting) {
            return;
        }
        $this->collBateriass = new PropelObjectCollection();
        $this->collBateriass->setModel('Baterias');
    }

    /**
     * Gets an array of Baterias objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bateriastipos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Baterias[] List of Baterias objects
     * @throws PropelException
     */
    public function getBateriass($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBateriassPartial && !$this->isNew();
        if (null === $this->collBateriass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBateriass) {
                // return empty collection
                $this->initBateriass();
            } else {
                $collBateriass = BateriasQuery::create(null, $criteria)
                    ->filterByBateriastipos($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBateriassPartial && count($collBateriass)) {
                      $this->initBateriass(false);

                      foreach ($collBateriass as $obj) {
                        if (false == $this->collBateriass->contains($obj)) {
                          $this->collBateriass->append($obj);
                        }
                      }

                      $this->collBateriassPartial = true;
                    }

                    $collBateriass->getInternalIterator()->rewind();

                    return $collBateriass;
                }

                if ($partial && $this->collBateriass) {
                    foreach ($this->collBateriass as $obj) {
                        if ($obj->isNew()) {
                            $collBateriass[] = $obj;
                        }
                    }
                }

                $this->collBateriass = $collBateriass;
                $this->collBateriassPartial = false;
            }
        }

        return $this->collBateriass;
    }

    /**
     * Sets a collection of Baterias objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bateriass A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function setBateriass(PropelCollection $bateriass, PropelPDO $con = null)
    {
        $bateriassToDelete = $this->getBateriass(new Criteria(), $con)->diff($bateriass);


        $this->bateriassScheduledForDeletion = $bateriassToDelete;

        foreach ($bateriassToDelete as $bateriasRemoved) {
            $bateriasRemoved->setBateriastipos(null);
        }

        $this->collBateriass = null;
        foreach ($bateriass as $baterias) {
            $this->addBaterias($baterias);
        }

        $this->collBateriass = $bateriass;
        $this->collBateriassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Baterias objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Baterias objects.
     * @throws PropelException
     */
    public function countBateriass(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBateriassPartial && !$this->isNew();
        if (null === $this->collBateriass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBateriass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBateriass());
            }
            $query = BateriasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBateriastipos($this)
                ->count($con);
        }

        return count($this->collBateriass);
    }

    /**
     * Method called to associate a Baterias object to this object
     * through the Baterias foreign key attribute.
     *
     * @param    Baterias $l Baterias
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function addBaterias(Baterias $l)
    {
        if ($this->collBateriass === null) {
            $this->initBateriass();
            $this->collBateriassPartial = true;
        }

        if (!in_array($l, $this->collBateriass->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBaterias($l);

            if ($this->bateriassScheduledForDeletion and $this->bateriassScheduledForDeletion->contains($l)) {
                $this->bateriassScheduledForDeletion->remove($this->bateriassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Baterias $baterias The baterias object to add.
     */
    protected function doAddBaterias($baterias)
    {
        $this->collBateriass[]= $baterias;
        $baterias->setBateriastipos($this);
    }

    /**
     * @param	Baterias $baterias The baterias object to remove.
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function removeBaterias($baterias)
    {
        if ($this->getBateriass()->contains($baterias)) {
            $this->collBateriass->remove($this->collBateriass->search($baterias));
            if (null === $this->bateriassScheduledForDeletion) {
                $this->bateriassScheduledForDeletion = clone $this->collBateriass;
                $this->bateriassScheduledForDeletion->clear();
            }
            $this->bateriassScheduledForDeletion[]= clone $baterias;
            $baterias->setBateriastipos(null);
        }

        return $this;
    }

    /**
     * Clears out the collCargadoress collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bateriastipos The current object (for fluent API support)
     * @see        addCargadoress()
     */
    public function clearCargadoress()
    {
        $this->collCargadoress = null; // important to set this to null since that means it is uninitialized
        $this->collCargadoressPartial = null;

        return $this;
    }

    /**
     * reset is the collCargadoress collection loaded partially
     *
     * @return void
     */
    public function resetPartialCargadoress($v = true)
    {
        $this->collCargadoressPartial = $v;
    }

    /**
     * Initializes the collCargadoress collection.
     *
     * By default this just sets the collCargadoress collection to an empty array (like clearcollCargadoress());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCargadoress($overrideExisting = true)
    {
        if (null !== $this->collCargadoress && !$overrideExisting) {
            return;
        }
        $this->collCargadoress = new PropelObjectCollection();
        $this->collCargadoress->setModel('Cargadores');
    }

    /**
     * Gets an array of Cargadores objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bateriastipos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Cargadores[] List of Cargadores objects
     * @throws PropelException
     */
    public function getCargadoress($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCargadoressPartial && !$this->isNew();
        if (null === $this->collCargadoress || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCargadoress) {
                // return empty collection
                $this->initCargadoress();
            } else {
                $collCargadoress = CargadoresQuery::create(null, $criteria)
                    ->filterByBateriastipos($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCargadoressPartial && count($collCargadoress)) {
                      $this->initCargadoress(false);

                      foreach ($collCargadoress as $obj) {
                        if (false == $this->collCargadoress->contains($obj)) {
                          $this->collCargadoress->append($obj);
                        }
                      }

                      $this->collCargadoressPartial = true;
                    }

                    $collCargadoress->getInternalIterator()->rewind();

                    return $collCargadoress;
                }

                if ($partial && $this->collCargadoress) {
                    foreach ($this->collCargadoress as $obj) {
                        if ($obj->isNew()) {
                            $collCargadoress[] = $obj;
                        }
                    }
                }

                $this->collCargadoress = $collCargadoress;
                $this->collCargadoressPartial = false;
            }
        }

        return $this->collCargadoress;
    }

    /**
     * Sets a collection of Cargadores objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $cargadoress A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function setCargadoress(PropelCollection $cargadoress, PropelPDO $con = null)
    {
        $cargadoressToDelete = $this->getCargadoress(new Criteria(), $con)->diff($cargadoress);


        $this->cargadoressScheduledForDeletion = $cargadoressToDelete;

        foreach ($cargadoressToDelete as $cargadoresRemoved) {
            $cargadoresRemoved->setBateriastipos(null);
        }

        $this->collCargadoress = null;
        foreach ($cargadoress as $cargadores) {
            $this->addCargadores($cargadores);
        }

        $this->collCargadoress = $cargadoress;
        $this->collCargadoressPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Cargadores objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Cargadores objects.
     * @throws PropelException
     */
    public function countCargadoress(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCargadoressPartial && !$this->isNew();
        if (null === $this->collCargadoress || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCargadoress) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCargadoress());
            }
            $query = CargadoresQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBateriastipos($this)
                ->count($con);
        }

        return count($this->collCargadoress);
    }

    /**
     * Method called to associate a Cargadores object to this object
     * through the Cargadores foreign key attribute.
     *
     * @param    Cargadores $l Cargadores
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function addCargadores(Cargadores $l)
    {
        if ($this->collCargadoress === null) {
            $this->initCargadoress();
            $this->collCargadoressPartial = true;
        }

        if (!in_array($l, $this->collCargadoress->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCargadores($l);

            if ($this->cargadoressScheduledForDeletion and $this->cargadoressScheduledForDeletion->contains($l)) {
                $this->cargadoressScheduledForDeletion->remove($this->cargadoressScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Cargadores $cargadores The cargadores object to add.
     */
    protected function doAddCargadores($cargadores)
    {
        $this->collCargadoress[]= $cargadores;
        $cargadores->setBateriastipos($this);
    }

    /**
     * @param	Cargadores $cargadores The cargadores object to remove.
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function removeCargadores($cargadores)
    {
        if ($this->getCargadoress()->contains($cargadores)) {
            $this->collCargadoress->remove($this->collCargadoress->search($cargadores));
            if (null === $this->cargadoressScheduledForDeletion) {
                $this->cargadoressScheduledForDeletion = clone $this->collCargadoress;
                $this->cargadoressScheduledForDeletion->clear();
            }
            $this->cargadoressScheduledForDeletion[]= clone $cargadores;
            $cargadores->setBateriastipos(null);
        }

        return $this;
    }

    /**
     * Clears out the collMontacargass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bateriastipos The current object (for fluent API support)
     * @see        addMontacargass()
     */
    public function clearMontacargass()
    {
        $this->collMontacargass = null; // important to set this to null since that means it is uninitialized
        $this->collMontacargassPartial = null;

        return $this;
    }

    /**
     * reset is the collMontacargass collection loaded partially
     *
     * @return void
     */
    public function resetPartialMontacargass($v = true)
    {
        $this->collMontacargassPartial = $v;
    }

    /**
     * Initializes the collMontacargass collection.
     *
     * By default this just sets the collMontacargass collection to an empty array (like clearcollMontacargass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMontacargass($overrideExisting = true)
    {
        if (null !== $this->collMontacargass && !$overrideExisting) {
            return;
        }
        $this->collMontacargass = new PropelObjectCollection();
        $this->collMontacargass->setModel('Montacargas');
    }

    /**
     * Gets an array of Montacargas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bateriastipos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Montacargas[] List of Montacargas objects
     * @throws PropelException
     */
    public function getMontacargass($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMontacargassPartial && !$this->isNew();
        if (null === $this->collMontacargass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMontacargass) {
                // return empty collection
                $this->initMontacargass();
            } else {
                $collMontacargass = MontacargasQuery::create(null, $criteria)
                    ->filterByBateriastipos($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMontacargassPartial && count($collMontacargass)) {
                      $this->initMontacargass(false);

                      foreach ($collMontacargass as $obj) {
                        if (false == $this->collMontacargass->contains($obj)) {
                          $this->collMontacargass->append($obj);
                        }
                      }

                      $this->collMontacargassPartial = true;
                    }

                    $collMontacargass->getInternalIterator()->rewind();

                    return $collMontacargass;
                }

                if ($partial && $this->collMontacargass) {
                    foreach ($this->collMontacargass as $obj) {
                        if ($obj->isNew()) {
                            $collMontacargass[] = $obj;
                        }
                    }
                }

                $this->collMontacargass = $collMontacargass;
                $this->collMontacargassPartial = false;
            }
        }

        return $this->collMontacargass;
    }

    /**
     * Sets a collection of Montacargas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $montacargass A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function setMontacargass(PropelCollection $montacargass, PropelPDO $con = null)
    {
        $montacargassToDelete = $this->getMontacargass(new Criteria(), $con)->diff($montacargass);


        $this->montacargassScheduledForDeletion = $montacargassToDelete;

        foreach ($montacargassToDelete as $montacargasRemoved) {
            $montacargasRemoved->setBateriastipos(null);
        }

        $this->collMontacargass = null;
        foreach ($montacargass as $montacargas) {
            $this->addMontacargas($montacargas);
        }

        $this->collMontacargass = $montacargass;
        $this->collMontacargassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Montacargas objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Montacargas objects.
     * @throws PropelException
     */
    public function countMontacargass(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMontacargassPartial && !$this->isNew();
        if (null === $this->collMontacargass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMontacargass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMontacargass());
            }
            $query = MontacargasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBateriastipos($this)
                ->count($con);
        }

        return count($this->collMontacargass);
    }

    /**
     * Method called to associate a Montacargas object to this object
     * through the Montacargas foreign key attribute.
     *
     * @param    Montacargas $l Montacargas
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function addMontacargas(Montacargas $l)
    {
        if ($this->collMontacargass === null) {
            $this->initMontacargass();
            $this->collMontacargassPartial = true;
        }

        if (!in_array($l, $this->collMontacargass->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMontacargas($l);

            if ($this->montacargassScheduledForDeletion and $this->montacargassScheduledForDeletion->contains($l)) {
                $this->montacargassScheduledForDeletion->remove($this->montacargassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Montacargas $montacargas The montacargas object to add.
     */
    protected function doAddMontacargas($montacargas)
    {
        $this->collMontacargass[]= $montacargas;
        $montacargas->setBateriastipos($this);
    }

    /**
     * @param	Montacargas $montacargas The montacargas object to remove.
     * @return Bateriastipos The current object (for fluent API support)
     */
    public function removeMontacargas($montacargas)
    {
        if ($this->getMontacargass()->contains($montacargas)) {
            $this->collMontacargass->remove($this->collMontacargass->search($montacargas));
            if (null === $this->montacargassScheduledForDeletion) {
                $this->montacargassScheduledForDeletion = clone $this->collMontacargass;
                $this->montacargassScheduledForDeletion->clear();
            }
            $this->montacargassScheduledForDeletion[]= clone $montacargas;
            $montacargas->setBateriastipos(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->idsucursal = null;
        $this->volts = null;
        $this->ah = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collBateriass) {
                foreach ($this->collBateriass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCargadoress) {
                foreach ($this->collCargadoress as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMontacargass) {
                foreach ($this->collMontacargass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSucursal instanceof Persistent) {
              $this->aSucursal->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBateriass instanceof PropelCollection) {
            $this->collBateriass->clearIterator();
        }
        $this->collBateriass = null;
        if ($this->collCargadoress instanceof PropelCollection) {
            $this->collCargadoress->clearIterator();
        }
        $this->collCargadoress = null;
        if ($this->collMontacargass instanceof PropelCollection) {
            $this->collMontacargass->clearIterator();
        }
        $this->collMontacargass = null;
        $this->aSucursal = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BateriastiposPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
