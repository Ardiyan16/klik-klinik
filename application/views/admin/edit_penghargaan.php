<!-- page content -->
<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Penghargaan</h3>
            <a href="<?= base_url('Admin/penghargaan') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Tambah Penghargaan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Admin/update_penghargaan') ?>" enctype="multipart/form-data">
                    <label>Nama</label>
                    <input type="hidden" name="id" value="<?= $edit->id ?>">
                    <input type="text" name="nama" value="<?= $edit->nama ?>" placeholder="Nama Penghargaan..." class="form-control">
                    <br>
                    <label>Kategori</label>
                    <input type="text" name="kategori" value="<?= $edit->kategori ?>" placeholder="Kategori Penghargaan..." class="form-control">
                    <br>
                    <label>Deskripsi / Isi Berita</label>
                    <textarea id="summernote" name="deskripsi" rows="12"><?= $edit->deskripsi ?></textarea>
                    <br>
                    <label>Tanggal Diperoleh</label>
                    <br>
                    <input type="date" name="tgl_diperoleh" value="<?= $edit->tgl_diperoleh ?>" class="form-control col-md-3">
                    <br>
                    <br>
                    <br>
                    <label>Images</label>
                    <input type="hidden" name="old_images" value="<?= $edit->images ?>">
                    <input type="file" name="images" placeholder="Judul..." class="form-control">
                    <br>
                    <img src="<?= base_url('assets/img/image_penghargaan/' . $edit->images) ?>" height="100" width="200">
                    <div class="ln_solid"></div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer.php') ?>