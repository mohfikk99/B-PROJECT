<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rumah_sakit extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
    $this->load->model('Rumah_sakit_model');
    $this->load->model('Pasien_model');


    if ($this->Login_model->is_level() != "petugas") {
      redirect("home/proses_login");
    }
  }

  public function index()
  {

    $data['title'] = 'Halaman data Pavilium';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['data_pavilium'] = $this->db->get('pavilium')->result_array();

    $this->form_validation->set_rules('jenis_pavilium', 'jenis_pavilium', 'required|trim');
    $this->form_validation->set_rules('nama_pavilium', 'nama_pavilium', 'required|trim');
    $this->form_validation->set_rules('harga', 'harga', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/jam', $data);
      $this->load->view('rumah_sakit/pavilium', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [

        'jenis_pavilium' => $this->input->post('jenis_pavilium'),
        'nama_pavilium' => $this->input->post('nama_pavilium'),
        'harga' => $this->input->post('harga'),
      ];
      $this->db->insert('pavilium', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
        berhasil ditambahkan</div>');
      redirect('rumah_sakit');
    }
  }

  public function edit_pavilium($id)
  {
    $data['title'] = 'Halaman Edit Pavilium';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $where = array('id' => $id);
    $data['pavilium'] = $this->Rumah_sakit_model->edit_data($where, 'pavilium')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('rumah_sakit/edit_pavilium', $data);
    $this->load->view('templates/footer');
  }

  public function update_pavilium()
  {
    $id = $this->input->post('id');
    $jenis_pavilium = $this->input->post('jenis_pavilium');
    $nama_pavilium = $this->input->post('nama_pavilium');
    $harga = $this->input->post('harga');

    $data = array(
      'jenis_pavilium' => $jenis_pavilium,
      'nama_pavilium' => $nama_pavilium,
      'harga' => $harga,

    );

    $where = array(
      'id' => $id
    );

    $this->Rumah_sakit_model->update_data($where, $data, 'pavilium');
    $this->session->set_flashdata('massage', '<div class="alert alert-warning" role="alert">
    berhasil di edit</div>');
    redirect('Rumah_sakit');
  }

  public function hapus_pavilium($id)
  {

    $title = $this->Rumah_sakit_model->hapus_pavilium($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('Rumah_sakit');
  }


  public function layanan()
  {

    $data['title'] = 'Halaman data layanan';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['data_layanan'] = $this->db->get('jenis_pelayanan')->result_array();

    $this->form_validation->set_rules('jenis_layanan', 'jenis_layanan', 'required|trim');
    $this->form_validation->set_rules('harga', 'harga', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/jam', $data);
      $this->load->view('rumah_sakit/layanan', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'jenis_layanan' => $this->input->post('jenis_layanan'),
        'harga' => $this->input->post('harga'),
      ];
      $this->db->insert('jenis_pelayanan', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
        berhasil ditambahkan</div>');
      redirect('rumah_sakit/layanan');
    }
  }

  public function edit_layanan($id)
  {
    $data['title'] = 'Halaman Edit layanan';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $where = array('id' => $id);
    $data['layanan'] = $this->Rumah_sakit_model->edit_data($where, 'jenis_pelayanan')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('rumah_sakit/edit_layanan', $data);
    $this->load->view('templates/footer');
  }

  public function update_layanan()
  {
    $id = $this->input->post('id');
    $jenis_layanan = $this->input->post('jenis_layanan');
    $harga = $this->input->post('harga');

    $data = array(
      'jenis_layanan' => $jenis_layanan,
      'harga' => $harga,

    );

    $where = array(
      'id' => $id
    );

    $this->Rumah_sakit_model->update_data($where, $data, 'jenis_pelayanan');
    $this->session->set_flashdata('massage', '<div class="alert alert-warning" role="alert">
    berhasil di edit</div>');
    redirect('Rumah_sakit/layanan');
  }

  public function hapus_layanan($id)
  {

    $title = $this->Rumah_sakit_model->hapus_layanan($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('Rumah_sakit/layanan');
  }

  public function laboratorium()
  {
    $data['title'] = 'Halaman data Laboratorium';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['data_lab'] = $this->db->get('laboratorium')->result_array();
    $data['laboratorium'] = $this->db->get('laboratorium')->result_array();

    $this->form_validation->set_rules('nama_lab', 'nama_lab', 'required|trim');
    $this->form_validation->set_rules('harga', 'harga', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/jam', $data);
      $this->load->view('rumah_sakit/laboratorium', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'nama_lab' => $this->input->post('nama_lab'),
        'harga' => $this->input->post('harga'),
      ];
      $this->db->insert('laboratorium', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
        berhasil ditambahkan</div>');
      redirect('rumah_sakit/laboratorium');
    }
  }


  public function edit_laboratorium($id)
  {
    $data['title'] = 'Halaman Edit Laboratorium';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $where = array('id' => $id);
    $data['lab'] = $this->Rumah_sakit_model->edit_data($where, 'laboratorium')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('rumah_sakit/edit_laboratorium', $data);
    $this->load->view('templates/footer');
  }

  public function update_laboratorium()
  {
    $id = $this->input->post('id');
    $nama_lab = $this->input->post('nama_lab');
    $harga = $this->input->post('harga');

    $data = array(
      'nama_lab' => $nama_lab,
      'harga' => $harga,

    );

    $where = array(
      'id' => $id
    );

    $this->Rumah_sakit_model->update_data($where, $data, 'laboratorium');
    $this->session->set_flashdata('massage', '<div class="alert alert-warning" role="alert">
    berhasil di edit</div>');
    redirect('Rumah_sakit/laboratorium');
  }

  public function hapus_laboratorium($id)
  {

    $title = $this->Rumah_sakit_model->hapus_laboratorium($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('Rumah_sakit/laboratorium');
  }






















  public function pelayanan()
  {

    $data['title'] = 'Halaman data pelayanan';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['selesai'] = $this->Rumah_sakit_model->data_selesai();
    $data['tidak'] = $this->Rumah_sakit_model->data_tidak();;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/jam', $data);
    $this->load->view('rumah_sakit/pelayanan', $data);
    $this->load->view('templates/footer');
  }

  public function hapus_pasien($id_pasien)
  {

    $title = $this->Rumah_sakit_model->hapus_pasien($id_pasien);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('Rumah_sakit/pelayanan');
  }

  public function detail_pasien($id_pasien)
  {

    $data['title'] = 'Halaman detail pasien';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['detail_pasien'] = $this->Pasien_model->detail_pasien($id_pasien);
    $data['biaya_pavilium'] = $this->Pasien_model->detail_biaya_pavilium_pasien($id_pasien);
    $data['biaya_layanan'] = $this->Pasien_model->detail_biaya_layanan($id_pasien);
    $data['biaya_lab'] = $this->Pasien_model->detail_biaya_lab($id_pasien);
    $data['biaya_lainnya'] = $this->Pasien_model->detail_biaya_lainnya($id_pasien);
    $data['total_layanan'] = $this->Pasien_model->total_harga_layanan($id_pasien)->row();
    $data['layanan'] = $this->db->get('jenis_pelayanan')->result_array();
    $data['laboratorium'] = $this->db->get('laboratorium')->result_array();
    $data['total_medik'] = $this->Pasien_model->total_harga_medik($id_pasien)->row();
    $data['total_lab'] = $this->Pasien_model->total_harga_lab($id_pasien)->row();
    $data['total_pavilium'] = $this->Pasien_model->total_harga_pavilium($id_pasien)->row();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/jam', $data);
    $this->load->view('rumah_sakit/detail_pasien', $data);
    // $this->load->view('templates/footer');

  }
}

  /* End of file Home.php */
