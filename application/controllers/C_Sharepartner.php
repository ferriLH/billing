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
    public function sortby()
    {
		$data = array(
			"title" => "Sort By",
		);
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$this->load->view('SharePartner/V_Sortby',$data);
		}else{
			redirect('admin');
		}

    }
    public function tableshare()
    {
		$data = array(
			"title" => "SHARE PENCIPTA",
		);
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$this->load->view('SharePartner/V_TableSharePartner',$data);
		}else{
			redirect('admin');
		}

    }
}
