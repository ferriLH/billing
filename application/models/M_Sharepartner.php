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
	function getPartner1($id){
		$this->db->select("*");
		$this->db->from('p_partner');
		$this->db->where('type',1);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	function getRBT($id){
		$this->db->select("*");
		$this->db->from('p_rbt');
		$this->db->where('partnerId',$id);
		$query = $this->db->get();
		return $query->result_array();
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
	function getTraf($id,$month,$op){
		$this->db->select("*");
		$this->db->from('t_traffic_final');
		$this->db->where('rbtId',$id);
		$this->db->where('month',$month);
		$this->db->where('operatorId',$op);
		$query = $this->db->get();
		return $query->result();
	}
}
