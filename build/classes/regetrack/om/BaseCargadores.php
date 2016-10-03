<?php


/**
 * Base class that represents a row from the 'cargadores' table.
 *
 *
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseCargadores extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CargadoresPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CargadoresPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idcargadores field.
     * @var        int
     */
    protected $idcargadores;

    /**
     * The value for the idsucursal field.
     * @var        int
     */
    protected $idsucursal;

    /**
     * The value for the cargadores_modelo field.
     * @var        string
     */
    protected $cargadores_modelo;

    /**
     * The value for the cargadores_marca field.
     * @var        string
     */
    protected $cargadores_marca;

    /**
     * The value for the cargadores_e field.
     * @var        string
     */
    protected $cargadores_e;

    /**
     * The value for the cargadores_volts field.
     * @var        int
     */
    protected $cargadores_volts;

    /**
     * The value for the cargadores_amperaje field.
     * @var        int
     */
    protected $cargadores_amperaje;

    /**
     * The value for the cargadores_comprador field.
     * @var        string
     */
    protected $cargadores_comprador;

    /**
     * The value for the cargadores_nombre field.
     * @var        string
     */
    protected $cargadores_nombre;

    /**
     * The value for the cargadores_numserie field.
     * @var        string
     */
    protected $cargadores_numserie;

    /**
     * The value for the cargadores_tipo field.
     * Note: this column has a database default value of: 'Cargador'
     * @var        string
     */
    protected $cargadores_tipo;

    /**
     * @var        Sucursal
     */
    protected $aSucursal;

    /**
     * @var        PropelObjectCollection|Bodegas[] Collection to store aggregation of Bodegas objects.
     */
    protected $collBodegass;
    protected $collBodegassPartial;

    /**
     * @var        PropelObjectCollection|CargadoresBaterias[] Collection to store aggregation of CargadoresBaterias objects.
     */
    protected $collCargadoresBateriass;
    protected $collCargadoresBateriassPartial;

    /**
     * @var        PropelObjectCollection|Deshabilitacg[] Collection to store aggregation of Deshabilitacg objects.
     */
    protected $collDeshabilitacgs;
    protected $collDeshabilitacgsPartial;

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
    protected $bodegassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cargadoresBateriassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $deshabilitacgsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->cargadores_tipo = 'Cargador';
    }

    /**
     * Initializes internal state of BaseCargadores object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idcargadores] column value.
     *
     * @return int
     */
    public function getIdcargadores()
    {

        return $this->idcargadores;
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
     * Get the [cargadores_modelo] column value.
     *
     * @return string
     */
    public function getCargadoresModelo()
    {

        return $this->cargadores_modelo;
    }

    /**
     * Get the [cargadores_marca] column value.
     *
     * @return string
     */
    public function getCargadoresMarca()
    {

        return $this->cargadores_marca;
    }

    /**
     * Get the [cargadores_e] column value.
     *
     * @return string
     */
    public function getCargadoresE()
    {

        return $this->cargadores_e;
    }

    /**
     * Get the [cargadores_volts] column value.
     *
     * @return int
     */
    public function getCargadoresVolts()
    {

        return $this->cargadores_volts;
    }

    /**
     * Get the [cargadores_amperaje] column value.
     *
     * @return int
     */
    public function getCargadoresAmperaje()
    {

        return $this->cargadores_amperaje;
    }

    /**
     * Get the [cargadores_comprador] column value.
     *
     * @return string
     */
    public function getCargadoresComprador()
    {

        return $this->cargadores_comprador;
    }

    /**
     * Get the [cargadores_nombre] column value.
     *
     * @return string
     */
    public function getCargadoresNombre()
    {

        return $this->cargadores_nombre;
    }

    /**
     * Get the [cargadores_numserie] column value.
     *
     * @return string
     */
    public function getCargadoresNumserie()
    {

        return $this->cargadores_numserie;
    }

    /**
     * Get the [cargadores_tipo] column value.
     *
     * @return string
     */
    public function getCargadoresTipo()
    {

        return $this->cargadores_tipo;
    }

    /**
     * Set the value of [idcargadores] column.
     *
     * @param  int $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setIdcargadores($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcargadores !== $v) {
            $this->idcargadores = $v;
            $this->modifiedColumns[] = CargadoresPeer::IDCARGADORES;
        }


        return $this;
    } // setIdcargadores()

    /**
     * Set the value of [idsucursal] column.
     *
     * @param  int $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setIdsucursal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idsucursal !== $v) {
            $this->idsucursal = $v;
            $this->modifiedColumns[] = CargadoresPeer::IDSUCURSAL;
        }

        if ($this->aSucursal !== null && $this->aSucursal->getIdsucursal() !== $v) {
            $this->aSucursal = null;
        }


        return $this;
    } // setIdsucursal()

    /**
     * Set the value of [cargadores_modelo] column.
     *
     * @param  string $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresModelo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cargadores_modelo !== $v) {
            $this->cargadores_modelo = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_MODELO;
        }


        return $this;
    } // setCargadoresModelo()

    /**
     * Set the value of [cargadores_marca] column.
     *
     * @param  string $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresMarca($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cargadores_marca !== $v) {
            $this->cargadores_marca = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_MARCA;
        }


        return $this;
    } // setCargadoresMarca()

    /**
     * Set the value of [cargadores_e] column.
     *
     * @param  string $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresE($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cargadores_e !== $v) {
            $this->cargadores_e = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_E;
        }


        return $this;
    } // setCargadoresE()

    /**
     * Set the value of [cargadores_volts] column.
     *
     * @param  int $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresVolts($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->cargadores_volts !== $v) {
            $this->cargadores_volts = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_VOLTS;
        }


        return $this;
    } // setCargadoresVolts()

    /**
     * Set the value of [cargadores_amperaje] column.
     *
     * @param  int $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresAmperaje($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->cargadores_amperaje !== $v) {
            $this->cargadores_amperaje = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_AMPERAJE;
        }


        return $this;
    } // setCargadoresAmperaje()

    /**
     * Set the value of [cargadores_comprador] column.
     *
     * @param  string $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresComprador($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cargadores_comprador !== $v) {
            $this->cargadores_comprador = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_COMPRADOR;
        }


        return $this;
    } // setCargadoresComprador()

    /**
     * Set the value of [cargadores_nombre] column.
     *
     * @param  string $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cargadores_nombre !== $v) {
            $this->cargadores_nombre = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_NOMBRE;
        }


        return $this;
    } // setCargadoresNombre()

    /**
     * Set the value of [cargadores_numserie] column.
     *
     * @param  string $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresNumserie($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cargadores_numserie !== $v) {
            $this->cargadores_numserie = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_NUMSERIE;
        }


        return $this;
    } // setCargadoresNumserie()

    /**
     * Set the value of [cargadores_tipo] column.
     *
     * @param  string $v new value
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresTipo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cargadores_tipo !== $v) {
            $this->cargadores_tipo = $v;
            $this->modifiedColumns[] = CargadoresPeer::CARGADORES_TIPO;
        }


        return $this;
    } // setCargadoresTipo()

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
            if ($this->cargadores_tipo !== 'Cargador') {
                return false;
            }

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

            $this->idcargadores = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idsucursal = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->cargadores_modelo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->cargadores_marca = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->cargadores_e = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->cargadores_volts = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->cargadores_amperaje = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->cargadores_comprador = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->cargadores_nombre = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->cargadores_numserie = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->cargadores_tipo = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 11; // 11 = CargadoresPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Cargadores object", $e);
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
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CargadoresPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSucursal = null;
            $this->collBodegass = null;

            $this->collCargadoresBateriass = null;

            $this->collDeshabilitacgs = null;

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
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CargadoresQuery::create()
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
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                CargadoresPeer::addInstanceToPool($this);
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

            if ($this->bodegassScheduledForDeletion !== null) {
                if (!$this->bodegassScheduledForDeletion->isEmpty()) {
                    BodegasQuery::create()
                        ->filterByPrimaryKeys($this->bodegassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bodegassScheduledForDeletion = null;
                }
            }

            if ($this->collBodegass !== null) {
                foreach ($this->collBodegass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cargadoresBateriassScheduledForDeletion !== null) {
                if (!$this->cargadoresBateriassScheduledForDeletion->isEmpty()) {
                    CargadoresBateriasQuery::create()
                        ->filterByPrimaryKeys($this->cargadoresBateriassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cargadoresBateriassScheduledForDeletion = null;
                }
            }

            if ($this->collCargadoresBateriass !== null) {
                foreach ($this->collCargadoresBateriass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->deshabilitacgsScheduledForDeletion !== null) {
                if (!$this->deshabilitacgsScheduledForDeletion->isEmpty()) {
                    DeshabilitacgQuery::create()
                        ->filterByPrimaryKeys($this->deshabilitacgsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->deshabilitacgsScheduledForDeletion = null;
                }
            }

            if ($this->collDeshabilitacgs !== null) {
                foreach ($this->collDeshabilitacgs as $referrerFK) {
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

        $this->modifiedColumns[] = CargadoresPeer::IDCARGADORES;
        if (null !== $this->idcargadores) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CargadoresPeer::IDCARGADORES . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CargadoresPeer::IDCARGADORES)) {
            $modifiedColumns[':p' . $index++]  = '`idcargadores`';
        }
        if ($this->isColumnModified(CargadoresPeer::IDSUCURSAL)) {
            $modifiedColumns[':p' . $index++]  = '`idsucursal`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_MODELO)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_modelo`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_MARCA)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_marca`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_E)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_e`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_VOLTS)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_volts`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_AMPERAJE)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_amperaje`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_COMPRADOR)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_comprador`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_nombre`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_NUMSERIE)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_numserie`';
        }
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_TIPO)) {
            $modifiedColumns[':p' . $index++]  = '`cargadores_tipo`';
        }

        $sql = sprintf(
            'INSERT INTO `cargadores` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idcargadores`':
                        $stmt->bindValue($identifier, $this->idcargadores, PDO::PARAM_INT);
                        break;
                    case '`idsucursal`':
                        $stmt->bindValue($identifier, $this->idsucursal, PDO::PARAM_INT);
                        break;
                    case '`cargadores_modelo`':
                        $stmt->bindValue($identifier, $this->cargadores_modelo, PDO::PARAM_STR);
                        break;
                    case '`cargadores_marca`':
                        $stmt->bindValue($identifier, $this->cargadores_marca, PDO::PARAM_STR);
                        break;
                    case '`cargadores_e`':
                        $stmt->bindValue($identifier, $this->cargadores_e, PDO::PARAM_STR);
                        break;
                    case '`cargadores_volts`':
                        $stmt->bindValue($identifier, $this->cargadores_volts, PDO::PARAM_INT);
                        break;
                    case '`cargadores_amperaje`':
                        $stmt->bindValue($identifier, $this->cargadores_amperaje, PDO::PARAM_INT);
                        break;
                    case '`cargadores_comprador`':
                        $stmt->bindValue($identifier, $this->cargadores_comprador, PDO::PARAM_STR);
                        break;
                    case '`cargadores_nombre`':
                        $stmt->bindValue($identifier, $this->cargadores_nombre, PDO::PARAM_STR);
                        break;
                    case '`cargadores_numserie`':
                        $stmt->bindValue($identifier, $this->cargadores_numserie, PDO::PARAM_STR);
                        break;
                    case '`cargadores_tipo`':
                        $stmt->bindValue($identifier, $this->cargadores_tipo, PDO::PARAM_STR);
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
        $this->setIdcargadores($pk);

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


            if (($retval = CargadoresPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBodegass !== null) {
                    foreach ($this->collBodegass as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCargadoresBateriass !== null) {
                    foreach ($this->collCargadoresBateriass as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDeshabilitacgs !== null) {
                    foreach ($this->collDeshabilitacgs as $referrerFK) {
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
        $pos = CargadoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdcargadores();
                break;
            case 1:
                return $this->getIdsucursal();
                break;
            case 2:
                return $this->getCargadoresModelo();
                break;
            case 3:
                return $this->getCargadoresMarca();
                break;
            case 4:
                return $this->getCargadoresE();
                break;
            case 5:
                return $this->getCargadoresVolts();
                break;
            case 6:
                return $this->getCargadoresAmperaje();
                break;
            case 7:
                return $this->getCargadoresComprador();
                break;
            case 8:
                return $this->getCargadoresNombre();
                break;
            case 9:
                return $this->getCargadoresNumserie();
                break;
            case 10:
                return $this->getCargadoresTipo();
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
        if (isset($alreadyDumpedObjects['Cargadores'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cargadores'][$this->getPrimaryKey()] = true;
        $keys = CargadoresPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcargadores(),
            $keys[1] => $this->getIdsucursal(),
            $keys[2] => $this->getCargadoresModelo(),
            $keys[3] => $this->getCargadoresMarca(),
            $keys[4] => $this->getCargadoresE(),
            $keys[5] => $this->getCargadoresVolts(),
            $keys[6] => $this->getCargadoresAmperaje(),
            $keys[7] => $this->getCargadoresComprador(),
            $keys[8] => $this->getCargadoresNombre(),
            $keys[9] => $this->getCargadoresNumserie(),
            $keys[10] => $this->getCargadoresTipo(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSucursal) {
                $result['Sucursal'] = $this->aSucursal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBodegass) {
                $result['Bodegass'] = $this->collBodegass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCargadoresBateriass) {
                $result['CargadoresBateriass'] = $this->collCargadoresBateriass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDeshabilitacgs) {
                $result['Deshabilitacgs'] = $this->collDeshabilitacgs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = CargadoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdcargadores($value);
                break;
            case 1:
                $this->setIdsucursal($value);
                break;
            case 2:
                $this->setCargadoresModelo($value);
                break;
            case 3:
                $this->setCargadoresMarca($value);
                break;
            case 4:
                $this->setCargadoresE($value);
                break;
            case 5:
                $this->setCargadoresVolts($value);
                break;
            case 6:
                $this->setCargadoresAmperaje($value);
                break;
            case 7:
                $this->setCargadoresComprador($value);
                break;
            case 8:
                $this->setCargadoresNombre($value);
                break;
            case 9:
                $this->setCargadoresNumserie($value);
                break;
            case 10:
                $this->setCargadoresTipo($value);
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
        $keys = CargadoresPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdcargadores($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdsucursal($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCargadoresModelo($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCargadoresMarca($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCargadoresE($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCargadoresVolts($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCargadoresAmperaje($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCargadoresComprador($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCargadoresNombre($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCargadoresNumserie($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCargadoresTipo($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CargadoresPeer::DATABASE_NAME);

        if ($this->isColumnModified(CargadoresPeer::IDCARGADORES)) $criteria->add(CargadoresPeer::IDCARGADORES, $this->idcargadores);
        if ($this->isColumnModified(CargadoresPeer::IDSUCURSAL)) $criteria->add(CargadoresPeer::IDSUCURSAL, $this->idsucursal);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_MODELO)) $criteria->add(CargadoresPeer::CARGADORES_MODELO, $this->cargadores_modelo);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_MARCA)) $criteria->add(CargadoresPeer::CARGADORES_MARCA, $this->cargadores_marca);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_E)) $criteria->add(CargadoresPeer::CARGADORES_E, $this->cargadores_e);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_VOLTS)) $criteria->add(CargadoresPeer::CARGADORES_VOLTS, $this->cargadores_volts);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_AMPERAJE)) $criteria->add(CargadoresPeer::CARGADORES_AMPERAJE, $this->cargadores_amperaje);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_COMPRADOR)) $criteria->add(CargadoresPeer::CARGADORES_COMPRADOR, $this->cargadores_comprador);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_NOMBRE)) $criteria->add(CargadoresPeer::CARGADORES_NOMBRE, $this->cargadores_nombre);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_NUMSERIE)) $criteria->add(CargadoresPeer::CARGADORES_NUMSERIE, $this->cargadores_numserie);
        if ($this->isColumnModified(CargadoresPeer::CARGADORES_TIPO)) $criteria->add(CargadoresPeer::CARGADORES_TIPO, $this->cargadores_tipo);

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
        $criteria = new Criteria(CargadoresPeer::DATABASE_NAME);
        $criteria->add(CargadoresPeer::IDCARGADORES, $this->idcargadores);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdcargadores();
    }

    /**
     * Generic method to set the primary key (idcargadores column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcargadores($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdcargadores();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Cargadores (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdsucursal($this->getIdsucursal());
        $copyObj->setCargadoresModelo($this->getCargadoresModelo());
        $copyObj->setCargadoresMarca($this->getCargadoresMarca());
        $copyObj->setCargadoresE($this->getCargadoresE());
        $copyObj->setCargadoresVolts($this->getCargadoresVolts());
        $copyObj->setCargadoresAmperaje($this->getCargadoresAmperaje());
        $copyObj->setCargadoresComprador($this->getCargadoresComprador());
        $copyObj->setCargadoresNombre($this->getCargadoresNombre());
        $copyObj->setCargadoresNumserie($this->getCargadoresNumserie());
        $copyObj->setCargadoresTipo($this->getCargadoresTipo());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBodegass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBodegas($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCargadoresBateriass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCargadoresBaterias($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDeshabilitacgs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeshabilitacg($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdcargadores(NULL); // this is a auto-increment column, so set to default value
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
     * @return Cargadores Clone of current object.
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
     * @return CargadoresPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CargadoresPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sucursal object.
     *
     * @param                  Sucursal $v
     * @return Cargadores The current object (for fluent API support)
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
            $v->addCargadores($this);
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
                $this->aSucursal->addCargadoress($this);
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
        if ('Bodegas' == $relationName) {
            $this->initBodegass();
        }
        if ('CargadoresBaterias' == $relationName) {
            $this->initCargadoresBateriass();
        }
        if ('Deshabilitacg' == $relationName) {
            $this->initDeshabilitacgs();
        }
    }

    /**
     * Clears out the collBodegass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Cargadores The current object (for fluent API support)
     * @see        addBodegass()
     */
    public function clearBodegass()
    {
        $this->collBodegass = null; // important to set this to null since that means it is uninitialized
        $this->collBodegassPartial = null;

        return $this;
    }

    /**
     * reset is the collBodegass collection loaded partially
     *
     * @return void
     */
    public function resetPartialBodegass($v = true)
    {
        $this->collBodegassPartial = $v;
    }

    /**
     * Initializes the collBodegass collection.
     *
     * By default this just sets the collBodegass collection to an empty array (like clearcollBodegass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBodegass($overrideExisting = true)
    {
        if (null !== $this->collBodegass && !$overrideExisting) {
            return;
        }
        $this->collBodegass = new PropelObjectCollection();
        $this->collBodegass->setModel('Bodegas');
    }

    /**
     * Gets an array of Bodegas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cargadores is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bodegas[] List of Bodegas objects
     * @throws PropelException
     */
    public function getBodegass($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBodegassPartial && !$this->isNew();
        if (null === $this->collBodegass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBodegass) {
                // return empty collection
                $this->initBodegass();
            } else {
                $collBodegass = BodegasQuery::create(null, $criteria)
                    ->filterByCargadores($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBodegassPartial && count($collBodegass)) {
                      $this->initBodegass(false);

                      foreach ($collBodegass as $obj) {
                        if (false == $this->collBodegass->contains($obj)) {
                          $this->collBodegass->append($obj);
                        }
                      }

                      $this->collBodegassPartial = true;
                    }

                    $collBodegass->getInternalIterator()->rewind();

                    return $collBodegass;
                }

                if ($partial && $this->collBodegass) {
                    foreach ($this->collBodegass as $obj) {
                        if ($obj->isNew()) {
                            $collBodegass[] = $obj;
                        }
                    }
                }

                $this->collBodegass = $collBodegass;
                $this->collBodegassPartial = false;
            }
        }

        return $this->collBodegass;
    }

    /**
     * Sets a collection of Bodegas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bodegass A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Cargadores The current object (for fluent API support)
     */
    public function setBodegass(PropelCollection $bodegass, PropelPDO $con = null)
    {
        $bodegassToDelete = $this->getBodegass(new Criteria(), $con)->diff($bodegass);


        $this->bodegassScheduledForDeletion = $bodegassToDelete;

        foreach ($bodegassToDelete as $bodegasRemoved) {
            $bodegasRemoved->setCargadores(null);
        }

        $this->collBodegass = null;
        foreach ($bodegass as $bodegas) {
            $this->addBodegas($bodegas);
        }

        $this->collBodegass = $bodegass;
        $this->collBodegassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bodegas objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bodegas objects.
     * @throws PropelException
     */
    public function countBodegass(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBodegassPartial && !$this->isNew();
        if (null === $this->collBodegass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBodegass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBodegass());
            }
            $query = BodegasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCargadores($this)
                ->count($con);
        }

        return count($this->collBodegass);
    }

    /**
     * Method called to associate a Bodegas object to this object
     * through the Bodegas foreign key attribute.
     *
     * @param    Bodegas $l Bodegas
     * @return Cargadores The current object (for fluent API support)
     */
    public function addBodegas(Bodegas $l)
    {
        if ($this->collBodegass === null) {
            $this->initBodegass();
            $this->collBodegassPartial = true;
        }

        if (!in_array($l, $this->collBodegass->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBodegas($l);

            if ($this->bodegassScheduledForDeletion and $this->bodegassScheduledForDeletion->contains($l)) {
                $this->bodegassScheduledForDeletion->remove($this->bodegassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Bodegas $bodegas The bodegas object to add.
     */
    protected function doAddBodegas($bodegas)
    {
        $this->collBodegass[]= $bodegas;
        $bodegas->setCargadores($this);
    }

    /**
     * @param	Bodegas $bodegas The bodegas object to remove.
     * @return Cargadores The current object (for fluent API support)
     */
    public function removeBodegas($bodegas)
    {
        if ($this->getBodegass()->contains($bodegas)) {
            $this->collBodegass->remove($this->collBodegass->search($bodegas));
            if (null === $this->bodegassScheduledForDeletion) {
                $this->bodegassScheduledForDeletion = clone $this->collBodegass;
                $this->bodegassScheduledForDeletion->clear();
            }
            $this->bodegassScheduledForDeletion[]= clone $bodegas;
            $bodegas->setCargadores(null);
        }

        return $this;
    }

    /**
     * Clears out the collCargadoresBateriass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Cargadores The current object (for fluent API support)
     * @see        addCargadoresBateriass()
     */
    public function clearCargadoresBateriass()
    {
        $this->collCargadoresBateriass = null; // important to set this to null since that means it is uninitialized
        $this->collCargadoresBateriassPartial = null;

        return $this;
    }

    /**
     * reset is the collCargadoresBateriass collection loaded partially
     *
     * @return void
     */
    public function resetPartialCargadoresBateriass($v = true)
    {
        $this->collCargadoresBateriassPartial = $v;
    }

    /**
     * Initializes the collCargadoresBateriass collection.
     *
     * By default this just sets the collCargadoresBateriass collection to an empty array (like clearcollCargadoresBateriass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCargadoresBateriass($overrideExisting = true)
    {
        if (null !== $this->collCargadoresBateriass && !$overrideExisting) {
            return;
        }
        $this->collCargadoresBateriass = new PropelObjectCollection();
        $this->collCargadoresBateriass->setModel('CargadoresBaterias');
    }

    /**
     * Gets an array of CargadoresBaterias objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cargadores is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CargadoresBaterias[] List of CargadoresBaterias objects
     * @throws PropelException
     */
    public function getCargadoresBateriass($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCargadoresBateriassPartial && !$this->isNew();
        if (null === $this->collCargadoresBateriass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCargadoresBateriass) {
                // return empty collection
                $this->initCargadoresBateriass();
            } else {
                $collCargadoresBateriass = CargadoresBateriasQuery::create(null, $criteria)
                    ->filterByCargadores($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCargadoresBateriassPartial && count($collCargadoresBateriass)) {
                      $this->initCargadoresBateriass(false);

                      foreach ($collCargadoresBateriass as $obj) {
                        if (false == $this->collCargadoresBateriass->contains($obj)) {
                          $this->collCargadoresBateriass->append($obj);
                        }
                      }

                      $this->collCargadoresBateriassPartial = true;
                    }

                    $collCargadoresBateriass->getInternalIterator()->rewind();

                    return $collCargadoresBateriass;
                }

                if ($partial && $this->collCargadoresBateriass) {
                    foreach ($this->collCargadoresBateriass as $obj) {
                        if ($obj->isNew()) {
                            $collCargadoresBateriass[] = $obj;
                        }
                    }
                }

                $this->collCargadoresBateriass = $collCargadoresBateriass;
                $this->collCargadoresBateriassPartial = false;
            }
        }

        return $this->collCargadoresBateriass;
    }

    /**
     * Sets a collection of CargadoresBaterias objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $cargadoresBateriass A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Cargadores The current object (for fluent API support)
     */
    public function setCargadoresBateriass(PropelCollection $cargadoresBateriass, PropelPDO $con = null)
    {
        $cargadoresBateriassToDelete = $this->getCargadoresBateriass(new Criteria(), $con)->diff($cargadoresBateriass);


        $this->cargadoresBateriassScheduledForDeletion = $cargadoresBateriassToDelete;

        foreach ($cargadoresBateriassToDelete as $cargadoresBateriasRemoved) {
            $cargadoresBateriasRemoved->setCargadores(null);
        }

        $this->collCargadoresBateriass = null;
        foreach ($cargadoresBateriass as $cargadoresBaterias) {
            $this->addCargadoresBaterias($cargadoresBaterias);
        }

        $this->collCargadoresBateriass = $cargadoresBateriass;
        $this->collCargadoresBateriassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CargadoresBaterias objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CargadoresBaterias objects.
     * @throws PropelException
     */
    public function countCargadoresBateriass(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCargadoresBateriassPartial && !$this->isNew();
        if (null === $this->collCargadoresBateriass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCargadoresBateriass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCargadoresBateriass());
            }
            $query = CargadoresBateriasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCargadores($this)
                ->count($con);
        }

        return count($this->collCargadoresBateriass);
    }

    /**
     * Method called to associate a CargadoresBaterias object to this object
     * through the CargadoresBaterias foreign key attribute.
     *
     * @param    CargadoresBaterias $l CargadoresBaterias
     * @return Cargadores The current object (for fluent API support)
     */
    public function addCargadoresBaterias(CargadoresBaterias $l)
    {
        if ($this->collCargadoresBateriass === null) {
            $this->initCargadoresBateriass();
            $this->collCargadoresBateriassPartial = true;
        }

        if (!in_array($l, $this->collCargadoresBateriass->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCargadoresBaterias($l);

            if ($this->cargadoresBateriassScheduledForDeletion and $this->cargadoresBateriassScheduledForDeletion->contains($l)) {
                $this->cargadoresBateriassScheduledForDeletion->remove($this->cargadoresBateriassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CargadoresBaterias $cargadoresBaterias The cargadoresBaterias object to add.
     */
    protected function doAddCargadoresBaterias($cargadoresBaterias)
    {
        $this->collCargadoresBateriass[]= $cargadoresBaterias;
        $cargadoresBaterias->setCargadores($this);
    }

    /**
     * @param	CargadoresBaterias $cargadoresBaterias The cargadoresBaterias object to remove.
     * @return Cargadores The current object (for fluent API support)
     */
    public function removeCargadoresBaterias($cargadoresBaterias)
    {
        if ($this->getCargadoresBateriass()->contains($cargadoresBaterias)) {
            $this->collCargadoresBateriass->remove($this->collCargadoresBateriass->search($cargadoresBaterias));
            if (null === $this->cargadoresBateriassScheduledForDeletion) {
                $this->cargadoresBateriassScheduledForDeletion = clone $this->collCargadoresBateriass;
                $this->cargadoresBateriassScheduledForDeletion->clear();
            }
            $this->cargadoresBateriassScheduledForDeletion[]= clone $cargadoresBaterias;
            $cargadoresBaterias->setCargadores(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cargadores is new, it will return
     * an empty collection; or if this Cargadores has previously
     * been saved, it will retrieve related CargadoresBateriass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cargadores.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CargadoresBaterias[] List of CargadoresBaterias objects
     */
    public function getCargadoresBateriassJoinBaterias($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CargadoresBateriasQuery::create(null, $criteria);
        $query->joinWith('Baterias', $join_behavior);

        return $this->getCargadoresBateriass($query, $con);
    }

    /**
     * Clears out the collDeshabilitacgs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Cargadores The current object (for fluent API support)
     * @see        addDeshabilitacgs()
     */
    public function clearDeshabilitacgs()
    {
        $this->collDeshabilitacgs = null; // important to set this to null since that means it is uninitialized
        $this->collDeshabilitacgsPartial = null;

        return $this;
    }

    /**
     * reset is the collDeshabilitacgs collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeshabilitacgs($v = true)
    {
        $this->collDeshabilitacgsPartial = $v;
    }

    /**
     * Initializes the collDeshabilitacgs collection.
     *
     * By default this just sets the collDeshabilitacgs collection to an empty array (like clearcollDeshabilitacgs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeshabilitacgs($overrideExisting = true)
    {
        if (null !== $this->collDeshabilitacgs && !$overrideExisting) {
            return;
        }
        $this->collDeshabilitacgs = new PropelObjectCollection();
        $this->collDeshabilitacgs->setModel('Deshabilitacg');
    }

    /**
     * Gets an array of Deshabilitacg objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cargadores is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Deshabilitacg[] List of Deshabilitacg objects
     * @throws PropelException
     */
    public function getDeshabilitacgs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitacgsPartial && !$this->isNew();
        if (null === $this->collDeshabilitacgs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitacgs) {
                // return empty collection
                $this->initDeshabilitacgs();
            } else {
                $collDeshabilitacgs = DeshabilitacgQuery::create(null, $criteria)
                    ->filterByCargadores($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeshabilitacgsPartial && count($collDeshabilitacgs)) {
                      $this->initDeshabilitacgs(false);

                      foreach ($collDeshabilitacgs as $obj) {
                        if (false == $this->collDeshabilitacgs->contains($obj)) {
                          $this->collDeshabilitacgs->append($obj);
                        }
                      }

                      $this->collDeshabilitacgsPartial = true;
                    }

                    $collDeshabilitacgs->getInternalIterator()->rewind();

                    return $collDeshabilitacgs;
                }

                if ($partial && $this->collDeshabilitacgs) {
                    foreach ($this->collDeshabilitacgs as $obj) {
                        if ($obj->isNew()) {
                            $collDeshabilitacgs[] = $obj;
                        }
                    }
                }

                $this->collDeshabilitacgs = $collDeshabilitacgs;
                $this->collDeshabilitacgsPartial = false;
            }
        }

        return $this->collDeshabilitacgs;
    }

    /**
     * Sets a collection of Deshabilitacg objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deshabilitacgs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Cargadores The current object (for fluent API support)
     */
    public function setDeshabilitacgs(PropelCollection $deshabilitacgs, PropelPDO $con = null)
    {
        $deshabilitacgsToDelete = $this->getDeshabilitacgs(new Criteria(), $con)->diff($deshabilitacgs);


        $this->deshabilitacgsScheduledForDeletion = $deshabilitacgsToDelete;

        foreach ($deshabilitacgsToDelete as $deshabilitacgRemoved) {
            $deshabilitacgRemoved->setCargadores(null);
        }

        $this->collDeshabilitacgs = null;
        foreach ($deshabilitacgs as $deshabilitacg) {
            $this->addDeshabilitacg($deshabilitacg);
        }

        $this->collDeshabilitacgs = $deshabilitacgs;
        $this->collDeshabilitacgsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Deshabilitacg objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Deshabilitacg objects.
     * @throws PropelException
     */
    public function countDeshabilitacgs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitacgsPartial && !$this->isNew();
        if (null === $this->collDeshabilitacgs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitacgs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDeshabilitacgs());
            }
            $query = DeshabilitacgQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCargadores($this)
                ->count($con);
        }

        return count($this->collDeshabilitacgs);
    }

    /**
     * Method called to associate a Deshabilitacg object to this object
     * through the Deshabilitacg foreign key attribute.
     *
     * @param    Deshabilitacg $l Deshabilitacg
     * @return Cargadores The current object (for fluent API support)
     */
    public function addDeshabilitacg(Deshabilitacg $l)
    {
        if ($this->collDeshabilitacgs === null) {
            $this->initDeshabilitacgs();
            $this->collDeshabilitacgsPartial = true;
        }

        if (!in_array($l, $this->collDeshabilitacgs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeshabilitacg($l);

            if ($this->deshabilitacgsScheduledForDeletion and $this->deshabilitacgsScheduledForDeletion->contains($l)) {
                $this->deshabilitacgsScheduledForDeletion->remove($this->deshabilitacgsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Deshabilitacg $deshabilitacg The deshabilitacg object to add.
     */
    protected function doAddDeshabilitacg($deshabilitacg)
    {
        $this->collDeshabilitacgs[]= $deshabilitacg;
        $deshabilitacg->setCargadores($this);
    }

    /**
     * @param	Deshabilitacg $deshabilitacg The deshabilitacg object to remove.
     * @return Cargadores The current object (for fluent API support)
     */
    public function removeDeshabilitacg($deshabilitacg)
    {
        if ($this->getDeshabilitacgs()->contains($deshabilitacg)) {
            $this->collDeshabilitacgs->remove($this->collDeshabilitacgs->search($deshabilitacg));
            if (null === $this->deshabilitacgsScheduledForDeletion) {
                $this->deshabilitacgsScheduledForDeletion = clone $this->collDeshabilitacgs;
                $this->deshabilitacgsScheduledForDeletion->clear();
            }
            $this->deshabilitacgsScheduledForDeletion[]= clone $deshabilitacg;
            $deshabilitacg->setCargadores(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idcargadores = null;
        $this->idsucursal = null;
        $this->cargadores_modelo = null;
        $this->cargadores_marca = null;
        $this->cargadores_e = null;
        $this->cargadores_volts = null;
        $this->cargadores_amperaje = null;
        $this->cargadores_comprador = null;
        $this->cargadores_nombre = null;
        $this->cargadores_numserie = null;
        $this->cargadores_tipo = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
            if ($this->collBodegass) {
                foreach ($this->collBodegass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCargadoresBateriass) {
                foreach ($this->collCargadoresBateriass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDeshabilitacgs) {
                foreach ($this->collDeshabilitacgs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSucursal instanceof Persistent) {
              $this->aSucursal->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBodegass instanceof PropelCollection) {
            $this->collBodegass->clearIterator();
        }
        $this->collBodegass = null;
        if ($this->collCargadoresBateriass instanceof PropelCollection) {
            $this->collCargadoresBateriass->clearIterator();
        }
        $this->collCargadoresBateriass = null;
        if ($this->collDeshabilitacgs instanceof PropelCollection) {
            $this->collDeshabilitacgs->clearIterator();
        }
        $this->collDeshabilitacgs = null;
        $this->aSucursal = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CargadoresPeer::DEFAULT_STRING_FORMAT);
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
