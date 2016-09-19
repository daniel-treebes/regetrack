<?php



/**
 * This class defines the structure of the 'deshabilitabt' table.
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
class DeshabilitabtTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.DeshabilitabtTableMap';

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
        $this->setName('deshabilitabt');
        $this->setPhpName('Deshabilitabt');
        $this->setClassname('Deshabilitabt');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('bt', 'Bt', 'INTEGER', true, null, null);
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
    } // buildRelations()

} // DeshabilitabtTableMap
