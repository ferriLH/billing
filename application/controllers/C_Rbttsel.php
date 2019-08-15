<?php
class C_Rbttsel extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		$data = array(
			"title" => "RBT For TSEL",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Rbttsel',$data);
		}else{
			redirect('admin');
		}
    }
}
