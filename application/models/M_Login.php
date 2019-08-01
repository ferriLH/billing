<?php
class M_Login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function cek ($user,$pass){
		$this->db->select("*");
		$this->db->from('t_user');
		$this->db->where("Email",$user);
		$this->db->where("password",$pass);
		return $this->db->get();        
    }

}
?>