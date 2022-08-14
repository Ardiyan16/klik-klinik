<?php $this->load->view('partials/header.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Riwayat Pengobatan Pasien</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Riwayat Pengobatan</h2>
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
                                        <th>Layanan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($riwayat_pengobatan as $get) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $get->name ?></td>
                                            <td><?= $get->no_rekmed ?></td>
                                            <td><?= $get->nama_poli ?></td>
                                            <td><?= date('d-m-Y', strtotime($get->tgl_pengobatan)) ?></td>
                                            <td><?php
                                                if ($get->status_pengobatan == 0) {
                                                    echo "<span class='badge badge-secondary' style='color: white;'>Menunggu Konfirmasi</span>";
                                                }
                                                if ($get->status_pengobatan == 1) {
                                                    echo "<span class='badge badge-info' style='color: white;'>Telah Terkonfirmasi</span>";
                                                }
                                                if ($get->status_pengobatan == 2) {
                                                    echo "<span class='badge badge-parimary' style='color: white;'>Pengobatan</span>";
                                                }
                                                if ($get->status_pengobatan == 3) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Owner/detail_riwayat/' . $get->kd_payment) ?>" title="detail pengobatan" class="badge bg-primary" style="color: white;"><i class="fa fa-list"></i></a>
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
<!-- Modal -->

<?php $this->load->view('partials/footer.php') ?>