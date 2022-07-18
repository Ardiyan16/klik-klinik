<?php $this->load->view('partials/header_user.php') ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Layanan <?= $view->nama_poli ?></h3>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>From Pendaftaran Online</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="<?= base_url('User/save_pendaftaran') ?>" enctype="multipart/form-data">
                        <label>Kode Pendaftaran</label>
                        <?php
                        $date = date('dmY');
                        $no_random = rand(10, 1000);
                        ?>
                        <input type="text" name="kd_pendaftaran" value="KK-<?= $date ?>-<?= $no_random ?>" placeholder="Judul..." readonly class="form-control">
                        <br>
                        <label>Tanggal</label>
                        <br>
                        <?php $tgl = date('Y-m-d'); ?>
                        <input type="date" value="<?= $tgl ?>" readonly name="tgl_pendaftaran" class="form-control col-md-3">
                        <br>
                        <br>
                        <br>
                        <label>Poli Dipilih</label>
                        <input type="text" value="<?= $view->nama_poli ?>" readonly name="tag" placeholder="Tag..." class="form-control">
                        <input type="hidden" value="<?= $this->session->userdata('id') ?>" readonly name="id_users" placeholder="Tag..." class="form-control">
                        <input type="hidden" value="<?= $view->id ?>" name="id_poli" placeholder="Tag..." class="form-control">
                        <br>
                        <label>Gejala</label>
                        <textarea name="gejala" class="form-control mb-3" rows="3"></textarea>
                        <br>
                        <div class="ln_solid"></div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if ($this->session->flashdata('sudah_daftar')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Anda Sudah Mendaftar!',
            text: 'selesaikan pendaftaran anda sebelumnya',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>