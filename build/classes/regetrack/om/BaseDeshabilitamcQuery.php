<?php


/**
 * Base class that represents a query for the 'deshabilitamc' table.
 *
 *
 *
 * @method DeshabilitamcQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DeshabilitamcQuery orderByIdmontacargas($order = Criteria::ASC) Order by the idmontacargas column
 * @method DeshabilitamcQuery orderByMotivo($order = Criteria::ASC) Order by the motivo column
 * @method DeshabilitamcQuery orderByFechaEntrada($order = Criteria::ASC) Order by the fecha_entrada column
 * @method DeshabilitamcQuery orderByFechaSalida($order = Criteria::ASC) Order by the fecha_salida column
 * @method DeshabilitamcQuery orderByUsuarioEntrada($order = Criteria::ASC) Order by the usuario_entrada column
 * @method DeshabilitamcQuery orderByUsuarioSalida($order = Criteria::ASC) Order by the usuario_salida column
 *
 * @method DeshabilitamcQuery groupById() Group by the id column
 * @method DeshabilitamcQuery groupByIdmontacargas() Group by the idmontacargas column
 * @method DeshabilitamcQuery groupByMotivo() Group by the motivo column
 * @method DeshabilitamcQuery groupByFechaEntrada() Group by the fecha_entrada column
 * @method DeshabilitamcQuery groupByFechaSalida() Group by the fecha_salida column
 * @method DeshabilitamcQuery groupByUsuarioEntrada() Group by the usuario_entrada column
 * @method DeshabilitamcQuery groupByUsuarioSalida() Group by the usuario_salida column
 *
 * @method DeshabilitamcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DeshabilitamcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DeshabilitamcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DeshabilitamcQuery leftJoinMontacargas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Montacargas relation
 * @method DeshabilitamcQuery rightJoinMontacargas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Montacargas relation
 * @method DeshabilitamcQuery innerJoinMontacargas($relationAlias = null) Adds a INNER JOIN clause to the query using the Montacargas relation
 *
 * @method DeshabilitamcQuery leftJoinUcUsersRelatedByUsuarioEntrada($relationAlias = null) Adds a LEFT JOIN clause to the query using the UcUsersRelatedByUsuarioEntrada relation
 * @method DeshabilitamcQuery rightJoinUcUsersRelatedByUsuarioEntrada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UcUsersRelatedByUsuarioEntrada relation
 * @method DeshabilitamcQuery innerJoinUcUsersRelatedByUsuarioEntrada($relationAlias = null) Adds a INNER JOIN clause to the query using the UcUsersRelatedByUsuarioEntrada relation
 *
 * @method DeshabilitamcQuery leftJoinUcUsersRelatedByUsuarioSalida($relationAlias = null) Adds a LEFT JOIN clause to the query using the UcUsersRelatedByUsuarioSalida relation
 * @method DeshabilitamcQuery rightJoinUcUsersRelatedByUsuarioSalida($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UcUsersRelatedByUsuarioSalida relation
 * @method DeshabilitamcQuery innerJoinUcUsersRelatedByUsuarioSalida($relationAlias = null) Adds a INNER JOIN clause to the query using the UcUsersRelatedByUsuarioSalida relation
 *
 * @method Deshabilitamc findOne(PropelPDO $con = null) Return the first Deshabilitamc matching the query
 * @method Deshabilitamc findOneOrCreate(PropelPDO $con = null) Return the first Deshabilitamc matching the query, or a new Deshabilitamc object populated from the query conditions when no match is found
 *
 * @method Deshabilitamc findOneByIdmontacargas(int $idmontacargas) Return the first Deshabilitamc filtered by the idmontacargas column
 * @method Deshabilitamc findOneByMotivo(string $motivo) Return the first Deshabilitamc filtered by the motivo column
 * @method Deshabilitamc findOneByFechaEntrada(string $fecha_entrada) Return the first Deshabilitamc filtered by the fecha_entrada column
 * @method Deshabilitamc findOneByFechaSalida(string $fecha_salida) Return the first Deshabilitamc filtered by the fecha_salida column
 * @method Deshabilitamc findOneByUsuarioEntrada(int $usuario_entrada) Return the first Deshabilitamc filtered by the usuario_entrada column
 * @method Deshabilitamc findOneByUsuarioSalida(int $usuario_salida) Return the first Deshabilitamc filtered by the usuario_salida column
 *
 * @method array findById(int $id) Return Deshabilitamc objects filtered by the id column
 * @method array findByIdmontacargas(int $idmontacargas) Return Deshabilitamc objects filtered by the idmontacargas column
 * @method array findByMotivo(string $motivo) Return Deshabilitamc objects filtered by the motivo column
 * @method array findByFechaEntrada(string $fecha_entrada) Return Deshabilitamc objects filtered by the fecha_entrada column
 * @method array findByFechaSalida(string $fecha_salida) Return Deshabilitamc objects filtered by the fecha_salida column
 * @method array findByUsuarioEntrada(int $usuario_entrada) Return Deshabilitamc objects filtered by the usuario_entrada column
 * @method array findByUsuarioSalida(int $usuario_salida) Return Deshabilitamc objects filtered by the usuario_salida column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseDeshabilitamcQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDeshabilitamcQuery object.
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
            $modelName = 'Deshabilitamc';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DeshabilitamcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DeshabilitamcQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DeshabilitamcQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DeshabilitamcQuery) {
            return $criteria;
        }
        $query = new DeshabilitamcQuery(null, null, $modelAlias);

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
     * @return   Deshabilitamc|Deshabilitamc[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DeshabilitamcPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DeshabilitamcPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Deshabilitamc A model object, or null if the key is not found
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
     * @return                 Deshabilitamc A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `idmontacargas`, `motivo`, `fecha_entrada`, `fecha_salida`, `usuario_entrada`, `usuario_salida` FROM `deshabilitamc` WHERE `id` = :p0';
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
            $obj = new Deshabilitamc();
            $obj->hydrate($row);
            DeshabilitamcPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Deshabilitamc|Deshabilitamc[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Deshabilitamc[]|mixed the list of results, formatted by the current formatter
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
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DeshabilitamcPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DeshabilitamcPeer::ID, $keys, Criteria::IN);
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
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DeshabilitamcPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DeshabilitamcPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitamcPeer::ID, $id, $comparison);
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
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterByIdmontacargas($idmontacargas = null, $comparison = null)
    {
        if (is_array($idmontacargas)) {
            $useMinMax = false;
            if (isset($idmontacargas['min'])) {
                $this->addUsingAlias(DeshabilitamcPeer::IDMONTACARGAS, $idmontacargas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmontacargas['max'])) {
                $this->addUsingAlias(DeshabilitamcPeer::IDMONTACARGAS, $idmontacargas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitamcPeer::IDMONTACARGAS, $idmontacargas, $comparison);
    }

    /**
     * Filter the query on the motivo column
     *
     * Example usage:
     * <code>
     * $query->filterByMotivo('fooValue');   // WHERE motivo = 'fooValue'
     * $query->filterByMotivo('%fooValue%'); // WHERE motivo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $motivo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterByMotivo($motivo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($motivo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $motivo)) {
                $motivo = str_replace('*', '%', $motivo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DeshabilitamcPeer::MOTIVO, $motivo, $comparison);
    }

    /**
     * Filter the query on the fecha_entrada column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaEntrada('2011-03-14'); // WHERE fecha_entrada = '2011-03-14'
     * $query->filterByFechaEntrada('now'); // WHERE fecha_entrada = '2011-03-14'
     * $query->filterByFechaEntrada(array('max' => 'yesterday')); // WHERE fecha_entrada < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaEntrada The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterByFechaEntrada($fechaEntrada = null, $comparison = null)
    {
        if (is_array($fechaEntrada)) {
            $useMinMax = false;
            if (isset($fechaEntrada['min'])) {
                $this->addUsingAlias(DeshabilitamcPeer::FECHA_ENTRADA, $fechaEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaEntrada['max'])) {
                $this->addUsingAlias(DeshabilitamcPeer::FECHA_ENTRADA, $fechaEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitamcPeer::FECHA_ENTRADA, $fechaEntrada, $comparison);
    }

    /**
     * Filter the query on the fecha_salida column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaSalida('2011-03-14'); // WHERE fecha_salida = '2011-03-14'
     * $query->filterByFechaSalida('now'); // WHERE fecha_salida = '2011-03-14'
     * $query->filterByFechaSalida(array('max' => 'yesterday')); // WHERE fecha_salida < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaSalida The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterByFechaSalida($fechaSalida = null, $comparison = null)
    {
        if (is_array($fechaSalida)) {
            $useMinMax = false;
            if (isset($fechaSalida['min'])) {
                $this->addUsingAlias(DeshabilitamcPeer::FECHA_SALIDA, $fechaSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaSalida['max'])) {
                $this->addUsingAlias(DeshabilitamcPeer::FECHA_SALIDA, $fechaSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitamcPeer::FECHA_SALIDA, $fechaSalida, $comparison);
    }

    /**
     * Filter the query on the usuario_entrada column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioEntrada(1234); // WHERE usuario_entrada = 1234
     * $query->filterByUsuarioEntrada(array(12, 34)); // WHERE usuario_entrada IN (12, 34)
     * $query->filterByUsuarioEntrada(array('min' => 12)); // WHERE usuario_entrada >= 12
     * $query->filterByUsuarioEntrada(array('max' => 12)); // WHERE usuario_entrada <= 12
     * </code>
     *
     * @see       filterByUcUsersRelatedByUsuarioEntrada()
     *
     * @param     mixed $usuarioEntrada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterByUsuarioEntrada($usuarioEntrada = null, $comparison = null)
    {
        if (is_array($usuarioEntrada)) {
            $useMinMax = false;
            if (isset($usuarioEntrada['min'])) {
                $this->addUsingAlias(DeshabilitamcPeer::USUARIO_ENTRADA, $usuarioEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioEntrada['max'])) {
                $this->addUsingAlias(DeshabilitamcPeer::USUARIO_ENTRADA, $usuarioEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitamcPeer::USUARIO_ENTRADA, $usuarioEntrada, $comparison);
    }

    /**
     * Filter the query on the usuario_salida column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioSalida(1234); // WHERE usuario_salida = 1234
     * $query->filterByUsuarioSalida(array(12, 34)); // WHERE usuario_salida IN (12, 34)
     * $query->filterByUsuarioSalida(array('min' => 12)); // WHERE usuario_salida >= 12
     * $query->filterByUsuarioSalida(array('max' => 12)); // WHERE usuario_salida <= 12
     * </code>
     *
     * @see       filterByUcUsersRelatedByUsuarioSalida()
     *
     * @param     mixed $usuarioSalida The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function filterByUsuarioSalida($usuarioSalida = null, $comparison = null)
    {
        if (is_array($usuarioSalida)) {
            $useMinMax = false;
            if (isset($usuarioSalida['min'])) {
                $this->addUsingAlias(DeshabilitamcPeer::USUARIO_SALIDA, $usuarioSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioSalida['max'])) {
                $this->addUsingAlias(DeshabilitamcPeer::USUARIO_SALIDA, $usuarioSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeshabilitamcPeer::USUARIO_SALIDA, $usuarioSalida, $comparison);
    }

    /**
     * Filter the query by a related Montacargas object
     *
     * @param   Montacargas|PropelObjectCollection $montacargas The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeshabilitamcQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMontacargas($montacargas, $comparison = null)
    {
        if ($montacargas instanceof Montacargas) {
            return $this
                ->addUsingAlias(DeshabilitamcPeer::IDMONTACARGAS, $montacargas->getIdmontacargas(), $comparison);
        } elseif ($montacargas instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DeshabilitamcPeer::IDMONTACARGAS, $montacargas->toKeyValue('PrimaryKey', 'Idmontacargas'), $comparison);
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
     * @return DeshabilitamcQuery The current query, for fluid interface
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
     * Filter the query by a related UcUsers object
     *
     * @param   UcUsers|PropelObjectCollection $ucUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeshabilitamcQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUcUsersRelatedByUsuarioEntrada($ucUsers, $comparison = null)
    {
        if ($ucUsers instanceof UcUsers) {
            return $this
                ->addUsingAlias(DeshabilitamcPeer::USUARIO_ENTRADA, $ucUsers->getId(), $comparison);
        } elseif ($ucUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DeshabilitamcPeer::USUARIO_ENTRADA, $ucUsers->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUcUsersRelatedByUsuarioEntrada() only accepts arguments of type UcUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UcUsersRelatedByUsuarioEntrada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function joinUcUsersRelatedByUsuarioEntrada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UcUsersRelatedByUsuarioEntrada');

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
            $this->addJoinObject($join, 'UcUsersRelatedByUsuarioEntrada');
        }

        return $this;
    }

    /**
     * Use the UcUsersRelatedByUsuarioEntrada relation UcUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UcUsersQuery A secondary query class using the current class as primary query
     */
    public function useUcUsersRelatedByUsuarioEntradaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUcUsersRelatedByUsuarioEntrada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UcUsersRelatedByUsuarioEntrada', 'UcUsersQuery');
    }

    /**
     * Filter the query by a related UcUsers object
     *
     * @param   UcUsers|PropelObjectCollection $ucUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeshabilitamcQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUcUsersRelatedByUsuarioSalida($ucUsers, $comparison = null)
    {
        if ($ucUsers instanceof UcUsers) {
            return $this
                ->addUsingAlias(DeshabilitamcPeer::USUARIO_SALIDA, $ucUsers->getId(), $comparison);
        } elseif ($ucUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DeshabilitamcPeer::USUARIO_SALIDA, $ucUsers->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUcUsersRelatedByUsuarioSalida() only accepts arguments of type UcUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UcUsersRelatedByUsuarioSalida relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function joinUcUsersRelatedByUsuarioSalida($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UcUsersRelatedByUsuarioSalida');

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
            $this->addJoinObject($join, 'UcUsersRelatedByUsuarioSalida');
        }

        return $this;
    }

    /**
     * Use the UcUsersRelatedByUsuarioSalida relation UcUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UcUsersQuery A secondary query class using the current class as primary query
     */
    public function useUcUsersRelatedByUsuarioSalidaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUcUsersRelatedByUsuarioSalida($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UcUsersRelatedByUsuarioSalida', 'UcUsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Deshabilitamc $deshabilitamc Object to remove from the list of results
     *
     * @return DeshabilitamcQuery The current query, for fluid interface
     */
    public function prune($deshabilitamc = null)
    {
        if ($deshabilitamc) {
            $this->addUsingAlias(DeshabilitamcPeer::ID, $deshabilitamc->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
