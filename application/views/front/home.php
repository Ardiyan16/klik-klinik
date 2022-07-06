<?php $this->load->view('partials/header_front.php') ?>

<section id="intro">
    <div class="jumbotron masthead">
        <div class="container">
            <!-- slider navigation -->
            <div class="sequence-nav">
                <div class="prev">
                    <span></span>
                </div>
                <div class="next">
                    <span></span>
                </div>
            </div>
            <!-- end slider navigation -->
            <div class="row">
                <div class="span12">
                    <div id="slider_holder">
                        <div id="sequence">
                            <ul>
                                <!-- Layer 1 -->
                                <li>
                                    <div class="info animate-in">
                                        <h2>Klik Klinik</h2>
                                        <br>
                                        <h3>Melayani Dengan Sepenuh Hati dan Invosasi</h3>
                                        <p>
                                            Klik Klinik hadir dengan inovasi baru dalam pelayanan kesehatan masyarakat
                                        </p>
                                        <!-- <a class="btn btn-success" href="#">Learn more &raquo;</a> -->
                                    </div>
                                    <img class="slider_img animate-in" src="<?= base_url('assets/img/bg1.jpg') ?>" alt="">
                                </li>
                                <!-- Layer 2 -->
                                <li>
                                    <div class="info">
                                        <h2>Klik Klinik</h2>
                                        <br>
                                        <h3>Senyuman adalah salah satu cara terbaik dalam mengatasi berbagai situasi.</h3>
                                        <p>
                                            Mecoba memberikan pelayanan dengan senyuman dan rasa tanggung jawab.
                                        </p>
                                        <!-- <a class="btn btn-success" href="#">Learn more &raquo;</a> -->
                                    </div>
                                    <img class="slider_img" src="<?= base_url('assets/img/slide2.jpeg') ?>" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sequence Slider::END-->
                </div>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span3 features">
                <i class="icon-circled icon-32 fa fa-clinic-medical left"></i>
                <h4>Layanan Medis</h4>
                <div class="dotted_line">
                </div>
                <p class="left">
                    Klik Klinik memiliki beberapa layanan medis untuk menunjang pelayanan kesehatan di masyarakat
                </p>
                <a href="<?= base_url('Front/layanan_medis') ?>">Lihat Layanan</a>
            </div>
            <div class="span3 features">
                <i class="icon-circled icon-32 fa fa-desktop left"></i>
                <h4>Pelayanan Online</h4>
                <div class="dotted_line">
                </div>
                <p class="left">
                    Klik Klinik memberikan pelayanan online untuk para masyarakat guna mempermudah dalam layanan kesehatan
                </p>
                <a href="<?= base_url('Auth/login') ?>">Daftar Online</a>
            </div>
            <div class="span3 features">
                <i class="icon-circled icon-32 fa fa-info left"></i>
                <h4>Informasi Terbaru</h4>
                <div class="dotted_line">
                </div>
                <p class="left">
                    Dengan adanya sistem online akan memberikan informasi terbaru dari Klik Klinik.
                </p>
            </div>
            <div class="span3 features">
                <i class="icon-circled icon-32 icon-wrench left"></i>
                <h4>With latest technology</h4>
                <div class="dotted_line">
                </div>
                <p class="left">
                    Dolorem adipiscing definiebas ut nec. Dolore consectetuer eu vim, elit molestie ei has, petentium imperdiet in pri mel virtute nam.
                </p>
                <a href="#">Learn more</a>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div class="tagline centered">
                    <div class="row">
                        <div class="span12">
                            <div class="tagline_text">
                                <h2>Layanan Online Klik Klinik!</h2>
                                <p>
                                    Klik Klinik menghadirkan pelayanan online untuk masyarakat.
                                </p>
                            </div>
                            <div class="btn-toolbar cta">
                                <a class="btn btn-large btn-color" href="<?= base_url('Auth/login') ?>">
                                    <i class="icon-plane icon-white"></i> Pelayanan Online </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="home-posts">
                <div class="span12">
                    <h3>Artikel Terbaru</h3>
                </div>
                <?php foreach ($artikel as $view) { ?>
                    <div class="span3">
                        <div class="post-image">
                            <a href="<?= base_url('Front/full_page_artikel/' . $view->id) ?>">
                                <img src="<?= base_url('assets/img/image_berita/' . $view->images) ?>" alt="">
                            </a>
                        </div>
                        <div class="entry-meta">
                            <a href="#" title="artikel"><i class="icon-square icon-48 icon-pencil left"></i></a>
                            <span class="date"><?= date('d-m-Y', strtotime($view->tanggal)) ?></span>
                        </div>
                        <!-- end .entry-meta -->
                        <div class="entry-body">
                            <a href="<?= base_url('Front/full_page_artikel/' . $view->id) ?>">
                                <h5 class="title"><?= $view->judul ?></h5>
                            </a>
                            <p>
                                <?= substr($view->deskripsi, 0, 100) ?>...
                            </p>
                        </div>
                        <!-- end .entry-body -->
                        <div class="clear">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="tagline centered">
        </div>
        <div class="row">
            <div class="home-posts">
                <div class="span12">
                    <h3>Berita Terbaru</h3>
                </div>
                <?php foreach ($berita as $view) { ?>
                    <div class="span3">
                        <div class="post-image">
                            <a href="<?= base_url('Front/full_page_artikel/' . $view->id) ?>">
                                <img src="<?= base_url('assets/img/image_berita/' . $view->images) ?>" alt="">
                            </a>
                        </div>
                        <div class="entry-meta">
                            <a href="#" title="artikel"><i class="icon-square icon-48 icon-pencil left"></i></a>
                            <span class="date"><?= date('d-m-Y', strtotime($view->tanggal)) ?></span>
                        </div>
                        <!-- end .entry-meta -->
                        <div class="entry-body">
                            <a href="<?= base_url('Front/full_page_artikel/' . $view->id) ?>">
                                <h5 class="title"><?= $view->judul ?></h5>
                            </a>
                            <p>
                                <?= substr($view->deskripsi, 0, 100) ?>...
                            </p>
                        </div>
                        <!-- end .entry-body -->
                        <div class="clear">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div class="tagline centered">
                    <div class="row">
                        <div class="span12">
                            <div class="tagline_text">
                                <h2>Partner Kami</h2>
                                <p>
                                    Berikut merupakan partner asuransi kami.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <ul class="portfolio-area da-thumbs">
                <?php foreach ($partner as $view) { ?>
                    <li class="portfolio-item2" data-id="id-0" data-type="web">
                        <div class="span3">
                            <div class="thumbnail">
                                <div class="image-wrapp">
                                    <img src="<?= base_url('assets/img/image_partner/' . $view->images_partner) ?>" alt="<?= $view->nama_partner ?>" title="" />
                                    <article class="da-animate da-slideFromRight" style="display: block;">
                                        <h4><?= $view->nama_partner ?></h4>
                                        <a href="#"><i class="icon-rounded icon-48 icon-link"></i></a>
                                        <span><a class="zoom" data-pretty="prettyPhoto" href="<?= base_url('assets/img/image_partner/' . $view->images_partner) ?>">
                                                <i class="icon-rounded icon-48 icon-zoom-in"></i>
                                            </a></span>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>

<?php $this->load->view('partials/footer_front.php') ?>