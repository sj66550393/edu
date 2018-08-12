<?php
/*
 * Created on 2011-11-21
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 对地区进行操作
 */
class subject_exam
{
	public $G;

	public function __construct(&$G)
	{
		$this->G = $G;
		$this->sql = $this->G->make('sql');
		$this->pdosql = $this->G->make('pdosql');
		$this->db = $this->G->make('pepdo');
		$this->pg = $this->G->make('pg');
		$this->ev = $this->G->make('ev');
	}

	//根据参数查询科目列表
	public function getSubjectListByArgs($args)
	{
            echo "getSectionListByArgs";
		$data = array(false,'subject',$args);
		$sql = $this->pdosql->makeSelect($data);
		return $this->db->fetchAll($sql,'subjectid');
	}
	
}

?>
