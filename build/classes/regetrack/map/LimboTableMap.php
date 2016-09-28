<?php



/**
 * This class defines the structure of the 'limbo' table.
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
class LimboTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.LimboTableMap';

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
        $this->setName('limbo');
        $this->setPhpName('Limbo');
        $this->setClassname('Limbo');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('bt', 'Bt', 'INTEGER', 'baterias', 'idbaterias', true, null, null);
        $this->addColumn('motivo', 'Motivo', 'LONGVARCHAR', true, null, null);
        $this->addColumn('fecha_entrada', 'FechaEntrada', 'TIMESTAMP', true, null, null);
        $this->addColumn('fecha_salida', 'FechaSalida', 'TIMESTAMP', true, null, null);
        $this->addColumn('usuario_entrada', 'UsuarioEntrada', 'INTEGER', false, null, null);
        $this->addColumn('usuario_salida', 'UsuarioSalida', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Baterias', 'Baterias', RelationMap::MANY_TO_ONE, array('bt' => 'idbaterias', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // LimboTableMap
