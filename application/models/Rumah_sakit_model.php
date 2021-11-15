<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rumah_sakit_model extends CI_Model
{


  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function hapus_pavilium($id)
  {
    $query = $this->db->query("DELETE FROM pavilium WHERE id = '$id'");
  }

  function hapus_layanan($id)
  {
    $query = $this->db->query("DELETE FROM jenis_pelayanan WHERE id = '$id'");
  }

  function hapus_laboratorium($id)
  {
    $query = $this->db->query("DELETE FROM laboratorium WHERE id = '$id'");
  }

  function hapus_pasien($id_pasien)
  {
    $query = $this->db->query("DELETE FROM pasien WHERE id_pasien = '$id_pasien'");
  }


  public function data_selesai()
  {
    $this->db->select('*');
    $this->db->from('pasien');
    $this->db->join('pavilium', 'pavilium.id = pasien.id_pavilium', 'left');
    $this->db->where('pasien.status', 'selesai');
    return $this->db->get()->result();
  }

  public function data_tidak()
  {
    $this->db->select('*');
    $this->db->from('pasien');
    $this->db->join('pavilium', 'pavilium.id = pasien.id_pavilium', 'left');
    $this->db->where('pasien.status', 'tidak');
    return $this->db->get()->result();
  }
}
