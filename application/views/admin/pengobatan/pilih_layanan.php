<?php $this->load->view('partials/header_admin.php') ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pilih Layanan Kesehatan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-md-12 col-sm-12  text-center">
                        <!-- <ul class="pagination pagination-split">
                            <li><a href="#">A</a></li>
                            <li><a href="#">B</a></li>
                            <li><a href="#">C</a></li>
                            <li><a href="#">D</a></li>
                            <li><a href="#">E</a></li>
                            <li>...</li>
                            <li><a href="#">W</a></li>
                            <li><a href="#">X</a></li>
                            <li><a href="#">Y</a></li>
                            <li><a href="#">Z</a></li>
                        </ul> -->
                    </div>
                    <div class="clearfix"></div>
                    <?php foreach ($layanan as $get) { ?>
                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Layanan Kesehatan</i></h4>
                                    <div class="left col-md-7 col-sm-7">
                                        <h2><?= $get->nama_poli ?></h2>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-clock-o"></i> Jam Buka: <?= date('H:i', strtotime($get->jam_buka)) ?> WIB</li>
                                            <li><i class="fa fa-clock-o"></i> Jam Tutup: <?= date('H:i', strtotime($get->jam_tutup)) ?> WIB</li>
                                        </ul>
                                    </div>
                                    <div class="right col-md-5 col-sm-5 text-center">
                                        <img src="<?= base_url('assets/img/logo-klik.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" profile-bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <a href="<?= base_url('Admin/pendaftaran_offline/' . $get->id) ?>" class="btn btn-primary btn-sm">
                                            <i class="fa fa-clinic-medical"> </i> Pilih Poli
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer.php') ?>