<?php 
defined('BASEPATH') or exit('no direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		 parent::__construct();
		 		 
	     $this->load->model('m_login'); //call model
	     $this->load->library('form_validation','email');
	     $this->load->helper(['form','url','security']);

	}
	 
	public function index()
	{
		check_already_login();
		$data['title']= 'Login';

		$this->load->view('element/user_header', $data);
		$this->load->view('element/user_navbar', $data);
		$this->load->view('login/v_registrasi');
		$this->load->view('element/user_footer');
	}

	function masukUser()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' =>$email])->row_array();

		if($user){
			
			if ($user['user_aktif'] == '1') {

				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 3) {

						redirect('user');

					} 
					
				} else {
					$this->session->set_flashdata('pesan', 'Password Salah !!');
					redirect('login');	
				}
			} else {
			$this->session->set_flashdata('pesan', 'Maaf, Email Tidak Aktif !!');
			redirect('login');	
			}
		} else {
			$this->session->set_flashdata('pesan', 'Maaf, Email Belum Terdaftar !!');
			redirect('login');
		}
	}

	function masukAdmin()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('admin', ['email' =>$email])->row_array();

		if($user){
			
			if ($user['user_aktif'] == '1') {

				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == Admin) {

						redirect('admin');

					} elseif ($user['role_id'] == Pegawai) {

						redirect('pegawai');

					}
					
				} else {
					$this->session->set_flashdata('pesan3', 'Password Salah !!');
					redirect('login');	
				}
			} else {
			$this->session->set_flashdata('pesan3', 'Maaf, Email Tidak Aktif !!');
			redirect('login');	
			}
		} else {
			$this->session->set_flashdata('pesan3', 'Maaf, Email Belum Terdaftar !!');
			redirect('login');
		}
	}

	function registrasi()
	{
		$this->form_validation->set_rules('name','Name', 'trim');
		$this->form_validation->set_rules('email','Email', 'trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email Tidak Tersedia!'
		]);
		$this->form_validation->set_rules('password1','Password','trim|matches[password2]');
		$this->form_validation->set_rules('password2','Password','trim|matches[password1]', [
			'matches' => 'Password Tidak Sama!'
		]);

		if( $this->form_validation->run() == false) {
			$this->session->set_flashdata('pesan2', 'Gagal, Email / Password tidak valid!');
			//redirect('login#signupform');
			redirect('login');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'nm_organisasi' => htmlspecialchars($nm_organisasi),
				'no_telp' => htmlspecialchars($no_telp),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'user_aktif' => 1,
				'tgl_buat' => time()
			];
			// // token
			// $token = base64_encode(random_str(32)); <<<<<<<<<<<<<<salah
			// $user_token = [
			// 	'email' => $email,
			// 	'token' => $token,
			// 	'tgl_buat' => time()
			// ];

			$this->db->insert('user', $data);
			// $this->db->insert('user_token', $user_token);

			// $this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('pesan2', 'Sukses, Silakan Login !!');
			redirect('login');
		}
	}

	function keluar()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('pesan', 'Sukses, Anda Berhasil Keluar.');
		redirect('login');
	}
}