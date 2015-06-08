<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('DbInfo', 'qa_generic');

/**
 * BaseDbInfo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $version
 * @property text $comment
 * @property string $core_db_name
 * @property integer $user_id
 * @property timestamp $changed_at
 * 
 * @method integer   getVersion()      Returns the current record's "version" value
 * @method text      getComment()      Returns the current record's "comment" value
 * @method string    getCoreDbName()   Returns the current record's "core_db_name" value
 * @method integer   getUserId()       Returns the current record's "user_id" value
 * @method timestamp getChangedAt()    Returns the current record's "changed_at" value
 * @method DbInfo    setVersion()      Sets the current record's "version" value
 * @method DbInfo    setComment()      Sets the current record's "comment" value
 * @method DbInfo    setCoreDbName()   Sets the current record's "core_db_name" value
 * @method DbInfo    setUserId()       Sets the current record's "user_id" value
 * @method DbInfo    setChangedAt()    Sets the current record's "changed_at" value
 * 
 * @package    trc
 * @subpackage model
 * @author     Julian Dumez <julianx.dumez@intel.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDbInfo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('db_info');
        $this->hasColumn('version', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('comment', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('core_db_name', 'string', 45, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 45,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('changed_at', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));

        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}