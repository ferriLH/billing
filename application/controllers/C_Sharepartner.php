<?php
class C_Sharepartner extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
		$this->load->model('M_Sharepartner');
	}
    public function index()
    {
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$data = array(
				"title" => "Share Partner",
				"getPartner" => $this->M_Sharepartner->getPartner(),
			);
			$this->load->view('V_SharePartner',$data);
		}else{
			redirect('admin');
		}

    }
    public function tableshare()
    {
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
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
				redirect('sharepartner');

			}else{
				$getPartner1 = $this->M_Sharepartner->getPartner1($partner);
				$part 			= $getPartner1[0]['id'];
				$rev  			= $getPartner1[0]['rev'];
				$persen			= $rev*100;
				$getRBT			= $this->M_Sharepartner->getRBT($part);
				$data = array(
					"title" => "SHARE PARTNER",
					"partner" => $getPartner1,
					"dari" => $dari,
					"sampai" => $sampai,
					"monthdari" => $monthdari,
					"monthsampai" => $monthsampai,
					"tahun" => $tahun,
					"getRBT" => $getRBT,

				);
				if ($this->session->userdata('role')=='partner') {
					$this->load->view('V_TableSharePartnerPartner',$data);
				}else{
					$this->load->view('V_TableSharePartner',$data);
				}
			}
		}else{
			redirect('admin');
		}

    }
}
