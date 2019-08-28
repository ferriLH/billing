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
    public function table_alias()
    {
    	$id = $this->session->userdata('idPartner');
        $data = array(
            "title" => "Tabel Alias",
			"prbt" => $this->M_Partner->get_prbt($id),

        );
        if($this->session->userdata('isLogin') == 'partner'){
            $this->load->view('V_Tablealias',$data);
        }else{
            redirect('login');
        }
        
    }

    public function export_alias()
	{
		$id = $this->session->userdata('idPartner');
		$data = array(
			"title" => "Tabel Alias",
			"prbt"  => $this->M_Partner->get_prbt($id),
			"partner" => $this->M_Partner->get_partner($id)
		);
		if ($this->session->userdata('isLogin')=='partner'){
			$this->load->view('V_Alias_export',$data);
		} else {
			redirect('login');
		}


	}

    public function add()
    {
        $data = array(
            "title" => "Add Partner",
			"idPartner"	=> $this->M_Partner->getNewIdPartner(),
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
                $this->form_validation->set_rules('namaPartner',   	'Nama Partner',    	'required');
                $this->form_validation->set_rules('email',   		'Email',    		'required|valid_email');
                $this->form_validation->set_rules('password',   	'Password',    		'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('failed', 'gagal');
                    $this->load->view('CrudPartner/AddPartner',$data);
                } else {
                    $d['id']  			= ($this->input->post('idPartner'));
                    $d['namaPartner']  	= ($this->input->post('namaPartner'));
                    $d['noTelp']        = ($this->input->post('noTelp'));
                    $d['noFax']         = ($this->input->post('noFax'));
                    $d['bank']          = ($this->input->post('bank'));
                    $d['noAcc']         = ($this->input->post('noAcc'));
                    $d['type']          = 1;
					$this->M_Partner->add_new_partner($d);
					$u['idPartner']		= $this->input->post('idPartner');
					$u['idPencipta']    = 0;
					$u['email']         = ($this->input->post('email'));
					$u['role']         	= 'partner';
					$u['password']      = sha1($this->input->post('password'));
					$u['status']        = 1;
					$this->M_Partner->add_new_user($u);
					$this->session->set_flashdata('sukses', 'Add Sukses');
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
        if ($this->session->userdata('isLogin') == 'admin') {
            $data = array(
                "title" => "Partner",
                "edit" => $this->M_Partner->edit($id),
                "editUser" => $this->M_Partner->editUser($id),
            );
            $this->load->view('CrudPartner/EditPartner',$data);
        }else{
            redirect('login');
        }
    }
    function editAuth($id)
    {
        if ($this->session->userdata('isLogin') == 'admin') {
            $data = array(
                "title" => "Partner",
                "edit"  => $this->M_Partner->edit($id),
            );
            //form validation
            $this->form_validation->set_rules('namaPartner',    'Nama Partner',  'required');
			$this->form_validation->set_rules('email',   		'Email',    		'required|valid_email');
			if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('failed', 'gagal');
                $this->load->view('CrudPartner/EditPartner',$data);
            } else{
				$d['namaPartner']  = ($this->input->post('namaPartner'));
				$d['noTelp']        = ($this->input->post('noTelp'));
				$d['noFax']         = ($this->input->post('noFax'));
				$d['bank']          = ($this->input->post('bank'));
				$d['noAcc']         = ($this->input->post('noAcc'));
                $this->M_Partner->update($id,$d);
				if ($this->input->post('password')!='') {
					$u['email']         = ($this->input->post('email'));
					$u['password']      = sha1($this->input->post('password'));
				}else{
					$u['email']         = ($this->input->post('email'));
				}
				$this->M_Partner->updateUser($id,$u);
				$this->session->set_flashdata('sukses', 'Update Sukses');
                redirect('partner/edit/'.$id);
            }
        }else{
            redirect('login');
        }
    }
	public function delete($id)
	{
		if ($this->session->userdata('isLogin') == 'admin') {
			$this->M_Partner->setDelete($id);
			$this->M_Partner->setDeleteUser($id);
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
