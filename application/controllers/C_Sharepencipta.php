<?php
class C_Sharepencipta extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
		$this->load->model('M_Sharepencipta');
	}
    public function index()
    {
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
			$data = array(
				"title" => "Share Pencipta",
				"getPencipta" => $this->M_Sharepencipta->getPencipta(),
			);
			$this->load->view('V_Sharepencipta',$data);
		}else{
			redirect('admin');
		}
    }
    public function tableshare()
    {
		if($this->session->userdata('isLogin') == 'admin'||$this->session->userdata('isLogin') == 'partner'){
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
				redirect('sharepencipta');
			}else{
				$getPencipta1 	= $this->M_Sharepencipta->getPencipta1($pencipta);
				$penc 			= $getPencipta1[0]['id'];
				$rev  			= $getPencipta1[0]['rev'];
				$type  			= $getPencipta1[0]['type'];
				$nam			= $getPencipta1[0]['namaPencipta'];
				$persen			= $rev*100;

				$getRBT			= $this->M_Sharepencipta->getRBT($penc);
				$data = array(
					"title" => "SHARE PENCIPTA | ".$nam,
					"pencipta" => $getPencipta1,
					"dari" => $dari,
					"sampai" => $sampai,
					"monthdari" => $monthdari,
					"monthsampai" => $monthsampai,
					"tahun" => $tahun,
					"getRBT" => $getRBT,
					"rev"=>$rev,
					"persen"=>$persen,
					"part"=>$penc,
					"type"=>$type,

				);
				if ($this->session->userdata('role')=='pencipta') {
					$this->load->view('V_TableSharePenciptaPencipta',$data);
				}else{
					$this->load->view('V_TableSharePencipta',$data);
				}
			}
		}else{
			redirect('admin');
		}

    }
}
