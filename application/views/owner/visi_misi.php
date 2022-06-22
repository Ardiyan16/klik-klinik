<?php $this->load->view('partials/header.php') ?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Visi & Misi</h3>
            <?php if ($count_vm == 0) {
                echo "<a href=\"create_visimisi\" class='btn btn-success'><i class='fa fa-plus-circle'></i> Tambah Visi Misi</a>";
            }
            ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-6  ">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Visi & Misi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="visi-tab" data-toggle="tab" href="#visi" role="tab" aria-controls="visi" aria-selected="true">Visi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="misi-tab" data-toggle="tab" href="#misi" role="tab" aria-controls="misi" aria-selected="false">Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="motto-tab" data-toggle="tab" href="#motto" role="tab" aria-controls="motto" aria-selected="false">Motto</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="visi" role="tabpanel" aria-labelledby="visi-tab">
                        <?= $vm->visi ?>
                    </div>
                    <div class="tab-pane fade" id="misi" role="tabpanel" aria-labelledby="misi-tab">
                        <?= $vm->misi ?>
                    </div>
                    <div class="tab-pane fade" id="motto" role="tabpanel" aria-labelledby="motto-tab">
                        <?= $vm->motto ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= base_url('Owner/edit_visimisi') ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit Visi Misi</a>
</div>
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil ditambahkan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil di update!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>