<?php


/**
 * Base class that represents a query for the 'montacargas_baterias' table.
 *
 *
 *
 * @method MontacargasBateriasQuery orderByIdmontacargasBaterias($order = Criteria::ASC) Order by the idmontacargas_baterias column
 * @method MontacargasBateriasQuery orderByIdmontacargas($order = Criteria::ASC) Order by the idmontacargas column
 * @method MontacargasBateriasQuery orderByIdbaterias($order = Criteria::ASC) Order by the idbaterias column
 *
 * @method MontacargasBateriasQuery groupByIdmontacargasBaterias() Group by the idmontacargas_baterias column
 * @method MontacargasBateriasQuery groupByIdmontacargas() Group by the idmontacargas column
 * @method MontacargasBateriasQuery groupByIdbaterias() Group by the idbaterias column
 *
 * @method MontacargasBateriasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MontacargasBateriasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MontacargasBateriasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MontacargasBateriasQuery leftJoinMontacargas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Montacargas relation
 * @method MontacargasBateriasQuery rightJoinMontacargas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Montacargas relation
 * @method MontacargasBateriasQuery innerJoinMontacargas($relationAlias = null) Adds a INNER JOIN clause to the query using the Montacargas relation
 *
 * @method MontacargasBateriasQuery leftJoinBaterias($relationAlias = null) Adds a LEFT JOIN clause to the query using the Baterias relation
 * @method MontacargasBateriasQuery rightJoinBaterias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Baterias relation
 * @method MontacargasBateriasQuery innerJoinBaterias($relationAlias = null) Adds a INNER JOIN clause to the query using the Baterias relation
 *
 * @method MontacargasBaterias findOne(PropelPDO $con = null) Return the first MontacargasBaterias matching the query
 * @method MontacargasBaterias findOneOrCreate(PropelPDO $con = null) Return the first MontacargasBaterias matching the query, or a new MontacargasBaterias object populated from the query conditions when no match is found
 *
 * @method MontacargasBaterias findOneByIdmontacargas(int $idmontacargas) Return the first MontacargasBaterias filtered by the idmontacargas column
 * @method MontacargasBaterias findOneByIdbaterias(int $idbaterias) Return the first MontacargasBaterias filtered by the idbaterias column
 *
 * @method array findByIdmontacargasBaterias(int $idmontacargas_baterias) Return MontacargasBaterias objects filtered by the idmontacargas_baterias column
 * @method array findByIdmontacargas(int $idmontacargas) Return MontacargasBaterias objects filtered by the idmontacargas column
 * @method array findByIdbaterias(int $idbaterias) Return MontacargasBaterias objects filtered by the idbaterias column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseMontacargasBateriasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMontacargasBateriasQuery object.
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
            $modelName = 'MontacargasBaterias';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MontacargasBateriasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MontacargasBateriasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MontacargasBateriasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MontacargasBateriasQuery) {
            return $criteria;
        }
        $query = new MontacargasBateriasQuery(null, null, $modelAlias);

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
     * @return   MontacargasBaterias|MontacargasBaterias[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MontacargasBateriasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MontacargasBateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MontacargasBaterias A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmontacargasBaterias($key, $con = null)
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
     * @return                 MontacargasBaterias A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmontacargas_baterias`, `idmontacargas`, `idbaterias` FROM `montacargas_baterias` WHERE `idmontacargas_baterias` = :p0';
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
            $obj = new MontacargasBaterias();
            $obj->hydrate($row);
            MontacargasBateriasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return MontacargasBaterias|MontacargasBaterias[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MontacargasBaterias[]|mixed the list of results, formatted by the current formatter
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
     * @return MontacargasBateriasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS_BATERIAS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MontacargasBateriasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS_BATERIAS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmontacargas_baterias column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmontacargasBaterias(1234); // WHERE idmontacargas_baterias = 1234
     * $query->filterByIdmontacargasBaterias(array(12, 34)); // WHERE idmontacargas_baterias IN (12, 34)
     * $query->filterByIdmontacargasBaterias(array('min' => 12)); // WHERE idmontacargas_baterias >= 12
     * $query->filterByIdmontacargasBaterias(array('max' => 12)); // WHERE idmontacargas_baterias <= 12
     * </code>
     *
     * @param     mixed $idmontacargasBaterias The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasBateriasQuery The current query, for fluid interface
     */
    public function filterByIdmontacargasBaterias($idmontacargasBaterias = null, $comparison = null)
    {
        if (is_array($idmontacargasBaterias)) {
            $useMinMax = false;
            if (isset($idmontacargasBaterias['min'])) {
                $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS_BATERIAS, $idmontacargasBaterias['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmontacargasBaterias['max'])) {
                $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS_BATERIAS, $idmontacargasBaterias['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS_BATERIAS, $idmontacargasBaterias, $comparison);
    }

    /**
     * Filter the query on the idmontacargas column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmontacargas(1234); // WHERE idmontacargas = 1234
     * $query->filterByIdmontacargas(array(12, 34)); // WHERE idmontacargas IN (12, 34)
     * $query->filterByIdmontacargas(array('min' => 12)); // WHERE idmontacargas >= 12
     * $query->filterByIdmontacargas(array('max' => 12)); // WHERE idmontacargas <= 12
     * </code>
     *
     * @see       filterByMontacargas()
     *
     * @param     mixed $idmontacargas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasBateriasQuery The current query, for fluid interface
     */
    public function filterByIdmontacargas($idmontacargas = null, $comparison = null)
    {
        if (is_array($idmontacargas)) {
            $useMinMax = false;
            if (isset($idmontacargas['min'])) {
                $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS, $idmontacargas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmontacargas['max'])) {
                $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS, $idmontacargas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS, $idmontacargas, $comparison);
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
     * @return MontacargasBateriasQuery The current query, for fluid interface
     */
    public function filterByIdbaterias($idbaterias = null, $comparison = null)
    {
        if (is_array($idbaterias)) {
            $useMinMax = false;
            if (isset($idbaterias['min'])) {
                $this->addUsingAlias(MontacargasBateriasPeer::IDBATERIAS, $idbaterias['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbaterias['max'])) {
                $this->addUsingAlias(MontacargasBateriasPeer::IDBATERIAS, $idbaterias['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasBateriasPeer::IDBATERIAS, $idbaterias, $comparison);
    }

    /**
     * Filter the query by a related Montacargas object
     *
     * @param   Montacargas|PropelObjectCollection $montacargas The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MontacargasBateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMontacargas($montacargas, $comparison = null)
    {
        if ($montacargas instanceof Montacargas) {
            return $this
                ->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS, $montacargas->getIdmontacargas(), $comparison);
        } elseif ($montacargas instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS, $montacargas->toKeyValue('PrimaryKey', 'Idmontacargas'), $comparison);
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
     * @return MontacargasBateriasQuery The current query, for fluid interface
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
     * Filter the query by a related Baterias object
     *
     * @param   Baterias|PropelObjectCollection $baterias The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MontacargasBateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBaterias($baterias, $comparison = null)
    {
        if ($baterias instanceof Baterias) {
            return $this
                ->addUsingAlias(MontacargasBateriasPeer::IDBATERIAS, $baterias->getIdbaterias(), $comparison);
        } elseif ($baterias instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MontacargasBateriasPeer::IDBATERIAS, $baterias->toKeyValue('PrimaryKey', 'Idbaterias'), $comparison);
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
     * @return MontacargasBateriasQuery The current query, for fluid interface
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
     * @param   MontacargasBaterias $montacargasBaterias Object to remove from the list of results
     *
     * @return MontacargasBateriasQuery The current query, for fluid interface
     */
    public function prune($montacargasBaterias = null)
    {
        if ($montacargasBaterias) {
            $this->addUsingAlias(MontacargasBateriasPeer::IDMONTACARGAS_BATERIAS, $montacargasBaterias->getIdmontacargasBaterias(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
