<?php $this->load->view('partials/header_front.php') ?>
<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Jadwal Dokter</h3>
                        <p>
                            Berikut merupakan informasi jadwal dokter pada klik klinik
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb notop">
                    <li><a href="<?= base_url('Front') ?>">Home</a><span class="divider">/</span></li>
                    <li class="active">Layanan<span class="divider"> /</span></li>
                    <li class="active">Jadwal Dokter</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <?php foreach ($layanan_medis as $view) { ?>
                <div class="span4">
                    <div class="well">
                        <div class="centered">
                            <img src="<?= base_url('assets/img/logo-klik-klinik.png') ?>">
                            <h4><?= $view->nama_poli ?></h4>
                            <div class="dotted_line">
                            </div>
                            <p>
                                Buka mulai pukul <?= date("H:i", strtotime($view->jam_buka)) ?> sampai <?= date("H:i", strtotime($view->jam_tutup)) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="span12">
                <div class="divider">
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('partials/footer_front.php') ?>