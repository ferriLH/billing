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
		$this->db->where("email",$user);
		$this->db->where("password",$pass);
		return $this->db->get();        
    }
	function cekMail ($email){
		$tbl = "t_user";
		$this->db->select("*");
		$this->db->from($tbl);
		$this->db->where("email",$email);
		return $this->db->get();
	}

}
