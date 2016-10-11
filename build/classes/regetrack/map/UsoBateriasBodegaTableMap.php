<?php



/**
 * This class defines the structure of the 'uso_baterias_bodega' table.
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
class UsoBateriasBodegaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.UsoBateriasBodegaTableMap';

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
        $this->setName('uso_baterias_bodega');
        $this->setPhpName('UsoBateriasBodega');
        $this->setClassname('UsoBateriasBodega');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('bg', 'Bg', 'INTEGER', 'bodegas', 'id', true, null, null);
        $this->addForeignKey('bt', 'Bt', 'INTEGER', 'baterias', 'idbaterias', true, null, null);
        $this->addColumn('fecha_entrada', 'FechaEntrada', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('fecha_carga', 'FechaCarga', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('fecha_descanso', 'FechaDescanso', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('fecha_salida', 'FechaSalida', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('usuario_entrada', 'UsuarioEntrada', 'INTEGER', false, null, null);
        $this->addColumn('usuario_carga', 'UsuarioCarga', 'INTEGER', false, null, null);
        $this->addColumn('usuario_descanso', 'UsuarioDescanso', 'INTEGER', false, null, null);
        $this->addColumn('usuario_salida', 'UsuarioSalida', 'INTEGER', false, null, null);
        $this->addColumn('fecha_original', 'FechaOriginal', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Bodegas', 'Bodegas', RelationMap::MANY_TO_ONE, array('bg' => 'id', ), null, null);
        $this->addRelation('Baterias', 'Baterias', RelationMap::MANY_TO_ONE, array('bt' => 'idbaterias', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // UsoBateriasBodegaTableMap
