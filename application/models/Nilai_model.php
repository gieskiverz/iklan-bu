<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function getAll(){
		$query = $this->db->get('nilai_kategori')->result();
		return $query;
	}
	
}