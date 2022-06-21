<?php $this->load->view('owner/partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="col">
        <h2 style="color: #07A1C8;">
            Selamat Datang, <?php echo $this->session->userdata('username') ?>
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
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Jumlah User</span>
                <div class="count">2500</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-check"></i> Jumlah Pengobatan Hari Ini</span>
                <div class="count">123.50</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Jumlah Total Pengobatan</span>
                <div class="count green">2,500</div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>
<?php $this->load->view('owner/partials/footer.php') ?>