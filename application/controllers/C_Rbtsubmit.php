<?php
class C_Rbtsubmit extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Rbtsubmit');
    }
    public function index()
    {
		if($this->session->userdata('isLogin') == 'admin'){
			$bulan= $this->input->post('bulan');
			$tahun = $this->input->post('tahun');

			if ($bulan<10) {
				$month = $tahun . "0" . $bulan;
			}else {
				$month = $tahun . $bulan;
			}
			$data = array(
				"title" 	=> "RBT Submit",
				"operator" => $this->M_Rbtsubmit->get_operator(),
				"month" => $month,
				"bulan" => date('n'),
				"tahun" => date('Y'),
			);


				$this->load->view('V_Rbtsubmit',$data);

		}else{
			redirect('admin');
		}
    }

    function rbtsubmit()
	{
		if($this->session->userdata('isLogin') == 'admin'){

			$bulan= $this->input->post('bulan');
			$tahun = $this->input->post('tahun');

			if ($bulan<10) {
				$month = $tahun . "0" . $bulan;
			}else {
				$month = $tahun . $bulan;
			}

			$result1 = $this->M_Rbtsubmit->get_operator();

			$data = array(
				"title" 	=> "RBT Content",
				"operator"  	=> $result1,
				"month"		=>$month,
				"bulan"	=> $bulan,
				"tahun" => $tahun
			);

			$this->load->view('V_Rbtsubmit',$data);

		}else{
			redirect('admin');
		}
	}
}
