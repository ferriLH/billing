<?php
class M_Profile extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function updateProfile($i,$nama,$email){
        $data = array(
            "nama_admin" => $nama,
            "email_admin" => $email,
        );
		$this->db->where('id_admin',$i);
		$this->db->update('t_admin',$data);
    }
	function updateProfileuser($i,$pass,$email){
		$data = array(
			"email" => $email,
			"password" => $pass,
		);
		$this->db->where('id_user',$i);
		$this->db->update('t_user',$data);
	}

    function updatePassword($id,$pass){
        $data = array(
            'password'=>sha1($pass),
        );
        $this->db->where('id_admin',$id);
        $this->db->update('t_admin',$data);
    }
     function getProfileAdmin($id){
        $tbl = "t_admin";
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where("id_admin",$id);
        return $this->db->get();
    }
    function getProfileUser($id)
	{
		$tbl = "t_user";
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->where('id_user',$id);
		return $this->db->get();
	}

}
?>
