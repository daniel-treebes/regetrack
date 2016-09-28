<?php


/**
 * Base static class for performing query and update operations on the 'uso_baterias_montacargas' table.
 *
 *
 *
 * @package propel.generator.regetrack.om
 */
abstract class BaseUsoBateriasMontacargasPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'regetrack';

    /** the table name for this class */
    const TABLE_NAME = 'uso_baterias_montacargas';

    /** the related Propel class for this table */
    const OM_CLASS = 'UsoBateriasMontacargas';

    /** the related TableMap class for this table */
    const TM_CLASS = 'UsoBateriasMontacargasTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the id field */
    const ID = 'uso_baterias_montacargas.id';

    /** the column name for the mc field */
    const MC = 'uso_baterias_montacargas.mc';

    /** the column name for the bt field */
    const BT = 'uso_baterias_montacargas.bt';

    /** the column name for the fecha_entrada field */
    const FECHA_ENTRADA = 'uso_baterias_montacargas.fecha_entrada';

    /** the column name for the fecha_salida field */
    const FECHA_SALIDA = 'uso_baterias_montacargas.fecha_salida';

    /** the column name for the usuario_entrada field */
    const USUARIO_ENTRADA = 'uso_baterias_montacargas.usuario_entrada';

    /** the column name for the usuario_salida field */
    const USUARIO_SALIDA = 'uso_baterias_montacargas.usuario_salida';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of UsoBateriasMontacargas objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array UsoBateriasMontacargas[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. UsoBateriasMontacargasPeer::$fieldNames[UsoBateriasMontacargasPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Mc', 'Bt', 'FechaEntrada', 'FechaSalida', 'UsuarioEntrada', 'UsuarioSalida', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'mc', 'bt', 'fechaEntrada', 'fechaSalida', 'usuarioEntrada', 'usuarioSalida', ),
        BasePeer::TYPE_COLNAME => array (UsoBateriasMontacargasPeer::ID, UsoBateriasMontacargasPeer::MC, UsoBateriasMontacargasPeer::BT, UsoBateriasMontacargasPeer::FECHA_ENTRADA, UsoBateriasMontacargasPeer::FECHA_SALIDA, UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UsoBateriasMontacargasPeer::USUARIO_SALIDA, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'MC', 'BT', 'FECHA_ENTRADA', 'FECHA_SALIDA', 'USUARIO_ENTRADA', 'USUARIO_SALIDA', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'mc', 'bt', 'fecha_entrada', 'fecha_salida', 'usuario_entrada', 'usuario_salida', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. UsoBateriasMontacargasPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Mc' => 1, 'Bt' => 2, 'FechaEntrada' => 3, 'FechaSalida' => 4, 'UsuarioEntrada' => 5, 'UsuarioSalida' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'mc' => 1, 'bt' => 2, 'fechaEntrada' => 3, 'fechaSalida' => 4, 'usuarioEntrada' => 5, 'usuarioSalida' => 6, ),
        BasePeer::TYPE_COLNAME => array (UsoBateriasMontacargasPeer::ID => 0, UsoBateriasMontacargasPeer::MC => 1, UsoBateriasMontacargasPeer::BT => 2, UsoBateriasMontacargasPeer::FECHA_ENTRADA => 3, UsoBateriasMontacargasPeer::FECHA_SALIDA => 4, UsoBateriasMontacargasPeer::USUARIO_ENTRADA => 5, UsoBateriasMontacargasPeer::USUARIO_SALIDA => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'MC' => 1, 'BT' => 2, 'FECHA_ENTRADA' => 3, 'FECHA_SALIDA' => 4, 'USUARIO_ENTRADA' => 5, 'USUARIO_SALIDA' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'mc' => 1, 'bt' => 2, 'fecha_entrada' => 3, 'fecha_salida' => 4, 'usuario_entrada' => 5, 'usuario_salida' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
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
        $toNames = UsoBateriasMontacargasPeer::getFieldNames($toType);
        $key = isset(UsoBateriasMontacargasPeer::$fieldKeys[$fromType][$name]) ? UsoBateriasMontacargasPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(UsoBateriasMontacargasPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, UsoBateriasMontacargasPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return UsoBateriasMontacargasPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. UsoBateriasMontacargasPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(UsoBateriasMontacargasPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(UsoBateriasMontacargasPeer::ID);
            $criteria->addSelectColumn(UsoBateriasMontacargasPeer::MC);
            $criteria->addSelectColumn(UsoBateriasMontacargasPeer::BT);
            $criteria->addSelectColumn(UsoBateriasMontacargasPeer::FECHA_ENTRADA);
            $criteria->addSelectColumn(UsoBateriasMontacargasPeer::FECHA_SALIDA);
            $criteria->addSelectColumn(UsoBateriasMontacargasPeer::USUARIO_ENTRADA);
            $criteria->addSelectColumn(UsoBateriasMontacargasPeer::USUARIO_SALIDA);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mc');
            $criteria->addSelectColumn($alias . '.bt');
            $criteria->addSelectColumn($alias . '.fecha_entrada');
            $criteria->addSelectColumn($alias . '.fecha_salida');
            $criteria->addSelectColumn($alias . '.usuario_entrada');
            $criteria->addSelectColumn($alias . '.usuario_salida');
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
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return UsoBateriasMontacargas
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = UsoBateriasMontacargasPeer::doSelect($critcopy, $con);
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
        return UsoBateriasMontacargasPeer::populateObjects(UsoBateriasMontacargasPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

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
     * @param UsoBateriasMontacargas $obj A UsoBateriasMontacargas object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            UsoBateriasMontacargasPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A UsoBateriasMontacargas object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof UsoBateriasMontacargas) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or UsoBateriasMontacargas object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(UsoBateriasMontacargasPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return UsoBateriasMontacargas Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(UsoBateriasMontacargasPeer::$instances[$key])) {
                return UsoBateriasMontacargasPeer::$instances[$key];
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
        foreach (UsoBateriasMontacargasPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        UsoBateriasMontacargasPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to uso_baterias_montacargas
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
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
        $cls = UsoBateriasMontacargasPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = UsoBateriasMontacargasPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsoBateriasMontacargasPeer::addInstanceToPool($obj, $key);
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
     * @return array (UsoBateriasMontacargas object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = UsoBateriasMontacargasPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsoBateriasMontacargasPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            UsoBateriasMontacargasPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Baterias table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBaterias(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Montacargas table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMontacargas(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related UcUsersRelatedByUsuarioEntrada table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinUcUsersRelatedByUsuarioEntrada(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UcUsersPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related UcUsersRelatedByUsuarioSalida table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinUcUsersRelatedByUsuarioSalida(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_SALIDA, UcUsersPeer::ID, $join_behavior);

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
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with their Baterias objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBaterias(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;
        BateriasPeer::addSelectColumns($criteria);

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BateriasPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BateriasPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BateriasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BateriasPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to $obj2 (Baterias)
                $obj2->addUsoBateriasMontacargas($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with their Montacargas objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMontacargas(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;
        MontacargasPeer::addSelectColumns($criteria);

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MontacargasPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MontacargasPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MontacargasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MontacargasPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to $obj2 (Montacargas)
                $obj2->addUsoBateriasMontacargas($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with their UcUsers objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUcUsersRelatedByUsuarioEntrada(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;
        UcUsersPeer::addSelectColumns($criteria);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UcUsersPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = UcUsersPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = UcUsersPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UcUsersPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    UcUsersPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to $obj2 (UcUsers)
                $obj2->addUsoBateriasMontacargasRelatedByUsuarioEntrada($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with their UcUsers objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUcUsersRelatedByUsuarioSalida(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;
        UcUsersPeer::addSelectColumns($criteria);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_SALIDA, UcUsersPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = UcUsersPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = UcUsersPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UcUsersPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    UcUsersPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to $obj2 (UcUsers)
                $obj2->addUsoBateriasMontacargasRelatedByUsuarioSalida($obj1);

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
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UcUsersPeer::ID, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_SALIDA, UcUsersPeer::ID, $join_behavior);

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
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol2 = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;

        BateriasPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BateriasPeer::NUM_HYDRATE_COLUMNS;

        MontacargasPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MontacargasPeer::NUM_HYDRATE_COLUMNS;

        UcUsersPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + UcUsersPeer::NUM_HYDRATE_COLUMNS;

        UcUsersPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + UcUsersPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UcUsersPeer::ID, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_SALIDA, UcUsersPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Baterias rows

            $key2 = BateriasPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = BateriasPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BateriasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BateriasPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj2 (Baterias)
                $obj2->addUsoBateriasMontacargas($obj1);
            } // if joined row not null

            // Add objects for joined Montacargas rows

            $key3 = MontacargasPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = MontacargasPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = MontacargasPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MontacargasPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj3 (Montacargas)
                $obj3->addUsoBateriasMontacargas($obj1);
            } // if joined row not null

            // Add objects for joined UcUsers rows

            $key4 = UcUsersPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = UcUsersPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = UcUsersPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    UcUsersPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj4 (UcUsers)
                $obj4->addUsoBateriasMontacargasRelatedByUsuarioEntrada($obj1);
            } // if joined row not null

            // Add objects for joined UcUsers rows

            $key5 = UcUsersPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = UcUsersPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = UcUsersPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    UcUsersPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj5 (UcUsers)
                $obj5->addUsoBateriasMontacargasRelatedByUsuarioSalida($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Baterias table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBaterias(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UcUsersPeer::ID, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_SALIDA, UcUsersPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Montacargas table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMontacargas(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UcUsersPeer::ID, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_SALIDA, UcUsersPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related UcUsersRelatedByUsuarioEntrada table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptUcUsersRelatedByUsuarioEntrada(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related UcUsersRelatedByUsuarioSalida table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptUcUsersRelatedByUsuarioSalida(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);

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
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with all related objects except Baterias.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBaterias(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol2 = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;

        MontacargasPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MontacargasPeer::NUM_HYDRATE_COLUMNS;

        UcUsersPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + UcUsersPeer::NUM_HYDRATE_COLUMNS;

        UcUsersPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + UcUsersPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UcUsersPeer::ID, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_SALIDA, UcUsersPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Montacargas rows

                $key2 = MontacargasPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MontacargasPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = MontacargasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MontacargasPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj2 (Montacargas)
                $obj2->addUsoBateriasMontacargas($obj1);

            } // if joined row is not null

                // Add objects for joined UcUsers rows

                $key3 = UcUsersPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = UcUsersPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = UcUsersPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    UcUsersPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj3 (UcUsers)
                $obj3->addUsoBateriasMontacargasRelatedByUsuarioEntrada($obj1);

            } // if joined row is not null

                // Add objects for joined UcUsers rows

                $key4 = UcUsersPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = UcUsersPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = UcUsersPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    UcUsersPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj4 (UcUsers)
                $obj4->addUsoBateriasMontacargasRelatedByUsuarioSalida($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with all related objects except Montacargas.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMontacargas(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol2 = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;

        BateriasPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BateriasPeer::NUM_HYDRATE_COLUMNS;

        UcUsersPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + UcUsersPeer::NUM_HYDRATE_COLUMNS;

        UcUsersPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + UcUsersPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, UcUsersPeer::ID, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::USUARIO_SALIDA, UcUsersPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Baterias rows

                $key2 = BateriasPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BateriasPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = BateriasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BateriasPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj2 (Baterias)
                $obj2->addUsoBateriasMontacargas($obj1);

            } // if joined row is not null

                // Add objects for joined UcUsers rows

                $key3 = UcUsersPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = UcUsersPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = UcUsersPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    UcUsersPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj3 (UcUsers)
                $obj3->addUsoBateriasMontacargasRelatedByUsuarioEntrada($obj1);

            } // if joined row is not null

                // Add objects for joined UcUsers rows

                $key4 = UcUsersPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = UcUsersPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = UcUsersPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    UcUsersPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj4 (UcUsers)
                $obj4->addUsoBateriasMontacargasRelatedByUsuarioSalida($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with all related objects except UcUsersRelatedByUsuarioEntrada.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptUcUsersRelatedByUsuarioEntrada(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol2 = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;

        BateriasPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BateriasPeer::NUM_HYDRATE_COLUMNS;

        MontacargasPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MontacargasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Baterias rows

                $key2 = BateriasPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BateriasPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = BateriasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BateriasPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj2 (Baterias)
                $obj2->addUsoBateriasMontacargas($obj1);

            } // if joined row is not null

                // Add objects for joined Montacargas rows

                $key3 = MontacargasPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = MontacargasPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = MontacargasPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MontacargasPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj3 (Montacargas)
                $obj3->addUsoBateriasMontacargas($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UsoBateriasMontacargas objects pre-filled with all related objects except UcUsersRelatedByUsuarioSalida.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UsoBateriasMontacargas objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptUcUsersRelatedByUsuarioSalida(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);
        }

        UsoBateriasMontacargasPeer::addSelectColumns($criteria);
        $startcol2 = UsoBateriasMontacargasPeer::NUM_HYDRATE_COLUMNS;

        BateriasPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BateriasPeer::NUM_HYDRATE_COLUMNS;

        MontacargasPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MontacargasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UsoBateriasMontacargasPeer::BT, BateriasPeer::IDBATERIAS, $join_behavior);

        $criteria->addJoin(UsoBateriasMontacargasPeer::MC, MontacargasPeer::IDMONTACARGAS, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsoBateriasMontacargasPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsoBateriasMontacargasPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UsoBateriasMontacargasPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsoBateriasMontacargasPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Baterias rows

                $key2 = BateriasPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BateriasPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = BateriasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BateriasPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj2 (Baterias)
                $obj2->addUsoBateriasMontacargas($obj1);

            } // if joined row is not null

                // Add objects for joined Montacargas rows

                $key3 = MontacargasPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = MontacargasPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = MontacargasPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MontacargasPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (UsoBateriasMontacargas) to the collection in $obj3 (Montacargas)
                $obj3->addUsoBateriasMontacargas($obj1);

            } // if joined row is not null

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
        return Propel::getDatabaseMap(UsoBateriasMontacargasPeer::DATABASE_NAME)->getTable(UsoBateriasMontacargasPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseUsoBateriasMontacargasPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseUsoBateriasMontacargasPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \UsoBateriasMontacargasTableMap());
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
        return UsoBateriasMontacargasPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a UsoBateriasMontacargas or Criteria object.
     *
     * @param      mixed $values Criteria or UsoBateriasMontacargas object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from UsoBateriasMontacargas object
        }

        if ($criteria->containsKey(UsoBateriasMontacargasPeer::ID) && $criteria->keyContainsValue(UsoBateriasMontacargasPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsoBateriasMontacargasPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a UsoBateriasMontacargas or Criteria object.
     *
     * @param      mixed $values Criteria or UsoBateriasMontacargas object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(UsoBateriasMontacargasPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(UsoBateriasMontacargasPeer::ID);
            $value = $criteria->remove(UsoBateriasMontacargasPeer::ID);
            if ($value) {
                $selectCriteria->add(UsoBateriasMontacargasPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(UsoBateriasMontacargasPeer::TABLE_NAME);
            }

        } else { // $values is UsoBateriasMontacargas object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the uso_baterias_montacargas table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(UsoBateriasMontacargasPeer::TABLE_NAME, $con, UsoBateriasMontacargasPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsoBateriasMontacargasPeer::clearInstancePool();
            UsoBateriasMontacargasPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a UsoBateriasMontacargas or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or UsoBateriasMontacargas object or primary key or array of primary keys
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
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            UsoBateriasMontacargasPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof UsoBateriasMontacargas) { // it's a model object
            // invalidate the cache for this single object
            UsoBateriasMontacargasPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsoBateriasMontacargasPeer::DATABASE_NAME);
            $criteria->add(UsoBateriasMontacargasPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                UsoBateriasMontacargasPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(UsoBateriasMontacargasPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            UsoBateriasMontacargasPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given UsoBateriasMontacargas object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param UsoBateriasMontacargas $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(UsoBateriasMontacargasPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(UsoBateriasMontacargasPeer::TABLE_NAME);

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

        return BasePeer::doValidate(UsoBateriasMontacargasPeer::DATABASE_NAME, UsoBateriasMontacargasPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return UsoBateriasMontacargas
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = UsoBateriasMontacargasPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(UsoBateriasMontacargasPeer::DATABASE_NAME);
        $criteria->add(UsoBateriasMontacargasPeer::ID, $pk);

        $v = UsoBateriasMontacargasPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return UsoBateriasMontacargas[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(UsoBateriasMontacargasPeer::DATABASE_NAME);
            $criteria->add(UsoBateriasMontacargasPeer::ID, $pks, Criteria::IN);
            $objs = UsoBateriasMontacargasPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseUsoBateriasMontacargasPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseUsoBateriasMontacargasPeer::buildTableMap();

