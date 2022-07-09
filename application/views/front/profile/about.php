<?php $this->load->view('partials/header_front.php') ?>

<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Tentang Kami</h3>
                        <!-- <p>
                            Daftar Dokter Klik Klinik
                        </p> -->
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
                    <li class="active">Tentang Kami</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="tagline centered">
                    <div class="row">
                        <div class="span12">
                            <div class="tagline_text">
                                <h2>Selamat Datang di Layanan Online Klik Klinik!</h2>
                                <p>
                                    Klik Klinik merupakan layanan pendaftaran online untuk pasien yang ingin memperoleh layanan kesehatan dari Klinik Husada.
                                    dengan adanya klik klinik masyarakat akan lebih mudah untuk melakukan pendaftaran secara online dan juga memeperoleh informasi
                                    tentang jadwal dokter dan jadwal poli pada klinik. di klik klinik juga memiliki beberapa fitur yang membantuk pasien untuk dapat
                                    memperoleh beberapa informasi kesehatan dan juga konsultasi secara online
                                </p>
                            </div>
                            <div class="btn-toolbar cta">
                                <a class="btn btn-large btn-color" href="<?= base_url('Auth/login') ?>">
                                    <i class="icon-signin icon-white"></i> Pelayanan Online </a>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <i class="icon-circled icon-64 fa fa-desktop active"></i>
                        <h4>Pendaftaran Online</h4>
                        <div class="dotted_line">
                        </div>
                        <p>
                            Pendaftaran Online dapat membantu user mempermudah dalam mendaftar bahkan mendaftar di rumah
                        </p>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="well">
                    <div class="centered">
                        <i class="icon-circled icon-64 fa fa-info active"></i>
                        <h4>Informasi update</h4>
                        <div class="dotted_line">
                        </div>
                        <p>
                            Pengguna dapat dengan mudah memperoleh informasi tentang jadwal dokter dan poli.
                        </p>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="well">
                    <div class="centered">
                        <i class="icon-circled icon-64 fa fa-stethoscope active"></i>
                        <h4>Konsultasi</h4>
                        <div class="dotted_line">
                        </div>
                        <p>
                            Pengguna juga dapat berkonsultasi terlebih dahulu sebelum mendaftar untuk layanan kesehatan.
                        </p>
                    </div>
                </div>
            </div>
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