<?php $this->load->view('partials/header_apoteker.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Resep Obat</h3>
            <!-- <a href="<?= base_url('Apoteker/create_obat') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Obat</a> -->
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Resep Obat</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Rekam Medis</th>
                                        <th>Dokter</th>
                                        <th>Layanan</th>
                                        <th>Resep</th>
                                        <th>status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($resep as $show) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $show->name ?></td>
                                            <td><?= $show->no_rekmed ?></td>
                                            <td><?= $show->nama ?></td>
                                            <td><?= $show->nama_poli ?></td>
                                            <td><?= $show->resep ?></td>
                                            <td>
                                                <?php
                                                if ($show->status_resep == 0) {
                                                    echo "<span class='badge badge-primary' style='color: white;'>Sedang Proses</span>";
                                                }
                                                if ($show->status_resep == 1) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($show->status_resep == 0) { ?>
                                                    <a href="<?= base_url('Apoteker/transaksi_pasien/' . $show->id) ?>" title="Proses Transaksi Obat" class="badge bg-primary" style="color: white;"><i class="fa fa-shopping-cart"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>