<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- styles -->
    <link rel="icon" href="<?= base_url() ?>assets/img/logo-klik.png" type="image/ico" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/css/docs.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/css/flexslider.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/css/sequence.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/assets/color/default.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- fav and touch icons
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png"> -->

    <!-- =======================================================
    Theme Name: Serenity
    Theme URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
    <header>
        <!-- Navbar
    ================================================== -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <!-- logo -->
                    <a class="brand logo" href="index.html"><img src="<?= base_url() ?>assets/img/logo-klik-klinik.png" alt="" height="100" width="200"></a>
                    <!-- end logo -->
                    <!-- top menu -->
                    <div class="navigation">
                        <nav>
                            <ul class="nav topnav">
                                <li class="dropdown">
                                    <a href="<?= base_url('Front') ?>">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Profile</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url('Front/visi_misi') ?>">Visi Misi</a></li>
                                        <li><a href="<?= base_url('Front/tentang_kami') ?>">Tentang Kami</a></li>
                                        <li><a href="<?= base_url('Front/daftar_dokter') ?>">Daftar Dokter</a></li>
                                        <li><a href="<?= base_url('Front/penghargaan') ?>">Penghargaan</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Pelayanan</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url('Front/layanan_medis') ?>">Layanan Medis</a></li>
                                        <li><a href="<?= base_url('Front/jadwal_dokter') ?>">Jadwal Dokter</a></li>
                                        <li><a href="<?= base_url('Front/jadwal_vaksinasi') ?>">Jadwal Vaksinasi</a></li>
                                    </ul>
                                </li>
                                <!-- <li>
                                    <a href="<?= base_url('Front/partner') ?>">Partner</a>
                                </li> -->
                                <li class="dropdown">
                                    <a href="#">Informasi</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url('Front/berita') ?>">Berita</a></li>
                                        <li><a href="<?= base_url('Front/artikel') ?>">Artikel</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= base_url('Front/karir') ?>">Karir</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Front/kontak') ?>">Kontak</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Auth/login') ?>">Daftar Online</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end menu -->
                </div>
            </div>
        </div>
    </header>