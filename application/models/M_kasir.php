<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kasir extends CI_Model
{

    private $payment = 'payment';

    public function notifikasi_pasien()
    {
        $this->db->select('np.*, rp.id_pengobatan');
        $this->db->from('notifikasi_pembayaran np');
        $this->db->join('trans_apotik ta', 'np.kode_trans = ta.kd_trans');
        $this->db->join('resep rp', 'ta.id_resep = rp.id');
        $this->db->where('tipe', 1);
        $this->db->where('np.status', 0);
        return $this->db->get()->result();
    }

    public function notifikasi_nonPasien()
    {
        $this->db->select('*');
        $this->db->from('notifikasi_pembayaran');
        $this->db->where('tipe', 2);
        $this->db->where('status', 0);
        return $this->db->get()->result();
    }

    public function count_notif()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('notifikasi_pembayaran');
        $this->db->where('status', 0);
        return $this->db->get()->row()->jml;
    }

    public function status_notifikasi($id)
    {
        $this->db->query("UPDATE `notifikasi_pembayaran` SET `status`= '1' WHERE notifikasi_pembayaran.kode_trans ='$id'");
    }

    public function get_pengobatan()
    {
        $this->db->select('pengobatan.id, users.name, users.no_rekmed, poliklinik.nama_poli, auth.nama, pengobatan.tgl_pengobatan, pengobatan.status_pengobatan');
        $this->db->from('pengobatan');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('status_pengobatan', 2);
        $this->db->order_by('pengobatan.id', 'desc');
        return $this->db->get()->result();
    }

    public function konfirmasi_payment($id)
    {
        $this->db->select('pengobatan.id, pendaftaran.kd_pendaftaran, ta.kd_trans, users.name, users.no_rekmed, poliklinik.nama_poli, auth.nama, tarif.diagnosa, ta.total_biaya, tarif.tarif');
        $this->db->from('pengobatan');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('tarif', 'pengobatan.id_diagnosa = tarif.id');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->join('resep', 'resep.id_pengobatan = pengobatan.id');
        $this->db->join('trans_apotik ta', 'ta.id_resep = resep.id');
        $this->db->where('pengobatan.id', $id);
        return $this->db->get()->row();
    }

    public function nota($id)
    {
        $this->db->select('users.name, pengobatan.tgl_pengobatan, users.no_rekmed, auth.nama, pendaftaran.kd_pendaftaran, poliklinik.nama_poli');
        $this->db->from('payment');
        $this->db->join('pengobatan', 'payment.id_pengobatan = pengobatan.id');
        $this->db->join('trans_apotik ta', 'payment.id_trans = ta.kd_trans');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('kd_payment', $id);
        return $this->db->get()->row();
    }

    public function nota2($id)
    {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->join('trans_apotik ta', 'payment.id_trans = ta.kd_trans');
        $this->db->where('kd_payment', $id);
        return $this->db->get()->row();
    }

    public function list_obat($id)
    {
        $this->db->select('*');
        $this->db->from('detail_trans_apotik dta');
        $this->db->join('obat', 'dta.kode_obat = obat.kd_obat');
        $this->db->where('kode_trans', $id);
        return $this->db->get()->result();
    }

    public function list_payment()
    {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->join('trans_apotik ta', 'payment.id_trans = ta.kd_trans');
        $this->db->join('resep', 'ta.id_resep = resep.id');
        $this->db->join('pengobatan', 'resep.id_pengobatan = pengobatan.id');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('pendaftaran.status', 3);
        $this->db->where('status_pengobatan', 3);
        $this->db->where('ta.status', 1);
        return $this->db->get()->result();
    }

    public function detail_payment($id)
    {
        
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->join('trans_apotik ta', 'payment.id_trans = ta.kd_trans');
        $this->db->join('resep', 'ta.id_resep = resep.id');
        $this->db->join('pengobatan', 'resep.id_pengobatan = pengobatan.id');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('pendaftaran.status', 3);
        $this->db->where('status_pengobatan', 3);
        $this->db->where('ta.status', 1);
        $this->db->where('kd_payment', $id);
        return $this->db->get()->row();
    }

    public function list_payment_nonPasien()
    {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->join('trans_apotik ta', 'payment.id_trans = ta.kd_trans');
        return $this->db->get()->result();
    }

    public function trans_non_pasien()
    {
        $this->db->select('*');
        $this->db->from('trans_apotik ta');
        $this->db->join('auth', 'ta.apoteker = auth.id');
        $this->db->where('ta.status', 0);
        $this->db->order_by('ta.id', 'desc');
        return $this->db->get()->result();
    }

    public function konfirmasi_payment_nonPasien($id)
    {
        $this->db->select('*');
        $this->db->from('trans_apotik ta');
        $this->db->join('auth', 'ta.apoteker = auth.id');
        $this->db->where('kd_trans', $id);
        $this->db->where('ta.status', 0);
        return $this->db->get()->row();
    }

    var $kolom_tarif = array('a.id_poli', 'poliklinik.nama_poli', 'a.diagnosa', 'a.tarif', null); //set column field database for datatable orderable
    var $kolom_search = array('a.id_poli', 'poliklinik.nama_poli', 'a.diagnosa', 'a.tarif'); //set column field database for datatable searchable just title , author , category are searchable
    var $tarifid = array('a.id' => 'asc'); // default order

    public function get_data_tarif()
    {
        $this->get_query_tarif();
        //	$this->db->where('orde_sungai',$id);

        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function get_query_tarif()
    {
        $this->db->select('*');
        $this->db->from('tarif a');
        $this->db->join('poliklinik', 'a.id_poli = poliklinik.id');
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
            $this->db->order_by($this->kolom_tarif[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->tarifid)) {
            $order = $this->tarifid;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function jml_filteredid()
    {
        $this->get_query_tarif();
        //$this->db->where('orde_sungai',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jml_allid()
    {
        $this->db->from("tarif");
        return $this->db->count_all_results();
    }

    public function ambilTarif()
    {
        
        $tarif = $this->db->get('tarif');

        if ($tarif->num_rows() > 0) {
            $json['status']     = 1;
            foreach ($tarif->result() as $o) {
                $json['datanya'][] = $o;
            }
            $json['jumlah_tarif'] = count($tarif->result());
        } else {
            $json['status']     = 0;
        }

        echo json_encode($json);
    }

    public function status_pendaftaran($id)
    {
        $this->db->query("UPDATE `pendaftaran` SET `status`= '3' WHERE pendaftaran.kd_pendaftaran ='$id'");
    }

    public function status_pengobatan($id)
    {
        $this->db->query("UPDATE `pengobatan` SET `status_pengobatan`= '3' WHERE pengobatan.id ='$id'");
    }

    public function status_trans_apotik($id)
    {
        $this->db->query("UPDATE `trans_apotik` SET `status`= '1' WHERE trans_apotik.kd_trans ='$id'");
    }

}