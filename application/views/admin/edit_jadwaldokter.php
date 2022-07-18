<!-- page content -->
<?php $this->load->view('partials/header_admin.php') ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Jadwal Dokter</h3>
            <a href="<?= base_url('Admin/jadwal_dokter') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>From Edit Jadwal Dokter</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?= base_url('Admin/update_jadwal_dokter') ?>" method="post">
                    <div class="form-group">
                        <label>Dokter</label>
                        <input type="hidden" name="id" value="<?= $edit->id ?>">
                        <select name="id_dokter" class="form-control">
                            <?php foreach ($dokter as $dok) { ?>
                                <option <?php if ($edit->id_dokter == $dok->id) {
                                        echo "selected=\"selected\"";
                                        } ?> value="<?= $dok->id ?>"><?= $dok->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mt-3">Senin</label>
                        <input type="time" value="<?= $edit->senin ?>" name="senin" placeholder="" class="form-control col-md-5 mr-4">
                        <input type="time" value="<?= $edit->senin2 ?>" name="senin2" placeholder="" class="form-control col-md-5">
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mt-3">Selasa</label>
                        <input type="time" value="<?= $edit->selasa ?>" name="selasa" placeholder="" class="form-control col-md-5 mr-4">
                        <input type="time" value="<?= $edit->selasa2 ?>" name="selasa2" placeholder="" class="form-control col-md-5">
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mt-3">Rabu</label>
                        <input type="time" value="<?= $edit->rabu ?>" name="rabu" placeholder="" class="form-control col-md-5 mr-4">
                        <input type="time" value="<?= $edit->rabu2 ?>" name="rabu2" placeholder="" class="form-control col-md-5">
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mt-3">Kamis</label>
                        <input type="time" value="<?= $edit->kamis ?>" name="kamis" placeholder="" class="form-control col-md-5 mr-4">
                        <input type="time" value="<?= $edit->kamis2 ?>" name="kamis2" placeholder="" class="form-control col-md-5">
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mt-3">Jumat</label>
                        <input type="time" value="<?= $edit->jumat ?>" name="jumat" placeholder="" class="form-control col-md-5 mr-4">
                        <input type="time" value="<?= $edit->jumat2 ?>" name="jumat2" placeholder="" class="form-control col-md-5">
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mt-3">Sabtu</label>
                        <input type="time" value="<?= $edit->sabtu ?>" name="sabtu" placeholder="" class="form-control col-md-5 mr-4">
                        <input type="time" value="<?= $edit->sabtu2 ?>" name="sabtu2" placeholder="" class="form-control col-md-5">
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mt-3">Minggu</label>
                        <input type="time" value="<?= $edit->minggu ?>" name="minggu" placeholder="" class="form-control col-md-5 mr-4">
                        <input type="time" value="<?= $edit->minggu2 ?>" name="minggu2" placeholder="" class="form-control col-md-5">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success col-md-1 mt-3"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer.php') ?>