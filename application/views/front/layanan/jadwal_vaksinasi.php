<?php $this->load->view('partials/header_front.php') ?>
<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Jadwal Vaksinasi</h3>
                        <p>
                            Berikut merupakan informasi jadwal vaksinasi pada klik klinik
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb notop">
                    <li><a href="<?= base_url('Front') ?>">Home</a><span class="divider">/</span></li>
                    <li class="active">Layanan<span class="divider"> /</span></li>
                    <li class="active">Jadwal Dokter</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Perihal</th>
                        <th scope="col">Janis Vaksin</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Poster</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadwal_vaksin as $view) { ?>
                        <tr>
                            <th><?= $view->judul ?></th>
                            <td><?= $view->jenis_vaksin ?></td>
                            <td><?= date("d-m-Y", strtotime($view->tanggal)) ?></td>
                            <td><?= date("H:i", strtotime($view->jam_mulai)) ?> - <?= date("H:i", strtotime($view->jam_selesai)) ?></td>
                            <td>
                                <a href="#view_image<?= $view->id ?>" data-toggle="modal" title="lihat poster" class="btn btn-mini btn-primary" style="color: white;"><i class="icon-picture"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Modal -->
<?php foreach($view_image as $view) { ?>
<div class="modal fade" id="view_image<?= $view->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Large Image</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?= base_url('assets/img/image_all/' . $view->images) ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php $this->load->view('partials/footer_front.php') ?>