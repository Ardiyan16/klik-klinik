<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Home';
        $this->load->view('front/home', $var);
    }
}