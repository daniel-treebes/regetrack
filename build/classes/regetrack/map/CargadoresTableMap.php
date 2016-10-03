<?php



/**
 * This class defines the structure of the 'cargadores' table.
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
class CargadoresTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.CargadoresTableMap';

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
        $this->setName('cargadores');
        $this->setPhpName('Cargadores');
        $this->setClassname('Cargadores');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idcargadores', 'Idcargadores', 'INTEGER', true, null, null);
        $this->addForeignKey('idsucursal', 'Idsucursal', 'INTEGER', 'sucursal', 'idsucursal', true, null, null);
        $this->addColumn('cargadores_modelo', 'CargadoresModelo', 'VARCHAR', true, 255, null);
        $this->addColumn('cargadores_marca', 'CargadoresMarca', 'VARCHAR', true, 255, null);
        $this->addColumn('cargadores_e', 'CargadoresE', 'VARCHAR', false, 45, null);
        $this->addColumn('cargadores_volts', 'CargadoresVolts', 'INTEGER', false, null, null);
        $this->addColumn('cargadores_amperaje', 'CargadoresAmperaje', 'INTEGER', false, null, null);
        $this->addColumn('cargadores_comprador', 'CargadoresComprador', 'VARCHAR', false, 255, null);
        $this->addColumn('cargadores_nombre', 'CargadoresNombre', 'VARCHAR', false, 255, null);
        $this->addColumn('cargadores_numserie', 'CargadoresNumserie', 'VARCHAR', false, 45, null);
        $this->addColumn('cargadores_tipo', 'CargadoresTipo', 'CHAR', true, null, 'Cargador');
        $this->getColumn('cargadores_tipo', false)->setValueSet(array (
  0 => 'Cargador',
  1 => 'Bodega',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Sucursal', 'Sucursal', RelationMap::MANY_TO_ONE, array('idsucursal' => 'idsucursal', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Bodegas', 'Bodegas', RelationMap::ONE_TO_MANY, array('idcargadores' => 'cg', ), 'CASCADE', 'CASCADE', 'Bodegass');
        $this->addRelation('CargadoresBaterias', 'CargadoresBaterias', RelationMap::ONE_TO_MANY, array('idcargadores' => 'idcargadores', ), null, null, 'CargadoresBateriass');
        $this->addRelation('Deshabilitacg', 'Deshabilitacg', RelationMap::ONE_TO_MANY, array('idcargadores' => 'cg', ), 'CASCADE', 'CASCADE', 'Deshabilitacgs');
    } // buildRelations()

} // CargadoresTableMap
