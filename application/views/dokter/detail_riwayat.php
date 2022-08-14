<?php $this->load->view('partials/header_dokter.php') ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Riwayat Pengobatan</h3>
                <a href="<?= base_url('Dokter/riwayat_pengobatan') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="col-md-8 col-sm-8 ">
                <div class="x_panel fixed_height_520">
                    <div class="x_title">
                        <h2>Detail pasien <?= $view->name ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">
                            <ul class="quick-list">
                                <li><a>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->name ?></a></li>
                                <li><a>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->nik ?></a></li>
                                <li><a>TTL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->tempat_lahir ?> / <?= date('d-m-Y',  strtotime($view->tgl_lahir)) ?></a></li>
                                <li><a>No Rekam Medis &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->no_rekmed ?></a></li>
                                <li><a>Tanggal Pengobatan &nbsp;: <?= date('d-m-Y',  strtotime($view->tgl_pengobatan)) ?></a></li>
                                <li><a>Layanan Kesehatan &nbsp;&nbsp;: <?= $view->nama_poli ?></a></li>
                                <li><a>Dokter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->nama ?></a></li>
                                <li><a>Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php
                                                                                                                                                                                            if ($view->status_pengobatan == 0) {
                                                                                                                                                                                                echo "<span class='badge badge-secondary' style='color: white;'>Penanganan Dokter</span>";
                                                                                                                                                                                            }
                                                                                                                                                                                            if ($view->status_pengobatan == 1) {
                                                                                                                                                                                                echo "<span class='badge badge-info' style='color: white;'>Pengambilan Obat</span>";
                                                                                                                                                                                            }
                                                                                                                                                                                            if ($view->status_pengobatan == 2) {
                                                                                                                                                                                                echo "<span class='badge badge-parimary' style='color: white;'>Pembayaran</span>";
                                                                                                                                                                                            }
                                                                                                                                                                                            if ($view->status_pengobatan == 3) {
                                                                                                                                                                                                echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                                                                                                                                                                            }
                                                                                                                                                                                            ?></a></li>
                            </ul>
                        </div>
                        <hr>
                        <div>
                            <p>Gejala : <?= $view->gejala ?></p>
                        </div>
                        <hr>
                        <?php if ($view->status_pengobatan == 0) { ?>
                            <div>
                                <a href="#diagnosa" data-toggle="modal" class="btn btn-success"><i class="fa fa-stethoscope"></i> Diagnosa Penyakit</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="diagnosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Diagnosa Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Dokter/save_diagnosa') ?>" method="post">
                    <label>Diagnosa Penyakit</label>
                    <input type="hidden" value="<?= $view->id ?>" name="id">
                    <select class="form-control" name="id_diagnosa">
                        <?php foreach ($diagnosa as $get) { ?>
                            <option value="<?= $get->id ?>"><?= $get->diagnosa ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label>Resep Obat</label>
                    <textarea class="form-control mb-3" required name="resep" rows="3"></textarea>
                    <br>
                    <label>Keterangan</label>
                    <textarea class="form-control mb-3" name="keterangan" rows="3"></textarea>
                    <br>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>