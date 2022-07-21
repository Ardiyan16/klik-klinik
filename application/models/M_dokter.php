<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dokter extends CI_Model
{
    private $dokter = 'auth';

    public function get_pengobatan()
    {
        $id_dokter = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('pengobatan');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('status_pengobatan <', 3);
        $this->db->where('auth.id', $id_dokter);
        $this->db->order_by('pengobatan.id', 'asc');
        return $this->db->get()->result();
    }

    public function detail_pengobatan($id)
    {
        $id_dokter = $this->session->userdata('id');
        $this->db->select('pengobatan.*, users.name, users.nik, users.no_rekmed, users.tempat_lahir, users.tgl_lahir, poliklinik.nama_poli, auth.nama, pendaftaran.gejala');
        $this->db->from('pengobatan');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('status_pengobatan <', 3);
        $this->db->where('pengobatan.id', $id);
        $this->db->where('auth.id', $id_dokter);
        $this->db->order_by('pengobatan.id', 'asc');
        return $this->db->get()->row();
    }

    public function update_profile()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama = $post['nama'];
        $this->tempat_lahir = $post['tempat_lahir'];
        $this->tgl_lahir = $post['tgl_lahir'];
        $this->no_telp = $post['no_telp'];
        $this->email = $post['email'];
        $this->db->update($this->dokter, $this, ['id' => $post['id']]);
    }

    public function notifikasi_pengobatan()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('notifikasi_pengobatan');
        $this->db->where('status', 0);
        $this->db->where('id_auth', $id);
        return $this->db->get()->result();
    }

    public function count_notifikasi()
    {
        $id = $this->session->userdata('id');
        $this->db->select('COUNT(id) as jml');
        $this->db->from('notifikasi_pengobatan');
        $this->db->where('status', 0);
        $this->db->where('id_auth', $id);
        return $this->db->get()->row()->jml;
    }

    public function count_pengobatan()
    {
        $id = $this->session->userdata('id');
        $this->db->select('COUNT(pengobatan.id) as jml');
        $this->db->from('pengobatan');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->where('id_dokter', $id);
        return $this->db->get()->row()->jml;
    }

    public function status_notif_pengobatan($id)
    {
        $this->db->query("UPDATE `notifikasi_pengobatan` SET `status`= '1' WHERE notifikasi_pengobatan.id ='$id'");
    }

    public function save_diagnosa()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->diagnosa = $post['diagnosa'];
        $this->status_pengobatan = 1;
        $this->db->update('pengobatan', $this, ['id' => $post['id']]);
    }

    public function riwayat_pengobatan()
    {
        $id_dokter = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('pengobatan');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('auth.id', $id_dokter);
        $this->db->order_by('pengobatan.id', 'asc');
        return $this->db->get()->result();
    }

}
