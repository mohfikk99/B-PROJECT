<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model
{


  public function get_profil()
  {
    return $this->db->get_where("profil", array('level ' => 'user'));
  }

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function hapus_petugas($id)
  {
    $query = $this->db->query("DELETE FROM petugas WHERE id = '$id'");
  }


}

