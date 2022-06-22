<?php $this->load->view('partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Visi & Misi</h3>
            <a href="<?= base_url('Owner/visi_misi') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Edit Visi & Misi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Owner/update_visimisi') ?>" enctype="multipart/form-data">
                    <label>Visi</label>
                    <textarea id="summernote" name="visi" rows="12"><?= $edit->visi ?></textarea>
                    <br>
                    <label>Misi</label>
                    <textarea id="summernote2" name="misi" rows="12"><?= $edit->misi ?></textarea>
                    <br>
                    <label>Motto</label>
                    <input type="text" name="motto" value="<?= $edit->motto ?>" class="form-control">
                    <div class="ln_solid"></div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>