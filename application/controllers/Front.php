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
        $config['base_url'] = base_url('Front/artikel');
        $config['total_rows'] = $this->front->count_all_artikel();
        // var_dump($config['total_rows']);
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $var['article'] = $this->front->get_artikel($config['per_page'], $page);
        $var['pagination'] = $this->pagination->create_links();
        // var_dump($var['pagination']);
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
        $config['base_url'] = base_url('Front/berita');
        $config['total_rows'] = $this->front->count_all_berita();
        // var_dump($config['total_rows']);
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $var['article'] = $this->front->get_berita($config['per_page'], $page);
        $var['pagination'] = $this->pagination->create_links();
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
}
