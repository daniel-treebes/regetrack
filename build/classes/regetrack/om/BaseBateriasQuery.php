<?php


/**
 * Base class that represents a query for the 'baterias' table.
 *
 *
 *
 * @method BateriasQuery orderByIdbaterias($order = Criteria::ASC) Order by the idbaterias column
 * @method BateriasQuery orderByIdsucursal($order = Criteria::ASC) Order by the idsucursal column
 * @method BateriasQuery orderByBateriasModelo($order = Criteria::ASC) Order by the baterias_modelo column
 * @method BateriasQuery orderByBateriasMarca($order = Criteria::ASC) Order by the baterias_marca column
 * @method BateriasQuery orderByBateriasC($order = Criteria::ASC) Order by the baterias_c column
 * @method BateriasQuery orderByBateriasK($order = Criteria::ASC) Order by the baterias_k column
 * @method BateriasQuery orderByBateriasP($order = Criteria::ASC) Order by the baterias_p column
 * @method BateriasQuery orderByBateriasT($order = Criteria::ASC) Order by the baterias_t column
 * @method BateriasQuery orderByBateriasE($order = Criteria::ASC) Order by the baterias_e column
 * @method BateriasQuery orderByBateriasVolts($order = Criteria::ASC) Order by the baterias_volts column
 * @method BateriasQuery orderByBateriasAmperaje($order = Criteria::ASC) Order by the baterias_amperaje column
 * @method BateriasQuery orderByBateriasComprador($order = Criteria::ASC) Order by the baterias_comprador column
 * @method BateriasQuery orderByBateriasNombre($order = Criteria::ASC) Order by the baterias_nombre column
 * @method BateriasQuery orderByBateriasNumserie($order = Criteria::ASC) Order by the baterias_numserie column
 * @method BateriasQuery orderByBateriasCiclosmant($order = Criteria::ASC) Order by the baterias_ciclosmant column
 * @method BateriasQuery orderByBateriasCiclosiniciales($order = Criteria::ASC) Order by the baterias_ciclosiniciales column
 *
 * @method BateriasQuery groupByIdbaterias() Group by the idbaterias column
 * @method BateriasQuery groupByIdsucursal() Group by the idsucursal column
 * @method BateriasQuery groupByBateriasModelo() Group by the baterias_modelo column
 * @method BateriasQuery groupByBateriasMarca() Group by the baterias_marca column
 * @method BateriasQuery groupByBateriasC() Group by the baterias_c column
 * @method BateriasQuery groupByBateriasK() Group by the baterias_k column
 * @method BateriasQuery groupByBateriasP() Group by the baterias_p column
 * @method BateriasQuery groupByBateriasT() Group by the baterias_t column
 * @method BateriasQuery groupByBateriasE() Group by the baterias_e column
 * @method BateriasQuery groupByBateriasVolts() Group by the baterias_volts column
 * @method BateriasQuery groupByBateriasAmperaje() Group by the baterias_amperaje column
 * @method BateriasQuery groupByBateriasComprador() Group by the baterias_comprador column
 * @method BateriasQuery groupByBateriasNombre() Group by the baterias_nombre column
 * @method BateriasQuery groupByBateriasNumserie() Group by the baterias_numserie column
 * @method BateriasQuery groupByBateriasCiclosmant() Group by the baterias_ciclosmant column
 * @method BateriasQuery groupByBateriasCiclosiniciales() Group by the baterias_ciclosiniciales column
 *
 * @method BateriasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BateriasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BateriasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BateriasQuery leftJoinSucursal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sucursal relation
 * @method BateriasQuery rightJoinSucursal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sucursal relation
 * @method BateriasQuery innerJoinSucursal($relationAlias = null) Adds a INNER JOIN clause to the query using the Sucursal relation
 *
 * @method BateriasQuery leftJoinDeshabilitabt($relationAlias = null) Adds a LEFT JOIN clause to the query using the Deshabilitabt relation
 * @method BateriasQuery rightJoinDeshabilitabt($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Deshabilitabt relation
 * @method BateriasQuery innerJoinDeshabilitabt($relationAlias = null) Adds a INNER JOIN clause to the query using the Deshabilitabt relation
 *
 * @method BateriasQuery leftJoinLimbo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Limbo relation
 * @method BateriasQuery rightJoinLimbo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Limbo relation
 * @method BateriasQuery innerJoinLimbo($relationAlias = null) Adds a INNER JOIN clause to the query using the Limbo relation
 *
 * @method BateriasQuery leftJoinUsoBateriasBodega($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsoBateriasBodega relation
 * @method BateriasQuery rightJoinUsoBateriasBodega($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsoBateriasBodega relation
 * @method BateriasQuery innerJoinUsoBateriasBodega($relationAlias = null) Adds a INNER JOIN clause to the query using the UsoBateriasBodega relation
 *
 * @method BateriasQuery leftJoinUsoBateriasMontacargas($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsoBateriasMontacargas relation
 * @method BateriasQuery rightJoinUsoBateriasMontacargas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsoBateriasMontacargas relation
 * @method BateriasQuery innerJoinUsoBateriasMontacargas($relationAlias = null) Adds a INNER JOIN clause to the query using the UsoBateriasMontacargas relation
 *
 * @method Baterias findOne(PropelPDO $con = null) Return the first Baterias matching the query
 * @method Baterias findOneOrCreate(PropelPDO $con = null) Return the first Baterias matching the query, or a new Baterias object populated from the query conditions when no match is found
 *
 * @method Baterias findOneByIdsucursal(int $idsucursal) Return the first Baterias filtered by the idsucursal column
 * @method Baterias findOneByBateriasModelo(string $baterias_modelo) Return the first Baterias filtered by the baterias_modelo column
 * @method Baterias findOneByBateriasMarca(string $baterias_marca) Return the first Baterias filtered by the baterias_marca column
 * @method Baterias findOneByBateriasC(string $baterias_c) Return the first Baterias filtered by the baterias_c column
 * @method Baterias findOneByBateriasK(string $baterias_k) Return the first Baterias filtered by the baterias_k column
 * @method Baterias findOneByBateriasP(string $baterias_p) Return the first Baterias filtered by the baterias_p column
 * @method Baterias findOneByBateriasT(string $baterias_t) Return the first Baterias filtered by the baterias_t column
 * @method Baterias findOneByBateriasE(string $baterias_e) Return the first Baterias filtered by the baterias_e column
 * @method Baterias findOneByBateriasVolts(int $baterias_volts) Return the first Baterias filtered by the baterias_volts column
 * @method Baterias findOneByBateriasAmperaje(int $baterias_amperaje) Return the first Baterias filtered by the baterias_amperaje column
 * @method Baterias findOneByBateriasComprador(string $baterias_comprador) Return the first Baterias filtered by the baterias_comprador column
 * @method Baterias findOneByBateriasNombre(string $baterias_nombre) Return the first Baterias filtered by the baterias_nombre column
 * @method Baterias findOneByBateriasNumserie(string $baterias_numserie) Return the first Baterias filtered by the baterias_numserie column
 * @method Baterias findOneByBateriasCiclosmant(int $baterias_ciclosmant) Return the first Baterias filtered by the baterias_ciclosmant column
 * @method Baterias findOneByBateriasCiclosiniciales(int $baterias_ciclosiniciales) Return the first Baterias filtered by the baterias_ciclosiniciales column
 *
 * @method array findByIdbaterias(int $idbaterias) Return Baterias objects filtered by the idbaterias column
 * @method array findByIdsucursal(int $idsucursal) Return Baterias objects filtered by the idsucursal column
 * @method array findByBateriasModelo(string $baterias_modelo) Return Baterias objects filtered by the baterias_modelo column
 * @method array findByBateriasMarca(string $baterias_marca) Return Baterias objects filtered by the baterias_marca column
 * @method array findByBateriasC(string $baterias_c) Return Baterias objects filtered by the baterias_c column
 * @method array findByBateriasK(string $baterias_k) Return Baterias objects filtered by the baterias_k column
 * @method array findByBateriasP(string $baterias_p) Return Baterias objects filtered by the baterias_p column
 * @method array findByBateriasT(string $baterias_t) Return Baterias objects filtered by the baterias_t column
 * @method array findByBateriasE(string $baterias_e) Return Baterias objects filtered by the baterias_e column
 * @method array findByBateriasVolts(int $baterias_volts) Return Baterias objects filtered by the baterias_volts column
 * @method array findByBateriasAmperaje(int $baterias_amperaje) Return Baterias objects filtered by the baterias_amperaje column
 * @method array findByBateriasComprador(string $baterias_comprador) Return Baterias objects filtered by the baterias_comprador column
 * @method array findByBateriasNombre(string $baterias_nombre) Return Baterias objects filtered by the baterias_nombre column
 * @method array findByBateriasNumserie(string $baterias_numserie) Return Baterias objects filtered by the baterias_numserie column
 * @method array findByBateriasCiclosmant(int $baterias_ciclosmant) Return Baterias objects filtered by the baterias_ciclosmant column
 * @method array findByBateriasCiclosiniciales(int $baterias_ciclosiniciales) Return Baterias objects filtered by the baterias_ciclosiniciales column
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
     public function findOneByIdbaterias($key, $con = null)
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
        $sql = 'SELECT `idbaterias`, `idsucursal`, `baterias_modelo`, `baterias_marca`, `baterias_c`, `baterias_k`, `baterias_p`, `baterias_t`, `baterias_e`, `baterias_volts`, `baterias_amperaje`, `baterias_comprador`, `baterias_nombre`, `baterias_numserie`, `baterias_ciclosmant`, `baterias_ciclosiniciales` FROM `baterias` WHERE `idbaterias` = :p0';
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

        return $this->addUsingAlias(BateriasPeer::IDBATERIAS, $key, Criteria::EQUAL);
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

        return $this->addUsingAlias(BateriasPeer::IDBATERIAS, $keys, Criteria::IN);
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
     * @param     mixed $idbaterias The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByIdbaterias($idbaterias = null, $comparison = null)
    {
        if (is_array($idbaterias)) {
            $useMinMax = false;
            if (isset($idbaterias['min'])) {
                $this->addUsingAlias(BateriasPeer::IDBATERIAS, $idbaterias['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbaterias['max'])) {
                $this->addUsingAlias(BateriasPeer::IDBATERIAS, $idbaterias['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::IDBATERIAS, $idbaterias, $comparison);
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
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByIdsucursal($idsucursal = null, $comparison = null)
    {
        if (is_array($idsucursal)) {
            $useMinMax = false;
            if (isset($idsucursal['min'])) {
                $this->addUsingAlias(BateriasPeer::IDSUCURSAL, $idsucursal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idsucursal['max'])) {
                $this->addUsingAlias(BateriasPeer::IDSUCURSAL, $idsucursal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::IDSUCURSAL, $idsucursal, $comparison);
    }

    /**
     * Filter the query on the baterias_modelo column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasModelo('fooValue');   // WHERE baterias_modelo = 'fooValue'
     * $query->filterByBateriasModelo('%fooValue%'); // WHERE baterias_modelo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasModelo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasModelo($bateriasModelo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasModelo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasModelo)) {
                $bateriasModelo = str_replace('*', '%', $bateriasModelo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_MODELO, $bateriasModelo, $comparison);
    }

    /**
     * Filter the query on the baterias_marca column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasMarca('fooValue');   // WHERE baterias_marca = 'fooValue'
     * $query->filterByBateriasMarca('%fooValue%'); // WHERE baterias_marca LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasMarca The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasMarca($bateriasMarca = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasMarca)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasMarca)) {
                $bateriasMarca = str_replace('*', '%', $bateriasMarca);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_MARCA, $bateriasMarca, $comparison);
    }

    /**
     * Filter the query on the baterias_c column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasC('fooValue');   // WHERE baterias_c = 'fooValue'
     * $query->filterByBateriasC('%fooValue%'); // WHERE baterias_c LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasC The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasC($bateriasC = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasC)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasC)) {
                $bateriasC = str_replace('*', '%', $bateriasC);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_C, $bateriasC, $comparison);
    }

    /**
     * Filter the query on the baterias_k column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasK('fooValue');   // WHERE baterias_k = 'fooValue'
     * $query->filterByBateriasK('%fooValue%'); // WHERE baterias_k LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasK The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasK($bateriasK = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasK)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasK)) {
                $bateriasK = str_replace('*', '%', $bateriasK);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_K, $bateriasK, $comparison);
    }

    /**
     * Filter the query on the baterias_p column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasP('fooValue');   // WHERE baterias_p = 'fooValue'
     * $query->filterByBateriasP('%fooValue%'); // WHERE baterias_p LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasP The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasP($bateriasP = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasP)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasP)) {
                $bateriasP = str_replace('*', '%', $bateriasP);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_P, $bateriasP, $comparison);
    }

    /**
     * Filter the query on the baterias_t column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasT('fooValue');   // WHERE baterias_t = 'fooValue'
     * $query->filterByBateriasT('%fooValue%'); // WHERE baterias_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasT The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasT($bateriasT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasT)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasT)) {
                $bateriasT = str_replace('*', '%', $bateriasT);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_T, $bateriasT, $comparison);
    }

    /**
     * Filter the query on the baterias_e column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasE('fooValue');   // WHERE baterias_e = 'fooValue'
     * $query->filterByBateriasE('%fooValue%'); // WHERE baterias_e LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasE The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasE($bateriasE = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasE)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasE)) {
                $bateriasE = str_replace('*', '%', $bateriasE);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_E, $bateriasE, $comparison);
    }

    /**
     * Filter the query on the baterias_volts column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasVolts(1234); // WHERE baterias_volts = 1234
     * $query->filterByBateriasVolts(array(12, 34)); // WHERE baterias_volts IN (12, 34)
     * $query->filterByBateriasVolts(array('min' => 12)); // WHERE baterias_volts >= 12
     * $query->filterByBateriasVolts(array('max' => 12)); // WHERE baterias_volts <= 12
     * </code>
     *
     * @param     mixed $bateriasVolts The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasVolts($bateriasVolts = null, $comparison = null)
    {
        if (is_array($bateriasVolts)) {
            $useMinMax = false;
            if (isset($bateriasVolts['min'])) {
                $this->addUsingAlias(BateriasPeer::BATERIAS_VOLTS, $bateriasVolts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bateriasVolts['max'])) {
                $this->addUsingAlias(BateriasPeer::BATERIAS_VOLTS, $bateriasVolts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_VOLTS, $bateriasVolts, $comparison);
    }

    /**
     * Filter the query on the baterias_amperaje column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasAmperaje(1234); // WHERE baterias_amperaje = 1234
     * $query->filterByBateriasAmperaje(array(12, 34)); // WHERE baterias_amperaje IN (12, 34)
     * $query->filterByBateriasAmperaje(array('min' => 12)); // WHERE baterias_amperaje >= 12
     * $query->filterByBateriasAmperaje(array('max' => 12)); // WHERE baterias_amperaje <= 12
     * </code>
     *
     * @param     mixed $bateriasAmperaje The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasAmperaje($bateriasAmperaje = null, $comparison = null)
    {
        if (is_array($bateriasAmperaje)) {
            $useMinMax = false;
            if (isset($bateriasAmperaje['min'])) {
                $this->addUsingAlias(BateriasPeer::BATERIAS_AMPERAJE, $bateriasAmperaje['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bateriasAmperaje['max'])) {
                $this->addUsingAlias(BateriasPeer::BATERIAS_AMPERAJE, $bateriasAmperaje['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_AMPERAJE, $bateriasAmperaje, $comparison);
    }

    /**
     * Filter the query on the baterias_comprador column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasComprador('fooValue');   // WHERE baterias_comprador = 'fooValue'
     * $query->filterByBateriasComprador('%fooValue%'); // WHERE baterias_comprador LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasComprador The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasComprador($bateriasComprador = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasComprador)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasComprador)) {
                $bateriasComprador = str_replace('*', '%', $bateriasComprador);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_COMPRADOR, $bateriasComprador, $comparison);
    }

    /**
     * Filter the query on the baterias_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasNombre('fooValue');   // WHERE baterias_nombre = 'fooValue'
     * $query->filterByBateriasNombre('%fooValue%'); // WHERE baterias_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasNombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasNombre($bateriasNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasNombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasNombre)) {
                $bateriasNombre = str_replace('*', '%', $bateriasNombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_NOMBRE, $bateriasNombre, $comparison);
    }

    /**
     * Filter the query on the baterias_numserie column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasNumserie('fooValue');   // WHERE baterias_numserie = 'fooValue'
     * $query->filterByBateriasNumserie('%fooValue%'); // WHERE baterias_numserie LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bateriasNumserie The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasNumserie($bateriasNumserie = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bateriasNumserie)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bateriasNumserie)) {
                $bateriasNumserie = str_replace('*', '%', $bateriasNumserie);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_NUMSERIE, $bateriasNumserie, $comparison);
    }

    /**
     * Filter the query on the baterias_ciclosmant column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasCiclosmant(1234); // WHERE baterias_ciclosmant = 1234
     * $query->filterByBateriasCiclosmant(array(12, 34)); // WHERE baterias_ciclosmant IN (12, 34)
     * $query->filterByBateriasCiclosmant(array('min' => 12)); // WHERE baterias_ciclosmant >= 12
     * $query->filterByBateriasCiclosmant(array('max' => 12)); // WHERE baterias_ciclosmant <= 12
     * </code>
     *
     * @param     mixed $bateriasCiclosmant The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasCiclosmant($bateriasCiclosmant = null, $comparison = null)
    {
        if (is_array($bateriasCiclosmant)) {
            $useMinMax = false;
            if (isset($bateriasCiclosmant['min'])) {
                $this->addUsingAlias(BateriasPeer::BATERIAS_CICLOSMANT, $bateriasCiclosmant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bateriasCiclosmant['max'])) {
                $this->addUsingAlias(BateriasPeer::BATERIAS_CICLOSMANT, $bateriasCiclosmant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_CICLOSMANT, $bateriasCiclosmant, $comparison);
    }

    /**
     * Filter the query on the baterias_ciclosiniciales column
     *
     * Example usage:
     * <code>
     * $query->filterByBateriasCiclosiniciales(1234); // WHERE baterias_ciclosiniciales = 1234
     * $query->filterByBateriasCiclosiniciales(array(12, 34)); // WHERE baterias_ciclosiniciales IN (12, 34)
     * $query->filterByBateriasCiclosiniciales(array('min' => 12)); // WHERE baterias_ciclosiniciales >= 12
     * $query->filterByBateriasCiclosiniciales(array('max' => 12)); // WHERE baterias_ciclosiniciales <= 12
     * </code>
     *
     * @param     mixed $bateriasCiclosiniciales The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function filterByBateriasCiclosiniciales($bateriasCiclosiniciales = null, $comparison = null)
    {
        if (is_array($bateriasCiclosiniciales)) {
            $useMinMax = false;
            if (isset($bateriasCiclosiniciales['min'])) {
                $this->addUsingAlias(BateriasPeer::BATERIAS_CICLOSINICIALES, $bateriasCiclosiniciales['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bateriasCiclosiniciales['max'])) {
                $this->addUsingAlias(BateriasPeer::BATERIAS_CICLOSINICIALES, $bateriasCiclosiniciales['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BateriasPeer::BATERIAS_CICLOSINICIALES, $bateriasCiclosiniciales, $comparison);
    }

    /**
     * Filter the query by a related Sucursal object
     *
     * @param   Sucursal|PropelObjectCollection $sucursal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySucursal($sucursal, $comparison = null)
    {
        if ($sucursal instanceof Sucursal) {
            return $this
                ->addUsingAlias(BateriasPeer::IDSUCURSAL, $sucursal->getIdsucursal(), $comparison);
        } elseif ($sucursal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BateriasPeer::IDSUCURSAL, $sucursal->toKeyValue('PrimaryKey', 'Idsucursal'), $comparison);
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
     * @return BateriasQuery The current query, for fluid interface
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
     * Filter the query by a related Deshabilitabt object
     *
     * @param   Deshabilitabt|PropelObjectCollection $deshabilitabt  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeshabilitabt($deshabilitabt, $comparison = null)
    {
        if ($deshabilitabt instanceof Deshabilitabt) {
            return $this
                ->addUsingAlias(BateriasPeer::IDBATERIAS, $deshabilitabt->getBt(), $comparison);
        } elseif ($deshabilitabt instanceof PropelObjectCollection) {
            return $this
                ->useDeshabilitabtQuery()
                ->filterByPrimaryKeys($deshabilitabt->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeshabilitabt() only accepts arguments of type Deshabilitabt or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Deshabilitabt relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function joinDeshabilitabt($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Deshabilitabt');

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
            $this->addJoinObject($join, 'Deshabilitabt');
        }

        return $this;
    }

    /**
     * Use the Deshabilitabt relation Deshabilitabt object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeshabilitabtQuery A secondary query class using the current class as primary query
     */
    public function useDeshabilitabtQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeshabilitabt($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Deshabilitabt', 'DeshabilitabtQuery');
    }

    /**
     * Filter the query by a related Limbo object
     *
     * @param   Limbo|PropelObjectCollection $limbo  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLimbo($limbo, $comparison = null)
    {
        if ($limbo instanceof Limbo) {
            return $this
                ->addUsingAlias(BateriasPeer::IDBATERIAS, $limbo->getBt(), $comparison);
        } elseif ($limbo instanceof PropelObjectCollection) {
            return $this
                ->useLimboQuery()
                ->filterByPrimaryKeys($limbo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLimbo() only accepts arguments of type Limbo or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Limbo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function joinLimbo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Limbo');

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
            $this->addJoinObject($join, 'Limbo');
        }

        return $this;
    }

    /**
     * Use the Limbo relation Limbo object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   LimboQuery A secondary query class using the current class as primary query
     */
    public function useLimboQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLimbo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Limbo', 'LimboQuery');
    }

    /**
     * Filter the query by a related UsoBateriasBodega object
     *
     * @param   UsoBateriasBodega|PropelObjectCollection $usoBateriasBodega  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsoBateriasBodega($usoBateriasBodega, $comparison = null)
    {
        if ($usoBateriasBodega instanceof UsoBateriasBodega) {
            return $this
                ->addUsingAlias(BateriasPeer::IDBATERIAS, $usoBateriasBodega->getBt(), $comparison);
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
     * @return BateriasQuery The current query, for fluid interface
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
     * Filter the query by a related UsoBateriasMontacargas object
     *
     * @param   UsoBateriasMontacargas|PropelObjectCollection $usoBateriasMontacargas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BateriasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsoBateriasMontacargas($usoBateriasMontacargas, $comparison = null)
    {
        if ($usoBateriasMontacargas instanceof UsoBateriasMontacargas) {
            return $this
                ->addUsingAlias(BateriasPeer::IDBATERIAS, $usoBateriasMontacargas->getBt(), $comparison);
        } elseif ($usoBateriasMontacargas instanceof PropelObjectCollection) {
            return $this
                ->useUsoBateriasMontacargasQuery()
                ->filterByPrimaryKeys($usoBateriasMontacargas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsoBateriasMontacargas() only accepts arguments of type UsoBateriasMontacargas or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsoBateriasMontacargas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BateriasQuery The current query, for fluid interface
     */
    public function joinUsoBateriasMontacargas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsoBateriasMontacargas');

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
            $this->addJoinObject($join, 'UsoBateriasMontacargas');
        }

        return $this;
    }

    /**
     * Use the UsoBateriasMontacargas relation UsoBateriasMontacargas object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsoBateriasMontacargasQuery A secondary query class using the current class as primary query
     */
    public function useUsoBateriasMontacargasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsoBateriasMontacargas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsoBateriasMontacargas', 'UsoBateriasMontacargasQuery');
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
            $this->addUsingAlias(BateriasPeer::IDBATERIAS, $baterias->getIdbaterias(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
