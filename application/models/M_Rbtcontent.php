<?php


class M_Rbtcontent extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_prbt()
	{
		$this->db->select('*');
		$this->db->from('p_rbt');
		$result = $this->db->get();
		return $result;
	}

	function get_operator($result)
	{
		$penciptaid = $result;
		$this->db->select('*');
		$this->db->from('p_operator');
		$this->db->where('penciptaId',$penciptaid);
		return $this->db->get()->result();
	}
	function get_partner($result)
	{
		$this->db->select('namaPartner');
		$this->db->from('p_partner');
		$this->db->where('id',$result);
		$query = $this->db->get();
		return $query->row('namaPartner');
	}
	function get_pencipta($result)
	{
		$this->db->select('namaPencipta');
		$this->db->from('p_pencipta');
		$this->db->where('id',$result);
		$query = $this->db->get();
		return $query->row('namaPencipta');
	}
	function get_kode($result)
	{
		$operator_id = $result->partnerId;
		$rbt_id = $result->rbtId;
		$this->db->select('*');
		$this->db->from('p_partner');
		$this->db->where('operatorId',$operator_id);
		$this->db->where('rbtId',$rbt_id);

		return $this->db->get()->result();
	}


}
