<?php
class C_Profile extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Profile');
    }
    public function index()
    {
        $data = array(
            "title" => "Edit Profile",
        );
        if($this->session->userdata('isLogin') == 'admin'){
        	$this->load->view('V_EditProfile',$data);
        }else if ($this->session->userdata('isLogin') == 'partner'){
			$this->load->view('V_EditProfile',$data);
		} else {
			redirect('');
		}
    }

    function signout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

     function updateProfile($id) {
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Admin",
            "popUpProfile"=>TRUE,
            "popUpPass"=>FALSE,
            "popUpPhoto"=>FALSE,
        );
        if ($this->session->userdata('isLogin') == "admin") {
			$this->form_validation->set_rules('nama', 'Nama', 'required');
        	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|matches[re-password]');
			$this->form_validation->set_rules('re-password', 'Confirm Password', 'required|matches[password]');
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('failed','gagal form validation');
				$this->load->view('V_EditProfile',$data);
			}
			else {
				$nama_admin = $this->input->post('nama');
				$email_admin = $this->input->post('email');
				$passw = sha1($this->input->post('password'));
				$this->M_Profile->updateProfile($id, $nama_admin, $email_admin, $passw);
				$setProfile = $this->M_Profile->getProfileAdmin($id);
				foreach ($setProfile->result() as $dat) {
					$sess_data['isLogin'] = 'admin';
					$sess_data['id_user'] = $dat->id_admin;
					$sess_data['nama'] = $dat->nama_admin;
					$sess_data['email'] = $dat->email_admin;
					$sess_data['aktif'] = $dat->aktif;
					$this->session->set_userdata($sess_data);
					$this->session->set_flashdata('success', 'Berhasil');
					$this->load->view('V_EditProfile', $data);
				}
			}
        }else if ($this->session->userdata('isLogin') == "partner") {
			//$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|matches[re-password]');
			$this->form_validation->set_rules('re-password', 'Confirm Password', 'required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('failed', 'gagal');
				$this->load->view('V_EditProfile', $data);
			} else {
				$email = $this->input->post('email');
				$pass = sha1($this->input->post('password'));

				$this->M_Profile->updateProfileuser($id, $pass, $email);
				$cek = $this->M_Profile->getProfileUser($id);

				if ($cek->num_rows() != 0){
					foreach ($cek->result() as $res)
					{
						$sess_data['isLogin'] 	= 'partner';
						$sess_data['id_user']  	= $res->id_user;
						$sess_data['idPartner'] = $res->idPartner;
						$sess_data['idPencipta']= $res->idPencipta;
						$sess_data['email']     = $res->email;
						$sess_data['role']     	= $res->role;
						$sess_data['status']    = $res->status;
						$this->session->set_userdata($sess_data);
					}
					if ($this->session->userdata('role')=='partner') {
						$getProfile = $this->M_Login->getPartner($this->session->userdata('idPartner'));
						foreach ($getProfile->result() as $dat) {
							$sess_data['nama'] 		= $dat->namaPartner;
							$sess_data['noTelp']    = $dat->noTelp;
							$sess_data['noFax']     = $dat->noFax;
							$sess_data['bank']    	= $dat->bank;
							$sess_data['noAcc']    	= $dat->noAcc;
							//$sess_data['rev']    	= $dat->status;
							$this->session->set_userdata($sess_data);
						}
					}elseif ($this->session->userdata('role')=='pencipta') {
						$getProfile = $this->M_Login->getPencipta($this->session->userdata('idPencipta'));
						foreach ($getProfile->result() as $dat) {
							$sess_data['nama']      = $dat->namaPencipta;
							$sess_data['noTelp']    = $dat->noTelp;
							$sess_data['noFax']     = $dat->noFax;
							$sess_data['bank']    	= $dat->bank;
							$sess_data['noAcc']    	= $dat->noAcc;
							//$sess_data['rev']    	= $dat->status;
							$this->session->set_userdata($sess_data);
						}
					}
				}
				$this->session->set_flashdata('success', 'Berhasil');
				$this->load->view('V_EditProfile', $data);
				}
			}
        else{
			redirect('login');
		}
    }

    function updatePassword($id)
	{
		if ($this->session->userdata('isLogin') != "admin") {
			//$this->form_validation->set_rules('inputOPassword', 'Old Password', 'required|trim|xss_clean');
			///	$this->form_validation->set_rules('pass','New Password', 'required|matches[cpass]');
			///	$this->form_validation->set_rules('cpass','Confirm Password', 'required|matches[pass]');
			// if ($this->form_validation->run() == FALSE) {
			redirect('gagalform');
		} else {
			$opass = sha1($this->input->post('inputOPassword'));
			$cekPas = $this->M_Profile->getProfile($id);
			foreach ($cekPas->result() as $db) {
				$dbpass = $db->password;
			}
			if ($opass != $dbpass) {
				$this->session->set_flashdata('result_login', '<br>old password = ' . $opass . ' - ' . $dbpass . ' does not match!.');
				redirect('gagal1');
			} else {
				$data = array(
					"title" => "Profile",
					"subTitle" => "Admin",
					"popUpPass" => TRUE,
					"popUpProfile" => FALSE,
					"popUpPhoto" => FALSE,
				);
				$npass = $this->input->post('pass');
				$cpass = $this->input->post('cpass');
				if ($npass == $cpass) {
					$this->M_Profile->updatePassword($id, $cpass);
					$setProfile = $this->M_Profile->getProfile($id);
					foreach ($setProfile->result() as $dat) {
						$sess_data['isLogin'] = 'admin';
						$sess_data['id_user'] = $dat->id_admin;
						$sess_data['nama'] = $dat->nama_admin;
						$sess_data['email'] = $dat->email_admin;
						$sess_data['aktif'] = $dat->aktif;
						$this->session->set_userdata($sess_data);
					}
					$this->load->view('V_EditProfile', $data);
				} else {
					$this->session->set_flashdata('result_login', '<br>New password = ' . $npass . ' - Confirm password = ' . $cpass . ' does not match!.');
					redirect('gagal2');
				}
			}
		}
	}
}
?>
