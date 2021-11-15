<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pasien_model extends CI_model
{

    public function getpasien()
    {

        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('pavilium', 'pavilium.id = pasien.id_pavilium', 'left');
        $this->db->where('pasien.status', 'tidak');
        return $this->db->get()->result();
    }



    public function detail_pasien($id)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('pavilium', 'pavilium.id = pasien.id_pavilium', 'left');
        $this->db->where('pasien.id_pasien', $id);
        return $this->db->get()->result();
    }

    public function detail_biaya_pavilium_pasien($id)
    {
        $this->db->select('*');
        $this->db->from('biaya_pavilium');
        $this->db->join('pasien', 'pasien.id_pasien = biaya_pavilium.id_pasien', 'left');
        $this->db->where('pasien.id_pasien', $id);
        return $this->db->get()->result();
    }

    public function detail_biaya_layanan($id)
    {
        $this->db->select('*');
        $this->db->from('biaya_layanan');
        $this->db->join('jenis_pelayanan', 'jenis_pelayanan.id = biaya_layanan.id_layanan', 'left');
        $this->db->where('biaya_layanan.id_pasien', $id);
        return $this->db->get()->result();
    }

    public function detail_biaya_lab($id)
    {
        $this->db->select('*');
        $this->db->from('biaya_lab');
        $this->db->join('laboratorium', 'laboratorium.id = biaya_lab.id_lab', 'left');
        $this->db->where('biaya_lab.id_pasien', $id);
        return $this->db->get()->result();
    }

    public function detail_biaya_lainnya($id)
    {
        $this->db->select('*');
        $this->db->from('biaya_lainnya');
        $this->db->join('pasien', 'pasien.id_pasien = biaya_lainnya.id_pasien', 'left');
        $this->db->where('biaya_lainnya.id_pasien', $id);
        return $this->db->get()->result();
    }

    public function total_harga_layanan($id)
    {

        return $this->db->query("SELECT SUM(total_harga_layanan) as total FROM biaya_layanan WHERE id_pasien='$id'");
    }

    public function total_harga_medik($id)
    {

        return $this->db->query("SELECT SUM(total_lainnya) as total_tindakan FROM biaya_lainnya WHERE id_pasien='$id'");
    }

    public function total_harga_lab($id)
    {

        return $this->db->query("SELECT SUM(harga) as lab FROM biaya_lab WHERE id_pasien='$id'");
    }

    public function total_harga_pavilium($id)
    {

        return $this->db->query("SELECT SUM(total_harga) as pavilium FROM biaya_pavilium WHERE id_pasien='$id'");
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

    function hapus_biaya_lainnya($id)
    {
        $query = $this->db->query("DELETE FROM biaya_lainnya WHERE id_biaya_lainnya = '$id'");
    }


    function hapus_biaya_layanan($id)
    {
        $query = $this->db->query("DELETE FROM biaya_layanan WHERE id_biaya_layanan = '$id'");
    }


    function hapus_biaya_pavilium($id)
    {
        $query = $this->db->query("DELETE FROM biaya_pavilium WHERE id = '$id'");
    }

    function hapus_biaya_lab($id)
    {
        $query = $this->db->query("DELETE FROM biaya_lab WHERE id_biaya_lab = '$id'");
    }
}
