<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_tipe');
		$this->load->model('model_jenis');
		$this->load->model('model_iklan');
	}
	public function index()
	{
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Iklan',
            'active_v_data'=>'active',
            'info_admin'=>$this->modelapp->TampilData('admin'),
            'info_user'=>$this->modelapp->TampilData('admin'),
            'itemjenis'=>$this->model_jenis->getAll(),
            'itemtipe'=>$this->model_tipe->getAll(),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['join3'] = $this->model_iklan->tampil();  

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_iklan', $data);
		$this->load->view('element/admin_footer');

    }

    public function aproval()
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Aproval Iklan',
            'active_v_data'=>'active',

        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$aktif = array('row_id'=>$this->uri->segment(3));

	    // query memanggil function tigatable di model
	    $data['join3'] = $this->model_iklan->aproval($aktif);    
		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_aproval', $data);
		$this->load->view('element/admin_footer');
	}

	public function update(){
		if ($this->model_iklan->update()) {
			redirect('iklan');
		}else{
			redirect('iklan');
		}
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */