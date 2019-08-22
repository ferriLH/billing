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
     function updateProfile($id){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Admin",
            "popUpProfile"=>TRUE,
            "popUpPass"=>FALSE,
            "popUpPhoto"=>FALSE,
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
        $nama_admin  = $this->input->post('inputName');
        $email_admin = $this->input->post('inputEmail');
        $this->M_Profile->updateProfile($id,$nama_admin,$email_admin);
        $setProfile = $this->M_Profile->getProfile($id);
        foreach ($setProfile->result() as $dat){
            $sess_data['userAdm'] = $dat->id_admin;
            $sess_data['namaAdm'] = $dat->nama_admin;
            $sess_data['emailAdm'] = $dat->email_admin;
            $sess_data['password'] = $dat->password;
            $this->session->set_userdata($sess_data);
        }
            $this->load->view('V_EditProfile',$data);
        }else{
            redirect('admin');
        }
    }
    function updatePassword($id){
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->form_validation->set_rules('inputOPassword', 'Old Password', 'required|trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                redirect('profile');
            }else {
                $opass = sha1($this->input->post('inputOPassword'));
                $cekPas = $this->M_Profile->getProfile($id);
                foreach ($cekPas->result() as $db) {$dbpass = $db->password;}
                if ($opass != $dbpass) {
                    $this->session->set_flashdata('result_login', '<br>old password = '.$opass.' - '.$dbpass.' does not match!.');
                    redirect('profile');
                }else{
                    $data = array(
                        "title"=>"Profile",
                        "subTitle"=>"Admin",
                        "popUpPass"=>TRUE,
                        "popUpProfile"=>FALSE,
                        "popUpPhoto"=>FALSE,
                    );
                    $npass = $this->input->post('pass');
                    $cpass = $this->input->post('cpass');
                    if ($npass==$cpass){
                        $this->M_Profile->updatePassword($id, $cpass);
                        $setProfile = $this->M_Profile->getProfile($id);
                        foreach ($setProfile->result() as $dat) {
                            $sess_data['userAdm'] = $dat->id_admin;
                            $sess_data['namaAdm'] = $dat->nama_admin;
                            $sess_data['emailAdm'] = $dat->email_admin;
                            $sess_data['password'] = $dat->password;
                            $this->session->set_userdata($sess_data);

                            $this->load->view('V_EditProfile',$data);

                        }
                    }else{
                        $this->session->set_flashdata('result_login', '<br>New password = '.$npass.' - Confirm password = '.$cpass.' does not match!.');
                        redirect('profile');
                    }
                }
            }
        }else{
            redirect('admin');
        }
    }
}
?>
