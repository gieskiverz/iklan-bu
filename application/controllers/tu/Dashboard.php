<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->library('m_db');
    }
    
    function index()
    {
        $meta['judul']="Dashboard Tata Usaha";
        $this->load->view('tema/header',$meta);
        $this->load->view('tu/dashboardview');
        $this->load->view('tema/footer');
    }
    
}
