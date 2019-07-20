<?php

class Modelapp extends CI_Model{

    function __construct(){
        parent::__construct();
    }

     function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data)->result();
    }

   function TampilData($table)
    {
       return $this->db->get($table)->result();
    }

    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    public function getRuas()
    {
		$query = $this->db->get('jalan');//mengambil semua data jalan
		return $query;
	}

    function getEditAdmin(){

        $id = $this->uri->segment(3);
        
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getEditMember(){

        $id = $this->uri->segment(3);
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getEditTujuan(){

        $id = $this->uri->segment(3);
        
        $this->db->select('*');
        $this->db->from('tujuan');
        $this->db->where('id_tujuan', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getEditKriteria(){

        $id = $this->uri->segment(3);
        
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('kriteria_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function readuser($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './asset/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('proposal')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    // private function _deleteImage($id)
    // {
    //     $product = $this->getById($id);
    //     if ($product->image != "default.jpg") {
    //         $filename = explode(".", $product->image)[0];
    //         return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
    //     }
    // }


    public function tampil($aktif) {
     $this->db->select('*');
     $this->db->from('submit_iklan');
     $this->db->join('tipe_iklan','tipe_iklan.id_tipe=submit_iklan.tipe_iklan');
     $this->db->join('jenis_iklan','jenis_iklan.id_jenis=submit_iklan.jenis_iklan');
     $this->db->where($aktif);
     $query = $this->db->get();
     return $query->result();
    }

    public function hitungJumlahAsset()
    {   
        $query = $this->db->get('user');
        if($query->num_rows()>0)
        {
        return $query->num_rows();
        }
        else
        {
        return 0;
        }
    }

    public function hitungJumlahadmin()
    {
        $query = $this->db->get('admin');
        if($query->num_rows()>0)
        {
        return $query->num_rows();
        }
        else
        {
        return 0;
        }
    }

    public function hitungIklanTerpasang()
    {
        $sql = "SELECT count(status) as status from submit_iklan where status = 'Aktif'";
        $result = $this->db->query($sql);
        return $result->row()->status;
    }

    public function hitungIklanPending()
    {
        $sql = "SELECT count(status) as status from submit_iklan where status = 'Tidak Akti'";
        $result = $this->db->query($sql);
        return $result->row()->status;
    }
}