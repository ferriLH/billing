<?php
class C_Sharepartner extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		$data = array(
			"title" => "Share Partner",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Sharepartner',$data);
		}else{
			redirect('admin');
		}

    }
}
