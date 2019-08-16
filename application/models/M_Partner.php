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
    function update($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('p_partner',$data);
    }
	function setDelete($id){
		$data = array(
			'type'=>0,
		);
		$this->db->where('id',$id);
		$this->db->update('p_partner',$data);
	}
}
