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

    public function karir()
    {
        $var['title'] = 'Admin | Karir';
        $var['karir'] = $this->admin->get_karir();
        $this->load->view('admin/karir', $var);
    }

    public function create_karir()
    {
        $var['title'] = 'Admin | Tambah Karir';
        $this->load->view('admin/create_karir', $var);
    }

    public function save_karir()
    {
        $this->admin->save_karir();
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/karir');
    }

    public function ubah_status_buka($id)
    {
        $this->admin->status_buka($id);
        $this->session->set_flashdata('success_open', true);
        redirect('Admin/karir');
    }

    public function ubah_status_tutup($id)
    {
        $this->admin->status_tutup($id);
        $this->session->set_flashdata('success_close', true);
        redirect('Admin/karir');
    }

    public function edit_karir($id)
    {
        $var['title'] = 'Admin | Edit Karir';
        $var['edit'] = $this->db->get_where('karir', ['id' => $id])->row();
        $this->load->view('admin/edit_karir', $var);
    }

    public function update_karir()
    {
        $this->admin->update_karir();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/karir');
    }

    public function delete_karir($id)
    {
        $this->db->delete('karir', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/karir');
    }

    public function berita()
    {
        $var['title'] = 'Admin | Berita';
        $var['berita'] = $this->admin->get_berita();
        $var['detail'] = $this->admin->get_berita();
        $this->load->view('admin/berita', $var);
    }

    public function create_berita()
    {
        $var['title'] = 'Admin | Tambah Berita';
        $this->load->view('admin/create_berita', $var);
    }

    public function save_berita()
    {
        $this->admin->save_berita();
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/berita');
    }

    public function edit_berita($id)
    {
        $var['title'] = 'Admin | Edit Berita';
        $var['edit'] = $this->db->get_where('berita', ['id' => $id])->row();
        $this->load->view('admin/edit_berita', $var);
    }

}