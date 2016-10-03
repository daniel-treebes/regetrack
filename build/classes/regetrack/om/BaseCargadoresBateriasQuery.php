<?php


/**
 * Base class that represents a query for the 'cargadores_baterias' table.
 *
 *
 *
 * @method CargadoresBateriasQuery orderByIdcargadoresBaterias($order = Criteria::ASC) Order by the idcargadores_baterias column
 * @method CargadoresBateriasQuery orderByIdcargadores($order = Criteria::ASC) Order by the idcargadores column
 * @method CargadoresBateriasQuery orderByIdbaterias($order = Criteria::ASC) Order by the idbaterias column
 *
 * @method CargadoresBateriasQuery groupByIdcargadoresBaterias() Group by the idcargadores_baterias column
 * @method CargadoresBateriasQuery groupByIdcargadores() Group by the idcargadores column
 * @method CargadoresBateriasQuery groupByIdbaterias() Group by the idbaterias column
 *
 * @method CargadoresBateriasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CargadoresBateriasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CargadoresBateriasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CargadoresBateriasQuery leftJoinBaterias($relationAlias = null) Adds a LEFT JOIN clause to the query using the Baterias relation
 * @method CargadoresBateriasQuery rightJoinBaterias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Baterias relation
 * @method CargadoresBateriasQuery innerJoinBaterias($relationAlias = null) Adds a INNER JOIN clause to the query using the Baterias relation
 *
 * @method CargadoresBateriasQuery leftJoinCargadores($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargadores relation
 * @method CargadoresBateriasQuery rightJoinCargadores($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargadores relation
 * @method CargadoresBateriasQuery innerJoinCargadores($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargadores relation
 *
 * @method CargadoresBaterias findOne(PropelPDO $con = null) Return the first CargadoresBaterias matching the query
 * @method CargadoresBaterias findOneOrCreate(PropelPDO $con = null) Return the first CargadoresBaterias matching the query, or a new CargadoresBaterias object populated from the query conditions when no match is found
 *
 * @method CargadoresBaterias findOneByIdcargadores(int $idcargadores) Return the first CargadoresBaterias filtered by the idcargadores column
 * @method CargadoresBaterias findOneByIdbaterias(int $idbaterias) Return the first CargadoresBaterias filtered by the idbaterias column
 *
 * @method array findByIdcargadoresBaterias(int $idcargadores_baterias) Return CargadoresBaterias objects filtered by the idcargadores_baterias column
 * @method array findByIdcargadores(int $idcargadores) Return CargadoresBaterias objects filtered by the idcargadores column
 * @method array findByIdbaterias(int $idbaterias) Return CargadoresBaterias objects filtered by the idbaterias column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseCargadoresBateriasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCargadoresBateriasQuery object.
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
            $modelName = 'CargadoresBaterias';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CargadoresBateriasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CargadoresBateriasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CargadoresBateriasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CargadoresBateriasQuery) {
            return $criteria;
        }
        $query = new CargadoresBateriasQuery(null, null, $modelAlias);

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
     * @return   CargadoresBaterias|CargadoresBaterias[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CargadoresBateriasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CargadoresBateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 CargadoresBaterias A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcargadoresBaterias($key, $con = null)
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
     * @return                 CargadoresBaterias A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idcargadores_baterias`, `idcargadores`, `idbaterias` FROM `cargadores_baterias` WHERE `idcargadores_baterias` = :p0';
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
            $obj = new CargadoresBaterias();
            $obj->hydrate($row);
            CargadoresBateriasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return CargadoresBaterias|CargadoresBaterias[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|CargadoresBaterias[]|mixed the list of results, formatted by the current formatter
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
     * @return CargadoresBateriasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES_BATERIAS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CargadoresBateriasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES_BATERIAS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idcargadores_baterias column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcargadoresBaterias(1234); // WHERE idcargadores_baterias = 1234
     * $query->filterByIdcargadoresBaterias(array(12, 34)); // WHERE idcargadores_baterias IN (12, 34)
     * $query->filterByIdcargadoresBaterias(array('min' => 12)); // WHERE idcargadores_baterias >= 12
     * $query->filterByIdcargadoresBaterias(array('max' => 12)); // WHERE idcargadores_baterias <= 12
     * </code>
     *
     * @param     mixed $idcargadoresBaterias The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresBateriasQuery The current query, for fluid interface
     */
    public function filterByIdcargadoresBaterias($idcargadoresBaterias = null, $comparison = null)
    {
        if (is_array($idcargadoresBaterias)) {
            $useMinMax = false;
            if (isset($idcargadoresBaterias['min'])) {
                $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES_BATERIAS, $idcargadoresBaterias['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcargadoresBaterias['max'])) {
                $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES_BATERIAS, $idcargadoresBaterias['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES_BATERIAS, $idcargadoresBaterias, $comparison);
    }

    /**
     * Filter the query on the idcargadores column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcargadores(1234); // WHERE idcargadores = 1234
     * $query->filterByIdcargadores(array(12, 34)); // WHERE idcargadores IN (12, 34)
     * $query->filterByIdcargadores(array('min' => 12)); // WHERE idcargadores >= 12
     * $query->filterByIdcargadores(array('max' => 12)); // WHERE idcargadores <= 12
     * </code>
     *
     * @see       filterByCargadores()
     *
     * @param     mixed $idcargadores The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresBateriasQuery The current query, for fluid interface
     */
    public function filterByIdcargadores($idcargadores = null, $comparison = null)
    {
        if (is_array($idcargadores)) {
            $useMinMax = false;
            if (isset($idcargadores['min'])) {
                $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES, $idcargadores['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcargadores['max'])) {
                $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES, $idcargadores['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES, $idcargadores, $comparison);
    }

    /**
     * Filter the query on the idbaterias column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbaterias(1234); // WHERE idbaterias = 1234
     * $query->filterByIdbaterias(array(12, 34)); // WHERE idbaterias IN (12, 34)
     * $query->filterByIdbaterias(array('min' => 12)); // WHERE idbaterias >= 12
     * $query->filterByIdbaterias(array('max' => 12)); // WHERE idbaterias <= 12
     * </code>
     *
     * @see       filterByBaterias()
     *
     * @param     mixed $idbaterias The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresBateriasQuery The current query, for fluid interface
     */
    public function filterByIdbaterias($idbaterias = null, $comparison = null)
    {
        if (is_array($idbaterias)) {
            $useMinMax = false;
            if (isset($idbaterias['min'])) {
                $this->addUsingAlias(CargadoresBateriasPeer::IDBATERIAS, $idbaterias['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbaterias['max'])) {
                $this->addUsingAlias(CargadoresBateriasPeer::IDBATERIAS, $idbaterias['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargadoresBateriasPeer::IDBATERIAS, $idbaterias, $comparison);
    }

    /**
     * Filter the query by a related Baterias object
     *
     * @param   Baterias|PropelObjectCollection $baterias The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CargadoresBateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBaterias($baterias, $comparison = null)
    {
        if ($baterias instanceof Baterias) {
            return $this
                ->addUsingAlias(CargadoresBateriasPeer::IDBATERIAS, $baterias->getIdbaterias(), $comparison);
        } elseif ($baterias instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CargadoresBateriasPeer::IDBATERIAS, $baterias->toKeyValue('PrimaryKey', 'Idbaterias'), $comparison);
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
     * @return CargadoresBateriasQuery The current query, for fluid interface
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
     * @param   Cargadores|PropelObjectCollection $cargadores The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CargadoresBateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCargadores($cargadores, $comparison = null)
    {
        if ($cargadores instanceof Cargadores) {
            return $this
                ->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES, $cargadores->getIdcargadores(), $comparison);
        } elseif ($cargadores instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES, $cargadores->toKeyValue('PrimaryKey', 'Idcargadores'), $comparison);
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
     * @return CargadoresBateriasQuery The current query, for fluid interface
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
     * @param   CargadoresBaterias $cargadoresBaterias Object to remove from the list of results
     *
     * @return CargadoresBateriasQuery The current query, for fluid interface
     */
    public function prune($cargadoresBaterias = null)
    {
        if ($cargadoresBaterias) {
            $this->addUsingAlias(CargadoresBateriasPeer::IDCARGADORES_BATERIAS, $cargadoresBaterias->getIdcargadoresBaterias(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
