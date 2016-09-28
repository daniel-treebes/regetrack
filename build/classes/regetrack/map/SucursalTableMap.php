<?php



/**
 * This class defines the structure of the 'sucursal' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.regetrack.map
 */
class SucursalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.SucursalTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sucursal');
        $this->setPhpName('Sucursal');
        $this->setClassname('Sucursal');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idsucursal', 'Idsucursal', 'INTEGER', true, null, null);
        $this->addForeignKey('idempresa', 'Idempresa', 'INTEGER', 'empresa', 'idempresa', false, null, null);
        $this->addColumn('sucursal_nombre', 'SucursalNombre', 'VARCHAR', true, 255, null);
        $this->addColumn('sucursal_suscripcioninicio', 'SucursalSuscripcioninicio', 'INTEGER', true, null, null);
        $this->addColumn('sucursal_suscripcionfin', 'SucursalSuscripcionfin', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Empresa', 'Empresa', RelationMap::MANY_TO_ONE, array('idempresa' => 'idempresa', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Baterias', 'Baterias', RelationMap::ONE_TO_MANY, array('idsucursal' => 'idsucursal', ), 'CASCADE', 'CASCADE', 'Bateriass');
        $this->addRelation('Cargadores', 'Cargadores', RelationMap::ONE_TO_MANY, array('idsucursal' => 'idsucursal', ), 'CASCADE', 'CASCADE', 'Cargadoress');
        $this->addRelation('Montacargas', 'Montacargas', RelationMap::ONE_TO_MANY, array('idsucursal' => 'idsucursal', ), 'CASCADE', 'CASCADE', 'Montacargass');
        $this->addRelation('UcUsers', 'UcUsers', RelationMap::ONE_TO_MANY, array('idsucursal' => 'idsucursal', ), 'CASCADE', 'CASCADE', 'UcUserss');
    } // buildRelations()

} // SucursalTableMap
