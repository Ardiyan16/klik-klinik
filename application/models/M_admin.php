<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    private $auth = 'auth';
    private $karir = 'karir';
    private $berita = 'berita';

    public function get_karir()
    {
        return $this->db->get($this->karir)->result();
    }

    public function get_berita()
    {
        return $this->db->get($this->berita)->result();
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
}
