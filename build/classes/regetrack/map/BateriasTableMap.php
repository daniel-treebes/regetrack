<?php



/**
 * This class defines the structure of the 'baterias' table.
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
class BateriasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.BateriasTableMap';

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
        $this->setName('baterias');
        $this->setPhpName('Baterias');
        $this->setClassname('Baterias');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('tipo', 'Tipo', 'INTEGER', true, null, null);
        $this->addColumn('num_serie', 'NumSerie', 'VARCHAR', true, 255, null);
        $this->addColumn('ciclos_mant', 'CiclosMant', 'INTEGER', true, null, 120);
        $this->addColumn('ciclos_iniciales', 'CiclosIniciales', 'INTEGER', true, 255, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // BateriasTableMap
