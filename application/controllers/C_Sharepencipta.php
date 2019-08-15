<?php
class C_Sharepencipta extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		$data = array(
			"title" => "Share Pencipta",
		);
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$this->load->view('V_Sharepencipta',$data);
		}else{
			redirect('admin');
		}
    }
}
