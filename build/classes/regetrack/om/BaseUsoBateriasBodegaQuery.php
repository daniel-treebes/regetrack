<?php


/**
 * Base class that represents a query for the 'uso_baterias_bodega' table.
 *
 *
 *
 * @method UsoBateriasBodegaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UsoBateriasBodegaQuery orderByBg($order = Criteria::ASC) Order by the bg column
 * @method UsoBateriasBodegaQuery orderByBt($order = Criteria::ASC) Order by the bt column
 * @method UsoBateriasBodegaQuery orderByFechaEntrada($order = Criteria::ASC) Order by the fecha_entrada column
 * @method UsoBateriasBodegaQuery orderByFechaCarga($order = Criteria::ASC) Order by the fecha_carga column
 * @method UsoBateriasBodegaQuery orderByFechaDescanso($order = Criteria::ASC) Order by the fecha_descanso column
 * @method UsoBateriasBodegaQuery orderByFechaSalida($order = Criteria::ASC) Order by the fecha_salida column
 * @method UsoBateriasBodegaQuery orderByUsuarioEntrada($order = Criteria::ASC) Order by the usuario_entrada column
 * @method UsoBateriasBodegaQuery orderByUsuarioCarga($order = Criteria::ASC) Order by the usuario_carga column
 * @method UsoBateriasBodegaQuery orderByUsuarioDescanso($order = Criteria::ASC) Order by the usuario_descanso column
 * @method UsoBateriasBodegaQuery orderByUsuarioSalida($order = Criteria::ASC) Order by the usuario_salida column
 *
 * @method UsoBateriasBodegaQuery groupById() Group by the id column
 * @method UsoBateriasBodegaQuery groupByBg() Group by the bg column
 * @method UsoBateriasBodegaQuery groupByBt() Group by the bt column
 * @method UsoBateriasBodegaQuery groupByFechaEntrada() Group by the fecha_entrada column
 * @method UsoBateriasBodegaQuery groupByFechaCarga() Group by the fecha_carga column
 * @method UsoBateriasBodegaQuery groupByFechaDescanso() Group by the fecha_descanso column
 * @method UsoBateriasBodegaQuery groupByFechaSalida() Group by the fecha_salida column
 * @method UsoBateriasBodegaQuery groupByUsuarioEntrada() Group by the usuario_entrada column
 * @method UsoBateriasBodegaQuery groupByUsuarioCarga() Group by the usuario_carga column
 * @method UsoBateriasBodegaQuery groupByUsuarioDescanso() Group by the usuario_descanso column
 * @method UsoBateriasBodegaQuery groupByUsuarioSalida() Group by the usuario_salida column
 *
 * @method UsoBateriasBodegaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UsoBateriasBodegaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UsoBateriasBodegaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UsoBateriasBodegaQuery leftJoinBodegas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bodegas relation
 * @method UsoBateriasBodegaQuery rightJoinBodegas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bodegas relation
 * @method UsoBateriasBodegaQuery innerJoinBodegas($relationAlias = null) Adds a INNER JOIN clause to the query using the Bodegas relation
 *
 * @method UsoBateriasBodegaQuery leftJoinBaterias($relationAlias = null) Adds a LEFT JOIN clause to the query using the Baterias relation
 * @method UsoBateriasBodegaQuery rightJoinBaterias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Baterias relation
 * @method UsoBateriasBodegaQuery innerJoinBaterias($relationAlias = null) Adds a INNER JOIN clause to the query using the Baterias relation
 *
 * @method UsoBateriasBodega findOne(PropelPDO $con = null) Return the first UsoBateriasBodega matching the query
 * @method UsoBateriasBodega findOneOrCreate(PropelPDO $con = null) Return the first UsoBateriasBodega matching the query, or a new UsoBateriasBodega object populated from the query conditions when no match is found
 *
 * @method UsoBateriasBodega findOneByBg(int $bg) Return the first UsoBateriasBodega filtered by the bg column
 * @method UsoBateriasBodega findOneByBt(int $bt) Return the first UsoBateriasBodega filtered by the bt column
 * @method UsoBateriasBodega findOneByFechaEntrada(string $fecha_entrada) Return the first UsoBateriasBodega filtered by the fecha_entrada column
 * @method UsoBateriasBodega findOneByFechaCarga(string $fecha_carga) Return the first UsoBateriasBodega filtered by the fecha_carga column
 * @method UsoBateriasBodega findOneByFechaDescanso(string $fecha_descanso) Return the first UsoBateriasBodega filtered by the fecha_descanso column
 * @method UsoBateriasBodega findOneByFechaSalida(string $fecha_salida) Return the first UsoBateriasBodega filtered by the fecha_salida column
 * @method UsoBateriasBodega findOneByUsuarioEntrada(int $usuario_entrada) Return the first UsoBateriasBodega filtered by the usuario_entrada column
 * @method UsoBateriasBodega findOneByUsuarioCarga(int $usuario_carga) Return the first UsoBateriasBodega filtered by the usuario_carga column
 * @method UsoBateriasBodega findOneByUsuarioDescanso(int $usuario_descanso) Return the first UsoBateriasBodega filtered by the usuario_descanso column
 * @method UsoBateriasBodega findOneByUsuarioSalida(int $usuario_salida) Return the first UsoBateriasBodega filtered by the usuario_salida column
 *
 * @method array findById(int $id) Return UsoBateriasBodega objects filtered by the id column
 * @method array findByBg(int $bg) Return UsoBateriasBodega objects filtered by the bg column
 * @method array findByBt(int $bt) Return UsoBateriasBodega objects filtered by the bt column
 * @method array findByFechaEntrada(string $fecha_entrada) Return UsoBateriasBodega objects filtered by the fecha_entrada column
 * @method array findByFechaCarga(string $fecha_carga) Return UsoBateriasBodega objects filtered by the fecha_carga column
 * @method array findByFechaDescanso(string $fecha_descanso) Return UsoBateriasBodega objects filtered by the fecha_descanso column
 * @method array findByFechaSalida(string $fecha_salida) Return UsoBateriasBodega objects filtered by the fecha_salida column
 * @method array findByUsuarioEntrada(int $usuario_entrada) Return UsoBateriasBodega objects filtered by the usuario_entrada column
 * @method array findByUsuarioCarga(int $usuario_carga) Return UsoBateriasBodega objects filtered by the usuario_carga column
 * @method array findByUsuarioDescanso(int $usuario_descanso) Return UsoBateriasBodega objects filtered by the usuario_descanso column
 * @method array findByUsuarioSalida(int $usuario_salida) Return UsoBateriasBodega objects filtered by the usuario_salida column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseUsoBateriasBodegaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUsoBateriasBodegaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'regetrack';
        }
        if (null === $modelName) {
            $modelName = 'UsoBateriasBodega';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UsoBateriasBodegaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UsoBateriasBodegaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UsoBateriasBodegaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UsoBateriasBodegaQuery) {
            return $criteria;
        }
        $query = new UsoBateriasBodegaQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   UsoBateriasBodega|UsoBateriasBodega[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsoBateriasBodegaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasBodegaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 UsoBateriasBodega A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 UsoBateriasBodega A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `bg`, `bt`, `fecha_entrada`, `fecha_carga`, `fecha_descanso`, `fecha_salida`, `usuario_entrada`, `usuario_carga`, `usuario_descanso`, `usuario_salida` FROM `uso_baterias_bodega` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new UsoBateriasBodega();
            $obj->hydrate($row);
            UsoBateriasBodegaPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return UsoBateriasBodega|UsoBateriasBodega[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|UsoBateriasBodega[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsoBateriasBodegaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsoBateriasBodegaPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the bg column
     *
     * Example usage:
     * <code>
     * $query->filterByBg(1234); // WHERE bg = 1234
     * $query->filterByBg(array(12, 34)); // WHERE bg IN (12, 34)
     * $query->filterByBg(array('min' => 12)); // WHERE bg >= 12
     * $query->filterByBg(array('max' => 12)); // WHERE bg <= 12
     * </code>
     *
     * @see       filterByBodegas()
     *
     * @param     mixed $bg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByBg($bg = null, $comparison = null)
    {
        if (is_array($bg)) {
            $useMinMax = false;
            if (isset($bg['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::BG, $bg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bg['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::BG, $bg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::BG, $bg, $comparison);
    }

    /**
     * Filter the query on the bt column
     *
     * Example usage:
     * <code>
     * $query->filterByBt(1234); // WHERE bt = 1234
     * $query->filterByBt(array(12, 34)); // WHERE bt IN (12, 34)
     * $query->filterByBt(array('min' => 12)); // WHERE bt >= 12
     * $query->filterByBt(array('max' => 12)); // WHERE bt <= 12
     * </code>
     *
     * @see       filterByBaterias()
     *
     * @param     mixed $bt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByBt($bt = null, $comparison = null)
    {
        if (is_array($bt)) {
            $useMinMax = false;
            if (isset($bt['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::BT, $bt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bt['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::BT, $bt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::BT, $bt, $comparison);
    }

    /**
     * Filter the query on the fecha_entrada column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaEntrada('2011-03-14'); // WHERE fecha_entrada = '2011-03-14'
     * $query->filterByFechaEntrada('now'); // WHERE fecha_entrada = '2011-03-14'
     * $query->filterByFechaEntrada(array('max' => 'yesterday')); // WHERE fecha_entrada < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaEntrada The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByFechaEntrada($fechaEntrada = null, $comparison = null)
    {
        if (is_array($fechaEntrada)) {
            $useMinMax = false;
            if (isset($fechaEntrada['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_ENTRADA, $fechaEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaEntrada['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_ENTRADA, $fechaEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_ENTRADA, $fechaEntrada, $comparison);
    }

    /**
     * Filter the query on the fecha_carga column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaCarga('2011-03-14'); // WHERE fecha_carga = '2011-03-14'
     * $query->filterByFechaCarga('now'); // WHERE fecha_carga = '2011-03-14'
     * $query->filterByFechaCarga(array('max' => 'yesterday')); // WHERE fecha_carga < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaCarga The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByFechaCarga($fechaCarga = null, $comparison = null)
    {
        if (is_array($fechaCarga)) {
            $useMinMax = false;
            if (isset($fechaCarga['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_CARGA, $fechaCarga['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaCarga['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_CARGA, $fechaCarga['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_CARGA, $fechaCarga, $comparison);
    }

    /**
     * Filter the query on the fecha_descanso column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaDescanso('2011-03-14'); // WHERE fecha_descanso = '2011-03-14'
     * $query->filterByFechaDescanso('now'); // WHERE fecha_descanso = '2011-03-14'
     * $query->filterByFechaDescanso(array('max' => 'yesterday')); // WHERE fecha_descanso < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaDescanso The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByFechaDescanso($fechaDescanso = null, $comparison = null)
    {
        if (is_array($fechaDescanso)) {
            $useMinMax = false;
            if (isset($fechaDescanso['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_DESCANSO, $fechaDescanso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaDescanso['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_DESCANSO, $fechaDescanso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_DESCANSO, $fechaDescanso, $comparison);
    }

    /**
     * Filter the query on the fecha_salida column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaSalida('2011-03-14'); // WHERE fecha_salida = '2011-03-14'
     * $query->filterByFechaSalida('now'); // WHERE fecha_salida = '2011-03-14'
     * $query->filterByFechaSalida(array('max' => 'yesterday')); // WHERE fecha_salida < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaSalida The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByFechaSalida($fechaSalida = null, $comparison = null)
    {
        if (is_array($fechaSalida)) {
            $useMinMax = false;
            if (isset($fechaSalida['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_SALIDA, $fechaSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaSalida['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_SALIDA, $fechaSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::FECHA_SALIDA, $fechaSalida, $comparison);
    }

    /**
     * Filter the query on the usuario_entrada column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioEntrada(1234); // WHERE usuario_entrada = 1234
     * $query->filterByUsuarioEntrada(array(12, 34)); // WHERE usuario_entrada IN (12, 34)
     * $query->filterByUsuarioEntrada(array('min' => 12)); // WHERE usuario_entrada >= 12
     * $query->filterByUsuarioEntrada(array('max' => 12)); // WHERE usuario_entrada <= 12
     * </code>
     *
     * @param     mixed $usuarioEntrada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByUsuarioEntrada($usuarioEntrada = null, $comparison = null)
    {
        if (is_array($usuarioEntrada)) {
            $useMinMax = false;
            if (isset($usuarioEntrada['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_ENTRADA, $usuarioEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioEntrada['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_ENTRADA, $usuarioEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_ENTRADA, $usuarioEntrada, $comparison);
    }

    /**
     * Filter the query on the usuario_carga column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioCarga(1234); // WHERE usuario_carga = 1234
     * $query->filterByUsuarioCarga(array(12, 34)); // WHERE usuario_carga IN (12, 34)
     * $query->filterByUsuarioCarga(array('min' => 12)); // WHERE usuario_carga >= 12
     * $query->filterByUsuarioCarga(array('max' => 12)); // WHERE usuario_carga <= 12
     * </code>
     *
     * @param     mixed $usuarioCarga The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByUsuarioCarga($usuarioCarga = null, $comparison = null)
    {
        if (is_array($usuarioCarga)) {
            $useMinMax = false;
            if (isset($usuarioCarga['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_CARGA, $usuarioCarga['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioCarga['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_CARGA, $usuarioCarga['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_CARGA, $usuarioCarga, $comparison);
    }

    /**
     * Filter the query on the usuario_descanso column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioDescanso(1234); // WHERE usuario_descanso = 1234
     * $query->filterByUsuarioDescanso(array(12, 34)); // WHERE usuario_descanso IN (12, 34)
     * $query->filterByUsuarioDescanso(array('min' => 12)); // WHERE usuario_descanso >= 12
     * $query->filterByUsuarioDescanso(array('max' => 12)); // WHERE usuario_descanso <= 12
     * </code>
     *
     * @param     mixed $usuarioDescanso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByUsuarioDescanso($usuarioDescanso = null, $comparison = null)
    {
        if (is_array($usuarioDescanso)) {
            $useMinMax = false;
            if (isset($usuarioDescanso['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_DESCANSO, $usuarioDescanso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioDescanso['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_DESCANSO, $usuarioDescanso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_DESCANSO, $usuarioDescanso, $comparison);
    }

    /**
     * Filter the query on the usuario_salida column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioSalida(1234); // WHERE usuario_salida = 1234
     * $query->filterByUsuarioSalida(array(12, 34)); // WHERE usuario_salida IN (12, 34)
     * $query->filterByUsuarioSalida(array('min' => 12)); // WHERE usuario_salida >= 12
     * $query->filterByUsuarioSalida(array('max' => 12)); // WHERE usuario_salida <= 12
     * </code>
     *
     * @param     mixed $usuarioSalida The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function filterByUsuarioSalida($usuarioSalida = null, $comparison = null)
    {
        if (is_array($usuarioSalida)) {
            $useMinMax = false;
            if (isset($usuarioSalida['min'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_SALIDA, $usuarioSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioSalida['max'])) {
                $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_SALIDA, $usuarioSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasBodegaPeer::USUARIO_SALIDA, $usuarioSalida, $comparison);
    }

    /**
     * Filter the query by a related Bodegas object
     *
     * @param   Bodegas|PropelObjectCollection $bodegas The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsoBateriasBodegaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBodegas($bodegas, $comparison = null)
    {
        if ($bodegas instanceof Bodegas) {
            return $this
                ->addUsingAlias(UsoBateriasBodegaPeer::BG, $bodegas->getId(), $comparison);
        } elseif ($bodegas instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsoBateriasBodegaPeer::BG, $bodegas->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByBodegas() only accepts arguments of type Bodegas or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bodegas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function joinBodegas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bodegas');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Bodegas');
        }

        return $this;
    }

    /**
     * Use the Bodegas relation Bodegas object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BodegasQuery A secondary query class using the current class as primary query
     */
    public function useBodegasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBodegas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bodegas', 'BodegasQuery');
    }

    /**
     * Filter the query by a related Baterias object
     *
     * @param   Baterias|PropelObjectCollection $baterias The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsoBateriasBodegaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBaterias($baterias, $comparison = null)
    {
        if ($baterias instanceof Baterias) {
            return $this
                ->addUsingAlias(UsoBateriasBodegaPeer::BT, $baterias->getIdbaterias(), $comparison);
        } elseif ($baterias instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsoBateriasBodegaPeer::BT, $baterias->toKeyValue('PrimaryKey', 'Idbaterias'), $comparison);
        } else {
            throw new PropelException('filterByBaterias() only accepts arguments of type Baterias or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Baterias relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function joinBaterias($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Baterias');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Baterias');
        }

        return $this;
    }

    /**
     * Use the Baterias relation Baterias object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BateriasQuery A secondary query class using the current class as primary query
     */
    public function useBateriasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBaterias($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Baterias', 'BateriasQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   UsoBateriasBodega $usoBateriasBodega Object to remove from the list of results
     *
     * @return UsoBateriasBodegaQuery The current query, for fluid interface
     */
    public function prune($usoBateriasBodega = null)
    {
        if ($usoBateriasBodega) {
            $this->addUsingAlias(UsoBateriasBodegaPeer::ID, $usoBateriasBodega->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
