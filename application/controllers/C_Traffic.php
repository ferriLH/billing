<?php
class C_Traffic extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		$data = array(
			"title" => "Traffic",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Traffic',$data);
		}else{
			redirect('admin');
		}
    }
}
