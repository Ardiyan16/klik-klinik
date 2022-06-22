<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Admin | Dashboard';
        $this->load->view('admin/dashboard', $var);
    }

    public function profile()
    {
        $id = $this->session->userdata('id');
        $var['title'] = 'Admin | Profile';
        $var['profile'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['edit'] = $this->db->get_where('auth', ['id' => $id])->row();
        $this->load->view('admin/profile', $var);
    }

    public function update_profile()
    {
        $this->admin->update_profile();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/profile');
    }

}