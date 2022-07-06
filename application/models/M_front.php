<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_front extends CI_Model
{
    private $berita = 'berita';

    public function artikel_home()
    {
        $this->db->select('*');
        $this->db->from($this->berita);
        $this->db->where('kategori', 2);
        $this->db->order_by('id', 'desc');
        $this->db->limit(4);
        return $this->db->get()->result();
    }

    public function berita_home()
    {
        $this->db->select('*');
        $this->db->from($this->berita);
        $this->db->where('kategori', 1);
        $this->db->order_by('id', 'desc');
        $this->db->limit(4);
        return $this->db->get()->result();
    }

    public function count_all_artikel()
    {
        $this->db->where('kategori', 2);
        $this->db->order_by('id', 'desc');
        return $this->db->get('berita')->num_rows();
    }

    public function get_artikel($lmit, $start)
    {
        $this->db->select('*');
        $this->db->from($this->berita);
        $this->db->where('kategori', 2);
        $this->db->order_by('id', 'desc');
        return $this->db->get('', $lmit, $start)->result();
    }

    public function count_all_berita()
    {
        $this->db->where('kategori', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('berita')->num_rows();
    }

    public function get_berita($lmit, $start)
    {
        $this->db->select('*');
        $this->db->from($this->berita);
        $this->db->where('kategori', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('', $lmit, $start)->result();
    }

    public function get_karir()
    {
        $this->db->select('*');
        $this->db->from('karir');
        $this->db->where('status', 1);
        return $this->db->get()->result();
    }
}