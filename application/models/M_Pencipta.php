<?php
class M_Pencipta extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function show_pencipta(){
    	$this->db->select("id,namaPencipta,noTelp,noFax,bank,noAcc");
    	$this->db->from('p_pencipta');
		$this->db->where('type',1);
		return $this->db->get();
    }
	function add_new_pencipta($data)
	{
		$this->db->insert('p_pencipta',$data);
	}
	function setDelete($id){
		$data = array(
			'type'=>0,
		);
		$this->db->where('id',$id);
		$this->db->update('p_pencipta',$data);
	}
	function setDeleteUser($id){
		$data = array(
			'status'=>0,
		);
		$this->db->where('idPencipta',$id);
		$this->db->update('t_user',$data);
	}
	function edit($id)
	{
		$this->db->select("*");
		$this->db->from("p_pencipta");
		$this->db->where("id", $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	function editUser($id)
	{
		$this->db->select("email");
		$this->db->from("t_user");
		$this->db->where("idPencipta", $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	function update($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('p_pencipta',$data);
	}
	function updateUser($id,$data)
	{
		$this->db->where('idPencipta',$id);
		$this->db->update('t_user',$data);
	}
	function getNewIdPencipta(){
		$this->db->select_max("id");
		$this->db->from('p_pencipta');
		$this->db->where('type',1);
		$get =  $this->db->get();
		return $get->result_array();
	}
	function add_new_user($data)
	{
		$this->db->insert('t_user',$data);
	}
}
