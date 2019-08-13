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
    	return $this->db->get();
    }
}
?>