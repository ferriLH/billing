<?php
class C_Partner extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Partner');
    }
    public function index()
    {
        $x['data']=$this->M_Partner->show_partner();

            $this->load->view('V_Partner',$x);
        
    }
}
?>