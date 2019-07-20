<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct(){
         parent::__construct();
            
	     $this->load->helper(['form','url','security']);
 }
 
	public function index()
	{
		check_not_login();

		$data['title'] = 'Pegawai Panel';

		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('pegawai/v_pegawai', $data);
		$this->load->view('element/admin_footer');
	}
}
