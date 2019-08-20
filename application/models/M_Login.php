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
	function changePass($pass,$id){
		$data = array(
			'password' =>$pass);
		$this->db->where('id_user',$id);
		$this->db->update('t_user',$data);
	}
	function cek_id ($id){
		$tbl = "t_user";
		$this->db->select("id_user");
		$this->db->from($tbl);
		$this->db->where("id_user",$id);
		return $this->db->get();
	}
	function getPartner ($id){
		$this->db->select("*");
		$this->db->from('p_partner');
		$this->db->where("id",$id);
		return $this->db->get();
	}
	function getPencipta ($id){
		$this->db->select("*");
		$this->db->from('p_pencipta');
		$this->db->where("id",$id);
		return $this->db->get();
	}
}
