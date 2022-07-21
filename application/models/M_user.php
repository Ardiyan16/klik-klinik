<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    private $users = 'users';
    private $poli = 'poliklinik';
    private $pendaftaran = 'pendaftaran';

    public function get_layanan()
    {
        return $this->db->get($this->poli)->result();
    }

    public function get_pendaftaran()
    {
        $date = date('Y-m-d');
        $id_users = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->where('tgl_pendaftaran', $date);
        $this->db->where('id_users', $id_users);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->row();
    }

    public function riwayat_pendaftaran($id)
    {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->where('id_users', $id);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function update_profile()
    {
        $post = $this->input->post();
        $this->nik = $post['nik'];
        $this->name = $post['name'];
        $this->tempat_lahir = $post['tempat_lahir'];
        $this->tgl_lahir = $post['tgl_lahir'];
        $this->no_telp = $post['no_telp'];
        $this->email = $post['email'];
        $this->db->update($this->users, $this, ['nik' => $post['nik']]);
    }

    public function save_pendaftaran()
    {
        $post = $this->input->post();
        $this->kd_pendaftaran = $post['kd_pendaftaran'];
        $this->id_users = $post['id_users'];
        $this->id_poli = $post['id_poli'];
        $this->tgl_pendaftaran = $post['tgl_pendaftaran'];
        $this->gejala = $post['gejala'];
        $this->id_dokter = 0;
        $this->status = 0;
        $this->db->insert($this->pendaftaran, $this);
    }

    public function notifikasi_pendaftaran()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('notifikasi_pendaftaran');
        $this->db->where('status', 0);
        $this->db->where('jenis', 1);
        $this->db->where('id_users', $id);
        return $this->db->get()->result();
    }

    public function notifikasi_reject()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('notifikasi_pendaftaran');
        $this->db->where('status', 0);
        $this->db->where('jenis', 2);
        $this->db->where('id_users', $id);
        return $this->db->get()->result();
    }

    public function count_notifikasi()
    {
        $id = $this->session->userdata('id');
        $this->db->select('COUNT(id) as jml');
        $this->db->from('notifikasi_pendaftaran');
        $this->db->where('status', 0);
        $this->db->where('id_users', $id);
        return $this->db->get()->row()->jml;
    }

    public function status_notif_pendaftaran($id)
    {
        $this->db->query("UPDATE `notifikasi_pendaftaran` SET `status`= '1' WHERE notifikasi_pendaftaran.id ='$id'");
    }

    public function no_antrian()
    {
        $date = date('Y-m-d');
        $id = $this->session->userdata('id');
        $this->db->select('no_antrian');
        $this->db->where('id_users', $id);
        $this->db->where('tgl_pendaftaran', $date);
        $this->db->where('status', 1);
        return $this->db->get('pendaftaran')->row();
    }

    public function antri_selesai($id_poli)
    {
        $date = date('Y-m-d');
        $this->db->where('status', 2);
        $this->db->where('id_poli', $id_poli);
        $this->db->where('tgl_pendaftaran', $date);
        return $this->db->count_all_results('pendaftaran');
    }
}
