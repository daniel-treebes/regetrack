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
        $this->addPrimaryKey('idbaterias', 'Idbaterias', 'INTEGER', true, null, null);
        $this->addForeignKey('idsucursal', 'Idsucursal', 'INTEGER', 'sucursal', 'idsucursal', true, null, null);
        $this->addColumn('baterias_modelo', 'BateriasModelo', 'VARCHAR', true, 255, null);
        $this->addColumn('baterias_marca', 'BateriasMarca', 'VARCHAR', false, 45, null);
        $this->addColumn('baterias_c', 'BateriasC', 'VARCHAR', false, 45, null);
        $this->addColumn('baterias_k', 'BateriasK', 'VARCHAR', false, 45, null);
        $this->addColumn('baterias_p', 'BateriasP', 'VARCHAR', false, 45, null);
        $this->addColumn('baterias_t', 'BateriasT', 'VARCHAR', false, 45, null);
        $this->addColumn('baterias_e', 'BateriasE', 'VARCHAR', false, 45, null);
        $this->addColumn('baterias_volts', 'BateriasVolts', 'INTEGER', false, null, null);
        $this->addColumn('baterias_amperaje', 'BateriasAmperaje', 'INTEGER', false, null, null);
        $this->addColumn('baterias_comprador', 'BateriasComprador', 'VARCHAR', false, 255, null);
        $this->addColumn('baterias_nombre', 'BateriasNombre', 'VARCHAR', false, 255, null);
        $this->addColumn('baterias_numserie', 'BateriasNumserie', 'VARCHAR', false, 255, null);
        $this->addColumn('baterias_ciclosmant', 'BateriasCiclosmant', 'INTEGER', false, null, null);
        $this->addColumn('baterias_ciclosiniciales', 'BateriasCiclosiniciales', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Sucursal', 'Sucursal', RelationMap::MANY_TO_ONE, array('idsucursal' => 'idsucursal', ), 'CASCADE', 'CASCADE');
        $this->addRelation('CargadoresBaterias', 'CargadoresBaterias', RelationMap::ONE_TO_MANY, array('idbaterias' => 'idbaterias', ), null, null, 'CargadoresBateriass');
        $this->addRelation('Deshabilitabt', 'Deshabilitabt', RelationMap::ONE_TO_MANY, array('idbaterias' => 'bt', ), 'CASCADE', 'CASCADE', 'Deshabilitabts');
        $this->addRelation('MontacargasBaterias', 'MontacargasBaterias', RelationMap::ONE_TO_MANY, array('idbaterias' => 'idbaterias', ), null, null, 'MontacargasBateriass');
        $this->addRelation('UsoBateriasBodega', 'UsoBateriasBodega', RelationMap::ONE_TO_MANY, array('idbaterias' => 'bt', ), 'CASCADE', 'CASCADE', 'UsoBateriasBodegas');
        $this->addRelation('UsoBateriasMontacargas', 'UsoBateriasMontacargas', RelationMap::ONE_TO_MANY, array('idbaterias' => 'bt', ), 'CASCADE', 'CASCADE', 'UsoBateriasMontacargass');
    } // buildRelations()

} // BateriasTableMap
