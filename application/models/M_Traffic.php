<?php


class M_Traffic extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_judul()
	{
		$this->db->select('*');
		$this->db->from('p_rbt');
		$this->db->order_by('judul','ASC');
		$result = $this->db->get();
		return $result;
	}

	function get_operator()
	{
		$this->db->select('*');
		$this->db->from('p_operator');
		$this->db->order_by('operator');
		return $this->db->get()->result();
	}

	function get_total1($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('rbtId',$result);
		$this->db->limit('1000');
		$query = $this->db->get();
		return $query->row('n1');
	}
	function get_total2($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('rbtId',$result);
		$this->db->limit('1000');
		$query = $this->db->get();
		return $query->row('n2');
	}
	function get_total3($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('rbtId',$result);
		$this->db->limit('1000');
		$query = $this->db->get();
		return $query->row('n3');
	}
}
