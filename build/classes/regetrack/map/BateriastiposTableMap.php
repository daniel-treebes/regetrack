<?php



/**
 * This class defines the structure of the 'bateriastipos' table.
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
class BateriastiposTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.BateriastiposTableMap';

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
        $this->setName('bateriastipos');
        $this->setPhpName('Bateriastipos');
        $this->setClassname('Bateriastipos');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('idsucursal', 'Idsucursal', 'INTEGER', 'sucursal', 'idsucursal', true, null, null);
        $this->addColumn('volts', 'Volts', 'INTEGER', true, null, null);
        $this->addColumn('ah', 'Ah', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Sucursal', 'Sucursal', RelationMap::MANY_TO_ONE, array('idsucursal' => 'idsucursal', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Baterias', 'Baterias', RelationMap::ONE_TO_MANY, array('id' => 'tipo', ), 'CASCADE', 'CASCADE', 'Bateriass');
        $this->addRelation('Cargadores', 'Cargadores', RelationMap::ONE_TO_MANY, array('id' => 'tipo', ), 'CASCADE', 'CASCADE', 'Cargadoress');
        $this->addRelation('Montacargas', 'Montacargas', RelationMap::ONE_TO_MANY, array('id' => 'tipo', ), 'CASCADE', 'CASCADE', 'Montacargass');
    } // buildRelations()

} // BateriastiposTableMap
