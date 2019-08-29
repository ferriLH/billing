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
			$bulan= $this->input->get('bulan');
			$tahun = $this->input->get('tahun');
			$op = $this->input->get('op');

			if ($bulan<10) {
				$month = $tahun . "0" . $bulan;
			}else {
				$month = $tahun . $bulan;
			}
			$data = array(
				"title" 	=> "Traffic",
				"operator" => $this->M_Traffic->get_operator(),
				"month" => $month,
				"lagu" => $this->M_Traffic->get_judul($op),
				"bulan" => date('n'),
				"tahun" => date('Y'),
				"op" => $op,
			);

			$this->load->view('V_Traffic',$data);
		}else{
			redirect('admin');
		}
    }
    function commit()
	{
		if($this->session->userdata('isLogin') == 'admin'){
			$bulan= $this->input->get('bulan');
			$tahun = $this->input->get('tahun');
			$op = $this->input->get('op');

			if ($bulan<10) {
				$month = $tahun . "0" . $bulan;
			}else {
				$month = $tahun . $bulan;
			}
			$data = array(
				"title" 	=> "Traffic",
				"operator" => $this->M_Traffic->get_operator(),
				"month" => $month,
				"lagu" => $this->M_Traffic->get_judul($op),
				"bulan" => $bulan,
				"tahun" => $tahun,
				"op" => $op,
			);

			$this->load->view('V_Traffic',$data);
		}else{
			redirect('admin');
		}
	}
}
