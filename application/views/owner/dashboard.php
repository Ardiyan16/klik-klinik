<?php $this->load->view('partials/header.php') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<!-- page content -->
<div class="right_col" role="main">
    <div class="col">
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
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count"><?= $jml_pasien_online ?></div>
                    <h3>Pasien Online</h3>
                    <p>Jumlah pasien online.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count"><?= $jml_pasien_offline ?></div>
                    <h3>Pasien Offline</h3>
                    <p>Jumlah pasien offline.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-stethoscope"></i></div>
                    <div class="count"><?= $jml_pengobatan ?></div>
                    <h3>Pengobatan</h3>
                    <p>total pengobatan.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                    <div class="count"><?= $jml_transaksi_pasien ?></div>
                    <h3>Transaksi Pasine</h3>
                    <p>total transaksi apotik.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <?php $tahun = date('Y'); ?>
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Pengunjung Klik Klinik Tahun (<?= $tahun ?>)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myChart" width="00" height="250"></canvas>
                        <script>
                            const ctx = document.getElementById('myChart').getContext('2d');
                            const myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                    datasets: [{
                                            label: 'pengobatan pasien',
                                            data: <?= json_encode($grafik_pengobatan); ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 99, 132, 0.2)'

                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 99, 132, 1)'
                                            ],
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'transaksi apotik',
                                            data: <?= json_encode($grafik_transaksi); ?>,
                                            backgroundColor: [
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(54, 162, 235, 0.2)'

                                            ],
                                            borderColor: [
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(54, 162, 235, 1)'
                                            ],
                                            borderWidth: 1
                                        },
                                    ]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>
<?php $this->load->view('partials/footer.php') ?>