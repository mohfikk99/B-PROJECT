<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
    $this->load->model('Petugas_model');


    if($this->Login_model->is_level() != "petugas"){
            redirect("home/proses_login");
        }
  }


  public function index()
  {

    $data['title'] = 'Halaman profil petugas';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/jam');
    $this->load->view('Petugas/profil', $data);
    $this->load->view('templates/footer');

  }


  public function data_petugas()
  {

    $data['title'] = 'Halaman data Petugas';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['data_petugas'] = $this->db->get('petugas')->result_array();

    $this->form_validation->set_rules('nip', 'nip', 'required|trim');
    $this->form_validation->set_rules('nama', 'nama', 'required|trim');
    $this->form_validation->set_rules('password', 'password', 'required|trim');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/jam', $data);
        $this->load->view('Petugas/data_petugas', $data);
        $this->load->view('templates/footer');
    }else {
      $data =[

        'nip' => $this->input->post('nip'),
        'nama' => $this->input->post('nama'),
        'jabatan' => $this->input->post('jabatan'),
        'password' => md5($this->input->post('password')),
        'level' => petugas,
      ];
      // gambar
      $upload_gambar = $_FILES['gambar']['name'];
      if ($upload_gambar) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/petugas/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
          $new_gambar = $this->upload->data('file_name');
          $this->db->set('gambar', $new_gambar);
        }else {
          echo $this->upload->dispay_errors();
        }
      }
      // akhir gambar
      
        $this->db->insert('petugas', $data);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
        berhasil ditambahkan</div>');
        redirect('petugas/data_petugas');
    }

  }

  public function edit_petugas($id)
  {
    $data['title'] = 'Halaman Edit Petugas';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $where = array('id' => $id);
    $data['petugas'] = $this->Petugas_model->edit_data($where, 'petugas')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('petugas/edit_petugas', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $id = $this->input->post('id');
    $nip = $this->input->post('nip');
    $nama = $this->input->post('nama');
    $jabatan = $this->input->post('jabatan');
    $password = md5($this->input->post('password'));

    // gambar
    $upload_gambar = $_FILES['gambar']['name'];
    if ($upload_gambar) {
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '2048';
      $config['upload_path'] = './assets/img/petugas/';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $new_gambar = $this->upload->data('file_name');
        $this->db->set('gambar', $new_gambar);
      }else {
        echo $this->upload->dispay_errors();
      }
    }
    // akhir gambar


    $data = array(
      'nip' => $nip,
      'nama' => $nama,
      'jabatan' => $jabatan,
      'password' => $password,

    );

    $where = array(
      'id' => $id
    );

    $this->Petugas_model->update_data($where, $data, 'petugas');
    $this->session->set_flashdata('massage', '<div class="alert alert-warning" role="alert">
    berhasil di edit</div>');
    redirect('petugas/data_petugas');
  }

  public function hapus_petugas($id)
  {

    $title = $this->Petugas_model->hapus_petugas($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('petugas/data_petugas');
  }











}

  /* End of file Home.php */
