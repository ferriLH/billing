<?php
class C_Partner extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Partner');
        $this->load->helper('url');
    }
    public function index()
    {
        $x['data']=$this->M_Partner->show_partner();

            $this->load->view('V_Partner',$x);
        
    }
    function edit($id){
        $where = array('id' => $id);
        $data['p_partner'] = $this->M_Partner->edit_data($where,'p_partner')->result();
        $this->load->view('CrudPartner/Editpartner' ,$data);
    }
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $telp = $this->input->post('telp');
        $fax = $this->input->post('fax');
        $acc = $this->input->post('acc');
        $bank = $this->input->post('bank');

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'telp' => $telp,
            'fax' => $fax,
            'acc' => $acc,
            'bank' => $bank
        );

        $where = array(
            'id' => $id
        );
        $this->M_Partner->update_data($where,$data,'p_partner');
    redirect('CrudPartner/Editpartner');
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }   
}
?>