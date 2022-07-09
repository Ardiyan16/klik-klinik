<?php $this->load->view('partials/header_front.php') ?>
<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Visi Misi</h3>
                        <p>
                            Visi Misi Klik Klinik
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
                    <li class="active">Profile<span class="divider"> /</span></li>
                    <li class="active">Visi Misi</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h4>Visi Misi Klik Klinik</h4>
                <!-- start: Accordion -->
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#visi">
                                <i class="icon-minus"></i>Visi</a>
                        </div>
                        <div id="visi" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <?= $visi_misi->visi ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#misi">
                                <i class="icon-minus"></i>Misi</a>
                        </div>
                        <div id="misi" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <?= $visi_misi->misi ?>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <!--end: Accordion -->
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('partials/footer_front.php') ?>