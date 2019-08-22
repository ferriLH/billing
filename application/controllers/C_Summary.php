<?php
class C_Summary extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Summary');
    }
    public function index()
    {
		$data = array(
			"title" => "Summary",
			"bulan" => date('n'),
			"tahun" => date('Y'),
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Summary',$data);
		}else{
			redirect('admin');
		}
    }
    public function table()
    {
		$bulan= $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if ($bulan<10)
			$month=$tahun."0".$bulan;
		else
			$month=$tahun.$bulan;
		$data = array(
			"operator" => $this->M_Summary->get_operator(),
			"title" => "Summary",
			"month" => $month
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_SummaryTable',$data);
		}else{
			redirect('admin');
		}
    }
    public function RevenuePartner()
    {
    	$op = $this->uri->segment(3);
    	$month = $this->uri->segment(4);

		$data = array(
			"title" => "Revenue Partner From Partner",
			"op" => $this->M_Summary->get_spesifik_op($op),
			"month" => $month,

		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('TabelSummary/V_RevenuePartner',$data);
		}else{
			redirect('admin');
		}
    }
    public function RevenuePencipta()
    {
		$op = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		$data = array(
			"title" => "Revenue Partner From Pencipta",
			"op" => $this->M_Summary->get_spesifik_op($op),
			"month" => $month,
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('TabelSummary/V_RevenuePencipta',$data);
		}else{
			redirect('admin');
		}
    }
}
