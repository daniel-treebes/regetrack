<?php


/**
 * Base static class for performing query and update operations on the 'baterias' table.
 *
 *
 *
 * @package propel.generator.regetrack.om
 */
abstract class BaseBateriasPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'regetrack';

    /** the table name for this class */
    const TABLE_NAME = 'baterias';

    /** the related Propel class for this table */
    const OM_CLASS = 'Baterias';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BateriasTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the idbaterias field */
    const IDBATERIAS = 'baterias.idbaterias';

    /** the column name for the idsucursal field */
    const IDSUCURSAL = 'baterias.idsucursal';

    /** the column name for the baterias_modelo field */
    const BATERIAS_MODELO = 'baterias.baterias_modelo';

    /** the column name for the baterias_marca field */
    const BATERIAS_MARCA = 'baterias.baterias_marca';

    /** the column name for the baterias_c field */
    const BATERIAS_C = 'baterias.baterias_c';

    /** the column name for the baterias_k field */
    const BATERIAS_K = 'baterias.baterias_k';

    /** the column name for the baterias_p field */
    const BATERIAS_P = 'baterias.baterias_p';

    /** the column name for the baterias_t field */
    const BATERIAS_T = 'baterias.baterias_t';

    /** the column name for the baterias_e field */
    const BATERIAS_E = 'baterias.baterias_e';

    /** the column name for the baterias_volts field */
    const BATERIAS_VOLTS = 'baterias.baterias_volts';

    /** the column name for the baterias_amperaje field */
    const BATERIAS_AMPERAJE = 'baterias.baterias_amperaje';

    /** the column name for the baterias_comprador field */
    const BATERIAS_COMPRADOR = 'baterias.baterias_comprador';

    /** the column name for the baterias_nombre field */
    const BATERIAS_NOMBRE = 'baterias.baterias_nombre';

    /** the column name for the baterias_numserie field */
    const BATERIAS_NUMSERIE = 'baterias.baterias_numserie';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Baterias objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Baterias[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BateriasPeer::$fieldNames[BateriasPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idbaterias', 'Idsucursal', 'BateriasModelo', 'BateriasMarca', 'BateriasC', 'BateriasK', 'BateriasP', 'BateriasT', 'BateriasE', 'BateriasVolts', 'BateriasAmperaje', 'BateriasComprador', 'BateriasNombre', 'BateriasNumserie', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idbaterias', 'idsucursal', 'bateriasModelo', 'bateriasMarca', 'bateriasC', 'bateriasK', 'bateriasP', 'bateriasT', 'bateriasE', 'bateriasVolts', 'bateriasAmperaje', 'bateriasComprador', 'bateriasNombre', 'bateriasNumserie', ),
        BasePeer::TYPE_COLNAME => array (BateriasPeer::IDBATERIAS, BateriasPeer::IDSUCURSAL, BateriasPeer::BATERIAS_MODELO, BateriasPeer::BATERIAS_MARCA, BateriasPeer::BATERIAS_C, BateriasPeer::BATERIAS_K, BateriasPeer::BATERIAS_P, BateriasPeer::BATERIAS_T, BateriasPeer::BATERIAS_E, BateriasPeer::BATERIAS_VOLTS, BateriasPeer::BATERIAS_AMPERAJE, BateriasPeer::BATERIAS_COMPRADOR, BateriasPeer::BATERIAS_NOMBRE, BateriasPeer::BATERIAS_NUMSERIE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDBATERIAS', 'IDSUCURSAL', 'BATERIAS_MODELO', 'BATERIAS_MARCA', 'BATERIAS_C', 'BATERIAS_K', 'BATERIAS_P', 'BATERIAS_T', 'BATERIAS_E', 'BATERIAS_VOLTS', 'BATERIAS_AMPERAJE', 'BATERIAS_COMPRADOR', 'BATERIAS_NOMBRE', 'BATERIAS_NUMSERIE', ),
        BasePeer::TYPE_FIELDNAME => array ('idbaterias', 'idsucursal', 'baterias_modelo', 'baterias_marca', 'baterias_c', 'baterias_k', 'baterias_p', 'baterias_t', 'baterias_e', 'baterias_volts', 'baterias_amperaje', 'baterias_comprador', 'baterias_nombre', 'baterias_numserie', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BateriasPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idbaterias' => 0, 'Idsucursal' => 1, 'BateriasModelo' => 2, 'BateriasMarca' => 3, 'BateriasC' => 4, 'BateriasK' => 5, 'BateriasP' => 6, 'BateriasT' => 7, 'BateriasE' => 8, 'BateriasVolts' => 9, 'BateriasAmperaje' => 10, 'BateriasComprador' => 11, 'BateriasNombre' => 12, 'BateriasNumserie' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idbaterias' => 0, 'idsucursal' => 1, 'bateriasModelo' => 2, 'bateriasMarca' => 3, 'bateriasC' => 4, 'bateriasK' => 5, 'bateriasP' => 6, 'bateriasT' => 7, 'bateriasE' => 8, 'bateriasVolts' => 9, 'bateriasAmperaje' => 10, 'bateriasComprador' => 11, 'bateriasNombre' => 12, 'bateriasNumserie' => 13, ),
        BasePeer::TYPE_COLNAME => array (BateriasPeer::IDBATERIAS => 0, BateriasPeer::IDSUCURSAL => 1, BateriasPeer::BATERIAS_MODELO => 2, BateriasPeer::BATERIAS_MARCA => 3, BateriasPeer::BATERIAS_C => 4, BateriasPeer::BATERIAS_K => 5, BateriasPeer::BATERIAS_P => 6, BateriasPeer::BATERIAS_T => 7, BateriasPeer::BATERIAS_E => 8, BateriasPeer::BATERIAS_VOLTS => 9, BateriasPeer::BATERIAS_AMPERAJE => 10, BateriasPeer::BATERIAS_COMPRADOR => 11, BateriasPeer::BATERIAS_NOMBRE => 12, BateriasPeer::BATERIAS_NUMSERIE => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDBATERIAS' => 0, 'IDSUCURSAL' => 1, 'BATERIAS_MODELO' => 2, 'BATERIAS_MARCA' => 3, 'BATERIAS_C' => 4, 'BATERIAS_K' => 5, 'BATERIAS_P' => 6, 'BATERIAS_T' => 7, 'BATERIAS_E' => 8, 'BATERIAS_VOLTS' => 9, 'BATERIAS_AMPERAJE' => 10, 'BATERIAS_COMPRADOR' => 11, 'BATERIAS_NOMBRE' => 12, 'BATERIAS_NUMSERIE' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('idbaterias' => 0, 'idsucursal' => 1, 'baterias_modelo' => 2, 'baterias_marca' => 3, 'baterias_c' => 4, 'baterias_k' => 5, 'baterias_p' => 6, 'baterias_t' => 7, 'baterias_e' => 8, 'baterias_volts' => 9, 'baterias_amperaje' => 10, 'baterias_comprador' => 11, 'baterias_nombre' => 12, 'baterias_numserie' => 13, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $toNames = BateriasPeer::getFieldNames($toType);
        $key = isset(BateriasPeer::$fieldKeys[$fromType][$name]) ? BateriasPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BateriasPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BateriasPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BateriasPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. BateriasPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BateriasPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BateriasPeer::IDBATERIAS);
            $criteria->addSelectColumn(BateriasPeer::IDSUCURSAL);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_MODELO);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_MARCA);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_C);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_K);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_P);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_T);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_E);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_VOLTS);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_AMPERAJE);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_COMPRADOR);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_NOMBRE);
            $criteria->addSelectColumn(BateriasPeer::BATERIAS_NUMSERIE);
        } else {
            $criteria->addSelectColumn($alias . '.idbaterias');
            $criteria->addSelectColumn($alias . '.idsucursal');
            $criteria->addSelectColumn($alias . '.baterias_modelo');
            $criteria->addSelectColumn($alias . '.baterias_marca');
            $criteria->addSelectColumn($alias . '.baterias_c');
            $criteria->addSelectColumn($alias . '.baterias_k');
            $criteria->addSelectColumn($alias . '.baterias_p');
            $criteria->addSelectColumn($alias . '.baterias_t');
            $criteria->addSelectColumn($alias . '.baterias_e');
            $criteria->addSelectColumn($alias . '.baterias_volts');
            $criteria->addSelectColumn($alias . '.baterias_amperaje');
            $criteria->addSelectColumn($alias . '.baterias_comprador');
            $criteria->addSelectColumn($alias . '.baterias_nombre');
            $criteria->addSelectColumn($alias . '.baterias_numserie');
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
        $criteria->setPrimaryTableName(BateriasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BateriasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BateriasPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Baterias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BateriasPeer::doSelect($critcopy, $con);
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
        return BateriasPeer::populateObjects(BateriasPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BateriasPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BateriasPeer::DATABASE_NAME);

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
     * @param Baterias $obj A Baterias object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdbaterias();
            } // if key === null
            BateriasPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Baterias object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Baterias) {
                $key = (string) $value->getIdbaterias();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Baterias object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BateriasPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Baterias Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BateriasPeer::$instances[$key])) {
                return BateriasPeer::$instances[$key];
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
        foreach (BateriasPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        BateriasPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to baterias
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in DeshabilitabtPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        DeshabilitabtPeer::clearInstancePool();
        // Invalidate objects in LimboPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        LimboPeer::clearInstancePool();
        // Invalidate objects in UsoBateriasBodegaPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        UsoBateriasBodegaPeer::clearInstancePool();
        // Invalidate objects in UsoBateriasMontacargasPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        UsoBateriasMontacargasPeer::clearInstancePool();
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
        $cls = BateriasPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BateriasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BateriasPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BateriasPeer::addInstanceToPool($obj, $key);
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
     * @return array (Baterias object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BateriasPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BateriasPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BateriasPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BateriasPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BateriasPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(BateriasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BateriasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BateriasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BateriasPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

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
     * Selects a collection of Baterias objects pre-filled with their Sucursal objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Baterias objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSucursal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BateriasPeer::DATABASE_NAME);
        }

        BateriasPeer::addSelectColumns($criteria);
        $startcol = BateriasPeer::NUM_HYDRATE_COLUMNS;
        SucursalPeer::addSelectColumns($criteria);

        $criteria->addJoin(BateriasPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BateriasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BateriasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BateriasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BateriasPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Baterias) to $obj2 (Sucursal)
                $obj2->addBaterias($obj1);

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
        $criteria->setPrimaryTableName(BateriasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BateriasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BateriasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BateriasPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

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
     * Selects a collection of Baterias objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Baterias objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BateriasPeer::DATABASE_NAME);
        }

        BateriasPeer::addSelectColumns($criteria);
        $startcol2 = BateriasPeer::NUM_HYDRATE_COLUMNS;

        SucursalPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SucursalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BateriasPeer::IDSUCURSAL, SucursalPeer::IDSUCURSAL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BateriasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BateriasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BateriasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BateriasPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Baterias) to the collection in $obj2 (Sucursal)
                $obj2->addBaterias($obj1);
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
        return Propel::getDatabaseMap(BateriasPeer::DATABASE_NAME)->getTable(BateriasPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBateriasPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBateriasPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \BateriasTableMap());
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
        return BateriasPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Baterias or Criteria object.
     *
     * @param      mixed $values Criteria or Baterias object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Baterias object
        }

        if ($criteria->containsKey(BateriasPeer::IDBATERIAS) && $criteria->keyContainsValue(BateriasPeer::IDBATERIAS) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BateriasPeer::IDBATERIAS.')');
        }


        // Set the correct dbName
        $criteria->setDbName(BateriasPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Baterias or Criteria object.
     *
     * @param      mixed $values Criteria or Baterias object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BateriasPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BateriasPeer::IDBATERIAS);
            $value = $criteria->remove(BateriasPeer::IDBATERIAS);
            if ($value) {
                $selectCriteria->add(BateriasPeer::IDBATERIAS, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BateriasPeer::TABLE_NAME);
            }

        } else { // $values is Baterias object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BateriasPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the baterias table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BateriasPeer::doOnDeleteCascade(new Criteria(BateriasPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(BateriasPeer::TABLE_NAME, $con, BateriasPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BateriasPeer::clearInstancePool();
            BateriasPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Baterias or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Baterias object or primary key or array of primary keys
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
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Baterias) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BateriasPeer::DATABASE_NAME);
            $criteria->add(BateriasPeer::IDBATERIAS, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(BateriasPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += BateriasPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                BateriasPeer::clearInstancePool();
            } elseif ($values instanceof Baterias) { // it's a model object
                BateriasPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    BateriasPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            BateriasPeer::clearRelatedInstancePool();
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
        $objects = BateriasPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Deshabilitabt objects
            $criteria = new Criteria(DeshabilitabtPeer::DATABASE_NAME);

            $criteria->add(DeshabilitabtPeer::BT, $obj->getIdbaterias());
            $affectedRows += DeshabilitabtPeer::doDelete($criteria, $con);

            // delete related Limbo objects
            $criteria = new Criteria(LimboPeer::DATABASE_NAME);

            $criteria->add(LimboPeer::BT, $obj->getIdbaterias());
            $affectedRows += LimboPeer::doDelete($criteria, $con);

            // delete related UsoBateriasBodega objects
            $criteria = new Criteria(UsoBateriasBodegaPeer::DATABASE_NAME);

            $criteria->add(UsoBateriasBodegaPeer::BT, $obj->getIdbaterias());
            $affectedRows += UsoBateriasBodegaPeer::doDelete($criteria, $con);

            // delete related UsoBateriasMontacargas objects
            $criteria = new Criteria(UsoBateriasMontacargasPeer::DATABASE_NAME);

            $criteria->add(UsoBateriasMontacargasPeer::BT, $obj->getIdbaterias());
            $affectedRows += UsoBateriasMontacargasPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Baterias object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Baterias $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BateriasPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BateriasPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BateriasPeer::DATABASE_NAME, BateriasPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Baterias
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BateriasPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BateriasPeer::DATABASE_NAME);
        $criteria->add(BateriasPeer::IDBATERIAS, $pk);

        $v = BateriasPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Baterias[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BateriasPeer::DATABASE_NAME);
            $criteria->add(BateriasPeer::IDBATERIAS, $pks, Criteria::IN);
            $objs = BateriasPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBateriasPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBateriasPeer::buildTableMap();

