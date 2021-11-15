<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');

    if($this->Login_model->is_level() != "petugas"){
            redirect("home/proses_login");
        }
  }

  public function index()
  {
    $data['title'] = 'Halaman data pasien';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/jam', $data);
    $this->load->view('Pasien/detail_pasien', $data);
      $this->load->view('templates/footer', $data);
  }

}
