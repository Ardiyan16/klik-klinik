<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Jadwal Dokter</h3>
            <a href="<?= base_url('Admin/create_jadwal_dokter') ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Jadwal Dokter</a>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Jadwal Dokter</h2>
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
                                        <th>Nama Dokter</th>
                                        <th>Senin</th>
                                        <th>Selasa</th>
                                        <th>Rabu</th>
                                        <th>Kamis</th>
                                        <th>Jumat</th>
                                        <th>Sabtu</th>
                                        <th>Minggu</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($jadwal_dokter as $jd) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $jd->nama ?></td>
                                            <td><?= date("H:i", strtotime($jd->senin)) ?> - <?= date("H:i", strtotime($jd->senin2)) ?></td>
                                            <td><?= date("H:i", strtotime($jd->selasa)) ?> - <?= date("H:i", strtotime($jd->selasa2)) ?></td>
                                            <td><?= date("H:i", strtotime($jd->rabu)) ?> - <?= date("H:i", strtotime($jd->rabu2)) ?></td>
                                            <td><?= date("H:i", strtotime($jd->kamis)) ?> - <?= date("H:i", strtotime($jd->kamis2)) ?></td>
                                            <td><?= date("H:i", strtotime($jd->jumat)) ?> - <?= date("H:i", strtotime($jd->jumat2)) ?></td>
                                            <td><?= date("H:i", strtotime($jd->sabtu)) ?> - <?= date("H:i", strtotime($jd->sabtu2)) ?></td>
                                            <td><?= date("H:i", strtotime($jd->minggu)) ?> - <?= date("H:i", strtotime($jd->minggu2)) ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/edit_jadwal_dokter/' . $jd->id) ?>" title="edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('Admin/delete_jadwal_dokter/' . $jd->id) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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