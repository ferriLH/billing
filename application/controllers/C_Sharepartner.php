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
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$this->load->view('V_SharePartner',$data);
		}else{
			redirect('admin');
		}

    }
    public function tableshare()
    {
		$data = array(
			"title" => "SHARE PARTNER",
		);
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$this->load->view('V_TableSharePartner',$data);
		}else{
			redirect('admin');
		}

    }
}
