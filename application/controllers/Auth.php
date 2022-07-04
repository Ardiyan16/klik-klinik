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

    public function login_action()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim', ['required' => 'No NIK tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->login();
        } else {
            $this->proses_login();
        }
    }

    private function proses_login()
    {
        $nik = htmlspecialchars($this->input->post('nik', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $user = $this->db->get_where('users', ['nik' => $nik])->row_array();
        $cekpass = $this->db->get_where('users', array('password' => $password));

        if ($nik == $user['nik']) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nik' => $user['nik'],
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'tempat_lahir' => $user['tempat_lahir'],
                    'tgl_lahir' => $user['tgl_lahir'],
                    'alamat' => $user['alamat'],
                    'no_telp' => $user['no_telp'],
                    'status' => $user['status'],
                ];
                $this->session->set_userdata($data);
                if ($user['status'] == '1') {
                    redirect('User');
                } else {
                    $this->session->unset_userdata('nik');
                    $this->session->unset_userdata('alamat');
                    $this->session->unset_userdata('email');
                    $this->session->unset_userdata('name');
                    $this->session->unset_userdata('tempat_lahir');
                    $this->session->unset_userdata('tgl_lahir');
                    $this->session->unset_userdata('no_telp');
                    $this->session->unset_userdata('status');
                    $this->session->set_flashdata('belum_terverifikasi', true);
                    redirect('Auth/login');
                }
            } else {
                $this->session->set_flashdata('password_salah', true);
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('nik_salah', true);
            redirect('Auth/login');
        }
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function action_register()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[users.nik]|max_length[16]', ['is_unique' => 'nik anda telah terdaftar', 'max_length' => 'NIK tidak lebih dari 16 karakter', 'required' => 'NIK tidak boleh kosong']);
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', ['required' => 'nama lengkap tidak boleh kosong']);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', ['required' => 'tempat lahir tidak boleh kosong']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', ['required' => 'tanggal lahir tidak boleh kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['valid_email' => 'email anda tidak valid', 'required' => 'email tidak boleh kosong']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'asal unit anda tidak boleh kosong']);
        $this->form_validation->set_rules('no_telp', 'Alamat', 'required|trim|max_length[13]|numeric', ['required' => 'asal unit anda tidak boleh kosong', 'max_length' => 'no telepon tidak lebih dari 13 karakter', 'numeric' => 'no telepon harus angka']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['required' => 'password tidak boleh kosong', 'min_length' => 'password minimal 6 karakter']);
        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $this->proses_registrasi();
        }
    }

    private function proses_registrasi()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $register = array(
            'nik' => $this->input->post('nik'),
            'name' => $this->input->post('name'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'email' => htmlspecialchars($email),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'status' => 0,
        );

        $this->db->insert('users', $register);
        $this->session->set_flashdata('success_register', true);
        redirect('Auth/login');
    }

    public function forgot()
    {
        $this->load->view('auth/forgot');
    }

    public function action_forgot()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim', ['required' => 'No NIK tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'required|trim|matches[password]', ['required' => 'konfimasi password tidak boleh kosong', 'matches' => 'konfirmasi password tidak sesuai']);
        if ($this->form_validation->run() == false) {
            $this->forgot();
        } else {
            $this->proses_forgot();
        }
    }

    private function proses_forgot()
    {
        $nik = htmlspecialchars($this->input->post('nik', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $user = $this->db->get_where('users', ['nik' => $nik, 'status' => 1])->row_array();

        if ($nik == $user['nik']) {

            if ($password = $this->input->post('password')) {

                $this->db->set('password', password_hash($password, PASSWORD_BCRYPT));
                $this->db->where('nik', $nik);
                $this->db->update('users');
                $this->session->set_flashdata('success_change_password', true);
                redirect('Auth/login');
            } else {
                $this->session->set_flashdata('fail_change_password', true);
                redirect('Auth/forgot');
            }
        } else {
            $this->session->set_flashdata('wrong_email', true);
            redirect('Auth/forgot');
        }
    }

    public function logout_user()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('alamat');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('tempat_lahir');
        $this->session->unset_userdata('tgl_lahir');
        $this->session->unset_userdata('no_telp');
        $this->session->unset_userdata('status');
        $this->session->set_flashdata('logout', true);
        redirect('Auth/login');
    }
}
