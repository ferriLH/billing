<?php
class C_Login extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
    }
    public function index()
    {
        $data = array(
            "title" => "Login",
        );
        $this->load->view('sign/V_In',$data);
    }

    function auth()
    {
        $data = array(
            "title" => "Login",
        );
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_In',$data);
        } else {
            $usr = $this->input->post('email');
            $pwd = sha1($this->input->post('password'));
            $cek = $this->M_Login->cek($usr,$pwd);
            if ($cek->num_rows() != 0) {
                foreach ($cek->result() as $dat) {
                    $sess_data['isLogin']   = TRUE;
                    $sess_data['id_user']   = $dat->id_user;
                    $sess_data['nik']       = $dat->nik;
                    $sess_data['nama']       = $dat->nama;
                    $sess_data['email']     = $dat->email;
                    $sess_data['role']     = $dat->role;
                    $sess_data['password']  = $dat->password;
                    $sess_data['status']    = $dat->status;
                    $this->session->set_userdata($sess_data);
                }
                $this->session->set_flashdata('sukses','sukses');
                redirect('home');
            } else {
                $this->session->set_flashdata('failed', '<br>Username atau Password anda masukan salah!
                    ');
                $this->load->view('sign/V_In',$data);
            }
        }
    }

    
}

?>