<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Configuration', 'qa_generic');

/**
 * BaseConfiguration
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $image_id
 * @property integer $test_environment_id
 * @property integer $project_to_product_id
 * @property Image $Image
 * @property TestEnvironment $TestEnvironment
 * @property ProjectToProduct $ProjectToProduct
 * @property Doctrine_Collection $Configurations
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method integer             getImageId()               Returns the current record's "image_id" value
 * @method integer             getTestEnvironmentId()     Returns the current record's "test_environment_id" value
 * @method integer             getProjectToProductId()    Returns the current record's "project_to_product_id" value
 * @method Image               getImage()                 Returns the current record's "Image" value
 * @method TestEnvironment     getTestEnvironment()       Returns the current record's "TestEnvironment" value
 * @method ProjectToProduct    getProjectToProduct()      Returns the current record's "ProjectToProduct" value
 * @method Doctrine_Collection getConfigurations()        Returns the current record's "Configurations" collection
 * @method Configuration       setId()                    Sets the current record's "id" value
 * @method Configuration       setImageId()               Sets the current record's "image_id" value
 * @method Configuration       setTestEnvironmentId()     Sets the current record's "test_environment_id" value
 * @method Configuration       setProjectToProductId()    Sets the current record's "project_to_product_id" value
 * @method Configuration       setImage()                 Sets the current record's "Image" value
 * @method Configuration       setTestEnvironment()       Sets the current record's "TestEnvironment" value
 * @method Configuration       setProjectToProduct()      Sets the current record's "ProjectToProduct" value
 * @method Configuration       setConfigurations()        Sets the current record's "Configurations" collection
 * 
 * @package    trc
 * @subpackage model
 * @author     Julian Dumez <julianx.dumez@intel.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConfiguration extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('configuration');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('image_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('test_environment_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('project_to_product_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));


        $this->index('fk_configuration_image1', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
        $this->index('fk_configuration_test_environment1', array(
             'fields' => 
             array(
              0 => 'test_environment_id',
             ),
             ));
        $this->index('fk_configuration_p2p1', array(
             'fields' => 
             array(
              0 => 'project_to_product_id',
             ),
             ));
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Image', array(
             'local' => 'image_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasOne('TestEnvironment', array(
             'local' => 'test_environment_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasOne('ProjectToProduct', array(
             'local' => 'project_to_product_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasMany('TestSession as Configurations', array(
             'local' => 'id',
             'foreign' => 'configuration_id'));
    }
}