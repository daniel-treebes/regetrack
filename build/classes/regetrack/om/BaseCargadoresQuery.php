<?php


/**
 * Base class that represents a query for the 'cargadores' table.
 *
 *
 *
 * @method CargadoresQuery orderByIdcargadores($order = Criteria::ASC) Order by the idcargadores column
 * @method CargadoresQuery orderByIdsucursal($order = Criteria::ASC) Order by the idsucursal column
 * @method CargadoresQuery orderByCargadoresModelo($order = Criteria::ASC) Order by the cargadores_modelo column
 * @method CargadoresQuery orderByCargadoresMarca($order = Criteria::ASC) Order by the cargadores_marca column
 * @method CargadoresQuery orderByCargadoresE($order = Criteria::ASC) Order by the cargadores_e column
 * @method CargadoresQuery orderByCargadoresVolts($order = Criteria::ASC) Order by the cargadores_volts column
 * @method CargadoresQuery orderByCargadoresAmperaje($order = Criteria::ASC) Order by the cargadores_amperaje column
 * @method CargadoresQuery orderByCargadoresComprador($order = Criteria::ASC) Order by the cargadores_comprador column
 * @method CargadoresQuery orderByCargadoresNombre($order = Criteria::ASC) Order by the cargadores_nombre column
 * @method CargadoresQuery orderByCargadoresNumserie($order = Criteria::ASC) Order by the cargadores_numserie column
 *
 * @method CargadoresQuery groupByIdcargadores() Group by the idcargadores column
 * @method CargadoresQuery groupByIdsucursal() Group by the idsucursal column
 * @method CargadoresQuery groupByCargadoresModelo() Group by the cargadores_modelo column
 * @method CargadoresQuery groupByCargadoresMarca() Group by the cargadores_marca column
 * @method CargadoresQuery groupByCargadoresE() Group by the cargadores_e column
 * @method CargadoresQuery groupByCargadoresVolts() Group by the cargadores_volts column
 * @method CargadoresQuery groupByCargadoresAmperaje() Group by the cargadores_amperaje column
 * @method CargadoresQuery groupByCargadoresComprador() Group by the cargadores_comprador column
 * @method CargadoresQuery groupByCargadoresNombre() Group by the cargadores_nombre column
 * @method CargadoresQuery groupByCargadoresNumserie() Group by the cargadores_numserie column
 *
 * @method CargadoresQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CargadoresQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CargadoresQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CargadoresQuery leftJoinSucursal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sucursal relation
 * @method CargadoresQuery rightJoinSucursal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sucursal relation
 * @method CargadoresQuery innerJoinSucursal($relationAlias = null) Adds a INNER JOIN clause to the query using the Sucursal relation
 *
 * @method CargadoresQuery leftJoinBodegas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bodegas relation
 * @method CargadoresQuery rightJoinBodegas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bodegas relation
 * @method CargadoresQuery innerJoinBodegas($relationAlias = null) Adds a INNER JOIN clause to the query using the Bodegas relation
 *
 * @method CargadoresQuery leftJoinCargadoresBaterias($relationAlias = null) Adds a LEFT JOIN clause to the query using the CargadoresBaterias relation
 * @method CargadoresQuery rightJoinCargadoresBaterias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CargadoresBaterias relation
 * @method CargadoresQuery innerJoinCargadoresBaterias($relationAlias = null) Adds a INNER JOIN clause to the query using the CargadoresBaterias relation
 *
 * @method CargadoresQuery leftJoinDeshabilitacg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Deshabilitacg relation
 * @method CargadoresQuery rightJoinDeshabilitacg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Deshabilitacg relation
 * @method CargadoresQuery innerJoinDeshabilitacg($relationAlias = null) Adds a INNER JOIN clause to the query using the Deshabilitacg relation
 *
 * @method Cargadores findOne(PropelPDO $con = null) Return the first Cargadores matching the query
 * @method Cargadores findOneOrCreate(PropelPDO $con = null) Return the first Cargadores matching the query, or a new Cargadores object populated from the query conditions when no match is found
 *
 * @method Cargadores findOneByIdsucursal(int $idsucursal) Return the first Cargadores filtered by the idsucursal column
 * @method Cargadores findOneByCargadoresModelo(string $cargadores_modelo) Return the first Cargadores filtered by the cargadores_modelo column
 * @method Cargadores findOneByCargadoresMarca(string $cargadores_marca) Return the first Cargadores filtered by the cargadores_marca column
 * @method Cargadores findOneByCargadoresE(string $cargadores_e) Return the first Cargadores filtered by the cargadores_e column
 * @method Cargadores findOneByCargadoresVolts(int $cargadores_volts) Return the first Cargadores filtered by the cargadores_volts column
 * @method Cargadores findOneByCargadoresAmperaje(int $cargadores_amperaje) Return the first Cargadores filtered by the cargadores_amperaje column
 * @method Cargadores findOneByCargadoresComprador(string $cargadores_comprador) Return the first Cargadores filtered by the cargadores_comprador column
 * @method Cargadores findOneByCargadoresNombre(string $cargadores_nombre) Return the first Cargadores filtered by the cargadores_nombre column
 * @method Cargadores findOneByCargadoresNumserie(string $cargadores_numserie) Return the first Cargadores filtered by the cargadores_numserie column
 *
 * @method array findByIdcargadores(int $idcargadores) Return Cargadores objects filtered by the idcargadores column
 * @method array findByIdsucursal(int $idsucursal) Return Cargadores objects filtered by the idsucursal column
 * @method array findByCargadoresModelo(string $cargadores_modelo) Return Cargadores objects filtered by the cargadores_modelo column
 * @method array findByCargadoresMarca(string $cargadores_marca) Return Cargadores objects filtered by the cargadores_marca column
 * @method array findByCargadoresE(string $cargadores_e) Return Cargadores objects filtered by the cargadores_e column
 * @method array findByCargadoresVolts(int $cargadores_volts) Return Cargadores objects filtered by the cargadores_volts column
 * @method array findByCargadoresAmperaje(int $cargadores_amperaje) Return Cargadores objects filtered by the cargadores_amperaje column
 * @method array findByCargadoresComprador(string $cargadores_comprador) Return Cargadores objects filtered by the cargadores_comprador column
 * @method array findByCargadoresNombre(string $cargadores_nombre) Return Cargadores objects filtered by the cargadores_nombre column
 * @method array findByCargadoresNumserie(string $cargadores_numserie) Return Cargadores objects filtered by the cargadores_numserie column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseCargadoresQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCargadoresQuery object.
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
            $modelName = 'Cargadores';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CargadoresQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CargadoresQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CargadoresQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CargadoresQuery) {
            return $criteria;
        }
        $query = new CargadoresQuery(null, null, $modelAlias);

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
     * @return   Cargadores|Cargadores[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CargadoresPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CargadoresPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Cargadores A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcargadores($key, $con = null)
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
     * @return                 Cargadores A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idcargadores`, `idsucursal`, `cargadores_modelo`, `cargadores_marca`, `cargadores_e`, `cargadores_volts`, `cargadores_amperaje`, `cargadores_comprador`, `cargadores_nombre`, `cargadores_numserie` FROM `cargadores` WHERE `idcargadores` = :p0';
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
            $obj = new Cargadores();
            $obj->hydrate($row);
            CargadoresPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Cargadores|Cargadores[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Cargadores[]|mixed the list of results, formatted by the current formatter
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
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CargadoresPeer::IDCARGADORES, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CargadoresPeer::IDCARGADORES, $keys, Criteria::IN);
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
     * @param     mixed $idcargadores The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByIdcargadores($idcargadores = null, $comparison = null)
    {
        if (is_array($idcargadores)) {
            $useMinMax = false;
            if (isset($idcargadores['min'])) {
                $this->addUsingAlias(CargadoresPeer::IDCARGADORES, $idcargadores['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcargadores['max'])) {
                $this->addUsingAlias(CargadoresPeer::IDCARGADORES, $idcargadores['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::IDCARGADORES, $idcargadores, $comparison);
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
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByIdsucursal($idsucursal = null, $comparison = null)
    {
        if (is_array($idsucursal)) {
            $useMinMax = false;
            if (isset($idsucursal['min'])) {
                $this->addUsingAlias(CargadoresPeer::IDSUCURSAL, $idsucursal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idsucursal['max'])) {
                $this->addUsingAlias(CargadoresPeer::IDSUCURSAL, $idsucursal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::IDSUCURSAL, $idsucursal, $comparison);
    }

    /**
     * Filter the query on the cargadores_modelo column
     *
     * Example usage:
     * <code>
     * $query->filterByCargadoresModelo('fooValue');   // WHERE cargadores_modelo = 'fooValue'
     * $query->filterByCargadoresModelo('%fooValue%'); // WHERE cargadores_modelo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargadoresModelo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByCargadoresModelo($cargadoresModelo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargadoresModelo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cargadoresModelo)) {
                $cargadoresModelo = str_replace('*', '%', $cargadoresModelo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::CARGADORES_MODELO, $cargadoresModelo, $comparison);
    }

    /**
     * Filter the query on the cargadores_marca column
     *
     * Example usage:
     * <code>
     * $query->filterByCargadoresMarca('fooValue');   // WHERE cargadores_marca = 'fooValue'
     * $query->filterByCargadoresMarca('%fooValue%'); // WHERE cargadores_marca LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargadoresMarca The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByCargadoresMarca($cargadoresMarca = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargadoresMarca)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cargadoresMarca)) {
                $cargadoresMarca = str_replace('*', '%', $cargadoresMarca);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::CARGADORES_MARCA, $cargadoresMarca, $comparison);
    }

    /**
     * Filter the query on the cargadores_e column
     *
     * Example usage:
     * <code>
     * $query->filterByCargadoresE('fooValue');   // WHERE cargadores_e = 'fooValue'
     * $query->filterByCargadoresE('%fooValue%'); // WHERE cargadores_e LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargadoresE The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByCargadoresE($cargadoresE = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargadoresE)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cargadoresE)) {
                $cargadoresE = str_replace('*', '%', $cargadoresE);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::CARGADORES_E, $cargadoresE, $comparison);
    }

    /**
     * Filter the query on the cargadores_volts column
     *
     * Example usage:
     * <code>
     * $query->filterByCargadoresVolts(1234); // WHERE cargadores_volts = 1234
     * $query->filterByCargadoresVolts(array(12, 34)); // WHERE cargadores_volts IN (12, 34)
     * $query->filterByCargadoresVolts(array('min' => 12)); // WHERE cargadores_volts >= 12
     * $query->filterByCargadoresVolts(array('max' => 12)); // WHERE cargadores_volts <= 12
     * </code>
     *
     * @param     mixed $cargadoresVolts The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByCargadoresVolts($cargadoresVolts = null, $comparison = null)
    {
        if (is_array($cargadoresVolts)) {
            $useMinMax = false;
            if (isset($cargadoresVolts['min'])) {
                $this->addUsingAlias(CargadoresPeer::CARGADORES_VOLTS, $cargadoresVolts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargadoresVolts['max'])) {
                $this->addUsingAlias(CargadoresPeer::CARGADORES_VOLTS, $cargadoresVolts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::CARGADORES_VOLTS, $cargadoresVolts, $comparison);
    }

    /**
     * Filter the query on the cargadores_amperaje column
     *
     * Example usage:
     * <code>
     * $query->filterByCargadoresAmperaje(1234); // WHERE cargadores_amperaje = 1234
     * $query->filterByCargadoresAmperaje(array(12, 34)); // WHERE cargadores_amperaje IN (12, 34)
     * $query->filterByCargadoresAmperaje(array('min' => 12)); // WHERE cargadores_amperaje >= 12
     * $query->filterByCargadoresAmperaje(array('max' => 12)); // WHERE cargadores_amperaje <= 12
     * </code>
     *
     * @param     mixed $cargadoresAmperaje The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByCargadoresAmperaje($cargadoresAmperaje = null, $comparison = null)
    {
        if (is_array($cargadoresAmperaje)) {
            $useMinMax = false;
            if (isset($cargadoresAmperaje['min'])) {
                $this->addUsingAlias(CargadoresPeer::CARGADORES_AMPERAJE, $cargadoresAmperaje['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargadoresAmperaje['max'])) {
                $this->addUsingAlias(CargadoresPeer::CARGADORES_AMPERAJE, $cargadoresAmperaje['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::CARGADORES_AMPERAJE, $cargadoresAmperaje, $comparison);
    }

    /**
     * Filter the query on the cargadores_comprador column
     *
     * Example usage:
     * <code>
     * $query->filterByCargadoresComprador('fooValue');   // WHERE cargadores_comprador = 'fooValue'
     * $query->filterByCargadoresComprador('%fooValue%'); // WHERE cargadores_comprador LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargadoresComprador The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByCargadoresComprador($cargadoresComprador = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargadoresComprador)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cargadoresComprador)) {
                $cargadoresComprador = str_replace('*', '%', $cargadoresComprador);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::CARGADORES_COMPRADOR, $cargadoresComprador, $comparison);
    }

    /**
     * Filter the query on the cargadores_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByCargadoresNombre('fooValue');   // WHERE cargadores_nombre = 'fooValue'
     * $query->filterByCargadoresNombre('%fooValue%'); // WHERE cargadores_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargadoresNombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByCargadoresNombre($cargadoresNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargadoresNombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cargadoresNombre)) {
                $cargadoresNombre = str_replace('*', '%', $cargadoresNombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::CARGADORES_NOMBRE, $cargadoresNombre, $comparison);
    }

    /**
     * Filter the query on the cargadores_numserie column
     *
     * Example usage:
     * <code>
     * $query->filterByCargadoresNumserie('fooValue');   // WHERE cargadores_numserie = 'fooValue'
     * $query->filterByCargadoresNumserie('%fooValue%'); // WHERE cargadores_numserie LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargadoresNumserie The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function filterByCargadoresNumserie($cargadoresNumserie = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargadoresNumserie)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cargadoresNumserie)) {
                $cargadoresNumserie = str_replace('*', '%', $cargadoresNumserie);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CargadoresPeer::CARGADORES_NUMSERIE, $cargadoresNumserie, $comparison);
    }

    /**
     * Filter the query by a related Sucursal object
     *
     * @param   Sucursal|PropelObjectCollection $sucursal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CargadoresQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySucursal($sucursal, $comparison = null)
    {
        if ($sucursal instanceof Sucursal) {
            return $this
                ->addUsingAlias(CargadoresPeer::IDSUCURSAL, $sucursal->getIdsucursal(), $comparison);
        } elseif ($sucursal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CargadoresPeer::IDSUCURSAL, $sucursal->toKeyValue('PrimaryKey', 'Idsucursal'), $comparison);
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
     * @return CargadoresQuery The current query, for fluid interface
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
     * Filter the query by a related Bodegas object
     *
     * @param   Bodegas|PropelObjectCollection $bodegas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CargadoresQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBodegas($bodegas, $comparison = null)
    {
        if ($bodegas instanceof Bodegas) {
            return $this
                ->addUsingAlias(CargadoresPeer::IDCARGADORES, $bodegas->getCg(), $comparison);
        } elseif ($bodegas instanceof PropelObjectCollection) {
            return $this
                ->useBodegasQuery()
                ->filterByPrimaryKeys($bodegas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBodegas() only accepts arguments of type Bodegas or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bodegas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function joinBodegas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bodegas');

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
            $this->addJoinObject($join, 'Bodegas');
        }

        return $this;
    }

    /**
     * Use the Bodegas relation Bodegas object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BodegasQuery A secondary query class using the current class as primary query
     */
    public function useBodegasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBodegas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bodegas', 'BodegasQuery');
    }

    /**
     * Filter the query by a related CargadoresBaterias object
     *
     * @param   CargadoresBaterias|PropelObjectCollection $cargadoresBaterias  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CargadoresQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCargadoresBaterias($cargadoresBaterias, $comparison = null)
    {
        if ($cargadoresBaterias instanceof CargadoresBaterias) {
            return $this
                ->addUsingAlias(CargadoresPeer::IDCARGADORES, $cargadoresBaterias->getIdcargadores(), $comparison);
        } elseif ($cargadoresBaterias instanceof PropelObjectCollection) {
            return $this
                ->useCargadoresBateriasQuery()
                ->filterByPrimaryKeys($cargadoresBaterias->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCargadoresBaterias() only accepts arguments of type CargadoresBaterias or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CargadoresBaterias relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function joinCargadoresBaterias($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CargadoresBaterias');

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
            $this->addJoinObject($join, 'CargadoresBaterias');
        }

        return $this;
    }

    /**
     * Use the CargadoresBaterias relation CargadoresBaterias object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CargadoresBateriasQuery A secondary query class using the current class as primary query
     */
    public function useCargadoresBateriasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCargadoresBaterias($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CargadoresBaterias', 'CargadoresBateriasQuery');
    }

    /**
     * Filter the query by a related Deshabilitacg object
     *
     * @param   Deshabilitacg|PropelObjectCollection $deshabilitacg  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CargadoresQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeshabilitacg($deshabilitacg, $comparison = null)
    {
        if ($deshabilitacg instanceof Deshabilitacg) {
            return $this
                ->addUsingAlias(CargadoresPeer::IDCARGADORES, $deshabilitacg->getCg(), $comparison);
        } elseif ($deshabilitacg instanceof PropelObjectCollection) {
            return $this
                ->useDeshabilitacgQuery()
                ->filterByPrimaryKeys($deshabilitacg->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeshabilitacg() only accepts arguments of type Deshabilitacg or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Deshabilitacg relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function joinDeshabilitacg($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Deshabilitacg');

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
            $this->addJoinObject($join, 'Deshabilitacg');
        }

        return $this;
    }

    /**
     * Use the Deshabilitacg relation Deshabilitacg object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeshabilitacgQuery A secondary query class using the current class as primary query
     */
    public function useDeshabilitacgQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeshabilitacg($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Deshabilitacg', 'DeshabilitacgQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Cargadores $cargadores Object to remove from the list of results
     *
     * @return CargadoresQuery The current query, for fluid interface
     */
    public function prune($cargadores = null)
    {
        if ($cargadores) {
            $this->addUsingAlias(CargadoresPeer::IDCARGADORES, $cargadores->getIdcargadores(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
