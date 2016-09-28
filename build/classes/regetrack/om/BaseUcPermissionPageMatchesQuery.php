<?php


/**
 * Base class that represents a query for the 'uc_permission_page_matches' table.
 *
 *
 *
 * @method UcPermissionPageMatchesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UcPermissionPageMatchesQuery orderByPermissionId($order = Criteria::ASC) Order by the permission_id column
 * @method UcPermissionPageMatchesQuery orderByPageId($order = Criteria::ASC) Order by the page_id column
 *
 * @method UcPermissionPageMatchesQuery groupById() Group by the id column
 * @method UcPermissionPageMatchesQuery groupByPermissionId() Group by the permission_id column
 * @method UcPermissionPageMatchesQuery groupByPageId() Group by the page_id column
 *
 * @method UcPermissionPageMatchesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UcPermissionPageMatchesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UcPermissionPageMatchesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UcPermissionPageMatches findOne(PropelPDO $con = null) Return the first UcPermissionPageMatches matching the query
 * @method UcPermissionPageMatches findOneOrCreate(PropelPDO $con = null) Return the first UcPermissionPageMatches matching the query, or a new UcPermissionPageMatches object populated from the query conditions when no match is found
 *
 * @method UcPermissionPageMatches findOneByPermissionId(int $permission_id) Return the first UcPermissionPageMatches filtered by the permission_id column
 * @method UcPermissionPageMatches findOneByPageId(int $page_id) Return the first UcPermissionPageMatches filtered by the page_id column
 *
 * @method array findById(int $id) Return UcPermissionPageMatches objects filtered by the id column
 * @method array findByPermissionId(int $permission_id) Return UcPermissionPageMatches objects filtered by the permission_id column
 * @method array findByPageId(int $page_id) Return UcPermissionPageMatches objects filtered by the page_id column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseUcPermissionPageMatchesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUcPermissionPageMatchesQuery object.
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
            $modelName = 'UcPermissionPageMatches';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UcPermissionPageMatchesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UcPermissionPageMatchesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UcPermissionPageMatchesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UcPermissionPageMatchesQuery) {
            return $criteria;
        }
        $query = new UcPermissionPageMatchesQuery(null, null, $modelAlias);

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
     * @return   UcPermissionPageMatches|UcPermissionPageMatches[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UcPermissionPageMatchesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UcPermissionPageMatchesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UcPermissionPageMatches A model object, or null if the key is not found
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
     * @return                 UcPermissionPageMatches A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `permission_id`, `page_id` FROM `uc_permission_page_matches` WHERE `id` = :p0';
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
            $obj = new UcPermissionPageMatches();
            $obj->hydrate($row);
            UcPermissionPageMatchesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return UcPermissionPageMatches|UcPermissionPageMatches[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UcPermissionPageMatches[]|mixed the list of results, formatted by the current formatter
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
     * @return UcPermissionPageMatchesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UcPermissionPageMatchesPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UcPermissionPageMatchesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UcPermissionPageMatchesPeer::ID, $keys, Criteria::IN);
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
     * @return UcPermissionPageMatchesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UcPermissionPageMatchesPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UcPermissionPageMatchesPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UcPermissionPageMatchesPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the permission_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPermissionId(1234); // WHERE permission_id = 1234
     * $query->filterByPermissionId(array(12, 34)); // WHERE permission_id IN (12, 34)
     * $query->filterByPermissionId(array('min' => 12)); // WHERE permission_id >= 12
     * $query->filterByPermissionId(array('max' => 12)); // WHERE permission_id <= 12
     * </code>
     *
     * @param     mixed $permissionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcPermissionPageMatchesQuery The current query, for fluid interface
     */
    public function filterByPermissionId($permissionId = null, $comparison = null)
    {
        if (is_array($permissionId)) {
            $useMinMax = false;
            if (isset($permissionId['min'])) {
                $this->addUsingAlias(UcPermissionPageMatchesPeer::PERMISSION_ID, $permissionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($permissionId['max'])) {
                $this->addUsingAlias(UcPermissionPageMatchesPeer::PERMISSION_ID, $permissionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UcPermissionPageMatchesPeer::PERMISSION_ID, $permissionId, $comparison);
    }

    /**
     * Filter the query on the page_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPageId(1234); // WHERE page_id = 1234
     * $query->filterByPageId(array(12, 34)); // WHERE page_id IN (12, 34)
     * $query->filterByPageId(array('min' => 12)); // WHERE page_id >= 12
     * $query->filterByPageId(array('max' => 12)); // WHERE page_id <= 12
     * </code>
     *
     * @param     mixed $pageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcPermissionPageMatchesQuery The current query, for fluid interface
     */
    public function filterByPageId($pageId = null, $comparison = null)
    {
        if (is_array($pageId)) {
            $useMinMax = false;
            if (isset($pageId['min'])) {
                $this->addUsingAlias(UcPermissionPageMatchesPeer::PAGE_ID, $pageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pageId['max'])) {
                $this->addUsingAlias(UcPermissionPageMatchesPeer::PAGE_ID, $pageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UcPermissionPageMatchesPeer::PAGE_ID, $pageId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   UcPermissionPageMatches $ucPermissionPageMatches Object to remove from the list of results
     *
     * @return UcPermissionPageMatchesQuery The current query, for fluid interface
     */
    public function prune($ucPermissionPageMatches = null)
    {
        if ($ucPermissionPageMatches) {
            $this->addUsingAlias(UcPermissionPageMatchesPeer::ID, $ucPermissionPageMatches->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}