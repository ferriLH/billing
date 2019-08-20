<?php


class M_Rbttsel extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}


	function get_operator()
	{
		$this->db->select('*');
		$this->db->from('p_operator');
		$this->db->where('id',1);
		return $this->db->get()->result();
	}

	function get_traffic_tsel($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic_tsel');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->result();
	}

	function get_rev($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_sum');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query=$this->db->get();
		return $query->result();
	}

	function get_price($month,$result)
	{
		$this->db->select('*');
		$this->db->from('p_price_tsel');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->result();
	}
}
