<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_apoteker extends CI_Model
{
    private $resep = 'resep';
    private $obat = 'obat';

    public function get_resep()
    {
        $this->db->select('resep.id, users.name, users.no_rekmed, auth.nama, poliklinik.nama_poli, resep.resep, resep.status_resep');
        $this->db->from('resep');
        $this->db->join('pengobatan', 'resep.id_pengobatan = pengobatan.id');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->order_by('resep.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_resep_transaksi($id)
    {
        $this->db->select('resep.id, resep.id_pengobatan, users.name, users.no_rekmed, auth.nama, poliklinik.nama_poli, resep.resep, resep.status_resep');
        $this->db->from('resep');
        $this->db->join('pengobatan', 'resep.id_pengobatan = pengobatan.id');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('auth', 'pendaftaran.id_dokter = auth.id');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->where('resep.id', $id);
        $this->db->order_by('resep.id', 'desc');
        return $this->db->get()->row();
    }

    public function riwayat_transaksi()
    {
        $this->db->select('ta.kd_trans, ta.id_resep, users.name, poliklinik.nama_poli, ta.tgl_trans, ta.apoteker, ta.apoteker, ta.total_biaya, resep.status_resep');
        $this->db->from('trans_apotik ta');
        $this->db->join('resep', 'ta.id_resep = resep.id');
        $this->db->join('pengobatan', 'resep.id_pengobatan = pengobatan.id');
        $this->db->join('pendaftaran', 'pengobatan.kode_pendaftaran = pendaftaran.kd_pendaftaran');
        $this->db->join('users', 'pendaftaran.id_users = users.id');
        $this->db->join('poliklinik', 'pendaftaran.id_poli = poliklinik.id');
        $this->db->order_by('ta.id', 'desc');
        return $this->db->get()->result();
    }

    public function riwayat_transaksi_nonPasien()
    {
        $this->db->select('*');
        $this->db->from('trans_apotik ta');
        $this->db->order_by('ta.id', 'desc');
        return $this->db->get()->result();
    }

    public function detail_transaksi($id)
    {
        $this->db->select('*');
        $this->db->from('detail_trans_apotik dta');
        $this->db->join('obat', 'dta.kode_obat = obat.kd_obat');
        $this->db->where('kode_trans', $id);
        return $this->db->get()->result();
    }

    public function jml_obat()
    {
        return $this->db->count_all_results($this->obat);
    }

    function max_no_trans()
    {
        return $this->db->query('SELECT kd_trans AS maxs FROM trans_apotik order by kd_trans desc limit 1 ');
    }

    public function status_resep($id)
    {
        $this->db->query("UPDATE `resep` SET `status_resep`= '1' WHERE resep.id ='$id'");
    }

    public function status_pengobatan($id)
    {
        $this->db->query("UPDATE `pengobatan` SET `status_pengobatan`= '2' WHERE pengobatan.id ='$id'");
    }

    public function ambilObat()
    {
        $obat = $this->db->get('obat');

        if ($obat->num_rows() > 0) {
            $json['status']     = 1;
            foreach ($obat->result() as $o) {
                $json['datanya'][] = $o;
            }
            $json['jumlah_obat'] = count($obat->result());
        } else {
            $json['status']     = 0;
        }

        echo json_encode($json);
    }

    public function notifikasi_resep()
    {
        $this->db->select('*');
        $this->db->from($this->resep);
        $this->db->where('status_resep', 0);
        return $this->db->get()->result();
    }

    public function count_notifikasi()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from($this->resep);
        $this->db->where('status_resep', 0);
        return $this->db->get()->row()->jml;
    }

    public function get_obat()
    {
        return $this->db->get($this->obat)->result();
    }

    public function save_obat()
    {
        $post = $this->input->post();
        $this->kd_obat = $post['kd_obat'];
        $this->nama_obat = $post['nama_obat'];
        $this->harga =  str_replace(",", "", $post['harga']);
        $this->stok = $post['stok'];
        $this->dosis = $post['dosis'];
        $this->tgl_kadaluarsa = $post['tgl_kadaluarsa'];
        $this->db->insert($this->obat, $this);
    }

    public function update_obat()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->kd_obat = $post['kd_obat'];
        $this->nama_obat = $post['nama_obat'];
        $this->harga =  str_replace(",", "", $post['harga']);
        $this->dosis = $post['dosis'];
        $this->tgl_kadaluarsa = $post['tgl_kadaluarsa'];
        $this->db->update($this->obat, $this, ['id' => $post['id']]);
    }

    // var $barang = 'barang';
    var $kolom_obat = array('a.id', 'a.kd_obat', 'a.nama_obat', 'a.harga', 'a.stok', 'a.tgl_kadaluarga', null); //set column field database for datatable orderable
    var $kolom_search = array('a.id', 'a.kd_obat', 'a.nama_obat', 'a.harga', 'a.stok', 'a.tgl_kadaluarga'); //set column field database for datatable searchable just title , author , category are searchable
    var $obatid = array('a.id' => 'asc'); // default order

    public function get_data_obat()
    {
        $this->get_query_obat();
        //	$this->db->where('orde_sungai',$id);

        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function get_query_obat()
    {
        $this->db->select('*');
        $this->db->from('obat a');
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
            $this->db->order_by($this->kolom_obat[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->obatid)) {
            $order = $this->obatid;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function jml_filteredid()
    {
        $this->get_query_obat();
        //$this->db->where('orde_sungai',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jml_allid()
    {
        $this->db->from("obat");
        return $this->db->count_all_results();
    }

    public function last_kdtrans()
    {
        $sql = $this->db->select('kd_trans');
        $sql = $this->db->from('trans_apotik');
        $sql = $this->db->order_by('kd_trans', 'desc');
        $sql = $this->db->limit(1);
        $sql = $this->db->get();

        return $sql->result();
    }

    public function jml_transaksi()
    {
        return $this->db->count_all_results('trans_apotik');
    }

    public function alert_stok()
    {
        $this->db->select('*');
        $this->db->from('obat');
        $this->db->where('stok <', 3);
        return $this->db->get()->result();
    }

    public function jml_alert_stok()
    {
        $this->db->select('COUNT(kd_obat) as jml');
        $this->db->from('obat');
        $this->db->where('stok <', 3);
        return $this->db->get()->row()->jml;
    }

    public function alert_kadaluarsa()
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('obat');
        $this->db->where('tgl_kadaluarsa <=', $tgl);
        return $this->db->get()->result();
    }

    public function jml_alert_kadaluarsa()
    {
        $tgl = date('Y-m-d');
        $this->db->select('COUNT(kd_obat) as jml');
        $this->db->from('obat');
        $this->db->where('tgl_kadaluarsa <=', $tgl);
        return $this->db->get()->row()->jml;
    }
}
