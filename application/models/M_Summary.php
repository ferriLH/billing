<?php


class M_Summary extends CI_Model
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

	function get_summary($op,$month)
	{
		$this->db->select('*');
		$this->db->from('t_sum');
		$this->db->where('operatorId',$op);
		$this->db->where('month',$month);
		$this->db->where('submit',1);
		return $this->db->get()->result();
	}

	function get_sh_partner($op,$month)
	{
		$this->db->select('*');
		$this->db->from('t_shpartner');
		$this->db->where('operatorId',$op);
		$this->db->where('month', $month);
		return $this->db->get()->result();
	}
	function get_sh_pencipta($op,$month)
	{
		$this->db->select('*');
		$this->db->from('t_shpencipta');
		$this->db->where('operatorId',$op);
		$this->db->where('month', $month);
		return $this->db->get()->result();
	}
	function get_sh_rekap_partner($op,$month)
	{
		$this->db->select('*');
		$this->db->from('rekap_revenue_partner');
		$this->db->where('operatorId',$op);
		$this->db->where('month', $month);
		return $this->db->get()->result();
	}
	function get_sh_rekap_pencipta($op,$month)
	{
		$this->db->select('*');
		$this->db->from('rekap_revenue_pencipta');
		$this->db->where('operatorId',$op);
		$this->db->where('month', $month);
		return $this->db->get()->result();
	}


}
