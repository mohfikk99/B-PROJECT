<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  // public function get_admin()
  // {
  //   return $this->db->get_where("profil", array('level ' => 'admin'));
  // }

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

  function hapus($id)
  {
    $query = $this->db->query("DELETE FROM produk WHERE id = '$id'");
  }


  function hapus_pesan($id)
  {
    $query = $this->db->query("DELETE FROM pesan WHERE id = '$id'");
  }


}

/* End of file Admin_model.php */



// $query = "SELECT `nilai`.*, `profil`.`name`
//           FROM `nilai` JOIN `profil`
//           ON `nilai`.`name` = `profil`.`name`
//         ";
//     return $this->db->query($query)->result_array();
