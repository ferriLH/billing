<?php


class M_Rbtsubmit extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}

	function get_operator()
	{
		$this->db->select('*');
		$this->db->from('p_operator');
		$this->db->order_by('operator');
		return $this->db->get()->result();

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

	function get_traffic($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->result();
	}

	function get_price($month,$result)
	{
		$this->db->select('*');
		$this->db->from('p_price');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->result();
	}
}
