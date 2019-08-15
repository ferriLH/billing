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
}
?>
