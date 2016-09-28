<?php


/**
 * Base class that represents a query for the 'uso_baterias_montacargas' table.
 *
 *
 *
 * @method UsoBateriasMontacargasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UsoBateriasMontacargasQuery orderByMc($order = Criteria::ASC) Order by the mc column
 * @method UsoBateriasMontacargasQuery orderByBt($order = Criteria::ASC) Order by the bt column
 * @method UsoBateriasMontacargasQuery orderByFechaEntrada($order = Criteria::ASC) Order by the fecha_entrada column
 * @method UsoBateriasMontacargasQuery orderByFechaSalida($order = Criteria::ASC) Order by the fecha_salida column
 * @method UsoBateriasMontacargasQuery orderByUsuarioEntrada($order = Criteria::ASC) Order by the usuario_entrada column
 * @method UsoBateriasMontacargasQuery orderByUsuarioSalida($order = Criteria::ASC) Order by the usuario_salida column
 *
 * @method UsoBateriasMontacargasQuery groupById() Group by the id column
 * @method UsoBateriasMontacargasQuery groupByMc() Group by the mc column
 * @method UsoBateriasMontacargasQuery groupByBt() Group by the bt column
 * @method UsoBateriasMontacargasQuery groupByFechaEntrada() Group by the fecha_entrada column
 * @method UsoBateriasMontacargasQuery groupByFechaSalida() Group by the fecha_salida column
 * @method UsoBateriasMontacargasQuery groupByUsuarioEntrada() Group by the usuario_entrada column
 * @method UsoBateriasMontacargasQuery groupByUsuarioSalida() Group by the usuario_salida column
 *
 * @method UsoBateriasMontacargasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UsoBateriasMontacargasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UsoBateriasMontacargasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UsoBateriasMontacargasQuery leftJoinBaterias($relationAlias = null) Adds a LEFT JOIN clause to the query using the Baterias relation
 * @method UsoBateriasMontacargasQuery rightJoinBaterias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Baterias relation
 * @method UsoBateriasMontacargasQuery innerJoinBaterias($relationAlias = null) Adds a INNER JOIN clause to the query using the Baterias relation
 *
 * @method UsoBateriasMontacargasQuery leftJoinMontacargas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Montacargas relation
 * @method UsoBateriasMontacargasQuery rightJoinMontacargas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Montacargas relation
 * @method UsoBateriasMontacargasQuery innerJoinMontacargas($relationAlias = null) Adds a INNER JOIN clause to the query using the Montacargas relation
 *
 * @method UsoBateriasMontacargasQuery leftJoinUcUsersRelatedByUsuarioEntrada($relationAlias = null) Adds a LEFT JOIN clause to the query using the UcUsersRelatedByUsuarioEntrada relation
 * @method UsoBateriasMontacargasQuery rightJoinUcUsersRelatedByUsuarioEntrada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UcUsersRelatedByUsuarioEntrada relation
 * @method UsoBateriasMontacargasQuery innerJoinUcUsersRelatedByUsuarioEntrada($relationAlias = null) Adds a INNER JOIN clause to the query using the UcUsersRelatedByUsuarioEntrada relation
 *
 * @method UsoBateriasMontacargasQuery leftJoinUcUsersRelatedByUsuarioSalida($relationAlias = null) Adds a LEFT JOIN clause to the query using the UcUsersRelatedByUsuarioSalida relation
 * @method UsoBateriasMontacargasQuery rightJoinUcUsersRelatedByUsuarioSalida($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UcUsersRelatedByUsuarioSalida relation
 * @method UsoBateriasMontacargasQuery innerJoinUcUsersRelatedByUsuarioSalida($relationAlias = null) Adds a INNER JOIN clause to the query using the UcUsersRelatedByUsuarioSalida relation
 *
 * @method UsoBateriasMontacargas findOne(PropelPDO $con = null) Return the first UsoBateriasMontacargas matching the query
 * @method UsoBateriasMontacargas findOneOrCreate(PropelPDO $con = null) Return the first UsoBateriasMontacargas matching the query, or a new UsoBateriasMontacargas object populated from the query conditions when no match is found
 *
 * @method UsoBateriasMontacargas findOneByMc(int $mc) Return the first UsoBateriasMontacargas filtered by the mc column
 * @method UsoBateriasMontacargas findOneByBt(int $bt) Return the first UsoBateriasMontacargas filtered by the bt column
 * @method UsoBateriasMontacargas findOneByFechaEntrada(string $fecha_entrada) Return the first UsoBateriasMontacargas filtered by the fecha_entrada column
 * @method UsoBateriasMontacargas findOneByFechaSalida(string $fecha_salida) Return the first UsoBateriasMontacargas filtered by the fecha_salida column
 * @method UsoBateriasMontacargas findOneByUsuarioEntrada(int $usuario_entrada) Return the first UsoBateriasMontacargas filtered by the usuario_entrada column
 * @method UsoBateriasMontacargas findOneByUsuarioSalida(int $usuario_salida) Return the first UsoBateriasMontacargas filtered by the usuario_salida column
 *
 * @method array findById(int $id) Return UsoBateriasMontacargas objects filtered by the id column
 * @method array findByMc(int $mc) Return UsoBateriasMontacargas objects filtered by the mc column
 * @method array findByBt(int $bt) Return UsoBateriasMontacargas objects filtered by the bt column
 * @method array findByFechaEntrada(string $fecha_entrada) Return UsoBateriasMontacargas objects filtered by the fecha_entrada column
 * @method array findByFechaSalida(string $fecha_salida) Return UsoBateriasMontacargas objects filtered by the fecha_salida column
 * @method array findByUsuarioEntrada(int $usuario_entrada) Return UsoBateriasMontacargas objects filtered by the usuario_entrada column
 * @method array findByUsuarioSalida(int $usuario_salida) Return UsoBateriasMontacargas objects filtered by the usuario_salida column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseUsoBateriasMontacargasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUsoBateriasMontacargasQuery object.
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
            $modelName = 'UsoBateriasMontacargas';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UsoBateriasMontacargasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UsoBateriasMontacargasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UsoBateriasMontacargasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UsoBateriasMontacargasQuery) {
            return $criteria;
        }
        $query = new UsoBateriasMontacargasQuery(null, null, $modelAlias);

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
     * @return   UsoBateriasMontacargas|UsoBateriasMontacargas[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsoBateriasMontacargasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UsoBateriasMontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UsoBateriasMontacargas A model object, or null if the key is not found
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
     * @return                 UsoBateriasMontacargas A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `mc`, `bt`, `fecha_entrada`, `fecha_salida`, `usuario_entrada`, `usuario_salida` FROM `uso_baterias_montacargas` WHERE `id` = :p0';
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
            $obj = new UsoBateriasMontacargas();
            $obj->hydrate($row);
            UsoBateriasMontacargasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return UsoBateriasMontacargas|UsoBateriasMontacargas[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UsoBateriasMontacargas[]|mixed the list of results, formatted by the current formatter
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
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::ID, $keys, Criteria::IN);
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
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the mc column
     *
     * Example usage:
     * <code>
     * $query->filterByMc(1234); // WHERE mc = 1234
     * $query->filterByMc(array(12, 34)); // WHERE mc IN (12, 34)
     * $query->filterByMc(array('min' => 12)); // WHERE mc >= 12
     * $query->filterByMc(array('max' => 12)); // WHERE mc <= 12
     * </code>
     *
     * @see       filterByMontacargas()
     *
     * @param     mixed $mc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterByMc($mc = null, $comparison = null)
    {
        if (is_array($mc)) {
            $useMinMax = false;
            if (isset($mc['min'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::MC, $mc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mc['max'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::MC, $mc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::MC, $mc, $comparison);
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
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterByBt($bt = null, $comparison = null)
    {
        if (is_array($bt)) {
            $useMinMax = false;
            if (isset($bt['min'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::BT, $bt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bt['max'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::BT, $bt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::BT, $bt, $comparison);
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
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterByFechaEntrada($fechaEntrada = null, $comparison = null)
    {
        if (is_array($fechaEntrada)) {
            $useMinMax = false;
            if (isset($fechaEntrada['min'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::FECHA_ENTRADA, $fechaEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaEntrada['max'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::FECHA_ENTRADA, $fechaEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::FECHA_ENTRADA, $fechaEntrada, $comparison);
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
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterByFechaSalida($fechaSalida = null, $comparison = null)
    {
        if (is_array($fechaSalida)) {
            $useMinMax = false;
            if (isset($fechaSalida['min'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::FECHA_SALIDA, $fechaSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaSalida['max'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::FECHA_SALIDA, $fechaSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::FECHA_SALIDA, $fechaSalida, $comparison);
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
     * @see       filterByUcUsersRelatedByUsuarioEntrada()
     *
     * @param     mixed $usuarioEntrada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterByUsuarioEntrada($usuarioEntrada = null, $comparison = null)
    {
        if (is_array($usuarioEntrada)) {
            $useMinMax = false;
            if (isset($usuarioEntrada['min'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, $usuarioEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioEntrada['max'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, $usuarioEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, $usuarioEntrada, $comparison);
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
     * @see       filterByUcUsersRelatedByUsuarioSalida()
     *
     * @param     mixed $usuarioSalida The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function filterByUsuarioSalida($usuarioSalida = null, $comparison = null)
    {
        if (is_array($usuarioSalida)) {
            $useMinMax = false;
            if (isset($usuarioSalida['min'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_SALIDA, $usuarioSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioSalida['max'])) {
                $this->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_SALIDA, $usuarioSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_SALIDA, $usuarioSalida, $comparison);
    }

    /**
     * Filter the query by a related Baterias object
     *
     * @param   Baterias|PropelObjectCollection $baterias The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsoBateriasMontacargasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBaterias($baterias, $comparison = null)
    {
        if ($baterias instanceof Baterias) {
            return $this
                ->addUsingAlias(UsoBateriasMontacargasPeer::BT, $baterias->getIdbaterias(), $comparison);
        } elseif ($baterias instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsoBateriasMontacargasPeer::BT, $baterias->toKeyValue('PrimaryKey', 'Idbaterias'), $comparison);
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
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
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
     * Filter the query by a related Montacargas object
     *
     * @param   Montacargas|PropelObjectCollection $montacargas The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsoBateriasMontacargasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMontacargas($montacargas, $comparison = null)
    {
        if ($montacargas instanceof Montacargas) {
            return $this
                ->addUsingAlias(UsoBateriasMontacargasPeer::MC, $montacargas->getIdmontacargas(), $comparison);
        } elseif ($montacargas instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsoBateriasMontacargasPeer::MC, $montacargas->toKeyValue('PrimaryKey', 'Idmontacargas'), $comparison);
        } else {
            throw new PropelException('filterByMontacargas() only accepts arguments of type Montacargas or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Montacargas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function joinMontacargas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Montacargas');

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
            $this->addJoinObject($join, 'Montacargas');
        }

        return $this;
    }

    /**
     * Use the Montacargas relation Montacargas object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MontacargasQuery A secondary query class using the current class as primary query
     */
    public function useMontacargasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMontacargas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Montacargas', 'MontacargasQuery');
    }

    /**
     * Filter the query by a related UcUsers object
     *
     * @param   UcUsers|PropelObjectCollection $ucUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsoBateriasMontacargasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUcUsersRelatedByUsuarioEntrada($ucUsers, $comparison = null)
    {
        if ($ucUsers instanceof UcUsers) {
            return $this
                ->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, $ucUsers->getId(), $comparison);
        } elseif ($ucUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_ENTRADA, $ucUsers->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUcUsersRelatedByUsuarioEntrada() only accepts arguments of type UcUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UcUsersRelatedByUsuarioEntrada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function joinUcUsersRelatedByUsuarioEntrada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UcUsersRelatedByUsuarioEntrada');

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
            $this->addJoinObject($join, 'UcUsersRelatedByUsuarioEntrada');
        }

        return $this;
    }

    /**
     * Use the UcUsersRelatedByUsuarioEntrada relation UcUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UcUsersQuery A secondary query class using the current class as primary query
     */
    public function useUcUsersRelatedByUsuarioEntradaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUcUsersRelatedByUsuarioEntrada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UcUsersRelatedByUsuarioEntrada', 'UcUsersQuery');
    }

    /**
     * Filter the query by a related UcUsers object
     *
     * @param   UcUsers|PropelObjectCollection $ucUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsoBateriasMontacargasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUcUsersRelatedByUsuarioSalida($ucUsers, $comparison = null)
    {
        if ($ucUsers instanceof UcUsers) {
            return $this
                ->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_SALIDA, $ucUsers->getId(), $comparison);
        } elseif ($ucUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsoBateriasMontacargasPeer::USUARIO_SALIDA, $ucUsers->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUcUsersRelatedByUsuarioSalida() only accepts arguments of type UcUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UcUsersRelatedByUsuarioSalida relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function joinUcUsersRelatedByUsuarioSalida($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UcUsersRelatedByUsuarioSalida');

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
            $this->addJoinObject($join, 'UcUsersRelatedByUsuarioSalida');
        }

        return $this;
    }

    /**
     * Use the UcUsersRelatedByUsuarioSalida relation UcUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UcUsersQuery A secondary query class using the current class as primary query
     */
    public function useUcUsersRelatedByUsuarioSalidaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUcUsersRelatedByUsuarioSalida($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UcUsersRelatedByUsuarioSalida', 'UcUsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   UsoBateriasMontacargas $usoBateriasMontacargas Object to remove from the list of results
     *
     * @return UsoBateriasMontacargasQuery The current query, for fluid interface
     */
    public function prune($usoBateriasMontacargas = null)
    {
        if ($usoBateriasMontacargas) {
            $this->addUsingAlias(UsoBateriasMontacargasPeer::ID, $usoBateriasMontacargas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
