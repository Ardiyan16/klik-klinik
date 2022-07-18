<?php $this->load->view('partials/header_user.php') ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Pendaftaran</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel fixed_height_520">
                    <div class="x_title">
                        <h2>Detail</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">
                            <ul class="quick-list">
                                <li><a>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $this->session->userdata('name') ?></a></li>
                                <li><a>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $this->session->userdata('nik') ?></a></li>
                                <li><a>Tanggal Daftar &nbsp;&nbsp;&nbsp;&nbsp;: <?= date('d-m-Y',  strtotime($view->tgl_pendaftaran)) ?></a></li>
                            </ul>
                        </div>
                        <hr>
                        <div class="text-center">
                            <p>No Antrian Anda</p>
                            <h1 style="font-size: 200px;"><?= $view->no_antrian ?></h1>
                            <p>Pengobatan diperkirakan pukul <?php
                                                                // $waktu = time();
                                                                echo date("H:i", strtotime("$waktu_antrian minutes", $view->jam));
                                                                ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>