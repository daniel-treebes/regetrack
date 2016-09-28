<?php



/**
 * This class defines the structure of the 'cargadores_baterias' table.
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
class CargadoresBateriasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'regetrack.map.CargadoresBateriasTableMap';

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
        $this->setName('cargadores_baterias');
        $this->setPhpName('CargadoresBaterias');
        $this->setClassname('CargadoresBaterias');
        $this->setPackage('regetrack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idcargadores_baterias', 'IdcargadoresBaterias', 'INTEGER', true, null, null);
        $this->addForeignKey('idcargadores', 'Idcargadores', 'INTEGER', 'cargadores', 'idcargadores', true, null, null);
        $this->addForeignKey('idbaterias', 'Idbaterias', 'INTEGER', 'baterias', 'idbaterias', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cargadores', 'Cargadores', RelationMap::MANY_TO_ONE, array('idcargadores' => 'idcargadores', ), null, null);
        $this->addRelation('Baterias', 'Baterias', RelationMap::MANY_TO_ONE, array('idbaterias' => 'idbaterias', ), null, null);
    } // buildRelations()

} // CargadoresBateriasTableMap
