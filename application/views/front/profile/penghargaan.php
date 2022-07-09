<?php $this->load->view('partials/header_front.php') ?>

<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Penghargaa</h3>
                        <p>
                            Berikut adalah penghargaan milik klik klinik.
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
                    <li class="active">Penghargaan</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <?php foreach ($penghargaan as $view) { ?>
                <div class="span4">
                    <div class="well">
                        <div class="centered">
                            <img src="<?= base_url('assets/img/image_penghargaan/' . $view->images) ?>">
                            <h4><?= $view->nama ?></h4>
                            <div class="dotted_line">
                            </div>
                            <p>
                                <?= $view->deskripsi ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="span12">
                    <div class="divider">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('partials/footer_front.php') ?>