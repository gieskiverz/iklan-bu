<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_iklan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_tipe');
		$this->load->model('model_jenis');
	}
	public function index()
	{
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Jenis Iklan',
            'active_v_data'=>'active',
            'info_admin'=>$this->modelapp->TampilData('admin'),
            'info_user'=>$this->modelapp->TampilData('admin'),
            'itemjenis'=>$this->model_jenis->getAll(),
            'itemtipe'=>$this->model_tipe->getAll(),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_jenis_iklan', $data);
		$this->load->view('element/admin_footer');
    }
    
	public function createjenis(){
		if ($this->model_jenis->create()) {
			redirect('jenis_iklan');
		}else{
			redirect('jenis_iklan');
		}
	}
	public function editjenis()
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Data Jenis Iklan',
            'active_v_data'=>'active',
            'info_user'=>$this->modelapp->TampilData('user'),
            'itemjenis'=>$this->model_jenis->read($this->uri->segment(3)),
            'itemtipe'=>$this->model_tipe->getAll(),
            'tipey'=>$this->model_tipe->read($this->uri->segment(4)),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_editjenis', $data);
		$this->load->view('element/admin_footer');
	}

	public function updatejenis(){
		if ($this->model_jenis->update()) {
			redirect('jenis_iklan');
		}else{
			redirect('jenis_iklan');
		}
	}
	public function deletejenis(){
		if ($this->model_jenis->delete()) {
			redirect('jenis_iklan');
		}else{
			redirect('jenis_iklan');
		}
	}

	function get_jenis(){
        $id=$this->input->post('id_tipe');
        $data=$this->model_jenis->get_subkategori($id);
        echo json_encode($data);
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */