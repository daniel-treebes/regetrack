<?php


/**
 * Base class that represents a query for the 'uc_users' table.
 *
 *
 *
 * @method UcUsersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UcUsersQuery orderByIdsucursal($order = Criteria::ASC) Order by the idsucursal column
 * @method UcUsersQuery orderByUserName($order = Criteria::ASC) Order by the user_name column
 * @method UcUsersQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method UcUsersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method UcUsersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method UcUsersQuery orderByActivationToken($order = Criteria::ASC) Order by the activation_token column
 * @method UcUsersQuery orderByLastActivationRequest($order = Criteria::ASC) Order by the last_activation_request column
 * @method UcUsersQuery orderByLostPasswordRequest($order = Criteria::ASC) Order by the lost_password_request column
 * @method UcUsersQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method UcUsersQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method UcUsersQuery orderBySignUpStamp($order = Criteria::ASC) Order by the sign_up_stamp column
 * @method UcUsersQuery orderByLastSignInStamp($order = Criteria::ASC) Order by the last_sign_in_stamp column
 *
 * @method UcUsersQuery groupById() Group by the id column
 * @method UcUsersQuery groupByIdsucursal() Group by the idsucursal column
 * @method UcUsersQuery groupByUserName() Group by the user_name column
 * @method UcUsersQuery groupByDisplayName() Group by the display_name column
 * @method UcUsersQuery groupByPassword() Group by the password column
 * @method UcUsersQuery groupByEmail() Group by the email column
 * @method UcUsersQuery groupByActivationToken() Group by the activation_token column
 * @method UcUsersQuery groupByLastActivationRequest() Group by the last_activation_request column
 * @method UcUsersQuery groupByLostPasswordRequest() Group by the lost_password_request column
 * @method UcUsersQuery groupByActive() Group by the active column
 * @method UcUsersQuery groupByTitle() Group by the title column
 * @method UcUsersQuery groupBySignUpStamp() Group by the sign_up_stamp column
 * @method UcUsersQuery groupByLastSignInStamp() Group by the last_sign_in_stamp column
 *
 * @method UcUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UcUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UcUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UcUsersQuery leftJoinSucursal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sucursal relation
 * @method UcUsersQuery rightJoinSucursal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sucursal relation
 * @method UcUsersQuery innerJoinSucursal($relationAlias = null) Adds a INNER JOIN clause to the query using the Sucursal relation
 *
 * @method UcUsersQuery leftJoinDeshabilitamcRelatedByUsuarioEntrada($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeshabilitamcRelatedByUsuarioEntrada relation
 * @method UcUsersQuery rightJoinDeshabilitamcRelatedByUsuarioEntrada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeshabilitamcRelatedByUsuarioEntrada relation
 * @method UcUsersQuery innerJoinDeshabilitamcRelatedByUsuarioEntrada($relationAlias = null) Adds a INNER JOIN clause to the query using the DeshabilitamcRelatedByUsuarioEntrada relation
 *
 * @method UcUsersQuery leftJoinDeshabilitamcRelatedByUsuarioSalida($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeshabilitamcRelatedByUsuarioSalida relation
 * @method UcUsersQuery rightJoinDeshabilitamcRelatedByUsuarioSalida($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeshabilitamcRelatedByUsuarioSalida relation
 * @method UcUsersQuery innerJoinDeshabilitamcRelatedByUsuarioSalida($relationAlias = null) Adds a INNER JOIN clause to the query using the DeshabilitamcRelatedByUsuarioSalida relation
 *
 * @method UcUsersQuery leftJoinEmpresa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Empresa relation
 * @method UcUsersQuery rightJoinEmpresa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Empresa relation
 * @method UcUsersQuery innerJoinEmpresa($relationAlias = null) Adds a INNER JOIN clause to the query using the Empresa relation
 *
 * @method UcUsersQuery leftJoinUsoBateriasMontacargasRelatedByUsuarioEntrada($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsoBateriasMontacargasRelatedByUsuarioEntrada relation
 * @method UcUsersQuery rightJoinUsoBateriasMontacargasRelatedByUsuarioEntrada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsoBateriasMontacargasRelatedByUsuarioEntrada relation
 * @method UcUsersQuery innerJoinUsoBateriasMontacargasRelatedByUsuarioEntrada($relationAlias = null) Adds a INNER JOIN clause to the query using the UsoBateriasMontacargasRelatedByUsuarioEntrada relation
 *
 * @method UcUsersQuery leftJoinUsoBateriasMontacargasRelatedByUsuarioSalida($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsoBateriasMontacargasRelatedByUsuarioSalida relation
 * @method UcUsersQuery rightJoinUsoBateriasMontacargasRelatedByUsuarioSalida($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsoBateriasMontacargasRelatedByUsuarioSalida relation
 * @method UcUsersQuery innerJoinUsoBateriasMontacargasRelatedByUsuarioSalida($relationAlias = null) Adds a INNER JOIN clause to the query using the UsoBateriasMontacargasRelatedByUsuarioSalida relation
 *
 * @method UcUsers findOne(PropelPDO $con = null) Return the first UcUsers matching the query
 * @method UcUsers findOneOrCreate(PropelPDO $con = null) Return the first UcUsers matching the query, or a new UcUsers object populated from the query conditions when no match is found
 *
 * @method UcUsers findOneByIdsucursal(int $idsucursal) Return the first UcUsers filtered by the idsucursal column
 * @method UcUsers findOneByUserName(string $user_name) Return the first UcUsers filtered by the user_name column
 * @method UcUsers findOneByDisplayName(string $display_name) Return the first UcUsers filtered by the display_name column
 * @method UcUsers findOneByPassword(string $password) Return the first UcUsers filtered by the password column
 * @method UcUsers findOneByEmail(string $email) Return the first UcUsers filtered by the email column
 * @method UcUsers findOneByActivationToken(string $activation_token) Return the first UcUsers filtered by the activation_token column
 * @method UcUsers findOneByLastActivationRequest(int $last_activation_request) Return the first UcUsers filtered by the last_activation_request column
 * @method UcUsers findOneByLostPasswordRequest(boolean $lost_password_request) Return the first UcUsers filtered by the lost_password_request column
 * @method UcUsers findOneByActive(boolean $active) Return the first UcUsers filtered by the active column
 * @method UcUsers findOneByTitle(string $title) Return the first UcUsers filtered by the title column
 * @method UcUsers findOneBySignUpStamp(int $sign_up_stamp) Return the first UcUsers filtered by the sign_up_stamp column
 * @method UcUsers findOneByLastSignInStamp(int $last_sign_in_stamp) Return the first UcUsers filtered by the last_sign_in_stamp column
 *
 * @method array findById(int $id) Return UcUsers objects filtered by the id column
 * @method array findByIdsucursal(int $idsucursal) Return UcUsers objects filtered by the idsucursal column
 * @method array findByUserName(string $user_name) Return UcUsers objects filtered by the user_name column
 * @method array findByDisplayName(string $display_name) Return UcUsers objects filtered by the display_name column
 * @method array findByPassword(string $password) Return UcUsers objects filtered by the password column
 * @method array findByEmail(string $email) Return UcUsers objects filtered by the email column
 * @method array findByActivationToken(string $activation_token) Return UcUsers objects filtered by the activation_token column
 * @method array findByLastActivationRequest(int $last_activation_request) Return UcUsers objects filtered by the last_activation_request column
 * @method array findByLostPasswordRequest(boolean $lost_password_request) Return UcUsers objects filtered by the lost_password_request column
 * @method array findByActive(boolean $active) Return UcUsers objects filtered by the active column
 * @method array findByTitle(string $title) Return UcUsers objects filtered by the title column
 * @method array findBySignUpStamp(int $sign_up_stamp) Return UcUsers objects filtered by the sign_up_stamp column
 * @method array findByLastSignInStamp(int $last_sign_in_stamp) Return UcUsers objects filtered by the last_sign_in_stamp column
 *
 * @package    propel.generator.regetrack.om
 */
