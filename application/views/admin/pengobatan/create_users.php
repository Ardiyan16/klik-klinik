<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah User Offline</h3>
            <a href="<?= base_url('Admin/konfirmasi_user') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Tambah User Offline</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <p>* wajib diisi</p>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Admin/save_users') ?>">
                    <label>NIK</label>
                    <input type="text" name="nik" placeholder="Nomor Induk Kependudukan..." class="form-control">
                    <?php echo form_error('nik', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    <label>No Rekam Medis *</label>
                    <input type="text" name="no_rekmed" placeholder="No Rekam Medis" class="form-control">
                    <?php echo form_error('no_rekmed', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    <label>Nama *</label>
                    <input type="text" name="name" placeholder="Nama" class="form-control">
                    <?php echo form_error('name', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    <label>Tempat lahir *</label>
                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
                    <?php echo form_error('tempat_lahir', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    <label>Tanggal Lahir *</label>
                    <br>
                    <input type="date" name="tgl_lahir" placeholder="No Rekam Medis" class="form-control col-md-3">
                    <br>
                    <br>
                    <?php echo form_error('tgl_lahir', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="Alamat" class="form-control">
                    <br>
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" placeholder="No Telp" class="form-control">
                    <?php echo form_error('no_telp', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    <div class="ln_solid"></div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>