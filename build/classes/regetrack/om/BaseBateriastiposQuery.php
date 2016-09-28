<?php


/**
 * Base class that represents a query for the 'bateriastipos' table.
 *
 *
 *
 * @method BateriastiposQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BateriastiposQuery orderByIdsucursal($order = Criteria::ASC) Order by the idsucursal column
 * @method BateriastiposQuery orderByVolts($order = Criteria::ASC) Order by the volts column
 * @method BateriastiposQuery orderByAh($order = Criteria::ASC) Order by the ah column
 *
 * @method BateriastiposQuery groupById() Group by the id column
 * @method BateriastiposQuery groupByIdsucursal() Group by the idsucursal column
 * @method BateriastiposQuery groupByVolts() Group by the volts column
 * @method BateriastiposQuery groupByAh() Group by the ah column
 *
 * @method BateriastiposQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BateriastiposQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BateriastiposQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BateriastiposQuery leftJoinSucursal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sucursal relation
 * @method BateriastiposQuery rightJoinSucursal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sucursal relation
 * @method BateriastiposQuery innerJoinSucursal($relationAlias = null) Adds a INNER JOIN clause to the query using the Sucursal relation
 *
 * @method BateriastiposQuery leftJoinBaterias($relationAlias = null) Adds a LEFT JOIN clause to the query using the Baterias relation
 * @method BateriastiposQuery rightJoinBaterias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Baterias relation
 * @method BateriastiposQuery innerJoinBaterias($relationAlias = null) Adds a INNER JOIN clause to the query using the Baterias relation
 *
 * @method BateriastiposQuery leftJoinCargadores($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargadores relation
 * @method BateriastiposQuery rightJoinCargadores($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargadores relation
 * @method BateriastiposQuery innerJoinCargadores($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargadores relation
 *
 * @method BateriastiposQuery leftJoinMontacargas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Montacargas relation
 * @method BateriastiposQuery rightJoinMontacargas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Montacargas relation
 * @method BateriastiposQuery innerJoinMontacargas($relationAlias = null) Adds a INNER JOIN clause to the query using the Montacargas relation
 *
 * @method Bateriastipos findOne(PropelPDO $con = null) Return the first Bateriastipos matching the query
 * @method Bateriastipos findOneOrCreate(PropelPDO $con = null) Return the first Bateriastipos matching the query, or a new Bateriastipos object populated from the query conditions when no match is found
 *
 * @method Bateriastipos findOneByIdsucursal(int $idsucursal) Return the first Bateriastipos filtered by the idsucursal column
 * @method Bateriastipos findOneByVolts(int $volts) Return the first Bateriastipos filtered by the volts column
 * @method Bateriastipos findOneByAh(int $ah) Return the first Bateriastipos filtered by the ah column
 *
 * @method array findById(int $id) Return Bateriastipos objects filtered by the id column
 * @method array findByIdsucursal(int $idsucursal) Return Bateriastipos objects filtered by the idsucursal column
 * @method array findByVolts(int $volts) Return Bateriastipos objects filtered by the volts column
 * @method array findByAh(int $ah) Return Bateriastipos objects filtered by the ah column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseBateriastiposQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBateriastiposQuery object.
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
            $modelName = 'Bateriastipos';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BateriastiposQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BateriastiposQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BateriastiposQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BateriastiposQuery) {
            return $criteria;
        }
        $query = new BateriastiposQuery(null, null, $modelAlias);

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
     * @return   Bateriastipos|Bateriastipos[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BateriastiposPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BateriastiposPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bateriastipos A model object, or null if the key is not found
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
     * @return                 Bateriastipos A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `idsucursal`, `volts`, `ah` FROM `bateriastipos` WHERE `id` = :p0';
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
            $obj = new Bateriastipos();
            $obj->hydrate($row);
            BateriastiposPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bateriastipos|Bateriastipos[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Bateriastipos[]|mixed the list of results, formatted by the current formatter
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
     * @return BateriastiposQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BateriastiposPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BateriastiposQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BateriastiposPeer::ID, $keys, Criteria::IN);
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
     * @return BateriastiposQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BateriastiposPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BateriastiposPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriastiposPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the idsucursal column
     *
     * Example usage:
     * <code>
     * $query->filterByIdsucursal(1234); // WHERE idsucursal = 1234
     * $query->filterByIdsucursal(array(12, 34)); // WHERE idsucursal IN (12, 34)
     * $query->filterByIdsucursal(array('min' => 12)); // WHERE idsucursal >= 12
     * $query->filterByIdsucursal(array('max' => 12)); // WHERE idsucursal <= 12
     * </code>
     *
     * @see       filterBySucursal()
     *
     * @param     mixed $idsucursal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriastiposQuery The current query, for fluid interface
     */
    public function filterByIdsucursal($idsucursal = null, $comparison = null)
    {
        if (is_array($idsucursal)) {
            $useMinMax = false;
            if (isset($idsucursal['min'])) {
                $this->addUsingAlias(BateriastiposPeer::IDSUCURSAL, $idsucursal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idsucursal['max'])) {
                $this->addUsingAlias(BateriastiposPeer::IDSUCURSAL, $idsucursal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriastiposPeer::IDSUCURSAL, $idsucursal, $comparison);
    }

    /**
     * Filter the query on the volts column
     *
     * Example usage:
     * <code>
     * $query->filterByVolts(1234); // WHERE volts = 1234
     * $query->filterByVolts(array(12, 34)); // WHERE volts IN (12, 34)
     * $query->filterByVolts(array('min' => 12)); // WHERE volts >= 12
     * $query->filterByVolts(array('max' => 12)); // WHERE volts <= 12
     * </code>
     *
     * @param     mixed $volts The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriastiposQuery The current query, for fluid interface
     */
    public function filterByVolts($volts = null, $comparison = null)
    {
        if (is_array($volts)) {
            $useMinMax = false;
            if (isset($volts['min'])) {
                $this->addUsingAlias(BateriastiposPeer::VOLTS, $volts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volts['max'])) {
                $this->addUsingAlias(BateriastiposPeer::VOLTS, $volts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriastiposPeer::VOLTS, $volts, $comparison);
    }

    /**
     * Filter the query on the ah column
     *
     * Example usage:
     * <code>
     * $query->filterByAh(1234); // WHERE ah = 1234
     * $query->filterByAh(array(12, 34)); // WHERE ah IN (12, 34)
     * $query->filterByAh(array('min' => 12)); // WHERE ah >= 12
     * $query->filterByAh(array('max' => 12)); // WHERE ah <= 12
     * </code>
     *
     * @param     mixed $ah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriastiposQuery The current query, for fluid interface
     */
    public function filterByAh($ah = null, $comparison = null)
    {
        if (is_array($ah)) {
            $useMinMax = false;
            if (isset($ah['min'])) {
                $this->addUsingAlias(BateriastiposPeer::AH, $ah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ah['max'])) {
                $this->addUsingAlias(BateriastiposPeer::AH, $ah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriastiposPeer::AH, $ah, $comparison);
    }

    /**
     * Filter the query by a related Sucursal object
     *
     * @param   Sucursal|PropelObjectCollection $sucursal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriastiposQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySucursal($sucursal, $comparison = null)
    {
        if ($sucursal instanceof Sucursal) {
            return $this
                ->addUsingAlias(BateriastiposPeer::IDSUCURSAL, $sucursal->getIdsucursal(), $comparison);
        } elseif ($sucursal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BateriastiposPeer::IDSUCURSAL, $sucursal->toKeyValue('PrimaryKey', 'Idsucursal'), $comparison);
        } else {
            throw new PropelException('filterBySucursal() only accepts arguments of type Sucursal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sucursal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BateriastiposQuery The current query, for fluid interface
     */
    public function joinSucursal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sucursal');

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
            $this->addJoinObject($join, 'Sucursal');
        }

        return $this;
    }

    /**
     * Use the Sucursal relation Sucursal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SucursalQuery A secondary query class using the current class as primary query
     */
    public function useSucursalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSucursal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sucursal', 'SucursalQuery');
    }

    /**
     * Filter the query by a related Baterias object
     *
     * @param   Baterias|PropelObjectCollection $baterias  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriastiposQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBaterias($baterias, $comparison = null)
    {
        if ($baterias instanceof Baterias) {
            return $this
                ->addUsingAlias(BateriastiposPeer::ID, $baterias->getTipo(), $comparison);
        } elseif ($baterias instanceof PropelObjectCollection) {
            return $this
                ->useBateriasQuery()
                ->filterByPrimaryKeys($baterias->getPrimaryKeys())
                ->endUse();
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
     * @return BateriastiposQuery The current query, for fluid interface
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
     * Filter the query by a related Cargadores object
     *
     * @param   Cargadores|PropelObjectCollection $cargadores  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriastiposQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCargadores($cargadores, $comparison = null)
    {
        if ($cargadores instanceof Cargadores) {
            return $this
                ->addUsingAlias(BateriastiposPeer::ID, $cargadores->getTipo(), $comparison);
        } elseif ($cargadores instanceof PropelObjectCollection) {
            return $this
                ->useCargadoresQuery()
                ->filterByPrimaryKeys($cargadores->getPrimaryKeys())
                ->endUse();
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
     * @return BateriastiposQuery The current query, for fluid interface
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
     * Filter the query by a related Montacargas object
     *
     * @param   Montacargas|PropelObjectCollection $montacargas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriastiposQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMontacargas($montacargas, $comparison = null)
    {
        if ($montacargas instanceof Montacargas) {
            return $this
                ->addUsingAlias(BateriastiposPeer::ID, $montacargas->getTipo(), $comparison);
        } elseif ($montacargas instanceof PropelObjectCollection) {
            return $this
                ->useMontacargasQuery()
                ->filterByPrimaryKeys($montacargas->getPrimaryKeys())
                ->endUse();
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
     * @return BateriastiposQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Bateriastipos $bateriastipos Object to remove from the list of results
     *
     * @return BateriastiposQuery The current query, for fluid interface
     */
    public function prune($bateriastipos = null)
    {
        if ($bateriastipos) {
            $this->addUsingAlias(BateriastiposPeer::ID, $bateriastipos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
