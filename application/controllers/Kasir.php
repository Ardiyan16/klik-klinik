<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kasir', 'kasir');
        $this->load->model('M_dokter', 'dokter');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Kasir | Dashboard';
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/dashboard', $var);
    }

    public function profile()
    {
        $var['title'] = 'Kasir | Profile';
        $id = $this->session->userdata('id');
        $var['profile'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['edit'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/Profile', $var);
    }

    public function update_profile()
    {
        $this->dokter->update_profile();
        $this->session->set_flashdata('success_update', true);
        redirect('Kasir/profile');
    }

    public function payment_pasien()
    {
        
    }

}