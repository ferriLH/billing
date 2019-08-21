<?php


class M_Sharepartner extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}
	function getPartner(){
		$this->db->select("id,namaPartner");
		$this->db->from('p_partner');
		$this->db->where('type',1);
		$query = $this->db->get();
		return $query->result();
	}

}
