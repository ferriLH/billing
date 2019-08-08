<?php
class C_Admin extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Home');
    }
    public function index()
    {
        $data = array(
            "title" => "admin",
        );
        if($this->session->userdata('isLogin') == TRUE){
        $this->load->view('V_Admin',$data);    
        }
        
    }

    function signout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>