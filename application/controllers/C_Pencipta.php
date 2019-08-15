<?php
class C_Pencipta extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
         $this->load->model('M_Pencipta');
    }
    public function index()
    {
		$data = array(
			"title" => "Pencipta",
			"data"	=> $this->M_Pencipta->show_pencipta(),
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Pencipta',$data);
		}else{
			redirect('admin');
		}
    }
	public function add()
	{
		$data = array(
			"title" => "Add Pencipta",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('CrudPartner/AddPencipta',$data);
		}else{
			redirect('admin');
		}
	}
	public function addAuth()
	{
		$data = array(
			"title" => "Add Pencipta",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('namaPencipta', 	'Nama Pencipta',	'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('failed', 'gagal');
					$this->load->view('CrudPartner/AddPencipta',$data);
				} else {
					$d['namaPencipta']	= ($this->input->post('namaPencipta'));
					$d['noTelp'] 		= ($this->input->post('noTelp'));
					$d['noFax'] 		= ($this->input->post('noFax'));
					$d['bank']			= ($this->input->post('bank'));
					$d['noAcc'] 		= ($this->input->post('noAcc'));
					$d['type'] 			= 1;

					$this->M_Pencipta->add_new_pencipta($d);
					$this->session->set_flashdata('sukses', 'sukses');
					redirect('pencipta');
				}
			}else{
				redirect('pencipta/add');
			}
		}else{
			redirect('admin');
		}
	}
}
