<?php
class C_Payment extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->model('M_Sharepencipta');
			$data = array(
				"title" => "Payment",
				"getPencipta" => $this->M_Sharepencipta->getPencipta(),

			);
			$this->load->view('V_Payment',$data);
		}else{
			redirect('admin');
		}
    }
    public function table()
    {
		if($this->session->userdata('isLogin') == 'admin'){
			$data = array(
				"title" => " Table Payment",
			);
			$this->load->view('V_PaymentTable',$data);
		}else{
			redirect('admin');
		}
    }
}
