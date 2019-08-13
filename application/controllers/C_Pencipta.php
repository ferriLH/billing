<?php
class C_Pencipta extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
         $this->load->model('M_Pencipta');
    }
    public function index()
    {
         $x['data']=$this->M_Pencipta->show_pencipta();

            $this->load->view('V_Pencipta',$x);
        
    }
}
?>