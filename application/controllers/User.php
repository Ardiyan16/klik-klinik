<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'User | Profile';
        $nik = $this->session->userdata('nik');
        $var['profile'] = $this->db->get_where('users', ['nik' => $nik])->row();
        $var['edit'] = $this->db->get_where('users', ['nik' => $nik])->row();
        $this->load->view('users/profile', $var);
    }

    public function update_profile()
    {
        $this->user->update_profile();
        $this->session->set_flashdata('success_update', true);
        redirect('User');
    }
}
