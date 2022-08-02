<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kasir', 'kasir');
        $this->load->model('M_apoteker', 'apoteker');
        $this->load->model('M_dokter', 'dokter');
        $this->load->model('M_admin', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Kasir | Dashboard';
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/dashboard', $var);
    }

    public function profile()
    {
        $var['title'] = 'Kasir | Profile';
        $id = $this->session->userdata('id');
        $var['profile'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['edit'] = $this->db->get_where('auth', ['id' => $id])->row();
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/Profile', $var);
    }

    public function update_profile()
    {
        $this->dokter->update_profile();
        $this->session->set_flashdata('success_update', true);
        redirect('Kasir/profile');
    }

    public function pengobatan()
    {
        $var['title'] = 'Kasir | Konfirmasi Pembayaran Pasien';
        $var['pengobatan'] = $this->kasir->get_pengobatan();
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/pengobatan', $var);
    }

    public function proses_payment()
    {
        $id = $this->input->get('id');
        $kode = $this->input->get('kode_trans');
        $var['title'] = 'Kasir | Proses Payment';
        $this->kasir->kasir->status_notifikasi($kode);
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $var['view'] = $this->kasir->konfirmasi_payment($id);
        $this->load->view('kasir/konfirmasi_payment', $var);
    }

    public function list_data_tarif()
    {
        $list = $this->kasir->get_data_tarif();
        // print_r($this->db->last_query());
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $tarif) {
            // $kode_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $obat->kode_barang);
            // $nama_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $obat->nama_barang);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $tarif->nama_poli;
            $row[] = $tarif->diagnosa;
            $row[] = $tarif->tarif;
            $row[] = '<button type="button" class="btn btn-primary "onclick="pencarian_kode(\'' . $tarif->tarif . '\')">Pilih</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->kasir->jml_allid(),
            "recordsFiltered" => $this->kasir->jml_filteredid(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function getDataTarif()
    {
        $this->kasir->ambilTarif();
    }

    public function save_payment()
    {
        $kd_payment = $this->input->post('kd_payment');
        $id_pengobatan = $this->input->post('id_pengobatan');
        $kd_pendaftaran = $this->input->post('kd_pendaftaran');
        $kd_trans = $this->input->post('id_trans');
        $jml_dibayarkan = $this->input->post('jml_dibayarkan');
        $total_biaya = $this->input->post('total_biaya_pengobatan');
        $kembalian = $this->input->post('kembalian');

        $payment = array(
            'kd_payment' => $kd_payment,
            'id_pengobatan' => $id_pengobatan,
            'id_trans' => $kd_trans,
            'jml_dibayarkan' => $jml_dibayarkan,
            'total_biaya_pengobatan' => $total_biaya,
            'kembalian' => $kembalian
        );
        $this->db->insert('payment', $payment);
        $this->kasir->status_pendaftaran($kd_pendaftaran);
        $this->kasir->status_pengobatan($id_pengobatan);
        $this->kasir->status_trans_apotik($kd_trans);
        $this->session->set_flashdata('success', true);
        redirect("kasir/nota?kd_payment=" . $kd_payment . "&kd_trans=" . $kd_trans);
    }

    public function nota()
    {
        $id = $this->input->get('kd_payment');
        $kd_trans = $this->input->get('kd_trans');
        $var['title'] = 'Kasir | Nota';
        $var['view'] = $this->kasir->nota($id);
        $var['list_obat'] = $this->kasir->list_obat($kd_trans);
        $this->load->view('kasir/nota', $var);
    }

    public function payment_pasien()
    {
        $var['title'] = 'Kasir | List Data Pembayaran';
        $var['list_payment'] = $this->kasir->list_payment();
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/payment_pasien', $var);
    }

    public function detail_payment($id)
    {
        $var['title'] = 'Kasir | List Data Pembayaran';
        $var['view'] = $this->kasir->detail_payment($id);
        // var_dump($var['view']);
        $var['detail_obat'] = $this->kasir->list_obat($id);
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/detail_pembayaran', $var);
    }

    public function konfirmasi_non_pasien()
    {
        $var['title'] = 'Kasir | Konfirmasi Pembayaran Pasien';
        $var['riwayat_transaksi'] = $this->kasir->trans_non_pasien();
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/trans_nonpasien', $var);
    }

    public function proses_payment_nonPasien($id)
    {
        $var['title'] = 'Kasir | Proses Payment Non Pasien';
        $this->kasir->kasir->status_notifikasi($id);
        $var['view'] = $this->kasir->konfirmasi_payment_nonPasien($id);
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/konfirmasi_payment2', $var);
    }

    public function save_payment_nonPasien()
    {
        $kd_payment = $this->input->post('kd_payment');
        $kd_trans = $this->input->post('id_trans');
        $jml_dibayarkan = $this->input->post('jml_dibayarkan');
        $total_biaya = $this->input->post('biaya_total');
        $kembalian = $this->input->post('kembalian');

        $payment = array(
            'kd_payment' => $kd_payment,
            'id_trans' => $kd_trans,
            'jml_dibayarkan' => $jml_dibayarkan,
            'total_biaya_pengobatan' => $total_biaya,
            'kembalian' => $kembalian
        );
        $this->db->insert('payment', $payment);
        $this->kasir->status_trans_apotik($kd_trans);
        redirect("Kasir/nota2?kd_payment=" . $kd_payment . "&kd_trans=" . $kd_trans);
    }

    public function nota2()
    {
        $id = $this->input->get('kd_payment');
        $kd_trans = $this->input->get('kd_trans');
        $var['title'] = 'Kasir | Nota';
        $var['view'] = $this->kasir->nota2($id);
        $var['list_obat'] = $this->kasir->list_obat($kd_trans);
        $this->load->view('kasir/nota2', $var);
    }

    public function payment_non_pasien()
    {
        $var['title'] = 'Kasir | List Data Pembayaran Non Pasien';
        $var['list_payment'] = $this->kasir->list_payment_nonPasien();
        $var['notif_pasien'] = $this->kasir->notifikasi_pasien();
        $var['notif_nonPasien'] = $this->kasir->notifikasi_nonPasien();
        $var['count_notif'] = $this->kasir->count_notif();
        $this->load->view('kasir/payment_non_pasien', $var);
    }

}
