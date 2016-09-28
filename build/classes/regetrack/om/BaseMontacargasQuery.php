<?php


/**
 * Base class that represents a query for the 'montacargas' table.
 *
 *
 *
 * @method MontacargasQuery orderByIdmontacargas($order = Criteria::ASC) Order by the idmontacargas column
 * @method MontacargasQuery orderByIdsucursal($order = Criteria::ASC) Order by the idsucursal column
 * @method MontacargasQuery orderByMontacargasModelo($order = Criteria::ASC) Order by the montacargas_modelo column
 * @method MontacargasQuery orderByMontacargasMarca($order = Criteria::ASC) Order by the montacargas_marca column
 * @method MontacargasQuery orderByMontacargasC($order = Criteria::ASC) Order by the montacargas_c column
 * @method MontacargasQuery orderByMontacargasK($order = Criteria::ASC) Order by the montacargas_k column
 * @method MontacargasQuery orderByMontacargasP($order = Criteria::ASC) Order by the montacargas_p column
 * @method MontacargasQuery orderByMontacargasT($order = Criteria::ASC) Order by the montacargas_t column
 * @method MontacargasQuery orderByMontacargasE($order = Criteria::ASC) Order by the montacargas_e column
 * @method MontacargasQuery orderByMontacargasVolts($order = Criteria::ASC) Order by the montacargas_volts column
 * @method MontacargasQuery orderByMontacargasAmperaje($order = Criteria::ASC) Order by the montacargas_amperaje column
 * @method MontacargasQuery orderByMontacargasNombre($order = Criteria::ASC) Order by the montacargas_nombre column
 * @method MontacargasQuery orderByMontacargasNumserie($order = Criteria::ASC) Order by the montacargas_numserie column
 * @method MontacargasQuery orderByMontacargasComprador($order = Criteria::ASC) Order by the montacargas_comprador column
 * @method MontacargasQuery orderByMontacargasCiclosmant($order = Criteria::ASC) Order by the montacargas_ciclosmant column
 * @method MontacargasQuery orderByMontacargasCiclosiniciales($order = Criteria::ASC) Order by the montacargas_ciclosiniciales column
 *
 * @method MontacargasQuery groupByIdmontacargas() Group by the idmontacargas column
 * @method MontacargasQuery groupByIdsucursal() Group by the idsucursal column
 * @method MontacargasQuery groupByMontacargasModelo() Group by the montacargas_modelo column
 * @method MontacargasQuery groupByMontacargasMarca() Group by the montacargas_marca column
 * @method MontacargasQuery groupByMontacargasC() Group by the montacargas_c column
 * @method MontacargasQuery groupByMontacargasK() Group by the montacargas_k column
 * @method MontacargasQuery groupByMontacargasP() Group by the montacargas_p column
 * @method MontacargasQuery groupByMontacargasT() Group by the montacargas_t column
 * @method MontacargasQuery groupByMontacargasE() Group by the montacargas_e column
 * @method MontacargasQuery groupByMontacargasVolts() Group by the montacargas_volts column
 * @method MontacargasQuery groupByMontacargasAmperaje() Group by the montacargas_amperaje column
 * @method MontacargasQuery groupByMontacargasNombre() Group by the montacargas_nombre column
 * @method MontacargasQuery groupByMontacargasNumserie() Group by the montacargas_numserie column
 * @method MontacargasQuery groupByMontacargasComprador() Group by the montacargas_comprador column
 * @method MontacargasQuery groupByMontacargasCiclosmant() Group by the montacargas_ciclosmant column
 * @method MontacargasQuery groupByMontacargasCiclosiniciales() Group by the montacargas_ciclosiniciales column
 *
 * @method MontacargasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MontacargasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MontacargasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MontacargasQuery leftJoinSucursal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sucursal relation
 * @method MontacargasQuery rightJoinSucursal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sucursal relation
 * @method MontacargasQuery innerJoinSucursal($relationAlias = null) Adds a INNER JOIN clause to the query using the Sucursal relation
 *
 * @method MontacargasQuery leftJoinDeshabilitamc($relationAlias = null) Adds a LEFT JOIN clause to the query using the Deshabilitamc relation
 * @method MontacargasQuery rightJoinDeshabilitamc($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Deshabilitamc relation
 * @method MontacargasQuery innerJoinDeshabilitamc($relationAlias = null) Adds a INNER JOIN clause to the query using the Deshabilitamc relation
 *
 * @method MontacargasQuery leftJoinMontacargasBaterias($relationAlias = null) Adds a LEFT JOIN clause to the query using the MontacargasBaterias relation
 * @method MontacargasQuery rightJoinMontacargasBaterias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MontacargasBaterias relation
 * @method MontacargasQuery innerJoinMontacargasBaterias($relationAlias = null) Adds a INNER JOIN clause to the query using the MontacargasBaterias relation
 *
 * @method MontacargasQuery leftJoinUsoBateriasMontacargas($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsoBateriasMontacargas relation
 * @method MontacargasQuery rightJoinUsoBateriasMontacargas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsoBateriasMontacargas relation
 * @method MontacargasQuery innerJoinUsoBateriasMontacargas($relationAlias = null) Adds a INNER JOIN clause to the query using the UsoBateriasMontacargas relation
 *
 * @method Montacargas findOne(PropelPDO $con = null) Return the first Montacargas matching the query
 * @method Montacargas findOneOrCreate(PropelPDO $con = null) Return the first Montacargas matching the query, or a new Montacargas object populated from the query conditions when no match is found
 *
 * @method Montacargas findOneByIdsucursal(int $idsucursal) Return the first Montacargas filtered by the idsucursal column
 * @method Montacargas findOneByMontacargasModelo(string $montacargas_modelo) Return the first Montacargas filtered by the montacargas_modelo column
 * @method Montacargas findOneByMontacargasMarca(string $montacargas_marca) Return the first Montacargas filtered by the montacargas_marca column
 * @method Montacargas findOneByMontacargasC(string $montacargas_c) Return the first Montacargas filtered by the montacargas_c column
 * @method Montacargas findOneByMontacargasK(string $montacargas_k) Return the first Montacargas filtered by the montacargas_k column
 * @method Montacargas findOneByMontacargasP(string $montacargas_p) Return the first Montacargas filtered by the montacargas_p column
 * @method Montacargas findOneByMontacargasT(string $montacargas_t) Return the first Montacargas filtered by the montacargas_t column
 * @method Montacargas findOneByMontacargasE(string $montacargas_e) Return the first Montacargas filtered by the montacargas_e column
 * @method Montacargas findOneByMontacargasVolts(int $montacargas_volts) Return the first Montacargas filtered by the montacargas_volts column
 * @method Montacargas findOneByMontacargasAmperaje(int $montacargas_amperaje) Return the first Montacargas filtered by the montacargas_amperaje column
 * @method Montacargas findOneByMontacargasNombre(string $montacargas_nombre) Return the first Montacargas filtered by the montacargas_nombre column
 * @method Montacargas findOneByMontacargasNumserie(string $montacargas_numserie) Return the first Montacargas filtered by the montacargas_numserie column
 * @method Montacargas findOneByMontacargasComprador(string $montacargas_comprador) Return the first Montacargas filtered by the montacargas_comprador column
 * @method Montacargas findOneByMontacargasCiclosmant(int $montacargas_ciclosmant) Return the first Montacargas filtered by the montacargas_ciclosmant column
 * @method Montacargas findOneByMontacargasCiclosiniciales(int $montacargas_ciclosiniciales) Return the first Montacargas filtered by the montacargas_ciclosiniciales column
 *
 * @method array findByIdmontacargas(int $idmontacargas) Return Montacargas objects filtered by the idmontacargas column
 * @method array findByIdsucursal(int $idsucursal) Return Montacargas objects filtered by the idsucursal column
 * @method array findByMontacargasModelo(string $montacargas_modelo) Return Montacargas objects filtered by the montacargas_modelo column
 * @method array findByMontacargasMarca(string $montacargas_marca) Return Montacargas objects filtered by the montacargas_marca column
 * @method array findByMontacargasC(string $montacargas_c) Return Montacargas objects filtered by the montacargas_c column
 * @method array findByMontacargasK(string $montacargas_k) Return Montacargas objects filtered by the montacargas_k column
 * @method array findByMontacargasP(string $montacargas_p) Return Montacargas objects filtered by the montacargas_p column
 * @method array findByMontacargasT(string $montacargas_t) Return Montacargas objects filtered by the montacargas_t column
 * @method array findByMontacargasE(string $montacargas_e) Return Montacargas objects filtered by the montacargas_e column
 * @method array findByMontacargasVolts(int $montacargas_volts) Return Montacargas objects filtered by the montacargas_volts column
 * @method array findByMontacargasAmperaje(int $montacargas_amperaje) Return Montacargas objects filtered by the montacargas_amperaje column
 * @method array findByMontacargasNombre(string $montacargas_nombre) Return Montacargas objects filtered by the montacargas_nombre column
 * @method array findByMontacargasNumserie(string $montacargas_numserie) Return Montacargas objects filtered by the montacargas_numserie column
 * @method array findByMontacargasComprador(string $montacargas_comprador) Return Montacargas objects filtered by the montacargas_comprador column
 * @method array findByMontacargasCiclosmant(int $montacargas_ciclosmant) Return Montacargas objects filtered by the montacargas_ciclosmant column
 * @method array findByMontacargasCiclosiniciales(int $montacargas_ciclosiniciales) Return Montacargas objects filtered by the montacargas_ciclosiniciales column
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
     public function findOneByIdmontacargas($key, $con = null)
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
        $sql = 'SELECT `idmontacargas`, `idsucursal`, `montacargas_modelo`, `montacargas_marca`, `montacargas_c`, `montacargas_k`, `montacargas_p`, `montacargas_t`, `montacargas_e`, `montacargas_volts`, `montacargas_amperaje`, `montacargas_nombre`, `montacargas_numserie`, `montacargas_comprador`, `montacargas_ciclosmant`, `montacargas_ciclosiniciales` FROM `montacargas` WHERE `idmontacargas` = :p0';
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

        return $this->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $key, Criteria::EQUAL);
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

        return $this->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $keys, Criteria::IN);
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
     * @param     mixed $idmontacargas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByIdmontacargas($idmontacargas = null, $comparison = null)
    {
        if (is_array($idmontacargas)) {
            $useMinMax = false;
            if (isset($idmontacargas['min'])) {
                $this->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $idmontacargas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmontacargas['max'])) {
                $this->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $idmontacargas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $idmontacargas, $comparison);
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
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByIdsucursal($idsucursal = null, $comparison = null)
    {
        if (is_array($idsucursal)) {
            $useMinMax = false;
            if (isset($idsucursal['min'])) {
                $this->addUsingAlias(MontacargasPeer::IDSUCURSAL, $idsucursal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idsucursal['max'])) {
                $this->addUsingAlias(MontacargasPeer::IDSUCURSAL, $idsucursal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::IDSUCURSAL, $idsucursal, $comparison);
    }

    /**
     * Filter the query on the montacargas_modelo column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasModelo('fooValue');   // WHERE montacargas_modelo = 'fooValue'
     * $query->filterByMontacargasModelo('%fooValue%'); // WHERE montacargas_modelo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasModelo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasModelo($montacargasModelo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasModelo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasModelo)) {
                $montacargasModelo = str_replace('*', '%', $montacargasModelo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_MODELO, $montacargasModelo, $comparison);
    }

    /**
     * Filter the query on the montacargas_marca column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasMarca('fooValue');   // WHERE montacargas_marca = 'fooValue'
     * $query->filterByMontacargasMarca('%fooValue%'); // WHERE montacargas_marca LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasMarca The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasMarca($montacargasMarca = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasMarca)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasMarca)) {
                $montacargasMarca = str_replace('*', '%', $montacargasMarca);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_MARCA, $montacargasMarca, $comparison);
    }

    /**
     * Filter the query on the montacargas_c column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasC('fooValue');   // WHERE montacargas_c = 'fooValue'
     * $query->filterByMontacargasC('%fooValue%'); // WHERE montacargas_c LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasC The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasC($montacargasC = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasC)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasC)) {
                $montacargasC = str_replace('*', '%', $montacargasC);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_C, $montacargasC, $comparison);
    }

    /**
     * Filter the query on the montacargas_k column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasK('fooValue');   // WHERE montacargas_k = 'fooValue'
     * $query->filterByMontacargasK('%fooValue%'); // WHERE montacargas_k LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasK The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasK($montacargasK = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasK)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasK)) {
                $montacargasK = str_replace('*', '%', $montacargasK);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_K, $montacargasK, $comparison);
    }

    /**
     * Filter the query on the montacargas_p column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasP('fooValue');   // WHERE montacargas_p = 'fooValue'
     * $query->filterByMontacargasP('%fooValue%'); // WHERE montacargas_p LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasP The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasP($montacargasP = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasP)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasP)) {
                $montacargasP = str_replace('*', '%', $montacargasP);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_P, $montacargasP, $comparison);
    }

    /**
     * Filter the query on the montacargas_t column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasT('fooValue');   // WHERE montacargas_t = 'fooValue'
     * $query->filterByMontacargasT('%fooValue%'); // WHERE montacargas_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasT The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasT($montacargasT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasT)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasT)) {
                $montacargasT = str_replace('*', '%', $montacargasT);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_T, $montacargasT, $comparison);
    }

    /**
     * Filter the query on the montacargas_e column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasE('fooValue');   // WHERE montacargas_e = 'fooValue'
     * $query->filterByMontacargasE('%fooValue%'); // WHERE montacargas_e LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasE The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasE($montacargasE = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasE)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasE)) {
                $montacargasE = str_replace('*', '%', $montacargasE);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_E, $montacargasE, $comparison);
    }

    /**
     * Filter the query on the montacargas_volts column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasVolts(1234); // WHERE montacargas_volts = 1234
     * $query->filterByMontacargasVolts(array(12, 34)); // WHERE montacargas_volts IN (12, 34)
     * $query->filterByMontacargasVolts(array('min' => 12)); // WHERE montacargas_volts >= 12
     * $query->filterByMontacargasVolts(array('max' => 12)); // WHERE montacargas_volts <= 12
     * </code>
     *
     * @param     mixed $montacargasVolts The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasVolts($montacargasVolts = null, $comparison = null)
    {
        if (is_array($montacargasVolts)) {
            $useMinMax = false;
            if (isset($montacargasVolts['min'])) {
                $this->addUsingAlias(MontacargasPeer::MONTACARGAS_VOLTS, $montacargasVolts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($montacargasVolts['max'])) {
                $this->addUsingAlias(MontacargasPeer::MONTACARGAS_VOLTS, $montacargasVolts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_VOLTS, $montacargasVolts, $comparison);
    }

    /**
     * Filter the query on the montacargas_amperaje column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasAmperaje(1234); // WHERE montacargas_amperaje = 1234
     * $query->filterByMontacargasAmperaje(array(12, 34)); // WHERE montacargas_amperaje IN (12, 34)
     * $query->filterByMontacargasAmperaje(array('min' => 12)); // WHERE montacargas_amperaje >= 12
     * $query->filterByMontacargasAmperaje(array('max' => 12)); // WHERE montacargas_amperaje <= 12
     * </code>
     *
     * @param     mixed $montacargasAmperaje The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasAmperaje($montacargasAmperaje = null, $comparison = null)
    {
        if (is_array($montacargasAmperaje)) {
            $useMinMax = false;
            if (isset($montacargasAmperaje['min'])) {
                $this->addUsingAlias(MontacargasPeer::MONTACARGAS_AMPERAJE, $montacargasAmperaje['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($montacargasAmperaje['max'])) {
                $this->addUsingAlias(MontacargasPeer::MONTACARGAS_AMPERAJE, $montacargasAmperaje['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_AMPERAJE, $montacargasAmperaje, $comparison);
    }

    /**
     * Filter the query on the montacargas_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasNombre('fooValue');   // WHERE montacargas_nombre = 'fooValue'
     * $query->filterByMontacargasNombre('%fooValue%'); // WHERE montacargas_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasNombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasNombre($montacargasNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasNombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasNombre)) {
                $montacargasNombre = str_replace('*', '%', $montacargasNombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_NOMBRE, $montacargasNombre, $comparison);
    }

    /**
     * Filter the query on the montacargas_numserie column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasNumserie('fooValue');   // WHERE montacargas_numserie = 'fooValue'
     * $query->filterByMontacargasNumserie('%fooValue%'); // WHERE montacargas_numserie LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasNumserie The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasNumserie($montacargasNumserie = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasNumserie)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasNumserie)) {
                $montacargasNumserie = str_replace('*', '%', $montacargasNumserie);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_NUMSERIE, $montacargasNumserie, $comparison);
    }

    /**
     * Filter the query on the montacargas_comprador column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasComprador('fooValue');   // WHERE montacargas_comprador = 'fooValue'
     * $query->filterByMontacargasComprador('%fooValue%'); // WHERE montacargas_comprador LIKE '%fooValue%'
     * </code>
     *
     * @param     string $montacargasComprador The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasComprador($montacargasComprador = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($montacargasComprador)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $montacargasComprador)) {
                $montacargasComprador = str_replace('*', '%', $montacargasComprador);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_COMPRADOR, $montacargasComprador, $comparison);
    }

    /**
     * Filter the query on the montacargas_ciclosmant column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasCiclosmant(1234); // WHERE montacargas_ciclosmant = 1234
     * $query->filterByMontacargasCiclosmant(array(12, 34)); // WHERE montacargas_ciclosmant IN (12, 34)
     * $query->filterByMontacargasCiclosmant(array('min' => 12)); // WHERE montacargas_ciclosmant >= 12
     * $query->filterByMontacargasCiclosmant(array('max' => 12)); // WHERE montacargas_ciclosmant <= 12
     * </code>
     *
     * @param     mixed $montacargasCiclosmant The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasCiclosmant($montacargasCiclosmant = null, $comparison = null)
    {
        if (is_array($montacargasCiclosmant)) {
            $useMinMax = false;
            if (isset($montacargasCiclosmant['min'])) {
                $this->addUsingAlias(MontacargasPeer::MONTACARGAS_CICLOSMANT, $montacargasCiclosmant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($montacargasCiclosmant['max'])) {
                $this->addUsingAlias(MontacargasPeer::MONTACARGAS_CICLOSMANT, $montacargasCiclosmant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_CICLOSMANT, $montacargasCiclosmant, $comparison);
    }

    /**
     * Filter the query on the montacargas_ciclosiniciales column
     *
     * Example usage:
     * <code>
     * $query->filterByMontacargasCiclosiniciales(1234); // WHERE montacargas_ciclosiniciales = 1234
     * $query->filterByMontacargasCiclosiniciales(array(12, 34)); // WHERE montacargas_ciclosiniciales IN (12, 34)
     * $query->filterByMontacargasCiclosiniciales(array('min' => 12)); // WHERE montacargas_ciclosiniciales >= 12
     * $query->filterByMontacargasCiclosiniciales(array('max' => 12)); // WHERE montacargas_ciclosiniciales <= 12
     * </code>
     *
     * @param     mixed $montacargasCiclosiniciales The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function filterByMontacargasCiclosiniciales($montacargasCiclosiniciales = null, $comparison = null)
    {
        if (is_array($montacargasCiclosiniciales)) {
            $useMinMax = false;
            if (isset($montacargasCiclosiniciales['min'])) {
                $this->addUsingAlias(MontacargasPeer::MONTACARGAS_CICLOSINICIALES, $montacargasCiclosiniciales['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($montacargasCiclosiniciales['max'])) {
                $this->addUsingAlias(MontacargasPeer::MONTACARGAS_CICLOSINICIALES, $montacargasCiclosiniciales['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MontacargasPeer::MONTACARGAS_CICLOSINICIALES, $montacargasCiclosiniciales, $comparison);
    }

    /**
     * Filter the query by a related Sucursal object
     *
     * @param   Sucursal|PropelObjectCollection $sucursal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MontacargasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySucursal($sucursal, $comparison = null)
    {
        if ($sucursal instanceof Sucursal) {
            return $this
                ->addUsingAlias(MontacargasPeer::IDSUCURSAL, $sucursal->getIdsucursal(), $comparison);
        } elseif ($sucursal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MontacargasPeer::IDSUCURSAL, $sucursal->toKeyValue('PrimaryKey', 'Idsucursal'), $comparison);
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
     * @return MontacargasQuery The current query, for fluid interface
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
     * Filter the query by a related Deshabilitamc object
     *
     * @param   Deshabilitamc|PropelObjectCollection $deshabilitamc  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MontacargasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeshabilitamc($deshabilitamc, $comparison = null)
    {
        if ($deshabilitamc instanceof Deshabilitamc) {
            return $this
                ->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $deshabilitamc->getIdmontacargas(), $comparison);
        } elseif ($deshabilitamc instanceof PropelObjectCollection) {
            return $this
                ->useDeshabilitamcQuery()
                ->filterByPrimaryKeys($deshabilitamc->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeshabilitamc() only accepts arguments of type Deshabilitamc or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Deshabilitamc relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function joinDeshabilitamc($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Deshabilitamc');

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
            $this->addJoinObject($join, 'Deshabilitamc');
        }

        return $this;
    }

    /**
     * Use the Deshabilitamc relation Deshabilitamc object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeshabilitamcQuery A secondary query class using the current class as primary query
     */
    public function useDeshabilitamcQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeshabilitamc($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Deshabilitamc', 'DeshabilitamcQuery');
    }

    /**
     * Filter the query by a related MontacargasBaterias object
     *
     * @param   MontacargasBaterias|PropelObjectCollection $montacargasBaterias  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MontacargasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMontacargasBaterias($montacargasBaterias, $comparison = null)
    {
        if ($montacargasBaterias instanceof MontacargasBaterias) {
            return $this
                ->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $montacargasBaterias->getIdmontacargas(), $comparison);
        } elseif ($montacargasBaterias instanceof PropelObjectCollection) {
            return $this
                ->useMontacargasBateriasQuery()
                ->filterByPrimaryKeys($montacargasBaterias->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMontacargasBaterias() only accepts arguments of type MontacargasBaterias or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MontacargasBaterias relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function joinMontacargasBaterias($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MontacargasBaterias');

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
            $this->addJoinObject($join, 'MontacargasBaterias');
        }

        return $this;
    }

    /**
     * Use the MontacargasBaterias relation MontacargasBaterias object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MontacargasBateriasQuery A secondary query class using the current class as primary query
     */
    public function useMontacargasBateriasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMontacargasBaterias($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MontacargasBaterias', 'MontacargasBateriasQuery');
    }

    /**
     * Filter the query by a related UsoBateriasMontacargas object
     *
     * @param   UsoBateriasMontacargas|PropelObjectCollection $usoBateriasMontacargas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MontacargasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsoBateriasMontacargas($usoBateriasMontacargas, $comparison = null)
    {
        if ($usoBateriasMontacargas instanceof UsoBateriasMontacargas) {
            return $this
                ->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $usoBateriasMontacargas->getMc(), $comparison);
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
     * @return MontacargasQuery The current query, for fluid interface
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
     * @param   Montacargas $montacargas Object to remove from the list of results
     *
     * @return MontacargasQuery The current query, for fluid interface
     */
    public function prune($montacargas = null)
    {
        if ($montacargas) {
            $this->addUsingAlias(MontacargasPeer::IDMONTACARGAS, $montacargas->getIdmontacargas(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
