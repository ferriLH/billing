<?php
class C_Rbttsel extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
		$this->load->model('M_Rbttsel');
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
				"title" 	=> "RBT Tsel",
				"operator" => $this->M_Rbttsel->get_operator(),
				"month" => $month,
				"bulan" => '1',
				"tahun" => '1',
			);
			$this->load->view('V_Rbttsel',$data);
		}else{
			redirect('admin');
		}
    }

    function rbttsel_submit()
	{
		if($this->session->userdata('isLogin') == 'admin'){

			$bulan= $this->input->post('bulan');
			$tahun = $this->input->post('tahun');

			if ($bulan<10) {
				$month = $tahun . "0" . $bulan;
			}else {
				$month = $tahun . $bulan;
			}

			$result1 = $this->M_Rbttsel->get_operator();

			$data = array(
				"title" 	=> "RBT Tsel",
				"operator"  	=> $result1,
				"month"		=>$month,
				"bulan"	=> $bulan,
				"tahun" => $tahun
			);

			$this->load->view('V_Rbttsel',$data);

		}else{
			redirect('admin');
		}
	}
}
