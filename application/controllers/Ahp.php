<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('model_tipe');
        $this->load->model('Nilai_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Modelapp');
        $this->load->library('m_db');
        $this->load->model('M_tujuan','mod_bea');
        $this->load->model('Daftar_tujuan_model');
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
            'tahun' => $this->input->post('tahun'),
            'kuota' => $this->input->post('kuota'),

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
    
    public function subKriteria($id)
    {
        check_not_login();
        $kriteria=$id;
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
        
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Parameter',
        );

        $data['datas']=$this->mod_kriteria->subkriteria_data($s);
        $data['kriteria']=$kriteria?"?kriteria=".$kriteria:"";
        
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_subKriteria', $data);
		$this->load->view('element/admin_footer');
    }
    
    public function addSubKriteria()
    {
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Parameter',
        );
        $data['kriteria'] = $this->input->get('kriteria');
        $data['nilai'] = $this->Nilai_model->getAll();
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_addSubKriteria', $data);
		$this->load->view('element/admin_footer');
    }

    public function prosestambahsubKriteria()
    { 
       
        $this->form_validation->set_rules('nilaiid','Nilai','required');
		$this->form_validation->set_rules('tipe','Tipe','required');
		if($this->form_validation->run()==TRUE)
		{
			$ref=$this->input->get('kriteria');
			$link=$ref?"/".$ref:"";
			$kriteriaid=$ref;
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
            redirect(base_url('ahp/addSubKriteria'));
		}
	}

    public function editsubKriteria($id)
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Edit Data',
            'edit_kriteria'=>$this->modelapp->getEditKriteria(),
        );
        $data['data']   = $this->db->get_where('subkriteria', ['subkriteria_id' => $id])->row(); 
        $data['nilai'] = $this->Nilai_model->getAll();
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('admin/hirarki/v_editSubKriteria', $data);
        $this->load->view('element/admin_footer');
    }

    public function proseseditsubKriteria()
    {
        $ref=$this->input->get('kriteria');
        $kriteriaid = $ref;
        $link=$ref?"/".$ref:"";
        $id = $this->input->post('subkriteria_id');
        $link2=$id?"/".$id:"";
        $nilaiid = $this->input->post('nilaiid');
        $tipe = $this->input->post('tipe');			
        $max = $this->input->post('max');
        $opmax = $this->input->post('opmax');
        $min = $this->input->post('min');
        $opmin = $this->input->post('opmin');
        $ket = $this->input->post('ket');
        
        $isi='';
        if($tipe=="teks")
        {
            $isi=$ket;
        }elseif($tipe=="nilai"){
            $isi=$max;
        }
        
        if($this->mod_kriteria->subkriteria_edit($id,$tipe,$kriteriaid,$opmax,$isi,$opmin,$min,$nilaiid)==TRUE)
        {
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diedit </div></div>");
            redirect(base_url('ahp/subKriteria').$link);
        }else{
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Edit silahkan coba lagi !</div></div>");
            redirect(base_url('ahp/editSubKriteria').$link2);
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
    
    public function deleteSubkriteria()
	{
        $kriteria = $this->uri->segment(3);
        $id['subkriteria_id'] = $this->uri->segment(4);
        $this->modelapp->deleteData('subkriteria',$id);

        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Data Berhasil Dihapus !!</div></div>");
        redirect('ahp/subKriteria/'.$kriteria);
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
    
    public function DaftarTujuan()
    {
        check_not_login();
        
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Daftar Tujuan',
        );
        $data['datas'] = $this->Daftar_tujuan_model->getAllBy([]);
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_daftarTujuan', $data);
		$this->load->view('element/admin_footer');
    }

    public function addDaftarTujuan()
    {
		$data=array(
            'title'=>'Admin Panel',
            'judul'=>'Tambah Daftar Tujuan',
        );
        $data['kriteria'] = $this->db->get('kriteria')->result();
        $data['tujuan'] = $this->db->get('tujuan')->result();
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_addDaftarTujuan', $data);
		$this->load->view('element/admin_footer');
    }
    public function get_ruas()
    {
        $tujuan = $this->input->get('tujuan');
        $tujuan_active = $this->input->get('tujuan_active');
        if(!empty($tujuan))
		{
			$where=array(
			'tujuan_id'=>$tujuan,
            );
            
			$daftar_tujuan = $this->Daftar_tujuan_model->getAllBy($where);
			if(!empty($daftar_tujuan))
			{
                $list=[];
				foreach($daftar_tujuan as $dt)
				{
                    if ($tujuan_active != $dt->jalan_id) {
                        $list[] = $dt->jalan_id;
                    }
                }

                $where=$list;  
                $not_in = $this->Daftar_tujuan_model->getAllJalanNotIn($where);
				echo json_encode($not_in);
			}else{
				$d=$this->Daftar_tujuan_model->getAllJalan([]);
				echo json_encode($d);
			}
		}else{
			echo json_encode(array());
		}
    }

    public function prosestambahDaftarTujuan()
    { 
       
        $this->form_validation->set_rules('tujuan','Tujuan','required');
		if($this->form_validation->run()==TRUE)
		{
            $data= [
                "tujuan_id" => $this->input->post('tujuan'),
                "jalan_id" => $this->input->post('ruas'),
                "status" => "daftar",
                "total" => 0
            ];
            $insert = $this->Daftar_tujuan_model->insert($data);
            if ($insert) {
                $data_nilai = [];
                $kriteria_post = $this->input->post('kriteria');
                $kriteria = $this->Kriteria_model->kriteria_data([]);
                foreach ($kriteria as $k) {
                    $data_nilai = [
                       "daftar_tujuan_id" => $insert,
                       "kriteria_id" => $k->kriteria_id,
                       "nilai_id" => $kriteria_post[$k->kriteria_id]
                   ];
                   $insertNilai = $this->Daftar_tujuan_model->insertNilai($data_nilai);
                }    
            }
			if($insertNilai)
			{
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
				redirect(base_url('ahp/DaftarTujuan'));
			}else{
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
				redirect(base_url('ahp/DaftarTujuan'));
			}
		}
    }
    
    public function editDaftarTujuan($id)
    {
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Edit Daftar Tujuan'
        );
        $data['kriteria'] = $this->db->get('kriteria')->result();
        $data['tujuan'] = $this->db->get('tujuan')->result();
        $data['data']   = $this->db->get_where('daftar_tujuan', ['daftar_tujuan_id' => $id])->row(); 
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('admin/hirarki/v_editDaftarTujuan', $data);
        $this->load->view('element/admin_footer');
    }

    public function proseseditDaftarTujuan()
    { 
       
        $this->form_validation->set_rules('tujuan','Tujuan','required');
		$this->form_validation->set_rules('ruas','Ruas','required');
		if($this->form_validation->run()==TRUE)
		{
            $where = ["daftar_tujuan_id" => $this->input->post('id')]; 
            $data= [
                "tujuan_id" => $this->input->post('tujuan'),
                "jalan_id" => $this->input->post('ruas')
            ];
            $update = $this->Daftar_tujuan_model->update($data,$where);
            if ($update) {
                $this->modelapp->deleteData('daftar_tujuan_nilai',$where);
                $data_nilai = [];
                $kriteria_post = $this->input->post('kriteria');
                $kriteria = $this->Kriteria_model->kriteria_data([]);
                foreach ($kriteria as $k) {
                    $data_nilai = [
                       "daftar_tujuan_id" => $this->input->post('id'),
                       "kriteria_id" => $k->kriteria_id,
                       "nilai_id" => $kriteria_post[$k->kriteria_id]
                   ];
                   $insertNilai = $this->Daftar_tujuan_model->insertNilai($data_nilai);
                }    
            }
            
			if($insertNilai)
			{
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
				redirect(base_url('ahp/DaftarTujuan'));
			}else{
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
				redirect(base_url('ahp/DaftarTujuan'));
			}
		}
    }

    public function deleteDaftarTujuan()
	{
        $id['daftar_tujuan_id'] = $this->uri->segment(3);
        $this->modelapp->deleteData('daftar_tujuan',$id);
       
        $this->modelapp->deleteData('daftar_tujuan_nilai',$id);

        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Data Berhasil Dihapus !!</div></div>");
        redirect('ahp/DaftarTujuan');
    }
    
    public function kriteriaTujuan()
    {
       $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Kriteria Tujuan',
        );
        $data['kriteria'] = $this->db->get('kriteria')->result();
        $data['tujuan'] = $this->db->get('tujuan')->result();
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('element/admin_header', $data);
		$this->load->view('element/admin_sidebar', $data);
		$this->load->view('element/admin_topbar', $data);
		$this->load->view('admin/hirarki/v_kriteriaTujuan', $data);
		$this->load->view('element/admin_footer');
    }

    function gethtml()
    {
    	$id=$this->input->get('tujuan');
		$output=array();
        $dKriteria= $this->db->get('kriteria')->result();;
		foreach($dKriteria as $rK)
		{
			$output[$rK->kriteria_id]=$rK->nama_kriteria;
        }	
    	$d['arr']=$output;
    	$d['tujuan_id']=$id;
     	$this->load->view('admin/hirarki/v_htmlTujuan',$d);
    }

    function getsubcontainer()
	{
        $id=$this->input->get('tujuan_id');
        $d['kriteria'] = $this->db->get('kriteria')->result();
		$d['tujuan_id']=$id;
		$this->load->view('tu/beasiswa/matriks/subcontainer',$d);
    }
    
    function getsub()
	{		
		$tujuan_id=$this->input->get('tujuan_id');
		$id=$this->input->get('kriteria');
    	$namaKriteria=$this->mod_kriteria->kriteria_info($id,'nama_kriteria');
    	$dSub=$this->mod_kriteria->subkriteria_child($id,'nilai_id ASC');
    	$output=array();
    	if(!empty($dSub))
    	{					
		foreach($dSub as $rK)
		{
			$nama=field_value('nilai_kategori','nilai_id',$rK->nilai_id,'nama_nilai');
			$output[$rK->subkriteria_id]=$nama;
		}
		}
    	$d['arr']=$output;
    	$d['kriteriaid']=$id;
    	$d['tujuan_id']=$tujuan_id;
    	$d['namakriteria']=$namaKriteria;
    	$this->load->view('tu/beasiswa/matriks/matriksub',$d);
    }
    
     
    function updateutama()
    {
    	$error=FALSE;
    	$tujuan_id=$this->input->post('tujuan_id');
    	if(!empty($tujuan_id))
    	{
			
		
    	$msg="";
    	$s=array(
    	'tujuan_id '=> $this->input->post('tujuan_id')
    	);
    	$this->m_db->delete_row('kriteria_nilai',$s);
    	    	
    	$cr=$this->input->post('crvalue');
    	if($cr > 0.01)
    	{
    		$msg="Gagal diupdate karena nilai CR kurang dari 0.01";
			$error=TRUE;
		}else{
			foreach($_POST as $k=>$v)
			{
				if($k!="crvalue" && $k!="tujuan_id")
				{									
				foreach($v as $x=>$x2)
				{
					$d=array(
					'tujuan_id'=>$tujuan_id,
					'kriteria_id_dari'=>$k,
					'kriteria_id_tujuan'=>$x,
					'nilai'=>$x2,
					);
					$this->m_db->add_row('kriteria_nilai',$d);
				}
				}
			}
			$msg="Berhasil update nilai kriteria";
			$error=FALSE;
		}
    			
    	
    	if($error==FALSE)
    	{			
			echo json_encode(array('status'=>'ok','msg'=>$msg));
		}else{
			echo json_encode(array('status'=>'no','msg'=>$msg));
		}
		
		}else{
			$msg="Gagal mengubah nilai kriteria";
			echo json_encode(array('status'=>'no','msg'=>$msg));
		}
		
    }
    
    function updatesub()
    {
    	$error=FALSE;
    	$tujuan_id=$this->input->post('tujuan_id');
    	$kriteriaid=$this->input->post('kriteriaid');
    	if(!empty($tujuan_id) && !empty($kriteriaid))
    	{
			
		
    	$msg="";
    	$s=array(
    	'tujuan_id'=>$tujuan_id,
    	'kriteria_id'=>$kriteriaid,
    	);
    	$this->m_db->delete_row('subkriteria_nilai',$s);
    	    	
    	$cr=$this->input->post('crvalue');
    	if($cr > 0.01)
    	{
    		$msg="Gagal diupdate karena nilai CR kurang dari 0.01";
			$error=TRUE;
		}else{
			foreach($_POST as $k=>$v)
			{
				if($k!="crvalue" && $k!="tujuan_id" && $k!="kriteriaid")
				{									
				foreach($v as $x=>$x2)
				{
					$d=array(
					'tujuan_id'=>$tujuan_id,
					'kriteria_id'=>$kriteriaid,
					'subkriteria_id_dari'=>$k,
					'subkriteria_id_tujuan'=>$x,
					'nilai'=>$x2,
					);
					$this->m_db->add_row('subkriteria_nilai',$d);
				}
				}
			}
			$msg="Berhasil update nilai subkriteria";
			$error=FALSE;
		}
    			
    	
    	if($error==FALSE)
    	{			
			echo json_encode(array('status'=>'ok','msg'=>$msg));
		}else{
			echo json_encode(array('status'=>'no','msg'=>$msg));
		}
		
		}else{
			$msg="Gagal mengubah nilai subkriteria";
			echo json_encode(array('status'=>'no','msg'=>$msg));
		}
		
	}

    function kandidat($id)
    {
        // $id=$this->input->get('id');
        $nama=$this->mod_bea->tujuan_info($id,'judul');
        $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Daftar Kandidat '.$nama,
        );
        $data['tujuan_id'] = $id;
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']=$this->Daftar_tujuan_model->getAllBy(array('tujuan_id'=>$id));
        $this->load->view('element/admin_header', $data);
        $this->load->view('element/admin_sidebar', $data);
        $this->load->view('element/admin_topbar', $data);
        $this->load->view('admin/hirarki/v_kandidat', $data);
        $this->load->view('element/admin_footer');
    }
    
    function updatesubprioritas()
	{
		$tujuan_id=$this->input->post('tujuan_id');
    	$kriteriaid=$this->input->post('kriteriaid');
    	$prio=$this->input->post('prio');
    	if(!empty($prio))
    	{
			foreach($prio as $rk=>$rv)
			{
				$s=array(
				'tujuan_id'=>$tujuan_id,
				'subkriteria_id'=>$rk,
				);
				if($this->m_db->is_bof('subkriteria_hasil',$s)==TRUE)
				{
					$d=array(
					'tujuan_id'=>$tujuan_id,
					'subkriteria_id'=>$rk,
					'prioritas'=>$rv,
					);
					$this->m_db->add_row('subkriteria_hasil',$d);
				}else{
					$d=array(					
					'prioritas'=>$rv,
					);
					$this->m_db->edit_row('subkriteria_hasil',$d,$s);
				}
			}
			echo json_encode('ok');
		}else{
			echo json_encode('no');
		}
    }
    
    // function proseshitung()
    // {
    //     $id=$this->input->get('id');
    //     $this->mod_bea->proseshitung($id);      
    //     if($this->mod_bea->proseshitung($id)==TRUE)
    //     {
    //         //set_header_message('success','Proses Beasiswa','Beasiswa telah diproses');
    //         //redirect(base_url(akses().'/beasiswa/beasiswa').'?id='.$id);
    //         echo json_encode(array('status'=>'ok'));
    //     }else{
    //         //set_header_message('danger','Proses Beasiswa','Beasiswa gagal diproses');
    //         //redirect(base_url(akses().'/beasiswa/beasiswa'));
    //         echo json_encode(array('status'=>'no'));
    //     }       
    // }
}