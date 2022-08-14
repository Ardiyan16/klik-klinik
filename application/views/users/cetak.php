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


<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col">
                    <p>Kode Pendaftaran &nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->kd_pendaftaran ?></p>
                    <p>Nama Pasien &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->name ?></p>
                    <p>Layanan Kesehatan &nbsp;: <?= $view->nama_poli ?></p>
                    <p>Tanggal Pendaftaran : <?= date('d-m-Y', strtotime($view->tgl_pendaftaran)) ?></p>
                    <p>No Antrian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->no_antrian ?></p>
                    <p>Gejala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->gejala ?></p>
                    <p>Status Pendaftaran &nbsp;&nbsp;: <?php
                                                        if ($view->status_daftar == 0) {
                                                            echo "<span class='badge badge-secondary' style='color: white;'>Menunggu Konfirmasi</span>";
                                                        }
                                                        if ($view->status_daftar == 1) {
                                                            echo "<span class='badge badge-info' style='color: white;'>Telah Terkonfirmasi</span>";
                                                        }
                                                        if ($view->status_daftar == 2) {
                                                            echo "<span class='badge badge-parimary' style='color: white;'>Pengobatan</span>";
                                                        }
                                                        if ($view->status_daftar == 3) {
                                                            echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                                        }
                                                        if ($view->status_daftar == 4) {
                                                            echo "<span class='badge badge-danger' style='color: white;'>Ditolak</span>";
                                                        }
                                                        ?>
                    </p>
                    <p>Tanggal Pengobatan : <?= date('d-m-Y', strtotime($view->tgl_pengobatan)) ?></p>
                    <p>Status Pengobatan &nbsp;&nbsp;: <?php
                                                        if ($view->status_pengobatan == 0) {
                                                            echo "<span class='badge badge-secondary' style='color: white;'>Menunggu Konfirmasi</span>";
                                                        }
                                                        if ($view->status_pengobatan == 1) {
                                                            echo "<span class='badge badge-info' style='color: white;'>Telah Terkonfirmasi</span>";
                                                        }
                                                        if ($view->status_pengobatan == 2) {
                                                            echo "<span class='badge badge-parimary' style='color: white;'>Pengobatan</span>";
                                                        }
                                                        if ($view->status_pengobatan == 3) {
                                                            echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                                        }
                                                        if ($view->status_pengobatan == 4) {
                                                            echo "<span class='badge badge-danger' style='color: white;'>Ditolak</span>";
                                                        }
                                                        ?>
                    </p>
                    <p>Dokter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->nama ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <p>Kode Payment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->kd_payment ?></p>
                    <p>Apoteker &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->apoteker ?></p>
                    <p>Total Qty &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?= $view->total_qty ?></p>
                    <p>Total Transaksi &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;: <?= 'Rp. ' . number_format($view->kembalian) ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <p>Kode Transaksi Obat : <?= $view->kd_trans ?></p>
                    <p>Total Biaya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= 'Rp. ' . number_format($view->total_biaya_pengobatan) ?></p>
                    <p>Jumlah Pembayaran : <?= 'Rp. ' . number_format($view->jml_dibayarkan) ?></p>
                    <p>Kembalian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= 'Rp. ' . number_format($view->kembalian) ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <h5>Data Obat</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_obat as $show) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $show->kd_obat ?></td>
                                <td><?= $show->nama_obat ?></td>
                                <td><?= $show->qty ?></td>
                                <td><?= 'Rp. ' . number_format($show->harga) ?></td>
                                <td><?= 'Rp. ' . number_format($show->subtotal) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?= base_url() ?>assets/back/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/back/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/back/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>assets/back/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?= base_url() ?>assets/back/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?= base_url() ?>assets/back/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url() ?>assets/back/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>assets/back/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?= base_url() ?>assets/back/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?= base_url() ?>assets/back/vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?= base_url() ?>assets/back/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?= base_url() ?>assets/back/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/back/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url() ?>assets/back/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>assets/back/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- bootstrap-daterangepicker -->
<script src="<?= base_url() ?>assets/back/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/back/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?= base_url() ?>assets/back/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>assets/back/build/js/custom.min.js"></script>

<script src="<?= base_url() ?>assets/back/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote();
        $('#summernote2').summernote()

        // // CodeMirror
        // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        //   mode: "htmlmixed",
        //   theme: "monokai"
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#myDatepicker').datetimepicker({
            format: 'MM-DD-YYYY'
        });

    });

    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });

    window.print();
</script>

</body>

</html>