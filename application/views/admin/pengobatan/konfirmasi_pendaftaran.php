<?php $this->load->view('partials/header_admin.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Konfirmasi Pendaftaran</h3>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Konfirmasi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Admin/save_konfirmasi_pendaftaran') ?>">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Pasien</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="hidden" name="id" value="<?= $view->id ?>" class="form-control" readonly placeholder="Nama Atlet...">
                            <input type="hidden" name="id_users" value="<?= $view->id_users ?>" class="form-control" readonly placeholder="Nama Atlet...">
                            <input type="text" name="name" value="<?= $view->name ?>" class="form-control" readonly placeholder="Nama Atlet...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">No Rekam Medis</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" value="<?= $view->no_rekmed ?>" readonly name="speed" placeholder="Speed...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Layanan Kesehatan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="power" value="<?= $view->nama_poli ?>" readonly placeholder="Power...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Tanggal Pendaftaran</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="date" class="form-control" value="<?= $view->tgl_pendaftaran ?>" readonly name="stamina" placeholder="Stamina...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Gejala</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea class="form-control mb-3" rows="3" readonly><?= $view->gejala ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">No Antrian</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" readonly name="no_antrian" id="antrian" placeholder="Stamina...">
                            <!-- <input type="text" class="form-control" readonly name="no_antrian" value="<?= $view->id_poli ?>" placeholder="Stamina..."> -->
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea class="form-control mb-3" rows="3"></textarea>
                        </div>
                    </div> -->
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let dataBarang;

    $(document).ready(function() {
        // console.log('here');
        // getAmbilAntrian();
        //detail_barang();
        $('html, body').animate({
            scrollTop: 0
        }, 0);
        $.ajax({
            url: "<?php echo base_url('Admin/max_no_antri/' . $view->id_poli) ?>",
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

</script>
<?php $this->load->view('partials/footer.php') ?>