<?php


class M_Sharepencipta extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}
	function getPencipta(){
		$this->db->select("id,namaPencipta");
		$this->db->from('p_pencipta');
		$this->db->where('type',1);
		$query = $this->db->get();
		return $query->result();
	}

}
