<?php
class C_Rbttsel extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
         $this->load->view('V_Rbttsel');
        
    }
}
?>