<?php
class Grafik extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('k_grafik');
        $this->load->model('m_grafik');
        
    }
    function index(){
        $x['data3']=$this->m_grafik->get_data_stok();
        $this->load->view('Admin/v_grafik',$x);
    }

}