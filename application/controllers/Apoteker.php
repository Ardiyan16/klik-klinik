<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apoteker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_apoteker', 'apoteker');
        $this->load->model('M_dokter', 'dokter');
        $this->load->model('M_admin', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Apoteker | dashboard';
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/dashboard', $var);
    }

    public function profile()
    {
        $var['title'] = 'Apoteker | profile';
        $id = $this->session->userdata('id');
        $var['profile'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['edit'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/profile', $var);
    }

    public function update_profile()
    {
        $this->dokter->update_profile();
        $this->session->set_flashdata('success_update', true);
        redirect('Apoteker/profile');
    }

    public function data_obat()
    {
        $var['title'] = 'Apoteker | Data Obat';
        $var['obat'] = $this->apoteker->get_obat();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/obat', $var);
    }

    public function create_obat()
    {
        $var['title'] = 'Apoteker | Tambah Obat';
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/create_obat', $var);
    }

    public function save_obat()
    {
        $this->apoteker->save_obat();
        $this->session->set_flashdata('success_create', true);
        redirect('Apoteker/data_obat');
    }
}
