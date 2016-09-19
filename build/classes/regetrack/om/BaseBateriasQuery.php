<?php


/**
 * Base class that represents a query for the 'baterias' table.
 *
 *
 *
 * @method BateriasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BateriasQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method BateriasQuery orderByNumSerie($order = Criteria::ASC) Order by the num_serie column
 * @method BateriasQuery orderByCiclosMant($order = Criteria::ASC) Order by the ciclos_mant column
 * @method BateriasQuery orderByCiclosIniciales($order = Criteria::ASC) Order by the ciclos_iniciales column
 *
 * @method BateriasQuery groupById() Group by the id column
 * @method BateriasQuery groupByTipo() Group by the tipo column
 * @method BateriasQuery groupByNumSerie() Group by the num_serie column
 * @method BateriasQuery groupByCiclosMant() Group by the ciclos_mant column
 * @method BateriasQuery groupByCiclosIniciales() Group by the ciclos_iniciales column
 *
 * @method BateriasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BateriasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BateriasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Baterias findOne(PropelPDO $con = null) Return the first Baterias matching the query
 * @method Baterias findOneOrCreate(PropelPDO $con = null) Return the first Baterias matching the query, or a new Baterias object populated from the query conditions when no match is found
 *
 * @method Baterias findOneByTipo(int $tipo) Return the first Baterias filtered by the tipo column
 * @method Baterias findOneByNumSerie(string $num_serie) Return the first Baterias filtered by the num_serie column
 * @method Baterias findOneByCiclosMant(int $ciclos_mant) Return the first Baterias filtered by the ciclos_mant column
 * @method Baterias findOneByCiclosIniciales(int $ciclos_iniciales) Return the first Baterias filtered by the ciclos_iniciales column
 *
 * @method array findById(int $id) Return Baterias objects filtered by the id column
 * @method array findByTipo(int $tipo) Return Baterias objects filtered by the tipo column
 * @method array findByNumSerie(string $num_serie) Return Baterias objects filtered by the num_serie column
 * @method array findByCiclosMant(int $ciclos_mant) Return Baterias objects filtered by the ciclos_mant column
 * @method array findByCiclosIniciales(int $ciclos_iniciales) Return Baterias objects filtered by the ciclos_iniciales column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseBateriasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBateriasQuery object.
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
            $modelName = 'Baterias';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BateriasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BateriasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BateriasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BateriasQuery) {
            return $criteria;
        }
        $query = new BateriasQuery(null, null, $modelAlias);

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
     * @return   Baterias|Baterias[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BateriasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BateriasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Baterias A model object, or null if the key is not found
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
     * @return                 Baterias A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `tipo`, `num_serie`, `ciclos_mant`, `ciclos_iniciales` FROM `baterias` WHERE `id` = :p0';
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
            $obj = new Baterias();
            $obj->hydrate($row);
            BateriasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Baterias|Baterias[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Baterias[]|mixed the list of results, formatted by the current formatter
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
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BateriasPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BateriasPeer::ID, $keys, Criteria::IN);
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
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BateriasPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BateriasPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo(1234); // WHERE tipo = 1234
     * $query->filterByTipo(array(12, 34)); // WHERE tipo IN (12, 34)
     * $query->filterByTipo(array('min' => 12)); // WHERE tipo >= 12
     * $query->filterByTipo(array('max' => 12)); // WHERE tipo <= 12
     * </code>
     *
     * @param     mixed $tipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (is_array($tipo)) {
            $useMinMax = false;
            if (isset($tipo['min'])) {
                $this->addUsingAlias(BateriasPeer::TIPO, $tipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipo['max'])) {
                $this->addUsingAlias(BateriasPeer::TIPO, $tipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::TIPO, $tipo, $comparison);
    }

    /**
     * Filter the query on the num_serie column
     *
     * Example usage:
     * <code>
     * $query->filterByNumSerie('fooValue');   // WHERE num_serie = 'fooValue'
     * $query->filterByNumSerie('%fooValue%'); // WHERE num_serie LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numSerie The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByNumSerie($numSerie = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numSerie)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $numSerie)) {
                $numSerie = str_replace('*', '%', $numSerie);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::NUM_SERIE, $numSerie, $comparison);
    }

    /**
     * Filter the query on the ciclos_mant column
     *
     * Example usage:
     * <code>
     * $query->filterByCiclosMant(1234); // WHERE ciclos_mant = 1234
     * $query->filterByCiclosMant(array(12, 34)); // WHERE ciclos_mant IN (12, 34)
     * $query->filterByCiclosMant(array('min' => 12)); // WHERE ciclos_mant >= 12
     * $query->filterByCiclosMant(array('max' => 12)); // WHERE ciclos_mant <= 12
     * </code>
     *
     * @param     mixed $ciclosMant The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByCiclosMant($ciclosMant = null, $comparison = null)
    {
        if (is_array($ciclosMant)) {
            $useMinMax = false;
            if (isset($ciclosMant['min'])) {
                $this->addUsingAlias(BateriasPeer::CICLOS_MANT, $ciclosMant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ciclosMant['max'])) {
                $this->addUsingAlias(BateriasPeer::CICLOS_MANT, $ciclosMant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::CICLOS_MANT, $ciclosMant, $comparison);
    }

    /**
     * Filter the query on the ciclos_iniciales column
     *
     * Example usage:
     * <code>
     * $query->filterByCiclosIniciales(1234); // WHERE ciclos_iniciales = 1234
     * $query->filterByCiclosIniciales(array(12, 34)); // WHERE ciclos_iniciales IN (12, 34)
     * $query->filterByCiclosIniciales(array('min' => 12)); // WHERE ciclos_iniciales >= 12
     * $query->filterByCiclosIniciales(array('max' => 12)); // WHERE ciclos_iniciales <= 12
     * </code>
     *
     * @param     mixed $ciclosIniciales The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByCiclosIniciales($ciclosIniciales = null, $comparison = null)
    {
        if (is_array($ciclosIniciales)) {
            $useMinMax = false;
            if (isset($ciclosIniciales['min'])) {
                $this->addUsingAlias(BateriasPeer::CICLOS_INICIALES, $ciclosIniciales['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ciclosIniciales['max'])) {
                $this->addUsingAlias(BateriasPeer::CICLOS_INICIALES, $ciclosIniciales['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::CICLOS_INICIALES, $ciclosIniciales, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Baterias $baterias Object to remove from the list of results
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function prune($baterias = null)
    {
        if ($baterias) {
            $this->addUsingAlias(BateriasPeer::ID, $baterias->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
