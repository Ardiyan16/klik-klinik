<?php $this->load->view('partials/header_front.php') ?>
<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Daftar Dokter</h3>
                        <p>
                            Daftar Dokter Klik Klinik
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
                    <li class="active">Daftar Dokter</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <?php foreach ($dokter as $view) { ?>
                <div class="span4">
                    <div class="well">
                        <div class="centered">
                            <img src="<?= base_url('assets/img/image_team/' . $view->picture) ?>">
                            <h4><?= $view->nama ?></h4>
                            <div class="dotted_line">
                            </div>
                            <!-- <p>
                                Dolorem adipiscing definiebas ut nec. Dolore consectetuer eu vim, elit molestie ei has, petentium imperdiet in pri. Mel virtute efficiantur ne, zril omnes sed no, sit eu duis semper.
                            </p> -->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php $this->load->view('partials/footer_front.php') ?>