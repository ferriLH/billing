<?php
class M_Partner extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function show_partner(){
    	$this->db->select("id,namaPartner,noTelp,noFax,bank,noAcc");
    	$this->db->from('p_partner');
		$this->db->where('type',1);
		return $this->db->get();
    }

    function get_partner($id)
	{
		$this->db->select('*');
		$this->db->from('p_partner');
		$this->db->where('id',$id);
		return $this->db->get()->result();
	}


    function add_new_partner($data)
    {
        $this->db->insert('p_partner',$data);
    }
    function edit($id)
    {
        $this->db->select("*");
        $this->db->from("p_partner");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function editUser($id)
    {
        $this->db->select("email");
        $this->db->from("t_user");
        $this->db->where("idPartner", $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function update($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('p_partner',$data);
    }
    function updateUser($id,$data)
    {
        $this->db->where('idPartner',$id);
        $this->db->update('t_user',$data);
    }
	function setDelete($id){
		$data = array(
			'type'=>0,
		);
		$this->db->where('id',$id);
		$this->db->update('p_partner',$data);
	}
	function setDeleteUser($id){
		$data = array(
			'status'=>0,
		);
		$this->db->where('idPartner',$id);
		$this->db->update('t_user',$data);
	}
	function getNewIdPartner(){
		$this->db->select_max("id");
		$this->db->from('p_partner');
		$this->db->where('type',1);
		$get =  $this->db->get();
		return $get->result_array();
	}
	function add_new_user($data)
	{
		$this->db->insert('t_user',$data);
	}

	function get_prbt($id)
	{
		$this->db->select('*');
		$this->db->from('p_rbt');
		$this->db->where('partnerId',$id);
		$this->db->where('judul !=','null');
		return $this->db->get()->result();
	}

	function get_pencipta($id)
	{
		$this->db->select('*');
		$this->db->from('p_pencipta');
		$this->db->where('id',$id);
		return $this->db->get()->result();
	}

	function get_alias($id)
	{
		$this->db->select('*');
		$this->db->from('t_alias');
		$this->db->where('id_alias',$id);
		return $this->db->get()->result();
	}
}
