<?php $this->load->view('partials/header_front.php') ?>
<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Jadwal Dokter</h3>
                        <p>
                            Berikut merupakan informasi jadwal dokter pada klik klinik
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
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Senin</th>
                        <th scope="col">Selasa</th>
                        <th scope="col">Rabu</th>
                        <th scope="col">Kamis</th>
                        <th scope="col">Jumat</th>
                        <th scope="col">Sabtu</th>
                        <th scope="col">Minggu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadwal_dokter as $view) { ?>
                        <tr>
                            <th><?= $view->nama ?></th>
                            <td><img src="<?= base_url('assets/img/image_team/' . $view->picture) ?>" width="200"></td>
                            <td><?= date("H:i", strtotime($view->senin)) ?> - <?= date("H:i", strtotime($view->senin2)) ?></td>
                            <td><?= date("H:i", strtotime($view->selasa)) ?> - <?= date("H:i", strtotime($view->selasa2)) ?></td>
                            <td><?= date("H:i", strtotime($view->rabu)) ?> - <?= date("H:i", strtotime($view->rabu2)) ?></td>
                            <td><?= date("H:i", strtotime($view->kamis)) ?> - <?= date("H:i", strtotime($view->kamis2)) ?></td>
                            <td><?= date("H:i", strtotime($view->jumat)) ?> - <?= date("H:i", strtotime($view->jumat2)) ?></td>
                            <td><?= date("H:i", strtotime($view->sabtu)) ?> - <?= date("H:i", strtotime($view->sabtu2)) ?></td>
                            <td><?= date("H:i", strtotime($view->minggu)) ?> - <?= date("H:i", strtotime($view->minggu2)) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php $this->load->view('partials/footer_front.php') ?>