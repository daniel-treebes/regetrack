<?php


/**
 * Base static class for performing query and update operations on the 'cargadores' table.
 *
 *
 *
 * @package propel.generator.regetrack.om
 */
abstract class BaseCargadoresPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'regetrack';

    /** the table name for this class */
    const TABLE_NAME = 'cargadores';

    /** the related Propel class for this table */
    const OM_CLASS = 'Cargadores';

    /** the related TableMap class for this table */
    const TM_CLASS = 'CargadoresTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the idcargadores field */
    const IDCARGADORES = 'cargadores.idcargadores';

    /** the column name for the idsucursal field */
    const IDSUCURSAL = 'cargadores.idsucursal';

    /** the column name for the cargadores_modelo field */
    const CARGADORES_MODELO = 'cargadores.cargadores_modelo';

    /** the column name for the cargadores_marca field */
    const CARGADORES_MARCA = 'cargadores.cargadores_marca';

    /** the column name for the cargadores_e field */
    const CARGADORES_E = 'cargadores.cargadores_e';

    /** the column name for the cargadores_volts field */
    const CARGADORES_VOLTS = 'cargadores.cargadores_volts';

    /** the column name for the cargadores_amperaje field */
    const CARGADORES_AMPERAJE = 'cargadores.cargadores_amperaje';

    /** the column name for the cargadores_comprador field */
    const CARGADORES_COMPRADOR = 'cargadores.cargadores_comprador';

    /** the column name for the cargadores_nombre field */
    const CARGADORES_NOMBRE = 'cargadores.cargadores_nombre';

    /** the column name for the cargadores_numserie field */
    const CARGADORES_NUMSERIE = 'cargadores.cargadores_numserie';

    /** the column name for the cargadores_tipo field */
    const CARGADORES_TIPO = 'cargadores.cargadores_tipo';

    /** the column name for the cargadores_baja field */
    const CARGADORES_BAJA = 'cargadores.cargadores_baja';

    /** The enumerated values for the cargadores_tipo field */
    const CARGADORES_TIPO_CARGADOR = 'Cargador';
    const CARGADORES_TIPO_BODEGA = 'Bodega';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Cargadores objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Cargadores[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. CargadoresPeer::$fieldNames[CargadoresPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idcargadores', 'Idsucursal', 'CargadoresModelo', 'CargadoresMarca', 'CargadoresE', 'CargadoresVolts', 'CargadoresAmperaje', 'CargadoresComprador', 'CargadoresNombre', 'CargadoresNumserie', 'CargadoresTipo', 'CargadoresBaja', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idcargadores', 'idsucursal', 'cargadoresModelo', 'cargadoresMarca', 'cargadoresE', 'cargadoresVolts', 'cargadoresAmperaje', 'cargadoresComprador', 'cargadoresNombre', 'cargadoresNumserie', 'cargadoresTipo', 'cargadoresBaja', ),
        BasePeer::TYPE_COLNAME => array (CargadoresPeer::IDCARGADORES, CargadoresPeer::IDSUCURSAL, CargadoresPeer::CARGADORES_MODELO, CargadoresPeer::CARGADORES_MARCA, CargadoresPeer::CARGADORES_E, CargadoresPeer::CARGADORES_VOLTS, CargadoresPeer::CARGADORES_AMPERAJE, CargadoresPeer::CARGADORES_COMPRADOR, CargadoresPeer::CARGADORES_NOMBRE, CargadoresPeer::CARGADORES_NUMSERIE, CargadoresPeer::CARGADORES_TIPO, CargadoresPeer::CARGADORES_BAJA, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCARGADORES', 'IDSUCURSAL', 'CARGADORES_MODELO', 'CARGADORES_MARCA', 'CARGADORES_E', 'CARGADORES_VOLTS', 'CARGADORES_AMPERAJE', 'CARGADORES_COMPRADOR', 'CARGADORES_NOMBRE', 'CARGADORES_NUMSERIE', 'CARGADORES_TIPO', 'CARGADORES_BAJA', ),
        BasePeer::TYPE_FIELDNAME => array ('idcargadores', 'idsucursal', 'cargadores_modelo', 'cargadores_marca', 'cargadores_e', 'cargadores_volts', 'cargadores_amperaje', 'cargadores_comprador', 'cargadores_nombre', 'cargadores_numserie', 'cargadores_tipo', 'cargadores_baja', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. CargadoresPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idcargadores' => 0, 'Idsucursal' => 1, 'CargadoresModelo' => 2, 'CargadoresMarca' => 3, 'CargadoresE' => 4, 'CargadoresVolts' => 5, 'CargadoresAmperaje' => 6, 'CargadoresComprador' => 7, 'CargadoresNombre' => 8, 'CargadoresNumserie' => 9, 'CargadoresTipo' => 10, 'CargadoresBaja' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idcargadores' => 0, 'idsucursal' => 1, 'cargadoresModelo' => 2, 'cargadoresMarca' => 3, 'cargadoresE' => 4, 'cargadoresVolts' => 5, 'cargadoresAmperaje' => 6, 'cargadoresComprador' => 7, 'cargadoresNombre' => 8, 'cargadoresNumserie' => 9, 'cargadoresTipo' => 10, 'cargadoresBaja' => 11, ),
        BasePeer::TYPE_COLNAME => array (CargadoresPeer::IDCARGADORES => 0, CargadoresPeer::IDSUCURSAL => 1, CargadoresPeer::CARGADORES_MODELO => 2, CargadoresPeer::CARGADORES_MARCA => 3, CargadoresPeer::CARGADORES_E => 4, CargadoresPeer::CARGADORES_VOLTS => 5, CargadoresPeer::CARGADORES_AMPERAJE => 6, CargadoresPeer::CARGADORES_COMPRADOR => 7, CargadoresPeer::CARGADORES_NOMBRE => 8, CargadoresPeer::CARGADORES_NUMSERIE => 9, CargadoresPeer::CARGADORES_TIPO => 10, CargadoresPeer::CARGADORES_BAJA => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCARGADORES' => 0, 'IDSUCURSAL' => 1, 'CARGADORES_MODELO' => 2, 'CARGADORES_MARCA' => 3, 'CARGADORES_E' => 4, 'CARGADORES_VOLTS' => 5, 'CARGADORES_AMPERAJE' => 6, 'CARGADORES_COMPRADOR' => 7, 'CARGADORES_NOMBRE' => 8, 'CARGADORES_NUMSERIE' => 9, 'CARGADORES_TIPO' => 10, 'CARGADORES_BAJA' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('idcargadores' => 0, 'idsucursal' => 1, 'cargadores_modelo' => 2, 'cargadores_marca' => 3, 'cargadores_e' => 4, 'cargadores_volts' => 5, 'cargadores_amperaje' => 6, 'cargadores_comprador' => 7, 'cargadores_nombre' => 8, 'cargadores_numserie' => 9, 'cargadores_tipo' => 10, 'cargadores_baja' => 11, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        CargadoresPeer::CARGADORES_TIPO => array(
            CargadoresPeer::CARGADORES_TIPO_CARGADOR,
            CargadoresPeer::CARGADORES_TIPO_BODEGA,
        ),
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
        $toNames = CargadoresPeer::getFieldNames($toType);
        $key = isset(CargadoresPeer::$fieldKeys[$fromType][$name]) ? CargadoresPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(CargadoresPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, CargadoresPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return CargadoresPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return CargadoresPeer::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM column
     *
     * @param string $colname The ENUM column name.
     *
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = CargadoresPeer::getValueSets();

        if (!isset($valueSets[$colname])) {
            throw new PropelException(sprintf('Column "%s" has no ValueSet.', $colname));
        }

        return $valueSets[$colname];
    }

    /**
     * Gets the SQL value for the ENUM column value
     *
     * @param string $colname ENUM column name.
     * @param string $enumVal ENUM value.
     *
     * @return int SQL value
     */
    public static function getSqlValueForEnum($colname, $enumVal)
    {
        $values = CargadoresPeer::getValueSet($colname);
        if (!in_array($enumVal, $values)) {
            throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $colname));
        }

        return array_search($enumVal, $values);
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
     * @param      string $column The column name for current table. (i.e. CargadoresPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(CargadoresPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(CargadoresPeer::IDCARGADORES);
            $criteria->addSelectColumn(CargadoresPeer::IDSUCURSAL);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_MODELO);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_MARCA);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_E);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_VOLTS);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_AMPERAJE);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_COMPRADOR);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_NOMBRE);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_NUMSERIE);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_TIPO);
            $criteria->addSelectColumn(CargadoresPeer::CARGADORES_BAJA);
        } else {
            $criteria->addSelectColumn($alias . '.idcargadores');
            $criteria->addSelectColumn($alias . '.idsucursal');
            $criteria->addSelectColumn($alias . '.cargadores_modelo');
            $criteria->addSelectColumn($alias . '.cargadores_marca');
            $criteria->addSelectColumn($alias . '.cargadores_e');
            $criteria->addSelectColumn($alias . '.cargadores_volts');
            $criteria->addSelectColumn($alias . '.cargadores_amperaje');
            $criteria->addSelectColumn($alias . '.cargadores_comprador');
            $criteria->addSelectColumn($alias . '.cargadores_nombre');
            $criteria->addSelectColumn($alias . '.cargadores_numserie');
            $criteria->addSelectColumn($alias . '.cargadores_tipo');
            $criteria->addSelectColumn($alias . '.cargadores_baja');
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
        $criteria->setPrimaryTableName(CargadoresPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CargadoresPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(CargadoresPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Cargadores
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = CargadoresPeer::doSelect($critcopy, $con);
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
        return CargadoresPeer::populateObjects(CargadoresPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            CargadoresPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(CargadoresPeer::DATABASE_NAME);

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
     * @param Cargadores $obj A Cargadores object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdcargadores();
            } // if key === null
            CargadoresPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Cargadores object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Cargadores) {
                $key = (string) $value->getIdcargadores();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Cargadores object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(CargadoresPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Cargadores Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(CargadoresPeer::$instances[$key])) {
                return CargadoresPeer::$instances[$key];
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
        foreach (CargadoresPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        CargadoresPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to cargadores
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in BodegasPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        BodegasPeer::clearInstancePool();
        // Invalidate objects in DeshabilitacgPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        DeshabilitacgPeer::clearInstancePool();
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
        $cls = CargadoresPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = CargadoresPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = CargadoresPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CargadoresPeer::addInstanceToPool($obj, $key);
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
     * @return array (Cargadores object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = CargadoresPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = CargadoresPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + CargadoresPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CargadoresPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            CargadoresPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(CargadoresPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CargadoresPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(CargadoresPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CargadoresPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

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
     * Selects a collection of Cargadores objects pre-filled with their Sucursal objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cargadores objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSucursal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(CargadoresPeer::DATABASE_NAME);
        }

        CargadoresPeer::addSelectColumns($criteria);
        $startcol = CargadoresPeer::NUM_HYDRATE_COLUMNS;
        SucursalPeer::addSelectColumns($criteria);

        $criteria->addJoin(CargadoresPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CargadoresPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CargadoresPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = CargadoresPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CargadoresPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Cargadores) to $obj2 (Sucursal)
                $obj2->addCargadores($obj1);

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
        $criteria->setPrimaryTableName(CargadoresPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CargadoresPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(CargadoresPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CargadoresPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

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
     * Selects a collection of Cargadores objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cargadores objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(CargadoresPeer::DATABASE_NAME);
        }

        CargadoresPeer::addSelectColumns($criteria);
        $startcol2 = CargadoresPeer::NUM_HYDRATE_COLUMNS;

        SucursalPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SucursalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(CargadoresPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CargadoresPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CargadoresPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CargadoresPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CargadoresPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Cargadores) to the collection in $obj2 (Sucursal)
                $obj2->addCargadores($obj1);
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
        return Propel::getDatabaseMap(CargadoresPeer::DATABASE_NAME)->getTable(CargadoresPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseCargadoresPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseCargadoresPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \CargadoresTableMap());
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
        return CargadoresPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Cargadores or Criteria object.
     *
     * @param      mixed $values Criteria or Cargadores object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Cargadores object
        }

        if ($criteria->containsKey(CargadoresPeer::IDCARGADORES) && $criteria->keyContainsValue(CargadoresPeer::IDCARGADORES) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CargadoresPeer::IDCARGADORES.')');
        }


        // Set the correct dbName
        $criteria->setDbName(CargadoresPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Cargadores or Criteria object.
     *
     * @param      mixed $values Criteria or Cargadores object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(CargadoresPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(CargadoresPeer::IDCARGADORES);
            $value = $criteria->remove(CargadoresPeer::IDCARGADORES);
            if ($value) {
                $selectCriteria->add(CargadoresPeer::IDCARGADORES, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(CargadoresPeer::TABLE_NAME);
            }

        } else { // $values is Cargadores object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(CargadoresPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the cargadores table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += CargadoresPeer::doOnDeleteCascade(new Criteria(CargadoresPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(CargadoresPeer::TABLE_NAME, $con, CargadoresPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CargadoresPeer::clearInstancePool();
            CargadoresPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Cargadores or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Cargadores object or primary key or array of primary keys
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
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Cargadores) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CargadoresPeer::DATABASE_NAME);
            $criteria->add(CargadoresPeer::IDCARGADORES, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(CargadoresPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += CargadoresPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                CargadoresPeer::clearInstancePool();
            } elseif ($values instanceof Cargadores) { // it's a model object
                CargadoresPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    CargadoresPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            CargadoresPeer::clearRelatedInstancePool();
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
        $objects = CargadoresPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Bodegas objects
            $criteria = new Criteria(BodegasPeer::DATABASE_NAME);

            $criteria->add(BodegasPeer::CG, $obj->getIdcargadores());
            $affectedRows += BodegasPeer::doDelete($criteria, $con);

            // delete related Deshabilitacg objects
            $criteria = new Criteria(DeshabilitacgPeer::DATABASE_NAME);

            $criteria->add(DeshabilitacgPeer::CG, $obj->getIdcargadores());
            $affectedRows += DeshabilitacgPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Cargadores object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Cargadores $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(CargadoresPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(CargadoresPeer::TABLE_NAME);

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

        return BasePeer::doValidate(CargadoresPeer::DATABASE_NAME, CargadoresPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Cargadores
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = CargadoresPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(CargadoresPeer::DATABASE_NAME);
        $criteria->add(CargadoresPeer::IDCARGADORES, $pk);

        $v = CargadoresPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Cargadores[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(CargadoresPeer::DATABASE_NAME);
            $criteria->add(CargadoresPeer::IDCARGADORES, $pks, Criteria::IN);
            $objs = CargadoresPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseCargadoresPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCargadoresPeer::buildTableMap();

