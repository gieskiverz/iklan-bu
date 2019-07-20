<?php
defined('BASEPATH') or exit('no direct access allowed');

class m_login extends CI_Model{
	
	function cek($email, $password){
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get('user');
	}

	function daftar(){
      date_default_timezone_set('ASIA/JAKARTA');
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
		'image' => 'default.jpg',
		'password' => $this->input->post('password'),
		'role_id' => 2,
		'user_aktif' => 1,
		'tgl_buat' => date()
      );
      return $this->db->insert('user', $data);
    }
}