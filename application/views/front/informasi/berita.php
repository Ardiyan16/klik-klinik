<?php $this->load->view('partials/header_front.php') ?>

<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Berita</h3>
                        <p>
                            Berisikan berita terbaru tentang Klik Klinik
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
                    <li class="active">Berita</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span8">
                <!-- start article 1 -->
                <?php foreach ($article as $view) { ?>
                    <article class="blog-post">
                        <div class="post-heading">
                            <h3><a href="<?= base_url('Front/full_page_artikel/' . $view->id) ?>"><?= $view->judul ?></a></h3>
                        </div>
                        <div class="row">
                            <div class="span3">
                                <div class="post-image">
                                    <a href=""><img src="<?= base_url('assets/img/image_berita/' . $view->images) ?>" alt="" /></a>
                                </div>
                            </div>
                            <div class="span5">
                                <ul class="post-meta">
                                    <li class="first"><i class="icon-calendar"></i><span><?= date('d F, Y', strtotime($view->tanggal)) ?></span></li>
                                    <li><i class="icon-edit"></i><span><a href="#"><?= $view->penulis ?></a></span></li>
                                    <li class="last"><i class="icon-tags"></i><span><?= $view->tag ?></span></li>
                                </ul>
                                <div class="clearfix">
                                </div>
                                <p>
                                    <?= substr($view->deskripsi, strpos($view->deskripsi, ">") + 1, 200); ?>...
                                </p>
                                <a href="<?= base_url('Front/full_page_artikel/' . $view->id) ?>" class="btn btn-small btn-success" type="button">Selengkapnya</a>
                            </div>
                        </div>
                    </article>
                <?php } ?>
                <!-- end article 1 -->

                <?php echo $this->pagination->create_links(); ?>
            </div>
            <div class="span4">
                <aside>
                    <div class="widget">
                        <h4>Berita terbaru</h4>
                        <ul class="recent-posts">
                            <?php foreach ($berita as $view) { ?>
                                <li><a href="#"><?= $view->judul ?></a>
                                    <div class="clear">
                                    </div>
                                    <span class="date"><i class="icon-calendar"></i><?= date('d F, Y', strtotime($view->tanggal)) ?></span>
                                    <span class="comment"><i class="icon-edit"></i><?= $view->penulis ?></span>
                                </li>
                                <hr>
                            <?php } ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('partials/footer_front.php') ?>