<?php $this->load->view('partials/header_admin.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Pembayaran</h3>
            <a href="<?= base_url('Admin/riwayat_pengobatan') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Detail Pembayaran</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
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
                        <p>Total Qty  &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?= $view->total_qty ?></p>
                        <p>Total Transaksi  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;: <?= 'Rp. ' . number_format($view->kembalian) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <p>Kode Transaksi Obat : <?= $view->kd_payment ?></p>
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
</div>
<?php $this->load->view('partials/footer.php') ?>