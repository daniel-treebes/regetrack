<?php


/**
 * Base class that represents a row from the 'uc_users' table.
 *
 *
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseUcUsers extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'UcUsersPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UcUsersPeer
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
     * The value for the user_name field.
     * @var        string
     */
    protected $user_name;

    /**
     * The value for the display_name field.
     * @var        string
     */
    protected $display_name;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the activation_token field.
     * @var        string
     */
    protected $activation_token;

    /**
     * The value for the last_activation_request field.
     * @var        int
     */
    protected $last_activation_request;

    /**
     * The value for the lost_password_request field.
     * @var        boolean
     */
    protected $lost_password_request;

    /**
     * The value for the active field.
     * @var        boolean
     */
    protected $active;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the sign_up_stamp field.
     * @var        int
     */
    protected $sign_up_stamp;

    /**
     * The value for the last_sign_in_stamp field.
     * @var        int
     */
    protected $last_sign_in_stamp;

    /**
     * @var        Sucursal
     */
    protected $aSucursal;

    /**
     * @var        PropelObjectCollection|Deshabilitamc[] Collection to store aggregation of Deshabilitamc objects.
     */
    protected $collDeshabilitamcsRelatedByUsuarioEntrada;
    protected $collDeshabilitamcsRelatedByUsuarioEntradaPartial;

    /**
     * @var        PropelObjectCollection|Deshabilitamc[] Collection to store aggregation of Deshabilitamc objects.
     */
    protected $collDeshabilitamcsRelatedByUsuarioSalida;
    protected $collDeshabilitamcsRelatedByUsuarioSalidaPartial;

    /**
     * @var        PropelObjectCollection|Empresa[] Collection to store aggregation of Empresa objects.
     */
    protected $collEmpresas;
    protected $collEmpresasPartial;

    /**
     * @var        PropelObjectCollection|UsoBateriasMontacargas[] Collection to store aggregation of UsoBateriasMontacargas objects.
     */
    protected $collUsoBateriasMontacargassRelatedByUsuarioEntrada;
    protected $collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial;

    /**
     * @var        PropelObjectCollection|UsoBateriasMontacargas[] Collection to store aggregation of UsoBateriasMontacargas objects.
     */
    protected $collUsoBateriasMontacargassRelatedByUsuarioSalida;
    protected $collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial;

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
    protected $deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $empresasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion = null;

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
     * Get the [user_name] column value.
     *
     * @return string
     */
    public function getUserName()
    {

        return $this->user_name;
    }

    /**
     * Get the [display_name] column value.
     *
     * @return string
     */
    public function getDisplayName()
    {

        return $this->display_name;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {

        return $this->password;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [activation_token] column value.
     *
     * @return string
     */
    public function getActivationToken()
    {

        return $this->activation_token;
    }

    /**
     * Get the [last_activation_request] column value.
     *
     * @return int
     */
    public function getLastActivationRequest()
    {

        return $this->last_activation_request;
    }

    /**
     * Get the [lost_password_request] column value.
     *
     * @return boolean
     */
    public function getLostPasswordRequest()
    {

        return $this->lost_password_request;
    }

    /**
     * Get the [active] column value.
     *
     * @return boolean
     */
    public function getActive()
    {

        return $this->active;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {

        return $this->title;
    }

    /**
     * Get the [sign_up_stamp] column value.
     *
     * @return int
     */
    public function getSignUpStamp()
    {

        return $this->sign_up_stamp;
    }

    /**
     * Get the [last_sign_in_stamp] column value.
     *
     * @return int
     */
    public function getLastSignInStamp()
    {

        return $this->last_sign_in_stamp;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = UcUsersPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [idsucursal] column.
     *
     * @param  int $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setIdsucursal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idsucursal !== $v) {
            $this->idsucursal = $v;
            $this->modifiedColumns[] = UcUsersPeer::IDSUCURSAL;
        }

        if ($this->aSucursal !== null && $this->aSucursal->getIdsucursal() !== $v) {
            $this->aSucursal = null;
        }


        return $this;
    } // setIdsucursal()

    /**
     * Set the value of [user_name] column.
     *
     * @param  string $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setUserName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_name !== $v) {
            $this->user_name = $v;
            $this->modifiedColumns[] = UcUsersPeer::USER_NAME;
        }


        return $this;
    } // setUserName()

    /**
     * Set the value of [display_name] column.
     *
     * @param  string $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[] = UcUsersPeer::DISPLAY_NAME;
        }


        return $this;
    } // setDisplayName()

    /**
     * Set the value of [password] column.
     *
     * @param  string $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = UcUsersPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [email] column.
     *
     * @param  string $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = UcUsersPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [activation_token] column.
     *
     * @param  string $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setActivationToken($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->activation_token !== $v) {
            $this->activation_token = $v;
            $this->modifiedColumns[] = UcUsersPeer::ACTIVATION_TOKEN;
        }


        return $this;
    } // setActivationToken()

    /**
     * Set the value of [last_activation_request] column.
     *
     * @param  int $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setLastActivationRequest($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->last_activation_request !== $v) {
            $this->last_activation_request = $v;
            $this->modifiedColumns[] = UcUsersPeer::LAST_ACTIVATION_REQUEST;
        }


        return $this;
    } // setLastActivationRequest()

    /**
     * Sets the value of the [lost_password_request] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setLostPasswordRequest($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->lost_password_request !== $v) {
            $this->lost_password_request = $v;
            $this->modifiedColumns[] = UcUsersPeer::LOST_PASSWORD_REQUEST;
        }


        return $this;
    } // setLostPasswordRequest()

    /**
     * Sets the value of the [active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->active !== $v) {
            $this->active = $v;
            $this->modifiedColumns[] = UcUsersPeer::ACTIVE;
        }


        return $this;
    } // setActive()

    /**
     * Set the value of [title] column.
     *
     * @param  string $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = UcUsersPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [sign_up_stamp] column.
     *
     * @param  int $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setSignUpStamp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sign_up_stamp !== $v) {
            $this->sign_up_stamp = $v;
            $this->modifiedColumns[] = UcUsersPeer::SIGN_UP_STAMP;
        }


        return $this;
    } // setSignUpStamp()

    /**
     * Set the value of [last_sign_in_stamp] column.
     *
     * @param  int $v new value
     * @return UcUsers The current object (for fluent API support)
     */
    public function setLastSignInStamp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->last_sign_in_stamp !== $v) {
            $this->last_sign_in_stamp = $v;
            $this->modifiedColumns[] = UcUsersPeer::LAST_SIGN_IN_STAMP;
        }


        return $this;
    } // setLastSignInStamp()

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
            $this->user_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->display_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->email = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->activation_token = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_activation_request = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->lost_password_request = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
            $this->active = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->title = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->sign_up_stamp = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->last_sign_in_stamp = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 13; // 13 = UcUsersPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating UcUsers object", $e);
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
            $con = Propel::getConnection(UcUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UcUsersPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSucursal = null;
            $this->collDeshabilitamcsRelatedByUsuarioEntrada = null;

            $this->collDeshabilitamcsRelatedByUsuarioSalida = null;

            $this->collEmpresas = null;

            $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada = null;

            $this->collUsoBateriasMontacargassRelatedByUsuarioSalida = null;

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
            $con = Propel::getConnection(UcUsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UcUsersQuery::create()
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
            $con = Propel::getConnection(UcUsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                UcUsersPeer::addInstanceToPool($this);
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

            if ($this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion !== null) {
                if (!$this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion->isEmpty()) {
                    foreach ($this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion as $deshabilitamcRelatedByUsuarioEntrada) {
                        // need to save related object because we set the relation to null
                        $deshabilitamcRelatedByUsuarioEntrada->save($con);
                    }
                    $this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion = null;
                }
            }

            if ($this->collDeshabilitamcsRelatedByUsuarioEntrada !== null) {
                foreach ($this->collDeshabilitamcsRelatedByUsuarioEntrada as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion !== null) {
                if (!$this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion->isEmpty()) {
                    foreach ($this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion as $deshabilitamcRelatedByUsuarioSalida) {
                        // need to save related object because we set the relation to null
                        $deshabilitamcRelatedByUsuarioSalida->save($con);
                    }
                    $this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion = null;
                }
            }

            if ($this->collDeshabilitamcsRelatedByUsuarioSalida !== null) {
                foreach ($this->collDeshabilitamcsRelatedByUsuarioSalida as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->empresasScheduledForDeletion !== null) {
                if (!$this->empresasScheduledForDeletion->isEmpty()) {
                    EmpresaQuery::create()
                        ->filterByPrimaryKeys($this->empresasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->empresasScheduledForDeletion = null;
                }
            }

            if ($this->collEmpresas !== null) {
                foreach ($this->collEmpresas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion !== null) {
                if (!$this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion->isEmpty()) {
                    foreach ($this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion as $usoBateriasMontacargasRelatedByUsuarioEntrada) {
                        // need to save related object because we set the relation to null
                        $usoBateriasMontacargasRelatedByUsuarioEntrada->save($con);
                    }
                    $this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion = null;
                }
            }

            if ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada !== null) {
                foreach ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion !== null) {
                if (!$this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion->isEmpty()) {
                    foreach ($this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion as $usoBateriasMontacargasRelatedByUsuarioSalida) {
                        // need to save related object because we set the relation to null
                        $usoBateriasMontacargasRelatedByUsuarioSalida->save($con);
                    }
                    $this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion = null;
                }
            }

            if ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida !== null) {
                foreach ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida as $referrerFK) {
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

        $this->modifiedColumns[] = UcUsersPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UcUsersPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UcUsersPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(UcUsersPeer::IDSUCURSAL)) {
            $modifiedColumns[':p' . $index++]  = '`idsucursal`';
        }
        if ($this->isColumnModified(UcUsersPeer::USER_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`user_name`';
        }
        if ($this->isColumnModified(UcUsersPeer::DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`display_name`';
        }
        if ($this->isColumnModified(UcUsersPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(UcUsersPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(UcUsersPeer::ACTIVATION_TOKEN)) {
            $modifiedColumns[':p' . $index++]  = '`activation_token`';
        }
        if ($this->isColumnModified(UcUsersPeer::LAST_ACTIVATION_REQUEST)) {
            $modifiedColumns[':p' . $index++]  = '`last_activation_request`';
        }
        if ($this->isColumnModified(UcUsersPeer::LOST_PASSWORD_REQUEST)) {
            $modifiedColumns[':p' . $index++]  = '`lost_password_request`';
        }
        if ($this->isColumnModified(UcUsersPeer::ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`active`';
        }
        if ($this->isColumnModified(UcUsersPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(UcUsersPeer::SIGN_UP_STAMP)) {
            $modifiedColumns[':p' . $index++]  = '`sign_up_stamp`';
        }
        if ($this->isColumnModified(UcUsersPeer::LAST_SIGN_IN_STAMP)) {
            $modifiedColumns[':p' . $index++]  = '`last_sign_in_stamp`';
        }

        $sql = sprintf(
            'INSERT INTO `uc_users` (%s) VALUES (%s)',
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
                    case '`user_name`':
                        $stmt->bindValue($identifier, $this->user_name, PDO::PARAM_STR);
                        break;
                    case '`display_name`':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`activation_token`':
                        $stmt->bindValue($identifier, $this->activation_token, PDO::PARAM_STR);
                        break;
                    case '`last_activation_request`':
                        $stmt->bindValue($identifier, $this->last_activation_request, PDO::PARAM_INT);
                        break;
                    case '`lost_password_request`':
                        $stmt->bindValue($identifier, (int) $this->lost_password_request, PDO::PARAM_INT);
                        break;
                    case '`active`':
                        $stmt->bindValue($identifier, (int) $this->active, PDO::PARAM_INT);
                        break;
                    case '`title`':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`sign_up_stamp`':
                        $stmt->bindValue($identifier, $this->sign_up_stamp, PDO::PARAM_INT);
                        break;
                    case '`last_sign_in_stamp`':
                        $stmt->bindValue($identifier, $this->last_sign_in_stamp, PDO::PARAM_INT);
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


            if (($retval = UcUsersPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDeshabilitamcsRelatedByUsuarioEntrada !== null) {
                    foreach ($this->collDeshabilitamcsRelatedByUsuarioEntrada as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDeshabilitamcsRelatedByUsuarioSalida !== null) {
                    foreach ($this->collDeshabilitamcsRelatedByUsuarioSalida as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEmpresas !== null) {
                    foreach ($this->collEmpresas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada !== null) {
                    foreach ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida !== null) {
                    foreach ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida as $referrerFK) {
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
        $pos = UcUsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getUserName();
                break;
            case 3:
                return $this->getDisplayName();
                break;
            case 4:
                return $this->getPassword();
                break;
            case 5:
                return $this->getEmail();
                break;
            case 6:
                return $this->getActivationToken();
                break;
            case 7:
                return $this->getLastActivationRequest();
                break;
            case 8:
                return $this->getLostPasswordRequest();
                break;
            case 9:
                return $this->getActive();
                break;
            case 10:
                return $this->getTitle();
                break;
            case 11:
                return $this->getSignUpStamp();
                break;
            case 12:
                return $this->getLastSignInStamp();
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
        if (isset($alreadyDumpedObjects['UcUsers'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['UcUsers'][$this->getPrimaryKey()] = true;
        $keys = UcUsersPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getIdsucursal(),
            $keys[2] => $this->getUserName(),
            $keys[3] => $this->getDisplayName(),
            $keys[4] => $this->getPassword(),
            $keys[5] => $this->getEmail(),
            $keys[6] => $this->getActivationToken(),
            $keys[7] => $this->getLastActivationRequest(),
            $keys[8] => $this->getLostPasswordRequest(),
            $keys[9] => $this->getActive(),
            $keys[10] => $this->getTitle(),
            $keys[11] => $this->getSignUpStamp(),
            $keys[12] => $this->getLastSignInStamp(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSucursal) {
                $result['Sucursal'] = $this->aSucursal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDeshabilitamcsRelatedByUsuarioEntrada) {
                $result['DeshabilitamcsRelatedByUsuarioEntrada'] = $this->collDeshabilitamcsRelatedByUsuarioEntrada->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDeshabilitamcsRelatedByUsuarioSalida) {
                $result['DeshabilitamcsRelatedByUsuarioSalida'] = $this->collDeshabilitamcsRelatedByUsuarioSalida->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEmpresas) {
                $result['Empresas'] = $this->collEmpresas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada) {
                $result['UsoBateriasMontacargassRelatedByUsuarioEntrada'] = $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsoBateriasMontacargassRelatedByUsuarioSalida) {
                $result['UsoBateriasMontacargassRelatedByUsuarioSalida'] = $this->collUsoBateriasMontacargassRelatedByUsuarioSalida->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = UcUsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setUserName($value);
                break;
            case 3:
                $this->setDisplayName($value);
                break;
            case 4:
                $this->setPassword($value);
                break;
            case 5:
                $this->setEmail($value);
                break;
            case 6:
                $this->setActivationToken($value);
                break;
            case 7:
                $this->setLastActivationRequest($value);
                break;
            case 8:
                $this->setLostPasswordRequest($value);
                break;
            case 9:
                $this->setActive($value);
                break;
            case 10:
                $this->setTitle($value);
                break;
            case 11:
                $this->setSignUpStamp($value);
                break;
            case 12:
                $this->setLastSignInStamp($value);
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
        $keys = UcUsersPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdsucursal($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUserName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDisplayName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setActivationToken($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastActivationRequest($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLostPasswordRequest($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setActive($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTitle($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSignUpStamp($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastSignInStamp($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UcUsersPeer::DATABASE_NAME);

        if ($this->isColumnModified(UcUsersPeer::ID)) $criteria->add(UcUsersPeer::ID, $this->id);
        if ($this->isColumnModified(UcUsersPeer::IDSUCURSAL)) $criteria->add(UcUsersPeer::IDSUCURSAL, $this->idsucursal);
        if ($this->isColumnModified(UcUsersPeer::USER_NAME)) $criteria->add(UcUsersPeer::USER_NAME, $this->user_name);
        if ($this->isColumnModified(UcUsersPeer::DISPLAY_NAME)) $criteria->add(UcUsersPeer::DISPLAY_NAME, $this->display_name);
        if ($this->isColumnModified(UcUsersPeer::PASSWORD)) $criteria->add(UcUsersPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(UcUsersPeer::EMAIL)) $criteria->add(UcUsersPeer::EMAIL, $this->email);
        if ($this->isColumnModified(UcUsersPeer::ACTIVATION_TOKEN)) $criteria->add(UcUsersPeer::ACTIVATION_TOKEN, $this->activation_token);
        if ($this->isColumnModified(UcUsersPeer::LAST_ACTIVATION_REQUEST)) $criteria->add(UcUsersPeer::LAST_ACTIVATION_REQUEST, $this->last_activation_request);
        if ($this->isColumnModified(UcUsersPeer::LOST_PASSWORD_REQUEST)) $criteria->add(UcUsersPeer::LOST_PASSWORD_REQUEST, $this->lost_password_request);
        if ($this->isColumnModified(UcUsersPeer::ACTIVE)) $criteria->add(UcUsersPeer::ACTIVE, $this->active);
        if ($this->isColumnModified(UcUsersPeer::TITLE)) $criteria->add(UcUsersPeer::TITLE, $this->title);
        if ($this->isColumnModified(UcUsersPeer::SIGN_UP_STAMP)) $criteria->add(UcUsersPeer::SIGN_UP_STAMP, $this->sign_up_stamp);
        if ($this->isColumnModified(UcUsersPeer::LAST_SIGN_IN_STAMP)) $criteria->add(UcUsersPeer::LAST_SIGN_IN_STAMP, $this->last_sign_in_stamp);

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
        $criteria = new Criteria(UcUsersPeer::DATABASE_NAME);
        $criteria->add(UcUsersPeer::ID, $this->id);

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
     * @param object $copyObj An object of UcUsers (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdsucursal($this->getIdsucursal());
        $copyObj->setUserName($this->getUserName());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setActivationToken($this->getActivationToken());
        $copyObj->setLastActivationRequest($this->getLastActivationRequest());
        $copyObj->setLostPasswordRequest($this->getLostPasswordRequest());
        $copyObj->setActive($this->getActive());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setSignUpStamp($this->getSignUpStamp());
        $copyObj->setLastSignInStamp($this->getLastSignInStamp());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDeshabilitamcsRelatedByUsuarioEntrada() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeshabilitamcRelatedByUsuarioEntrada($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDeshabilitamcsRelatedByUsuarioSalida() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeshabilitamcRelatedByUsuarioSalida($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEmpresas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEmpresa($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsoBateriasMontacargassRelatedByUsuarioEntrada() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsoBateriasMontacargasRelatedByUsuarioEntrada($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsoBateriasMontacargassRelatedByUsuarioSalida() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsoBateriasMontacargasRelatedByUsuarioSalida($relObj->copy($deepCopy));
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
     * @return UcUsers Clone of current object.
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
     * @return UcUsersPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UcUsersPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sucursal object.
     *
     * @param                  Sucursal $v
     * @return UcUsers The current object (for fluent API support)
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
            $v->addUcUsers($this);
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
                $this->aSucursal->addUcUserss($this);
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
        if ('DeshabilitamcRelatedByUsuarioEntrada' == $relationName) {
            $this->initDeshabilitamcsRelatedByUsuarioEntrada();
        }
        if ('DeshabilitamcRelatedByUsuarioSalida' == $relationName) {
            $this->initDeshabilitamcsRelatedByUsuarioSalida();
        }
        if ('Empresa' == $relationName) {
            $this->initEmpresas();
        }
        if ('UsoBateriasMontacargasRelatedByUsuarioEntrada' == $relationName) {
            $this->initUsoBateriasMontacargassRelatedByUsuarioEntrada();
        }
        if ('UsoBateriasMontacargasRelatedByUsuarioSalida' == $relationName) {
            $this->initUsoBateriasMontacargassRelatedByUsuarioSalida();
        }
    }

    /**
     * Clears out the collDeshabilitamcsRelatedByUsuarioEntrada collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return UcUsers The current object (for fluent API support)
     * @see        addDeshabilitamcsRelatedByUsuarioEntrada()
     */
    public function clearDeshabilitamcsRelatedByUsuarioEntrada()
    {
        $this->collDeshabilitamcsRelatedByUsuarioEntrada = null; // important to set this to null since that means it is uninitialized
        $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial = null;

        return $this;
    }

    /**
     * reset is the collDeshabilitamcsRelatedByUsuarioEntrada collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeshabilitamcsRelatedByUsuarioEntrada($v = true)
    {
        $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial = $v;
    }

    /**
     * Initializes the collDeshabilitamcsRelatedByUsuarioEntrada collection.
     *
     * By default this just sets the collDeshabilitamcsRelatedByUsuarioEntrada collection to an empty array (like clearcollDeshabilitamcsRelatedByUsuarioEntrada());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeshabilitamcsRelatedByUsuarioEntrada($overrideExisting = true)
    {
        if (null !== $this->collDeshabilitamcsRelatedByUsuarioEntrada && !$overrideExisting) {
            return;
        }
        $this->collDeshabilitamcsRelatedByUsuarioEntrada = new PropelObjectCollection();
        $this->collDeshabilitamcsRelatedByUsuarioEntrada->setModel('Deshabilitamc');
    }

    /**
     * Gets an array of Deshabilitamc objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this UcUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Deshabilitamc[] List of Deshabilitamc objects
     * @throws PropelException
     */
    public function getDeshabilitamcsRelatedByUsuarioEntrada($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial && !$this->isNew();
        if (null === $this->collDeshabilitamcsRelatedByUsuarioEntrada || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitamcsRelatedByUsuarioEntrada) {
                // return empty collection
                $this->initDeshabilitamcsRelatedByUsuarioEntrada();
            } else {
                $collDeshabilitamcsRelatedByUsuarioEntrada = DeshabilitamcQuery::create(null, $criteria)
                    ->filterByUcUsersRelatedByUsuarioEntrada($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial && count($collDeshabilitamcsRelatedByUsuarioEntrada)) {
                      $this->initDeshabilitamcsRelatedByUsuarioEntrada(false);

                      foreach ($collDeshabilitamcsRelatedByUsuarioEntrada as $obj) {
                        if (false == $this->collDeshabilitamcsRelatedByUsuarioEntrada->contains($obj)) {
                          $this->collDeshabilitamcsRelatedByUsuarioEntrada->append($obj);
                        }
                      }

                      $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial = true;
                    }

                    $collDeshabilitamcsRelatedByUsuarioEntrada->getInternalIterator()->rewind();

                    return $collDeshabilitamcsRelatedByUsuarioEntrada;
                }

                if ($partial && $this->collDeshabilitamcsRelatedByUsuarioEntrada) {
                    foreach ($this->collDeshabilitamcsRelatedByUsuarioEntrada as $obj) {
                        if ($obj->isNew()) {
                            $collDeshabilitamcsRelatedByUsuarioEntrada[] = $obj;
                        }
                    }
                }

                $this->collDeshabilitamcsRelatedByUsuarioEntrada = $collDeshabilitamcsRelatedByUsuarioEntrada;
                $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial = false;
            }
        }

        return $this->collDeshabilitamcsRelatedByUsuarioEntrada;
    }

    /**
     * Sets a collection of DeshabilitamcRelatedByUsuarioEntrada objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deshabilitamcsRelatedByUsuarioEntrada A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return UcUsers The current object (for fluent API support)
     */
    public function setDeshabilitamcsRelatedByUsuarioEntrada(PropelCollection $deshabilitamcsRelatedByUsuarioEntrada, PropelPDO $con = null)
    {
        $deshabilitamcsRelatedByUsuarioEntradaToDelete = $this->getDeshabilitamcsRelatedByUsuarioEntrada(new Criteria(), $con)->diff($deshabilitamcsRelatedByUsuarioEntrada);


        $this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion = $deshabilitamcsRelatedByUsuarioEntradaToDelete;

        foreach ($deshabilitamcsRelatedByUsuarioEntradaToDelete as $deshabilitamcRelatedByUsuarioEntradaRemoved) {
            $deshabilitamcRelatedByUsuarioEntradaRemoved->setUcUsersRelatedByUsuarioEntrada(null);
        }

        $this->collDeshabilitamcsRelatedByUsuarioEntrada = null;
        foreach ($deshabilitamcsRelatedByUsuarioEntrada as $deshabilitamcRelatedByUsuarioEntrada) {
            $this->addDeshabilitamcRelatedByUsuarioEntrada($deshabilitamcRelatedByUsuarioEntrada);
        }

        $this->collDeshabilitamcsRelatedByUsuarioEntrada = $deshabilitamcsRelatedByUsuarioEntrada;
        $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial = false;

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
    public function countDeshabilitamcsRelatedByUsuarioEntrada(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial && !$this->isNew();
        if (null === $this->collDeshabilitamcsRelatedByUsuarioEntrada || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitamcsRelatedByUsuarioEntrada) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDeshabilitamcsRelatedByUsuarioEntrada());
            }
            $query = DeshabilitamcQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUcUsersRelatedByUsuarioEntrada($this)
                ->count($con);
        }

        return count($this->collDeshabilitamcsRelatedByUsuarioEntrada);
    }

    /**
     * Method called to associate a Deshabilitamc object to this object
     * through the Deshabilitamc foreign key attribute.
     *
     * @param    Deshabilitamc $l Deshabilitamc
     * @return UcUsers The current object (for fluent API support)
     */
    public function addDeshabilitamcRelatedByUsuarioEntrada(Deshabilitamc $l)
    {
        if ($this->collDeshabilitamcsRelatedByUsuarioEntrada === null) {
            $this->initDeshabilitamcsRelatedByUsuarioEntrada();
            $this->collDeshabilitamcsRelatedByUsuarioEntradaPartial = true;
        }

        if (!in_array($l, $this->collDeshabilitamcsRelatedByUsuarioEntrada->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeshabilitamcRelatedByUsuarioEntrada($l);

            if ($this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion and $this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion->contains($l)) {
                $this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion->remove($this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	DeshabilitamcRelatedByUsuarioEntrada $deshabilitamcRelatedByUsuarioEntrada The deshabilitamcRelatedByUsuarioEntrada object to add.
     */
    protected function doAddDeshabilitamcRelatedByUsuarioEntrada($deshabilitamcRelatedByUsuarioEntrada)
    {
        $this->collDeshabilitamcsRelatedByUsuarioEntrada[]= $deshabilitamcRelatedByUsuarioEntrada;
        $deshabilitamcRelatedByUsuarioEntrada->setUcUsersRelatedByUsuarioEntrada($this);
    }

    /**
     * @param	DeshabilitamcRelatedByUsuarioEntrada $deshabilitamcRelatedByUsuarioEntrada The deshabilitamcRelatedByUsuarioEntrada object to remove.
     * @return UcUsers The current object (for fluent API support)
     */
    public function removeDeshabilitamcRelatedByUsuarioEntrada($deshabilitamcRelatedByUsuarioEntrada)
    {
        if ($this->getDeshabilitamcsRelatedByUsuarioEntrada()->contains($deshabilitamcRelatedByUsuarioEntrada)) {
            $this->collDeshabilitamcsRelatedByUsuarioEntrada->remove($this->collDeshabilitamcsRelatedByUsuarioEntrada->search($deshabilitamcRelatedByUsuarioEntrada));
            if (null === $this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion) {
                $this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion = clone $this->collDeshabilitamcsRelatedByUsuarioEntrada;
                $this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion->clear();
            }
            $this->deshabilitamcsRelatedByUsuarioEntradaScheduledForDeletion[]= $deshabilitamcRelatedByUsuarioEntrada;
            $deshabilitamcRelatedByUsuarioEntrada->setUcUsersRelatedByUsuarioEntrada(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UcUsers is new, it will return
     * an empty collection; or if this UcUsers has previously
     * been saved, it will retrieve related DeshabilitamcsRelatedByUsuarioEntrada from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UcUsers.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Deshabilitamc[] List of Deshabilitamc objects
     */
    public function getDeshabilitamcsRelatedByUsuarioEntradaJoinMontacargas($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DeshabilitamcQuery::create(null, $criteria);
        $query->joinWith('Montacargas', $join_behavior);

        return $this->getDeshabilitamcsRelatedByUsuarioEntrada($query, $con);
    }

    /**
     * Clears out the collDeshabilitamcsRelatedByUsuarioSalida collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return UcUsers The current object (for fluent API support)
     * @see        addDeshabilitamcsRelatedByUsuarioSalida()
     */
    public function clearDeshabilitamcsRelatedByUsuarioSalida()
    {
        $this->collDeshabilitamcsRelatedByUsuarioSalida = null; // important to set this to null since that means it is uninitialized
        $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial = null;

        return $this;
    }

    /**
     * reset is the collDeshabilitamcsRelatedByUsuarioSalida collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeshabilitamcsRelatedByUsuarioSalida($v = true)
    {
        $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial = $v;
    }

    /**
     * Initializes the collDeshabilitamcsRelatedByUsuarioSalida collection.
     *
     * By default this just sets the collDeshabilitamcsRelatedByUsuarioSalida collection to an empty array (like clearcollDeshabilitamcsRelatedByUsuarioSalida());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeshabilitamcsRelatedByUsuarioSalida($overrideExisting = true)
    {
        if (null !== $this->collDeshabilitamcsRelatedByUsuarioSalida && !$overrideExisting) {
            return;
        }
        $this->collDeshabilitamcsRelatedByUsuarioSalida = new PropelObjectCollection();
        $this->collDeshabilitamcsRelatedByUsuarioSalida->setModel('Deshabilitamc');
    }

    /**
     * Gets an array of Deshabilitamc objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this UcUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Deshabilitamc[] List of Deshabilitamc objects
     * @throws PropelException
     */
    public function getDeshabilitamcsRelatedByUsuarioSalida($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial && !$this->isNew();
        if (null === $this->collDeshabilitamcsRelatedByUsuarioSalida || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitamcsRelatedByUsuarioSalida) {
                // return empty collection
                $this->initDeshabilitamcsRelatedByUsuarioSalida();
            } else {
                $collDeshabilitamcsRelatedByUsuarioSalida = DeshabilitamcQuery::create(null, $criteria)
                    ->filterByUcUsersRelatedByUsuarioSalida($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial && count($collDeshabilitamcsRelatedByUsuarioSalida)) {
                      $this->initDeshabilitamcsRelatedByUsuarioSalida(false);

                      foreach ($collDeshabilitamcsRelatedByUsuarioSalida as $obj) {
                        if (false == $this->collDeshabilitamcsRelatedByUsuarioSalida->contains($obj)) {
                          $this->collDeshabilitamcsRelatedByUsuarioSalida->append($obj);
                        }
                      }

                      $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial = true;
                    }

                    $collDeshabilitamcsRelatedByUsuarioSalida->getInternalIterator()->rewind();

                    return $collDeshabilitamcsRelatedByUsuarioSalida;
                }

                if ($partial && $this->collDeshabilitamcsRelatedByUsuarioSalida) {
                    foreach ($this->collDeshabilitamcsRelatedByUsuarioSalida as $obj) {
                        if ($obj->isNew()) {
                            $collDeshabilitamcsRelatedByUsuarioSalida[] = $obj;
                        }
                    }
                }

                $this->collDeshabilitamcsRelatedByUsuarioSalida = $collDeshabilitamcsRelatedByUsuarioSalida;
                $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial = false;
            }
        }

        return $this->collDeshabilitamcsRelatedByUsuarioSalida;
    }

    /**
     * Sets a collection of DeshabilitamcRelatedByUsuarioSalida objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deshabilitamcsRelatedByUsuarioSalida A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return UcUsers The current object (for fluent API support)
     */
    public function setDeshabilitamcsRelatedByUsuarioSalida(PropelCollection $deshabilitamcsRelatedByUsuarioSalida, PropelPDO $con = null)
    {
        $deshabilitamcsRelatedByUsuarioSalidaToDelete = $this->getDeshabilitamcsRelatedByUsuarioSalida(new Criteria(), $con)->diff($deshabilitamcsRelatedByUsuarioSalida);


        $this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion = $deshabilitamcsRelatedByUsuarioSalidaToDelete;

        foreach ($deshabilitamcsRelatedByUsuarioSalidaToDelete as $deshabilitamcRelatedByUsuarioSalidaRemoved) {
            $deshabilitamcRelatedByUsuarioSalidaRemoved->setUcUsersRelatedByUsuarioSalida(null);
        }

        $this->collDeshabilitamcsRelatedByUsuarioSalida = null;
        foreach ($deshabilitamcsRelatedByUsuarioSalida as $deshabilitamcRelatedByUsuarioSalida) {
            $this->addDeshabilitamcRelatedByUsuarioSalida($deshabilitamcRelatedByUsuarioSalida);
        }

        $this->collDeshabilitamcsRelatedByUsuarioSalida = $deshabilitamcsRelatedByUsuarioSalida;
        $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial = false;

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
    public function countDeshabilitamcsRelatedByUsuarioSalida(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial && !$this->isNew();
        if (null === $this->collDeshabilitamcsRelatedByUsuarioSalida || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeshabilitamcsRelatedByUsuarioSalida) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDeshabilitamcsRelatedByUsuarioSalida());
            }
            $query = DeshabilitamcQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUcUsersRelatedByUsuarioSalida($this)
                ->count($con);
        }

        return count($this->collDeshabilitamcsRelatedByUsuarioSalida);
    }

    /**
     * Method called to associate a Deshabilitamc object to this object
     * through the Deshabilitamc foreign key attribute.
     *
     * @param    Deshabilitamc $l Deshabilitamc
     * @return UcUsers The current object (for fluent API support)
     */
    public function addDeshabilitamcRelatedByUsuarioSalida(Deshabilitamc $l)
    {
        if ($this->collDeshabilitamcsRelatedByUsuarioSalida === null) {
            $this->initDeshabilitamcsRelatedByUsuarioSalida();
            $this->collDeshabilitamcsRelatedByUsuarioSalidaPartial = true;
        }

        if (!in_array($l, $this->collDeshabilitamcsRelatedByUsuarioSalida->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeshabilitamcRelatedByUsuarioSalida($l);

            if ($this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion and $this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion->contains($l)) {
                $this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion->remove($this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	DeshabilitamcRelatedByUsuarioSalida $deshabilitamcRelatedByUsuarioSalida The deshabilitamcRelatedByUsuarioSalida object to add.
     */
    protected function doAddDeshabilitamcRelatedByUsuarioSalida($deshabilitamcRelatedByUsuarioSalida)
    {
        $this->collDeshabilitamcsRelatedByUsuarioSalida[]= $deshabilitamcRelatedByUsuarioSalida;
        $deshabilitamcRelatedByUsuarioSalida->setUcUsersRelatedByUsuarioSalida($this);
    }

    /**
     * @param	DeshabilitamcRelatedByUsuarioSalida $deshabilitamcRelatedByUsuarioSalida The deshabilitamcRelatedByUsuarioSalida object to remove.
     * @return UcUsers The current object (for fluent API support)
     */
    public function removeDeshabilitamcRelatedByUsuarioSalida($deshabilitamcRelatedByUsuarioSalida)
    {
        if ($this->getDeshabilitamcsRelatedByUsuarioSalida()->contains($deshabilitamcRelatedByUsuarioSalida)) {
            $this->collDeshabilitamcsRelatedByUsuarioSalida->remove($this->collDeshabilitamcsRelatedByUsuarioSalida->search($deshabilitamcRelatedByUsuarioSalida));
            if (null === $this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion) {
                $this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion = clone $this->collDeshabilitamcsRelatedByUsuarioSalida;
                $this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion->clear();
            }
            $this->deshabilitamcsRelatedByUsuarioSalidaScheduledForDeletion[]= $deshabilitamcRelatedByUsuarioSalida;
            $deshabilitamcRelatedByUsuarioSalida->setUcUsersRelatedByUsuarioSalida(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UcUsers is new, it will return
     * an empty collection; or if this UcUsers has previously
     * been saved, it will retrieve related DeshabilitamcsRelatedByUsuarioSalida from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UcUsers.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Deshabilitamc[] List of Deshabilitamc objects
     */
    public function getDeshabilitamcsRelatedByUsuarioSalidaJoinMontacargas($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DeshabilitamcQuery::create(null, $criteria);
        $query->joinWith('Montacargas', $join_behavior);

        return $this->getDeshabilitamcsRelatedByUsuarioSalida($query, $con);
    }

    /**
     * Clears out the collEmpresas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return UcUsers The current object (for fluent API support)
     * @see        addEmpresas()
     */
    public function clearEmpresas()
    {
        $this->collEmpresas = null; // important to set this to null since that means it is uninitialized
        $this->collEmpresasPartial = null;

        return $this;
    }

    /**
     * reset is the collEmpresas collection loaded partially
     *
     * @return void
     */
    public function resetPartialEmpresas($v = true)
    {
        $this->collEmpresasPartial = $v;
    }

    /**
     * Initializes the collEmpresas collection.
     *
     * By default this just sets the collEmpresas collection to an empty array (like clearcollEmpresas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEmpresas($overrideExisting = true)
    {
        if (null !== $this->collEmpresas && !$overrideExisting) {
            return;
        }
        $this->collEmpresas = new PropelObjectCollection();
        $this->collEmpresas->setModel('Empresa');
    }

    /**
     * Gets an array of Empresa objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this UcUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Empresa[] List of Empresa objects
     * @throws PropelException
     */
    public function getEmpresas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEmpresasPartial && !$this->isNew();
        if (null === $this->collEmpresas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEmpresas) {
                // return empty collection
                $this->initEmpresas();
            } else {
                $collEmpresas = EmpresaQuery::create(null, $criteria)
                    ->filterByUcUsers($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEmpresasPartial && count($collEmpresas)) {
                      $this->initEmpresas(false);

                      foreach ($collEmpresas as $obj) {
                        if (false == $this->collEmpresas->contains($obj)) {
                          $this->collEmpresas->append($obj);
                        }
                      }

                      $this->collEmpresasPartial = true;
                    }

                    $collEmpresas->getInternalIterator()->rewind();

                    return $collEmpresas;
                }

                if ($partial && $this->collEmpresas) {
                    foreach ($this->collEmpresas as $obj) {
                        if ($obj->isNew()) {
                            $collEmpresas[] = $obj;
                        }
                    }
                }

                $this->collEmpresas = $collEmpresas;
                $this->collEmpresasPartial = false;
            }
        }

        return $this->collEmpresas;
    }

    /**
     * Sets a collection of Empresa objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $empresas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return UcUsers The current object (for fluent API support)
     */
    public function setEmpresas(PropelCollection $empresas, PropelPDO $con = null)
    {
        $empresasToDelete = $this->getEmpresas(new Criteria(), $con)->diff($empresas);


        $this->empresasScheduledForDeletion = $empresasToDelete;

        foreach ($empresasToDelete as $empresaRemoved) {
            $empresaRemoved->setUcUsers(null);
        }

        $this->collEmpresas = null;
        foreach ($empresas as $empresa) {
            $this->addEmpresa($empresa);
        }

        $this->collEmpresas = $empresas;
        $this->collEmpresasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Empresa objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Empresa objects.
     * @throws PropelException
     */
    public function countEmpresas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEmpresasPartial && !$this->isNew();
        if (null === $this->collEmpresas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEmpresas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEmpresas());
            }
            $query = EmpresaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUcUsers($this)
                ->count($con);
        }

        return count($this->collEmpresas);
    }

    /**
     * Method called to associate a Empresa object to this object
     * through the Empresa foreign key attribute.
     *
     * @param    Empresa $l Empresa
     * @return UcUsers The current object (for fluent API support)
     */
    public function addEmpresa(Empresa $l)
    {
        if ($this->collEmpresas === null) {
            $this->initEmpresas();
            $this->collEmpresasPartial = true;
        }

        if (!in_array($l, $this->collEmpresas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEmpresa($l);

            if ($this->empresasScheduledForDeletion and $this->empresasScheduledForDeletion->contains($l)) {
                $this->empresasScheduledForDeletion->remove($this->empresasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Empresa $empresa The empresa object to add.
     */
    protected function doAddEmpresa($empresa)
    {
        $this->collEmpresas[]= $empresa;
        $empresa->setUcUsers($this);
    }

    /**
     * @param	Empresa $empresa The empresa object to remove.
     * @return UcUsers The current object (for fluent API support)
     */
    public function removeEmpresa($empresa)
    {
        if ($this->getEmpresas()->contains($empresa)) {
            $this->collEmpresas->remove($this->collEmpresas->search($empresa));
            if (null === $this->empresasScheduledForDeletion) {
                $this->empresasScheduledForDeletion = clone $this->collEmpresas;
                $this->empresasScheduledForDeletion->clear();
            }
            $this->empresasScheduledForDeletion[]= clone $empresa;
            $empresa->setUcUsers(null);
        }

        return $this;
    }

    /**
     * Clears out the collUsoBateriasMontacargassRelatedByUsuarioEntrada collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return UcUsers The current object (for fluent API support)
     * @see        addUsoBateriasMontacargassRelatedByUsuarioEntrada()
     */
    public function clearUsoBateriasMontacargassRelatedByUsuarioEntrada()
    {
        $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada = null; // important to set this to null since that means it is uninitialized
        $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial = null;

        return $this;
    }

    /**
     * reset is the collUsoBateriasMontacargassRelatedByUsuarioEntrada collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsoBateriasMontacargassRelatedByUsuarioEntrada($v = true)
    {
        $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial = $v;
    }

    /**
     * Initializes the collUsoBateriasMontacargassRelatedByUsuarioEntrada collection.
     *
     * By default this just sets the collUsoBateriasMontacargassRelatedByUsuarioEntrada collection to an empty array (like clearcollUsoBateriasMontacargassRelatedByUsuarioEntrada());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsoBateriasMontacargassRelatedByUsuarioEntrada($overrideExisting = true)
    {
        if (null !== $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada && !$overrideExisting) {
            return;
        }
        $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada = new PropelObjectCollection();
        $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada->setModel('UsoBateriasMontacargas');
    }

    /**
     * Gets an array of UsoBateriasMontacargas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this UcUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     * @throws PropelException
     */
    public function getUsoBateriasMontacargassRelatedByUsuarioEntrada($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial && !$this->isNew();
        if (null === $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada) {
                // return empty collection
                $this->initUsoBateriasMontacargassRelatedByUsuarioEntrada();
            } else {
                $collUsoBateriasMontacargassRelatedByUsuarioEntrada = UsoBateriasMontacargasQuery::create(null, $criteria)
                    ->filterByUcUsersRelatedByUsuarioEntrada($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial && count($collUsoBateriasMontacargassRelatedByUsuarioEntrada)) {
                      $this->initUsoBateriasMontacargassRelatedByUsuarioEntrada(false);

                      foreach ($collUsoBateriasMontacargassRelatedByUsuarioEntrada as $obj) {
                        if (false == $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada->contains($obj)) {
                          $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada->append($obj);
                        }
                      }

                      $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial = true;
                    }

                    $collUsoBateriasMontacargassRelatedByUsuarioEntrada->getInternalIterator()->rewind();

                    return $collUsoBateriasMontacargassRelatedByUsuarioEntrada;
                }

                if ($partial && $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada) {
                    foreach ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada as $obj) {
                        if ($obj->isNew()) {
                            $collUsoBateriasMontacargassRelatedByUsuarioEntrada[] = $obj;
                        }
                    }
                }

                $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada = $collUsoBateriasMontacargassRelatedByUsuarioEntrada;
                $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial = false;
            }
        }

        return $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada;
    }

    /**
     * Sets a collection of UsoBateriasMontacargasRelatedByUsuarioEntrada objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usoBateriasMontacargassRelatedByUsuarioEntrada A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return UcUsers The current object (for fluent API support)
     */
    public function setUsoBateriasMontacargassRelatedByUsuarioEntrada(PropelCollection $usoBateriasMontacargassRelatedByUsuarioEntrada, PropelPDO $con = null)
    {
        $usoBateriasMontacargassRelatedByUsuarioEntradaToDelete = $this->getUsoBateriasMontacargassRelatedByUsuarioEntrada(new Criteria(), $con)->diff($usoBateriasMontacargassRelatedByUsuarioEntrada);


        $this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion = $usoBateriasMontacargassRelatedByUsuarioEntradaToDelete;

        foreach ($usoBateriasMontacargassRelatedByUsuarioEntradaToDelete as $usoBateriasMontacargasRelatedByUsuarioEntradaRemoved) {
            $usoBateriasMontacargasRelatedByUsuarioEntradaRemoved->setUcUsersRelatedByUsuarioEntrada(null);
        }

        $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada = null;
        foreach ($usoBateriasMontacargassRelatedByUsuarioEntrada as $usoBateriasMontacargasRelatedByUsuarioEntrada) {
            $this->addUsoBateriasMontacargasRelatedByUsuarioEntrada($usoBateriasMontacargasRelatedByUsuarioEntrada);
        }

        $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada = $usoBateriasMontacargassRelatedByUsuarioEntrada;
        $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial = false;

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
    public function countUsoBateriasMontacargassRelatedByUsuarioEntrada(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial && !$this->isNew();
        if (null === $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsoBateriasMontacargassRelatedByUsuarioEntrada());
            }
            $query = UsoBateriasMontacargasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUcUsersRelatedByUsuarioEntrada($this)
                ->count($con);
        }

        return count($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada);
    }

    /**
     * Method called to associate a UsoBateriasMontacargas object to this object
     * through the UsoBateriasMontacargas foreign key attribute.
     *
     * @param    UsoBateriasMontacargas $l UsoBateriasMontacargas
     * @return UcUsers The current object (for fluent API support)
     */
    public function addUsoBateriasMontacargasRelatedByUsuarioEntrada(UsoBateriasMontacargas $l)
    {
        if ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada === null) {
            $this->initUsoBateriasMontacargassRelatedByUsuarioEntrada();
            $this->collUsoBateriasMontacargassRelatedByUsuarioEntradaPartial = true;
        }

        if (!in_array($l, $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUsoBateriasMontacargasRelatedByUsuarioEntrada($l);

            if ($this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion and $this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion->contains($l)) {
                $this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion->remove($this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	UsoBateriasMontacargasRelatedByUsuarioEntrada $usoBateriasMontacargasRelatedByUsuarioEntrada The usoBateriasMontacargasRelatedByUsuarioEntrada object to add.
     */
    protected function doAddUsoBateriasMontacargasRelatedByUsuarioEntrada($usoBateriasMontacargasRelatedByUsuarioEntrada)
    {
        $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada[]= $usoBateriasMontacargasRelatedByUsuarioEntrada;
        $usoBateriasMontacargasRelatedByUsuarioEntrada->setUcUsersRelatedByUsuarioEntrada($this);
    }

    /**
     * @param	UsoBateriasMontacargasRelatedByUsuarioEntrada $usoBateriasMontacargasRelatedByUsuarioEntrada The usoBateriasMontacargasRelatedByUsuarioEntrada object to remove.
     * @return UcUsers The current object (for fluent API support)
     */
    public function removeUsoBateriasMontacargasRelatedByUsuarioEntrada($usoBateriasMontacargasRelatedByUsuarioEntrada)
    {
        if ($this->getUsoBateriasMontacargassRelatedByUsuarioEntrada()->contains($usoBateriasMontacargasRelatedByUsuarioEntrada)) {
            $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada->remove($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada->search($usoBateriasMontacargasRelatedByUsuarioEntrada));
            if (null === $this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion) {
                $this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion = clone $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada;
                $this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion->clear();
            }
            $this->usoBateriasMontacargassRelatedByUsuarioEntradaScheduledForDeletion[]= $usoBateriasMontacargasRelatedByUsuarioEntrada;
            $usoBateriasMontacargasRelatedByUsuarioEntrada->setUcUsersRelatedByUsuarioEntrada(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UcUsers is new, it will return
     * an empty collection; or if this UcUsers has previously
     * been saved, it will retrieve related UsoBateriasMontacargassRelatedByUsuarioEntrada from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UcUsers.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     */
    public function getUsoBateriasMontacargassRelatedByUsuarioEntradaJoinBaterias($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasMontacargasQuery::create(null, $criteria);
        $query->joinWith('Baterias', $join_behavior);

        return $this->getUsoBateriasMontacargassRelatedByUsuarioEntrada($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UcUsers is new, it will return
     * an empty collection; or if this UcUsers has previously
     * been saved, it will retrieve related UsoBateriasMontacargassRelatedByUsuarioEntrada from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UcUsers.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     */
    public function getUsoBateriasMontacargassRelatedByUsuarioEntradaJoinMontacargas($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasMontacargasQuery::create(null, $criteria);
        $query->joinWith('Montacargas', $join_behavior);

        return $this->getUsoBateriasMontacargassRelatedByUsuarioEntrada($query, $con);
    }

    /**
     * Clears out the collUsoBateriasMontacargassRelatedByUsuarioSalida collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return UcUsers The current object (for fluent API support)
     * @see        addUsoBateriasMontacargassRelatedByUsuarioSalida()
     */
    public function clearUsoBateriasMontacargassRelatedByUsuarioSalida()
    {
        $this->collUsoBateriasMontacargassRelatedByUsuarioSalida = null; // important to set this to null since that means it is uninitialized
        $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial = null;

        return $this;
    }

    /**
     * reset is the collUsoBateriasMontacargassRelatedByUsuarioSalida collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsoBateriasMontacargassRelatedByUsuarioSalida($v = true)
    {
        $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial = $v;
    }

    /**
     * Initializes the collUsoBateriasMontacargassRelatedByUsuarioSalida collection.
     *
     * By default this just sets the collUsoBateriasMontacargassRelatedByUsuarioSalida collection to an empty array (like clearcollUsoBateriasMontacargassRelatedByUsuarioSalida());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsoBateriasMontacargassRelatedByUsuarioSalida($overrideExisting = true)
    {
        if (null !== $this->collUsoBateriasMontacargassRelatedByUsuarioSalida && !$overrideExisting) {
            return;
        }
        $this->collUsoBateriasMontacargassRelatedByUsuarioSalida = new PropelObjectCollection();
        $this->collUsoBateriasMontacargassRelatedByUsuarioSalida->setModel('UsoBateriasMontacargas');
    }

    /**
     * Gets an array of UsoBateriasMontacargas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this UcUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     * @throws PropelException
     */
    public function getUsoBateriasMontacargassRelatedByUsuarioSalida($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial && !$this->isNew();
        if (null === $this->collUsoBateriasMontacargassRelatedByUsuarioSalida || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsoBateriasMontacargassRelatedByUsuarioSalida) {
                // return empty collection
                $this->initUsoBateriasMontacargassRelatedByUsuarioSalida();
            } else {
                $collUsoBateriasMontacargassRelatedByUsuarioSalida = UsoBateriasMontacargasQuery::create(null, $criteria)
                    ->filterByUcUsersRelatedByUsuarioSalida($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial && count($collUsoBateriasMontacargassRelatedByUsuarioSalida)) {
                      $this->initUsoBateriasMontacargassRelatedByUsuarioSalida(false);

                      foreach ($collUsoBateriasMontacargassRelatedByUsuarioSalida as $obj) {
                        if (false == $this->collUsoBateriasMontacargassRelatedByUsuarioSalida->contains($obj)) {
                          $this->collUsoBateriasMontacargassRelatedByUsuarioSalida->append($obj);
                        }
                      }

                      $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial = true;
                    }

                    $collUsoBateriasMontacargassRelatedByUsuarioSalida->getInternalIterator()->rewind();

                    return $collUsoBateriasMontacargassRelatedByUsuarioSalida;
                }

                if ($partial && $this->collUsoBateriasMontacargassRelatedByUsuarioSalida) {
                    foreach ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida as $obj) {
                        if ($obj->isNew()) {
                            $collUsoBateriasMontacargassRelatedByUsuarioSalida[] = $obj;
                        }
                    }
                }

                $this->collUsoBateriasMontacargassRelatedByUsuarioSalida = $collUsoBateriasMontacargassRelatedByUsuarioSalida;
                $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial = false;
            }
        }

        return $this->collUsoBateriasMontacargassRelatedByUsuarioSalida;
    }

    /**
     * Sets a collection of UsoBateriasMontacargasRelatedByUsuarioSalida objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usoBateriasMontacargassRelatedByUsuarioSalida A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return UcUsers The current object (for fluent API support)
     */
    public function setUsoBateriasMontacargassRelatedByUsuarioSalida(PropelCollection $usoBateriasMontacargassRelatedByUsuarioSalida, PropelPDO $con = null)
    {
        $usoBateriasMontacargassRelatedByUsuarioSalidaToDelete = $this->getUsoBateriasMontacargassRelatedByUsuarioSalida(new Criteria(), $con)->diff($usoBateriasMontacargassRelatedByUsuarioSalida);


        $this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion = $usoBateriasMontacargassRelatedByUsuarioSalidaToDelete;

        foreach ($usoBateriasMontacargassRelatedByUsuarioSalidaToDelete as $usoBateriasMontacargasRelatedByUsuarioSalidaRemoved) {
            $usoBateriasMontacargasRelatedByUsuarioSalidaRemoved->setUcUsersRelatedByUsuarioSalida(null);
        }

        $this->collUsoBateriasMontacargassRelatedByUsuarioSalida = null;
        foreach ($usoBateriasMontacargassRelatedByUsuarioSalida as $usoBateriasMontacargasRelatedByUsuarioSalida) {
            $this->addUsoBateriasMontacargasRelatedByUsuarioSalida($usoBateriasMontacargasRelatedByUsuarioSalida);
        }

        $this->collUsoBateriasMontacargassRelatedByUsuarioSalida = $usoBateriasMontacargassRelatedByUsuarioSalida;
        $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial = false;

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
    public function countUsoBateriasMontacargassRelatedByUsuarioSalida(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial && !$this->isNew();
        if (null === $this->collUsoBateriasMontacargassRelatedByUsuarioSalida || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsoBateriasMontacargassRelatedByUsuarioSalida) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsoBateriasMontacargassRelatedByUsuarioSalida());
            }
            $query = UsoBateriasMontacargasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUcUsersRelatedByUsuarioSalida($this)
                ->count($con);
        }

        return count($this->collUsoBateriasMontacargassRelatedByUsuarioSalida);
    }

    /**
     * Method called to associate a UsoBateriasMontacargas object to this object
     * through the UsoBateriasMontacargas foreign key attribute.
     *
     * @param    UsoBateriasMontacargas $l UsoBateriasMontacargas
     * @return UcUsers The current object (for fluent API support)
     */
    public function addUsoBateriasMontacargasRelatedByUsuarioSalida(UsoBateriasMontacargas $l)
    {
        if ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida === null) {
            $this->initUsoBateriasMontacargassRelatedByUsuarioSalida();
            $this->collUsoBateriasMontacargassRelatedByUsuarioSalidaPartial = true;
        }

        if (!in_array($l, $this->collUsoBateriasMontacargassRelatedByUsuarioSalida->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUsoBateriasMontacargasRelatedByUsuarioSalida($l);

            if ($this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion and $this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion->contains($l)) {
                $this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion->remove($this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	UsoBateriasMontacargasRelatedByUsuarioSalida $usoBateriasMontacargasRelatedByUsuarioSalida The usoBateriasMontacargasRelatedByUsuarioSalida object to add.
     */
    protected function doAddUsoBateriasMontacargasRelatedByUsuarioSalida($usoBateriasMontacargasRelatedByUsuarioSalida)
    {
        $this->collUsoBateriasMontacargassRelatedByUsuarioSalida[]= $usoBateriasMontacargasRelatedByUsuarioSalida;
        $usoBateriasMontacargasRelatedByUsuarioSalida->setUcUsersRelatedByUsuarioSalida($this);
    }

    /**
     * @param	UsoBateriasMontacargasRelatedByUsuarioSalida $usoBateriasMontacargasRelatedByUsuarioSalida The usoBateriasMontacargasRelatedByUsuarioSalida object to remove.
     * @return UcUsers The current object (for fluent API support)
     */
    public function removeUsoBateriasMontacargasRelatedByUsuarioSalida($usoBateriasMontacargasRelatedByUsuarioSalida)
    {
        if ($this->getUsoBateriasMontacargassRelatedByUsuarioSalida()->contains($usoBateriasMontacargasRelatedByUsuarioSalida)) {
            $this->collUsoBateriasMontacargassRelatedByUsuarioSalida->remove($this->collUsoBateriasMontacargassRelatedByUsuarioSalida->search($usoBateriasMontacargasRelatedByUsuarioSalida));
            if (null === $this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion) {
                $this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion = clone $this->collUsoBateriasMontacargassRelatedByUsuarioSalida;
                $this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion->clear();
            }
            $this->usoBateriasMontacargassRelatedByUsuarioSalidaScheduledForDeletion[]= $usoBateriasMontacargasRelatedByUsuarioSalida;
            $usoBateriasMontacargasRelatedByUsuarioSalida->setUcUsersRelatedByUsuarioSalida(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UcUsers is new, it will return
     * an empty collection; or if this UcUsers has previously
     * been saved, it will retrieve related UsoBateriasMontacargassRelatedByUsuarioSalida from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UcUsers.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     */
    public function getUsoBateriasMontacargassRelatedByUsuarioSalidaJoinBaterias($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasMontacargasQuery::create(null, $criteria);
        $query->joinWith('Baterias', $join_behavior);

        return $this->getUsoBateriasMontacargassRelatedByUsuarioSalida($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UcUsers is new, it will return
     * an empty collection; or if this UcUsers has previously
     * been saved, it will retrieve related UsoBateriasMontacargassRelatedByUsuarioSalida from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UcUsers.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsoBateriasMontacargas[] List of UsoBateriasMontacargas objects
     */
    public function getUsoBateriasMontacargassRelatedByUsuarioSalidaJoinMontacargas($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsoBateriasMontacargasQuery::create(null, $criteria);
        $query->joinWith('Montacargas', $join_behavior);

        return $this->getUsoBateriasMontacargassRelatedByUsuarioSalida($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->idsucursal = null;
        $this->user_name = null;
        $this->display_name = null;
        $this->password = null;
        $this->email = null;
        $this->activation_token = null;
        $this->last_activation_request = null;
        $this->lost_password_request = null;
        $this->active = null;
        $this->title = null;
        $this->sign_up_stamp = null;
        $this->last_sign_in_stamp = null;
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
            if ($this->collDeshabilitamcsRelatedByUsuarioEntrada) {
                foreach ($this->collDeshabilitamcsRelatedByUsuarioEntrada as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDeshabilitamcsRelatedByUsuarioSalida) {
                foreach ($this->collDeshabilitamcsRelatedByUsuarioSalida as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEmpresas) {
                foreach ($this->collEmpresas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada) {
                foreach ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida) {
                foreach ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSucursal instanceof Persistent) {
              $this->aSucursal->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDeshabilitamcsRelatedByUsuarioEntrada instanceof PropelCollection) {
            $this->collDeshabilitamcsRelatedByUsuarioEntrada->clearIterator();
        }
        $this->collDeshabilitamcsRelatedByUsuarioEntrada = null;
        if ($this->collDeshabilitamcsRelatedByUsuarioSalida instanceof PropelCollection) {
            $this->collDeshabilitamcsRelatedByUsuarioSalida->clearIterator();
        }
        $this->collDeshabilitamcsRelatedByUsuarioSalida = null;
        if ($this->collEmpresas instanceof PropelCollection) {
            $this->collEmpresas->clearIterator();
        }
        $this->collEmpresas = null;
        if ($this->collUsoBateriasMontacargassRelatedByUsuarioEntrada instanceof PropelCollection) {
            $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada->clearIterator();
        }
        $this->collUsoBateriasMontacargassRelatedByUsuarioEntrada = null;
        if ($this->collUsoBateriasMontacargassRelatedByUsuarioSalida instanceof PropelCollection) {
            $this->collUsoBateriasMontacargassRelatedByUsuarioSalida->clearIterator();
        }
        $this->collUsoBateriasMontacargassRelatedByUsuarioSalida = null;
        $this->aSucursal = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UcUsersPeer::DEFAULT_STRING_FORMAT);
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
