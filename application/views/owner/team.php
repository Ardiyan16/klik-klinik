<?php $this->load->view('partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Team</h3>
            <a href="<?= base_url('Owner/create_team') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Anggota</a>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Team</h2>
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
                                        <th>No Telepon</th>
                                        <th>Email</th>
                                        <th>Posisi</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($team as $tm) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $tm->nama ?></td>
                                            <td><?= $tm->no_telp ?></td>
                                            <td><?= $tm->email ?></td>
                                            <td><?= $tm->role ?></td>
                                            <td>
                                                <?php
                                                if ($tm->status == 0) {
                                                    echo "<span class='badge badge-danger' style='color: white;'>Non Aktif</span>";
                                                }
                                                if ($tm->status == 1) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Aktif</span>";
                                                }

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($tm->status == 0) {
                                                    echo "<a href=\"ubah_status_aktif/$tm->id\"  OnClick=\"return confirm('apakah yakin merubah status ke aktif');\" class='badge bg-warning' title='ubah status aktif' style='color: white'><i class='fa fa-times'></i></a>";
                                                }
                                                if ($tm->status == 1) {
                                                    echo "<a href=\"ubah_status_nonaktif/$tm->id\" OnClick=\"return confirm('apakah yakin merubah status ke non aktif');\"' class='badge bg-success' title='ubah status non aktif' style='color: white'><i class='fa fa-check'></i></a>";
                                                }

                                                ?>
                                                <a href="#lihat_foto<?= $tm->id ?>" data-toggle="modal" title="lihat foto" class="badge bg-primary" style="color: white;"><i class="fa fa-picture-o"></i></a>
                                                <a href="<?= base_url('Owner/delete_team/' . $tm->id) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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
<?php foreach ($team2 as $detail) { ?>
    <div class="modal fade" id="lihat_foto<?= $detail->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto <?= $detail->nama ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="<?= base_url('assets/img/image_team/' . $detail->picture) ?>" height="300" width="220">
                    </div>
                </div>
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

    <?php elseif ($this->session->flashdata('success_active')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil diaktifkan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_nonactive')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil di non aktifkan!',
            showConfirmButton: true,
            // timer: 1500
        })


    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil dihapus!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>