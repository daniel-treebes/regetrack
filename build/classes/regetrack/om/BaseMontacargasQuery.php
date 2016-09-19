<?php


/**
 * Base class that represents a query for the 'montacargas' table.
 *
 *
 *
 * @method MontacargasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MontacargasQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method MontacargasQuery orderByModelo($order = Criteria::ASC) Order by the modelo column
 * @method MontacargasQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method MontacargasQuery orderByCiclosMant($order = Criteria::ASC) Order by the ciclos_mant column
 * @method MontacargasQuery orderByCiclosIniciales($order = Criteria::ASC) Order by the ciclos_iniciales column
 *
 * @method MontacargasQuery groupById() Group by the id column
 * @method MontacargasQuery groupByNombre() Group by the nombre column
 * @method MontacargasQuery groupByModelo() Group by the modelo column
 * @method MontacargasQuery groupByTipo() Group by the tipo column
 * @method MontacargasQuery groupByCiclosMant() Group by the ciclos_mant column
 * @method MontacargasQuery groupByCiclosIniciales() Group by the ciclos_iniciales column
 *
 * @method MontacargasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MontacargasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MontacargasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Montacargas findOne(PropelPDO $con = null) Return the first Montacargas matching the query
 * @method Montacargas findOneOrCreate(PropelPDO $con = null) Return the first Montacargas matching the query, or a new Montacargas object populated from the query conditions when no match is found
 *
 * @method Montacargas findOneByNombre(string $nombre) Return the first Montacargas filtered by the nombre column
 * @method Montacargas findOneByModelo(string $modelo) Return the first Montacargas filtered by the modelo column
 * @method Montacargas findOneByTipo(string $tipo) Return the first Montacargas filtered by the tipo column
 * @method Montacargas findOneByCiclosMant(int $ciclos_mant) Return the first Montacargas filtered by the ciclos_mant column
 * @method Montacargas findOneByCiclosIniciales(int $ciclos_iniciales) Return the first Montacargas filtered by the ciclos_iniciales column
 *
 * @method array findById(int $id) Return Montacargas objects filtered by the id column
 * @method array findByNombre(string $nombre) Return Montacargas objects filtered by the nombre column
 * @method array findByModelo(string $modelo) Return Montacargas objects filtered by the modelo column
 * @method array findByTipo(string $tipo) Return Montacargas objects filtered by the tipo column
 * @method array findByCiclosMant(int $ciclos_mant) Return Montacargas objects filtered by the ciclos_mant column
 * @method array findByCiclosIniciales(int $ciclos_iniciales) Return Montacargas objects filtered by the ciclos_iniciales column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseMontacargasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMontacargasQuery object.
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
            $modelName = 'Montacargas';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MontacargasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MontacargasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MontacargasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MontacargasQuery) {
            return $criteria;
        }
        $query = new MontacargasQuery(null, null, $modelAlias);

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
     * @return   Montacargas|Montacargas[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MontacargasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MontacargasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Montacargas A model object, or null if the key is not found
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
     * @return                 Montacargas A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre`, `modelo`, `tipo`, `ciclos_mant`, `ciclos_iniciales` FROM `montacargas` WHERE `id` = :p0';
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
            $obj = new Montacargas();
            $obj->hydrate($row);
            MontacargasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Montacargas|Montacargas[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Montacargas[]|mixed the list of results, formatted by the current formatter
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
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MontacargasPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MontacargasPeer::ID, $keys, Criteria::IN);
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
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MontacargasPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MontacargasPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::ID, $id, $comparison);
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
     * @return MontacargasQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MontacargasPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the modelo column
     *
     * Example usage:
     * <code>
     * $query->filterByModelo('fooValue');   // WHERE modelo = 'fooValue'
     * $query->filterByModelo('%fooValue%'); // WHERE modelo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $modelo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByModelo($modelo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($modelo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $modelo)) {
                $modelo = str_replace('*', '%', $modelo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MODELO, $modelo, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
     * $query->filterByTipo('%fooValue%'); // WHERE tipo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tipo)) {
                $tipo = str_replace('*', '%', $tipo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::TIPO, $tipo, $comparison);
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
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByCiclosMant($ciclosMant = null, $comparison = null)
    {
        if (is_array($ciclosMant)) {
            $useMinMax = false;
            if (isset($ciclosMant['min'])) {
                $this->addUsingAlias(MontacargasPeer::CICLOS_MANT, $ciclosMant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ciclosMant['max'])) {
                $this->addUsingAlias(MontacargasPeer::CICLOS_MANT, $ciclosMant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::CICLOS_MANT, $ciclosMant, $comparison);
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
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByCiclosIniciales($ciclosIniciales = null, $comparison = null)
    {
        if (is_array($ciclosIniciales)) {
            $useMinMax = false;
            if (isset($ciclosIniciales['min'])) {
                $this->addUsingAlias(MontacargasPeer::CICLOS_INICIALES, $ciclosIniciales['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ciclosIniciales['max'])) {
                $this->addUsingAlias(MontacargasPeer::CICLOS_INICIALES, $ciclosIniciales['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::CICLOS_INICIALES, $ciclosIniciales, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Montacargas $montacargas Object to remove from the list of results
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function prune($montacargas = null)
    {
        if ($montacargas) {
            $this->addUsingAlias(MontacargasPeer::ID, $montacargas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
