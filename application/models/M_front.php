<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_front extends CI_Model
{
    private $berita = 'berita';
    private $kontak = 'kontak';

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

    public function get_artikel($limit, $start)
    {
        $this->db->select('*');
        $this->db->from($this->berita);
        $this->db->where('kategori', 2);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('', $limit, $start);
        return $query->result();
        // $artikel = $this->db->query("SELECT * FROM berita WHERE kategori = 2 ORDER BY id desc LIMIT $limit, $start");
        // return $artikel->result();
    }

    public function count_all_berita()
    {
        $this->db->where('kategori', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('berita')->num_rows();
    }

    public function get_berita($limit, $start)
    {
        $this->db->select('*');
        $this->db->from($this->berita);
        $this->db->where('kategori', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('', $limit, $start)->result();
    }

    public function get_karir()
    {
        $this->db->select('*');
        $this->db->from('karir');
        $this->db->where('status', 1);
        return $this->db->get()->result();
    }

    public function get_dokter()
    {
        $this->db->select('*');
        $this->db->from('auth');
        $this->db->where('role_id', 2);
        $this->db->where('status', 1);
        return $this->db->get()->result();
    }

    public function jadwal_vaksinasi()
    {
        $this->db->select('*');
        $this->db->from('jadwal_vaksinasi');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }
    
    public function save_kontak()
    {
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->email = $post['email'];
        $this->subjek = $post['subjek'];
        $this->pesan = $post['pesan'];
        $this->db->insert($this->kontak, $this);
    }
}