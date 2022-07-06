<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="widget">
                    <h5>Menu pages</h5>
                    <ul class="regular">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Pelayanan</a></li>
                        <li><a href="#">Informasi</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="#">Daftar Online</a></li>
                    </ul>
                </div>
            </div>
            <div class="span3">
                <div class="widget">
                    <h5>Artikel Terbaru</h5>
                    <ul class="regular">
                        <?php foreach ($artikel as $view) { ?>
                            <li><a href="<?= base_url('Front/full_page_artikel/' . $view->id) ?>"><?= $view->judul ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="span3">
                <div class="widget">
                    <h5>Berita Terbaru</h5>
                    <ul class="regular">
                        <?php foreach ($berita as $view) { ?>
                            <li><a href="<?= base_url('Front/full_page_artikel/' . $view->id) ?>"><?= $view->judul ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="span3">
                <div class="widget">
                    <!-- logo -->
                    <a class="brand logo" href="index.html">
                        <img src="<?= base_url() ?>assets/img/logo-klik-klinik.png" height="100" width="200" alt="">
                    </a>
                    <!-- end logo -->
                    <address>
                        <strong>Klik Klinik</strong><br>
                        Jl Darmokali No 67<br>
                        Surabaya, Jawa Timur<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="verybottom">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <p>
                        &copy; Serenity - All right reserved
                    </p>
                </div>
                <div class="span6">
                    <div class="credits">
                        <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Serenity
              -->
                        Designed by <a href="https://bootstrapmade.com/"> BootstrapMade</a> Website by Bikea Tech 2022
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript Library Files -->
<script src="<?= base_url() ?>assets/front/assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/jquery.easing.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/google-code-prettify/prettify.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/modernizr.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/jquery.elastislide.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/sequence/sequence.jquery-min.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/sequence/setting.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/jquery.prettyPhoto.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/application.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/jquery.flexslider.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/hover/jquery-hover-effect.js"></script>
<script src="<?= base_url() ?>assets/front/assets/js/hover/setting.js"></script>

<!-- Template Custom JavaScript File -->
<script src="<?= base_url() ?>assets/front/assets/js/custom.js"></script>

</body>

</html>