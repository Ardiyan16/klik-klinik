<?php $this->load->view('partials/header_front.php') ?>
<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Kontak</h3>
                        <p>
                            Kontak Kami
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
                    <li><a href="#">Home</a><span class="divider">/</span></li>
                    <li class="active">Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span4">
                <aside>
                    <div class="widget">
                        <h4>Get in touch with us</h4>
                        <ul>
                            <li><label><strong>Phone : </strong></label>
                                <p>
                                    +900 888 707 123
                                </p>
                            </li>
                            <li><label><strong>Email : </strong></label>
                                <p>
                                    name@yoursite.com
                                </p>
                            </li>
                            <li><label><strong>Adress : </strong></label>
                                <p>
                                    Pasar kambing 58 Suite X.110 Peterongan Semarang, Indonesia
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h4>Social network</h4>
                        <ul class="social-links">
                            <li><a href="#" title="Twitter"><i class="icon-rounded icon-32 icon-twitter"></i></a></li>
                            <li><a href="#" title="Facebook"><i class="icon-rounded icon-32 icon-facebook"></i></a></li>
                            <li><a href="#" title="Google plus"><i class="icon-rounded icon-32 icon-google-plus"></i></a></li>
                            <li><a href="#" title="Linkedin"><i class="icon-rounded icon-32 icon-linkedin"></i></a></li>
                            <li><a href="#" title="Pinterest"><i class="icon-rounded icon-32 icon-pinterest"></i></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="span8">
                <div id="google-map" data-latitude="40.713417" data-longitude="-74.0092125"></div>

                <div class="spacer30"></div>

                <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div> -->
                <div class="row">
                    <form action="<?= base_url('Front/save_kontak') ?>" method="post">
                        <div class="span4 form-group">
                            <input type="text" name="nama" class="form-control" style="width: 100%; height: 30px;" id="name" placeholder="Nama Anda" />
                        </div>
                        <div class="span4 form-group">
                            <input type="email" class="form-control" style="width: 100%; height: 30px; margin-bottom: 20px;" name="email" id="email" placeholder="Email Anda" />
                        </div>
                        <div class="span8 form-group">
                            <input type="text" class="form-control" style="width: 100%; height: 30px; margin-bottom: 20px;" name="subjek" id="subject" placeholder="Subjek" />
                        </div>
                        <div class="span8 form-group">
                            <textarea class="form-control" style="margin-bottom:25px; font-size:13px; background:#fff; width:100%; padding-top:10px;" name="pesan" rows="5" placeholder="Pesan"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-color btn-rounded" type="submit"><i class="fa fa-paper-plane"></i> Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Pesan berhasil dikirim!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer.php') ?>
<?php $this->load->view('partials/footer_front.php') ?>