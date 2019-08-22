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
        }else{
			redirect('admin');
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
        $nama_admin  = $this->input->post('inputName');
        $email_admin = $this->input->post('inputEmail');
        $this->M_Profile->updateProfile($id,$nama_admin,$email_admin);
        $setProfile = $this->M_Profile->getProfile($id);
        foreach ($setProfile->result() as $dat){
			$sess_data['isLogin']       = 'admin';
			$sess_data['id_user']       = $dat->id_admin;
			$sess_data['nama']    		= $dat->nama_admin;
			$sess_data['email']   		= $dat->email_admin;
			$sess_data['aktif']         = $dat->aktif;
			$this->session->set_userdata($sess_data);
        }
            $this->load->view('V_EditProfile',$data);
        }else{
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
