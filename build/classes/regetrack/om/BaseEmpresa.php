<?php


/**
 * Base class that represents a row from the 'empresa' table.
 *
 *
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseEmpresa extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'EmpresaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EmpresaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idempresa field.
     * @var        int
     */
    protected $idempresa;

    /**
     * The value for the idusuario field.
     * @var        int
     */
    protected $idusuario;

    /**
     * The value for the empresa_nombre field.
     * @var        string
     */
    protected $empresa_nombre;

    /**
     * The value for the empresa_numsucursales field.
     * @var        int
     */
    protected $empresa_numsucursales;

    /**
     * The value for the empresa_suscripcioninicio field.
     * @var        int
     */
    protected $empresa_suscripcioninicio;

    /**
     * The value for the empresa_suscripcionfin field.
     * @var        int
     */
    protected $empresa_suscripcionfin;

    /**
     * @var        UcUsers
     */
    protected $aUcUsers;

    /**
     * @var        PropelObjectCollection|Sucursal[] Collection to store aggregation of Sucursal objects.
     */
    protected $collSucursals;
    protected $collSucursalsPartial;

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
    protected $sucursalsScheduledForDeletion = null;

    /**
     * Get the [idempresa] column value.
     *
     * @return int
     */
    public function getIdempresa()
    {

        return $this->idempresa;
    }

    /**
     * Get the [idusuario] column value.
     *
     * @return int
     */
    public function getIdusuario()
    {

        return $this->idusuario;
    }

    /**
     * Get the [empresa_nombre] column value.
     *
     * @return string
     */
    public function getEmpresaNombre()
    {

        return $this->empresa_nombre;
    }

    /**
     * Get the [empresa_numsucursales] column value.
     *
     * @return int
     */
    public function getEmpresaNumsucursales()
    {

        return $this->empresa_numsucursales;
    }

    /**
     * Get the [empresa_suscripcioninicio] column value.
     *
     * @return int
     */
    public function getEmpresaSuscripcioninicio()
    {

        return $this->empresa_suscripcioninicio;
    }

    /**
     * Get the [empresa_suscripcionfin] column value.
     *
     * @return int
     */
    public function getEmpresaSuscripcionfin()
    {

        return $this->empresa_suscripcionfin;
    }

    /**
     * Set the value of [idempresa] column.
     *
     * @param  int $v new value
     * @return Empresa The current object (for fluent API support)
     */
    public function setIdempresa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idempresa !== $v) {
            $this->idempresa = $v;
            $this->modifiedColumns[] = EmpresaPeer::IDEMPRESA;
        }


        return $this;
    } // setIdempresa()

    /**
     * Set the value of [idusuario] column.
     *
     * @param  int $v new value
     * @return Empresa The current object (for fluent API support)
     */
    public function setIdusuario($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idusuario !== $v) {
            $this->idusuario = $v;
            $this->modifiedColumns[] = EmpresaPeer::IDUSUARIO;
        }

        if ($this->aUcUsers !== null && $this->aUcUsers->getId() !== $v) {
            $this->aUcUsers = null;
        }


        return $this;
    } // setIdusuario()

    /**
     * Set the value of [empresa_nombre] column.
     *
     * @param  string $v new value
     * @return Empresa The current object (for fluent API support)
     */
    public function setEmpresaNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->empresa_nombre !== $v) {
            $this->empresa_nombre = $v;
            $this->modifiedColumns[] = EmpresaPeer::EMPRESA_NOMBRE;
        }


        return $this;
    } // setEmpresaNombre()

    /**
     * Set the value of [empresa_numsucursales] column.
     *
     * @param  int $v new value
     * @return Empresa The current object (for fluent API support)
     */
    public function setEmpresaNumsucursales($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->empresa_numsucursales !== $v) {
            $this->empresa_numsucursales = $v;
            $this->modifiedColumns[] = EmpresaPeer::EMPRESA_NUMSUCURSALES;
        }


        return $this;
    } // setEmpresaNumsucursales()

    /**
     * Set the value of [empresa_suscripcioninicio] column.
     *
     * @param  int $v new value
     * @return Empresa The current object (for fluent API support)
     */
    public function setEmpresaSuscripcioninicio($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->empresa_suscripcioninicio !== $v) {
            $this->empresa_suscripcioninicio = $v;
            $this->modifiedColumns[] = EmpresaPeer::EMPRESA_SUSCRIPCIONINICIO;
        }


        return $this;
    } // setEmpresaSuscripcioninicio()

    /**
     * Set the value of [empresa_suscripcionfin] column.
     *
     * @param  int $v new value
     * @return Empresa The current object (for fluent API support)
     */
    public function setEmpresaSuscripcionfin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->empresa_suscripcionfin !== $v) {
            $this->empresa_suscripcionfin = $v;
            $this->modifiedColumns[] = EmpresaPeer::EMPRESA_SUSCRIPCIONFIN;
        }


        return $this;
    } // setEmpresaSuscripcionfin()

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

            $this->idempresa = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idusuario = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->empresa_nombre = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->empresa_numsucursales = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->empresa_suscripcioninicio = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->empresa_suscripcionfin = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = EmpresaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Empresa object", $e);
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

        if ($this->aUcUsers !== null && $this->idusuario !== $this->aUcUsers->getId()) {
            $this->aUcUsers = null;
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
            $con = Propel::getConnection(EmpresaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EmpresaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUcUsers = null;
            $this->collSucursals = null;

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
            $con = Propel::getConnection(EmpresaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EmpresaQuery::create()
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
            $con = Propel::getConnection(EmpresaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EmpresaPeer::addInstanceToPool($this);
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

            if ($this->aUcUsers !== null) {
                if ($this->aUcUsers->isModified() || $this->aUcUsers->isNew()) {
                    $affectedRows += $this->aUcUsers->save($con);
                }
                $this->setUcUsers($this->aUcUsers);
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

            if ($this->sucursalsScheduledForDeletion !== null) {
                if (!$this->sucursalsScheduledForDeletion->isEmpty()) {
                    SucursalQuery::create()
                        ->filterByPrimaryKeys($this->sucursalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sucursalsScheduledForDeletion = null;
                }
            }

            if ($this->collSucursals !== null) {
                foreach ($this->collSucursals as $referrerFK) {
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

        $this->modifiedColumns[] = EmpresaPeer::IDEMPRESA;
        if (null !== $this->idempresa) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EmpresaPeer::IDEMPRESA . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EmpresaPeer::IDEMPRESA)) {
            $modifiedColumns[':p' . $index++]  = '`idempresa`';
        }
        if ($this->isColumnModified(EmpresaPeer::IDUSUARIO)) {
            $modifiedColumns[':p' . $index++]  = '`idusuario`';
        }
        if ($this->isColumnModified(EmpresaPeer::EMPRESA_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`empresa_nombre`';
        }
        if ($this->isColumnModified(EmpresaPeer::EMPRESA_NUMSUCURSALES)) {
            $modifiedColumns[':p' . $index++]  = '`empresa_numsucursales`';
        }
        if ($this->isColumnModified(EmpresaPeer::EMPRESA_SUSCRIPCIONINICIO)) {
            $modifiedColumns[':p' . $index++]  = '`empresa_suscripcioninicio`';
        }
        if ($this->isColumnModified(EmpresaPeer::EMPRESA_SUSCRIPCIONFIN)) {
            $modifiedColumns[':p' . $index++]  = '`empresa_suscripcionfin`';
        }

        $sql = sprintf(
            'INSERT INTO `empresa` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idempresa`':
                        $stmt->bindValue($identifier, $this->idempresa, PDO::PARAM_INT);
                        break;
                    case '`idusuario`':
                        $stmt->bindValue($identifier, $this->idusuario, PDO::PARAM_INT);
                        break;
                    case '`empresa_nombre`':
                        $stmt->bindValue($identifier, $this->empresa_nombre, PDO::PARAM_STR);
                        break;
                    case '`empresa_numsucursales`':
                        $stmt->bindValue($identifier, $this->empresa_numsucursales, PDO::PARAM_INT);
                        break;
                    case '`empresa_suscripcioninicio`':
                        $stmt->bindValue($identifier, $this->empresa_suscripcioninicio, PDO::PARAM_INT);
                        break;
                    case '`empresa_suscripcionfin`':
                        $stmt->bindValue($identifier, $this->empresa_suscripcionfin, PDO::PARAM_INT);
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
        $this->setIdempresa($pk);

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

            if ($this->aUcUsers !== null) {
                if (!$this->aUcUsers->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUcUsers->getValidationFailures());
                }
            }


            if (($retval = EmpresaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSucursals !== null) {
                    foreach ($this->collSucursals as $referrerFK) {
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
        $pos = EmpresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdempresa();
                break;
            case 1:
                return $this->getIdusuario();
                break;
            case 2:
                return $this->getEmpresaNombre();
                break;
            case 3:
                return $this->getEmpresaNumsucursales();
                break;
            case 4:
                return $this->getEmpresaSuscripcioninicio();
                break;
            case 5:
                return $this->getEmpresaSuscripcionfin();
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
        if (isset($alreadyDumpedObjects['Empresa'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Empresa'][$this->getPrimaryKey()] = true;
        $keys = EmpresaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdempresa(),
            $keys[1] => $this->getIdusuario(),
            $keys[2] => $this->getEmpresaNombre(),
            $keys[3] => $this->getEmpresaNumsucursales(),
            $keys[4] => $this->getEmpresaSuscripcioninicio(),
            $keys[5] => $this->getEmpresaSuscripcionfin(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUcUsers) {
                $result['UcUsers'] = $this->aUcUsers->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSucursals) {
                $result['Sucursals'] = $this->collSucursals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = EmpresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdempresa($value);
                break;
            case 1:
                $this->setIdusuario($value);
                break;
            case 2:
                $this->setEmpresaNombre($value);
                break;
            case 3:
                $this->setEmpresaNumsucursales($value);
                break;
            case 4:
                $this->setEmpresaSuscripcioninicio($value);
                break;
            case 5:
                $this->setEmpresaSuscripcionfin($value);
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
        $keys = EmpresaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdempresa($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdusuario($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setEmpresaNombre($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setEmpresaNumsucursales($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setEmpresaSuscripcioninicio($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setEmpresaSuscripcionfin($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EmpresaPeer::DATABASE_NAME);

        if ($this->isColumnModified(EmpresaPeer::IDEMPRESA)) $criteria->add(EmpresaPeer::IDEMPRESA, $this->idempresa);
        if ($this->isColumnModified(EmpresaPeer::IDUSUARIO)) $criteria->add(EmpresaPeer::IDUSUARIO, $this->idusuario);
        if ($this->isColumnModified(EmpresaPeer::EMPRESA_NOMBRE)) $criteria->add(EmpresaPeer::EMPRESA_NOMBRE, $this->empresa_nombre);
        if ($this->isColumnModified(EmpresaPeer::EMPRESA_NUMSUCURSALES)) $criteria->add(EmpresaPeer::EMPRESA_NUMSUCURSALES, $this->empresa_numsucursales);
        if ($this->isColumnModified(EmpresaPeer::EMPRESA_SUSCRIPCIONINICIO)) $criteria->add(EmpresaPeer::EMPRESA_SUSCRIPCIONINICIO, $this->empresa_suscripcioninicio);
        if ($this->isColumnModified(EmpresaPeer::EMPRESA_SUSCRIPCIONFIN)) $criteria->add(EmpresaPeer::EMPRESA_SUSCRIPCIONFIN, $this->empresa_suscripcionfin);

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
        $criteria = new Criteria(EmpresaPeer::DATABASE_NAME);
        $criteria->add(EmpresaPeer::IDEMPRESA, $this->idempresa);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdempresa();
    }

    /**
     * Generic method to set the primary key (idempresa column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdempresa($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdempresa();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Empresa (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdusuario($this->getIdusuario());
        $copyObj->setEmpresaNombre($this->getEmpresaNombre());
        $copyObj->setEmpresaNumsucursales($this->getEmpresaNumsucursales());
        $copyObj->setEmpresaSuscripcioninicio($this->getEmpresaSuscripcioninicio());
        $copyObj->setEmpresaSuscripcionfin($this->getEmpresaSuscripcionfin());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSucursals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSucursal($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdempresa(NULL); // this is a auto-increment column, so set to default value
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
     * @return Empresa Clone of current object.
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
     * @return EmpresaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EmpresaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a UcUsers object.
     *
     * @param                  UcUsers $v
     * @return Empresa The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUcUsers(UcUsers $v = null)
    {
        if ($v === null) {
            $this->setIdusuario(NULL);
        } else {
            $this->setIdusuario($v->getId());
        }

        $this->aUcUsers = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the UcUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addEmpresa($this);
        }


        return $this;
    }


    /**
     * Get the associated UcUsers object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return UcUsers The associated UcUsers object.
     * @throws PropelException
     */
    public function getUcUsers(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUcUsers === null && ($this->idusuario !== null) && $doQuery) {
            $this->aUcUsers = UcUsersQuery::create()->findPk($this->idusuario, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUcUsers->addEmpresas($this);
             */
        }

        return $this->aUcUsers;
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
        if ('Sucursal' == $relationName) {
            $this->initSucursals();
        }
    }

    /**
     * Clears out the collSucursals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Empresa The current object (for fluent API support)
     * @see        addSucursals()
     */
    public function clearSucursals()
    {
        $this->collSucursals = null; // important to set this to null since that means it is uninitialized
        $this->collSucursalsPartial = null;

        return $this;
    }

    /**
     * reset is the collSucursals collection loaded partially
     *
     * @return void
     */
    public function resetPartialSucursals($v = true)
    {
        $this->collSucursalsPartial = $v;
    }

    /**
     * Initializes the collSucursals collection.
     *
     * By default this just sets the collSucursals collection to an empty array (like clearcollSucursals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSucursals($overrideExisting = true)
    {
        if (null !== $this->collSucursals && !$overrideExisting) {
            return;
        }
        $this->collSucursals = new PropelObjectCollection();
        $this->collSucursals->setModel('Sucursal');
    }

    /**
     * Gets an array of Sucursal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Empresa is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sucursal[] List of Sucursal objects
     * @throws PropelException
     */
    public function getSucursals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSucursalsPartial && !$this->isNew();
        if (null === $this->collSucursals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSucursals) {
                // return empty collection
                $this->initSucursals();
            } else {
                $collSucursals = SucursalQuery::create(null, $criteria)
                    ->filterByEmpresa($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSucursalsPartial && count($collSucursals)) {
                      $this->initSucursals(false);

                      foreach ($collSucursals as $obj) {
                        if (false == $this->collSucursals->contains($obj)) {
                          $this->collSucursals->append($obj);
                        }
                      }

                      $this->collSucursalsPartial = true;
                    }

                    $collSucursals->getInternalIterator()->rewind();

                    return $collSucursals;
                }

                if ($partial && $this->collSucursals) {
                    foreach ($this->collSucursals as $obj) {
                        if ($obj->isNew()) {
                            $collSucursals[] = $obj;
                        }
                    }
                }

                $this->collSucursals = $collSucursals;
                $this->collSucursalsPartial = false;
            }
        }

        return $this->collSucursals;
    }

    /**
     * Sets a collection of Sucursal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sucursals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Empresa The current object (for fluent API support)
     */
    public function setSucursals(PropelCollection $sucursals, PropelPDO $con = null)
    {
        $sucursalsToDelete = $this->getSucursals(new Criteria(), $con)->diff($sucursals);


        $this->sucursalsScheduledForDeletion = $sucursalsToDelete;

        foreach ($sucursalsToDelete as $sucursalRemoved) {
            $sucursalRemoved->setEmpresa(null);
        }

        $this->collSucursals = null;
        foreach ($sucursals as $sucursal) {
            $this->addSucursal($sucursal);
        }

        $this->collSucursals = $sucursals;
        $this->collSucursalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sucursal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sucursal objects.
     * @throws PropelException
     */
    public function countSucursals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSucursalsPartial && !$this->isNew();
        if (null === $this->collSucursals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSucursals) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSucursals());
            }
            $query = SucursalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEmpresa($this)
                ->count($con);
        }

        return count($this->collSucursals);
    }

    /**
     * Method called to associate a Sucursal object to this object
     * through the Sucursal foreign key attribute.
     *
     * @param    Sucursal $l Sucursal
     * @return Empresa The current object (for fluent API support)
     */
    public function addSucursal(Sucursal $l)
    {
        if ($this->collSucursals === null) {
            $this->initSucursals();
            $this->collSucursalsPartial = true;
        }

        if (!in_array($l, $this->collSucursals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSucursal($l);

            if ($this->sucursalsScheduledForDeletion and $this->sucursalsScheduledForDeletion->contains($l)) {
                $this->sucursalsScheduledForDeletion->remove($this->sucursalsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Sucursal $sucursal The sucursal object to add.
     */
    protected function doAddSucursal($sucursal)
    {
        $this->collSucursals[]= $sucursal;
        $sucursal->setEmpresa($this);
    }

    /**
     * @param	Sucursal $sucursal The sucursal object to remove.
     * @return Empresa The current object (for fluent API support)
     */
    public function removeSucursal($sucursal)
    {
        if ($this->getSucursals()->contains($sucursal)) {
            $this->collSucursals->remove($this->collSucursals->search($sucursal));
            if (null === $this->sucursalsScheduledForDeletion) {
                $this->sucursalsScheduledForDeletion = clone $this->collSucursals;
                $this->sucursalsScheduledForDeletion->clear();
            }
            $this->sucursalsScheduledForDeletion[]= $sucursal;
            $sucursal->setEmpresa(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idempresa = null;
        $this->idusuario = null;
        $this->empresa_nombre = null;
        $this->empresa_numsucursales = null;
        $this->empresa_suscripcioninicio = null;
        $this->empresa_suscripcionfin = null;
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
            if ($this->collSucursals) {
                foreach ($this->collSucursals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aUcUsers instanceof Persistent) {
              $this->aUcUsers->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSucursals instanceof PropelCollection) {
            $this->collSucursals->clearIterator();
        }
        $this->collSucursals = null;
        $this->aUcUsers = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EmpresaPeer::DEFAULT_STRING_FORMAT);
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
