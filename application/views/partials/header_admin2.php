<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url() ?>assets/img/logo-klik.png" type="image/ico" />

    <title><?= $title ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/back/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>assets/back/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>assets/back/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url() ?>assets/back/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?= base_url() ?>assets/back/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url() ?>assets/back/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url() ?>assets/back/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?= base_url() ?>assets/back/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/back/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/back/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/back/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/back/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Colorpicker -->
    <link href="<?= base_url() ?>assets/back/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>assets/back/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/back/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="<?= base_url() ?>assets/back/sweetalert2-all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><img src="<?= base_url() ?>assets/img/logo-klik-klinik.png" height="50" width="150"> </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?= base_url('assets/img/image_team/' . $this->session->userdata('picture')) ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?= $this->session->userdata('username') ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu Pengobatan</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="<?= base_url('Admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Owner/pendaftaran') ?>"><i class="fa fa-list"></i> Pendaftaran</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Admin/konfirmasi_user') ?>"><i class="fa fa-check"></i> Konfirmasi User</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Owner/konfirmasi_user') ?>"><i class="fa fa-history"></i> Riwayat Pengobatan</a>
                                </li>
                            </ul>
                            <br>
                            <h3>Menu Konten</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="<?= base_url('Admin/berita') ?>"><i class="fa fa-newspaper-o"></i> Berita</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-calendar"></i> Jadwal<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url('Admin/jadwal_dokter') ?>"> Jadwal Dokter</a></li>
                                        <li><a href="<?= base_url('Admin/jadwal_vaksinasi') ?>"> Jadwal Vaksinasi</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= base_url('Admin/poliklinik') ?>"><i class="fa fa-clinic-medical"></i> Poliklinik</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Admin/karir') ?>"><i class="fa fa-briefcase"></i> Karir</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Admin/partner') ?>"><i class="fa fa-handshake"></i> Partner Asuransi</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Admin/penghargaan') ?>"><i class="fas fa-award"></i> Penghargaan</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Profile">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="modal" data-placement="top" title="Logout" href="#logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= base_url('assets/img/image_team/' . $this->session->userdata('picture')) ?>" alt=""><?= $this->session->userdata('nama') ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= base_url('Admin/profile') ?>"> Profile</a>
                                    <a class="dropdown-item" href="#logout" data-toggle="modal"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>
                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i>
                                    <?php if ($jml_notif > 0) { ?>
                                        <span class="badge bg-green"><?= $jml_notif ?></span>
                                    <?php } ?>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <?php foreach ($notif_new_user as $notif) { ?>
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="<?= base_url('Admin/konfirmasi_user') ?>">
                                                <span class="message"><i class="fa fa-user"></i>
                                                    User baru dengan nama <?= $notif->name ?> menunggu konfirmasi
                                                </span>
                                            </a>
                                        </li>
                                        <hr>
                                    <?php } ?>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <?php if ($jml_notif == 0) { ?>
                                                    <strong>Tidak Ada Notifikasi</strong>
                                                <?php }
                                                if ($jml_notif > 0) { ?>
                                                    <strong><?= $jml_notif ?> Notifikasi</strong>
                                                <?php } ?>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            silahkan tekan tombol logout untuk keluar
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <a href="<?= base_url('Auth/logout_backend') ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /top navigation -->