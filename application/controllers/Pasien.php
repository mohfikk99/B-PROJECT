<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
    $this->load->model('Pasien_model');


    if ($this->Login_model->is_level() != "petugas") {
      redirect("home/proses_login");
    }
  }



  public function index()
  {

    $data['title'] = 'Halaman data pasien';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['pavilium'] = $this->db->get('pavilium')->result_array();
    $data['data_pasien'] = $this->Pasien_model->getpasien();

    $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/jam', $data);
      $this->load->view('Pasien/data_pasien', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'tgl_masuk' => $this->input->post('tgl_masuk'),
        'nama_pasien' => $this->input->post('nama_pasien'),
        'umur' => $this->input->post('umur'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat' => $this->input->post('alamat'),
        'id_pavilium' => $this->input->post('id_pavilium'),
        'kelas' => $this->input->post('kelas'),
        'diagnosa' => $this->input->post('diagnosa'),
        'status' => tidak
      ];
      $this->db->insert('pasien', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
        berhasil ditambahkan</div>');
      redirect('pasien');
    }
  }

  public function edit_data_pasien($id_pasien)
  {
    $data['title'] = 'Halaman Edit Petugas';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $where = array('id_pasien' => $id_pasien);
    $data['data_pasien'] = $this->Pasien_model->edit_data($where, 'pasien')->result();
    $data['pavilium'] = $this->db->get('pavilium')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pasien/edit_data_pasien', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $id_pasien = $this->input->post('id_pasien');
    $tgl_masuk = $this->input->post('tgl_masuk');
    $nama_pasien = $this->input->post('nama_pasien');
    $umur = $this->input->post('umur');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');
    $id_pavilium = $this->input->post('id_pavilium');
    $kelas = $this->input->post('kelas');
    $diagnosa = $this->input->post('diagnosa');

    $data = array(
      'tgl_masuk' => $tgl_masuk,
      'nama_pasien' => $nama_pasien,
      'umur' => $umur,
      'jenis_kelamin' => $jenis_kelamin,
      'alamat' => $alamat,
      'id_pavilium' => $id_pavilium,
      'kelas' => $kelas,
      'diagnosa' => $diagnosa,

    );

    $where = array(
      'id_pasien' => $id_pasien
    );

    $this->Pasien_model->update_data($where, $data, 'pasien');
    $this->session->set_flashdata('massage', '<div class="alert alert-warning" role="alert">
    berhasil di edit</div>');
    redirect('pasien');
  }

  public function detail_pasien($id)
  {

    $data['title'] = 'Halaman detail pasien';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['detail_pasien'] = $this->Pasien_model->detail_pasien($id);
    $data['biaya_pavilium'] = $this->Pasien_model->detail_biaya_pavilium_pasien($id);
    $data['biaya_layanan'] = $this->Pasien_model->detail_biaya_layanan($id);
    $data['biaya_lab'] = $this->Pasien_model->detail_biaya_lab($id);
    $data['biaya_lainnya'] = $this->Pasien_model->detail_biaya_lainnya($id);
    $data['total_layanan'] = $this->Pasien_model->total_harga_layanan($id)->row();
    $data['layanan'] = $this->db->get('jenis_pelayanan')->result_array();
    $data['laboratorium'] = $this->db->get('laboratorium')->result_array();
    $data['total_medik'] = $this->Pasien_model->total_harga_medik($id)->row();
    $data['total_lab'] = $this->Pasien_model->total_harga_lab($id)->row();
    $data['total_pavilium'] = $this->Pasien_model->total_harga_pavilium($id)->row();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/jam', $data);
    $this->load->view('Pasien/detail_pasien', $data);
    $this->load->view('templates/footer');
  }

  public function biaya_pavilium()
  {


    $id_pasien = $this->input->post('id_pasien');
    $cek = $this->db->query("SELECT id_pasien FROM biaya_pavilium WHERE id_pasien = '$id_pasien'");
    $cek_id_pasien = $cek->num_rows();

    if ($cek_id_pasien > 0) {
      $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
       Jumlah hari pavilium Sudah Ditambahkan</div>');
      redirect('pasien/detail_pasien/' . $id_pasien);
    } else {
      $data = [
        'id_pasien' => $this->input->post('id_pasien'),
        'tgl_keluar' => $this->input->post('tgl_keluar'),
        'jumlah_hari' => $this->input->post('jumlah_hari'),
        'total_harga' => $this->input->post('total_harga'),
      ];

      $this->db->insert('biaya_pavilium', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    berhasil ditambahkan</div>');
      redirect('pasien/detail_pasien/' . $id_pasien);
    }
  }

  public function hapus_biaya_pavilium($id)
  {

    $this->Pasien_model->hapus_biaya_pavilium($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('pasien');
  }

  public function biaya_layanan()
  {
    $id_pasien = $this->input->post('id_pasien');
    $data = [
      'id_pasien' => $this->input->post('id_pasien'),
      'id_layanan' => $this->input->post('id_layanan'),
      'jumlah_layanan' => $this->input->post('jumlah_layanan'),
      'total_harga_layanan' => $this->input->post('total_harga_layanan'),
    ];

    $this->db->insert('biaya_layanan', $data);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    layanan berhasil ditambahkan</div>');
    redirect('pasien/detail_pasien/' . $id_pasien);
  }

  public function hapus_biaya_layanan($id)
  {

    $this->Pasien_model->hapus_biaya_layanan($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('pasien');
  }






  public function biaya_lab()
  {
    $id_pasien = $this->input->post('id_pasien');
    $data = [
      'id_pasien' => $this->input->post('id_pasien'),
      'id_lab' => $this->input->post('id_lab'),
      'harga' => $this->input->post('harga'),
    ];

    $this->db->insert('biaya_lab', $data);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    laboratorium berhasil ditambahkan</div>');
    redirect('pasien/detail_pasien/' . $id_pasien);
  }

  public function hapus_biaya_lab($id)
  {

    $this->Pasien_model->hapus_biaya_lab($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('pasien');
  }




















  public function biaya_lainnya()
  {
    $id_pasien = $this->input->post('id_pasien');
    $data = [
      'id_pasien' => $this->input->post('id_pasien'),
      'biaya_lainnya' => $this->input->post('biaya_lainnya'),
      'harga' => $this->input->post('harga'),
      'jumlah' => $this->input->post('jumlah'),
      'total_lainnya' => $this->input->post('total_lainnya'),
    ];

    $this->db->insert('biaya_lainnya', $data);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Berhasil ditambahkan</div>');
    redirect('pasien/detail_pasien/' . $id_pasien);
  }


  public function hapus_biaya_lainnya($id)
  {

    $this->Pasien_model->hapus_biaya_lainnya($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
    berhasil di hapus</div>');
    redirect('pasien');
  }

  public function cetak_detail_pasien($id)
  {
    $data['title'] = 'Halaman detail pasien';

    $data['petugas'] = $this->db->get_where('petugas', ['nama' => $this->session->userdata('nama')])->row_array();

    $data['detail_pasien'] = $this->Pasien_model->detail_pasien($id);
    $data['biaya_pavilium'] = $this->Pasien_model->detail_biaya_pavilium_pasien($id);
    $data['biaya_layanan'] = $this->Pasien_model->detail_biaya_layanan($id);
    $data['biaya_lab'] = $this->Pasien_model->detail_biaya_lab($id);
    $data['biaya_lainnya'] = $this->Pasien_model->detail_biaya_lainnya($id);
    $data['total_layanan'] = $this->Pasien_model->total_harga_layanan($id)->row();
    $data['layanan'] = $this->db->get('jenis_pelayanan')->result_array();
    $data['laboratorium'] = $this->db->get('laboratorium')->result_array();
    $data['total_medik'] = $this->Pasien_model->total_harga_medik($id)->row();
    $data['total_lab'] = $this->Pasien_model->total_harga_lab($id)->row();
    $data['total_pavilium'] = $this->Pasien_model->total_harga_pavilium($id)->row();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('Pasien/cetak_detail_pasien', $data);
    $this->load->view('templates/footer');
  }


  public function selesai()
  {
    $id_pasien = $this->input->post('id_pasien');
    $status = $this->input->post('status');

    $data = array(
      'status' => $status,
    );

    $where = array(
      'id_pasien' => $id_pasien
    );

    $this->Pasien_model->update_data($where, $data, 'pasien');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Administrasi Pasien Telah Berhasil</div>');
    redirect('pasien');
  }
}
