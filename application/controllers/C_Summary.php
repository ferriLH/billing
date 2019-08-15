<?php
class C_Summary extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		$data = array(
			"title" => "Summary",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Summary',$data);
		}else{
			redirect('admin');
		}
    }
}
