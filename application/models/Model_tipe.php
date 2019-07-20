<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tipe extends CI_Model {

	public function create(){
		$data = array('nama_tipe' => $this->input->post('nama_tipe'));
		$query = $this->db->insert('tipe_iklan', $data);
		return $query;
	}
	public function getAll(){
		$query = $this->db->get('tipe_iklan');//mengambil semua data jalan
		return $query;
	}
	public function read($id){
		$this->db->where('id_tipe', $id);//mengambil data jalan berdasarkan id_jalan
		$query = $this->db->get('tipe_iklan');
		return $query;
	}
	public function update(){
		$data = array('nama_tipe'=>$this->input->post('nama_tipe'));
		$this->db->where('id_tipe', $this->input->post('id_tipe'));//mengupdate berdasarkan id_jalan
		$query = $this->db->update('tipe_iklan', $data);
		return $query;
	}
	public function delete(){
		$this->db->where('id_tipe', $this->uri->segment(3));//menghapus berdasarkan id_jalan
		$query = $this->db->delete('tipe_iklan');
		return $query;
	}
	public function get_tipe(){
        $hasil=$this->db->query("SELECT * FROM tipe_iklan");
        return $hasil;
    }
 
    public function get_jenis($id){
        $hasil=$this->db->query("SELECT * FROM jenis_iklan WHERE id_tipe='$id'");
        return $hasil->result();
    }
}

/* End of file model_jalan.php */
/* Location: ./application/models/model_jalan.php */