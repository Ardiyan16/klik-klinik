<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Penghargaan</h3>
            <a href="<?= base_url('Admin/create_karir') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Penghargaan</a>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Penghargaan</h2>
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
                                        <th>Dibutuhkan</th>
                                        <th>Syarat</th>
                                        <th>Batas Akhir</th>
                                        <th>status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($karir as $kr) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $kr->bidang ?></td>
                                            <td><?= $kr->jml_dibutuhkan . ' Orang' ?></td>
                                            <td><?= $kr->syarat_kebutuhan ?></td>
                                            <td><?= date('d-m-Y', strtotime($kr->batas_akhir)) ?></td>
                                            <td>
                                                <?php
                                                if ($kr->status == 0) {
                                                    echo "<span class='badge badge-danger' style='color: white;'>Rekrutmen Tutup</span>";
                                                }
                                                if ($kr->status == 1) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Rekrutmen Buka</span>";
                                                }

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($kr->status == 0) {
                                                    echo "<a href=\"ubah_status_buka/$kr->id\" OnClick=\"return confirm('apakah yakin merubah status ke buka');\"' class='badge bg-success' title='buka rekrutmen' style='color: white'><i class='fa fa-check'></i></a>";
                                                }
                                                if ($kr->status == 1) {
                                                    echo "<a href=\"ubah_status_tutup/$kr->id\"  OnClick=\"return confirm('apakah yakin merubah status ke tutup');\" class='badge bg-warning' title='tutup rekrutmen' style='color: black'><i class='fa fa-times'></i></a>";
                                                }

                                                ?>
                                                <a href="<?= base_url('Admin/edit_karir/' . $kr->id) ?>" title="edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('Admin/delete_karir/' . $kr->id) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil ditambahkan!',
            showConfirmButton: true,
            // timer: 1500
        })


    <?php elseif ($this->session->flashdata('success_open')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Rekrutmen telah dibuka!',
            showConfirmButton: true,
            // timer: 1500
        })


    <?php elseif ($this->session->flashdata('success_close')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Rekrutmen telah ditutup!',
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