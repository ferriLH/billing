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

			//$result1 = $this->M_Rbtcontent->get_prbt();
			//$result2 = $this->M_Rbtcontent->get_operator($result1);

			$data = array(
				"title" => "RBT Content",
				"prbt"  => $this->M_Rbtcontent->get_prbt(),
				//"operator" => $this->M_Rbtcontent->get_operator($result1),
				//"pencipta" => $this->M_Rbtcontent->get_pencipta($result1),
				//"partner" => $this->M_Rbtcontent->get_partner($result1),
				//"kode"  => $this->M_Rbtcontent->get_kode($result2),

		);

			$this->load->view('V_Rbtcontent',$data);

		}else{
			redirect('admin');
		}

    }
}
?>
