<?php
class C_Summary extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
         $this->load->view('V_Summary');
        
    }
}
?>