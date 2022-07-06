<?php $this->load->view('partials/header_front.php') ?>

<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Full Page</h3>
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
                    <li class="active">Berita & Artikel <span class="divider">/</span></li>
                    <li class="active"><?= $view->judul ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span8">
                <!-- start article full post -->
                <article class="blog-post">
                    <div class="post-heading">
                        <h3><a href="#"><?= $view->judul ?></a></h3>
                    </div>
                    <div class="clearfix">
                    </div>
                    <img src="<?= base_url('assets/img/image_berita/' . $view->images) ?>" alt="" />
                    <ul class="post-meta">
                        <li class="first"><i class="icon-calendar"></i><span><?= date('d F, Y', strtotime($view->tanggal)) ?></span></li>
                        <li><i class="icon-edit"></i><span><a href="#"><?= $view->penulis ?></a></span></li>
                        <li class="last"><i class="icon-tags"></i><span><?= $view->tag ?></span></li>
                    </ul>
                    <div class="clearfix">
                    </div>
                    <p>
                        <?= $view->deskripsi ?>
                    </p>
                </article>
                <!-- end article full post -->
                <h4>Comments</h4>
                <ul class="media-list">
                    <li class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="assets/img/small-avatar.png" alt="" />
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading"><a href="#">John doe</a></h5>
                            <span>3 March, 2013</span>
                            <p>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                            </p>
                        </div>
                    </li>
                </ul>
                <div class="comment-post">
                    <h4>Leave a comment</h4>
                    <form action="#" method="post" class="comment-form" name="comment-form">
                        <div class="row">
                            <div class="span3">
                                <label>Name <span>*</span></label>
                                <input type="text" class="input-block-level" placeholder="Your name" />
                            </div>
                            <div class="span3">
                                <label>Email <span>*</span></label>
                                <input type="text" class="input-block-level" placeholder="Your email" />
                            </div>
                            <div class="span6">
                                <label>URL</label>
                                <input type="text" class="input-block-level" placeholder="Your website url" />
                            </div>
                            <div class="span8">
                                <label>Comment <span>*</span></label>
                                <textarea rows="9" class="input-block-level" placeholder="Your comment"></textarea>
                                <button class="btn btn-small btn-success" type="submit">Submit comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="span4">
                <aside>
                    <div class="widget">
                        <h4>Artikel Terbaru</h4>
                        <ul class="recent-posts">
                            <?php foreach ($artikel as $view) { ?>
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
                    <div class="widget">
                        <h4>Berita Terbaru</h4>
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