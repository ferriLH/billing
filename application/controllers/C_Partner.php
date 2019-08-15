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
        if (!isset($id)) redirect('V_Partner');

        $id = $this->M_Partner;
        $validation = $this->form_validation;
        $validation->set_rules($id->rules());
        if ($validation->run()) {
            $id->update();
            $this->session->set_flashdata('succes','Berhasil disimpan');
        }
        $data["id"] = $id->getById($id);
        if (!$data["id"]) show_404();

        $this->load->view('CrudPartner/Editpartner');
    }
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->M_Partner->delete($id)) {
            redirect(site_url('V_Partner'));
        }
    }
}
?>
