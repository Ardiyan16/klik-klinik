<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Poliklinik</h3>
            <a href="#create" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Poliklinik</a>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Poliklinik</h2>
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
                                        <th>Poli</th>
                                        <th>Jam Buka</th>
                                        <th>Jam Tutup</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($poliklinik as $poli) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $poli->nama_poli ?></td>
                                            <td><?=  date("H:i", strtotime($poli->jam_buka)) ?></td>
                                            <td><?=  date("H:i", strtotime($poli->jam_tutup)) ?></td>
                                            <td>
                                                <a href="#edit<?= $poli->id ?>" data-toggle="modal" title="edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('Admin/delete_poliklinik/' . $poli->id) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Poliklinik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/save_poliklinik') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Poli</label>
                        <input type="text" name="nama_poli" class="form-control" placeholder="Nama Poli" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Buka</label>
                        <input type="time" name="jam_buka" class="form-control" placeholder="Nama Partner" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Tutup</label>
                        <input type="time" name="jam_tutup" class="form-control" placeholder="Nama Partner" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<?php foreach($poliklinik2 as $edit) { ?>
<div class="modal fade" id="edit<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Poliklinik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/update_poliklinik') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Poli</label>
                        <input type="hidden" name="id" value="<?= $edit->id ?>">
                        <input type="text" name="nama_poli" value="<?= $edit->nama_poli ?>" class="form-control" placeholder="Nama Poli" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Buka</label>
                        <input type="time" name="jam_buka" value="<?= $edit->jam_buka ?>" class="form-control" placeholder="Nama Partner">
                    </div>
                    <div class="form-group">
                        <label>Jam Tutup</label>
                        <input type="time" name="jam_tutup" value="<?= $edit->jam_tutup ?>" class="form-control" placeholder="Nama Partner">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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
            title: 'Data berhasil ditambahkan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil di update!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil di hapus!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>