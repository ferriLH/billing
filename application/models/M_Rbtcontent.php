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
		$this->db->order_by('judul','ASC');
		$result = $this->db->get()->result();
		return $result;
	}

	function get_operator($result)
	{
		$penciptaid = $result->penciptaId;
		$this->db->select('*');
		$this->db->from('p_operator');
		$this->db->where('penciptaId',$penciptaid);
		return $this->db->get()->result();
	}
	function get_partner($result)
	{
		$partnerid = $result->partnerId;
		$this->db->select('*');
		$this->db->from('p_partner');
		$this->db->where('partnerId',$partnerid);
		return $this->db->get()->result();
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
