<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('set_header_message'))
{
	function set_header_message($tipe,$title,$message)
	{
		$CI=& get_instance();
		
		$CI->session->set_flashdata('message_header',array(
		'tipe'=>$tipe,
		'title'=>$title,
		'message'=>$message,
		));		
	}
}

if(!function_exists('akses'))
{
	function akses()
	{
		$CI=& get_instance();
		$data=$CI->session->userdata('infouser');
		if(!empty($data))
		{
			$item=$data['akses'];
			return $item;
		}else{
			redirect(base_url().'logout');
		}
	}
}


if(!function_exists('user_info'))
{
	function user_info($output="user_id")
	{
		$CI=& get_instance();
		
		$user=$CI->session->userdata('infouser');
		if(!empty($user))
		{
			$s=array(
			'username'=>$user['username'],
			);
			$CI->load->library('m_db');
			if($CI->m_db->is_bof('pengguna',$s)==TRUE)
			{
				redirect(base_url().'logout');
			}else{
				$item=$CI->m_db->get_row('pengguna',$s,$output);
				return $item;
			}
		}else{
			redirect(base_url().'logout');
		}
	}
}

if(!function_exists('user_avatar'))
{
	function user_avatar($size='200')
	{
		$ava=user_info('photo');
		$avaurl=base_url().'konten/images/'.$ava;
		if(@getimagesize($avaurl))
		{
			return base_url().'konten/images/'.'thumbs/'.$size.'/'.$ava;
		}else{
			return base_url().'konten/images/'.'noavatar.jpg';	
		}
	}
}

if(!function_exists('field_value'))
{
	function field_value($table,$key,$keyval,$output)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		$key=>$keyval,
		);
		$item=$CI->m_db->get_row($table,$s,$output);
		return $item;
	}
}

if(!function_exists('menu_active'))
{
	function menu_active($slug2)
	{
		$CI=& get_instance();
		$s=$CI->uri->segment(2);
		if($slug2==$s)
		{
			return true;
		}else{
			return false;
		}
	}
}

if(!function_exists('ambil_nilai_kriteria'))
{
	function ambil_nilai_kriteria($beasiswaID,$dari,$tujuan)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		'beasiswa_id'=>$beasiswaID,
		'kriteria_id_dari'=>$dari,
		'kriteria_id_tujuan'=>$tujuan,
		);
		$item=$CI->m_db->get_row('kriteria_nilai',$s,'nilai');
		return $item;
	}
}

if(!function_exists('ambil_nilai_subkriteria'))
{
	function ambil_nilai_subkriteria($beasiswaID,$kriteriaid,$dari,$tujuan)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		'kriteria_id'=>$kriteriaid,
		'beasiswa_id'=>$beasiswaID,
		'subkriteria_id_dari'=>$dari,
		'subkriteria_id_tujuan'=>$tujuan,
		);
		$item=$CI->m_db->get_row('subkriteria_nilai',$s,'nilai');
		return $item;
	}
}

if(!function_exists('peserta_nilai'))
{
	function peserta_nilai($pesertaID,$kriteriaID)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		'daftar_tujuan_id'=>$pesertaID,
		'kriteria_id'=>$kriteriaID,
		);
		$item=$CI->m_db->get_row('daftar_tujuan_nilai',$s,'nilai_id');
		return $item;
	}
}

if(!function_exists('ambil_prioritas'))
{
	function ambil_prioritas($tujuanID,$subkriteriaID)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		'tujuan_id'=>$tujuanID,
		'subkriteria_id'=>$subkriteriaID,
		);
		$item=$CI->m_db->get_row('subkriteria_hasil',$s,'prioritas');
		return $item;
	}
}

if(!function_exists('com_choice'))
{
	function com_choice($type,$name,$data,$firstVal,$att=array(),$ciVal=TRUE,$inline=FALSE)
	{
		if(!empty($data))
		{			
			$o='';			
			foreach($data as $k=>$r)
			{
				$ci='';
				if($ciVal==TRUE)
				{
					if($type="radio")
					{
						$ci=set_radio($name,$r);
					}elseif($type="checkbox"){
						$ci=set_checkbox($name,$r);
					}
				}
				$chk='';
				if($r==$firstVal)
				{
					$chk='checked="checked"';
				}
				$lblcls='';
				$div1='';
				$div2='';
				if($inline==TRUE)
				{					
					$lblcls='class="'.$type.'-inline"';
				}else{
					$div1='<div class="'.$type.'">';
					$div2='</div>';
				}
				$o.=$div1;
				$o.='<label '.$lblcls.'>';
				$o.='<input type="'.$type.'" id="'.$type.'-'.$r.'" name="'.$name.'" '.string_implode_array($att).' '.$chk.' value="'.$r.'" data-id="'.$r.'" '.$ci.'/>';
				$o.=ucwords(str_replace("-"," ",$r));
				$o.='</label>';
				$o.=$div2;
				
			}
			return $o;
		}else{
			return "";
		}
	}
}

if ( ! function_exists('string_implode_array'))
{
	function string_implode_array($attributes)
	{
		if (empty($attributes))
		{
			return '';
		}

		if (is_object($attributes))
		{
			$attributes = (array) $attributes;
		}

		if (is_array($attributes))
		{
			$atts = '';

			foreach ($attributes as $key => $val)
			{
				$atts .= ' '.$key.'="'.$val.'"';
			}

			return $atts;
		}

		if (is_string($attributes))
		{
			return ' '.$attributes;
		}

		return FALSE;
	}
}