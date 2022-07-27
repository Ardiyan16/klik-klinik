<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apoteker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_apoteker', 'apoteker');
        $this->load->model('M_dokter', 'dokter');
        $this->load->model('M_admin', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Apoteker | dashboard';
        $var['jml_obat'] = $this->apoteker->jml_obat();
        $var['jml_transaksi'] = $this->apoteker->jml_transaksi();
        $var['alert_stok'] = $this->apoteker->alert_stok();
        $var['jml_alert_stok'] = $this->apoteker->jml_alert_stok();
        $var['alert_kadaluarsa'] = $this->apoteker->alert_kadaluarsa();
        $var['jml_alert_kadaluarsa'] = $this->apoteker->jml_alert_kadaluarsa();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/dashboard', $var);
    }

    public function profile()
    {
        $var['title'] = 'Apoteker | profile';
        $id = $this->session->userdata('id');
        $var['profile'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['edit'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/profile', $var);
    }

    public function update_profile()
    {
        $this->dokter->update_profile();
        $this->session->set_flashdata('success_update', true);
        redirect('Apoteker/profile');
    }

    public function data_obat()
    {
        $var['title'] = 'Apoteker | Data Obat';
        $var['obat'] = $this->apoteker->get_obat();
        $var['obat2'] = $this->apoteker->get_obat();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/obat', $var);
    }

    public function create_obat()
    {
        $var['title'] = 'Apoteker | Tambah Obat';
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/create_obat', $var);
    }

    public function save_obat()
    {
        $this->apoteker->save_obat();
        $this->session->set_flashdata('success_create', true);
        redirect('Apoteker/data_obat');
    }

    public function save_stok()
    {
        $id_obat = $this->input->post('id_obat');
        $stok = $this->input->post('stok');
        $this->db->query("UPDATE `obat` SET `stok`=stok+'$stok' WHERE id='$id_obat'");
        $this->session->set_flashdata('success_add_stok', true);
        redirect('Apoteker/data_obat');
    }

    public function edit_obat($id)
    {
        $var['title'] = 'Apoteker | Edit Obat';
        $var['edit'] = $this->db->get_where('obat', ['id' => $id])->row();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/edit_obat', $var);
    }

    public function update_obat()
    {
        $this->apoteker->update_obat();
        $this->session->set_flashdata('success_update', true);
        redirect('Apoteker/data_obat');
    }

    public function delete_obat($id)
    {
        $this->db->delete('obat', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Apoteker/data_obat');
    }

    public function resep()
    {
        $var['title'] = 'Apoteker | Resep Obat';
        $var['resep'] = $this->apoteker->get_resep();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/resep', $var);
    }

    public function transaksi_pasien($id)
    {
        $var['title'] = 'Apoteker | Transaksi Obat Pasien';
        $var['view'] = $this->apoteker->get_resep_transaksi($id);
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/transaksi_pasien', $var);
    }

    public function max_no_trans()
    {
        $data = $this->apoteker->max_no_trans()->row();
        $json['maxs'] = @$data->maxs;
        echo json_encode($json);
    }

    public function getDataObat()
    {
        $this->apoteker->ambilObat();
    }

    public function list_data_obat($nomor)
    {
        $list = $this->apoteker->get_data_obat();
        // print_r($this->db->last_query());
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $obat) {
            // $kode_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $obat->kode_barang);
            // $nama_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $obat->nama_barang);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $obat->kd_obat;
            $row[] = $obat->nama_obat;
            $row[] = $obat->harga;
            $row[] = $obat->stok;
            $row[] = '<button type="button" class="btn btn-primary "onclick="pencarian_kode(\'' . $obat->id . '\',\'' . $obat->kd_obat . '\',\'' . $obat->nama_obat . '\',\'' . $obat->harga . '\',\'' . $nomor . '\')">Pilih</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->apoteker->jml_allid(),
            "recordsFiltered" => $this->apoteker->jml_filteredid(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function save_transaksi()
    {
        $total_qty = 0;
        foreach ($_POST['qty'] as $value) {
            $total_qty += $value;
        }
        $kd_trans = $this->input->post('kd_trans');
        $id_resep = $this->input->post('id_resep');
        $tgl_trans = $this->input->post('tgl_trans');
        $apoteker = $this->input->post('apoteker');
        $jml_qty = $total_qty;
        $total_biaya = $this->input->post('total_trans');
        $id_pengobatan = $this->input->post('id_pengobatan');

        $transaksi = array(
            'kd_trans' => $kd_trans,
            'id_resep' => $id_resep,
            'tgl_trans' => $tgl_trans,
            'apoteker' => $apoteker,
            'total_qty' => $jml_qty,
            'total_biaya' => $total_biaya,
            'status' => 0,
        );
        $this->db->insert('trans_apotik', $transaksi);

        $last_kdtrans = $this->apoteker->last_kdtrans();
        foreach ($_POST['kode_obat'] as $key => $value) {
            $detail_transaksi = array(
                'kode_trans' => $last_kdtrans[0]->kd_trans,
                'kode_obat' => $this->input->post('kode_obat')[$key],
                'qty' => $this->input->post('qty')[$key],
                'harga' => $this->input->post('harga')[$key],
                'subtotal' => $this->input->post('subtotal')[$key]
            );
            $this->db->insert('detail_trans_apotik', $detail_transaksi);
        }

        foreach ($_POST['kode_obat'] as $key => $value) {
            $kd_obat = $this->input->post('kode_obat')[$key];
			$qty = $this->input->post('qty')[$key];
			$this->db->query("UPDATE `obat` SET `stok`=stok-'$qty' WHERE kd_obat='$kd_obat'");
        }

        $notif = array(
            'kode_trans' => $kd_trans,
            'role' => 4,
            'keterangan' => 'Terdapat pembayaran baru, silahkan di cek',
            'tipe' => 1,
            'status' => 0
        );
        $this->db->insert('notifikasi_pembayaran', $notif);
        $this->apoteker->status_resep($id_resep);
        $this->apoteker->status_pengobatan($id_pengobatan);
        $this->session->set_flashdata('transaksi_berhasil', true);
		redirect('Apoteker/riwayat_transaksi');
    }

    public function transaksi_non_pasien()
    {
        $var['title'] = 'Apoteker | Transaksi Non Pasien';
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/transaksi_nonPasien', $var);

    }

    public function riwayat_transaksi()
    {
        $var['title'] = 'Apoteker | Riwayat Transaksi';
        $var['riwayat_transaksi'] = $this->apoteker->riwayat_transaksi();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/riwayat_transaksi', $var);
    }

    public function detail_transaksi($id)
    {
        $var['title'] = 'Apoteker | Detail Transaksi';
        $var['view'] = $this->db->get_where('trans_apotik', ['kd_trans' => $id])->row();
        $var['detail_transaksi'] = $this->apoteker->detail_transaksi($id);
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/detail_transaksi', $var);
    }

    public function save_transaksi_nonPasien()
    {
        $total_qty = 0;
        foreach ($_POST['qty'] as $value) {
            $total_qty += $value;
        }
        $kd_trans = $this->input->post('kd_trans');
        $tgl_trans = $this->input->post('tgl_trans');
        $apoteker = $this->input->post('apoteker');
        $jml_qty = $total_qty;
        $total_biaya = $this->input->post('total_trans');

        $transaksi = array(
            'kd_trans' => $kd_trans,
            'tgl_trans' => $tgl_trans,
            'apoteker' => $apoteker,
            'total_qty' => $jml_qty,
            'total_biaya' => $total_biaya,
            'status' => 0
        );
        $this->db->insert('trans_apotik', $transaksi);

        $last_kdtrans = $this->apoteker->last_kdtrans();
        foreach ($_POST['kode_obat'] as $key => $value) {
            $detail_transaksi = array(
                'kode_trans' => $last_kdtrans[0]->kd_trans,
                'kode_obat' => $this->input->post('kode_obat')[$key],
                'qty' => $this->input->post('qty')[$key],
                'harga' => $this->input->post('harga')[$key],
                'subtotal' => $this->input->post('subtotal')[$key]
            );
            $this->db->insert('detail_trans_apotik', $detail_transaksi);
        }

        foreach ($_POST['kode_obat'] as $key => $value) {
            $kd_obat = $this->input->post('kode_obat')[$key];
			$qty = $this->input->post('qty')[$key];
			$this->db->query("UPDATE `obat` SET `stok`=stok-'$qty' WHERE kd_obat='$kd_obat'");
        }

        $notif = array(
            'kode_trans' => $kd_trans,
            'role' => 4,
            'keterangan' => 'Terdapat pembayaran baru, silahkan di cek',
            'tipe' => 2,
            'status' => 0
        );
        $this->db->insert('notifikasi_pembayaran', $notif);
        $this->session->set_flashdata('transaksi_berhasil', true);
		redirect('Apoteker/riwayat_transaksi_nonPasien');
    }

    public function riwayat_transaksi_nonPasien()
    {
        $var['title'] = 'Apoteker | Riwayat Transaksi';
        $var['riwayat_transaksi'] = $this->apoteker->riwayat_transaksi_nonPasien();
        $var['notif_resep'] = $this->apoteker->notifikasi_resep();
        $var['count_notif'] = $this->apoteker->count_notifikasi();
        $this->load->view('apoteker/riwayat_transaksi_nonPasien', $var);
    }
}
