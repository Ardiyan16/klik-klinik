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
        $var['notif_new_pendaftaran'] = $this->admin->notifikasi_new_pendaftaran();
        $var['jml_notif'] = $this->admin->count_notif_user();
        $var['jml_notif2'] = $this->admin->count_notif_pendaftaran();
        $var['jml_user_online'] = $this->admin->count_user_active();
        $var['jml_user_offline'] = $this->admin->count_user_offline();
        // var_dump($var['jml_user_online']);
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

    public function pendaftaran()
    {
        $var['title'] = 'Admin | Pendaftaran';
        $var['pendaftaran'] = $this->admin->get_pendaftaran();
        $var['detail'] = $this->admin->get_pendaftaran();
        $var['detail2'] = $this->admin->get_pendaftaran();
        $this->load->view('admin/pengobatan/pendaftaran', $var);
    }

    public function konfirmasi_pendaftaran()
    {
        $var['title'] = 'Admin | Konfirmasi Pendaftaran';
        $id = $this->input->get('id');
        $id_poli = $this->input->get('id_poli');
        $var['view'] = $this->admin->detail_pendaftaran($id);
        $var['list_dokter'] = $this->admin->list_dokter($id_poli);
        // $this->admin->max_no_antri('admin')
        $this->load->view('admin/pengobatan/konfirmasi_pendaftaran', $var);
    }

    public function max_no_antri($id_poli)
    {
        $data = $this->admin->max_no_antri($id_poli);
        // var_dump($data);
        echo json_encode($data);
    }

    public function save_konfirmasi_pendaftaran()
    {
        $this->admin->update_pendaftaran();
        $id_pendaftaran = $this->input->post('id');
        $id_users = $this->input->post('id_users');
        $notif = array(
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_users,
            'keterangan' => 'Pendaftaran anda telah dikonfirmasi',
            'jenis' => 1,
            'status' => 0,
        );
        $this->db->insert('notifikasi_pendaftaran', $notif);
        $this->session->set_flashdata('success_konfirmasi', true);
        redirect('Admin/pendaftaran');
    }

    public function reject_pendaftaran()
    {
        $id = $this->input->post('id');
        $id_users = $this->input->post('id_users');
        $keterangan = $this->input->post('keterangan');
        if (!empty($id)) {
            $this->db->set('status', 4);
            $this->db->where('id', $id);
            $this->db->update('pendaftaran');
        }

        if (!empty($keterangan)) {
            $notif = array(
                'id_pendaftaran' => $id,
                'id_users' => $id_users,
                'keterangan' => $keterangan,
                'jenis' => 2,
                'status' => 0,
            );
            $this->db->insert('notifikasi_pendaftaran', $notif);
        }
        $this->session->set_flashdata('success_reject', true);
        redirect('Admin/pendaftaran');
    }

    public function pilih_layanan()
    {
        $var['title'] = 'Admin | Pilih Layanan';
        $var['layanan'] = $this->admin->get_poli();
        $this->load->view('admin/pengobatan/pilih_layanan', $var);
    }

    public function pendaftaran_offline($id)
    {
        $var['title'] = 'Admin | Pendaftaran Offline';
        $var['view'] = $this->db->get_where('poliklinik', ['id' => $id])->row();
        $var['list_dokter'] = $this->admin->list_dokter($id);
        $this->load->view('admin/pengobatan/pendaftaran_offline', $var);
    }

    public function data_pasien()
    {
        $list = $this->admin->get_datatablesid();
        // print_r($this->db->last_query());
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $pasien) {
            // $kode_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $pasien->kode_barang);
            // $nama_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $pasien->nama_barang);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pasien->no_rekmed;
            $row[] = $pasien->name;
            $row[] = $pasien->tempat_lahir;
            $row[] = date('d-m-Y', strtotime($pasien->tgl_lahir));

            $row[] = ' <button type="button" class="btn btn-primary "onclick="pencarian_kode(\'' . $pasien->id . '\',\'' . $pasien->no_rekmed . '\',\'' . $pasien->name . '\',\'' . $pasien->tempat_lahir . '\',\'' . $pasien->tgl_lahir . '\')">Pilih</button>';


            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->admin->count_allid(),
            "recordsFiltered" => $this->admin->count_filteredid(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function save_pendaftaran()
    {
        $id = $this->input->post('id_poli');
        $this->form_validation->set_rules('id_users', 'Id Users', 'required|trim', ['required' => 'anda belum menginputkan pasien']);
        if ($this->form_validation->run() == false) {
            $this->pendaftaran_offline($id);
        } else {
            $this->admin->save_pendaftaran();
            $this->session->set_flashdata('success_daftar', true);
            redirect('Admin/pendaftaran');
        }
    }

    public function create_users()
    {
        $var['title'] = 'Admin | Tambah Pasien Offline';
        $this->load->view('admin/pengobatan/create_users', $var);
    }

    public function save_users()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'is_unique[users.nik]|max_length[16]', ['max_length' => 'NIK tidak lebih dari 16 karakter', 'required' => 'NIK tidak boleh kosong']);
        $this->form_validation->set_rules('no_rekmed', 'No Rekam Medis', 'required|trim|is_unique[users.no_rekmed]|max_length[12]', ['is_unique' => 'No rekam medis sudah terdaftar', 'max_length' => 'No rekam medis tidak lebih dari 12 karakter', 'required' => 'No rekam medis tidak boleh kosong']);
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', ['required' => 'nama lengkap tidak boleh kosong']);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', ['required' => 'tempat lahir tidak boleh kosong']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', ['required' => 'tanggal lahir tidak boleh kosong']);
        $this->form_validation->set_rules('no_telp', 'No Telp', 'max_length[13]|numeric', ['max_length' => 'no telepon tidak lebih dari 13 karakter', 'numeric' => 'no telepon harus angka']);
        if ($this->form_validation->run() == false) {
            $this->create_users();
        } else {
            $users = array(
                'nik' => $this->input->post('nik'),
                'no_rekmed' => $this->input->post('no_rekmed'),
                'name' => $this->input->post('name'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'status' => 2,
            );

            $this->db->insert('users', $users);
            $this->session->set_flashdata('success_add_user', true);
            redirect('Admin/konfirmasi_user');
        }
    }

    public function riwayat_pendaftaran()
    {
        $var['title'] = 'Admin | Pendaftaran';
        $var['pendaftaran'] = $this->admin->riwayat_pendaftaran();
        $var['detail'] = $this->admin->riwayat_pendaftaran();
        $this->load->view('admin/pengobatan/riwayat_pendaftaran', $var);
    }

    public function pengobatan()
    {
        $var['title'] = 'Admin | Pengobatan';
        $var['pengobatan'] = $this->admin->get_pengobatan();
        $var['detail'] = $this->admin->get_pengobatan();
        $this->load->view('admin/pengobatan/pengobatan', $var);
    }

    public function create_pengobatan()
    {
        $var['title'] = 'Admin | Pengobatan';
        $this->load->view('admin/pengobatan/create_pengobatan', $var);
    }

    public function data_pendaftaran()
    {
        $list = $this->admin->get_data_pendaftaran();
        // print_r($this->db->last_query());
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $pendaftaran) {
            // $kode_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $pasien->kode_barang);
            // $nama_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $pasien->nama_barang);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pendaftaran->kd_pendaftaran;
            $row[] = $pendaftaran->name;
            $row[] = $pendaftaran->nama_poli;
            $row[] = $pendaftaran->no_antrian;

            $row[] = ' <button type="button" class="btn btn-primary "onclick="pencarian_kode(\'' . $pendaftaran->id . '\',\'' . $pendaftaran->kd_pendaftaran . '\',\'' . $pendaftaran->id_dokter . '\',\'' . $pendaftaran->no_rekmed . '\',\'' . $pendaftaran->name . '\',\'' . $pendaftaran->nama_poli . '\',\'' . $pendaftaran->no_antrian . '\',\'' . $pendaftaran->gejala . '\')">Pilih</button>';


            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->admin->jml_allid(),
            "recordsFiltered" => $this->admin->jml_filteredid(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function save_pengobatan()
    {
        $this->admin->save_pengobatan();
        $id_pendaftaran = $this->input->post('id');
        if (!empty($id_pendaftaran)) {
            $this->db->set('status', 2);
            $this->db->where('id', $id_pendaftaran);
            $this->db->update('pendaftaran');
        }
        $lastid = $this->admin->get_lastid();
        // var_dump($lastid);
        $notif = array(
            'id_pengobatan' => $lastid[0]->id,
            'id_auth' => $this->input->post('id_dokter'),
            'keterangan' => 'Dokter, anda mempunyai pasien baru',
            'status' => 0,
        );
        $this->db->insert('notifikasi_pengobatan', $notif);
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/pengobatan');
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

    public function pesan_kontak()
    {
        $var['title'] = 'Admin | Pesan';
        $var['pesan'] = $this->admin->get_pesan();
        $this->load->view('admin/pesan_kontak', $var);
    }

    public function delete_pesan_kontak($id)
    {
        $this->db->delete('kontak', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/pesan_kontak');
    }

    public function dokter()
    {
        $var['title'] = 'Admin | Dokter';
        $var['list_dokter'] = $this->admin->get_dokter();
        $var['list_poli'] = $this->admin->get_poli();
        $var['dokter'] = $this->admin->view_dokter();
        $var['dokter2'] = $this->admin->view_dokter();
        $this->load->view('admin/dokter', $var);
    }

    public function save_dokter()
    {
        $data = array(
            'id_dokter' => $this->input->post('id_dokter'),
            'id_poli' => $this->input->post('id_poli')
        );
        $this->db->insert('dokter', $data);
        $this->session->set_flashdata('success_create', true);
        redirect('Admin/dokter');
    }

    public function update_dokter()
    {
        $this->admin->update_dokter();
        $this->session->set_flashdata('success_update', true);
        redirect('Admin/dokter');
    }

    public function delete_dokter($id)
    {
        $this->db->delete('dokter', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/dokter');
    }
}
