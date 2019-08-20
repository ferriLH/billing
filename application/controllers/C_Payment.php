<?php
class C_Payment extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		$data = array(
			"title" => "Payment",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Payment',$data);
		}else{
			redirect('admin');
		}
    }
    public function table()
    {
		$data = array(
			"title" => " Table Payment",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_PaymentTable',$data);
		}else{
			redirect('admin');
		}
    }
}
