<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_tujuan extends CI_Model
{	
    function __construct()
    {
         $this->load->library('m_db');
    }
    
    function tujuan_data($where=array(),$order="judul ASC")
    {
		$d=$this->m_db->get_data('tujuan',$where,$order);
		return $d;
	}
	
	function tujuan_info($beaID,$output)
	{
		$s=array(
		'id_tujuan'=>$beaID,
		);
		$item=$this->m_db->get_row('tujuan',$s,$output);
		return $item;
	}
	
	function tujuan_add($judul,$keterangan)
	{
		$d=array(
		'judul'=>$judul,
		'keterangan'=>$keterangan,
		);
		if($this->m_db->add_row('tujuan',$d)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	
	function tujuan_edit($beaID,$judul,$keterangan)
	{
		$s=array(
		'id_tujuan'=>$beaID,
		);
		$d=array(
		'judul'=>$judul,
		'keterangan'=>$keterangan,
		);
		if($this->m_db->edit_row('tujuan',$d,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	
	function tujuan_delete($beaID)
	{
		$s=array(
		'id_tujuan'=>$beaID,
		);		
		if($this->m_db->delete_row('tujuan',$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	
	function tujuan_open($beaID)
	{
		$s=array(
		'id_tujuan'=>$beaID,
		);
		$d=array(		
		'status'=>'buka',
		);
		if($this->m_db->edit_row('tujuan',$d,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	function tujuan_close($beaID)
	{
		$s=array(
		'id_tujuan'=>$beaID,
		);
		$d=array(		
		'status'=>'tutup',
		);
		if($this->m_db->edit_row('tujuan',$d,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	
	function peserta_add($siswaID,$kelas,$jurusan,$wali,$tujuanID,$kriteriaData=array())
	{
		$s=array(
        'kelas'=>$kelas,
        'jurusan'=>$jurusan,
        'walikelas_id'=>$wali,
        'siswa_id'=>$siswaID,
        );
        if($this->m_db->is_bof('siswa',$s)==FALSE)
        {
        	if(!empty($kriteriaData))
        	{
				$d=array(
				'id_tujuan'=>$tujuanID,
				'siswa_id'=>$siswaID,
				);
				if($this->m_db->add_row('peserta',$d)==TRUE)
				{
					$pesertaID=$this->m_db->last_insert_id();
					foreach($kriteriaData as $rK=>$rV)
					{
						$d2=array(
						'peserta_id'=>$pesertaID,
						'kriteria_id'=>$rK,
						'nilai_id'=>$rV,
						);
						$this->m_db->add_row('peserta_nilai',$d2);
					}
					return true;
				}else{
					//echo "GAGAL TAMBAH PESERTA";
					return false;
				}
			}else{
				//echo "DATA KRITERIA TAK ADA";
				return false;
			}		
		}else{
			//echo "SISWA TIDAK ADA";
			return false;
		}
	}
	
	function peserta_edit($pesertaID,$siswaID,$kelas,$jurusan,$wali,$tujuanID,$kriteriaData=array())
	{
		$s=array(
        'kelas'=>$kelas,
        'jurusan'=>$jurusan,
        'walikelas_id'=>$wali,
        'siswa_id'=>$siswaID,
        );
        if($this->m_db->is_bof('siswa',$s)==FALSE)
        {
        	$speserta=array(
        	'peserta_id'=>$pesertaID,
        	);
        	
        	if($this->m_db->is_bof('peserta',$speserta)==FALSE)
        	{
							
        	if(!empty($kriteriaData))
        	{
				$d=array(
				'id_tujuan'=>$tujuanID,
				'siswa_id'=>$siswaID,
				);
				if($this->m_db->edit_row('peserta',$d,$speserta)==TRUE)
				{
					//$pesertaID=$this->m_db->last_insert_id();
					foreach($kriteriaData as $rK=>$rV)
					{
						$s2=array(
						'peserta_id'=>$pesertaID,
						'kriteria_id'=>$rK,
						);
						if($this->m_db->is_bof('peserta_nilai',$s2)==TRUE)
						{
							$d2=array(
							'peserta_id'=>$pesertaID,
							'kriteria_id'=>$rK,
							'nilai_id'=>$rV,
							);
							$this->m_db->add_row('peserta_nilai',$d2);
						}else{
							$d2=array(												
							'nilai_id'=>$rV,
							);
							$this->m_db->edit_row('peserta_nilai',$d2,$s2);
						}						
					}
					return true;
				}else{
					//echo "GAGAL UBAH PESERTA";
					return false;
				}
			}else{
				//echo "DATA KRITERIA TAK ADA";
				return false;
			}	
			
			}else{
				return false;
			}	
		}else{
			//echo "SISWA TIDAK ADA";
			return false;
		}
	}
	
	function peserta_delete($pesertaID,$kelas,$jurusan,$wali)
	{
		$siswaID=field_value('peserta','peserta_id',$pesertaID,'siswa_id');
		$s=array(
        'kelas'=>$kelas,
        'jurusan'=>$jurusan,
        'walikelas_id'=>$wali,
        'siswa_id'=>$siswaID,
        );
        if($this->m_db->is_bof('siswa',$s)==FALSE)
        {
        	$speserta=array(
        	'peserta_id'=>$pesertaID,
        	);
        	
        	if($this->m_db->is_bof('peserta',$speserta)==FALSE)
        	{
        		if($this->m_db->delete_row('peserta',$speserta)==TRUE)
        		{
        			$this->m_db->delete_row('peserta_nilai',$speserta);
					return true;
				}else{
					return false;
				}
        		
        	}else{
				return false;
			}
        }else{
			return false;
		}
	}
	
	function peserta_delete_admin($pesertaID)
	{
		$siswaID=field_value('peserta','peserta_id',$pesertaID,'siswa_id');		
    	$speserta=array(
    	'peserta_id'=>$pesertaID,
    	);
    	
    	if($this->m_db->is_bof('peserta',$speserta)==FALSE)
    	{
    		if($this->m_db->delete_row('peserta',$speserta)==TRUE)
    		{
    			$this->m_db->delete_row('peserta_nilai',$speserta);
				return true;
			}else{
				return false;
			}
    		
    	}else{
			return false;
		}
	}
	
	function proseshitung($tujuanID)
	{
		$s=array(
		'id_tujuan'=>$tujuanID,
		);
		$dKriteria=$this->mod_kriteria->kriteria_data();
		if($this->m_db->is_bof('tujuan',$s)==FALSE)
		{
			$dPeserta=$this->m_db->get_data('peserta',$s);
			if(!empty($dPeserta))
			{
				
				foreach($dPeserta as $rPeserta)
				{
					$pesertaID=$rPeserta->peserta_id;
					$siswaID=$rPeserta->siswa_id;
					$NISN=field_value('siswa','siswa_id',$siswaID,'nisn');
					$nama=field_value('siswa','siswa_id',$siswaID,'nama');			
					if(!empty($dKriteria))
					{
						$total=0;
						foreach($dKriteria as $rKriteria)
						{						
							$kriteriaid=$rKriteria->kriteria_id;
							$subkriteria=peserta_nilai($pesertaID,$kriteriaid);
							$nilaiID=field_value('subkriteria','subkriteria_id',$subkriteria,'nilai_id');
							$nilai=field_value('nilai_kategori','nilai_id',$nilaiID,'nama_nilai');
							$prioritas=ambil_prioritas($tujuanID,$subkriteria);
							$total+=$prioritas;							
						}						
					}
					
					$shasil=array(
					'peserta_id'=>$pesertaID,
					'id_tujuan'=>$tujuanID,
					);
					$dhasil=array(
					'total'=>$total,
					);
					$this->m_db->edit_row('peserta',$dhasil,$shasil);
					$kuota=$this->tujuan_info($tujuanID,'kuota');
			
					$dPH=$this->m_db->get_data('peserta',$s,'total DESC');
					$rank=0;
					foreach($dPH as $rPH)
					{
						$rank+=1;
						$d=array();
						if($rank <= $kuota)
						{
							$d=array(
							'status'=>'lolos',
							);
						}else{
							$d=array(
							'status'=>'tidak lolos',
							);
						}
						$this->m_db->edit_row('peserta',$d,array('peserta_id'=>$rPH->peserta_id));
					}
					
					return true;
				}								
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}
}