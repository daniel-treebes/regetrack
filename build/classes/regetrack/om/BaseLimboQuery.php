<?php


/**
 * Base class that represents a query for the 'limbo' table.
 *
 *
 *
 * @method LimboQuery orderById($order = Criteria::ASC) Order by the id column
 * @method LimboQuery orderByBt($order = Criteria::ASC) Order by the bt column
 * @method LimboQuery orderByMotivo($order = Criteria::ASC) Order by the motivo column
 * @method LimboQuery orderByFechaEntrada($order = Criteria::ASC) Order by the fecha_entrada column
 * @method LimboQuery orderByFechaSalida($order = Criteria::ASC) Order by the fecha_salida column
 * @method LimboQuery orderByUsuarioEntrada($order = Criteria::ASC) Order by the usuario_entrada column
 * @method LimboQuery orderByUsuarioSalida($order = Criteria::ASC) Order by the usuario_salida column
 *
 * @method LimboQuery groupById() Group by the id column
 * @method LimboQuery groupByBt() Group by the bt column
 * @method LimboQuery groupByMotivo() Group by the motivo column
 * @method LimboQuery groupByFechaEntrada() Group by the fecha_entrada column
 * @method LimboQuery groupByFechaSalida() Group by the fecha_salida column
 * @method LimboQuery groupByUsuarioEntrada() Group by the usuario_entrada column
 * @method LimboQuery groupByUsuarioSalida() Group by the usuario_salida column
 *
 * @method LimboQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LimboQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LimboQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LimboQuery leftJoinBaterias($relationAlias = null) Adds a LEFT JOIN clause to the query using the Baterias relation
 * @method LimboQuery rightJoinBaterias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Baterias relation
 * @method LimboQuery innerJoinBaterias($relationAlias = null) Adds a INNER JOIN clause to the query using the Baterias relation
 *
 * @method Limbo findOne(PropelPDO $con = null) Return the first Limbo matching the query
 * @method Limbo findOneOrCreate(PropelPDO $con = null) Return the first Limbo matching the query, or a new Limbo object populated from the query conditions when no match is found
 *
 * @method Limbo findOneByBt(int $bt) Return the first Limbo filtered by the bt column
 * @method Limbo findOneByMotivo(string $motivo) Return the first Limbo filtered by the motivo column
 * @method Limbo findOneByFechaEntrada(string $fecha_entrada) Return the first Limbo filtered by the fecha_entrada column
 * @method Limbo findOneByFechaSalida(string $fecha_salida) Return the first Limbo filtered by the fecha_salida column
 * @method Limbo findOneByUsuarioEntrada(int $usuario_entrada) Return the first Limbo filtered by the usuario_entrada column
 * @method Limbo findOneByUsuarioSalida(int $usuario_salida) Return the first Limbo filtered by the usuario_salida column
 *
 * @method array findById(int $id) Return Limbo objects filtered by the id column
 * @method array findByBt(int $bt) Return Limbo objects filtered by the bt column
 * @method array findByMotivo(string $motivo) Return Limbo objects filtered by the motivo column
 * @method array findByFechaEntrada(string $fecha_entrada) Return Limbo objects filtered by the fecha_entrada column
 * @method array findByFechaSalida(string $fecha_salida) Return Limbo objects filtered by the fecha_salida column
 * @method array findByUsuarioEntrada(int $usuario_entrada) Return Limbo objects filtered by the usuario_entrada column
 * @method array findByUsuarioSalida(int $usuario_salida) Return Limbo objects filtered by the usuario_salida column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseLimboQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLimboQuery object.
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
            $modelName = 'Limbo';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LimboQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LimboQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LimboQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LimboQuery) {
            return $criteria;
        }
        $query = new LimboQuery(null, null, $modelAlias);

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
     * @return   Limbo|Limbo[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LimboPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LimboPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Limbo A model object, or null if the key is not found
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
     * @return                 Limbo A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `bt`, `motivo`, `fecha_entrada`, `fecha_salida`, `usuario_entrada`, `usuario_salida` FROM `limbo` WHERE `id` = :p0';
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
            $obj = new Limbo();
            $obj->hydrate($row);
            LimboPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Limbo|Limbo[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Limbo[]|mixed the list of results, formatted by the current formatter
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
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LimboPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LimboPeer::ID, $keys, Criteria::IN);
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
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LimboPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LimboPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimboPeer::ID, $id, $comparison);
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
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterByBt($bt = null, $comparison = null)
    {
        if (is_array($bt)) {
            $useMinMax = false;
            if (isset($bt['min'])) {
                $this->addUsingAlias(LimboPeer::BT, $bt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bt['max'])) {
                $this->addUsingAlias(LimboPeer::BT, $bt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimboPeer::BT, $bt, $comparison);
    }

    /**
     * Filter the query on the motivo column
     *
     * Example usage:
     * <code>
     * $query->filterByMotivo('fooValue');   // WHERE motivo = 'fooValue'
     * $query->filterByMotivo('%fooValue%'); // WHERE motivo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $motivo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterByMotivo($motivo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($motivo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $motivo)) {
                $motivo = str_replace('*', '%', $motivo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LimboPeer::MOTIVO, $motivo, $comparison);
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
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterByFechaEntrada($fechaEntrada = null, $comparison = null)
    {
        if (is_array($fechaEntrada)) {
            $useMinMax = false;
            if (isset($fechaEntrada['min'])) {
                $this->addUsingAlias(LimboPeer::FECHA_ENTRADA, $fechaEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaEntrada['max'])) {
                $this->addUsingAlias(LimboPeer::FECHA_ENTRADA, $fechaEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimboPeer::FECHA_ENTRADA, $fechaEntrada, $comparison);
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
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterByFechaSalida($fechaSalida = null, $comparison = null)
    {
        if (is_array($fechaSalida)) {
            $useMinMax = false;
            if (isset($fechaSalida['min'])) {
                $this->addUsingAlias(LimboPeer::FECHA_SALIDA, $fechaSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaSalida['max'])) {
                $this->addUsingAlias(LimboPeer::FECHA_SALIDA, $fechaSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimboPeer::FECHA_SALIDA, $fechaSalida, $comparison);
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
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterByUsuarioEntrada($usuarioEntrada = null, $comparison = null)
    {
        if (is_array($usuarioEntrada)) {
            $useMinMax = false;
            if (isset($usuarioEntrada['min'])) {
                $this->addUsingAlias(LimboPeer::USUARIO_ENTRADA, $usuarioEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioEntrada['max'])) {
                $this->addUsingAlias(LimboPeer::USUARIO_ENTRADA, $usuarioEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimboPeer::USUARIO_ENTRADA, $usuarioEntrada, $comparison);
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
     * @return LimboQuery The current query, for fluid interface
     */
    public function filterByUsuarioSalida($usuarioSalida = null, $comparison = null)
    {
        if (is_array($usuarioSalida)) {
            $useMinMax = false;
            if (isset($usuarioSalida['min'])) {
                $this->addUsingAlias(LimboPeer::USUARIO_SALIDA, $usuarioSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioSalida['max'])) {
                $this->addUsingAlias(LimboPeer::USUARIO_SALIDA, $usuarioSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimboPeer::USUARIO_SALIDA, $usuarioSalida, $comparison);
    }

    /**
     * Filter the query by a related Baterias object
     *
     * @param   Baterias|PropelObjectCollection $baterias The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LimboQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBaterias($baterias, $comparison = null)
    {
        if ($baterias instanceof Baterias) {
            return $this
                ->addUsingAlias(LimboPeer::BT, $baterias->getIdbaterias(), $comparison);
        } elseif ($baterias instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LimboPeer::BT, $baterias->toKeyValue('PrimaryKey', 'Idbaterias'), $comparison);
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
     * @return LimboQuery The current query, for fluid interface
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
     * @param   Limbo $limbo Object to remove from the list of results
     *
     * @return LimboQuery The current query, for fluid interface
     */
    public function prune($limbo = null)
    {
        if ($limbo) {
            $this->addUsingAlias(LimboPeer::ID, $limbo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
