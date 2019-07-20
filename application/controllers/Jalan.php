<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jalan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_jalan');
		$this->load->library('cart');
	}
	public function index()
	{
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Data Ruas Jalan',
            'active_v_data'=>'active',
            'info_admin'=>$this->modelapp->TampilData('admin'),
            'info_user'=>$this->modelapp->TampilData('admin'),
            'itemjalan'=>$this->model_jalan->getAll(),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_datajalan', $data);
		$this->load->view('element/admin_footer');
    }
    
	public function createjalan(){
		if ($this->model_jalan->create()) {
			redirect('jalan');
		}else{
			redirect('jalan');
		}
	}
	public function editjalan()
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Ruas Jalan',
            'active_v_data'=>'active',
            'info_user'=>$this->modelapp->TampilData('user'),
            'itemjalan'=>$this->model_jalan->read($this->uri->segment(3)),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_editjalan', $data);
		$this->load->view('element/admin_footer');
	}

	public function updatejalan(){
		if ($this->model_jalan->update()) {
			redirect('jalan');
		}else{
			redirect('jalan');
		}
	}
	public function deletejalan(){
		if ($this->model_jalan->delete()) {
			redirect('jalan');
		}else{
			redirect('jalan');
		}
    }
}