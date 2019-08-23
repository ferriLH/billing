<?php


class M_Traffic extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_judul()
	{
		$this->db->select('id,judul,artis');
		$this->db->from('p_rbt');
		$this->db->order_by('id','ASC');
		$this->db->limit(500);
		$result = $this->db->get();
		return $result->result();
	}

	function get_operator()
	{
		$this->db->select('*');
		$this->db->from('p_operator');
		$this->db->order_by('operator');
		return $this->db->get()->result();
	}

	function get_kode($op,$rbtid)
	{
		$this->db->select('kode');
		$this->db->from('p_kode');
		$this->db->where('operatorId',$op);
		$this->db->where('rbtId',$rbtid);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_total($month,$result,$opid)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('rbtId',$result);
		$this->db->where('operatorId',$opid);
		//$this->db->limit(500);
		$query = $this->db->get();
		return $query->result_array();
	}
}
