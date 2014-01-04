<?php



/**
 * This class defines the structure of the 'dataset' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sat Dec 14 11:43:01 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class DatasetTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.DatasetTableMap';

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
        $this->setName('dataset');
        $this->setPhpName('Dataset');
        $this->setClassname('Dataset');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('DATASET', 'Dataset', 'VARCHAR', true, 255, null);
        $this->addColumn('URL', 'Url', 'LONGVARCHAR', true, null, null);
        $this->addColumn('DESCRIPCION', 'Descripcion', 'LONGVARCHAR', false, null, null);
        $this->addColumn('TAGS', 'Tags', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('FORMATO_ID', 'FormatoId', 'INTEGER', 'formato', 'ID', false, null, null);
        $this->addForeignKey('COMPRESION_ID', 'CompresionId', 'INTEGER', 'compresion', 'ID', false, null, null);
        $this->addColumn('CABECERAS', 'Cabeceras', 'LONGVARCHAR', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Formato', 'Formato', RelationMap::MANY_TO_ONE, array('formato_id' => 'id', ), null, null);
        $this->addRelation('Compresion', 'Compresion', RelationMap::MANY_TO_ONE, array('compresion_id' => 'id', ), null, null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', ),
        );
    } // getBehaviors()

} // DatasetTableMap
