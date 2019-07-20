<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_iklan extends CI_Model {

	public function tampil() {
	     $this->db->select('*');
	     $this->db->from('submit_iklan');
	     $this->db->join('user','user.email=submit_iklan.email');
	     $this->db->join('tipe_iklan','tipe_iklan.id_tipe=submit_iklan.tipe_iklan');
	     $this->db->join('jenis_iklan','jenis_iklan.id_tipe=submit_iklan.jenis_iklan');
	     $query = $this->db->get();
	     return $query->result();
	    }
	}

	public function create(){
		$data = array('nama_jenis' => $this->input->post('nama_jenis'),
			'id_tipe'=>$this->input->post('id_tipe'),'ukuran'=>$this->input->post('ukuran'),'harga'=>$this->input->post('harga'));
		$query = $this->db->insert('jenis_iklan', $data);
		return $query;
	}
	public function getAll(){
		$query = $this->db->get('jenis_iklan');//mengambil semua data jalan
		return $query;
	}
	public function read($id){
		$this->db->where('id_jenis', $id);//mengambil data jalan berdasarkan id_jalan
		$query = $this->db->get('jenis_iklan');
		return $query;
	}
	public function update(){
		$data = array('nama_jenis'=>$this->input->post('nama_jenis'),
			'id_tipe'=>$this->input->post('id_tipe'),'ukuran'=>$this->input->post('ukuran'),'harga'=>$this->input->post('harga'));
		$this->db->where('id_jenis', $this->input->post('id_jenis'));//mengupdate berdasarkan id_jalan
		$query = $this->db->update('jenis_iklan', $data);
		return $query;
	}
	public function delete(){
		$this->db->where('id_jenis', $this->uri->segment(3));//menghapus berdasarkan id_jalan
		$query = $this->db->delete('jenis_iklan');
		return $query;
	}

	public function get_jenis($id){
        $hasil=$this->db->query("SELECT * FROM jensi_iklan WHERE id_tipe='$id'");
        return $hasil->result();
    }
}

/* End of file model_jalan.php */
/* Location: ./application/models/model_jalan.php */