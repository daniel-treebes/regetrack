<?php



/**
 * This class defines the structure of the 'empresa' table.
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
class EmpresaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.EmpresaTableMap';

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
        $this->setName('empresa');
        $this->setPhpName('Empresa');
        $this->setClassname('Empresa');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idempresa', 'Idempresa', 'INTEGER', true, null, null);
        $this->addForeignKey('idusuario', 'Idusuario', 'INTEGER', 'uc_users', 'id', true, null, null);
        $this->addColumn('empresa_nombre', 'EmpresaNombre', 'VARCHAR', true, 255, null);
        $this->addColumn('empresa_numsucursales', 'EmpresaNumsucursales', 'INTEGER', true, null, null);
        $this->addColumn('empresa_suscripcioninicio', 'EmpresaSuscripcioninicio', 'INTEGER', true, null, null);
        $this->addColumn('empresa_suscripcionfin', 'EmpresaSuscripcionfin', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UcUsers', 'UcUsers', RelationMap::MANY_TO_ONE, array('idusuario' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Sucursal', 'Sucursal', RelationMap::ONE_TO_MANY, array('idempresa' => 'idempresa', ), 'CASCADE', 'CASCADE', 'Sucursals');
    } // buildRelations()

} // EmpresaTableMap
