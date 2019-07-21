<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Daftar_tujuan_model extends CI_Model
{
	 

	public function __construct()
	{
		parent::__construct(); 
    }  
    
    
	public function insert($data){
		$this->db->insert('daftar_tujuan', $data);
		return $this->db->insert_id();
    }
    
	public function insertNilai($data){
		$this->db->insert('daftar_tujuan_nilai', $data);
		return $this->db->insert_id();
	}

	public function update($data,$where){
		$this->db->update('daftar_tujuan', $data, $where);
		return $this->db->affected_rows();
	}
	
	public function delete($where){
		$this->db->where($where);
		$this->db->delete('daftar_tujuan'); 
		if($this->db->affected_rows()){
			return TRUE;
		}
		return FALSE;
	}

    function getOneBy($where = array()){
        $this->db->select("*")->from("daftar_tujuan"); 
		$this->db->where($where); 

		$query = $this->db->get();
		if ($query->num_rows() >0){  
    		return $query->row(); 
    	} 
    	return FALSE;
	}

	function getAllBy($where)
    {
		$this->db->select("*")->from("daftar_tujuan");  
		$this->db->join("jalan","jalan.id_jalan = daftar_tujuan.jalan_id");
		$this->db->join("tujuan","tujuan.id_tujuan = daftar_tujuan.tujuan_id");
		if (!empty($where)) {
			$this->db->where($where);
		} 
       	$result = $this->db->get();
        if($result->num_rows()>0)
        {
            return $result->result();  
        }
        else
        {
            return null;
        }
    }

    function getCountAllBy($limit,$start,$search,$order,$dir,$where)
    {
		$this->db->select("*")->from("daftar_tujuan"); 
	   	if(!empty($search)){
    		foreach($search as $key => $value){
				$this->db->like($key,$value);	
			} 	
		} 
		$this->db->where("is_deleted",0); 
		if (!empty($where)) {
			$this->db->where($where);
		}
        $result = $this->db->get();
    
        return $result->num_rows();
    } 

    function getAllJalanNotIn($where)
    {
        $this->db->select("*")->from("jalan"); 
        if (!empty($where)) {
            $this->db->where_not_in('id_jalan',$where);
        }
        $result = $this->db->get();
        if($result->num_rows()>0)
        {
            return $result->result();  
        }
        else
        {
            return null;
        }
    }
    public function getAllJalan($where)
    {
        $this->db->select("*")->from("jalan");  
		if (!empty($where)) {
			$this->db->where($where);
		} 
       	$result = $this->db->get();
        if($result->num_rows()>0)
        {
            return $result->result();  
        }
        else
        {
            return null;
        }
    }
}
