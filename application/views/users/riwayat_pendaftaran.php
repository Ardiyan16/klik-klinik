<?php $this->load->view('partials/header_user.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Riwayat Pendaftaran</h3>
            <!-- <a href="#createpartner" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Partner</a> -->
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Riwayat Pendaftaran</h2>
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
                                        <th>Kode Pendaftaran</th>
                                        <th>Tanggal</th>
                                        <th>No Antrian</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($riwayat_pendaftaran as $rwp) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $rwp->kd_pendaftaran ?></td>
                                            <td><?= date('d-m-Y', strtotime($rwp->tgl_pendaftaran)) ?></td>
                                            <td><?php if ($rwp->no_antrian == null) {
                                                    echo 'No Antrian Belum Tersedia';
                                                } else {
                                                    echo $rwp->no_antrian;
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($rwp->status == 0) {
                                                    echo "<span class='badge badge-primary' style='color: white;'>Menunggu Konfirmasi</span>";
                                                }
                                                if ($rwp->status == 1) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Pendaftaran Terkonfirmasi</span>";
                                                }
                                                if ($rwp->status == 2) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Masuk Pengobatan</span>";
                                                }
                                                if ($rwp->status == 3) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                                }
                                                if ($rwp->status == 4) {
                                                    echo "<span class='badge badge-danger' style='color: white;'>Pendaftaran Ditolak</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($rwp->status == 1) { ?>
                                                    <a href="<?= base_url('User/detail_pendaftaran/' . $rwp->id) ?>" title="detail" class="badge bg-primary" style="color: white;"><i class="fa fa-eye"></i></a>
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
<script>
    <?php if ($this->session->flashdata('success_daftar')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Anda berhasil mendaftar!',
            text: 'silahkan tunggu konfirmasi admin beberapa saat lagi',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>