<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'admin');
        $this->load->model('M_front', 'front');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Home';
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $var['partner'] = $this->admin->get_partner();
        $this->load->view('front/home', $var);
    }

    public function artikel()
    {
        $var['title'] = 'Artikel';
        $this->load->library('pagination');
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_open'] = '<li>';
        $config['attributes'] = array('class' => 'page-link');
        //$total = $this->M_produk->jumlah();
        $config['base_url'] = base_url('Front/artikel');
        $config['total_rows'] = $this->front->count_all_artikel();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $page['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $var['article'] = $this->front->get_artikel($config['per_page'], $page['start']);
        // $var['pagination'] = $this->pagination->create_links();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/informasi/artikel', $var);
    }

    public function full_page_artikel($id)
    {
        $var['title'] = 'Full Artikel';
        $var['view'] = $this->db->get_where('berita', ['id' => $id])->row();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/informasi/full_page', $var);
    }

    public function berita()
    {
        $var['title'] = 'Berita';
        $this->load->library('pagination');
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_open'] = '<li>';
        $config['attributes'] = array('class' => 'page-link');
        //$total = $this->M_produk->jumlah();
        $config['base_url'] = base_url('Front/berita');
        $config['total_rows'] = $this->front->count_all_berita();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $page['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $var['article'] = $this->front->get_berita($config['per_page'], $page['start']);
        // $var['pagination'] = $this->pagination->create_links();
        // var_dump($var['pagination']);
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/informasi/berita', $var);
    }

    public function karir()
    {
        $var['title'] = 'Karir';
        $var['karir'] = $this->front->get_karir();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/karir', $var);
    }

    public function visi_misi()
    {
        $var['title'] = 'Visi Misi';
        $var['visi_misi'] = $this->db->get_where('visi_misi', ['id' => 1])->row();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/profile/visi_misi', $var);
    }

    public function daftar_dokter()
    {
        $var['title'] = 'Daftar Dokter';
        $var['dokter'] = $this->front->get_dokter();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/profile/daftar_dokter', $var);
    }

    public function tentang_kami()
    {
        $var['title'] = 'Tentang Kami';
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/profile/about', $var);
    }

    public function penghargaan()
    {
        $var['title'] = 'Penghargaan';
        $var['penghargaan'] = $this->admin->get_penghargaan();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/profile/penghargaan', $var);
    }

    public function layanan_medis()
    {
        $var['title'] = 'Layanan Medis';
        $var['layanan_medis'] = $this->admin->get_poli();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/layanan/layanan_medis', $var);
    }

    public function jadwal_dokter()
    {
        $var['title'] = 'Jadwal Dokter';
        $var['jadwal_dokter'] = $this->admin->get_jadwal_dokter();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/layanan/jadwal_dokter', $var);
    }

    public function jadwal_vaksinasi()
    {
        $var['title'] = 'Jadwal Vaksinasi';
        $var['jadwal_vaksin'] = $this->front->jadwal_vaksinasi();
        $var['view_image'] = $this->front->jadwal_vaksinasi();
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/layanan/jadwal_vaksinasi', $var);
    }

    public function kontak()
    {
        $var['title'] = 'kontak';
        $var['artikel'] = $this->front->artikel_home();
        $var['berita'] = $this->front->berita_home();
        $this->load->view('front/kontak', $var);
    }

    public function save_kontak()
    {
        $this->front->save_kontak();
        $this->session->set_flashdata('success', true);
        redirect('Front/kontak');
    }
}
