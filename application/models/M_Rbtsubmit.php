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
		return $this->db->get();

	}
	function get_rev($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_sum');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query=$this->db->get();
		return $query->row('sum');
	}

	function get_total1($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->row('n1');
	}
	function get_total2($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->row('n2');
	}
	function get_total3($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->row('n3');
	}
	function get_total4($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->row('n4');
	}
	function get_total5($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->row('n5');
	}
	function get_total6($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->row('n6');
	}
	function get_total7($month,$result)
	{
		$this->db->select('*');
		$this->db->from('t_traffic');
		$this->db->where('month',$month);
		$this->db->where('operatorId',$result);
		$query = $this->db->get();
		return $query->row('n7');
	}

}
