<?php $this->load->view('partials/header_apoteker.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Obat</h3>
            <a href="<?= base_url('Apoteker/create_obat') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Obat</a>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Obat</h2>
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
                                        <th>Kode</th>
                                        <th>Nama Obat</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Dosis</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($obat as $show) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $show->kd_obat ?></td>
                                            <td><?= $show->nama_obat ?></td>
                                            <td><?= 'Rp.' . number_format($show->harga) ?></td>
                                            <td><?= $show->stok ?></td>
                                            <td><?= $show->dosis ?></td>
                                            <td><?= date('d-m-Y', strtotime($show->tgl_kadaluarsa)) ?></td>
                                            <td>
                                                <a href="#add_stok<?= $show->id ?>" data-toggle="modal" title="Tambah Stok" class="badge bg-success" style="color: white;"><i class="fa fa-plus-circle"></i></a>
                                                <a href="<?= base_url('Apoteker/edit_obat/' . $show->id) ?>" title="Edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('Apoteker/delete_obat/' . $show->id) ?>" onclick="return confirm('Apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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
<?php foreach ($obat2 as $view) { ?>
    <div class="modal fade" id="add_stok<?= $view->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Stok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Apoteker/save_stok') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tambah Stok</label>
                            <input type="hidden" name="id_obat" value="<?= $view->id ?>">
                            <input type="number" name="stok" class="form-control" placeholder="Sisa Stok <?= $view->stok ?>" required>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Tambah</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data obat berhasil disimpan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_add_stok')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Stok berhasil ditambahkan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data obat berhasil di update!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data obat berhasil dihapus!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>