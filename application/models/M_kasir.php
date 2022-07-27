<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kasir extends CI_Model
{

    private $payment = 'payment';

    public function notifikasi_pasien()
    {
        $this->db->select('*');
        $this->db->from('notifikasi_pembayaran');
        $this->db->where('tipe', 1);
        $this->db->where('status', 0);
        return $this->db->get()->result();
    }

    public function notifikasi_nonPasien()
    {
        $this->db->select('*');
        $this->db->from('notifikasi_pembayaran');
        $this->db->where('tipe', 2);
        $this->db->where('status', 0);
        return $this->db->get()->result();
    }

    public function count_notif()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('notifikasi_pembayaran');
        $this->db->where('status', 0);
        return $this->db->get()->row()->jml;
    }

    public function update_profile()
    {
        
    }
}