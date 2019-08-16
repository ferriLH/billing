<?php
class C_Traffic extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Traffic');
    }
    public function index()
    {

		if($this->session->userdata('isLogin') == 'admin'){
			$bulan= $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$op = $this->input->post('op');

			if ($bulan<10) {
				$month = $tahun . "0" . $bulan;
			}else {
				$month = $tahun . $bulan;
			}
			$data = array(
				"title" 	=> "RBT Submit",
				"operator" => $this->M_Traffic->get_operator(),
				"month" => $month,
				"lagu" => $this->M_Traffic->get_judul($op)
			);

			$this->load->view('V_Traffic',$data);
		}else{
			redirect('admin');
		}
    }
    function commit()
		{

			if($this->session->userdata('isLogin') == 'admin'){
				$bulan= $this->input->post('bulan');
				$tahun = $this->input->post('tahun');
				$op = $this->input->post('op');

				if ($bulan<10) {
					$month = $tahun . "0" . $bulan;
				}else {
					$month = $tahun . $bulan;
				}
				$data = array(
					"title" 	=> "RBT Submit",
					"operator" => $this->M_Traffic->get_operator(),
					"month" => $month,
					"lagu" => $this->M_Traffic->get_judul($op)
				);

				$this->load->view('V_Traffic',$data);
			}else{
				redirect('admin');
			}
		}

}
