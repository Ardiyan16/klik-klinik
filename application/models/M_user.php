<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    private $users = 'users';

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
}