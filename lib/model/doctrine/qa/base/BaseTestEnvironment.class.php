<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TestEnvironment', 'qa_generic');

/**
 * BaseTestEnvironment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property text $description
 * @property string $cpu
 * @property string $board
 * @property string $gpu
 * @property text $other_hardware
 * @property string $name_slug
 * @property Doctrine_Collection $TestEnvironments
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getName()             Returns the current record's "name" value
 * @method text                getDescription()      Returns the current record's "description" value
 * @method string              getCpu()              Returns the current record's "cpu" value
 * @method string              getBoard()            Returns the current record's "board" value
 * @method string              getGpu()              Returns the current record's "gpu" value
 * @method text                getOtherHardware()    Returns the current record's "other_hardware" value
 * @method string              getNameSlug()         Returns the current record's "name_slug" value
 * @method Doctrine_Collection getTestEnvironments() Returns the current record's "TestEnvironments" collection
 * @method TestEnvironment     setId()               Sets the current record's "id" value
 * @method TestEnvironment     setName()             Sets the current record's "name" value
 * @method TestEnvironment     setDescription()      Sets the current record's "description" value
 * @method TestEnvironment     setCpu()              Sets the current record's "cpu" value
 * @method TestEnvironment     setBoard()            Sets the current record's "board" value
 * @method TestEnvironment     setGpu()              Sets the current record's "gpu" value
 * @method TestEnvironment     setOtherHardware()    Sets the current record's "other_hardware" value
 * @method TestEnvironment     setNameSlug()         Sets the current record's "name_slug" value
 * @method TestEnvironment     setTestEnvironments() Sets the current record's "TestEnvironments" collection
 * 
 * @package    trc
 * @subpackage model
 * @author     Julian Dumez <julianx.dumez@intel.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTestEnvironment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('test_environment');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('cpu', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('board', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('gpu', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('other_hardware', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('name_slug', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));

        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Configuration as TestEnvironments', array(
             'local' => 'id',
             'foreign' => 'test_environment_id'));
    }
}