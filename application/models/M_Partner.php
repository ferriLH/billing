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
    	return $this->db->get();
    }
}
?>