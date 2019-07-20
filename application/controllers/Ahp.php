<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('model_tipe');
        $this->load->model('Modelapp');
        $this->load->library('m_db');
        $this->load->model('M_tujuan','mod_bea');
		$this->load->model('M_kriteria','mod_kriteria');
	}
	public function index()
	{
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Data Tujuan',
        );
        $data['data']=$this->mod_bea->tujuan_data();

		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_tujuan', $data);
		$this->load->view('element/admin_footer');
    }

    public function tambahTujuan()
    {
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Tambah Tujuan',
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_addTujuan', $data);
		$this->load->view('element/admin_footer');
	}
    
    public function prosestambahTujuan()
    { 
        $data = array (
           
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),

        );
        
        $this->modelapp->insertData('tujuan',$data); //akses model untuk menyimpan ke database   
       
        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
                redirect('ahp'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
                redirect('ahp/tambahTujuan'); //jika gagal maka akan ditampilkan form upload
            }      
                
    }

    public function editTujuan()
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Edit Data',
            'edit_tujuan'=>$this->modelapp->getEditTujuan(),
        );
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('admin/hirarki/v_editTujuan', $data);
        $this->load->view('element/admin_footer');
    }

    public function proseseditTujuan()
    {
        $id['id_tujuan'] = $this->input->post('id_tujuan');
        $data = array(                         
            'id_tujuan' => $this->input->post('id_tujuan'),
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
        );

        $this->modelapp->updateData('tujuan',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('ahp'); //jika berhasil maka akan ditampilkan view Data Mentor
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('ahp/editTujuan'); //jika gagal maka akan ditampilkan form upload
            }
    }

    public function kriteria()
    {
        check_not_login();
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Kriteria',
        );
        $data['data']=$this->mod_kriteria->kriteria_data();

		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_kriteria', $data);
		$this->load->view('element/admin_footer');
	}
    
    public function prosestambahKriteria()
    { 
        $data = array (
           
            'kriteria_id' => $this->input->post('kriteria_id'),
            'nama_kriteria' => $this->input->post('nama_kriteria'),

        );
        
        $this->modelapp->insertData('kriteria',$data); //akses model untuk menyimpan ke database   
       
        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
                redirect('ahp/kriteria'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
                redirect('ahp/kriteria'); //jika gagal maka akan ditampilkan form upload
            }      
                
    }

    public function editKriteria()
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Edit Data',
            'edit_kriteria'=>$this->modelapp->getEditKriteria(),
        );
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('admin/hirarki/v_editKriteria', $data);
        $this->load->view('element/admin_footer');
    }

    public function proseseditKriteria()
    {
        $id['kriteria_id'] = $this->input->post('kriteria_id');
        $data = array(                         
            'kriteria_id' => $this->input->post('kriteria_id'),
            'nama_kriteria' => $this->input->post('nama_kriteria'),
        );

        $this->modelapp->updateData('kriteria',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('ahp/kriteria'); //jika berhasil maka akan ditampilkan view Data Mentor
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('ahp/editKriteria'); //jika gagal maka akan ditampilkan form upload
            }
    }
    
    public function subKriteria()
    {
        $kriteria=$this->input->get('kriteria');
        $s=array();
        $nama="";
        if(!empty($kriteria))
        {
			$s=array(
			'kriteria_id'=>$kriteria,
			);
			$exnama=field_value('kriteria','kriteria_id',$kriteria,'nama_kriteria');
			$nama=" ".$exnama;
        }
        $s['data']=$this->mod_kriteria->subkriteria_data($s);
        $s['kriteria']=$kriteria?"?kriteria=".$kriteria:"";

		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Parameter',
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data,$s,$kriteria);
		$this->load->view('element/admin_sidebar', $data,$s,$kriteria);
		$this->load->view('element/admin_topbar', $data,$s,$kriteria);
		$this->load->view('admin/hirarki/v_subKriteria', $data,$s,$kriteria);
		$this->load->view('element/admin_footer');
    }
    
    public function addSubKriteria()
    {
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Parameter',
        );
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_addSubKriteria', $data);
		$this->load->view('element/admin_footer');
    }

    public function prosestambahsubKriteria()
    { 
        // $data = array (
           
        //     'ref' => $this->input->get('kriteria'),
		// 	'link' => $ref?"?kriteria=".$ref:"",
        //     'kriteriaid' => $this->input->post('kriteriaid'),
        //     'nilaiid' => $this->input->post('nilaiid'),
        //     'tipe' => $this->input->post('tipe'),
        //     'max' => $this->input->post('max'),
        //     'opmax' => $this->input->post('opmax'),
        //     'min' => $this->input->post('min'),
        //     'opmin' => $this->input->post('opmin'),
        //     'ket' => $this->input->post('ket'),

        // );
        
        // $this->modelapp->insertData('subkriteria',$data); //akses model untuk menyimpan ke database   
       
        // if($data >= 1) {
        //         $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
        //         redirect('ahp/subKriteria'); //jika berhasil maka akan ditampilkan view vupload
        //     }else{

        //         //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
        //         $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
        //         redirect('ahp/addSubKriteria'); //jika gagal maka akan ditampilkan form upload
        //     }
        $this->form_validation->set_rules('kriteriaid','Kriteria Utama','required');
		$this->form_validation->set_rules('nilaiid','Tipe','required');
		if($this->form_validation->run()==TRUE)
		{
			$ref=$this->input->get('kriteria');
			$link=$ref?"?kriteria=".$ref:"";
			$kriteriaid=$this->input->post('kriteriaid');
			$nilaiid=$this->input->post('nilaiid');
			$tipe=$this->input->post('tipe');			
			$max=$this->input->post('max');
			$opmax=$this->input->post('opmax');
			$min=$this->input->post('min');
			$opmin=$this->input->post('opmin');
			$ket=$this->input->post('ket');
			
			$isi='';
			if($tipe=="teks")
			{
				$isi=$ket;
			}elseif($tipe=="nilai"){
				$isi=$max;
			}
			if($this->mod_kriteria->subkriteria_add($tipe,$kriteriaid,$opmax,$isi,$opmin,$min,$nilaiid)==TRUE)
			{
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
				redirect(base_url('ahp/subKriteria').$link);
			}else{
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
				redirect(base_url('ahp/addSubKriteria').$link);
			}
		}else{
			$kriteria=$this->input->get('kriteria');
			$link=$kriteria?"?kriteria=".$kriteria:"";
			$nama=field_value('kriteria','kriteria_id',$kriteria,'nama_kriteria');
			$meta['judul']="Tambah Parameter ".$nama;
            $this->load->view('element/admin_header', $meta);
            $this->load->view('element/admin_sidebar', $data,$d,$link);
		    $this->load->view('element/admin_topbar', $data,$d,$link);
	        $d['utama']=$this->mod_kriteria->kriteria_data();
	        $d['nilai']=$this->m_db->get_data('nilai_kategori');
	        $d['kriteria']=$kriteria;
	        $d['link']=$link;
            $this->load->view('admin/hirarki/v_addSubKriteria', $data,$d,$link);
		    $this->load->view('element/admin_footer');
		}
	}

    public function editsubKriteria()
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Edit Data',
            'edit_kriteria'=>$this->modelapp->getEditKriteria(),
        );
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('admin/hirarki/v_editSubKriteria', $data);
        $this->load->view('element/admin_footer');
    }

    public function proseseditsubKriteria()
    {
        $id['kriteria_id'] = $this->input->post('kriteria_id');
        $data = array(                         
            'kriteria_id' => $this->input->post('kriteria_id'),
            'nama_kriteria' => $this->input->post('nama_kriteria'),
        );

        $this->modelapp->updateData('kriteria',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('ahp/kriteria'); //jika berhasil maka akan ditampilkan view Data Mentor
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('ahp/editKriteria'); //jika gagal maka akan ditampilkan form upload
            }
    }
    
	public function delete()
	{
        $id['id_tujuan'] = $this->uri->segment(3);
        $this->modelapp->deleteData('tujuan',$id);

        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Data Berhasil Dihapus !!</div></div>");
        redirect('ahp');
    }
    
    public function deleteKriteria()
	{
        $id['kriteria_id'] = $this->uri->segment(3);
        $this->modelapp->deleteData('kriteria',$id);

        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Data Berhasil Dihapus !!</div></div>");
        redirect('ahp/kriteria');
	}

	function proses()
	{
		$id=$this->input->get('id');
		$nama=$this->mod_bea->beasiswa_info($id,'judul');
		$meta['judul']="Daftar Penerima Beasiswa ".$nama;
        $this->load->view('tema/header',$meta);
        $d['data']=$this->mod_bea->beasiswa_data(array('beasiswa_id'=>$id));
        $this->load->view(akses().'/beasiswa/beasiswa/prosesview',$d);
        $this->load->view('tema/footer');
	}
	
	function proseshitung()
	{
		$id=$this->input->get('id');
		$this->mod_bea->proseshitung($id);		
		if($this->mod_bea->proseshitung($id)==TRUE)
		{
			//set_header_message('success','Proses Beasiswa','Beasiswa telah diproses');
			//redirect(base_url(akses().'/beasiswa/beasiswa').'?id='.$id);
			echo json_encode(array('status'=>'ok'));
		}else{
			//set_header_message('danger','Proses Beasiswa','Beasiswa gagal diproses');
			//redirect(base_url(akses().'/beasiswa/beasiswa'));
			echo json_encode(array('status'=>'no'));
		}		
    }
    
}