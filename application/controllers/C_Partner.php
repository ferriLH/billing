<?php
class C_Partner extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Partner');
        $this->load->library('form_validation');
    }
    public function index()
    {
		$data = array(
			"title" => "Partner",
			"data"	=>$this->M_Partner->show_partner(),
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Partner',$data);
		}else{
			redirect('admin');
		}
    }
    public function add()
    {
        $data = array(
            "title" => "Add Partner",
        );
        if($this->session->userdata('isLogin') == 'admin'){
            $this->load->view('CrudPartner/AddPartner',$data);
        }else{
            redirect('admin');
        }
    }
    public function addAuth()
    {
        $data = array(
            "title" => "Add Partner",
        );
        if($this->session->userdata('isLogin') == 'admin'){
            if($this->input->post('submit')){
                $this->form_validation->set_rules('namaPartner',   'Nama Partner',    'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('failed', 'gagal');
                    $this->load->view('CrudPartner/AddPartner',$data);
                } else {
                    $d['namaPartner']  = ($this->input->post('namaPartner'));
                    $d['noTelp']        = ($this->input->post('noTelp'));
                    $d['noFax']         = ($this->input->post('noFax'));
                    $d['bank']          = ($this->input->post('bank'));
                    $d['noAcc']         = ($this->input->post('noAcc'));
                    $d['type']          = 1;

                    $this->M_Partner->add_new_partner($d);
                    $this->session->set_flashdata('sukses', 'sukses');
                    redirect('partner');
                }
            }else{
                redirect('partner/add');
            }
        }else{
            redirect('admin');
        }
    }
    public function edit($id)
    {
        if ($this->session->userdata('isLogin') == TRUE) {
            $data = array(
                "title" => "Partner",
                "edit" => $this->M_Partner->edit($id),
            );
            $this->load->view('CrudPartner/EditPartner',$data);
        }else{
            redirect('login');
        }
    }
    function editPartnerAuth($id,$idp)
    {
        if ($this->session->userdata('isLogin') == TRUE) {
            $data = array(
                "title" => "Artist",
                "edit"  => $this->M_Partner->edit($id),
            );
            //form validation
            $this->form_validation->set_rules('namaPartner',    'Nama Partner',  'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('failed', 'gagal');
                $this->load->view('CrudPartner/EditPartner',$data);
            } else{
                $this->M_Partner->update($id,$d);
                $this->session->set_flashdata('sukses', 'sukses');
                redirect('index/'.$idp);
            }
        }else{
            redirect('login');
        }
    }
	public function delete($id)
	{
		if ($this->session->userdata('isLogin') == 'admin') {
			$this->M_Partner->setDelete($id);
			$this->session->set_flashdata('sukses', 'Delete Sukses');
			$data = array(
				"title" 		=> "Partner",
			);
			redirect('partner',$data);
		}else{
			redirect('login');
		}
	}
}
