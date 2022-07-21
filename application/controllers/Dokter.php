<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'admin');
        $this->load->model('M_dokter', 'dokter');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Dokter | dashboard';
        $var['jml_pengobatan'] = $this->dokter->count_pengobatan();   
        $var['notif_pengobatan'] = $this->dokter->notifikasi_pengobatan();
        $var['count_notif'] = $this->dokter->count_notifikasi();
        $this->load->view('dokter/dashboard', $var);
    }

    public function profile()
    {
        $var['title'] = 'Dokter | profile';
        $id = $this->session->userdata('id');
        $var['profile'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['edit'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['notif_pengobatan'] = $this->dokter->notifikasi_pengobatan();
        $var['count_notif'] = $this->dokter->count_notifikasi();
        $this->load->view('dokter/profile', $var);
    }

    public function update_profile()
    {
        $this->dokter->update_profile();
        $this->session->set_flashdata('success_update', true);
        redirect('Dokter/profile');
    }

    public function pengobatan()
    {
        $var['title'] = 'Dokter | pengobatan';
        $var['pengobatan'] = $this->dokter->get_pengobatan();
        $var['notif_pengobatan'] = $this->dokter->notifikasi_pengobatan();
        $var['count_notif'] = $this->dokter->count_notifikasi();
        $this->load->view('dokter/pengobatan', $var);
    }

    public function detail_pengobatan()
    {
        $id = $this->input->get('id');
        $id_notif = $this->input->get('id_notif');
        $var['title'] = 'Dokter | detail pengobatan';
        $this->dokter->status_notif_pengobatan($id_notif);
        $var['view'] = $this->dokter->detail_pengobatan($id);
        $var['notif_pengobatan'] = $this->dokter->notifikasi_pengobatan();
        $var['count_notif'] = $this->dokter->count_notifikasi();
        $this->load->view('dokter/detail_pengobatan', $var);
    }

    public function save_diagnosa()
    {
        $this->dokter->save_diagnosa();
        $resep = array(
            'id_pengobatan' => $this->input->post('id'),
            'resep' => $this->input->post('resep'),
            'keterangan' => $this->input->post('keterangan'),
            'status_resep' => 0
        );
        $this->db->insert('resep', $resep);
        $this->session->set_flashdata('success', true);
        redirect('Dokter/pengobatan');
    }

    public function riwayat_pengobatan()
    {
        $var['title'] = 'Dokter | riwayat pengobatan';
        $var['pengobatan'] = $this->dokter->riwayat_pengobatan();
        $var['notif_pengobatan'] = $this->dokter->notifikasi_pengobatan();
        $var['count_notif'] = $this->dokter->count_notifikasi();
        $this->load->view('dokter/riwayat_pengobatan', $var);
    }

    public function konsultasi()
    {
        // $var['title'] = 'Dokter | Konsultasi';
        // $var['konsultasi'] = 
    }
}
