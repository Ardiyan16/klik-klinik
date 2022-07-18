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
                <button type="button" onclick="cari_pasien()" class="btn btn-success"><i class="fa fa-search"></i> Cari Pasien</button>
                <br />
                <br>
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Admin/save_pendaftaran') ?>">
                    <label>Nama Pasien</label>
                    <input type="text" name="name" placeholder="Nama Pasien..." class="form-control nama" readonly>
                    <br>
                    <label>No Rekam Medis</label>
                    <input type="text" name="no_rekmed" placeholder="No Rekam Medis..." readonly class="form-control no_rekmed">
                    <br>
                    <label>Poli Dipilih</label>
                    <input type="text" value="<?= $view->nama_poli ?>" readonly name="tag" placeholder="Tag..." class="form-control">
                    <input type="hidden" readonly name="id_users" placeholder="Tag..." class="form-control users_id">
                    <input type="hidden" value="<?= $view->id ?>" name="id_poli" placeholder="Tag..." class="form-control">
                    <br>
                    <label class="control-label col-md-3 col-sm-3 ">Tanggal Pendaftaran</label>
                    <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" readonly name="tgl_pendaftaran" placeholder="Stamina...">
                    <br>
                    <label class="control-label col-md-3 col-sm-3 ">No Antrian</label>
                    <input type="text" class="form-control" readonly name="no_antrian" id="antrian" placeholder="">
                    <br>
                    <label>Gejala</label>
                    <textarea name="gejala" class="form-control mb-3" rows="3"></textarea>
                    <br>
                    <div class="ln_solid"></div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="listpasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List data pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabelpasien" class="tabelpasien">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>No Rekam Medis</td>
                            <td>Nama</td>
                            <td>Tempat Lahir</td>
                            <td>Tanggal Lahir</td>
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
    let dataBarang;

    $(document).ready(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 0);
        $.ajax({
            url: "<?php echo base_url('Admin/max_no_antri/' . $view->id) ?>",
            dataType: 'json',
            method: 'POST',
            success: function(json) {
                var d = "<?php echo date('d') ?>";
                var m = "<?php echo date('m') ?>";
                var y = "<?php echo date('Y') ?>";

                console.log('maxxx', json.maxs);
                if (json.maxs == null) {
                    max = '0';
                } else {
                    max = json.maxs;
                }

                var ambil_tanggal = max.substring(8, 10);
                console.log('max', max);
                max++;
                var antrian = sprintf("%s", max);

                console.log('no_antrian', antrian);
                $('#antrian').val(antrian);
            }
        });
    });

    function cari_pasien() {
        // getDataBarang()
        $('#listpasien').modal('show');
        table2 = $('#tabelpasien').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "bDestroy": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() ?>Admin/data_pasien",
                "type": "POST"
            },

            order: [1, 'asc']

        }).fnDestroy();
        table2.ajax.reload();
    }

    function pencarian_kode(id, no_rekmed, name, tempat_lahir, tgl_lahir) {
        $('.users_id').val(id);
        $('.no_rekmed').val(no_rekmed);
        $('.nama').val(name);
        $('.tempat_lahir').val(tempat_lahir);
        $('.tgl_lahir').val(tgl_lahir);
        $('#listpasien').modal('hide');
        // console.log('checkbox', chekbox1);
    }
</script>
<?php $this->load->view('partials/footer.php') ?>