<?php
class C_Rbtcontent extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Rbtcontent');
    }
    public function index()
    {
		if($this->session->userdata('isLogin') == 'admin'){

			$data = array(
				"title" 	=> "RBT Content",
				"prbt"  	=> $this->M_Rbtcontent->get_prbt(),

		);

			$this->load->view('V_Rbtcontent',$data);

		}else{
			redirect('admin');
		}

    }
}
