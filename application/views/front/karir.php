<?php $this->load->view('partials/header_front.php') ?>

<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Karir</h3>
                        <p>
                            Informasi mengenai rekrutmen klik klinik untuk team baru
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
                    <li class="active">Karir</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="well">
                    <div class="centered">
                        <i class="icon-circled icon-64 icon-suitcase active"></i>
                        <h4>Kirim Laraman anda di</h4>
                        <div class="dotted_line">
                        </div>
                        <h5>Email : recrutment@kklinik.com atau ke<br>
                            alamat : Jl Darmokali No 67
                            Surabaya, Jawa Timur</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h4>Tenaga Ahli yang dibutuhkan</h4>
                <!-- start: Accordion -->
                <div class="accordion" id="accordion2">
                    <?php
                    foreach ($karir as $view) { ?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?= $view->id ?>">
                                    <i class="icon-minus"></i> <?= $view->bidang ?></a>
                            </div>
                            <div id="collapse<?= $view->id ?>" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    Persyaratan<br>
                                    <?= $view->syarat_kebutuhan ?>
                                </div>
                                <div class="accordion-inner">
                                    Jumlah tenaga yang dibutuhkan <?= $view->jml_dibutuhkan ?> orang<br>
                                    Batas Akhir pengumpulan berkas pada <?= date('d F Y', strtotime($view->batas_akhir)) ?>
                                </div>
                            </div>
                        </div>
                        <br>
                    <?php } ?>
                </div>
                <!--end: Accordion -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('partials/footer_front.php') ?>