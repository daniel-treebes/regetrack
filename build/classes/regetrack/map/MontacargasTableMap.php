<?php



/**
 * This class defines the structure of the 'montacargas' table.
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
class MontacargasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.MontacargasTableMap';

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
        $this->setName('montacargas');
        $this->setPhpName('Montacargas');
        $this->setClassname('Montacargas');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 45, null);
        $this->addColumn('modelo', 'Modelo', 'VARCHAR', true, 45, null);
        $this->addColumn('tipo', 'Tipo', 'VARCHAR', true, 45, null);
        $this->addColumn('ciclos_mant', 'CiclosMant', 'INTEGER', false, null, null);
        $this->addColumn('ciclos_iniciales', 'CiclosIniciales', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // MontacargasTableMap
