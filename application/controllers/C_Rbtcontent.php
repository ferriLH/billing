<?php
class C_Rbtcontent extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
		$data = array(
			"title" => "RBT Content",
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Rbtcontent',$data);
		}else{
			redirect('admin');
		}

    }
}
?>
