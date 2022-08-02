<?php $this->load->view('partials/header_apoteker.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Riwayat Transaksi</h3>
            <!-- <a href="<?= base_url('Apoteker/create_obat') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Obat</a> -->
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Riwayat Transaksi</h2>
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
                                        <th>Kode Transaksi</th>
                                        <th>Nama Pasien</th>
                                        <th>Layanan</th>
                                        <th>Tanggal</th>
                                        <th>Apoteker</th>
                                        <th>Biaya</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($riwayat_transaksi as $show) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $show->kd_trans ?></td>
                                            <td>
                                                <?php
                                                echo $show->name;

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $show->nama_poli;

                                                ?>
                                            </td>
                                            <td><?= date('d-m-Y', strtotime($show->tgl_trans)) ?></td>
                                            <td><?= $show->apoteker ?></td>
                                            <td><?= 'Rp. ' . number_format($show->total_biaya) ?></td>
                                            <td>
                                                <a href="<?= base_url('Apoteker/detail_transaksi/' . $show->kd_trans) ?>" title="Detail Transaksi" class="badge bg-primary" style="color: white;"><i class="fa fa-list"></i></a>
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
    <?php if ($this->session->flashdata('transaksi_berhasil')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Transaksi berhasil, Data telah tersimpan!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>