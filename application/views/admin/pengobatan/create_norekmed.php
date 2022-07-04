<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah No Rekam Medis</h3>
            <a href="<?= base_url('Admin/konfirmasi_user') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Tambah No Rekam Medis</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Admin/save_no_rekmed') ?>">
                    <label>Nama</label>
                    <input type="hidden" name="nik" value="<?= $view->nik ?>">
                    <input type="text" name="nama" value="<?= $view->name ?>" placeholder="Bidang..." class="form-control" readonly>
                    <br>
                    <label>No Rekam Medis</label>
                    <input type="text" name="no_rekmed" placeholder="No Rekam Medis" class="form-control">
                    <?php echo form_error('no_rekmed', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    <div class="ln_solid"></div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>