<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
         parent::__construct();

	     $this->load->model('modelapp'); //call model
	     $this->load->library('form_validation');
	     $this->load->helper(['form','url','security']);
         $this->load->model('model_iklan');
 }
	public function index()
	{
        check_not_login();
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Dashboard',
            'active_v_admin'=>'active',
            'info_admin'=>$this->modelapp->TampilData('admin'),
            'total_asset'=>$this->modelapp->hitungJumlahAsset(),
            'total_admin'=>$this->modelapp->hitungJumlahadmin(),
            'total_terpasang'=>$this->modelapp->hitungIklanTerpasang(),
            'iklan_pending'=>$this->modelapp->hitungIklanPending(),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['join3'] = $this->model_iklan->tampil();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_admin', $data);
		$this->load->view('element/admin_footer');
	}

	public function dataMentor()
	{
        check_not_login();
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Data Admin',
            'active_dataAdmin'=>'active',
            'info_admin'=>$this->modelapp->TampilData('admin'),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_dataMentor', $data);
		$this->load->view('element/admin_footer');
	}

	public function tambahMentor()
	{
        check_not_login();
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Tambah Admin',
            'active_tambahAdmin'=>'active',
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_tambahMentor', $data);
		$this->load->view('element/admin_footer');
	}

    public function prosestambahMentor()
    { 
        $data = array (
           
            'nm_lengkap' => $this->input->post('nm_lengkap'),
            'email' => $this->input->post('email'),
            'unit_kerja' => $this->input->post('unit_kerja'),
            'departemen' => $this->input->post('departemen'),
            'image' => $this->input->post('image'),
            'no_telp' => $this->input->post('no_telp'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id'),
            'user_aktif' => $this->input->post('user_aktif'),
            'tgl_buat' => $this->input->post('tgl_buat'),
        );
        
        $this->modelapp->insertData('admin',$data); //akses model untuk menyimpan ke database   
       
        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
                redirect('admin/dataMentor'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
                redirect('admin/tambahMentor'); //jika gagal maka akan ditampilkan form upload
            }      
                
    }

    public function editdataMentor()
    {
        check_not_login();
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Edit Data Admin',
            'active_tambahAdmin'=>'active',
            'edit_info'=>$this->modelapp->getEditAdmin(),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_editdataMentor', $data);
		$this->load->view('element/admin_footer');

    }

    public function proseseditdataMentor(){
        
        $id['id'] = $this->input->post('id');
        $data = array(

            'id' => $this->input->post('id'),
            'nm_lengkap' => $this->input->post('nm_lengkap'),
            'email' => $this->input->post('email'),
            'unit_kerja' => $this->input->post('unit_kerja'),
            'departemen' => $this->input->post('departemen'),
            'no_telp' => $this->input->post('no_telp'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id'),
            'user_aktif' => $this->input->post('user_aktif'),

        );

        $this->modelapp->updateData('admin',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('admin/dataMentor'); //jika berhasil maka akan ditampilkan view Data Mentor
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('admin/editdataMentor'); //jika gagal maka akan ditampilkan form upload
            }
    }
    
     public function hapusinfoMentor(){
        
        $id['id'] = $this->uri->segment(3);
        $this->modelapp->deleteData('admin',$id);

        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Data Berhasil Dihapus !!</div></div>");
        redirect('admin/dataMentor'); //jika berhasil maka akan ditampilkan view Data Mentor          
    }

	public function dataMember()
	{
        check_not_login();
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Data User',
            'active_dataUser'=>'active',
            'info_member'=>$this->modelapp->TampilData('user'),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_dataMember', $data);
		$this->load->view('element/admin_footer');
	}

	public function tambahMember()
	{
        check_not_login();
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Tambah User',
            'active_tambahUser'=>'active',
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/v_tambahMember', $data);
		$this->load->view('element/admin_footer');
	}

    public function prosestambahMember()
    {
        $data = array (
           
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => $this->input->post('image'),
            'nm_organisasi' => $this->input->post('nm_organisasi'),
            'no_telp' => $this->input->post('no_telp'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id'),
            'user_aktif' => $this->input->post('user_aktif'),
            'tgl_buat' => $this->input->post('tgl_buat'),

        );
        
        $this->modelapp->insertData('user',$data); //akses model untuk menyimpan ke database   
       
        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
                redirect('admin/dataMember'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
                redirect('admin/tambahMember'); //jika gagal maka akan ditampilkan form upload
            }      
                
    }

    public function editdataMember()
    {
        check_not_login();
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Edit Data User',
            'active_tambahUser'=>'active',
            'edit_info'=>$this->modelapp->getEditMember(),
        );
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('admin/v_editdataMember', $data);
        $this->load->view('element/admin_footer');

    }

    public function proseseditdataMember(){

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
                redirect('admin/dataMember'); //jika berhasil maka akan ditampilkan view Data Mentor
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('admin/editdataMember'); //jika gagal maka akan ditampilkan form upload
            }
    }
    
     public function hapusinfoMember(){
        
        $id['id'] = $this->uri->segment(3);
        $this->modelapp->deleteData('user',$id);

        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Data Berhasil Dihapus !!</div></div>");
        redirect('admin/dataMember'); //jika berhasil maka akan ditampilkan view Data Member
    }

	public function myProfile()
	{
        check_not_login();
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'My Profile',
            'active_myProfile'=>'active',
            //'info_admin'=>$this->modelapp->TampilData('admin'),
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('v_myProfile', $data);
		$this->load->view('element/admin_footer');
	}

    public function editMyProfile()
    {
        check_not_login();
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Edit My Profile',
            'active_myProfile'=>'active',
            'info_member'=>$this->modelapp->TampilData('user'),
        );
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('v_editMyProfile', $data);
        $this->load->view('element/admin_footer'); 
    }

    public function proseseditMyProfile()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        //Upload Image
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) 
        {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) 
            {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');
   
        $this->session->set_flashdata("pesan", "<div class=\"col-lg-8\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
        redirect('admin/myProfile'); //jika berhasil maka akan ditampilkan view Data Mentor
    }

    public function gantiPassword()
    {
        check_not_login();
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Ganti Password',
            'active_v_admin'=>'active',
        );
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('v_gantiPassword', $data);
        $this->load->view('element/admin_footer');
    }

    public function prosesgantiPassword()      
    {   
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_lama','Password Lama', 'trim');
        $this->form_validation->set_rules('password_baru1','Password','trim|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2','Password','trim|matches[password_baru1]');

        if( $this->form_validation->run() == false) {
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal, Data Tidak Ditambakan !!</div></div>");
            redirect('admin/gantiPassword');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Password Lama Salah !!</div></div>");
                redirect('admin/gantiPassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Password Baru Tidak Boleh Sama Dengan yang Lama !!</div></div>");
                    redirect('admin/gantiPassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
               
                    $this->session->set_flashdata("pesan", "<div class=\"col-lg-8\"><div class=\"alert alert-success\">Password Berhasil Diupdate </div></div>");
                    redirect('admin/myProfile');
                }
            }
        }
    }
}

           