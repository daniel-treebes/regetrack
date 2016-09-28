<?php


/**
 * Base class that represents a row from the 'montacargas' table.
 *
 *
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseMontacargas extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MontacargasPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MontacargasPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idmontacargas field.
     * @var        int
     */
    protected $idmontacargas;

    /**
     * The value for the idsucursal field.
     * @var        int
     */
    protected $idsucursal;

    /**
     * The value for the montacargas_modelo field.
     * @var        string
     */
    protected $montacargas_modelo;

    /**
     * The value for the montacargas_marca field.
     * @var        string
     */
    protected $montacargas_marca;

    /**
     * The value for the montacargas_c field.
     * @var        string
     */
    protected $montacargas_c;

    /**
     * The value for the montacargas_k field.
     * @var        string
     */
    protected $montacargas_k;

    /**
     * The value for the montacargas_p field.
     * @var        string
     */
    protected $montacargas_p;

    /**
     * The value for the montacargas_t field.
     * @var        string
     */
    protected $montacargas_t;

    /**
     * The value for the montacargas_e field.
     * @var        string
     */
    protected $montacargas_e;

    /**
     * The value for the montacargas_volts field.
     * @var        int
     */
    protected $montacargas_volts;

    /**
     * The value for the montacargas_amperaje field.
     * @var        int
     */
    protected $montacargas_amperaje;

    /**
     * The value for the montacargas_nombre field.
     * @var        string
     */
    protected $montacargas_nombre;

    /**
     * The value for the montacargas_numserie field.
     * @var        string
     */
    protected $montacargas_numserie;

    /**
     * The value for the montacargas_comprador field.
     * @var        string
     */
    protected $montacargas_comprador;

    /**
     * @var        Sucursal
     */
    protected $aSucursal;

    /**
     * @var        PropelObjectCollection|Deshabilitamc[] Collection to store aggregation of Deshabilitamc objects.
     */
    protected $collDeshabilitamcs;
    protected $collDeshabilitamcsPartial;

    /**
     * @var        PropelObjectCollection|UsoBateriasMontacargas[] Collection to store aggregation of UsoBateriasMontacargas objects.
     */
    protected $collUsoBateriasMontacargass;
    protected $collUsoBateriasMontacargassPartial;

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
    protected $deshabilitamcsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usoBateriasMontacargassScheduledForDeletion = null;

    /**
     * Get the [idmontacargas] column value.
     *
     * @return int
     */
    public function getIdmontacargas()
    {

        return $this->idmontacargas;
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
     * Get the [montacargas_modelo] column value.
     *
     * @return string
     */
    public function getMontacargasModelo()
    {

        return $this->montacargas_modelo;
    }

    /**
     * Get the [montacargas_marca] column value.
     *
     * @return string
     */
    public function getMontacargasMarca()
    {

        return $this->montacargas_marca;
    }

    /**
     * Get the [montacargas_c] column value.
     *
     * @return string
     */
    public function getMontacargasC()
    {

        return $this->montacargas_c;
    }

    /**
     * Get the [montacargas_k] column value.
     *
     * @return string
     */
    public function getMontacargasK()
    {

        return $this->montacargas_k;
    }

    /**
     * Get the [montacargas_p] column value.
     *
     * @return string
     */
    public function getMontacargasP()
    {

        return $this->montacargas_p;
    }

    /**
     * Get the [montacargas_t] column value.
     *
     * @return string
     */
    public function getMontacargasT()
    {

        return $this->montacargas_t;
    }

    /**
     * Get the [montacargas_e] column value.
     *
     * @return string
     */
    public function getMontacargasE()
    {

        return $this->montacargas_e;
    }

    /**
     * Get the [montacargas_volts] column value.
     *
     * @return int
     */
    public function getMontacargasVolts()
    {

        return $this->montacargas_volts;
    }

    /**
     * Get the [montacargas_amperaje] column value.
     *
     * @return int
     */
    public function getMontacargasAmperaje()
    {

        return $this->montacargas_amperaje;
    }

    /**
     * Get the [montacargas_nombre] column value.
     *
     * @return string
     */
    public function getMontacargasNombre()
    {

        return $this->montacargas_nombre;
    }

    /**
     * Get the [montacargas_numserie] column value.
     *
     * @return string
     */
    public function getMontacargasNumserie()
    {

        return $this->montacargas_numserie;
    }

    /**
     * Get the [montacargas_comprador] column value.
     *
     * @return string
     */
    public function getMontacargasComprador()
    {

        return $this->montacargas_comprador;
    }

    /**
     * Set the value of [idmontacargas] column.
     *
     * @param  int $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setIdmontacargas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmontacargas !== $v) {
            $this->idmontacargas = $v;
            $this->modifiedColumns[] = MontacargasPeer::IDMONTACARGAS;
        }


        return $this;
    } // setIdmontacargas()

    /**
     * Set the value of [idsucursal] column.
     *
     * @param  int $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setIdsucursal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idsucursal !== $v) {
            $this->idsucursal = $v;
            $this->modifiedColumns[] = MontacargasPeer::IDSUCURSAL;
        }

        if ($this->aSucursal !== null && $this->aSucursal->getIdsucursal() !== $v) {
            $this->aSucursal = null;
        }


        return $this;
    } // setIdsucursal()

    /**
     * Set the value of [montacargas_modelo] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasModelo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_modelo !== $v) {
            $this->montacargas_modelo = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_MODELO;
        }


        return $this;
    } // setMontacargasModelo()

    /**
     * Set the value of [montacargas_marca] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasMarca($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_marca !== $v) {
            $this->montacargas_marca = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_MARCA;
        }


        return $this;
    } // setMontacargasMarca()

    /**
     * Set the value of [montacargas_c] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasC($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_c !== $v) {
            $this->montacargas_c = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_C;
        }


        return $this;
    } // setMontacargasC()

    /**
     * Set the value of [montacargas_k] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasK($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_k !== $v) {
            $this->montacargas_k = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_K;
        }


        return $this;
    } // setMontacargasK()

    /**
     * Set the value of [montacargas_p] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasP($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_p !== $v) {
            $this->montacargas_p = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_P;
        }


        return $this;
    } // setMontacargasP()

    /**
     * Set the value of [montacargas_t] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_t !== $v) {
            $this->montacargas_t = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_T;
        }


        return $this;
    } // setMontacargasT()

    /**
     * Set the value of [montacargas_e] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasE($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_e !== $v) {
            $this->montacargas_e = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_E;
        }


        return $this;
    } // setMontacargasE()

    /**
     * Set the value of [montacargas_volts] column.
     *
     * @param  int $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasVolts($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->montacargas_volts !== $v) {
            $this->montacargas_volts = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_VOLTS;
        }


        return $this;
    } // setMontacargasVolts()

    /**
     * Set the value of [montacargas_amperaje] column.
     *
     * @param  int $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasAmperaje($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->montacargas_amperaje !== $v) {
            $this->montacargas_amperaje = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_AMPERAJE;
        }


        return $this;
    } // setMontacargasAmperaje()

    /**
     * Set the value of [montacargas_nombre] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_nombre !== $v) {
            $this->montacargas_nombre = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_NOMBRE;
        }


        return $this;
    } // setMontacargasNombre()

    /**
     * Set the value of [montacargas_numserie] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasNumserie($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_numserie !== $v) {
            $this->montacargas_numserie = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_NUMSERIE;
        }


        return $this;
    } // setMontacargasNumserie()

    /**
     * Set the value of [montacargas_comprador] column.
     *
     * @param  string $v new value
     * @return Montacargas The current object (for fluent API support)
     */
    public function setMontacargasComprador($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->montacargas_comprador !== $v) {
            $this->montacargas_comprador = $v;
            $this->modifiedColumns[] = MontacargasPeer::MONTACARGAS_COMPRADOR;
        }


        return $this;
    } // setMontacargasComprador()

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

            $this->idmontacargas = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idsucursal = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->montacargas_modelo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->montacargas_marca = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->montacargas_c = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->montacargas_k = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->montacargas_p = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->montacargas_t = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->montacargas_e = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->montacargas_volts = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->montacargas_amperaje = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->montacargas_nombre = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->montacargas_numserie = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->montacargas_comprador = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 14; // 14 = MontacargasPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Montacargas object", $e);
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
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MontacargasPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSucursal = null;
            $this->collDeshabilitamcs = null;

            $this->collUsoBateriasMontacargass = null;

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
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MontacargasQuery::create()
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
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MontacargasPeer::addInstanceToPool($this);
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

            if ($this->deshabilitamcsScheduledForDeletion !== null) {
                if (!$this->deshabilitamcsScheduledForDeletion->isEmpty()) {
                    DeshabilitamcQuery::create()
                        ->filterByPrimaryKeys($this->deshabilitamcsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->deshabilitamcsScheduledForDeletion = null;
                }
            }

            if ($this->collDeshabilitamcs !== null) {
                foreach ($this->collDeshabilitamcs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usoBateriasMontacargassScheduledForDeletion !== null) {
                if (!$this->usoBateriasMontacargassScheduledForDeletion->isEmpty()) {
                    UsoBateriasMontacargasQuery::create()
                        ->filterByPrimaryKeys($this->usoBateriasMontacargassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->usoBateriasMontacargassScheduledForDeletion = null;
                }
            }

            if ($this->collUsoBateriasMontacargass !== null) {
                foreach ($this->collUsoBateriasMontacargass as $referrerFK) {
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

        $this->modifiedColumns[] = MontacargasPeer::IDMONTACARGAS;
        if (null !== $this->idmontacargas) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MontacargasPeer::IDMONTACARGAS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MontacargasPeer::IDMONTACARGAS)) {
            $modifiedColumns[':p' . $index++]  = '`idmontacargas`';
        }
        if ($this->isColumnModified(MontacargasPeer::IDSUCURSAL)) {
            $modifiedColumns[':p' . $index++]  = '`idsucursal`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_MODELO)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_modelo`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_MARCA)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_marca`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_C)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_c`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_K)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_k`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_P)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_p`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_T)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_t`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_E)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_e`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_VOLTS)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_volts`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_AMPERAJE)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_amperaje`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_nombre`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_NUMSERIE)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_numserie`';
        }
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_COMPRADOR)) {
            $modifiedColumns[':p' . $index++]  = '`montacargas_comprador`';
        }

        $sql = sprintf(
            'INSERT INTO `montacargas` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idmontacargas`':
                        $stmt->bindValue($identifier, $this->idmontacargas, PDO::PARAM_INT);
                        break;
                    case '`idsucursal`':
                        $stmt->bindValue($identifier, $this->idsucursal, PDO::PARAM_INT);
                        break;
                    case '`montacargas_modelo`':
                        $stmt->bindValue($identifier, $this->montacargas_modelo, PDO::PARAM_STR);
                        break;
                    case '`montacargas_marca`':
                        $stmt->bindValue($identifier, $this->montacargas_marca, PDO::PARAM_STR);
                        break;
                    case '`montacargas_c`':
                        $stmt->bindValue($identifier, $this->montacargas_c, PDO::PARAM_STR);
                        break;
                    case '`montacargas_k`':
                        $stmt->bindValue($identifier, $this->montacargas_k, PDO::PARAM_STR);
                        break;
                    case '`montacargas_p`':
                        $stmt->bindValue($identifier, $this->montacargas_p, PDO::PARAM_STR);
                        break;
                    case '`montacargas_t`':
                        $stmt->bindValue($identifier, $this->montacargas_t, PDO::PARAM_STR);
                        break;
                    case '`montacargas_e`':
                        $stmt->bindValue($identifier, $this->montacargas_e, PDO::PARAM_STR);
                        break;
                    case '`montacargas_volts`':
                        $stmt->bindValue($identifier, $this->montacargas_volts, PDO::PARAM_INT);
                        break;
                    case '`montacargas_amperaje`':
                        $stmt->bindValue($identifier, $this->montacargas_amperaje, PDO::PARAM_INT);
                        break;
                    case '`montacargas_nombre`':
                        $stmt->bindValue($identifier, $this->montacargas_nombre, PDO::PARAM_STR);
                        break;
                    case '`montacargas_numserie`':
                        $stmt->bindValue($identifier, $this->montacargas_numserie, PDO::PARAM_STR);
                        break;
                    case '`montacargas_comprador`':
                        $stmt->bindValue($identifier, $this->montacargas_comprador, PDO::PARAM_STR);
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
        $this->setIdmontacargas($pk);

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


            if (($retval = MontacargasPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDeshabilitamcs !== null) {
                    foreach ($this->collDeshabilitamcs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsoBateriasMontacargass !== null) {
                    foreach ($this->collUsoBateriasMontacargass as $referrerFK) {
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
        $pos = MontacargasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdmontacargas();
                break;
            case 1:
                return $this->getIdsucursal();
                break;
            case 2:
                return $this->getMontacargasModelo();
                break;
            case 3:
                return $this->getMontacargasMarca();
                break;
            case 4:
                return $this->getMontacargasC();
                break;
            case 5:
                return $this->getMontacargasK();
                break;
            case 6:
                return $this->getMontacargasP();
                break;
            case 7:
                return $this->getMontacargasT();
                break;
            case 8:
                return $this->getMontacargasE();
                break;
            case 9:
                return $this->getMontacargasVolts();
                break;
            case 10:
                return $this->getMontacargasAmperaje();
                break;
            case 11:
                return $this->getMontacargasNombre();
                break;
            case 12:
                return $this->getMontacargasNumserie();
                break;
            case 13:
                return $this->getMontacargasComprador();
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
        if (isset($alreadyDumpedObjects['Montacargas'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Montacargas'][$this->getPrimaryKey()] = true;
        $keys = MontacargasPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdmontacargas(),
            $keys[1] => $this->getIdsucursal(),
            $keys[2] => $this->getMontacargasModelo(),
            $keys[3] => $this->getMontacargasMarca(),
            $keys[4] => $this->getMontacargasC(),
            $keys[5] => $this->getMontacargasK(),
            $keys[6] => $this->getMontacargasP(),
            $keys[7] => $this->getMontacargasT(),
            $keys[8] => $this->getMontacargasE(),
            $keys[9] => $this->getMontacargasVolts(),
            $keys[10] => $this->getMontacargasAmperaje(),
            $keys[11] => $this->getMontacargasNombre(),
            $keys[12] => $this->getMontacargasNumserie(),
            $keys[13] => $this->getMontacargasComprador(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSucursal) {
                $result['Sucursal'] = $this->aSucursal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDeshabilitamcs) {
                $result['Deshabilitamcs'] = $this->collDeshabilitamcs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsoBateriasMontacargass) {
                $result['UsoBateriasMontacargass'] = $this->collUsoBateriasMontacargass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MontacargasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdmontacargas($value);
                break;
            case 1:
                $this->setIdsucursal($value);
                break;
            case 2:
                $this->setMontacargasModelo($value);
                break;
            case 3:
                $this->setMontacargasMarca($value);
                break;
            case 4:
                $this->setMontacargasC($value);
                break;
            case 5:
                $this->setMontacargasK($value);
                break;
            case 6:
                $this->setMontacargasP($value);
                break;
            case 7:
                $this->setMontacargasT($value);
                break;
            case 8:
                $this->setMontacargasE($value);
                break;
            case 9:
                $this->setMontacargasVolts($value);
                break;
            case 10:
                $this->setMontacargasAmperaje($value);
                break;
            case 11:
                $this->setMontacargasNombre($value);
                break;
            case 12:
                $this->setMontacargasNumserie($value);
                break;
            case 13:
                $this->setMontacargasComprador($value);
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
        $keys = MontacargasPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdmontacargas($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdsucursal($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMontacargasModelo($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setMontacargasMarca($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setMontacargasC($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setMontacargasK($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMontacargasP($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMontacargasT($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setMontacargasE($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setMontacargasVolts($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setMontacargasAmperaje($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setMontacargasNombre($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setMontacargasNumserie($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setMontacargasComprador($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MontacargasPeer::DATABASE_NAME);

        if ($this->isColumnModified(MontacargasPeer::IDMONTACARGAS)) $criteria->add(MontacargasPeer::IDMONTACARGAS, $this->idmontacargas);
        if ($this->isColumnModified(MontacargasPeer::IDSUCURSAL)) $criteria->add(MontacargasPeer::IDSUCURSAL, $this->idsucursal);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_MODELO)) $criteria->add(MontacargasPeer::MONTACARGAS_MODELO, $this->montacargas_modelo);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_MARCA)) $criteria->add(MontacargasPeer::MONTACARGAS_MARCA, $this->montacargas_marca);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_C)) $criteria->add(MontacargasPeer::MONTACARGAS_C, $this->montacargas_c);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_K)) $criteria->add(MontacargasPeer::MONTACARGAS_K, $this->montacargas_k);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_P)) $criteria->add(MontacargasPeer::MONTACARGAS_P, $this->montacargas_p);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_T)) $criteria->add(MontacargasPeer::MONTACARGAS_T, $this->montacargas_t);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_E)) $criteria->add(MontacargasPeer::MONTACARGAS_E, $this->montacargas_e);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_VOLTS)) $criteria->add(MontacargasPeer::MONTACARGAS_VOLTS, $this->montacargas_volts);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_AMPERAJE)) $criteria->add(MontacargasPeer::MONTACARGAS_AMPERAJE, $this->montacargas_amperaje);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_NOMBRE)) $criteria->add(MontacargasPeer::MONTACARGAS_NOMBRE, $this->montacargas_nombre);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_NUMSERIE)) $criteria->add(MontacargasPeer::MONTACARGAS_NUMSERIE, $this->montacargas_numserie);
        if ($this->isColumnModified(MontacargasPeer::MONTACARGAS_COMPRADOR)) $criteria->add(MontacargasPeer::MONTACARGAS_COMPRADOR, $this->montacargas_comprador);

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
        $criteria = new Criteria(MontacargasPeer::DATABASE_NAME);
        $criteria->add(MontacargasPeer::IDMONTACARGAS, $this->idmontacargas);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdmontacargas();
    }

    /**
     * Generic method to set the primary key (idmontacargas column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdmontacargas($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdmontacargas();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Montacargas (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdsucursal($this->getIdsucursal());
        $copyObj->setMontacargasModelo($this->getMontacargasModelo());
        $copyObj->setMontacargasMarca($this->getMontacargasMarca());
        $copyObj->setMontacargasC($this->getMontacargasC());
        $copyObj->setMontacargasK($this->getMontacargasK());
        $copyObj->setMontacargasP($this->getMontacargasP());
        $copyObj->setMontacargasT($this->getMontacargasT());
        $copyObj->setMontacargasE($this->getMontacargasE());
        $copyObj->setMontacargasVolts($this->getMontacargasVolts());
        $copyObj->setMontacargasAmperaje($this->getMontacargasAmperaje());
        $copyObj->setMontacargasNombre($this->getMontacargasNombre());
        $copyObj->setMontacargasNumserie($this->getMontacargasNumserie());
        $copyObj->setMontacargasComprador($this->getMontacargasComprador());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDeshabilitamcs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeshabilitamc($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsoBateriasMontacargass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsoBateriasMontacargas($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdmontacargas(NULL); // this is a auto-increment column, so set to default value
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
     * @return Montacargas Clone of current object.
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
     * @return MontacargasPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MontacargasPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sucursal object.
     *
     * @param                  Sucursal $v
     * @return Montacargas The current object (for fluent API support)
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
            $v->addMontacargas($this);
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
                $this->aSucursal->addMontacargass($this);
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
        if ('Deshabilitamc' == $relationName) {
            $this->initDeshabilitamcs();
        }
        if ('UsoBateriasMontacargas' == $relationName) {
            $this->initUsoBateriasMontacargass();
        }
    }

    /**
     * Clears out the collDeshabilitamcs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Montacargas The current object (for fluent API support)
     * @see        addDeshabilitamcs()
     */
    public function clearDeshabilitamcs()
    {
        $this->collDeshabilitamcs = null; // important to set this to null since that means it is uninitialized
        $this->collDeshabilitamcsPartial = null;

        return $this;
    }

    /**
     * reset is the collDeshabilitamcs collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeshabilitamcs($v = true)
    {
        $this->collDeshabilitamcsPartial = $v;
    }

    /**
     * Initializes the collDeshabilitamcs collection.
     *
     * By default this just sets the collDeshabilitamcs collection to an empty array (like clearcollDeshabilitamcs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeshabilitamcs($overrideExisting = true)
    {
        if (null !== $this->collDeshabilitamcs && !$overrideExisting) {
            return;
        }
        $this->collDeshabilitamcs = new PropelObjectCollection();
        $this->collDeshabilitamcs->setModel('Deshabilitamc');
    }

    /**
     * Gets an array of Deshabilitamc objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Montacargas is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Deshabilitamc[] List of Deshabilitamc objects
     * @throws PropelException
     */
    public function getDeshabilitamcs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitamcsPartial && !$this->isNew();
        if (null === $this->collDeshabilitamcs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitamcs) {
                // return empty collection
                $this->initDeshabilitamcs();
            } else {
                $collDeshabilitamcs = DeshabilitamcQuery::create(null, $criteria)
                    ->filterByMontacargas($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeshabilitamcsPartial && count($collDeshabilitamcs)) {
                      $this->initDeshabilitamcs(false);

                      foreach ($collDeshabilitamcs as $obj) {
                        if (false == $this->collDeshabilitamcs->contains($obj)) {
                          $this->collDeshabilitamcs->append($obj);
                        }
                      }

                      $this->collDeshabilitamcsPartial = true;
                    }

                    $collDeshabilitamcs->getInternalIterator()->rewind();

                    return $collDeshabilitamcs;
                }

                if ($partial && $this->collDeshabilitamcs) {
                    foreach ($this->collDeshabilitamcs as $obj) {
                        if ($obj->isNew()) {
                            $collDeshabilitamcs[] = $obj;
                        }
                    }
                }

                $this->collDeshabilitamcs = $collDeshabilitamcs;
                $this->collDeshabilitamcsPartial = false;
            }
        }

        return $this->collDeshabilitamcs;
    }

    /**
     * Sets a collection of Deshabilitamc objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deshabilitamcs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Montacargas The current object (for fluent API support)
     */
    public function setDeshabilitamcs(PropelCollection $deshabilitamcs, PropelPDO $con = null)
    {
        $deshabilitamcsToDelete = $this->getDeshabilitamcs(new Criteria(), $con)->diff($deshabilitamcs);


        $this->deshabilitamcsScheduledForDeletion = $deshabilitamcsToDelete;

        foreach ($deshabilitamcsToDelete as $deshabilitamcRemoved) {
            $deshabilitamcRemoved->setMontacargas(null);
        }

        $this->collDeshabilitamcs = null;
        foreach ($deshabilitamcs as $deshabilitamc) {
            $this->addDeshabilitamc($deshabilitamc);
        }

        $this->collDeshabilitamcs = $deshabilitamcs;
        $this->collDeshabilitamcsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Deshabilitamc objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Deshabilitamc objects.
     * @throws PropelException
     */
    public function countDeshabilitamcs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitamcsPartial && !$this->isNew();
        if (null === $this->collDeshabilitamcs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitamcs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDeshabilitamcs());
            }
            $query = DeshabilitamcQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMontacargas($this)
                ->count($con);
        }

        return count($this->collDeshabilitamcs);
    }

    /**
     * Method called to associate a Deshabilitamc object to this object
     * through the Deshabilitamc foreign key attribute.
     *
     * @param    Deshabilitamc $l Deshabilitamc
     * @return Montacargas The current object (for fluent API support)
     */
    public function addDeshabilitamc(Deshabilitamc $l)
    {
        if ($this->collDeshabilitamcs === null) {
            $this->initDeshabilitamcs();
            $this->collDeshabilitamcsPartial = true;
        }

        if (!in_array($l, $this->collDeshabilitamcs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeshabilitamc($l);

            if ($this->deshabilitamcsScheduledForDeletion and $this->deshabilitamcsScheduledForDeletion->contains($l)) {
                $this->deshabilitamcsScheduledForDeletion->remove($this->deshabilitamcsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Deshabilitamc $deshabilitamc The deshabilitamc object to add.
     */
    protected function doAddDeshabilitamc($deshabilitamc)
    {
        $this->collDeshabilitamcs[]= $deshabilitamc;
        $deshabilitamc->setMontacargas($this);
    }

    /**
     * @param	Deshabilitamc $deshabilitamc The deshabilitamc object to remove.
     * @return Montacargas The current object (for fluent API support)
     */
    public function removeDeshabilitamc($deshabilitamc)
    {
        if ($this->getDeshabilitamcs()->contains($deshabilitamc)) {
            $this->collDeshabilitamcs->remove($this->collDeshabilitamcs->search($deshabilitamc));
            if (null === $this->deshabilitamcsScheduledForDeletion) {
                $this->deshabilitamcsScheduledForDeletion = clone $this->collDeshabilitamcs;
                $this->deshabilitamcsScheduledForDeletion->clear();
            }
            $this->deshabilitamcsScheduledForDeletion[]= clone $deshabilitamc;
            $deshabilitamc->setMontacargas(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Montacargas is new, it will return
     * an empty collection; or if this Montacargas has previously
     * been saved, it will retrieve related Deshabilitamcs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Montacargas.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Deshabilitamc[] List of Deshabilitamc objects
     */
    public function getDeshabilitamcsJoinUcUsersRelatedByUsuarioEntrada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DeshabilitamcQuery::create(null, $criteria);
        $query->joinWith('UcUsersRelatedByUsuarioEntrada', $join_behavior);

        return $this->getDeshabilitamcs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Montacargas is new, it will return
     * an empty collection; or if this Montacargas has previously
     * been saved, it will retrieve related Deshabilitamcs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Montacargas.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Deshabilitamc[] List of Deshabilitamc objects
     */
    public function getDeshabilitamcsJoinUcUsersRelatedByUsuarioSalida($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DeshabilitamcQuery::create(null, $criteria);
        $query->joinWith('UcUsersRelatedByUsuarioSalida', $join_behavior);

        return $this->getDeshabilitamcs($query, $con);
    }

    /**
     * Clears out the collUsoBateriasMontacargass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Montacargas The current object (for fluent API support)
     * @see        addUsoBateriasMontacargass()
     */
    public function clearUsoBateriasMontacargass()
    {
        $this->collUsoBateriasMontacargass = null; // important to set this to null since that means it is uninitialized
        $this->collUsoBateriasMontacargassPartial = null;

        return $this;
    }

    /**
     * reset is the collUsoBateriasMontacargass collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsoBateriasMontacargass($v = true)
    {
        $this->collUsoBateriasMontacargassPartial = $v;
    }

    /**
     * Initializes the collUsoBateriasMontacargass collection.
     *
     * By default this just sets the collUsoBateriasMontacargass collection to an empty array (like clearcollUsoBateriasMontacargass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsoBateriasMontacargass($overrideExisting = true)
    {
        if (null !== $this->collUsoBateriasMontacargass && !$overrideExisting) {
            return;
        }
        $this->collUsoBateriasMontacargass = new PropelObjectCollection();
        $this->collUsoBateriasMontacargass->setModel('UsoBateriasMontacargas');
    }

    /**
     * Gets an array of UsoBateriasMontacargas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Montacargas is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     * @throws PropelException
     */
    public function getUsoBateriasMontacargass($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsoBateriasMontacargassPartial && !$this->isNew();
        if (null === $this->collUsoBateriasMontacargass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsoBateriasMontacargass) {
                // return empty collection
                $this->initUsoBateriasMontacargass();
            } else {
                $collUsoBateriasMontacargass = UsoBateriasMontacargasQuery::create(null, $criteria)
                    ->filterByMontacargas($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsoBateriasMontacargassPartial && count($collUsoBateriasMontacargass)) {
                      $this->initUsoBateriasMontacargass(false);

                      foreach ($collUsoBateriasMontacargass as $obj) {
                        if (false == $this->collUsoBateriasMontacargass->contains($obj)) {
                          $this->collUsoBateriasMontacargass->append($obj);
                        }
                      }

                      $this->collUsoBateriasMontacargassPartial = true;
                    }

                    $collUsoBateriasMontacargass->getInternalIterator()->rewind();

                    return $collUsoBateriasMontacargass;
                }

                if ($partial && $this->collUsoBateriasMontacargass) {
                    foreach ($this->collUsoBateriasMontacargass as $obj) {
                        if ($obj->isNew()) {
                            $collUsoBateriasMontacargass[] = $obj;
                        }
                    }
                }

                $this->collUsoBateriasMontacargass = $collUsoBateriasMontacargass;
                $this->collUsoBateriasMontacargassPartial = false;
            }
        }

        return $this->collUsoBateriasMontacargass;
    }

    /**
     * Sets a collection of UsoBateriasMontacargas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usoBateriasMontacargass A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Montacargas The current object (for fluent API support)
     */
    public function setUsoBateriasMontacargass(PropelCollection $usoBateriasMontacargass, PropelPDO $con = null)
    {
        $usoBateriasMontacargassToDelete = $this->getUsoBateriasMontacargass(new Criteria(), $con)->diff($usoBateriasMontacargass);


        $this->usoBateriasMontacargassScheduledForDeletion = $usoBateriasMontacargassToDelete;

        foreach ($usoBateriasMontacargassToDelete as $usoBateriasMontacargasRemoved) {
            $usoBateriasMontacargasRemoved->setMontacargas(null);
        }

        $this->collUsoBateriasMontacargass = null;
        foreach ($usoBateriasMontacargass as $usoBateriasMontacargas) {
            $this->addUsoBateriasMontacargas($usoBateriasMontacargas);
        }

        $this->collUsoBateriasMontacargass = $usoBateriasMontacargass;
        $this->collUsoBateriasMontacargassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UsoBateriasMontacargas objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UsoBateriasMontacargas objects.
     * @throws PropelException
     */
    public function countUsoBateriasMontacargass(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsoBateriasMontacargassPartial && !$this->isNew();
        if (null === $this->collUsoBateriasMontacargass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsoBateriasMontacargass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsoBateriasMontacargass());
            }
            $query = UsoBateriasMontacargasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMontacargas($this)
                ->count($con);
        }

        return count($this->collUsoBateriasMontacargass);
    }

    /**
     * Method called to associate a UsoBateriasMontacargas object to this object
     * through the UsoBateriasMontacargas foreign key attribute.
     *
     * @param    UsoBateriasMontacargas $l UsoBateriasMontacargas
     * @return Montacargas The current object (for fluent API support)
     */
    public function addUsoBateriasMontacargas(UsoBateriasMontacargas $l)
    {
        if ($this->collUsoBateriasMontacargass === null) {
            $this->initUsoBateriasMontacargass();
            $this->collUsoBateriasMontacargassPartial = true;
        }

        if (!in_array($l, $this->collUsoBateriasMontacargass->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUsoBateriasMontacargas($l);

            if ($this->usoBateriasMontacargassScheduledForDeletion and $this->usoBateriasMontacargassScheduledForDeletion->contains($l)) {
                $this->usoBateriasMontacargassScheduledForDeletion->remove($this->usoBateriasMontacargassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	UsoBateriasMontacargas $usoBateriasMontacargas The usoBateriasMontacargas object to add.
     */
    protected function doAddUsoBateriasMontacargas($usoBateriasMontacargas)
    {
        $this->collUsoBateriasMontacargass[]= $usoBateriasMontacargas;
        $usoBateriasMontacargas->setMontacargas($this);
    }

    /**
     * @param	UsoBateriasMontacargas $usoBateriasMontacargas The usoBateriasMontacargas object to remove.
     * @return Montacargas The current object (for fluent API support)
     */
    public function removeUsoBateriasMontacargas($usoBateriasMontacargas)
    {
        if ($this->getUsoBateriasMontacargass()->contains($usoBateriasMontacargas)) {
            $this->collUsoBateriasMontacargass->remove($this->collUsoBateriasMontacargass->search($usoBateriasMontacargas));
            if (null === $this->usoBateriasMontacargassScheduledForDeletion) {
                $this->usoBateriasMontacargassScheduledForDeletion = clone $this->collUsoBateriasMontacargass;
                $this->usoBateriasMontacargassScheduledForDeletion->clear();
            }
            $this->usoBateriasMontacargassScheduledForDeletion[]= clone $usoBateriasMontacargas;
            $usoBateriasMontacargas->setMontacargas(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Montacargas is new, it will return
     * an empty collection; or if this Montacargas has previously
     * been saved, it will retrieve related UsoBateriasMontacargass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Montacargas.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     */
    public function getUsoBateriasMontacargassJoinBaterias($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasMontacargasQuery::create(null, $criteria);
        $query->joinWith('Baterias', $join_behavior);

        return $this->getUsoBateriasMontacargass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Montacargas is new, it will return
     * an empty collection; or if this Montacargas has previously
     * been saved, it will retrieve related UsoBateriasMontacargass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Montacargas.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     */
    public function getUsoBateriasMontacargassJoinUcUsersRelatedByUsuarioEntrada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasMontacargasQuery::create(null, $criteria);
        $query->joinWith('UcUsersRelatedByUsuarioEntrada', $join_behavior);

        return $this->getUsoBateriasMontacargass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Montacargas is new, it will return
     * an empty collection; or if this Montacargas has previously
     * been saved, it will retrieve related UsoBateriasMontacargass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Montacargas.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     */
    public function getUsoBateriasMontacargassJoinUcUsersRelatedByUsuarioSalida($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasMontacargasQuery::create(null, $criteria);
        $query->joinWith('UcUsersRelatedByUsuarioSalida', $join_behavior);

        return $this->getUsoBateriasMontacargass($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idmontacargas = null;
        $this->idsucursal = null;
        $this->montacargas_modelo = null;
        $this->montacargas_marca = null;
        $this->montacargas_c = null;
        $this->montacargas_k = null;
        $this->montacargas_p = null;
        $this->montacargas_t = null;
        $this->montacargas_e = null;
        $this->montacargas_volts = null;
        $this->montacargas_amperaje = null;
        $this->montacargas_nombre = null;
        $this->montacargas_numserie = null;
        $this->montacargas_comprador = null;
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
            if ($this->collDeshabilitamcs) {
                foreach ($this->collDeshabilitamcs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsoBateriasMontacargass) {
                foreach ($this->collUsoBateriasMontacargass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSucursal instanceof Persistent) {
              $this->aSucursal->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDeshabilitamcs instanceof PropelCollection) {
            $this->collDeshabilitamcs->clearIterator();
        }
        $this->collDeshabilitamcs = null;
        if ($this->collUsoBateriasMontacargass instanceof PropelCollection) {
            $this->collUsoBateriasMontacargass->clearIterator();
        }
        $this->collUsoBateriasMontacargass = null;
        $this->aSucursal = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MontacargasPeer::DEFAULT_STRING_FORMAT);
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
