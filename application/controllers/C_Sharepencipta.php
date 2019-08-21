<?php
class C_Sharepencipta extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
		$this->load->model('M_Sharepencipta');

	}
    public function index()
    {
		$data = array(
			"title" => "Share Pencipta",
			"getPencipta" => $this->M_Sharepencipta->getPencipta(),
		);
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$this->load->view('V_Sharepencipta',$data);
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
			$this->load->view('V_TableSharePencipta',$data);
		}else{
			redirect('admin');
		}

    }
}
