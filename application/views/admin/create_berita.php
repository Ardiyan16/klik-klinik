<!-- page content -->
<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Berita</h3>
            <a href="<?= base_url('Admin/berita') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Tambah Berita</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Admin/save_berita') ?>" enctype="multipart/form-data">
                    <label>Judul</label>
                    <input type="text" name="judul" placeholder="Judul..." class="form-control">
                    <br>
                    <label>Tanggal</label>
                    <br>
                    <input type="date" name="tanggal" class="form-control col-md-3">
                    <br>
                    <br>
                    <br>
                    <label>Tag</label>
                    <input type="text" name="tag" placeholder="Tag..." class="form-control">
                    <br>
                    <label>Deskripsi / Isi Berita</label>
                    <textarea id="summernote" name="deskripsi" rows="12"></textarea>
                    <br>
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="1">Berita</option>
                        <option value="2">Artikel</option>
                    </select>
                    <br>
                    <label>Images</label>
                    <input type="file" name="images" placeholder="Judul..." class="form-control">
                    <div class="ln_solid"></div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>