<?php $this->load->view('owner/partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Team</h3>
            <a href="<?= base_url('Owner/team') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Tambah Team</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('admin/data_set/save_datauji') ?>" enctype="multipart/form-data">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="nama" class="form-control" placeholder="Nama...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Tempat Lahir</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Tanggal Lahir</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">No Telepon</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="no_telp" placeholder="No Telepon...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="email" class="form-control" name="email" placeholder="Email...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Username</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="username" placeholder="Username...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Password</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="password" class="form-control" name="password" placeholder="Password...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Foto</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="file" class="form-control" name="picture" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Role</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select name="kategori" class="form-control">
                                <option value="Fight">Fight</option>
                                <option value="TGR">TGR</option>
                                <option value="Serang Hindar">Serang Hindar</option>
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('owner/partials/footer.php') ?>