<?php
class C_Partner extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Partner');
        $this->load->library('form_validation');
    }
    public function index()
    {
		$data = array(
			"title" => "Partner",
			"data"	=>$this->M_Partner->show_partner(),
		);
		if($this->session->userdata('isLogin') == 'admin'){
			$this->load->view('V_Partner',$data);
		}else{
			redirect('admin');
		}
    }
    public function add(){
        $id = $this->M_Partner;
        $validation = $this->form_validation;
        $validation->set_rules($id->rules());

        if ($validation->run()) {
            $id->save();
            $this->session->set_flashdata('succes', 'Berhasil disimpan');
        }
        $this->load->view("CrudPartner/Editpartner");
    }
    public function edit($id)
    {
        if ($this->session->userdata('isLogin') == TRUE) {
            $data = array(
                "title" => "Partner",
                "edit" => $this->M_Partner->edit($id),
            );
            $this->load->view('CrudPartner/EditPartner',$data);
        }else{
            redirect('login');
        }
    }
    function editPartnerAuth($id,$idp)
    {
        if ($this->session->userdata('isLogin') == TRUE) {
            $data = array(
                "title" => "Artist",
                "getNewInbox"   => $this->M_Dashboard->getNewInbox(),
                "getArtistPartner"  => $this->M_Artist->getArtistPartner($id),
            );
            //form validation
            $this->form_validation->set_rules('namaPartner',    'Nama Partner',  'required');
            $this->form_validation->set_rules('noTelp',            'No Telp',          'numberic');
            $this->form_validation->set_rules('noFax',        'No Fax',      'numberic');
            $this->form_validation->set_rules('bank',        'bank',      'required');
            $this->form_validation->set_rules('noAcc',        'No Acc',      'numberic');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('failed', 'gagal');
                $this->load->view('dashboard_page/V_Edit_Partner',$data);
            } else{
                $this->M_Partner->update($id,$d);
                $this->session->set_flashdata('sukses', 'sukses');
                redirect('data-artist/'.$idp);
            }
        }else{
            redirect('login');
        }
    }
    public function delete($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->M_Partner->delete($id)) {
            redirect(site_url('V_Partner'));
        }
    }
}
?>
