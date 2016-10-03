<?php



/**
 * This class defines the structure of the 'uso_baterias_montacargas' table.
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
class UsoBateriasMontacargasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.UsoBateriasMontacargasTableMap';

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
        $this->setName('uso_baterias_montacargas');
        $this->setPhpName('UsoBateriasMontacargas');
        $this->setClassname('UsoBateriasMontacargas');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('mc', 'Mc', 'INTEGER', 'montacargas', 'idmontacargas', true, null, null);
        $this->addForeignKey('bt', 'Bt', 'INTEGER', 'baterias', 'idbaterias', true, null, null);
        $this->addColumn('fecha_entrada', 'FechaEntrada', 'TIMESTAMP', true, null, null);
        $this->addColumn('fecha_salida', 'FechaSalida', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('usuario_entrada', 'UsuarioEntrada', 'INTEGER', 'uc_users', 'id', false, null, null);
        $this->addForeignKey('usuario_salida', 'UsuarioSalida', 'INTEGER', 'uc_users', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Baterias', 'Baterias', RelationMap::MANY_TO_ONE, array('bt' => 'idbaterias', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Montacargas', 'Montacargas', RelationMap::MANY_TO_ONE, array('mc' => 'idmontacargas', ), null, null);
        $this->addRelation('UcUsersRelatedByUsuarioEntrada', 'UcUsers', RelationMap::MANY_TO_ONE, array('usuario_entrada' => 'id', ), null, null);
        $this->addRelation('UcUsersRelatedByUsuarioSalida', 'UcUsers', RelationMap::MANY_TO_ONE, array('usuario_salida' => 'id', ), null, null);
    } // buildRelations()

} // UsoBateriasMontacargasTableMap
