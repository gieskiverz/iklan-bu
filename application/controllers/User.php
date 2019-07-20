<?php 
defined('BASEPATH') or exit('no direct script access allowed');

class User extends CI_Controller{
	public function __construct(){
         parent::__construct();

	     $this->load->helper(['form','url','security']);
	     $this->load->model('model_tipe');
		$this->load->model('model_jenis');
	}

	public function index()
	{
		$data=array(
            'title'=>'JM-JTC | Home',
			'judul'=>'Home',
			'active_v_home'=>'active',

		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$aktif = array('email'=>$this->session->userdata('email'));
	    // query memanggil function tigatable di model
	    $data['join3'] = $this->modelapp->tampil($aktif);  
		$this->load->view('element/user_header', $data);
		$this->load->view('element/user_navbar', $data);
		$this->load->view('user/v_home', $data);
		$this->load->view('element/user_footer');
	}

	public function pasangiklan()
	{
		$data=array(
            'title'=>'JM-JTC | Pasang Iklan',
			'judul'=>'Pasang Iklan',
			'active_v_pasangiklan'=>'active',
			'info_user'=>$this->modelapp->TampilData('user'),
			'itemjenis'=>$this->model_jenis->getAll(),
			'itemtipe'=>$this->model_tipe->getAll(),
			'info_ruas'=>$this->modelapp->getRuas(),
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/user_header', $data);
		$this->load->view('element/user_navbar', $data);
		$this->load->view('user/v_pasangiklan', $data);
		$this->load->view('element/user_footer');
	}

	public function prosespasangiklan(){
    //membuat konfigurasi
	    $config = [
	      'upload_path' => './assets/images/',
	      'allowed_types' => 'gif|jpg|png|docx|doc|pdf',
	      'max_size' => 1000, 'max_width' => 1000,
	      'max_height' => 1000
	    ];
	    $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('proposal')) //jika gagal upload
	    {
	      $error = array('error' => $this->upload->display_errors()); //tampilkan error
	      $this->load->view('user/pasangiklan', $error);
	    } else
	    //jika berhasil upload
	    {
	    $datax = $this->upload->data();             
 
        $filename = $datax['file_name'];
	    $data = array (
           
            'email' => $this->session->userdata('email'),
			'tipe_iklan' => $this->input->post('tipe_iklan'),
			'jenis_iklan' => $this->input->post('jenis_iklan'),
			'luas' => $this->input->post('luas'),
			'lokasi' => $this->input->post('lokasi'),
			'kordinat' => $this->input->post('kordinat'),
            // 'foto' => $this->input->post('foto'),
            'proposal' => $filename,
            'tgl_pengajuan'=>date("Y-m-d"),
            'lama_iklan'=>$this->input->post('lama_iklan')
        );
        
        $this->modelapp->insertData('submit_iklan',$data); //akses model untuk menyimpan ke database   
       
        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
                redirect('user/tampiliklan'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
                redirect('user/pasangiklan'); //jika gagal maka akan ditampilkan form upload
		}  
	 
	    }
	  }

	/*public function prosespasangiklan()
	{
		$data = array (
           
            'email' => $this->session->userdata('email'),
			'tipe_iklan' => $this->input->post('tipe_iklan'),
			'jenis_iklan' => $this->input->post('jenis_iklan'),
			'lokasi' => $this->input->post('lokasi'),
			'kordinat' => $this->input->post('kordinat'),
            // 'foto' => $this->input->post('foto'),
            // 'proposal' => $this->input->post('proposal'),
        );
        
        $this->modelapp->insertData('submit_iklan',$data); //akses model untuk menyimpan ke database   
       
        if($data >= 1) {
        	$this->_uploadImage();
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
                redirect('user'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
                redirect('user'); //jika gagal maka akan ditampilkan form upload
		}  
	}
*/
	public function contact()
	{
		$data=array(
            'title'=>'JM-JTC | Contact',
			'judul'=>'Contact',
			'active_v_user'=>'active',
			'info_user'=>$this->modelapp->TampilData('user'),
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/user_header', $data);
		$this->load->view('element/user_navbar', $data);
		$this->load->view('user/v_contact', $data);
		$this->load->view('element/user_footer');
	}

	public function daftar()
	{
		$data=array(
			'title'=>'JM-JTC | Daftar',
			'info_user'=>$this->modelapp->TampilData('user'),
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/user_header', $data);
		$this->load->view('element/user_navbar', $data);
		$this->load->view('user/v_daftar', $data);
		$this->load->view('element/user_footer');
	}

	public function get_jenis(){
        $id_tipe=$this->input->post('id_tipe');
        $data=$this->model_tipe->get_jenis($id_tipe);
        echo json_encode($data);
    }

    public function tampiliklan()
	 {
	    
	  
	 	$data=array(
            'title'=>'JM-JTC | Pasang Iklan',
			'judul'=>'Pasang Iklan',
			'active_v_pasangiklan'=>'active',
			'info_user'=>$this->modelapp->TampilData('user'),
			'itemjenis'=>$this->model_jenis->getAll(),
            'itemtipe'=>$this->model_tipe->getAll(),
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		//passing data controller ke view
	    //active record 
	    $aktif = array('email'=>$this->session->userdata('email'));

	    // query memanggil function tigatable di model
	    $data['join3'] = $this->modelapp->tampil($aktif);    

		$this->load->view('element/user_header', $data);
		$this->load->view('element/user_navbar', $data);
		$this->load->view('user/v_tampiliklan', $data);
		$this->load->view('element/user_footer');
	}
	
	public function editprofile()
	{
		$data=array(
			'title'=>'JM-JTC | Profile',
			'itemuser'=>$this->modelapp->readuser($this->uri->segment(3)),
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/user_header', $data);
		$this->load->view('element/user_navbar', $data);
		$this->load->view('user/v_editprofile', $data);
		$this->load->view('element/user_footer');
	}

	public function prosesedit(){

        $id['id'] = $this->input->post('id');
        $data = array(                
            
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'image' => $this->input->post('image'),
            'nm_organisasi' => $this->input->post('nm_organisasi'),
            'no_telp' => $this->input->post('no_telp'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id'),
            'user_aktif' => $this->input->post('user_aktif'),

        );

        $this->modelapp->updateData('user',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('user'); //jika berhasil maka akan ditampilkan view Data Mentor
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('user/editprofile'); //jika gagal maka akan ditampilkan form upload
            }
    }
}