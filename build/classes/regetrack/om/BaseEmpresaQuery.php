<?php


/**
 * Base class that represents a query for the 'empresa' table.
 *
 *
 *
 * @method EmpresaQuery orderByIdempresa($order = Criteria::ASC) Order by the idempresa column
 * @method EmpresaQuery orderByIdusuario($order = Criteria::ASC) Order by the idusuario column
 * @method EmpresaQuery orderByEmpresaNombre($order = Criteria::ASC) Order by the empresa_nombre column
 * @method EmpresaQuery orderByEmpresaNumsucursales($order = Criteria::ASC) Order by the empresa_numsucursales column
 * @method EmpresaQuery orderByEmpresaSuscripcioninicio($order = Criteria::ASC) Order by the empresa_suscripcioninicio column
 * @method EmpresaQuery orderByEmpresaSuscripcionfin($order = Criteria::ASC) Order by the empresa_suscripcionfin column
 *
 * @method EmpresaQuery groupByIdempresa() Group by the idempresa column
 * @method EmpresaQuery groupByIdusuario() Group by the idusuario column
 * @method EmpresaQuery groupByEmpresaNombre() Group by the empresa_nombre column
 * @method EmpresaQuery groupByEmpresaNumsucursales() Group by the empresa_numsucursales column
 * @method EmpresaQuery groupByEmpresaSuscripcioninicio() Group by the empresa_suscripcioninicio column
 * @method EmpresaQuery groupByEmpresaSuscripcionfin() Group by the empresa_suscripcionfin column
 *
 * @method EmpresaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EmpresaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EmpresaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EmpresaQuery leftJoinUcUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the UcUsers relation
 * @method EmpresaQuery rightJoinUcUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UcUsers relation
 * @method EmpresaQuery innerJoinUcUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the UcUsers relation
 *
 * @method EmpresaQuery leftJoinSucursal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sucursal relation
 * @method EmpresaQuery rightJoinSucursal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sucursal relation
 * @method EmpresaQuery innerJoinSucursal($relationAlias = null) Adds a INNER JOIN clause to the query using the Sucursal relation
 *
 * @method Empresa findOne(PropelPDO $con = null) Return the first Empresa matching the query
 * @method Empresa findOneOrCreate(PropelPDO $con = null) Return the first Empresa matching the query, or a new Empresa object populated from the query conditions when no match is found
 *
 * @method Empresa findOneByIdusuario(int $idusuario) Return the first Empresa filtered by the idusuario column
 * @method Empresa findOneByEmpresaNombre(string $empresa_nombre) Return the first Empresa filtered by the empresa_nombre column
 * @method Empresa findOneByEmpresaNumsucursales(int $empresa_numsucursales) Return the first Empresa filtered by the empresa_numsucursales column
 * @method Empresa findOneByEmpresaSuscripcioninicio(int $empresa_suscripcioninicio) Return the first Empresa filtered by the empresa_suscripcioninicio column
 * @method Empresa findOneByEmpresaSuscripcionfin(int $empresa_suscripcionfin) Return the first Empresa filtered by the empresa_suscripcionfin column
 *
 * @method array findByIdempresa(int $idempresa) Return Empresa objects filtered by the idempresa column
 * @method array findByIdusuario(int $idusuario) Return Empresa objects filtered by the idusuario column
 * @method array findByEmpresaNombre(string $empresa_nombre) Return Empresa objects filtered by the empresa_nombre column
 * @method array findByEmpresaNumsucursales(int $empresa_numsucursales) Return Empresa objects filtered by the empresa_numsucursales column
 * @method array findByEmpresaSuscripcioninicio(int $empresa_suscripcioninicio) Return Empresa objects filtered by the empresa_suscripcioninicio column
 * @method array findByEmpresaSuscripcionfin(int $empresa_suscripcionfin) Return Empresa objects filtered by the empresa_suscripcionfin column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseEmpresaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEmpresaQuery object.
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
            $modelName = 'Empresa';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EmpresaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EmpresaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EmpresaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EmpresaQuery) {
            return $criteria;
        }
        $query = new EmpresaQuery(null, null, $modelAlias);

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
     * @return   Empresa|Empresa[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EmpresaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EmpresaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Empresa A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdempresa($key, $con = null)
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
     * @return                 Empresa A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idempresa`, `idusuario`, `empresa_nombre`, `empresa_numsucursales`, `empresa_suscripcioninicio`, `empresa_suscripcionfin` FROM `empresa` WHERE `idempresa` = :p0';
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
            $obj = new Empresa();
            $obj->hydrate($row);
            EmpresaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Empresa|Empresa[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Empresa[]|mixed the list of results, formatted by the current formatter
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
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmpresaPeer::IDEMPRESA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmpresaPeer::IDEMPRESA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idempresa column
     *
     * Example usage:
     * <code>
     * $query->filterByIdempresa(1234); // WHERE idempresa = 1234
     * $query->filterByIdempresa(array(12, 34)); // WHERE idempresa IN (12, 34)
     * $query->filterByIdempresa(array('min' => 12)); // WHERE idempresa >= 12
     * $query->filterByIdempresa(array('max' => 12)); // WHERE idempresa <= 12
     * </code>
     *
     * @param     mixed $idempresa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByIdempresa($idempresa = null, $comparison = null)
    {
        if (is_array($idempresa)) {
            $useMinMax = false;
            if (isset($idempresa['min'])) {
                $this->addUsingAlias(EmpresaPeer::IDEMPRESA, $idempresa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idempresa['max'])) {
                $this->addUsingAlias(EmpresaPeer::IDEMPRESA, $idempresa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmpresaPeer::IDEMPRESA, $idempresa, $comparison);
    }

    /**
     * Filter the query on the idusuario column
     *
     * Example usage:
     * <code>
     * $query->filterByIdusuario(1234); // WHERE idusuario = 1234
     * $query->filterByIdusuario(array(12, 34)); // WHERE idusuario IN (12, 34)
     * $query->filterByIdusuario(array('min' => 12)); // WHERE idusuario >= 12
     * $query->filterByIdusuario(array('max' => 12)); // WHERE idusuario <= 12
     * </code>
     *
     * @see       filterByUcUsers()
     *
     * @param     mixed $idusuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByIdusuario($idusuario = null, $comparison = null)
    {
        if (is_array($idusuario)) {
            $useMinMax = false;
            if (isset($idusuario['min'])) {
                $this->addUsingAlias(EmpresaPeer::IDUSUARIO, $idusuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idusuario['max'])) {
                $this->addUsingAlias(EmpresaPeer::IDUSUARIO, $idusuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmpresaPeer::IDUSUARIO, $idusuario, $comparison);
    }

    /**
     * Filter the query on the empresa_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByEmpresaNombre('fooValue');   // WHERE empresa_nombre = 'fooValue'
     * $query->filterByEmpresaNombre('%fooValue%'); // WHERE empresa_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $empresaNombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByEmpresaNombre($empresaNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($empresaNombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $empresaNombre)) {
                $empresaNombre = str_replace('*', '%', $empresaNombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmpresaPeer::EMPRESA_NOMBRE, $empresaNombre, $comparison);
    }

    /**
     * Filter the query on the empresa_numsucursales column
     *
     * Example usage:
     * <code>
     * $query->filterByEmpresaNumsucursales(1234); // WHERE empresa_numsucursales = 1234
     * $query->filterByEmpresaNumsucursales(array(12, 34)); // WHERE empresa_numsucursales IN (12, 34)
     * $query->filterByEmpresaNumsucursales(array('min' => 12)); // WHERE empresa_numsucursales >= 12
     * $query->filterByEmpresaNumsucursales(array('max' => 12)); // WHERE empresa_numsucursales <= 12
     * </code>
     *
     * @param     mixed $empresaNumsucursales The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByEmpresaNumsucursales($empresaNumsucursales = null, $comparison = null)
    {
        if (is_array($empresaNumsucursales)) {
            $useMinMax = false;
            if (isset($empresaNumsucursales['min'])) {
                $this->addUsingAlias(EmpresaPeer::EMPRESA_NUMSUCURSALES, $empresaNumsucursales['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($empresaNumsucursales['max'])) {
                $this->addUsingAlias(EmpresaPeer::EMPRESA_NUMSUCURSALES, $empresaNumsucursales['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmpresaPeer::EMPRESA_NUMSUCURSALES, $empresaNumsucursales, $comparison);
    }

    /**
     * Filter the query on the empresa_suscripcioninicio column
     *
     * Example usage:
     * <code>
     * $query->filterByEmpresaSuscripcioninicio(1234); // WHERE empresa_suscripcioninicio = 1234
     * $query->filterByEmpresaSuscripcioninicio(array(12, 34)); // WHERE empresa_suscripcioninicio IN (12, 34)
     * $query->filterByEmpresaSuscripcioninicio(array('min' => 12)); // WHERE empresa_suscripcioninicio >= 12
     * $query->filterByEmpresaSuscripcioninicio(array('max' => 12)); // WHERE empresa_suscripcioninicio <= 12
     * </code>
     *
     * @param     mixed $empresaSuscripcioninicio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByEmpresaSuscripcioninicio($empresaSuscripcioninicio = null, $comparison = null)
    {
        if (is_array($empresaSuscripcioninicio)) {
            $useMinMax = false;
            if (isset($empresaSuscripcioninicio['min'])) {
                $this->addUsingAlias(EmpresaPeer::EMPRESA_SUSCRIPCIONINICIO, $empresaSuscripcioninicio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($empresaSuscripcioninicio['max'])) {
                $this->addUsingAlias(EmpresaPeer::EMPRESA_SUSCRIPCIONINICIO, $empresaSuscripcioninicio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmpresaPeer::EMPRESA_SUSCRIPCIONINICIO, $empresaSuscripcioninicio, $comparison);
    }

    /**
     * Filter the query on the empresa_suscripcionfin column
     *
     * Example usage:
     * <code>
     * $query->filterByEmpresaSuscripcionfin(1234); // WHERE empresa_suscripcionfin = 1234
     * $query->filterByEmpresaSuscripcionfin(array(12, 34)); // WHERE empresa_suscripcionfin IN (12, 34)
     * $query->filterByEmpresaSuscripcionfin(array('min' => 12)); // WHERE empresa_suscripcionfin >= 12
     * $query->filterByEmpresaSuscripcionfin(array('max' => 12)); // WHERE empresa_suscripcionfin <= 12
     * </code>
     *
     * @param     mixed $empresaSuscripcionfin The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByEmpresaSuscripcionfin($empresaSuscripcionfin = null, $comparison = null)
    {
        if (is_array($empresaSuscripcionfin)) {
            $useMinMax = false;
            if (isset($empresaSuscripcionfin['min'])) {
                $this->addUsingAlias(EmpresaPeer::EMPRESA_SUSCRIPCIONFIN, $empresaSuscripcionfin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($empresaSuscripcionfin['max'])) {
                $this->addUsingAlias(EmpresaPeer::EMPRESA_SUSCRIPCIONFIN, $empresaSuscripcionfin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmpresaPeer::EMPRESA_SUSCRIPCIONFIN, $empresaSuscripcionfin, $comparison);
    }

    /**
     * Filter the query by a related UcUsers object
     *
     * @param   UcUsers|PropelObjectCollection $ucUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EmpresaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUcUsers($ucUsers, $comparison = null)
    {
        if ($ucUsers instanceof UcUsers) {
            return $this
                ->addUsingAlias(EmpresaPeer::IDUSUARIO, $ucUsers->getId(), $comparison);
        } elseif ($ucUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EmpresaPeer::IDUSUARIO, $ucUsers->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUcUsers() only accepts arguments of type UcUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UcUsers relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function joinUcUsers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UcUsers');

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
            $this->addJoinObject($join, 'UcUsers');
        }

        return $this;
    }

    /**
     * Use the UcUsers relation UcUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UcUsersQuery A secondary query class using the current class as primary query
     */
    public function useUcUsersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUcUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UcUsers', 'UcUsersQuery');
    }

    /**
     * Filter the query by a related Sucursal object
     *
     * @param   Sucursal|PropelObjectCollection $sucursal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EmpresaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySucursal($sucursal, $comparison = null)
    {
        if ($sucursal instanceof Sucursal) {
            return $this
                ->addUsingAlias(EmpresaPeer::IDEMPRESA, $sucursal->getIdempresa(), $comparison);
        } elseif ($sucursal instanceof PropelObjectCollection) {
            return $this
                ->useSucursalQuery()
                ->filterByPrimaryKeys($sucursal->getPrimaryKeys())
                ->endUse();
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
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function joinSucursal($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSucursalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSucursal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sucursal', 'SucursalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Empresa $empresa Object to remove from the list of results
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function prune($empresa = null)
    {
        if ($empresa) {
            $this->addUsingAlias(EmpresaPeer::IDEMPRESA, $empresa->getIdempresa(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
