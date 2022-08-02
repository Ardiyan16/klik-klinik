<?php $this->load->view('partials/header_dokter.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Pengobatan</h3>
            <!-- <a href="<?= base_url('Admin/create_pengobatan') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Pengobatan</a> -->
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Pengobatan</h2>
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
                                    foreach ($pengobatan as $show) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $show->name ?></td>
                                            <td><?= $show->no_rekmed ?></td>
                                            <td><?= $show->nama_poli ?></td>
                                            <td><?= $show->nama ?></td>
                                            <td><?= date('d-m-Y', strtotime($show->tgl_pengobatan)) ?></td>
                                            <td><?php
                                                if ($show->status_pengobatan == 0) {
                                                    echo "<span class='badge badge-secondary' style='color: white;'>Penanganan Dokter</span>";
                                                }
                                                if ($show->status_pengobatan == 1) {
                                                    echo "<span class='badge badge-info' style='color: white;'>Pengambilan Obat</span>";
                                                }
                                                if ($show->status_pengobatan == 2) {
                                                    echo "<span class='badge badge-primary' style='color: white;'>Pembayaran</span>";
                                                }
                                                if ($show->status_pengobatan == 3) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?php if ($show->status_pengobatan == 0) { ?>
                                                <a href="<?php echo base_url("Dokter/detail_pengobatan?id=" . $show->id); ?>" title="Detail Pengobatan" class="badge bg-success" style="color: white;"><i class="fa fa-medkit"></i></a>
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
    <?php if ($this->session->flashdata('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data diagnosa dan resep berhasil disimpan!',
            showConfirmButton: true,
            // timer: 1500
        })

    // <?php elseif ($this->session->flashdata('success_reject')) : ?>
    //     Swal.fire({
    //         icon: 'success',
    //         title: 'Data berhasil di reject!',
    //         showConfirmButton: true,
    //         // timer: 1500
    //     })

    // <?php elseif ($this->session->flashdata('success_daftar')) : ?>
    //     Swal.fire({
    //         icon: 'success',
    //         title: 'Pendaftaran pasien berhasil disimpan!',
    //         showConfirmButton: true,
    //         // timer: 1500
    //     })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>