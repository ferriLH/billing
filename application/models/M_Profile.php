<?php
class M_Profile extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function updateProfile($id,$nama_admin,$email_admin){
        $data = array(
            'nama_admin'=>$nama_admin,
            'email_admin'=>$email_admin,
        );
            $this->db->where('id_admin',$id);
        $this->db->update('t_admin',$data);
    }
    function updatePassword($id,$pass){
        $data = array(
            'password'=>sha1($pass),
        );
        $this->db->where('id_admin',$id);
        $this->db->update('t_admin',$data);
    }
     function getProfile($id){
        $tbl = "t_admin";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("id_admin",$id);
        return $this->db->get();
    }

}
?>