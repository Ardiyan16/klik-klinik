<?php $this->load->view('partials/header_admin.php') ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Pengobatan</h3>
            <a href="<?= base_url('Admin/pengobatan') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Tambah Pengobatan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <button type="button" onclick="cari_pendaftaran()" class="btn btn-success"><i class="fa fa-search"></i> Cari Pendaftaran</button>
                <br />
                <br>
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Admin/save_pengobatan') ?>">
                    <label>Nama Pasien</label>
                    <input type="hidden" name="id" placeholder="Nama Pasien..." class="form-control id_pendaftaran" readonly>
                    <input type="hidden" name="kode_pendaftaran" placeholder="Nama Pasien..." class="form-control kd_pendaftaran" readonly>
                    <input type="text" name="name" placeholder="Nama Pasien..." class="form-control nama" readonly>
                    <br>
                    <label>No Rekam Medis</label>
                    <input type="hidden" name="id_dokter" placeholder="No Rekam Medis..." readonly class="form-control id_dokter">
                    <input type="text" name="no_rekmed" placeholder="No Rekam Medis..." readonly class="form-control no_rekmed">
                    <br>
                    <label>Poli Dipilih</label>
                    <input type="text"  readonly name="tag" placeholder="Nama Poli..." class="form-control nama_poli">
                    <br>
                    <label>Tanggal Pengobatan</label>
                    <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" readonly name="tgl_pengobatan" placeholder="Stamina...">
                    <br>
                    <label>No Antrian</label>
                    <input type="text" class="form-control no_antrian" readonly name="no_antrian" id="antrian" placeholder="">
                    <br>
                    <label>Gejala</label>
                    <textarea name="gejala" class="form-control mb-3 gejala" readonly rows="3"></textarea>
                    <br>
                    <div class="ln_solid"></div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="listpendaftaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List data pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabelpendaftaran" class="tabelpendaftaran">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode Daftar</td>
                            <td>Nama</td>
                            <td>Layanan</td>
                            <td>No Antrian</td>
                            <td>Option</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>

    function cari_pendaftaran() {
        // getDataBarang()
        $('#listpendaftaran').modal('show');
        table2 = $('#tabelpendaftaran').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "bDestroy": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() ?>Admin/data_pendaftaran",
                "type": "POST"
            },

            order: [1, 'asc']

        }).fnDestroy();
        table2.ajax.reload();
    }

    function pencarian_kode(id, kd_pendaftaran, id_dokter, no_rekmed, name, nama_poli, no_antrian, gejala) {
        $('.id_pendaftaran').val(id);
        $('.kd_pendaftaran').val(kd_pendaftaran);
        $('.id_dokter').val(id_dokter);
        $('.no_rekmed').val(no_rekmed);
        $('.nama').val(name);
        $('.nama_poli').val(nama_poli);
        $('.no_antrian').val(no_antrian);
        $('.gejala').val(gejala);
        $('#listpendaftaran').modal('hide');
        // console.log('checkbox', chekbox1);
    }
</script>
<?php $this->load->view('partials/footer.php') ?>