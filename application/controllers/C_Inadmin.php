<?php
class C_Inadmin extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
    }
    public function index()
    {
        $data = array(
            "title" => "Admin",
        );
        $this->load->view('sign/V_Inadmin',$data);
    }

    function auth()
    {
        $data = array(
            "title" => "Admin",
        );
        $this->form_validation->set_rules('email_admin', 'email_admin', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_Inadmin',$data);
        } else {
            $user = $this->input->post('email_admin');
            $pass = sha1($this->input->post('password'));
            $cek = $this->M_Admin->cek($user,$pass);
            if ($cek->num_rows() != 0) {
                foreach ($cek->result() as $dat) {
                    $sess_data['isLogin']       = TRUE;
                    $sess_data['id_user']       = $dat->id_admin;
                    $sess_data['nama_admin']    = $dat->nama_admin;
                    $sess_data['email_admin']   = $dat->email_admin;
                    $sess_data['password']      = $dat->password;
                    $sess_data['aktif']         = $dat->aktif;
                    $this->session->set_userdata($sess_data);
                }
                $this->session->set_flashdata('sukses','sukses');
                redirect('admin');
            } else {
                $this->session->set_flashdata('failed', '<br>Username atau Password anda masukan salah!
                    ');
                $this->load->view('sign/V_Inadmin',$data);
            }
        }
    }

    
}

?>