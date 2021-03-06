<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Project', 'qa_generic');

/**
 * BaseProject
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property text $description
 * @property integer $user_id
 * @property timestamp $created_at
 * @property integer $status
 * @property integer $security_level
 * @property string $name_slug
 * @property Doctrine_Collection $Projects
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method string              getName()           Returns the current record's "name" value
 * @method text                getDescription()    Returns the current record's "description" value
 * @method integer             getUserId()         Returns the current record's "user_id" value
 * @method timestamp           getCreatedAt()      Returns the current record's "created_at" value
 * @method integer             getStatus()         Returns the current record's "status" value
 * @method integer             getSecurityLevel()  Returns the current record's "security_level" value
 * @method string              getNameSlug()       Returns the current record's "name_slug" value
 * @method Doctrine_Collection getProjects()       Returns the current record's "Projects" collection
 * @method Project             setId()             Sets the current record's "id" value
 * @method Project             setName()           Sets the current record's "name" value
 * @method Project             setDescription()    Sets the current record's "description" value
 * @method Project             setUserId()         Sets the current record's "user_id" value
 * @method Project             setCreatedAt()      Sets the current record's "created_at" value
 * @method Project             setStatus()         Sets the current record's "status" value
 * @method Project             setSecurityLevel()  Sets the current record's "security_level" value
 * @method Project             setNameSlug()       Sets the current record's "name_slug" value
 * @method Project             setProjects()       Sets the current record's "Projects" collection
 * 
 * @package    trc
 * @subpackage model
 * @author     Julian Dumez <julianx.dumez@intel.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProject extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('project');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('description', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('created_at', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('status', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('security_level', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 1,
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
        $this->hasMany('ProjectToProduct as Projects', array(
             'local' => 'id',
             'foreign' => 'project_id'));
    }
}