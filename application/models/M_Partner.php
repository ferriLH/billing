<?php
class M_Partner extends CI_Model
{
	private $p_partner = "id";

	public 	$id;
	public 	$namaPartner;
	public 	$noTelp;
	public 	$noFax;
	public 	$noAcc;
	public 	$bank;

	public function rules()
    {
        return [
            ['field' => 'namaPartner',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'noTelp',
            'label' => 'NoTelp',
            'rules' => 'numeric'],
            
            ['field' => 'noFax',
            'label' => 'noFax',
            'rules' => 'numeric'],

            ['field' => 'bank',
            'label' => 'bank',
            'rules' => 'required'],

            ['field' => 'noAcc',
            'label' => 'noAcc',
            'rules' => 'numeric']
        ];
    }
    function __construct()
    {
        parent::__construct();
    }
    function show_partner(){
    	$this->db->select("id,namaPartner,noTelp,noFax,bank,noAcc");
    	$this->db->from('p_partner');
    	return $this->db->get();
    }
    public function getAll(){
    	return $this->db->get($this->p_partner)->result();
    }
    public function getById($id){
    	return $this->db->get_where($this->p_partner, ['id' => $id])->row();
    }
    public function save(){
    	$post 				= $this->input->post();
    	$this->id 			= uniqid();
    	$this->namaPartner 	= $post["namaPartner"];
    	$this->noTelp 		= $post["noTelp"];
    	$this->noFax 		= $post["noFax"];
    	$this->noAcc 		= $post["noAcc"];
    	$this->bank 		= $post["bank"];
    	$this->db->insert($this->p_partner, $this);
    }
    public function update(){
    	$post				= $this->input->post();
    	$this->id 			= uniqid();
    	$this->namaPartner 	= $post["name"];
    	$this->noTelp 		= $post["noTelp"];
    	$this->noFax 		= $post["noFax"];
    	$this->noAcc 		= $post["noAcc"];
    	$this->bank 		= $post["bank"];
    	$this->db->update($this->p_partner, $this, array('id' => $post['id']));
    }
    public function delete($id){
    	return $this->db->delete($this->p_partner, array('id' => $post['id']));
    }
}
?>