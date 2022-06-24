<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/login_backend');
    }

    public function action_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'username tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login_backend');
        } else {
            $this->login_backend();
        }
    }

    private function login_backend()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $user = $this->db->get_where('auth', ['username' => $username])->row_array();
        $cekpass = $this->db->get_where('auth', array('password' => $password));


        //jika usernya terdaftar
        if ($username == $user['username']) {
            if (password_verify($password, $user['password'])) {
                if ($user['status'] == 1) {
                    $data = [
                        'id' => $user['id'],
                        'nama' => $user['nama'],
                        'tempat_lahir' => $user['tempat_lahir'],
                        'tgl_lahir' => $user['tgl_lahir'],
                        'no_telp' => $user['no_telp'],
                        'email' => $user['email'],
                        'picture' => $user['picture'],
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == '0') {
                        redirect('Owner');
                    }
                    if ($user['role_id'] == '1') {
                        redirect('Admin');
                    }
                    if ($user['role_id'] == '2') {
                        redirect('Dokter');
                    }
                    if ($user['role_id'] == '3') {
                        redirect('Apoteker');
                    }
                    if ($user['role_id'] == '4') {
                        redirect('Kasir');
                    } else {
                        $this->session->unset_userdata('id');
                        $this->session->unset_userdata('nama');
                        $this->session->unset_userdata('tempat_lahir');
                        $this->session->unset_userdata('tgl_lahir');
                        $this->session->unset_userdata('no_telp');
                        $this->session->unset_userdata('email');
                        $this->session->unset_userdata('picture');
                        $this->session->unset_userdata('username');
                        $this->session->unset_userdata('role_id');
                        $this->session->set_flashdata('gagal', true);
                        redirect('Auth');
                    }
                } else {
                    $this->session->set_flashdata('tidak_aktif', true);
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('password_salah', true);
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('username_salah', true);
            redirect('Auth');
        }
    }

    public function logout_backend()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('tempat_lahir');
        $this->session->unset_userdata('tgl_lahir');
        $this->session->unset_userdata('no_telp');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('picture');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('logout', true);
        redirect('Auth');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }
}
