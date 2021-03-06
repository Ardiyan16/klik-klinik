<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_owner extends CI_Model
{
    private $auth = 'auth';
    private $role = 'role';
    private $visimisi = 'visi_misi';

    public function get_team()
    {
        $this->db->select('auth.*, role.role');
        $this->db->from('auth');
        $this->db->join('role', 'auth.role_id = role.id');
        return $this->db->get()->result();
    }

    public function get_role()
    {
        return $this->db->get($this->role)->result();
    }

    public function count_visimisi()
    {
        return $this->db->count_all_results($this->visimisi);
    }

    public function get_visimisi()
    {
        return $this->db->get($this->visimisi)->row();
    }

    public function save_team()
    {
        
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->tempat_lahir = $post['tempat_lahir'];
        $this->tgl_lahir = $post['tgl_lahir'];
        $this->no_telp = $post['no_telp'];
        $this->email = htmlspecialchars($email);
        $this->username = $post['username'];
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->picture = $this->uploadPicture();
        $this->role_id = $post['role_id'];
        $this->status = 0;
        $this->db->insert($this->auth, $this);
    }

    private function uploadPicture()
    {
        $config['upload_path']          = './assets/img/image_team/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['picture']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('picture')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function status_active($id)
    {
        $this->db->query("UPDATE `auth` SET `status`= '1' WHERE auth.id ='$id'");
    }

    public function status_nonactive($id)
    {
        $this->db->query("UPDATE `auth` SET `status`= '0' WHERE auth.id ='$id'");
    }

    public function save_visimisi()
    {
        $post = $this->input->post();
        $this->visi = $post['visi'];
        $this->misi = $post['misi'];
        $this->motto = $post['motto'];
        $this->db->insert($this->visimisi, $this);
    }

    public function update_visimisi()
    {
        $post = $this->input->post();
        $this->visi = $post['visi'];
        $this->misi = $post['misi'];
        $this->motto = $post['motto'];
        $this->db->update($this->visimisi, $this, ['id' => 1]);
    }

}