abstract class BaseUcUsersQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUcUsersQuery object.
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
            $modelName = 'UcUsers';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UcUsersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UcUsersQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UcUsersQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UcUsersQuery) {
            return $criteria;
        }
        $query = new UcUsersQuery(null, null, $modelAlias);

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
     * @return   UcUsers|UcUsers[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UcUsersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UcUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UcUsers A model object, or null if the key is not found
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
     * @return                 UcUsers A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `idsucursal`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp` FROM `uc_users` WHERE `id` = :p0';
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
            $obj = new UcUsers();
            $obj->hydrate($row);
            UcUsersPeer::addInstanceToPool($obj, (string) $key);
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
     * @return UcUsers|UcUsers[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UcUsers[]|mixed the list of results, formatted by the current formatter
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
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UcUsersPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UcUsersPeer::ID, $keys, Criteria::IN);
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
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UcUsersPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UcUsersPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::ID, $id, $comparison);
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
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByIdsucursal($idsucursal = null, $comparison = null)
    {
        if (is_array($idsucursal)) {
            $useMinMax = false;
            if (isset($idsucursal['min'])) {
                $this->addUsingAlias(UcUsersPeer::IDSUCURSAL, $idsucursal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idsucursal['max'])) {
                $this->addUsingAlias(UcUsersPeer::IDSUCURSAL, $idsucursal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::IDSUCURSAL, $idsucursal, $comparison);
    }

    /**
     * Filter the query on the user_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUserName('fooValue');   // WHERE user_name = 'fooValue'
     * $query->filterByUserName('%fooValue%'); // WHERE user_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByUserName($userName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userName)) {
                $userName = str_replace('*', '%', $userName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::USER_NAME, $userName, $comparison);
    }

    /**
     * Filter the query on the display_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplayName('fooValue');   // WHERE display_name = 'fooValue'
     * $query->filterByDisplayName('%fooValue%'); // WHERE display_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $displayName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByDisplayName($displayName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($displayName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $displayName)) {
                $displayName = str_replace('*', '%', $displayName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::DISPLAY_NAME, $displayName, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the activation_token column
     *
     * Example usage:
     * <code>
     * $query->filterByActivationToken('fooValue');   // WHERE activation_token = 'fooValue'
     * $query->filterByActivationToken('%fooValue%'); // WHERE activation_token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $activationToken The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByActivationToken($activationToken = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($activationToken)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $activationToken)) {
                $activationToken = str_replace('*', '%', $activationToken);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::ACTIVATION_TOKEN, $activationToken, $comparison);
    }

    /**
     * Filter the query on the last_activation_request column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActivationRequest(1234); // WHERE last_activation_request = 1234
     * $query->filterByLastActivationRequest(array(12, 34)); // WHERE last_activation_request IN (12, 34)
     * $query->filterByLastActivationRequest(array('min' => 12)); // WHERE last_activation_request >= 12
     * $query->filterByLastActivationRequest(array('max' => 12)); // WHERE last_activation_request <= 12
     * </code>
     *
     * @param     mixed $lastActivationRequest The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByLastActivationRequest($lastActivationRequest = null, $comparison = null)
    {
        if (is_array($lastActivationRequest)) {
            $useMinMax = false;
            if (isset($lastActivationRequest['min'])) {
                $this->addUsingAlias(UcUsersPeer::LAST_ACTIVATION_REQUEST, $lastActivationRequest['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActivationRequest['max'])) {
                $this->addUsingAlias(UcUsersPeer::LAST_ACTIVATION_REQUEST, $lastActivationRequest['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::LAST_ACTIVATION_REQUEST, $lastActivationRequest, $comparison);
    }

    /**
     * Filter the query on the lost_password_request column
     *
     * Example usage:
     * <code>
     * $query->filterByLostPasswordRequest(true); // WHERE lost_password_request = true
     * $query->filterByLostPasswordRequest('yes'); // WHERE lost_password_request = true
     * </code>
     *
     * @param     boolean|string $lostPasswordRequest The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByLostPasswordRequest($lostPasswordRequest = null, $comparison = null)
    {
        if (is_string($lostPasswordRequest)) {
            $lostPasswordRequest = in_array(strtolower($lostPasswordRequest), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UcUsersPeer::LOST_PASSWORD_REQUEST, $lostPasswordRequest, $comparison);
    }

    /**
     * Filter the query on the active column
     *
     * Example usage:
     * <code>
     * $query->filterByActive(true); // WHERE active = true
     * $query->filterByActive('yes'); // WHERE active = true
     * </code>
     *
     * @param     boolean|string $active The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UcUsersPeer::ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the sign_up_stamp column
     *
     * Example usage:
     * <code>
     * $query->filterBySignUpStamp(1234); // WHERE sign_up_stamp = 1234
     * $query->filterBySignUpStamp(array(12, 34)); // WHERE sign_up_stamp IN (12, 34)
     * $query->filterBySignUpStamp(array('min' => 12)); // WHERE sign_up_stamp >= 12
     * $query->filterBySignUpStamp(array('max' => 12)); // WHERE sign_up_stamp <= 12
     * </code>
     *
     * @param     mixed $signUpStamp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterBySignUpStamp($signUpStamp = null, $comparison = null)
    {
        if (is_array($signUpStamp)) {
            $useMinMax = false;
            if (isset($signUpStamp['min'])) {
                $this->addUsingAlias(UcUsersPeer::SIGN_UP_STAMP, $signUpStamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($signUpStamp['max'])) {
                $this->addUsingAlias(UcUsersPeer::SIGN_UP_STAMP, $signUpStamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::SIGN_UP_STAMP, $signUpStamp, $comparison);
    }

    /**
     * Filter the query on the last_sign_in_stamp column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSignInStamp(1234); // WHERE last_sign_in_stamp = 1234
     * $query->filterByLastSignInStamp(array(12, 34)); // WHERE last_sign_in_stamp IN (12, 34)
     * $query->filterByLastSignInStamp(array('min' => 12)); // WHERE last_sign_in_stamp >= 12
     * $query->filterByLastSignInStamp(array('max' => 12)); // WHERE last_sign_in_stamp <= 12
     * </code>
     *
     * @param     mixed $lastSignInStamp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function filterByLastSignInStamp($lastSignInStamp = null, $comparison = null)
    {
        if (is_array($lastSignInStamp)) {
            $useMinMax = false;
            if (isset($lastSignInStamp['min'])) {
                $this->addUsingAlias(UcUsersPeer::LAST_SIGN_IN_STAMP, $lastSignInStamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSignInStamp['max'])) {
                $this->addUsingAlias(UcUsersPeer::LAST_SIGN_IN_STAMP, $lastSignInStamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UcUsersPeer::LAST_SIGN_IN_STAMP, $lastSignInStamp, $comparison);
    }

    /**
     * Filter the query by a related Sucursal object
     *
     * @param   Sucursal|PropelObjectCollection $sucursal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UcUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySucursal($sucursal, $comparison = null)
    {
        if ($sucursal instanceof Sucursal) {
            return $this
                ->addUsingAlias(UcUsersPeer::IDSUCURSAL, $sucursal->getIdsucursal(), $comparison);
        } elseif ($sucursal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UcUsersPeer::IDSUCURSAL, $sucursal->toKeyValue('PrimaryKey', 'Idsucursal'), $comparison);
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
     * @return UcUsersQuery The current query, for fluid interface
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
     * Filter the query by a related Deshabilitamc object
     *
     * @param   Deshabilitamc|PropelObjectCollection $deshabilitamc  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UcUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeshabilitamcRelatedByUsuarioEntrada($deshabilitamc, $comparison = null)
    {
        if ($deshabilitamc instanceof Deshabilitamc) {
            return $this
                ->addUsingAlias(UcUsersPeer::ID, $deshabilitamc->getUsuarioEntrada(), $comparison);
        } elseif ($deshabilitamc instanceof PropelObjectCollection) {
            return $this
                ->useDeshabilitamcRelatedByUsuarioEntradaQuery()
                ->filterByPrimaryKeys($deshabilitamc->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeshabilitamcRelatedByUsuarioEntrada() only accepts arguments of type Deshabilitamc or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeshabilitamcRelatedByUsuarioEntrada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function joinDeshabilitamcRelatedByUsuarioEntrada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeshabilitamcRelatedByUsuarioEntrada');

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
            $this->addJoinObject($join, 'DeshabilitamcRelatedByUsuarioEntrada');
        }

        return $this;
    }

    /**
     * Use the DeshabilitamcRelatedByUsuarioEntrada relation Deshabilitamc object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeshabilitamcQuery A secondary query class using the current class as primary query
     */
    public function useDeshabilitamcRelatedByUsuarioEntradaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDeshabilitamcRelatedByUsuarioEntrada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeshabilitamcRelatedByUsuarioEntrada', 'DeshabilitamcQuery');
    }

    /**
     * Filter the query by a related Deshabilitamc object
     *
     * @param   Deshabilitamc|PropelObjectCollection $deshabilitamc  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UcUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeshabilitamcRelatedByUsuarioSalida($deshabilitamc, $comparison = null)
    {
        if ($deshabilitamc instanceof Deshabilitamc) {
            return $this
                ->addUsingAlias(UcUsersPeer::ID, $deshabilitamc->getUsuarioSalida(), $comparison);
        } elseif ($deshabilitamc instanceof PropelObjectCollection) {
            return $this
                ->useDeshabilitamcRelatedByUsuarioSalidaQuery()
                ->filterByPrimaryKeys($deshabilitamc->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeshabilitamcRelatedByUsuarioSalida() only accepts arguments of type Deshabilitamc or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeshabilitamcRelatedByUsuarioSalida relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function joinDeshabilitamcRelatedByUsuarioSalida($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeshabilitamcRelatedByUsuarioSalida');

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
            $this->addJoinObject($join, 'DeshabilitamcRelatedByUsuarioSalida');
        }

        return $this;
    }

    /**
     * Use the DeshabilitamcRelatedByUsuarioSalida relation Deshabilitamc object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeshabilitamcQuery A secondary query class using the current class as primary query
     */
    public function useDeshabilitamcRelatedByUsuarioSalidaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDeshabilitamcRelatedByUsuarioSalida($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeshabilitamcRelatedByUsuarioSalida', 'DeshabilitamcQuery');
    }

    /**
     * Filter the query by a related Empresa object
     *
     * @param   Empresa|PropelObjectCollection $empresa  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UcUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEmpresa($empresa, $comparison = null)
    {
        if ($empresa instanceof Empresa) {
            return $this
                ->addUsingAlias(UcUsersPeer::ID, $empresa->getIdusuario(), $comparison);
        } elseif ($empresa instanceof PropelObjectCollection) {
            return $this
                ->useEmpresaQuery()
                ->filterByPrimaryKeys($empresa->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEmpresa() only accepts arguments of type Empresa or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Empresa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function joinEmpresa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Empresa');

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
            $this->addJoinObject($join, 'Empresa');
        }

        return $this;
    }

    /**
     * Use the Empresa relation Empresa object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EmpresaQuery A secondary query class using the current class as primary query
     */
    public function useEmpresaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEmpresa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Empresa', 'EmpresaQuery');
    }

    /**
     * Filter the query by a related UsoBateriasMontacargas object
     *
     * @param   UsoBateriasMontacargas|PropelObjectCollection $usoBateriasMontacargas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UcUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsoBateriasMontacargasRelatedByUsuarioEntrada($usoBateriasMontacargas, $comparison = null)
    {
        if ($usoBateriasMontacargas instanceof UsoBateriasMontacargas) {
            return $this
                ->addUsingAlias(UcUsersPeer::ID, $usoBateriasMontacargas->getUsuarioEntrada(), $comparison);
        } elseif ($usoBateriasMontacargas instanceof PropelObjectCollection) {
            return $this
                ->useUsoBateriasMontacargasRelatedByUsuarioEntradaQuery()
                ->filterByPrimaryKeys($usoBateriasMontacargas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsoBateriasMontacargasRelatedByUsuarioEntrada() only accepts arguments of type UsoBateriasMontacargas or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsoBateriasMontacargasRelatedByUsuarioEntrada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function joinUsoBateriasMontacargasRelatedByUsuarioEntrada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsoBateriasMontacargasRelatedByUsuarioEntrada');

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
            $this->addJoinObject($join, 'UsoBateriasMontacargasRelatedByUsuarioEntrada');
        }

        return $this;
    }

    /**
     * Use the UsoBateriasMontacargasRelatedByUsuarioEntrada relation UsoBateriasMontacargas object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsoBateriasMontacargasQuery A secondary query class using the current class as primary query
     */
    public function useUsoBateriasMontacargasRelatedByUsuarioEntradaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsoBateriasMontacargasRelatedByUsuarioEntrada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsoBateriasMontacargasRelatedByUsuarioEntrada', 'UsoBateriasMontacargasQuery');
    }

    /**
     * Filter the query by a related UsoBateriasMontacargas object
     *
     * @param   UsoBateriasMontacargas|PropelObjectCollection $usoBateriasMontacargas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UcUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsoBateriasMontacargasRelatedByUsuarioSalida($usoBateriasMontacargas, $comparison = null)
    {
        if ($usoBateriasMontacargas instanceof UsoBateriasMontacargas) {
            return $this
                ->addUsingAlias(UcUsersPeer::ID, $usoBateriasMontacargas->getUsuarioSalida(), $comparison);
        } elseif ($usoBateriasMontacargas instanceof PropelObjectCollection) {
            return $this
                ->useUsoBateriasMontacargasRelatedByUsuarioSalidaQuery()
                ->filterByPrimaryKeys($usoBateriasMontacargas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsoBateriasMontacargasRelatedByUsuarioSalida() only accepts arguments of type UsoBateriasMontacargas or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsoBateriasMontacargasRelatedByUsuarioSalida relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function joinUsoBateriasMontacargasRelatedByUsuarioSalida($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsoBateriasMontacargasRelatedByUsuarioSalida');

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
            $this->addJoinObject($join, 'UsoBateriasMontacargasRelatedByUsuarioSalida');
        }

        return $this;
    }

    /**
     * Use the UsoBateriasMontacargasRelatedByUsuarioSalida relation UsoBateriasMontacargas object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsoBateriasMontacargasQuery A secondary query class using the current class as primary query
     */
    public function useUsoBateriasMontacargasRelatedByUsuarioSalidaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsoBateriasMontacargasRelatedByUsuarioSalida($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsoBateriasMontacargasRelatedByUsuarioSalida', 'UsoBateriasMontacargasQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   UcUsers $ucUsers Object to remove from the list of results
     *
     * @return UcUsersQuery The current query, for fluid interface
     */
    public function prune($ucUsers = null)
    {
        if ($ucUsers) {
            $this->addUsingAlias(UcUsersPeer::ID, $ucUsers->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
