<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email extends CI_Controller {
  public function index()
  {

    $data=array(
            'title'=>'Admin Panel',
            'judul'=>'Sent Email',
            'active_v_email'=>'active',
            'info_admin'=>$this->modelapp->TampilData('admin'),
        );
    $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->helper('url');
    $this->load->view('element/admin_header', $data);
    $this->load->view('element/admin_sidebar', $data);
    $this->load->view('element/admin_topbar', $data);
    $this->load->view('admin/v_email', $data);
    $this->load->view('element/admin_footer');
  }

  function kirim_email()
  {
    $email = $this->input->post('email');
    $nama = $this->input->post('nama');
    $subjek = $this->input->post('subjek');
    $pesan = $this->input->post('pesan');
    $url = $_SERVER['HTTP_REFERER'];
    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'mukis.aditya@gmail.com', //isi dengan gmailmu!
      'smtp_pass' => 'MilikSaya!', //isi dengan password gmailmu!
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from($email);
    $this->email->to('email_mu@gmail.com'); //email tujuan. Isikan dengan emailmu!
    $this->email->subject($subjek);
    $this->email->message($pesan);
    if($this->email->send())
    {
      echo 'Email sent. <a href="'.$url.'">KEMBALI</a>';
    }
    else
    {
      show_error($this->email->print_debugger());
    }
  } 
}
?>
