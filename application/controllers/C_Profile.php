<?php
class C_Profile extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Home');
    }
    public function index()
    {
        $data = array(
            "title" => "Edit Profile",
        );
        if($this->session->userdata('isLogin') == 'admin'){
        	$this->load->view('V_EditProfile',$data);
        }else{
			redirect('admin');
		}
    }

    function signout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>
