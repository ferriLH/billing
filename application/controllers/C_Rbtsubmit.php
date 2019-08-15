<?php
class C_Rbtsubmit extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		$data = array(
			"title" => "RBT Submit",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Rbtsubmit',$data);
		}else{
			redirect('admin');
		}
    }
}
