<?php


/**
 * Base static class for performing query and update operations on the 'montacargas' table.
 *
 *
 *
 * @package propel.generator.regetrack.om
 */
abstract class BaseMontacargasPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'regetrack';

    /** the table name for this class */
    const TABLE_NAME = 'montacargas';

    /** the related Propel class for this table */
    const OM_CLASS = 'Montacargas';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MontacargasTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 16;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 16;

    /** the column name for the idmontacargas field */
    const IDMONTACARGAS = 'montacargas.idmontacargas';

    /** the column name for the idsucursal field */
    const IDSUCURSAL = 'montacargas.idsucursal';

    /** the column name for the montacargas_modelo field */
    const MONTACARGAS_MODELO = 'montacargas.montacargas_modelo';

    /** the column name for the montacargas_marca field */
    const MONTACARGAS_MARCA = 'montacargas.montacargas_marca';

    /** the column name for the montacargas_c field */
    const MONTACARGAS_C = 'montacargas.montacargas_c';

    /** the column name for the montacargas_k field */
    const MONTACARGAS_K = 'montacargas.montacargas_k';

    /** the column name for the montacargas_p field */
    const MONTACARGAS_P = 'montacargas.montacargas_p';

    /** the column name for the montacargas_t field */
    const MONTACARGAS_T = 'montacargas.montacargas_t';

    /** the column name for the montacargas_e field */
    const MONTACARGAS_E = 'montacargas.montacargas_e';

    /** the column name for the montacargas_volts field */
    const MONTACARGAS_VOLTS = 'montacargas.montacargas_volts';

    /** the column name for the montacargas_amperaje field */
    const MONTACARGAS_AMPERAJE = 'montacargas.montacargas_amperaje';

    /** the column name for the montacargas_nombre field */
    const MONTACARGAS_NOMBRE = 'montacargas.montacargas_nombre';

    /** the column name for the montacargas_numserie field */
    const MONTACARGAS_NUMSERIE = 'montacargas.montacargas_numserie';

    /** the column name for the montacargas_comprador field */
    const MONTACARGAS_COMPRADOR = 'montacargas.montacargas_comprador';

    /** the column name for the montacargas_ciclosmant field */
    const MONTACARGAS_CICLOSMANT = 'montacargas.montacargas_ciclosmant';

    /** the column name for the montacargas_ciclosiniciales field */
    const MONTACARGAS_CICLOSINICIALES = 'montacargas.montacargas_ciclosiniciales';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Montacargas objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Montacargas[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MontacargasPeer::$fieldNames[MontacargasPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idmontacargas', 'Idsucursal', 'MontacargasModelo', 'MontacargasMarca', 'MontacargasC', 'MontacargasK', 'MontacargasP', 'MontacargasT', 'MontacargasE', 'MontacargasVolts', 'MontacargasAmperaje', 'MontacargasNombre', 'MontacargasNumserie', 'MontacargasComprador', 'MontacargasCiclosmant', 'MontacargasCiclosiniciales', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idmontacargas', 'idsucursal', 'montacargasModelo', 'montacargasMarca', 'montacargasC', 'montacargasK', 'montacargasP', 'montacargasT', 'montacargasE', 'montacargasVolts', 'montacargasAmperaje', 'montacargasNombre', 'montacargasNumserie', 'montacargasComprador', 'montacargasCiclosmant', 'montacargasCiclosiniciales', ),
        BasePeer::TYPE_COLNAME => array (MontacargasPeer::IDMONTACARGAS, MontacargasPeer::IDSUCURSAL, MontacargasPeer::MONTACARGAS_MODELO, MontacargasPeer::MONTACARGAS_MARCA, MontacargasPeer::MONTACARGAS_C, MontacargasPeer::MONTACARGAS_K, MontacargasPeer::MONTACARGAS_P, MontacargasPeer::MONTACARGAS_T, MontacargasPeer::MONTACARGAS_E, MontacargasPeer::MONTACARGAS_VOLTS, MontacargasPeer::MONTACARGAS_AMPERAJE, MontacargasPeer::MONTACARGAS_NOMBRE, MontacargasPeer::MONTACARGAS_NUMSERIE, MontacargasPeer::MONTACARGAS_COMPRADOR, MontacargasPeer::MONTACARGAS_CICLOSMANT, MontacargasPeer::MONTACARGAS_CICLOSINICIALES, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDMONTACARGAS', 'IDSUCURSAL', 'MONTACARGAS_MODELO', 'MONTACARGAS_MARCA', 'MONTACARGAS_C', 'MONTACARGAS_K', 'MONTACARGAS_P', 'MONTACARGAS_T', 'MONTACARGAS_E', 'MONTACARGAS_VOLTS', 'MONTACARGAS_AMPERAJE', 'MONTACARGAS_NOMBRE', 'MONTACARGAS_NUMSERIE', 'MONTACARGAS_COMPRADOR', 'MONTACARGAS_CICLOSMANT', 'MONTACARGAS_CICLOSINICIALES', ),
        BasePeer::TYPE_FIELDNAME => array ('idmontacargas', 'idsucursal', 'montacargas_modelo', 'montacargas_marca', 'montacargas_c', 'montacargas_k', 'montacargas_p', 'montacargas_t', 'montacargas_e', 'montacargas_volts', 'montacargas_amperaje', 'montacargas_nombre', 'montacargas_numserie', 'montacargas_comprador', 'montacargas_ciclosmant', 'montacargas_ciclosiniciales', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MontacargasPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idmontacargas' => 0, 'Idsucursal' => 1, 'MontacargasModelo' => 2, 'MontacargasMarca' => 3, 'MontacargasC' => 4, 'MontacargasK' => 5, 'MontacargasP' => 6, 'MontacargasT' => 7, 'MontacargasE' => 8, 'MontacargasVolts' => 9, 'MontacargasAmperaje' => 10, 'MontacargasNombre' => 11, 'MontacargasNumserie' => 12, 'MontacargasComprador' => 13, 'MontacargasCiclosmant' => 14, 'MontacargasCiclosiniciales' => 15, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idmontacargas' => 0, 'idsucursal' => 1, 'montacargasModelo' => 2, 'montacargasMarca' => 3, 'montacargasC' => 4, 'montacargasK' => 5, 'montacargasP' => 6, 'montacargasT' => 7, 'montacargasE' => 8, 'montacargasVolts' => 9, 'montacargasAmperaje' => 10, 'montacargasNombre' => 11, 'montacargasNumserie' => 12, 'montacargasComprador' => 13, 'montacargasCiclosmant' => 14, 'montacargasCiclosiniciales' => 15, ),
        BasePeer::TYPE_COLNAME => array (MontacargasPeer::IDMONTACARGAS => 0, MontacargasPeer::IDSUCURSAL => 1, MontacargasPeer::MONTACARGAS_MODELO => 2, MontacargasPeer::MONTACARGAS_MARCA => 3, MontacargasPeer::MONTACARGAS_C => 4, MontacargasPeer::MONTACARGAS_K => 5, MontacargasPeer::MONTACARGAS_P => 6, MontacargasPeer::MONTACARGAS_T => 7, MontacargasPeer::MONTACARGAS_E => 8, MontacargasPeer::MONTACARGAS_VOLTS => 9, MontacargasPeer::MONTACARGAS_AMPERAJE => 10, MontacargasPeer::MONTACARGAS_NOMBRE => 11, MontacargasPeer::MONTACARGAS_NUMSERIE => 12, MontacargasPeer::MONTACARGAS_COMPRADOR => 13, MontacargasPeer::MONTACARGAS_CICLOSMANT => 14, MontacargasPeer::MONTACARGAS_CICLOSINICIALES => 15, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDMONTACARGAS' => 0, 'IDSUCURSAL' => 1, 'MONTACARGAS_MODELO' => 2, 'MONTACARGAS_MARCA' => 3, 'MONTACARGAS_C' => 4, 'MONTACARGAS_K' => 5, 'MONTACARGAS_P' => 6, 'MONTACARGAS_T' => 7, 'MONTACARGAS_E' => 8, 'MONTACARGAS_VOLTS' => 9, 'MONTACARGAS_AMPERAJE' => 10, 'MONTACARGAS_NOMBRE' => 11, 'MONTACARGAS_NUMSERIE' => 12, 'MONTACARGAS_COMPRADOR' => 13, 'MONTACARGAS_CICLOSMANT' => 14, 'MONTACARGAS_CICLOSINICIALES' => 15, ),
        BasePeer::TYPE_FIELDNAME => array ('idmontacargas' => 0, 'idsucursal' => 1, 'montacargas_modelo' => 2, 'montacargas_marca' => 3, 'montacargas_c' => 4, 'montacargas_k' => 5, 'montacargas_p' => 6, 'montacargas_t' => 7, 'montacargas_e' => 8, 'montacargas_volts' => 9, 'montacargas_amperaje' => 10, 'montacargas_nombre' => 11, 'montacargas_numserie' => 12, 'montacargas_comprador' => 13, 'montacargas_ciclosmant' => 14, 'montacargas_ciclosiniciales' => 15, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = MontacargasPeer::getFieldNames($toType);
        $key = isset(MontacargasPeer::$fieldKeys[$fromType][$name]) ? MontacargasPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MontacargasPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, MontacargasPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MontacargasPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. MontacargasPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MontacargasPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(MontacargasPeer::IDMONTACARGAS);
            $criteria->addSelectColumn(MontacargasPeer::IDSUCURSAL);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_MODELO);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_MARCA);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_C);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_K);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_P);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_T);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_E);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_VOLTS);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_AMPERAJE);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_NOMBRE);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_NUMSERIE);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_COMPRADOR);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_CICLOSMANT);
            $criteria->addSelectColumn(MontacargasPeer::MONTACARGAS_CICLOSINICIALES);
        } else {
            $criteria->addSelectColumn($alias . '.idmontacargas');
            $criteria->addSelectColumn($alias . '.idsucursal');
            $criteria->addSelectColumn($alias . '.montacargas_modelo');
            $criteria->addSelectColumn($alias . '.montacargas_marca');
            $criteria->addSelectColumn($alias . '.montacargas_c');
            $criteria->addSelectColumn($alias . '.montacargas_k');
            $criteria->addSelectColumn($alias . '.montacargas_p');
            $criteria->addSelectColumn($alias . '.montacargas_t');
            $criteria->addSelectColumn($alias . '.montacargas_e');
            $criteria->addSelectColumn($alias . '.montacargas_volts');
            $criteria->addSelectColumn($alias . '.montacargas_amperaje');
            $criteria->addSelectColumn($alias . '.montacargas_nombre');
            $criteria->addSelectColumn($alias . '.montacargas_numserie');
            $criteria->addSelectColumn($alias . '.montacargas_comprador');
            $criteria->addSelectColumn($alias . '.montacargas_ciclosmant');
            $criteria->addSelectColumn($alias . '.montacargas_ciclosiniciales');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MontacargasPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return Montacargas
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MontacargasPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return MontacargasPeer::populateObjects(MontacargasPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MontacargasPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MontacargasPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param Montacargas $obj A Montacargas object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdmontacargas();
            } // if key === null
            MontacargasPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Montacargas object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Montacargas) {
                $key = (string) $value->getIdmontacargas();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Montacargas object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MontacargasPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Montacargas Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MontacargasPeer::$instances[$key])) {
                return MontacargasPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (MontacargasPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        MontacargasPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to montacargas
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in DeshabilitamcPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        DeshabilitamcPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = MontacargasPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MontacargasPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MontacargasPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Montacargas object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MontacargasPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MontacargasPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MontacargasPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MontacargasPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MontacargasPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Sucursal table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSucursal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MontacargasPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Montacargas objects pre-filled with their Sucursal objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Montacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSucursal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MontacargasPeer::DATABASE_NAME);
        }

        MontacargasPeer::addSelectColumns($criteria);
        $startcol = MontacargasPeer::NUM_HYDRATE_COLUMNS;
        SucursalPeer::addSelectColumns($criteria);

        $criteria->addJoin(MontacargasPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SucursalPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SucursalPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SucursalPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SucursalPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Montacargas) to $obj2 (Sucursal)
                $obj2->addMontacargas($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MontacargasPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Montacargas objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Montacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MontacargasPeer::DATABASE_NAME);
        }

        MontacargasPeer::addSelectColumns($criteria);
        $startcol2 = MontacargasPeer::NUM_HYDRATE_COLUMNS;

        SucursalPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SucursalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MontacargasPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Sucursal rows

            $key2 = SucursalPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = SucursalPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SucursalPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SucursalPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Montacargas) to the collection in $obj2 (Sucursal)
                $obj2->addMontacargas($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(MontacargasPeer::DATABASE_NAME)->getTable(MontacargasPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMontacargasPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMontacargasPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \MontacargasTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return MontacargasPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Montacargas or Criteria object.
     *
     * @param      mixed $values Criteria or Montacargas object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Montacargas object
        }

        if ($criteria->containsKey(MontacargasPeer::IDMONTACARGAS) && $criteria->keyContainsValue(MontacargasPeer::IDMONTACARGAS) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MontacargasPeer::IDMONTACARGAS.')');
        }


        // Set the correct dbName
        $criteria->setDbName(MontacargasPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Montacargas or Criteria object.
     *
     * @param      mixed $values Criteria or Montacargas object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MontacargasPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MontacargasPeer::IDMONTACARGAS);
            $value = $criteria->remove(MontacargasPeer::IDMONTACARGAS);
            if ($value) {
                $selectCriteria->add(MontacargasPeer::IDMONTACARGAS, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MontacargasPeer::TABLE_NAME);
            }

        } else { // $values is Montacargas object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MontacargasPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the montacargas table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += MontacargasPeer::doOnDeleteCascade(new Criteria(MontacargasPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(MontacargasPeer::TABLE_NAME, $con, MontacargasPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MontacargasPeer::clearInstancePool();
            MontacargasPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Montacargas or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Montacargas object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Montacargas) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MontacargasPeer::DATABASE_NAME);
            $criteria->add(MontacargasPeer::IDMONTACARGAS, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(MontacargasPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += MontacargasPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                MontacargasPeer::clearInstancePool();
            } elseif ($values instanceof Montacargas) { // it's a model object
                MontacargasPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    MontacargasPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            MontacargasPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = MontacargasPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Deshabilitamc objects
            $criteria = new Criteria(DeshabilitamcPeer::DATABASE_NAME);

            $criteria->add(DeshabilitamcPeer::IDMONTACARGAS, $obj->getIdmontacargas());
            $affectedRows += DeshabilitamcPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Montacargas object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Montacargas $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MontacargasPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MontacargasPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(MontacargasPeer::DATABASE_NAME, MontacargasPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Montacargas
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = MontacargasPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(MontacargasPeer::DATABASE_NAME);
        $criteria->add(MontacargasPeer::IDMONTACARGAS, $pk);

        $v = MontacargasPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Montacargas[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(MontacargasPeer::DATABASE_NAME);
            $criteria->add(MontacargasPeer::IDMONTACARGAS, $pks, Criteria::IN);
            $objs = MontacargasPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseMontacargasPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMontacargasPeer::buildTableMap();

