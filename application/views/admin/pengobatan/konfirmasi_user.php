<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Konfirmasi Users</h3>
            <!-- <a href="<?= base_url('Admin/create_karir') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Karir</a> -->
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Users</h2>
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
                                        <th>NIK</th>
                                        <th>No Rekam Medis</th>
                                        <th>Nama</th>
                                        <th>TTL</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $user) {
                                    ?>
                                        <tr>
                                            <td><?= $user->nik ?></td>
                                            <td><?= $user->no_rekmed ?></td>
                                            <td><?= $user->name ?></td>
                                            <td><?= $user->tempat_lahir ?> / <?= date('d-m-Y', strtotime($user->tgl_lahir)) ?></td>
                                            <td><?= $user->alamat ?></td>
                                            <td>
                                                <?php
                                                if ($user->status == 0) {
                                                    echo "<span class='badge badge-danger' style='color: white;'>Belum diverifikasi</span>";
                                                }
                                                if ($user->status == 1) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Terverifikasi</span>";
                                                }

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($user->status == 0) {
                                                    echo "<a href=\"konfirmasi_status_user/$user->nik\" OnClick=\"return confirm('konfirmasi user ?');\"' class='badge bg-success' title='konfirmasi_user' style='color: white'><i class='fa fa-check'></i></a>";
                                                }

                                                ?>
                                                <?php if ($user->no_rekmed == NULL) { ?>
                                                    <a href="<?= base_url('Admin/create_no_rekmed/' . $user->nik) ?>" title="tambah no rekam medis" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                                <?php } ?>
                                                <a href="#detail_user<?= $user->nik ?>" data-toggle="modal" title="detail users" class="badge bg-info" style="color: white;"><i class="fa fa-eye"></i></a>
                                                <a href="<?= base_url('Admin/delete_karir/' . $user->nik) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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
<!-- <?php foreach ($user3 as $add) { ?>
    <div class="modal fade" id="add_rekmed<?= $add->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah No Rekam Medis untuk <?= $add->name ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="<?= $add->name ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>No Rekam Medis</label>
                                <input type="text" name="no_rekmed" placeholder="No Rekmed" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?> -->
<?php foreach ($user2 as $detail) { ?>
    <div class="modal fade" id="detail_user<?= $detail->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail <?= $detail->name ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h5>Email : <?= $detail->email ?></h5>
                            <h5>No Telepon : <?= $detail->no_telp ?></h5>
                        </div>
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


    <?php elseif ($this->session->flashdata('success_terkonfirmasi')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Akun user telah terverifikasi!',
            showConfirmButton: true,
            // timer: 1500
        })


    <?php elseif ($this->session->flashdata('success_create_norekmed')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'No rekam medis berhasil ditambahkan!',
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