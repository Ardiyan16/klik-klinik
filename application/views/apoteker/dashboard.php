<?php $this->load->view('partials/header_apoteker.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <h2 style="color: #07A1C8;">
            Selamat Datang, <?php echo $this->session->userdata('nama') ?>
        </h2>
        <h4 style=" margin-left: 80%;">
            <script type='text/javascript'>
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

                var date = new Date();

                var day = date.getDate();

                var month = date.getMonth();

                var thisDay = date.getDay(),

                    thisDay = myDays[thisDay];
                var yy = date.getYear();


                var year = (yy < 1000) ? yy + 1900 : yy;

                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
            </script>
        </h4>
    </div>
    <br>
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="top_tiles">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                    <div class="count"><?= $jml_transaksi ?></div>
                    <h3>Transaksi Obat</h3>
                    <p>Jumlah transaksi obat</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-pills"></i></div>
                    <div class="count"><?= $jml_obat ?></div>
                    <h3>Jumlah Obat</h3>
                    <p>Jumlah keseluruhan obat</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-warning"></i></div>
                    <div class="count"><?= $jml_alert_stok + $jml_alert_kadaluarsa ?></div>
                    <h3>Jumlah Pengingat</h3>
                    <p>pengingat stok obat dan obat kadaluarsa</p>
                </div>
            </div>
            <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                    <div class="count">179</div>
                    <h3></h3>
                    <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
            </div> -->
        </div>
    </div>
    <div class="row">
        <?php foreach ($alert_stok as $alert) { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong><i class="fa fa-info-circle"></i> Informasi!</strong> Obat dengan kode <?= $alert->kd_obat ?> dan nama <?= $alert->nama_obat ?> tersisa <?= $alert->stok ?> stok.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <?php foreach ($alert_kadaluarsa as $alert) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fa fa-info-circle"></i> Informasi!</strong> Obat dengan kode <?= $alert->kd_obat ?> dan nama <?= $alert->nama_obat ?> telah kadaluarsa pada <?= $alert->tgl_kadaluarsa ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    </div>

    <!-- /top tiles -->
</div>
<?php $this->load->view('partials/footer.php') ?>