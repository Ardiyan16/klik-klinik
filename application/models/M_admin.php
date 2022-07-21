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
    private $jadwal_vaksinasi = 'jadwal_vaksinasi';
    private $poli = 'poliklinik';
    private $kontak = 'kontak';
    private $pendaftaran = 'pendaftaran';
    private $dokter = 'dokter';
    private $pengobatan = 'pengobatan';

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
        $this->db->select('jadwal_dokter.*, auth.nama, auth.picture');
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

    public function get_jadwal_vaksinasi()
    {
        return $this->db->order_by('id', 'desc')->get($this->jadwal_vaksinasi)->result();
    }

    public function get_poli()
    {
        return $this->db->get($this->poli)->result();
    }

    public function get_pesan()
    {
        return $this->db->get($this->kontak)->result();
    }

    public function max_no_antri($id_poli)
    {
        $date = date('Y-m-d');
        return $this->db->query("SELECT max(no_antrian) as maxs FROM pendaftaran WHERE tgl_pendaftaran = '$date' AND id_poli = '$id_poli' order by no_antrian desc limit 1")->row();
    }

    public function get_pendaftaran()
    {
        $this->db->select('pendaftaran.*, users.name, users.no_rekmed, poliklinik.nama_poli, auth.nama');
        $this->db->from('pendaftaran');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->where('pendaftaran.status <', 3);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function riwayat_pendaftaran()
    {
        $this->db->select('pendaftaran.*, users.name, users.no_rekmed, poliklinik.nama_poli');
        $this->db->from('pendaftaran');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('pendaftaran.status >', 2);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pendaftaran($id)
    {
        $this->db->select('pendaftaran.*, users.name, users.no_rekmed, poliklinik.nama_poli');
        $this->db->from('pendaftaran');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('pendaftaran.id', $id);
        return $this->db->get()->row();
    }

    public function notifikasi_new_user()
    {
        $this->db->select('*');
        $this->db->from($this->users);
        $this->db->where('status', 0);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function count_notif_user()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from($this->users);
        $this->db->where('status', 0);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->row()->jml;
    }

    public function notifikasi_new_pendaftaran()
    {
        $this->db->select('pendaftaran.*, poliklinik.nama_poli');
        $this->db->from('pendaftaran');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('status', 0);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function count_notif_pendaftaran()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('pendaftaran');
        $this->db->where('status', 0);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->row()->jml;
    }

    public function count_user_active()
    {
        $this->db->where('status', 1);
        return $this->db->count_all_results('users');
    }

    public function count_user_offline()
    {
        $this->db->where('status', 2);
        return $this->db->count_all_results('users');
    }

    public function get_pengobatan()
    {
        $this->db->select('*');
        $this->db->from('pengobatan');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('status_pengobatan <', 3);
        $this->db->order_by('pengobatan.id', 'desc');
        return $this->db->get()->result();
    }

    function get_lastid()
    {
        $sql = $this->db->select('id');
        $sql = $this->db->from('pengobatan');
        $sql = $this->db->order_by('id', 'desc');
        $sql = $this->db->limit(1);
        $sql = $this->db->get();

        return $sql->result();
    }

    public function view_dokter()
    {
        $this->db->select('dokter.*, auth.nama, auth.picture, poliklinik.nama_poli');
        $this->db->from($this->dokter);
        $this->db->join('auth', 'dokter.id_dokter = auth.id');
        $this->db->join('poliklinik', 'dokter.id_poli = poliklinik.id');
        return $this->db->get()->result();
    }

    public function list_dokter($id)
    {
        $this->db->select('dokter.*, auth.nama, auth.picture');
        $this->db->from($this->dokter);
        $this->db->join('auth', 'dokter.id_dokter = auth.id');
        // $this->db->join('poliklinik', 'dokter.id_poli = poliklinik.id');
        $this->db->where('dokter.id_poli', $id);
        return $this->db->get()->result();
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

    public function vaksinasi_selesai($id)
    {
        $this->db->query("UPDATE `jadwal_vaksinasi` SET `status`= '2' WHERE jadwal_vaksinasi.id ='$id'");
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
        $this->kategori = $post['kategori'];
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
        $this->kategori = $post['kategori'];
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

    public function save_penghargaan()
    {
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->kategori = $post['kategori'];
        $this->deskripsi = $post['deskripsi'];
        $this->tgl_diperoleh = $post['tgl_diperoleh'];
        $this->images = $this->upload_imagesPenghargaan();
        $this->db->insert($this->penghargaan, $this);
    }

    public function update_penghargaan()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama = $post['nama'];
        $this->kategori = $post['kategori'];
        $this->deskripsi = $post['deskripsi'];
        $this->tgl_diperoleh = $post['tgl_diperoleh'];
        if (!empty($_FILES["images"]["name"])) {
            $this->images = $this->upload_imagesPenghargaan();
        } else {
            $this->images = $post["old_images"];
        }
        $this->db->update($this->penghargaan, $this, ['id' => $post['id']]);
    }

    private function upload_imagesPenghargaan()
    {
        $config['upload_path']          = './assets/img/image_penghargaan/';
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

    public function delete_penghargaan($id)
    {
        $this->hapus_fotoPenghargaan($id);
        return $this->db->delete($this->penghargaan, array("id" => $id));
    }

    public function hapus_fotoPenghargaan($id)
    {
        $foto = $this->db->get_where($this->penghargaan, ['id' => $id])->row();
        if ($foto->images != "01.jpg") {
            $filename = explode(".", $foto->images)[0];
            return array_map('unlink', glob(FCPATH . "/assets/img/image_penghargaan/$filename.*"));
        }
    }

    public function save_jadwal_vaksinasi()
    {
        $post = $this->input->post();
        $this->judul = $post['judul'];
        $this->jenis_vaksin = $post['jenis_vaksin'];
        $this->tanggal = $post['tanggal'];
        $this->jam_mulai = $post['jam_mulai'];
        $this->jam_selesai = $post['jam_selesai'];
        $this->images = $this->upload_imagesVaksinasi();
        $this->status = 1;
        $this->db->insert($this->jadwal_vaksinasi, $this);
    }

    public function update_jadwal_vaksinasi()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->judul = $post['judul'];
        $this->jenis_vaksin = $post['jenis_vaksin'];
        $this->tanggal = $post['tanggal'];
        $this->jam_mulai = $post['jam_mulai'];
        $this->jam_selesai = $post['jam_selesai'];
        if (!empty($_FILES["images"]["name"])) {
            $this->images = $this->upload_imagesVaksinasi();
        } else {
            $this->images = $post["old_images"];
        }
        $this->db->update($this->jadwal_vaksinasi, $this, ['id' => $post['id']]);
    }

    private function upload_imagesVaksinasi()
    {
        $config['upload_path']          = './assets/img/image_all/';
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

    public function delete_jadwal_vaksinasi($id)
    {
        $this->hapus_fotoVaksinasi($id);
        return $this->db->delete($this->jadwal_vaksinasi, array("id" => $id));
    }

    public function hapus_fotoVaksinasi($id)
    {
        $foto = $this->db->get_where($this->jadwal_vaksinasi, ['id' => $id])->row();
        if ($foto->images != "01.jpg") {
            $filename = explode(".", $foto->images)[0];
            return array_map('unlink', glob(FCPATH . "/assets/img/image_all/$filename.*"));
        }
    }

    public function save_poliklinik()
    {
        $post = $this->input->post();
        $this->nama_poli = $post['nama_poli'];
        $this->jam_buka = $post['jam_buka'];
        $this->jam_tutup = $post['jam_tutup'];
        $this->db->insert($this->poli, $this);
    }

    public function update_poliklinik()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama_poli = $post['nama_poli'];
        $this->jam_buka = $post['jam_buka'];
        $this->jam_tutup = $post['jam_tutup'];
        $this->db->update($this->poli, $this, ['id' => $post['id']]);
    }

    public function update_pendaftaran()
    {

        $post = $this->input->post();
        $this->id = $post['id'];
        $this->no_antrian = $post['no_antrian'];
        date_default_timezone_set('Asia/Jakarta');
        $this->jam = time();
        $this->id_dokter = $post['id_dokter'];
        $this->status = 1;
        $this->db->update($this->pendaftaran, $this, ['id' => $post['id']]);
    }

    // var $barang = 'barang';
    var $column_orderid = array('a.id, a.no_rekmed', 'a.name', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat', null); //set column field database for datatable orderable
    var $column_searchid = array('a.id', 'a.no_rekmed', 'a.name', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat'); //set column field database for datatable searchable just title , author , category are searchable
    var $orderid = array('a.id' => 'asc'); // default order

    public function get_datatablesid()
    {
        $this->_get_datatables_queryid();
        //	$this->db->where('orde_sungai',$id);

        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_queryid()
    {
        $this->db->select('*');
        $this->db->from("users a");
        $this->db->where('status', 2);
        // $this->db->join('jenis c', 'a.id_jenis=c.id_jenis', 'left outer');
        // $this->db->join('merek b', 'a.id_merek=b.id_merek', 'left outer');
        $i = 0;


        foreach ($this->column_searchid as $item) {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_searchid) - 1 == $i); //last loop
                // $this->db->group_end(); //close bracket


            }

            $i++;
        }

        if (isset($_REQUEST['order'])) {
            $this->db->order_by($this->column_orderid[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->orderid)) {
            $order = $this->orderid;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filteredid()
    {
        $this->_get_datatables_queryid();
        //$this->db->where('orde_sungai',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_allid()
    {
        $this->db->from('users');
        $this->db->where('status', 2);
        return $this->db->count_all_results();
    }

    public function save_pendaftaran()
    {
        $post = $this->input->post();
        $this->kd_pendaftaran = $post['kd_pendaftaran'];
        $this->id_users = $post['id_users'];
        $this->id_poli = $post['id_poli'];
        $this->tgl_pendaftaran = $post['tgl_pendaftaran'];
        $this->no_antrian = $post['no_antrian'];
        $this->id_dokter = $post['id_dokter'];
        $this->gejala = $post['gejala'];
        date_default_timezone_set('Asia/Jakarta');
        $this->jam = time();
        $this->status = 1;
        $this->db->insert($this->pendaftaran, $this);
    }

    public function update_dokter()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->id_dokter = $post['id_dokter'];
        $this->id_poli = $post['id_poli'];
        $this->db->update($this->dokter, $this, ['id' => $post['id']]);
    }

    // var $barang = 'barang';
    var $kolom_pendaftaran = array('a.id', 'a.kd_pendaftaran', 'a.id_dokter', 'users.no_rekmed', 'users.name', 'poliklinik.nama_poli', 'auth.nama', 'a.no_antrian', null); //set column field database for datatable orderable
    var $kolom_search = array('a.kd_pendaftaran', 'users.no_rekmed', 'users.name', 'poliklinik.nama_poli', 'auth.nama', 'a.no_antrian'); //set column field database for datatable searchable just title , author , category are searchable
    var $pendaftaranid = array('a.id' => 'asc'); // default order

    public function get_data_pendaftaran()
    {
        $this->get_query_pendaftaran();
        //	$this->db->where('orde_sungai',$id);

        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function get_query_pendaftaran()
    {
        $this->db->select('a.*, users.no_rekmed, users.name, poliklinik.nama_poli, auth.nama');
        $this->db->from("pendaftaran a");
        $this->db->join('users', 'a.id_users = users.id');
        $this->db->join('poliklinik', 'a.id_poli = poliklinik.id');
        $this->db->join('auth', 'a.id_dokter = auth.id');
        $this->db->where('a.status <', 3);
        $this->db->order_by('a.id', 'asc');
        // $this->db->join('jenis c', 'a.id_jenis=c.id_jenis', 'left outer');
        // $this->db->join('merek b', 'a.id_merek=b.id_merek', 'left outer');
        $i = 0;


        foreach ($this->kolom_search as $item) {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->kolom_search) - 1 == $i); //last loop
                // $this->db->group_end(); //close bracket


            }

            $i++;
        }

        if (isset($_REQUEST['order'])) {
            $this->db->order_by($this->kolom_pendaftaran[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->pendaftaranid)) {
            $order = $this->pendaftaranid;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function jml_filteredid()
    {
        $this->_get_datatables_queryid();
        //$this->db->where('orde_sungai',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jml_allid()
    {
        $this->db->from("pendaftaran a");
        $this->db->where('a.status <', 3);
        return $this->db->count_all_results();
    }

    public function save_pengobatan()
    {
        $post = $this->input->post();
        $this->kode_pendaftaran = $post['kode_pendaftaran'];
        $this->tgl_pengobatan = $post['tgl_pengobatan'];
        $this->status_pengobatan = 0;
        $this->db->insert($this->pengobatan, $this);
    }
}
