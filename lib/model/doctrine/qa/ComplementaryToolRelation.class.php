<?php

/**
 * ComplementaryToolRelation
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    trc
 * @subpackage model
 * @author     Julian Dumez <julianx.dumez@intel.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ComplementaryToolRelation extends PluginComplementaryToolRelation
{
	/**
	 * Slugify the feature name.
	 *
	 * @return The slugified name.
	 */
	public function getSlug()
	{
		return MiscUtils::slugify($this->getLabel());
	}

	public function getResultsCounts($sessionId)
	{
		$qa_generic = sfConfig::get("app_table_qa_generic");

		$tableName = Doctrine_Core::getTable("TableName")->findOneByName("test_result");

		$query = Doctrine_Manager::getInstance()->getCurrentConnection();
		$result = $query->execute("
                        SELECT COUNT(tr.id) AS total,
                                COUNT(CASE WHEN tr.decision_criteria_id = -1 THEN tr.decision_criteria_id END) AS tests_passed,
                                COUNT(CASE WHEN tr.decision_criteria_id = -2 THEN tr.decision_criteria_id END) AS tests_failed,
                                COUNT(CASE WHEN tr.decision_criteria_id = -3 THEN tr.decision_criteria_id END) AS tests_blocked
                        FROM ".$qa_generic.".complementary_tool_relation ctr
                                JOIN ".$qa_generic.".test_result tr ON tr.id = ctr.table_entry_id
                        WHERE ctr.table_name_id = ".$tableName->getId()."
                                AND ctr.category = 1
                                AND tr.test_session_id = ".$sessionId."
                                AND ctr.label = '".$this->getLabel()."'
                        GROUP BY ctr.label
                        ORDER BY ctr.label ASC
                ");
		$array = $result->fetchAll();

		return $array[0];
	}
}
