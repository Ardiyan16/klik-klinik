<?php $this->load->view('partials/header_admin.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Pengobatan</h3>
            <a href="<?= base_url('Admin/pilih_layanan') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Pengobatan</a>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Pendaftaran</h2>
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
                                        <th>Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pengobatan as $get) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $get->name ?></td>
                                            <td><?= $get->no_rekmed ?></td>
                                            <td><?= $get->nama_poli ?></td>
                                            <td><?= $get->nama ?></td>
                                            <td><?= date('d-m-Y', strtotime($get->tgl_pengobatan)) ?></td>
                                            <td><?php
                                                if ($get->status == 0) {
                                                    echo "<span class='badge badge-secondary' style='color: white;'>Menunggu Konfirmasi</span>";
                                                }
                                                if ($get->status == 1) {
                                                    echo "<span class='badge badge-info' style='color: white;'>Telah Terkonfirmasi</span>";
                                                }
                                                if ($get->status == 2) {
                                                    echo "<span class='badge badge-parimary' style='color: white;'>Pengobatan</span>";
                                                }
                                                if ($get->status == 3) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#detail<?= $get->id ?>" data-toggle="modal" title="Detail Pendaftaran" class="badge bg-primary" style="color: white;"><i class="fa fa-eye"></i></a>
                                                <?php if ($get->status == 0) { ?>
                                                    <a href="<?= base_url("Admin/konfirmasi_pendaftaran?id=" . $get->id . "&id_poli=" . $get->id_poli) ?>" title="konfirmasi" class="badge bg-success" style="color: white;"><i class="fa fa-check"></i></a>
                                                    <a href="#reject<?= $get->id ?>" data-toggle="modal" title="reject" class="badge bg-danger" style="color: white;"><i class="fa fa-times"></i></a>
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
<!-- Modal -->
<!-- <?php foreach ($detail as $view) { ?>
    <div class="modal fade" id="detail<?= $view->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pasien <?= $view->name ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>No Antrian = <?= $view->no_antrian ?></p>
                    <p>Gejala = <?= $view->gejala ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
<?php } ?> -->
<script>
    <?php if ($this->session->flashdata('success_konfirmasi')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Pendaftaran berhasil dikonfirmasi!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_reject')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil di reject!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_daftar')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Pendaftaran pasien berhasil disimpan!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>