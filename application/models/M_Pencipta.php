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
}
