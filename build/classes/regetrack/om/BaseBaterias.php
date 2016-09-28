<?php


/**
 * Base class that represents a row from the 'baterias' table.
 *
 *
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseBaterias extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'BateriasPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BateriasPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idbaterias field.
     * @var        int
     */
    protected $idbaterias;

    /**
     * The value for the idsucursal field.
     * @var        int
     */
    protected $idsucursal;

    /**
     * The value for the baterias_modelo field.
     * @var        string
     */
    protected $baterias_modelo;

    /**
     * The value for the baterias_marca field.
     * @var        string
     */
    protected $baterias_marca;

    /**
     * The value for the baterias_c field.
     * @var        string
     */
    protected $baterias_c;

    /**
     * The value for the baterias_k field.
     * @var        string
     */
    protected $baterias_k;

    /**
     * The value for the baterias_p field.
     * @var        string
     */
    protected $baterias_p;

    /**
     * The value for the baterias_t field.
     * @var        string
     */
    protected $baterias_t;

    /**
     * The value for the baterias_e field.
     * @var        string
     */
    protected $baterias_e;

    /**
     * The value for the baterias_volts field.
     * @var        int
     */
    protected $baterias_volts;

    /**
     * The value for the baterias_amperaje field.
     * @var        int
     */
    protected $baterias_amperaje;

    /**
     * The value for the baterias_comprador field.
     * @var        string
     */
    protected $baterias_comprador;

    /**
     * The value for the baterias_nombre field.
     * @var        string
     */
    protected $baterias_nombre;

    /**
     * The value for the baterias_numserie field.
     * @var        string
     */
    protected $baterias_numserie;

    /**
     * The value for the baterias_ciclosmant field.
     * @var        int
     */
    protected $baterias_ciclosmant;

    /**
     * The value for the baterias_ciclosiniciales field.
     * @var        int
     */
    protected $baterias_ciclosiniciales;

    /**
     * @var        Sucursal
     */
    protected $aSucursal;

    /**
     * @var        PropelObjectCollection|Deshabilitabt[] Collection to store aggregation of Deshabilitabt objects.
     */
    protected $collDeshabilitabts;
    protected $collDeshabilitabtsPartial;

    /**
     * @var        PropelObjectCollection|Limbo[] Collection to store aggregation of Limbo objects.
     */
    protected $collLimbos;
    protected $collLimbosPartial;

    /**
     * @var        PropelObjectCollection|UsoBateriasBodega[] Collection to store aggregation of UsoBateriasBodega objects.
     */
    protected $collUsoBateriasBodegas;
    protected $collUsoBateriasBodegasPartial;

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
    protected $deshabilitabtsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $limbosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usoBateriasBodegasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usoBateriasMontacargassScheduledForDeletion = null;

    /**
     * Get the [idbaterias] column value.
     *
     * @return int
     */
    public function getIdbaterias()
    {

        return $this->idbaterias;
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
     * Get the [baterias_modelo] column value.
     *
     * @return string
     */
    public function getBateriasModelo()
    {

        return $this->baterias_modelo;
    }

    /**
     * Get the [baterias_marca] column value.
     *
     * @return string
     */
    public function getBateriasMarca()
    {

        return $this->baterias_marca;
    }

    /**
     * Get the [baterias_c] column value.
     *
     * @return string
     */
    public function getBateriasC()
    {

        return $this->baterias_c;
    }

    /**
     * Get the [baterias_k] column value.
     *
     * @return string
     */
    public function getBateriasK()
    {

        return $this->baterias_k;
    }

    /**
     * Get the [baterias_p] column value.
     *
     * @return string
     */
    public function getBateriasP()
    {

        return $this->baterias_p;
    }

    /**
     * Get the [baterias_t] column value.
     *
     * @return string
     */
    public function getBateriasT()
    {

        return $this->baterias_t;
    }

    /**
     * Get the [baterias_e] column value.
     *
     * @return string
     */
    public function getBateriasE()
    {

        return $this->baterias_e;
    }

    /**
     * Get the [baterias_volts] column value.
     *
     * @return int
     */
    public function getBateriasVolts()
    {

        return $this->baterias_volts;
    }

    /**
     * Get the [baterias_amperaje] column value.
     *
     * @return int
     */
    public function getBateriasAmperaje()
    {

        return $this->baterias_amperaje;
    }

    /**
     * Get the [baterias_comprador] column value.
     *
     * @return string
     */
    public function getBateriasComprador()
    {

        return $this->baterias_comprador;
    }

    /**
     * Get the [baterias_nombre] column value.
     *
     * @return string
     */
    public function getBateriasNombre()
    {

        return $this->baterias_nombre;
    }

    /**
     * Get the [baterias_numserie] column value.
     *
     * @return string
     */
    public function getBateriasNumserie()
    {

        return $this->baterias_numserie;
    }

    /**
     * Get the [baterias_ciclosmant] column value.
     *
     * @return int
     */
    public function getBateriasCiclosmant()
    {

        return $this->baterias_ciclosmant;
    }

    /**
     * Get the [baterias_ciclosiniciales] column value.
     *
     * @return int
     */
    public function getBateriasCiclosiniciales()
    {

        return $this->baterias_ciclosiniciales;
    }

    /**
     * Set the value of [idbaterias] column.
     *
     * @param  int $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setIdbaterias($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idbaterias !== $v) {
            $this->idbaterias = $v;
            $this->modifiedColumns[] = BateriasPeer::IDBATERIAS;
        }


        return $this;
    } // setIdbaterias()

    /**
     * Set the value of [idsucursal] column.
     *
     * @param  int $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setIdsucursal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idsucursal !== $v) {
            $this->idsucursal = $v;
            $this->modifiedColumns[] = BateriasPeer::IDSUCURSAL;
        }

        if ($this->aSucursal !== null && $this->aSucursal->getIdsucursal() !== $v) {
            $this->aSucursal = null;
        }


        return $this;
    } // setIdsucursal()

    /**
     * Set the value of [baterias_modelo] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasModelo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_modelo !== $v) {
            $this->baterias_modelo = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_MODELO;
        }


        return $this;
    } // setBateriasModelo()

    /**
     * Set the value of [baterias_marca] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasMarca($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_marca !== $v) {
            $this->baterias_marca = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_MARCA;
        }


        return $this;
    } // setBateriasMarca()

    /**
     * Set the value of [baterias_c] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasC($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_c !== $v) {
            $this->baterias_c = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_C;
        }


        return $this;
    } // setBateriasC()

    /**
     * Set the value of [baterias_k] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasK($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_k !== $v) {
            $this->baterias_k = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_K;
        }


        return $this;
    } // setBateriasK()

    /**
     * Set the value of [baterias_p] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasP($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_p !== $v) {
            $this->baterias_p = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_P;
        }


        return $this;
    } // setBateriasP()

    /**
     * Set the value of [baterias_t] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_t !== $v) {
            $this->baterias_t = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_T;
        }


        return $this;
    } // setBateriasT()

    /**
     * Set the value of [baterias_e] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasE($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_e !== $v) {
            $this->baterias_e = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_E;
        }


        return $this;
    } // setBateriasE()

    /**
     * Set the value of [baterias_volts] column.
     *
     * @param  int $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasVolts($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->baterias_volts !== $v) {
            $this->baterias_volts = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_VOLTS;
        }


        return $this;
    } // setBateriasVolts()

    /**
     * Set the value of [baterias_amperaje] column.
     *
     * @param  int $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasAmperaje($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->baterias_amperaje !== $v) {
            $this->baterias_amperaje = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_AMPERAJE;
        }


        return $this;
    } // setBateriasAmperaje()

    /**
     * Set the value of [baterias_comprador] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasComprador($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_comprador !== $v) {
            $this->baterias_comprador = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_COMPRADOR;
        }


        return $this;
    } // setBateriasComprador()

    /**
     * Set the value of [baterias_nombre] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_nombre !== $v) {
            $this->baterias_nombre = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_NOMBRE;
        }


        return $this;
    } // setBateriasNombre()

    /**
     * Set the value of [baterias_numserie] column.
     *
     * @param  string $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasNumserie($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baterias_numserie !== $v) {
            $this->baterias_numserie = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_NUMSERIE;
        }


        return $this;
    } // setBateriasNumserie()

    /**
     * Set the value of [baterias_ciclosmant] column.
     *
     * @param  int $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasCiclosmant($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->baterias_ciclosmant !== $v) {
            $this->baterias_ciclosmant = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_CICLOSMANT;
        }


        return $this;
    } // setBateriasCiclosmant()

    /**
     * Set the value of [baterias_ciclosiniciales] column.
     *
     * @param  int $v new value
     * @return Baterias The current object (for fluent API support)
     */
    public function setBateriasCiclosiniciales($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->baterias_ciclosiniciales !== $v) {
            $this->baterias_ciclosiniciales = $v;
            $this->modifiedColumns[] = BateriasPeer::BATERIAS_CICLOSINICIALES;
        }


        return $this;
    } // setBateriasCiclosiniciales()

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

            $this->idbaterias = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idsucursal = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->baterias_modelo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->baterias_marca = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->baterias_c = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->baterias_k = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->baterias_p = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->baterias_t = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->baterias_e = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->baterias_volts = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->baterias_amperaje = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->baterias_comprador = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->baterias_nombre = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->baterias_numserie = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->baterias_ciclosmant = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->baterias_ciclosiniciales = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 16; // 16 = BateriasPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Baterias object", $e);
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
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BateriasPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSucursal = null;
            $this->collDeshabilitabts = null;

            $this->collLimbos = null;

            $this->collUsoBateriasBodegas = null;

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
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BateriasQuery::create()
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
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BateriasPeer::addInstanceToPool($this);
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

            if ($this->deshabilitabtsScheduledForDeletion !== null) {
                if (!$this->deshabilitabtsScheduledForDeletion->isEmpty()) {
                    DeshabilitabtQuery::create()
                        ->filterByPrimaryKeys($this->deshabilitabtsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->deshabilitabtsScheduledForDeletion = null;
                }
            }

            if ($this->collDeshabilitabts !== null) {
                foreach ($this->collDeshabilitabts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->limbosScheduledForDeletion !== null) {
                if (!$this->limbosScheduledForDeletion->isEmpty()) {
                    LimboQuery::create()
                        ->filterByPrimaryKeys($this->limbosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->limbosScheduledForDeletion = null;
                }
            }

            if ($this->collLimbos !== null) {
                foreach ($this->collLimbos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usoBateriasBodegasScheduledForDeletion !== null) {
                if (!$this->usoBateriasBodegasScheduledForDeletion->isEmpty()) {
                    UsoBateriasBodegaQuery::create()
                        ->filterByPrimaryKeys($this->usoBateriasBodegasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->usoBateriasBodegasScheduledForDeletion = null;
                }
            }

            if ($this->collUsoBateriasBodegas !== null) {
                foreach ($this->collUsoBateriasBodegas as $referrerFK) {
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

        $this->modifiedColumns[] = BateriasPeer::IDBATERIAS;
        if (null !== $this->idbaterias) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BateriasPeer::IDBATERIAS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BateriasPeer::IDBATERIAS)) {
            $modifiedColumns[':p' . $index++]  = '`idbaterias`';
        }
        if ($this->isColumnModified(BateriasPeer::IDSUCURSAL)) {
            $modifiedColumns[':p' . $index++]  = '`idsucursal`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_MODELO)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_modelo`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_MARCA)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_marca`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_C)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_c`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_K)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_k`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_P)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_p`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_T)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_t`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_E)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_e`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_VOLTS)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_volts`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_AMPERAJE)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_amperaje`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_COMPRADOR)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_comprador`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_nombre`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_NUMSERIE)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_numserie`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_CICLOSMANT)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_ciclosmant`';
        }
        if ($this->isColumnModified(BateriasPeer::BATERIAS_CICLOSINICIALES)) {
            $modifiedColumns[':p' . $index++]  = '`baterias_ciclosiniciales`';
        }

        $sql = sprintf(
            'INSERT INTO `baterias` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idbaterias`':
                        $stmt->bindValue($identifier, $this->idbaterias, PDO::PARAM_INT);
                        break;
                    case '`idsucursal`':
                        $stmt->bindValue($identifier, $this->idsucursal, PDO::PARAM_INT);
                        break;
                    case '`baterias_modelo`':
                        $stmt->bindValue($identifier, $this->baterias_modelo, PDO::PARAM_STR);
                        break;
                    case '`baterias_marca`':
                        $stmt->bindValue($identifier, $this->baterias_marca, PDO::PARAM_STR);
                        break;
                    case '`baterias_c`':
                        $stmt->bindValue($identifier, $this->baterias_c, PDO::PARAM_STR);
                        break;
                    case '`baterias_k`':
                        $stmt->bindValue($identifier, $this->baterias_k, PDO::PARAM_STR);
                        break;
                    case '`baterias_p`':
                        $stmt->bindValue($identifier, $this->baterias_p, PDO::PARAM_STR);
                        break;
                    case '`baterias_t`':
                        $stmt->bindValue($identifier, $this->baterias_t, PDO::PARAM_STR);
                        break;
                    case '`baterias_e`':
                        $stmt->bindValue($identifier, $this->baterias_e, PDO::PARAM_STR);
                        break;
                    case '`baterias_volts`':
                        $stmt->bindValue($identifier, $this->baterias_volts, PDO::PARAM_INT);
                        break;
                    case '`baterias_amperaje`':
                        $stmt->bindValue($identifier, $this->baterias_amperaje, PDO::PARAM_INT);
                        break;
                    case '`baterias_comprador`':
                        $stmt->bindValue($identifier, $this->baterias_comprador, PDO::PARAM_STR);
                        break;
                    case '`baterias_nombre`':
                        $stmt->bindValue($identifier, $this->baterias_nombre, PDO::PARAM_STR);
                        break;
                    case '`baterias_numserie`':
                        $stmt->bindValue($identifier, $this->baterias_numserie, PDO::PARAM_STR);
                        break;
                    case '`baterias_ciclosmant`':
                        $stmt->bindValue($identifier, $this->baterias_ciclosmant, PDO::PARAM_INT);
                        break;
                    case '`baterias_ciclosiniciales`':
                        $stmt->bindValue($identifier, $this->baterias_ciclosiniciales, PDO::PARAM_INT);
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
        $this->setIdbaterias($pk);

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


            if (($retval = BateriasPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDeshabilitabts !== null) {
                    foreach ($this->collDeshabilitabts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collLimbos !== null) {
                    foreach ($this->collLimbos as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsoBateriasBodegas !== null) {
                    foreach ($this->collUsoBateriasBodegas as $referrerFK) {
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
        $pos = BateriasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdbaterias();
                break;
            case 1:
                return $this->getIdsucursal();
                break;
            case 2:
                return $this->getBateriasModelo();
                break;
            case 3:
                return $this->getBateriasMarca();
                break;
            case 4:
                return $this->getBateriasC();
                break;
            case 5:
                return $this->getBateriasK();
                break;
            case 6:
                return $this->getBateriasP();
                break;
            case 7:
                return $this->getBateriasT();
                break;
            case 8:
                return $this->getBateriasE();
                break;
            case 9:
                return $this->getBateriasVolts();
                break;
            case 10:
                return $this->getBateriasAmperaje();
                break;
            case 11:
                return $this->getBateriasComprador();
                break;
            case 12:
                return $this->getBateriasNombre();
                break;
            case 13:
                return $this->getBateriasNumserie();
                break;
            case 14:
                return $this->getBateriasCiclosmant();
                break;
            case 15:
                return $this->getBateriasCiclosiniciales();
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
        if (isset($alreadyDumpedObjects['Baterias'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Baterias'][$this->getPrimaryKey()] = true;
        $keys = BateriasPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdbaterias(),
            $keys[1] => $this->getIdsucursal(),
            $keys[2] => $this->getBateriasModelo(),
            $keys[3] => $this->getBateriasMarca(),
            $keys[4] => $this->getBateriasC(),
            $keys[5] => $this->getBateriasK(),
            $keys[6] => $this->getBateriasP(),
            $keys[7] => $this->getBateriasT(),
            $keys[8] => $this->getBateriasE(),
            $keys[9] => $this->getBateriasVolts(),
            $keys[10] => $this->getBateriasAmperaje(),
            $keys[11] => $this->getBateriasComprador(),
            $keys[12] => $this->getBateriasNombre(),
            $keys[13] => $this->getBateriasNumserie(),
            $keys[14] => $this->getBateriasCiclosmant(),
            $keys[15] => $this->getBateriasCiclosiniciales(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSucursal) {
                $result['Sucursal'] = $this->aSucursal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDeshabilitabts) {
                $result['Deshabilitabts'] = $this->collDeshabilitabts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLimbos) {
                $result['Limbos'] = $this->collLimbos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsoBateriasBodegas) {
                $result['UsoBateriasBodegas'] = $this->collUsoBateriasBodegas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BateriasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdbaterias($value);
                break;
            case 1:
                $this->setIdsucursal($value);
                break;
            case 2:
                $this->setBateriasModelo($value);
                break;
            case 3:
                $this->setBateriasMarca($value);
                break;
            case 4:
                $this->setBateriasC($value);
                break;
            case 5:
                $this->setBateriasK($value);
                break;
            case 6:
                $this->setBateriasP($value);
                break;
            case 7:
                $this->setBateriasT($value);
                break;
            case 8:
                $this->setBateriasE($value);
                break;
            case 9:
                $this->setBateriasVolts($value);
                break;
            case 10:
                $this->setBateriasAmperaje($value);
                break;
            case 11:
                $this->setBateriasComprador($value);
                break;
            case 12:
                $this->setBateriasNombre($value);
                break;
            case 13:
                $this->setBateriasNumserie($value);
                break;
            case 14:
                $this->setBateriasCiclosmant($value);
                break;
            case 15:
                $this->setBateriasCiclosiniciales($value);
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
        $keys = BateriasPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdbaterias($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdsucursal($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setBateriasModelo($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBateriasMarca($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBateriasC($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBateriasK($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setBateriasP($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setBateriasT($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setBateriasE($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setBateriasVolts($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setBateriasAmperaje($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setBateriasComprador($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setBateriasNombre($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setBateriasNumserie($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setBateriasCiclosmant($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setBateriasCiclosiniciales($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BateriasPeer::DATABASE_NAME);

        if ($this->isColumnModified(BateriasPeer::IDBATERIAS)) $criteria->add(BateriasPeer::IDBATERIAS, $this->idbaterias);
        if ($this->isColumnModified(BateriasPeer::IDSUCURSAL)) $criteria->add(BateriasPeer::IDSUCURSAL, $this->idsucursal);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_MODELO)) $criteria->add(BateriasPeer::BATERIAS_MODELO, $this->baterias_modelo);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_MARCA)) $criteria->add(BateriasPeer::BATERIAS_MARCA, $this->baterias_marca);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_C)) $criteria->add(BateriasPeer::BATERIAS_C, $this->baterias_c);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_K)) $criteria->add(BateriasPeer::BATERIAS_K, $this->baterias_k);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_P)) $criteria->add(BateriasPeer::BATERIAS_P, $this->baterias_p);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_T)) $criteria->add(BateriasPeer::BATERIAS_T, $this->baterias_t);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_E)) $criteria->add(BateriasPeer::BATERIAS_E, $this->baterias_e);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_VOLTS)) $criteria->add(BateriasPeer::BATERIAS_VOLTS, $this->baterias_volts);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_AMPERAJE)) $criteria->add(BateriasPeer::BATERIAS_AMPERAJE, $this->baterias_amperaje);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_COMPRADOR)) $criteria->add(BateriasPeer::BATERIAS_COMPRADOR, $this->baterias_comprador);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_NOMBRE)) $criteria->add(BateriasPeer::BATERIAS_NOMBRE, $this->baterias_nombre);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_NUMSERIE)) $criteria->add(BateriasPeer::BATERIAS_NUMSERIE, $this->baterias_numserie);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_CICLOSMANT)) $criteria->add(BateriasPeer::BATERIAS_CICLOSMANT, $this->baterias_ciclosmant);
        if ($this->isColumnModified(BateriasPeer::BATERIAS_CICLOSINICIALES)) $criteria->add(BateriasPeer::BATERIAS_CICLOSINICIALES, $this->baterias_ciclosiniciales);

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
        $criteria = new Criteria(BateriasPeer::DATABASE_NAME);
        $criteria->add(BateriasPeer::IDBATERIAS, $this->idbaterias);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdbaterias();
    }

    /**
     * Generic method to set the primary key (idbaterias column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdbaterias($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdbaterias();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Baterias (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdsucursal($this->getIdsucursal());
        $copyObj->setBateriasModelo($this->getBateriasModelo());
        $copyObj->setBateriasMarca($this->getBateriasMarca());
        $copyObj->setBateriasC($this->getBateriasC());
        $copyObj->setBateriasK($this->getBateriasK());
        $copyObj->setBateriasP($this->getBateriasP());
        $copyObj->setBateriasT($this->getBateriasT());
        $copyObj->setBateriasE($this->getBateriasE());
        $copyObj->setBateriasVolts($this->getBateriasVolts());
        $copyObj->setBateriasAmperaje($this->getBateriasAmperaje());
        $copyObj->setBateriasComprador($this->getBateriasComprador());
        $copyObj->setBateriasNombre($this->getBateriasNombre());
        $copyObj->setBateriasNumserie($this->getBateriasNumserie());
        $copyObj->setBateriasCiclosmant($this->getBateriasCiclosmant());
        $copyObj->setBateriasCiclosiniciales($this->getBateriasCiclosiniciales());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDeshabilitabts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeshabilitabt($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLimbos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLimbo($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsoBateriasBodegas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsoBateriasBodega($relObj->copy($deepCopy));
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
            $copyObj->setIdbaterias(NULL); // this is a auto-increment column, so set to default value
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
     * @return Baterias Clone of current object.
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
     * @return BateriasPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BateriasPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sucursal object.
     *
     * @param                  Sucursal $v
     * @return Baterias The current object (for fluent API support)
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
            $v->addBaterias($this);
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
                $this->aSucursal->addBateriass($this);
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
        if ('Deshabilitabt' == $relationName) {
            $this->initDeshabilitabts();
        }
        if ('Limbo' == $relationName) {
            $this->initLimbos();
        }
        if ('UsoBateriasBodega' == $relationName) {
            $this->initUsoBateriasBodegas();
        }
        if ('UsoBateriasMontacargas' == $relationName) {
            $this->initUsoBateriasMontacargass();
        }
    }

    /**
     * Clears out the collDeshabilitabts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Baterias The current object (for fluent API support)
     * @see        addDeshabilitabts()
     */
    public function clearDeshabilitabts()
    {
        $this->collDeshabilitabts = null; // important to set this to null since that means it is uninitialized
        $this->collDeshabilitabtsPartial = null;

        return $this;
    }

    /**
     * reset is the collDeshabilitabts collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeshabilitabts($v = true)
    {
        $this->collDeshabilitabtsPartial = $v;
    }

    /**
     * Initializes the collDeshabilitabts collection.
     *
     * By default this just sets the collDeshabilitabts collection to an empty array (like clearcollDeshabilitabts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeshabilitabts($overrideExisting = true)
    {
        if (null !== $this->collDeshabilitabts && !$overrideExisting) {
            return;
        }
        $this->collDeshabilitabts = new PropelObjectCollection();
        $this->collDeshabilitabts->setModel('Deshabilitabt');
    }

    /**
     * Gets an array of Deshabilitabt objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Baterias is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Deshabilitabt[] List of Deshabilitabt objects
     * @throws PropelException
     */
    public function getDeshabilitabts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitabtsPartial && !$this->isNew();
        if (null === $this->collDeshabilitabts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitabts) {
                // return empty collection
                $this->initDeshabilitabts();
            } else {
                $collDeshabilitabts = DeshabilitabtQuery::create(null, $criteria)
                    ->filterByBaterias($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeshabilitabtsPartial && count($collDeshabilitabts)) {
                      $this->initDeshabilitabts(false);

                      foreach ($collDeshabilitabts as $obj) {
                        if (false == $this->collDeshabilitabts->contains($obj)) {
                          $this->collDeshabilitabts->append($obj);
                        }
                      }

                      $this->collDeshabilitabtsPartial = true;
                    }

                    $collDeshabilitabts->getInternalIterator()->rewind();

                    return $collDeshabilitabts;
                }

                if ($partial && $this->collDeshabilitabts) {
                    foreach ($this->collDeshabilitabts as $obj) {
                        if ($obj->isNew()) {
                            $collDeshabilitabts[] = $obj;
                        }
                    }
                }

                $this->collDeshabilitabts = $collDeshabilitabts;
                $this->collDeshabilitabtsPartial = false;
            }
        }

        return $this->collDeshabilitabts;
    }

    /**
     * Sets a collection of Deshabilitabt objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deshabilitabts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Baterias The current object (for fluent API support)
     */
    public function setDeshabilitabts(PropelCollection $deshabilitabts, PropelPDO $con = null)
    {
        $deshabilitabtsToDelete = $this->getDeshabilitabts(new Criteria(), $con)->diff($deshabilitabts);


        $this->deshabilitabtsScheduledForDeletion = $deshabilitabtsToDelete;

        foreach ($deshabilitabtsToDelete as $deshabilitabtRemoved) {
            $deshabilitabtRemoved->setBaterias(null);
        }

        $this->collDeshabilitabts = null;
        foreach ($deshabilitabts as $deshabilitabt) {
            $this->addDeshabilitabt($deshabilitabt);
        }

        $this->collDeshabilitabts = $deshabilitabts;
        $this->collDeshabilitabtsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Deshabilitabt objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Deshabilitabt objects.
     * @throws PropelException
     */
    public function countDeshabilitabts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitabtsPartial && !$this->isNew();
        if (null === $this->collDeshabilitabts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitabts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDeshabilitabts());
            }
            $query = DeshabilitabtQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBaterias($this)
                ->count($con);
        }

        return count($this->collDeshabilitabts);
    }

    /**
     * Method called to associate a Deshabilitabt object to this object
     * through the Deshabilitabt foreign key attribute.
     *
     * @param    Deshabilitabt $l Deshabilitabt
     * @return Baterias The current object (for fluent API support)
     */
    public function addDeshabilitabt(Deshabilitabt $l)
    {
        if ($this->collDeshabilitabts === null) {
            $this->initDeshabilitabts();
            $this->collDeshabilitabtsPartial = true;
        }

        if (!in_array($l, $this->collDeshabilitabts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeshabilitabt($l);

            if ($this->deshabilitabtsScheduledForDeletion and $this->deshabilitabtsScheduledForDeletion->contains($l)) {
                $this->deshabilitabtsScheduledForDeletion->remove($this->deshabilitabtsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Deshabilitabt $deshabilitabt The deshabilitabt object to add.
     */
    protected function doAddDeshabilitabt($deshabilitabt)
    {
        $this->collDeshabilitabts[]= $deshabilitabt;
        $deshabilitabt->setBaterias($this);
    }

    /**
     * @param	Deshabilitabt $deshabilitabt The deshabilitabt object to remove.
     * @return Baterias The current object (for fluent API support)
     */
    public function removeDeshabilitabt($deshabilitabt)
    {
        if ($this->getDeshabilitabts()->contains($deshabilitabt)) {
            $this->collDeshabilitabts->remove($this->collDeshabilitabts->search($deshabilitabt));
            if (null === $this->deshabilitabtsScheduledForDeletion) {
                $this->deshabilitabtsScheduledForDeletion = clone $this->collDeshabilitabts;
                $this->deshabilitabtsScheduledForDeletion->clear();
            }
            $this->deshabilitabtsScheduledForDeletion[]= clone $deshabilitabt;
            $deshabilitabt->setBaterias(null);
        }

        return $this;
    }

    /**
     * Clears out the collLimbos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Baterias The current object (for fluent API support)
     * @see        addLimbos()
     */
    public function clearLimbos()
    {
        $this->collLimbos = null; // important to set this to null since that means it is uninitialized
        $this->collLimbosPartial = null;

        return $this;
    }

    /**
     * reset is the collLimbos collection loaded partially
     *
     * @return void
     */
    public function resetPartialLimbos($v = true)
    {
        $this->collLimbosPartial = $v;
    }

    /**
     * Initializes the collLimbos collection.
     *
     * By default this just sets the collLimbos collection to an empty array (like clearcollLimbos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLimbos($overrideExisting = true)
    {
        if (null !== $this->collLimbos && !$overrideExisting) {
            return;
        }
        $this->collLimbos = new PropelObjectCollection();
        $this->collLimbos->setModel('Limbo');
    }

    /**
     * Gets an array of Limbo objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Baterias is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Limbo[] List of Limbo objects
     * @throws PropelException
     */
    public function getLimbos($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLimbosPartial && !$this->isNew();
        if (null === $this->collLimbos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLimbos) {
                // return empty collection
                $this->initLimbos();
            } else {
                $collLimbos = LimboQuery::create(null, $criteria)
                    ->filterByBaterias($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLimbosPartial && count($collLimbos)) {
                      $this->initLimbos(false);

                      foreach ($collLimbos as $obj) {
                        if (false == $this->collLimbos->contains($obj)) {
                          $this->collLimbos->append($obj);
                        }
                      }

                      $this->collLimbosPartial = true;
                    }

                    $collLimbos->getInternalIterator()->rewind();

                    return $collLimbos;
                }

                if ($partial && $this->collLimbos) {
                    foreach ($this->collLimbos as $obj) {
                        if ($obj->isNew()) {
                            $collLimbos[] = $obj;
                        }
                    }
                }

                $this->collLimbos = $collLimbos;
                $this->collLimbosPartial = false;
            }
        }

        return $this->collLimbos;
    }

    /**
     * Sets a collection of Limbo objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $limbos A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Baterias The current object (for fluent API support)
     */
    public function setLimbos(PropelCollection $limbos, PropelPDO $con = null)
    {
        $limbosToDelete = $this->getLimbos(new Criteria(), $con)->diff($limbos);


        $this->limbosScheduledForDeletion = $limbosToDelete;

        foreach ($limbosToDelete as $limboRemoved) {
            $limboRemoved->setBaterias(null);
        }

        $this->collLimbos = null;
        foreach ($limbos as $limbo) {
            $this->addLimbo($limbo);
        }

        $this->collLimbos = $limbos;
        $this->collLimbosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Limbo objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Limbo objects.
     * @throws PropelException
     */
    public function countLimbos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLimbosPartial && !$this->isNew();
        if (null === $this->collLimbos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLimbos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getLimbos());
            }
            $query = LimboQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBaterias($this)
                ->count($con);
        }

        return count($this->collLimbos);
    }

    /**
     * Method called to associate a Limbo object to this object
     * through the Limbo foreign key attribute.
     *
     * @param    Limbo $l Limbo
     * @return Baterias The current object (for fluent API support)
     */
    public function addLimbo(Limbo $l)
    {
        if ($this->collLimbos === null) {
            $this->initLimbos();
            $this->collLimbosPartial = true;
        }

        if (!in_array($l, $this->collLimbos->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLimbo($l);

            if ($this->limbosScheduledForDeletion and $this->limbosScheduledForDeletion->contains($l)) {
                $this->limbosScheduledForDeletion->remove($this->limbosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Limbo $limbo The limbo object to add.
     */
    protected function doAddLimbo($limbo)
    {
        $this->collLimbos[]= $limbo;
        $limbo->setBaterias($this);
    }

    /**
     * @param	Limbo $limbo The limbo object to remove.
     * @return Baterias The current object (for fluent API support)
     */
    public function removeLimbo($limbo)
    {
        if ($this->getLimbos()->contains($limbo)) {
            $this->collLimbos->remove($this->collLimbos->search($limbo));
            if (null === $this->limbosScheduledForDeletion) {
                $this->limbosScheduledForDeletion = clone $this->collLimbos;
                $this->limbosScheduledForDeletion->clear();
            }
            $this->limbosScheduledForDeletion[]= clone $limbo;
            $limbo->setBaterias(null);
        }

        return $this;
    }

    /**
     * Clears out the collUsoBateriasBodegas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Baterias The current object (for fluent API support)
     * @see        addUsoBateriasBodegas()
     */
    public function clearUsoBateriasBodegas()
    {
        $this->collUsoBateriasBodegas = null; // important to set this to null since that means it is uninitialized
        $this->collUsoBateriasBodegasPartial = null;

        return $this;
    }

    /**
     * reset is the collUsoBateriasBodegas collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsoBateriasBodegas($v = true)
    {
        $this->collUsoBateriasBodegasPartial = $v;
    }

    /**
     * Initializes the collUsoBateriasBodegas collection.
     *
     * By default this just sets the collUsoBateriasBodegas collection to an empty array (like clearcollUsoBateriasBodegas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsoBateriasBodegas($overrideExisting = true)
    {
        if (null !== $this->collUsoBateriasBodegas && !$overrideExisting) {
            return;
        }
        $this->collUsoBateriasBodegas = new PropelObjectCollection();
        $this->collUsoBateriasBodegas->setModel('UsoBateriasBodega');
    }

    /**
     * Gets an array of UsoBateriasBodega objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Baterias is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UsoBateriasBodega[] List of UsoBateriasBodega objects
     * @throws PropelException
     */
    public function getUsoBateriasBodegas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsoBateriasBodegasPartial && !$this->isNew();
        if (null === $this->collUsoBateriasBodegas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsoBateriasBodegas) {
                // return empty collection
                $this->initUsoBateriasBodegas();
            } else {
                $collUsoBateriasBodegas = UsoBateriasBodegaQuery::create(null, $criteria)
                    ->filterByBaterias($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsoBateriasBodegasPartial && count($collUsoBateriasBodegas)) {
                      $this->initUsoBateriasBodegas(false);

                      foreach ($collUsoBateriasBodegas as $obj) {
                        if (false == $this->collUsoBateriasBodegas->contains($obj)) {
                          $this->collUsoBateriasBodegas->append($obj);
                        }
                      }

                      $this->collUsoBateriasBodegasPartial = true;
                    }

                    $collUsoBateriasBodegas->getInternalIterator()->rewind();

                    return $collUsoBateriasBodegas;
                }

                if ($partial && $this->collUsoBateriasBodegas) {
                    foreach ($this->collUsoBateriasBodegas as $obj) {
                        if ($obj->isNew()) {
                            $collUsoBateriasBodegas[] = $obj;
                        }
                    }
                }

                $this->collUsoBateriasBodegas = $collUsoBateriasBodegas;
                $this->collUsoBateriasBodegasPartial = false;
            }
        }

        return $this->collUsoBateriasBodegas;
    }

    /**
     * Sets a collection of UsoBateriasBodega objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usoBateriasBodegas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Baterias The current object (for fluent API support)
     */
    public function setUsoBateriasBodegas(PropelCollection $usoBateriasBodegas, PropelPDO $con = null)
    {
        $usoBateriasBodegasToDelete = $this->getUsoBateriasBodegas(new Criteria(), $con)->diff($usoBateriasBodegas);


        $this->usoBateriasBodegasScheduledForDeletion = $usoBateriasBodegasToDelete;

        foreach ($usoBateriasBodegasToDelete as $usoBateriasBodegaRemoved) {
            $usoBateriasBodegaRemoved->setBaterias(null);
        }

        $this->collUsoBateriasBodegas = null;
        foreach ($usoBateriasBodegas as $usoBateriasBodega) {
            $this->addUsoBateriasBodega($usoBateriasBodega);
        }

        $this->collUsoBateriasBodegas = $usoBateriasBodegas;
        $this->collUsoBateriasBodegasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UsoBateriasBodega objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UsoBateriasBodega objects.
     * @throws PropelException
     */
    public function countUsoBateriasBodegas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsoBateriasBodegasPartial && !$this->isNew();
        if (null === $this->collUsoBateriasBodegas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsoBateriasBodegas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsoBateriasBodegas());
            }
            $query = UsoBateriasBodegaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBaterias($this)
                ->count($con);
        }

        return count($this->collUsoBateriasBodegas);
    }

    /**
     * Method called to associate a UsoBateriasBodega object to this object
     * through the UsoBateriasBodega foreign key attribute.
     *
     * @param    UsoBateriasBodega $l UsoBateriasBodega
     * @return Baterias The current object (for fluent API support)
     */
    public function addUsoBateriasBodega(UsoBateriasBodega $l)
    {
        if ($this->collUsoBateriasBodegas === null) {
            $this->initUsoBateriasBodegas();
            $this->collUsoBateriasBodegasPartial = true;
        }

        if (!in_array($l, $this->collUsoBateriasBodegas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUsoBateriasBodega($l);

            if ($this->usoBateriasBodegasScheduledForDeletion and $this->usoBateriasBodegasScheduledForDeletion->contains($l)) {
                $this->usoBateriasBodegasScheduledForDeletion->remove($this->usoBateriasBodegasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	UsoBateriasBodega $usoBateriasBodega The usoBateriasBodega object to add.
     */
    protected function doAddUsoBateriasBodega($usoBateriasBodega)
    {
        $this->collUsoBateriasBodegas[]= $usoBateriasBodega;
        $usoBateriasBodega->setBaterias($this);
    }

    /**
     * @param	UsoBateriasBodega $usoBateriasBodega The usoBateriasBodega object to remove.
     * @return Baterias The current object (for fluent API support)
     */
    public function removeUsoBateriasBodega($usoBateriasBodega)
    {
        if ($this->getUsoBateriasBodegas()->contains($usoBateriasBodega)) {
            $this->collUsoBateriasBodegas->remove($this->collUsoBateriasBodegas->search($usoBateriasBodega));
            if (null === $this->usoBateriasBodegasScheduledForDeletion) {
                $this->usoBateriasBodegasScheduledForDeletion = clone $this->collUsoBateriasBodegas;
                $this->usoBateriasBodegasScheduledForDeletion->clear();
            }
            $this->usoBateriasBodegasScheduledForDeletion[]= clone $usoBateriasBodega;
            $usoBateriasBodega->setBaterias(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Baterias is new, it will return
     * an empty collection; or if this Baterias has previously
     * been saved, it will retrieve related UsoBateriasBodegas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Baterias.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasBodega[] List of UsoBateriasBodega objects
     */
    public function getUsoBateriasBodegasJoinBodegas($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasBodegaQuery::create(null, $criteria);
        $query->joinWith('Bodegas', $join_behavior);

        return $this->getUsoBateriasBodegas($query, $con);
    }

    /**
     * Clears out the collUsoBateriasMontacargass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Baterias The current object (for fluent API support)
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
     * If this Baterias is new, it will return
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
                    ->filterByBaterias($this)
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
     * @return Baterias The current object (for fluent API support)
     */
    public function setUsoBateriasMontacargass(PropelCollection $usoBateriasMontacargass, PropelPDO $con = null)
    {
        $usoBateriasMontacargassToDelete = $this->getUsoBateriasMontacargass(new Criteria(), $con)->diff($usoBateriasMontacargass);


        $this->usoBateriasMontacargassScheduledForDeletion = $usoBateriasMontacargassToDelete;

        foreach ($usoBateriasMontacargassToDelete as $usoBateriasMontacargasRemoved) {
            $usoBateriasMontacargasRemoved->setBaterias(null);
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
                ->filterByBaterias($this)
                ->count($con);
        }

        return count($this->collUsoBateriasMontacargass);
    }

    /**
     * Method called to associate a UsoBateriasMontacargas object to this object
     * through the UsoBateriasMontacargas foreign key attribute.
     *
     * @param    UsoBateriasMontacargas $l UsoBateriasMontacargas
     * @return Baterias The current object (for fluent API support)
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
        $usoBateriasMontacargas->setBaterias($this);
    }

    /**
     * @param	UsoBateriasMontacargas $usoBateriasMontacargas The usoBateriasMontacargas object to remove.
     * @return Baterias The current object (for fluent API support)
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
            $usoBateriasMontacargas->setBaterias(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Baterias is new, it will return
     * an empty collection; or if this Baterias has previously
     * been saved, it will retrieve related UsoBateriasMontacargass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Baterias.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     */
    public function getUsoBateriasMontacargassJoinMontacargas($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasMontacargasQuery::create(null, $criteria);
        $query->joinWith('Montacargas', $join_behavior);

        return $this->getUsoBateriasMontacargass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Baterias is new, it will return
     * an empty collection; or if this Baterias has previously
     * been saved, it will retrieve related UsoBateriasMontacargass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Baterias.
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
     * Otherwise if this Baterias is new, it will return
     * an empty collection; or if this Baterias has previously
     * been saved, it will retrieve related UsoBateriasMontacargass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Baterias.
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
        $this->idbaterias = null;
        $this->idsucursal = null;
        $this->baterias_modelo = null;
        $this->baterias_marca = null;
        $this->baterias_c = null;
        $this->baterias_k = null;
        $this->baterias_p = null;
        $this->baterias_t = null;
        $this->baterias_e = null;
        $this->baterias_volts = null;
        $this->baterias_amperaje = null;
        $this->baterias_comprador = null;
        $this->baterias_nombre = null;
        $this->baterias_numserie = null;
        $this->baterias_ciclosmant = null;
        $this->baterias_ciclosiniciales = null;
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
            if ($this->collDeshabilitabts) {
                foreach ($this->collDeshabilitabts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLimbos) {
                foreach ($this->collLimbos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsoBateriasBodegas) {
                foreach ($this->collUsoBateriasBodegas as $o) {
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

        if ($this->collDeshabilitabts instanceof PropelCollection) {
            $this->collDeshabilitabts->clearIterator();
        }
        $this->collDeshabilitabts = null;
        if ($this->collLimbos instanceof PropelCollection) {
            $this->collLimbos->clearIterator();
        }
        $this->collLimbos = null;
        if ($this->collUsoBateriasBodegas instanceof PropelCollection) {
            $this->collUsoBateriasBodegas->clearIterator();
        }
        $this->collUsoBateriasBodegas = null;
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
        return (string) $this->exportTo(BateriasPeer::DEFAULT_STRING_FORMAT);
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
