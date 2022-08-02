<?php $this->load->view('partials/header_kasir.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Pembayaran</h3>
            <a href="<?= base_url('Kasir/payment_pasien') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
                        <p>Kode Payment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->kd_payment ?></p>
                        <p>Total Biaya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= 'Rp. ' . number_format($view->total_biaya_pengobatan) ?></p>
                        <p>Jumlah Pembayaran : <?= 'Rp. ' . number_format($view->jml_dibayarkan) ?></p>
                        <p>Kembalian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= 'Rp. ' . number_format($view->kembalian) ?></p>
                    </div>
                </div>
                <div class="row">
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
                            foreach ($detail_transaksi as $show) { ?>
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