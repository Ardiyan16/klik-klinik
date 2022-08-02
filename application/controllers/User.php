<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        $this->load->model('M_admin', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'User | Profile';
        $nik = $this->session->userdata('nik');
        $var['profile'] = $this->db->get_where('users', ['nik' => $nik])->row();
        $var['edit'] = $this->db->get_where('users', ['nik' => $nik])->row();
        $var['notif_pendaftaran'] = $this->user->notifikasi_pendaftaran();
        $var['notif_reject'] = $this->user->notifikasi_reject();
        $var['count_notif'] = $this->user->count_notifikasi();
        $this->load->view('users/profile', $var);
    }

    public function update_profile()
    {
        $this->user->update_profile();
        $this->session->set_flashdata('success_update', true);
        redirect('User');
    }

    public function pilih_layanan()
    {
        $var['title'] = 'User | Pilih Layanan';
        $var['layanan'] = $this->user->get_layanan();
        $var['notif_pendaftaran'] = $this->user->notifikasi_pendaftaran();
        $var['notif_reject'] = $this->user->notifikasi_reject();
        $var['count_notif'] = $this->user->count_notifikasi();
        $this->load->view('users/pilih_layanan', $var);
    }

    public function pendaftaran($id)
    {
        $var['title'] = 'User | Pendaftaran';
        $var['view'] = $this->db->get_where('poliklinik', ['id' => $id])->row();
        $var['notif_pendaftaran'] = $this->user->notifikasi_pendaftaran();
        $var['notif_reject'] = $this->user->notifikasi_reject();
        $var['count_notif'] = $this->user->count_notifikasi();
        $this->load->view('users/pendaftaran', $var);
    }

    public function save_pendaftaran()
    {
        $id_poli = $this->input->post('id_poli');
        $data = $this->user->get_pendaftaran();
        // var_dump($data);
        if ($data == null) {
            $this->user->save_pendaftaran();
            $this->session->set_flashdata('success_daftar', true);
            redirect('User/riwayat_pendaftaran');
        } else {
            if ($data->status < 2) {
                $this->session->set_flashdata('sudah_daftar', true);
                redirect('User/pendaftaran/' . $id_poli);
            } else {
                $this->user->save_pendaftaran();
                $this->session->set_flashdata('success_daftar', true);
                redirect('User/riwayat_pendaftaran');
            }
        }
    }

    public function riwayat_pendaftaran()
    {
        $id = $this->session->userdata('id');
        $id_notif = $this->input->get('id_notif');
        if(!empty($id_notif)) {
            $this->user->status_notif_pendaftaran($id_notif);
        }
        $var['title'] = 'User | Riwayat Pendaftaran';
        $var['riwayat_pendaftaran'] = $this->user->riwayat_pendaftaran($id);
        $var['notif_pendaftaran'] = $this->user->notifikasi_pendaftaran();
        $var['notif_reject'] = $this->user->notifikasi_reject();
        $var['count_notif'] = $this->user->count_notifikasi();
        $this->load->view('users/riwayat_pendaftaran', $var);
    }

    public function detail_pendaftaran($id)
    {
        $var['title'] = 'User | Detail Pendaftaran';
        $var['view'] = $this->db->get_where('pendaftaran', ['id' => $id])->row();
        $no_antri = $this->user->no_antrian();
        $antri_selesai = $this->user->antri_selesai($var['view']->id_poli);
        $sisa_antrian = ($no_antri->no_antrian - $antri_selesai - 1) * 30;
        date_default_timezone_set('Asia/Jakarta');
        $var['waktu_antrian'] = $sisa_antrian;
        $var['notif_pendaftaran'] = $this->user->notifikasi_pendaftaran();
        $var['notif_reject'] = $this->user->notifikasi_reject();
        $var['count_notif'] = $this->user->count_notifikasi();
        $this->load->view('users/detail_pendaftaran', $var);
    }

    public function detail_pendaftaran2()
    {
        $var['title'] = 'User | Detail Pendaftaran';
        $id = $this->input->get('id');
        $this->user->status_notif_pendaftaran($id);
        $id_pendaftaran = $this->input->get('id_pendaftaran');
        $var['view'] = $this->db->get_where('pendaftaran', ['id' => $id_pendaftaran])->row();
        $no_antri = $this->user->no_antrian();
        $antri_selesai = $this->user->antri_selesai($var['view']->id_poli);
        $sisa_antrian = ($no_antri->no_antrian - $antri_selesai - 1) * 30;
        date_default_timezone_set('Asia/Jakarta');
        $var['waktu_antrian'] = $sisa_antrian;
        $var['notif_pendaftaran'] = $this->user->notifikasi_pendaftaran();
        $var['notif_reject'] = $this->user->notifikasi_reject();
        $var['count_notif'] = $this->user->count_notifikasi();
        $this->load->view('users/detail_pendaftaran', $var);
    }

    public function riwayat_pengobatan()
    {
        $var['title'] = 'User | Riwayat Pengobatan';
        $var['riwayat_pengobatan'] = $this->user->riwayat_pengobatan();
        $var['notif_pendaftaran'] = $this->user->notifikasi_pendaftaran();
        $var['notif_reject'] = $this->user->notifikasi_reject();
        $var['count_notif'] = $this->user->count_notifikasi();
        $this->load->view('users/riwayat_pengobatan', $var);
    }

    public function detail_pengobatan($id)
    {
        $var['title'] = 'User | Detail Pengobatan';
        $var['view'] = $this->user->detail_pengobatan($id);
        $var['list_obat'] = $this->user->list_obat($id);
        $var['notif_pendaftaran'] = $this->user->notifikasi_pendaftaran();
        $var['notif_reject'] = $this->user->notifikasi_reject();
        $var['count_notif'] = $this->user->count_notifikasi();
        $this->load->view('users/detail_pengobatan', $var);
    }
}
