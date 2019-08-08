<?php
class M_Admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function cek ($user,$pass){
		$this->db->select("*");
		$this->db->from('t_admin');
		$this->db->where("email_admin",$user);
		$this->db->where("password",$pass);
		return $this->db->get();        
    }

}
?>