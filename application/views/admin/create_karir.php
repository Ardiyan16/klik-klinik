<!-- page content -->
<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Karir</h3>
            <a href="<?= base_url('Admin/karir') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Tambah Karir</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Admin/save_karir') ?>">
                    <label>Bidang</label>
                    <input type="text" name="bidang" placeholder="Bidang..." class="form-control">
                    <br>
                    <label>Jumlah Dibutuhkan</label>
                    <input type="number" name="jml_dibutuhkan" placeholder="Jumlah Tenaga Yang Dibutuhkan..." class="form-control">
                    <br>
                    <label>Syarat Dibutuhkan</label>
                    <textarea id="summernote" name="syarat_kebutuhan" rows="12"></textarea>
                    <br>
                    <label>Batas Akhir</label>
                    <br>
                    <input type="date" name="batas_akhir" class="form-control col-md-3">
                    <br>
                    <br>
                    <div class="ln_solid"></div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>