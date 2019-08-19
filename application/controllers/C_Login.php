<?php
class C_Login extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');

    }
    public function index()
    {
        $data = array(
            "title" => "Login",
        );
		if($this->session->userdata('isLogin') == 'partner'){
			redirect('home');
		}else{
			$this->load->view('sign/V_In',$data);
		}
    }

    function auth()
    {
        $data = array(
            "title" => "Login",
        );
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_In',$data);
        } else {
            $usr = $this->input->post('email');
            $pwd = sha1($this->input->post('password'));
            $cek = $this->M_Login->cek($usr,$pwd);
            if ($cek->num_rows() != 0) {
                foreach ($cek->result() as $dat) {
                    $sess_data['isLogin'] 	= 'partner';
                    $sess_data['id_user']  	= $dat->id_user;
                    $sess_data['nik']      	= $dat->nik;
                    $sess_data['nama']      = $dat->nama;
                    $sess_data['email']     = $dat->email;
                    $sess_data['role']     	= $dat->role;
                    $sess_data['status']    = $dat->status;
                    $this->session->set_userdata($sess_data);
                }
                $this->session->set_flashdata('sukses','sukses');
                redirect('home');
            } else {
                $this->session->set_flashdata('failed', '<br>Username atau Password anda masukan salah!');
                $this->load->view('sign/V_In',$data);
            }
        }
    }
	public function forget()
	{
		$data = array(
			"title" => "Forgot My Password",
		);
		$this->load->view('sign/V_Forget',$data);
	}
	public function forgetAuth()
	{
		$data = array(
			"title" => "Forgot My Password"
		);
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('sign/V_Forget',$data);
		}else{
			$email  = $this->input->post('email');
			$cek    = $this->M_Login->cekMail($email);
			if($cek->num_rows() != 0){
				foreach ($cek->result() as $dat){
					$sess_data['id'] = $dat->id_user;
					$this->session->set_userdata($sess_data);
				}
				$idunencrypted = $this->session->userdata('id');
				$id = encrypt_url($idunencrypted);
				$this->mailForgot($email,$id);
				$this->session->set_flashdata('sukses', '<br>Check Your Email');
				redirect('forgotMyPassword',$data);
			}else {
				$this->session->set_flashdata('failed', '<br>Email you entered is not registered');
				redirect('forgotMyPassword',$data);
			}
		}
	}
	public function mailForgot($toEmail,$id) {

		$to_email = $toEmail;
		$domain = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '')
			.'://'.$_SERVER['HTTP_HOST'].str_replace('//','/',dirname($_SERVER['SCRIPT_NAME']).'/');
		$mid = "forgotMyPasswordForm/";
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => '465',
			'smtp_user' => 'tittattutproject@gmail.com',
			'smtp_pass' => 'ttt@tut123',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE,
			'message' => "<a href='$domain$mid$id' target='_blank'>Click here to Change Your Password</a>"
		);

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from($config['smtp_user']);
		$this->email->to($to_email);
		$this->email->bcc("andika@alpha-omega.co.id");
		$this->email->subject('Forget Password');
		$this->email->message($config['message']);
		ini_set("SMTP",$config['smtp_host']);
		ini_set("smtp_port",$config['smtp_port']);

		//Send mail
		if($this->email->send())
			$this->session->set_flashdata("success","<br>Email sent successfully.");
		else
			show_error($this->email->print_debugger());
		return false;

	}
	public function forgetForm($id){
		$data = array(
			"title" => "Forgot My Password",
			"id" => $id
		);
		$id = decrypt_url($id);
		$cek    = $this->M_Login->cek_id($id);
		if($cek->num_rows() > 0){
			foreach ($cek->result() as $dat){
				$sess_data['id'] = $dat->id_user;
				$this->session->set_userdata($sess_data);
			}
			$this->load->view('sign/V_ForgetForm',$data);
		}else {
			$this->session->set_flashdata('failed', '<br>Fuck off!');
			$this->load->view('sign/V_Forget',$data);
		}
	}
	public function forgetFormAuth($id){
    	$id = decrypt_url($id);
		$data = array(
			"title" => "Forgot My Password",
			"id" => $id
		);
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('sign/V_ForgetForm',$data);
		}else {
			if ($this->input->post("submit")) {
				$pwd = $this->input->post("password");
				$pass= $this->input->post("cpassword");
				if($pwd!=$pass){
					$this->session->set_flashdata('failed', '<br>Password and Confirm Password Does not Match');
					redirect('forgotMyPasswordForm/'.$id);
				}else{
					$passs = sha1($pass);
					$this->M_Login->changePass($passs,$id);
					$this->session->set_flashdata('sukses', '<br>Password Change Done. You can login with your new password below');
					redirect('login',$data);
				}
			}
		}
	}
}

