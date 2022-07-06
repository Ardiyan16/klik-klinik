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
        $var['notif_new_user'] = $this->admin->notifikasi_new_user();
        $var['jml_notif'] = $this->admin->count_notif_user();
        $this->load->view('admin/dashboard', $var);
    }

    public function konfirmasi_user()
    {
        $var['title'] = 'Admin | Konfirmasi User';
        $var['user'] = $this->admin->get_users();
        // $var['user3'] = $this->admin->get_users();
        $var['user2'] = $this->admin->get_users();
        $this->load->view('admin/pengobatan/konfirmasi_user', $var);
    }

    public function create_no_rekmed($nik)
    {
        $var['title'] = 'Admin | Tambah No Rekam Medis';
        $var['view'] = $this->db->get_where('users', ['nik' => $nik])->row();
        $this->load->view('admin/pengobatan/create_norekmed', $var);
    }

    public function save_no_rekmed()
    {
        $this->form_validation->set_rules('no_rekmed', 'No Rekam Medis', 'required|trim|is_unique[users.no_rekmed]|max_length[12]', ['is_unique' => 'No rekam medis sudah terdaftar', 'max_length' => 'No rekam medis tidak lebih dari 12 karakter', 'required' => 'No rekam medis tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $nik = $this->input->post('nik');
            $this->create_no_rekmed($nik);
        } else {
            $nik = $this->input->post('nik');
            $no_rekmed = $this->input->post('no_rekmed');
            $this->db->set('no_rekmed', $no_rekmed);
            $this->db->where('nik', $nik);
            $this->db->update('users');
            $this->session->set_flashdata('success_create_norekmed', true);
            redirect('Admin/konfirmasi_user');
        }
    }

    public function konfirmasi_status_user($nik)
    {
        $this->admin->status_terkonfirmasi($nik);
        $this->session->set_flashdata('success_terkonfirmasi', true);
        redirect('Admin/konfirmasi_user');
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

    public function update_berita()
    {
        $this->admin->update_berita();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/berita');
    }

    public function delete_berita($id)
    {
        $this->db->delete('berita', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/berita');
    }

    public function jadwal_dokter()
    {
        $var['title'] = 'Admin | Jadwal Dokter';
        $var['jadwal_dokter'] = $this->admin->get_jadwal_dokter();
        $this->load->view('admin/jadwal_dokter', $var);
    }

    public function create_jadwal_dokter()
    {
        $var['title'] = 'Admin | Tambah Jadwal Dokter';
        $var['dokter'] = $this->admin->get_dokter();
        // var_dump($var['dokter']);
        $this->load->view('admin/create_jadwaldokter', $var);
    }

    public function save_jadwal_dokter()
    {
        $this->admin->save_jadwal_dokter();
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/jadwal_dokter');
    }

    public function edit_jadwal_dokter($id)
    {
        $var['title'] = 'Admin | Edit Jadwal Dokter';
        $var['dokter'] = $this->admin->get_dokter();
        $var['edit'] = $this->db->get_where('jadwal_dokter', ['id', $id])->row();
        $this->load->view('admin/edit_jadwaldokter', $var);
    }

    public function update_jadwal_dokter()
    {
        $this->admin->update_jadwal_dokter();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/jadwal_dokter');
    }

    public function delete_jadwal_dokter($id)
    {
        $this->db->delete('jadwal_dokter', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/jadwal_dokter');
    }

    public function partner()
    {
        $var['title'] = 'Admin | Partner Asuransi';
        $var['partner'] = $this->admin->get_partner();
        $var['partner2'] = $this->admin->get_partner();
        $this->load->view('admin/partner', $var);
    }

    public function save_partner()
    {
        $this->admin->save_partner();
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/partner');
    }

    public function update_partner()
    {
        $this->admin->update_partner();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/partner');
    }

    public function delete_partner($id)
    {
        $this->admin->delete_partner($id);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/partner');
    }

    public function penghargaan()
    {
        $var['title'] = 'Admin | Penghargaan';
        $var['penghargaan'] = $this->admin->get_penghargaan();
        $var['view_images'] = $this->admin->get_penghargaan();
        $this->load->view('admin/penghargaan', $var);
    }

    public function create_penghargaan()
    {
        $var['title'] = 'Admin | Tambah Penghargaan';
        $this->load->view('admin/create_penghargaan', $var);
    }

    public function save_penghargaan()
    {
        $this->admin->save_penghargaan();
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/penghargaan');
    }

    public function edit_penghargaan($id)
    {
        $var['title'] = 'Admin | Edit Penghargaan';
        $var['edit'] = $this->db->get_where('penghargaan', ['id' => $id])->row();
        $this->load->view('admin/edit_penghargaan', $var);
    }

    public function update_penghargaan()
    {
        $this->admin->update_penghargaan();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/penghargaan');
    }

    public function delete_penghargaan($id)
    {
        $this->admin->delete_penghargaan($id);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/penghargaan');
    }

    public function jadwal_vaksinasi()
    {
        $var['title'] = 'Admin | Jadwal Vaksinasi';
        $var['jadwal_vaksinasi'] = $this->admin->get_jadwal_vaksinasi();
        $var['view'] = $this->admin->get_jadwal_vaksinasi();
        $this->load->view('Admin/jadwal_vaksinasi', $var);
    }

    public function create_jadwal_vaksinasi()
    {
        
        $var['title'] = 'Admin | Tambah Jadwal Vaksinasi';
        $this->load->view('Admin/create_jadwalvaksinasi', $var);
    }

    public function save_jadwal_vaksinasi()
    {
        $this->admin->save_jadwal_vaksinasi();
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/jadwal_vaksinasi');
    }

    public function vaksinasi_selesai($id)
    {
        $this->admin->vaksinasi_selesai($id);
        $this->session->set_flashdata('success_vaksinasi_done', true);
        redirect('Admin/jadwal_vaksinasi');
    }

    public function edit_jadwal_vaksinasi($id)
    {
        $var['title'] = 'Admin | Edit Jadwal Vaksinasi';
        $var['edit'] = $this->db->get_where('jadwal_vaksinasi', ['id' => $id])->row();
        $this->load->view('Admin/edit_jadwalvaksinasi', $var);
    }

    public function update_jadwal_vaksinasi()
    {
        $this->admin->update_jadwal_vaksinasi();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/jadwal_vaksinasi');
    }

    public function delete_jadwal_vaksinasi($id)
    {
        $this->admin->delete_jadwal_vaksinasi($id);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/jadwal_vaksinasi');
    }

    public function poliklinik()
    {
        $var['title'] = 'Admin | Poliklinik';
        $var['poliklinik'] = $this->admin->get_poli();
        $var['poliklinik2'] = $this->admin->get_poli();
        $this->load->view('admin/poliklinik', $var);
    }

    public function save_poliklinik()
    {
        $this->admin->save_poliklinik();
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/poliklinik');
    }

    public function update_poliklinik()
    {
        $this->admin->update_poliklinik();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/poliklinik');
    }

    public function delete_poliklinik($id)
    {
        $this->db->delete('poliklinik', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/poliklinik');
    }
}
