<?php


/**
 * Base class that represents a query for the 'bodegas' table.
 *
 *
 *
 * @method BodegasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BodegasQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method BodegasQuery orderByCg($order = Criteria::ASC) Order by the cg column
 *
 * @method BodegasQuery groupById() Group by the id column
 * @method BodegasQuery groupByNombre() Group by the nombre column
 * @method BodegasQuery groupByCg() Group by the cg column
 *
 * @method BodegasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BodegasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BodegasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BodegasQuery leftJoinCargadores($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargadores relation
 * @method BodegasQuery rightJoinCargadores($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargadores relation
 * @method BodegasQuery innerJoinCargadores($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargadores relation
 *
 * @method BodegasQuery leftJoinUsoBateriasBodega($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsoBateriasBodega relation
 * @method BodegasQuery rightJoinUsoBateriasBodega($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsoBateriasBodega relation
 * @method BodegasQuery innerJoinUsoBateriasBodega($relationAlias = null) Adds a INNER JOIN clause to the query using the UsoBateriasBodega relation
 *
 * @method Bodegas findOne(PropelPDO $con = null) Return the first Bodegas matching the query
 * @method Bodegas findOneOrCreate(PropelPDO $con = null) Return the first Bodegas matching the query, or a new Bodegas object populated from the query conditions when no match is found
 *
 * @method Bodegas findOneByNombre(string $nombre) Return the first Bodegas filtered by the nombre column
 * @method Bodegas findOneByCg(int $cg) Return the first Bodegas filtered by the cg column
 *
 * @method array findById(int $id) Return Bodegas objects filtered by the id column
 * @method array findByNombre(string $nombre) Return Bodegas objects filtered by the nombre column
 * @method array findByCg(int $cg) Return Bodegas objects filtered by the cg column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseBodegasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBodegasQuery object.
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
            $modelName = 'Bodegas';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BodegasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BodegasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BodegasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BodegasQuery) {
            return $criteria;
        }
        $query = new BodegasQuery(null, null, $modelAlias);

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
     * @return   Bodegas|Bodegas[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BodegasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BodegasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bodegas A model object, or null if the key is not found
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
     * @return                 Bodegas A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre`, `cg` FROM `bodegas` WHERE `id` = :p0';
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
            $obj = new Bodegas();
            $obj->hydrate($row);
            BodegasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bodegas|Bodegas[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Bodegas[]|mixed the list of results, formatted by the current formatter
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
     * @return BodegasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BodegasPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BodegasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BodegasPeer::ID, $keys, Criteria::IN);
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
     * @return BodegasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BodegasPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BodegasPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BodegasPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BodegasQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombre)) {
                $nombre = str_replace('*', '%', $nombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BodegasPeer::NOMBRE, $nombre, $comparison);
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
     * @return BodegasQuery The current query, for fluid interface
     */
    public function filterByCg($cg = null, $comparison = null)
    {
        if (is_array($cg)) {
            $useMinMax = false;
            if (isset($cg['min'])) {
                $this->addUsingAlias(BodegasPeer::CG, $cg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cg['max'])) {
                $this->addUsingAlias(BodegasPeer::CG, $cg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BodegasPeer::CG, $cg, $comparison);
    }

    /**
     * Filter the query by a related Cargadores object
     *
     * @param   Cargadores|PropelObjectCollection $cargadores The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BodegasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCargadores($cargadores, $comparison = null)
    {
        if ($cargadores instanceof Cargadores) {
            return $this
                ->addUsingAlias(BodegasPeer::CG, $cargadores->getIdcargadores(), $comparison);
        } elseif ($cargadores instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BodegasPeer::CG, $cargadores->toKeyValue('PrimaryKey', 'Idcargadores'), $comparison);
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
     * @return BodegasQuery The current query, for fluid interface
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
     * Filter the query by a related UsoBateriasBodega object
     *
     * @param   UsoBateriasBodega|PropelObjectCollection $usoBateriasBodega  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BodegasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsoBateriasBodega($usoBateriasBodega, $comparison = null)
    {
        if ($usoBateriasBodega instanceof UsoBateriasBodega) {
            return $this
                ->addUsingAlias(BodegasPeer::ID, $usoBateriasBodega->getBg(), $comparison);
        } elseif ($usoBateriasBodega instanceof PropelObjectCollection) {
            return $this
                ->useUsoBateriasBodegaQuery()
                ->filterByPrimaryKeys($usoBateriasBodega->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsoBateriasBodega() only accepts arguments of type UsoBateriasBodega or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsoBateriasBodega relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BodegasQuery The current query, for fluid interface
     */
    public function joinUsoBateriasBodega($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsoBateriasBodega');

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
            $this->addJoinObject($join, 'UsoBateriasBodega');
        }

        return $this;
    }

    /**
     * Use the UsoBateriasBodega relation UsoBateriasBodega object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsoBateriasBodegaQuery A secondary query class using the current class as primary query
     */
    public function useUsoBateriasBodegaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsoBateriasBodega($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsoBateriasBodega', 'UsoBateriasBodegaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Bodegas $bodegas Object to remove from the list of results
     *
     * @return BodegasQuery The current query, for fluid interface
     */
    public function prune($bodegas = null)
    {
        if ($bodegas) {
            $this->addUsingAlias(BodegasPeer::ID, $bodegas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
