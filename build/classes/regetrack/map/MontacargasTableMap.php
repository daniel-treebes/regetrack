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
        $this->addPrimaryKey('idmontacargas', 'Idmontacargas', 'INTEGER', true, null, null);
        $this->addForeignKey('idsucursal', 'Idsucursal', 'INTEGER', 'sucursal', 'idsucursal', true, null, null);
        $this->addColumn('montacargas_modelo', 'MontacargasModelo', 'VARCHAR', true, 45, null);
        $this->addColumn('montacargas_marca', 'MontacargasMarca', 'VARCHAR', true, 45, null);
        $this->addColumn('montacargas_c', 'MontacargasC', 'VARCHAR', false, 45, null);
        $this->addColumn('montacargas_k', 'MontacargasK', 'VARCHAR', false, 45, null);
        $this->addColumn('montacargas_p', 'MontacargasP', 'VARCHAR', false, 45, null);
        $this->addColumn('montacargas_t', 'MontacargasT', 'VARCHAR', false, 45, null);
        $this->addColumn('montacargas_e', 'MontacargasE', 'VARCHAR', false, 45, null);
        $this->addColumn('montacargas_volts', 'MontacargasVolts', 'INTEGER', false, null, null);
        $this->addColumn('montacargas_amperaje', 'MontacargasAmperaje', 'INTEGER', false, null, null);
        $this->addColumn('montacargas_nombre', 'MontacargasNombre', 'VARCHAR', false, 255, null);
        $this->addColumn('montacargas_numserie', 'MontacargasNumserie', 'VARCHAR', false, 255, null);
        $this->addColumn('montacargas_comprador', 'MontacargasComprador', 'VARCHAR', false, 45, null);
        $this->addColumn('montacargas_ciclosmant', 'MontacargasCiclosmant', 'INTEGER', false, null, null);
        $this->addColumn('montacargas_ciclosiniciales', 'MontacargasCiclosiniciales', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Sucursal', 'Sucursal', RelationMap::MANY_TO_ONE, array('idsucursal' => 'idsucursal', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Deshabilitamc', 'Deshabilitamc', RelationMap::ONE_TO_MANY, array('idmontacargas' => 'idmontacargas', ), 'CASCADE', 'CASCADE', 'Deshabilitamcs');
        $this->addRelation('UsoBateriasMontacargas', 'UsoBateriasMontacargas', RelationMap::ONE_TO_MANY, array('idmontacargas' => 'mc', ), null, null, 'UsoBateriasMontacargass');
    } // buildRelations()

} // MontacargasTableMap
