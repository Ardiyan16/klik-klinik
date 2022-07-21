<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_apoteker extends CI_Model
{
    private $resep = 'resep';
    private $obat = 'obat';

    public function notifikasi_resep()
    {
        $this->db->select('*');
        $this->db->from($this->resep);
        $this->db->where('status_resep', 0);
        return $this->db->get()->result();
    }

    public function count_notifikasi()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from($this->resep);
        $this->db->where('status_resep', 0);
        return $this->db->get()->row()->jml;
    }

    public function get_obat()
    {
        return $this->db->get($this->obat)->result();
    }

    public function save_obat()
    {
        $post = $this->input->post();
        $this->kd_obat = $post['kd_obat'];
        $this->nama_obat = $post['nama_obat'];
        $this->harga =  str_replace(",", "", $post['harga']);
        $this->stok = $post['stok'];
        $this->dosis = $post['dosis'];
        $this->tgl_kadaluarsa = $post['tgl_kadaluarsa'];
        $this->db->insert($this->obat, $this);
    }

}