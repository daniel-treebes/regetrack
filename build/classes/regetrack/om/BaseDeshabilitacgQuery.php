<?php


/**
 * Base class that represents a query for the 'deshabilitacg' table.
 *
 *
 *
 * @method DeshabilitacgQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DeshabilitacgQuery orderByCg($order = Criteria::ASC) Order by the cg column
 * @method DeshabilitacgQuery orderByMotivo($order = Criteria::ASC) Order by the motivo column
 * @method DeshabilitacgQuery orderByFechaEntrada($order = Criteria::ASC) Order by the fecha_entrada column
 * @method DeshabilitacgQuery orderByFechaSalida($order = Criteria::ASC) Order by the fecha_salida column
 * @method DeshabilitacgQuery orderByUsuarioEntrada($order = Criteria::ASC) Order by the usuario_entrada column
 * @method DeshabilitacgQuery orderByUsuarioSalida($order = Criteria::ASC) Order by the usuario_salida column
 *
 * @method DeshabilitacgQuery groupById() Group by the id column
 * @method DeshabilitacgQuery groupByCg() Group by the cg column
 * @method DeshabilitacgQuery groupByMotivo() Group by the motivo column
 * @method DeshabilitacgQuery groupByFechaEntrada() Group by the fecha_entrada column
 * @method DeshabilitacgQuery groupByFechaSalida() Group by the fecha_salida column
 * @method DeshabilitacgQuery groupByUsuarioEntrada() Group by the usuario_entrada column
 * @method DeshabilitacgQuery groupByUsuarioSalida() Group by the usuario_salida column
 *
 * @method DeshabilitacgQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DeshabilitacgQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DeshabilitacgQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DeshabilitacgQuery leftJoinCargadores($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargadores relation
 * @method DeshabilitacgQuery rightJoinCargadores($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargadores relation
 * @method DeshabilitacgQuery innerJoinCargadores($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargadores relation
 *
 * @method Deshabilitacg findOne(PropelPDO $con = null) Return the first Deshabilitacg matching the query
 * @method Deshabilitacg findOneOrCreate(PropelPDO $con = null) Return the first Deshabilitacg matching the query, or a new Deshabilitacg object populated from the query conditions when no match is found
 *
 * @method Deshabilitacg findOneByCg(int $cg) Return the first Deshabilitacg filtered by the cg column
 * @method Deshabilitacg findOneByMotivo(string $motivo) Return the first Deshabilitacg filtered by the motivo column
 * @method Deshabilitacg findOneByFechaEntrada(string $fecha_entrada) Return the first Deshabilitacg filtered by the fecha_entrada column
 * @method Deshabilitacg findOneByFechaSalida(string $fecha_salida) Return the first Deshabilitacg filtered by the fecha_salida column
 * @method Deshabilitacg findOneByUsuarioEntrada(int $usuario_entrada) Return the first Deshabilitacg filtered by the usuario_entrada column
 * @method Deshabilitacg findOneByUsuarioSalida(int $usuario_salida) Return the first Deshabilitacg filtered by the usuario_salida column
 *
 * @method array findById(int $id) Return Deshabilitacg objects filtered by the id column
 * @method array findByCg(int $cg) Return Deshabilitacg objects filtered by the cg column
 * @method array findByMotivo(string $motivo) Return Deshabilitacg objects filtered by the motivo column
 * @method array findByFechaEntrada(string $fecha_entrada) Return Deshabilitacg objects filtered by the fecha_entrada column
 * @method array findByFechaSalida(string $fecha_salida) Return Deshabilitacg objects filtered by the fecha_salida column
 * @method array findByUsuarioEntrada(int $usuario_entrada) Return Deshabilitacg objects filtered by the usuario_entrada column
 * @method array findByUsuarioSalida(int $usuario_salida) Return Deshabilitacg objects filtered by the usuario_salida column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseDeshabilitacgQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDeshabilitacgQuery object.
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
            $modelName = 'Deshabilitacg';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DeshabilitacgQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DeshabilitacgQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DeshabilitacgQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DeshabilitacgQuery) {
            return $criteria;
        }
        $query = new DeshabilitacgQuery(null, null, $modelAlias);

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
     * @return   Deshabilitacg|Deshabilitacg[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DeshabilitacgPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DeshabilitacgPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Deshabilitacg A model object, or null if the key is not found
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
     * @return                 Deshabilitacg A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `cg`, `motivo`, `fecha_entrada`, `fecha_salida`, `usuario_entrada`, `usuario_salida` FROM `deshabilitacg` WHERE `id` = :p0';
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
            $obj = new Deshabilitacg();
            $obj->hydrate($row);
            DeshabilitacgPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Deshabilitacg|Deshabilitacg[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Deshabilitacg[]|mixed the list of results, formatted by the current formatter
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
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DeshabilitacgPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DeshabilitacgPeer::ID, $keys, Criteria::IN);
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
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DeshabilitacgPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DeshabilitacgPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitacgPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the cg column
     *
     * Example usage:
     * <code>
     * $query->filterByCg(1234); // WHERE cg = 1234
     * $query->filterByCg(array(12, 34)); // WHERE cg IN (12, 34)
     * $query->filterByCg(array('min' => 12)); // WHERE cg >= 12
     * $query->filterByCg(array('max' => 12)); // WHERE cg <= 12
     * </code>
     *
     * @see       filterByCargadores()
     *
     * @param     mixed $cg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function filterByCg($cg = null, $comparison = null)
    {
        if (is_array($cg)) {
            $useMinMax = false;
            if (isset($cg['min'])) {
                $this->addUsingAlias(DeshabilitacgPeer::CG, $cg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cg['max'])) {
                $this->addUsingAlias(DeshabilitacgPeer::CG, $cg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitacgPeer::CG, $cg, $comparison);
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
     * @return DeshabilitacgQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DeshabilitacgPeer::MOTIVO, $motivo, $comparison);
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
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function filterByFechaEntrada($fechaEntrada = null, $comparison = null)
    {
        if (is_array($fechaEntrada)) {
            $useMinMax = false;
            if (isset($fechaEntrada['min'])) {
                $this->addUsingAlias(DeshabilitacgPeer::FECHA_ENTRADA, $fechaEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaEntrada['max'])) {
                $this->addUsingAlias(DeshabilitacgPeer::FECHA_ENTRADA, $fechaEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitacgPeer::FECHA_ENTRADA, $fechaEntrada, $comparison);
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
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function filterByFechaSalida($fechaSalida = null, $comparison = null)
    {
        if (is_array($fechaSalida)) {
            $useMinMax = false;
            if (isset($fechaSalida['min'])) {
                $this->addUsingAlias(DeshabilitacgPeer::FECHA_SALIDA, $fechaSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaSalida['max'])) {
                $this->addUsingAlias(DeshabilitacgPeer::FECHA_SALIDA, $fechaSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitacgPeer::FECHA_SALIDA, $fechaSalida, $comparison);
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
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function filterByUsuarioEntrada($usuarioEntrada = null, $comparison = null)
    {
        if (is_array($usuarioEntrada)) {
            $useMinMax = false;
            if (isset($usuarioEntrada['min'])) {
                $this->addUsingAlias(DeshabilitacgPeer::USUARIO_ENTRADA, $usuarioEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioEntrada['max'])) {
                $this->addUsingAlias(DeshabilitacgPeer::USUARIO_ENTRADA, $usuarioEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitacgPeer::USUARIO_ENTRADA, $usuarioEntrada, $comparison);
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
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function filterByUsuarioSalida($usuarioSalida = null, $comparison = null)
    {
        if (is_array($usuarioSalida)) {
            $useMinMax = false;
            if (isset($usuarioSalida['min'])) {
                $this->addUsingAlias(DeshabilitacgPeer::USUARIO_SALIDA, $usuarioSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioSalida['max'])) {
                $this->addUsingAlias(DeshabilitacgPeer::USUARIO_SALIDA, $usuarioSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitacgPeer::USUARIO_SALIDA, $usuarioSalida, $comparison);
    }

    /**
     * Filter the query by a related Cargadores object
     *
     * @param   Cargadores|PropelObjectCollection $cargadores The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeshabilitacgQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCargadores($cargadores, $comparison = null)
    {
        if ($cargadores instanceof Cargadores) {
            return $this
                ->addUsingAlias(DeshabilitacgPeer::CG, $cargadores->getIdcargadores(), $comparison);
        } elseif ($cargadores instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DeshabilitacgPeer::CG, $cargadores->toKeyValue('PrimaryKey', 'Idcargadores'), $comparison);
        } else {
            throw new PropelException('filterByCargadores() only accepts arguments of type Cargadores or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cargadores relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function joinCargadores($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cargadores');

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
            $this->addJoinObject($join, 'Cargadores');
        }

        return $this;
    }

    /**
     * Use the Cargadores relation Cargadores object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CargadoresQuery A secondary query class using the current class as primary query
     */
    public function useCargadoresQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCargadores($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cargadores', 'CargadoresQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Deshabilitacg $deshabilitacg Object to remove from the list of results
     *
     * @return DeshabilitacgQuery The current query, for fluid interface
     */
    public function prune($deshabilitacg = null)
    {
        if ($deshabilitacg) {
            $this->addUsingAlias(DeshabilitacgPeer::ID, $deshabilitacg->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
