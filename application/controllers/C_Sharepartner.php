<?php
class C_Sharepartner extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
		$this->load->model('M_Sharepartner');
	}
    public function index()
    {
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$data = array(
				"title" => "Share Partner",
				"getPartner" => $this->M_Sharepartner->getPartner(),
			);
			$this->load->view('V_SharePartner',$data);
		}else{
			redirect('admin');
		}

    }
    public function tableshare()
    {
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$data = array(
				"title" => "SHARE PARTNER",
			);
			$this->load->view('V_TableSharePartner',$data);
		}else{
			redirect('admin');
		}

    }
}
