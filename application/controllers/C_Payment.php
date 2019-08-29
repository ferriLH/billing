<?php
class C_Payment extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
		//$this->load->model('M_Payment');
	}
    public function index()
    {
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->model('M_Sharepencipta');
			$this->load->model('M_Sharepartner');
			$data = array(
				"title" => "Payment",
				"getPencipta" => $this->M_Sharepencipta->getPencipta(),
				"getPartner" => $this->M_Sharepartner->getPartner(),

			);
			$this->load->view('V_Payment',$data);
		}else{
			redirect('admin');
		}
    }
    public function tablePartner()
    {
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->model('M_Sharepartner');
			$partner= $this->input->post('partner');
			$dari 	= $this->input->post('bulanAwal');
			$sampai = $this->input->post('bulanAkhir');
			$tahun 	= $this->input->post('tahun');
			if ($dari<10) {
				$monthdari = $tahun . "0" . $dari;
			}else {
				$monthdari = $tahun . $dari;
			}
			if ($sampai<10) {
				$monthsampai = $tahun . "0" . $sampai;
			}else {
				$monthsampai = $tahun . $sampai;
			}
			if ($partner == 0) {
				$this->session->set_flashdata('failed', 'Choose Partner');
				redirect('payment');
			}else{
				$getPartner1 = $this->M_Sharepartner->getPartner1($partner);
				$part 			= $getPartner1[0]['id'];
				$nam 			= $getPartner1[0]['namaPartner'];
				$rev  			= $getPartner1[0]['rev'];
				$type  			= $getPartner1[0]['type'];
				$persen			= $rev*100;
				$getRBT			= $this->M_Sharepartner->getRBT($part);
				$data = array(
					"title" => "Payment Partner | ".$nam." | ".$monthdari." - ".$monthsampai,
					"partner" => $getPartner1,
					"dari" => $dari,
					"sampai" => $sampai,
					"monthdari" => $monthdari,
					"monthsampai" => $monthsampai,
					"tahun" => $tahun,
					"getRBT" => $getRBT,
					"rev"=>$rev,
					"persen"=>$persen,
					"part"=>$part,
					"type"=>$type,
				);
				$this->load->view('V_PaymentTablePartner',$data);
			}
		}else{
			redirect('admin');
		}
    }
	public function tablePencipta()
	{
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->model('M_Sharepencipta');
			$pencipta	= $this->input->post('pencipta');
			$dari 		= $this->input->post('bulanAwal');
			$sampai 	= $this->input->post('bulanAkhir');
			$tahun 		= $this->input->post('tahun');
			if ($dari<10) {
				$monthdari = $tahun . "0" . $dari;
			}else {
				$monthdari = $tahun . $dari;
			}
			if ($sampai<10) {
				$monthsampai = $tahun . "0" . $sampai;
			}else {
				$monthsampai = $tahun . $sampai;
			}
			if ($pencipta == 0) {
				$this->session->set_flashdata('failed', 'Choose Pencipta');
				redirect('payment');
			}else{
				$getPencipta1 	= $this->M_Sharepencipta->getPencipta1($pencipta);
				$penc 			= $getPencipta1[0]['id'];
				$nam 			= $getPencipta1[0]['namaPencipta'];
				$rev  			= $getPencipta1[0]['rev'];
				$type  			= $getPencipta1[0]['type'];
				$persen			= $rev*100;
				$getRBT			= $this->M_Sharepencipta->getRBT($penc);
				$data = array(
					"title" => "Payment Pencipta | ".$nam." | ".$monthdari." - ".$monthsampai,
					"pencipta" => $getPencipta1,
					"dari" => $dari,
					"sampai" => $sampai,
					"monthdari" => $monthdari,
					"monthsampai" => $monthsampai,
					"tahun" => $tahun,
					"getRBT" => $getRBT,
					"rev"=>$rev,
					"persen"=>$persen,
					"penc"=>$penc,
					"type"=>$type,

				);
				$this->load->view('V_PaymentTablePencipta',$data);
			}
		}else{
			redirect('admin');
		}
	}
}
