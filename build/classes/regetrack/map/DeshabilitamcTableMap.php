<?php



/**
 * This class defines the structure of the 'deshabilitamc' table.
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
class DeshabilitamcTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.DeshabilitamcTableMap';

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
        $this->setName('deshabilitamc');
        $this->setPhpName('Deshabilitamc');
        $this->setClassname('Deshabilitamc');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('idmontacargas', 'Idmontacargas', 'INTEGER', 'montacargas', 'idmontacargas', true, null, null);
        $this->addColumn('motivo', 'Motivo', 'LONGVARCHAR', true, null, null);
        $this->addColumn('fecha_entrada', 'FechaEntrada', 'TIMESTAMP', true, null, null);
        $this->addColumn('fecha_salida', 'FechaSalida', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('usuario_entrada', 'UsuarioEntrada', 'INTEGER', 'uc_users', 'id', false, null, null);
        $this->addForeignKey('usuario_salida', 'UsuarioSalida', 'INTEGER', 'uc_users', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Montacargas', 'Montacargas', RelationMap::MANY_TO_ONE, array('idmontacargas' => 'idmontacargas', ), 'CASCADE', 'CASCADE');
        $this->addRelation('UcUsersRelatedByUsuarioEntrada', 'UcUsers', RelationMap::MANY_TO_ONE, array('usuario_entrada' => 'id', ), null, null);
        $this->addRelation('UcUsersRelatedByUsuarioSalida', 'UcUsers', RelationMap::MANY_TO_ONE, array('usuario_salida' => 'id', ), null, null);
    } // buildRelations()

} // DeshabilitamcTableMap
