<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_iklan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_tipe');
	}
	public function index()
	{
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Data Materi Iklan',
            'active_v_data'=>'active',
            'info_admin'=>$this->modelapp->TampilData('admin'),
            'info_user'=>$this->modelapp->TampilData('admin'),
            'itemtipe'=>$this->model_tipe->getAll(),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_tipe_iklan', $data);
		$this->load->view('element/admin_footer');
    }
    
	public function createtipe(){
		if ($this->model_tipe->create()) {
			redirect('tipe_iklan');
		}else{
			redirect('tipe_iklan');
		}
	}
	public function edittipe()
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Data Tipe Iklan',
            'active_v_data'=>'active',
            'info_user'=>$this->modelapp->TampilData('user'),
            'itemtipe'=>$this->model_tipe->read($this->uri->segment(3)),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_edittipe', $data);
		$this->load->view('element/admin_footer');
	}

	public function updatetipe(){
		if ($this->model_tipe->update()) {
			redirect('tipe_iklan');
		}else{
			redirect('tipe_iklan');
		}
	}
	public function deletetipe(){
		if ($this->model_tipe->delete()) {
			redirect('tipe_iklan');
		}else{
			redirect('tipe_iklan');
		}
	}

	

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */