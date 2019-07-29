<?php
class C_Home extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Home');
    }
    public function index()
    {
        $data = array(
            "title" => "Home",
        );
        $this->load->view('V_Home',$data);
    }
}
?>