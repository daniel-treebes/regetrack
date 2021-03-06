<?php



/**
 * This class defines the structure of the 'bodegas' table.
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
class BodegasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.BodegasTableMap';

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
        $this->setName('bodegas');
        $this->setPhpName('Bodegas');
        $this->setClassname('Bodegas');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 255, null);
        $this->addForeignKey('cg', 'Cg', 'INTEGER', 'cargadores', 'idcargadores', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cargadores', 'Cargadores', RelationMap::MANY_TO_ONE, array('cg' => 'idcargadores', ), 'CASCADE', 'CASCADE');
        $this->addRelation('UsoBateriasBodega', 'UsoBateriasBodega', RelationMap::ONE_TO_MANY, array('id' => 'bg', ), null, null, 'UsoBateriasBodegas');
    } // buildRelations()

} // BodegasTableMap
