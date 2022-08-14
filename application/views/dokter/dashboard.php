<?php $this->load->view('partials/header_dokter.php') ?>
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
                    <div class="icon"><i class="fa fa-stethoscope"></i></div>
                    <div class="count"><?= $jml_pengobatan_baru ?></div>
                    <h3>Pengobatan Baru</h3>
                    <p>Jumlah pengobatan baru</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-stethoscope"></i></div>
                    <div class="count"><?= $jml_pengobatan ?></div>
                    <h3>Pengobatan Selesai</h3>
                    <p>Jumlah pengobatan selesai</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-handshake"></i></div>
                    <div class="count"></div>
                    <h3>Konsultasi</h3>
                    <p>Jumlah konsultasi</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>
<?php $this->load->view('partials/footer.php') ?>