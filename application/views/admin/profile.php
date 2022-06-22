<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Profile Anda</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data anda</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-8 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="<?= base_url('assets/img/image_team/' . $profile->picture) ?>" height="300" width="220" alt="Avatar" title="Foto Anda">
                                </div>
                            </div>
                            <h3><?= $profile->nama ?></h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $profile->tempat_lahir ?>
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> <?php if ($profile->role_id == 2) {
                                                                                            $role = 'Admin';
                                                                                        } else {
                                                                                            $role = 'Admin';
                                                                                        }
                                                                                        echo $role ?>
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-calendar user-profile-icon"></i> <?= date('d-m-Y', strtotime($profile->tgl_lahir)) ?>
                                </li>
                                <li><i class="fa fa-phone user-profile-icon"></i> <?= $profile->no_telp ?>
                                </li>
                                <li><i class="fa fa-envelope user-profile-icon"></i> <?= $profile->email ?>
                                </li>
                            </ul>

                            <a href="#edit" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('Admin/update_profile') ?>">
                <div class="modal-body">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="hidden" name="id" value="<?= $edit->id ?>">
                            <input type="text" name="nama" value="<?= $edit->nama ?>" class="form-control" placeholder="Nama...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Tempat Lahir</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" value="<?= $edit->tempat_lahir ?>" name="tempat_lahir" placeholder="Tempat Lahir...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Tanggal Lahir</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="date" class="form-control" value="<?= $edit->tgl_lahir ?>" name="tgl_lahir" placeholder="Tanggal Lahir...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">No Telepon</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" value="<?= $edit->no_telp ?>" name="no_telp" placeholder="No Telepon...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="email" class="form-control" value="<?= $edit->email ?>" name="email" placeholder="Email...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                    <br>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil diupdate!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>