<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_owner', 'owner');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Owner | Dashboard';
        $this->load->view('owner/dashboard', $var);
    }

    public function team()
    {
        $var['title'] = 'Owner | Team';
        $var['team'] = $this->owner->get_team();
        $var['team2'] = $this->owner->get_team();
        $this->load->view('owner/team', $var);
    }

    public function create_team()
    {
        $var['title'] = 'Owner | Create Team';
        $var['role'] = $this->owner->get_role();
        $this->load->view('owner/create_team', $var);
    }

    public function save_team()
    {
        $this->owner->save_team();
        $this->session->set_flashdata('success_create', true);
        redirect('Owner/team');
    }

    public function ubah_status_aktif($id)
    {
        $this->owner->status_active($id);
        $this->session->set_flashdata('success_active', true);
        redirect('Owner/team');
    }

    public function ubah_status_nonaktif($id)
    {
        $this->owner->status_nonactive($id);
        $this->session->set_flashdata('success_nonactive', true);
        redirect('Owner/team');
    }

    public function delete_team($id)
    {
        $this->db->delete('auth', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Owner/team');
    }

    public function visi_misi()
    {
        $var['title'] = 'Owner | Visi & Misi';
        $var['count_vm'] = $this->owner->count_visimisi();
        $var['vm'] = $this->owner->get_visimisi();
        $this->load->view('owner/visi_misi', $var);
    }

    public function create_visimisi()
    {
        $var['title'] = 'Owner | Tambah Visi & Misi';
        $this->load->view('owner/create_visimisi', $var);
    }

    public function save_visimisi()
    {
        $this->owner->save_visimisi();
        $this->session->set_flashdata('success_create', true);
        redirect('Owner/visi_misi');
    }

    public function edit_visimisi()
    {
        $var['title'] = 'Owner | Edit Visi & Misi';
        $var['edit'] = $this->owner->get_visimisi();
        $this->load->view('owner/edit_visimisi', $var);
    }

    public function update_visimisi()
    {
        $this->owner->update_visimisi();
        $this->session->set_flashdata('success_update', true);
        redirect('Owner/visi_misi');
    }
}