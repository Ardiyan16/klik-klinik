<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    private $auth = 'auth';
    private $karir = 'karir';
    private $berita = 'berita';
    private $jadwal_dokter = 'jadwal_dokter';
    private $partner = 'partner';
    private $users = 'users';
    private $penghargaan = 'penghargaan';

    public function get_users()
    {
        $this->db->select('*');
        $this->db->from($this->users);
        $this->db->order_by('nik', 'desc');
        return $this->db->get()->result();
    }

    public function get_karir()
    {
        return $this->db->get($this->karir)->result();
    }

    public function get_berita()
    {
        return $this->db->get($this->berita)->result();
    }

    public function get_jadwal_dokter()
    {
        $this->db->select('jadwal_dokter.*, auth.nama');
        $this->db->from('jadwal_dokter');
        $this->db->join('auth', 'jadwal_dokter.id_dokter = auth.id');
        return $this->db->get()->result();
    }

    public function get_dokter()
    {
        $this->db->select('*');
        $this->db->from('auth');
        $this->db->where('role_id', 2);
        return $this->db->get()->result();
    }

    public function get_partner()
    {
        return $this->db->get($this->partner)->result();
    }

    public function get_penghargaan()
    {
        return $this->db->get($this->penghargaan)->result();
    }

    public function notifikasi_new_user()
    {
        $this->db->select('*');
        $this->db->from($this->users);
        $this->db->where('status', 0);
        $this->db->order_by('nik', 'desc');
        return $this->db->get()->result();
    }

    public function count_notif_user()
    {
        $this->db->select('COUNT(nik) as jml');
        $this->db->from($this->users);
        $this->db->where('status', 0);
        $this->db->order_by('nik', 'desc');
        return $this->db->get()->row()->jml;
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
        $this->db->update($this->auth, $this, ['id' => $post['id']]);
    }

    public function save_karir()
    {
        $post = $this->input->post();
        $this->bidang = $post['bidang'];
        $this->jml_dibutuhkan = $post['jml_dibutuhkan'];
        $this->syarat_kebutuhan = $post['syarat_kebutuhan'];
        $this->batas_akhir = $post['batas_akhir'];
        $this->status = 0;
        $this->db->insert($this->karir, $this);
    }

    public function status_buka($id)
    {
        $this->db->query("UPDATE `karir` SET `status`= '1' WHERE karir.id ='$id'");
    }

    public function status_tutup($id)
    {
        $this->db->query("UPDATE `karir` SET `status`= '0' WHERE karir.id ='$id'");
    }
    public function status_terkonfirmasi($nik)
    {
        $this->db->query("UPDATE `users` SET `status`= '1' WHERE users.nik ='$nik'");
    }

    public function update_karir()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->bidang = $post['bidang'];
        $this->jml_dibutuhkan = $post['jml_dibutuhkan'];
        $this->syarat_kebutuhan = $post['syarat_kebutuhan'];
        $this->batas_akhir = $post['batas_akhir'];
        $this->db->update($this->karir, $this, ['id' => $post['id']]);
    }

    public function save_berita()
    {
        $post = $this->input->post();
        $this->judul = $post['judul'];
        $this->tanggal = $post['tanggal'];
        $this->tag = $post['tag'];
        $this->deskripsi = $post['deskripsi'];
        $this->images = $this->upload_imagesBerita();
        $this->penulis = $this->session->userdata('username');
        $this->db->insert($this->berita, $this);
    }

    public function update_berita()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->judul = $post['judul'];
        $this->tanggal = $post['tanggal'];
        $this->tag = $post['tag'];
        $this->deskripsi = $post['deskripsi'];
        if (!empty($_FILES["images"]["name"])) {
            $this->images = $this->upload_imagesBerita();
        } else {
            $this->images = $post["old_images"];
        }
        $this->db->update($this->berita, $this, ['id' => $post['id']]);
    }

    private function upload_imagesBerita()
    {
        $config['upload_path']          = './assets/img/image_berita/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['images']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function save_jadwal_dokter()
    {
        $post = $this->input->post();
        $this->id_dokter = $post['id_dokter'];
        $this->senin = $post['senin'];
        $this->senin2 = $post['senin2'];
        $this->selasa = $post['selasa'];
        $this->selasa2 = $post['selasa2'];
        $this->rabu = $post['rabu'];
        $this->rabu2 = $post['rabu2'];
        $this->kamis = $post['kamis'];
        $this->kamis2 = $post['kamis2'];
        $this->jumat = $post['jumat'];
        $this->jumat2 = $post['jumat2'];
        $this->sabtu = $post['sabtu'];
        $this->sabtu2 = $post['sabtu2'];
        $this->minggu = $post['minggu'];
        $this->minggu2 = $post['minggu2'];
        $this->db->insert($this->jadwal_dokter, $this);
    }

    public function update_jadwal_dokter()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->id_dokter = $post['id_dokter'];
        $this->senin = $post['senin'];
        $this->senin2 = $post['senin2'];
        $this->selasa = $post['selasa'];
        $this->selasa2 = $post['selasa2'];
        $this->rabu = $post['rabu'];
        $this->rabu2 = $post['rabu2'];
        $this->kamis = $post['kamis'];
        $this->kamis2 = $post['kamis2'];
        $this->jumat = $post['jumat'];
        $this->jumat2 = $post['jumat2'];
        $this->sabtu = $post['sabtu'];
        $this->sabtu2 = $post['sabtu2'];
        $this->minggu = $post['minggu'];
        $this->minggu2 = $post['minggu2'];
        $this->db->update($this->jadwal_dokter, $this, ['id' => $post['id']]);
    }

    public function save_partner()
    {
        $post = $this->input->post();
        $this->nama_partner = $post['nama_partner'];
        $this->images_partner = $this->upload_imagesPartner();
        $this->db->insert($this->partner, $this);
    }

    public function update_partner()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama_partner = $post['nama_partner'];
        if (!empty($_FILES["images_partner"]["name"])) {
            $this->images_partner = $this->upload_imagesPartner();
        } else {
            $this->images_partner = $post["old_images"];
        }
        $this->db->update($this->partner, $this, ['id' => $post['id']]);
    }

    private function upload_imagesPartner()
    {
        $config['upload_path']          = './assets/img/image_partner/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['images_partner']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images_partner')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function delete_partner($id)
    {
        $this->hapus_fotoPartner($id);
        return $this->db->delete($this->partner, array("id" => $id));
    }

    public function hapus_fotoPartner($id)
    {
        $foto = $this->db->get_where($this->partner, ['id' => $id])->row();
        if ($foto->images_partner != "01.jpg") {
            $filename = explode(".", $foto->images_partner)[0];
            return array_map('unlink', glob(FCPATH . "/assets/img/image_partner/$filename.*"));
        }
    }
}
