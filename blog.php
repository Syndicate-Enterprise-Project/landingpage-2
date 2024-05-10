<?php
require('logic/config.php');

if (isset($_POST['search'])) {
    $keyword = $_POST['search'];
    $result = $conn->query("SELECT * FROM blogpost WHERE isi_blog LIKE '%{$keyword}%' OR judul_blog LIKE '%{$keyword}%'");
} else if (isset($_GET['kategori'])) {
    $result = $conn->query("SELECT * FROM blogpost WHERE kategori_blog = '{$_GET['kategori']}'");
} else {
    $result = $conn->query("SELECT * FROM blogpost ORDER BY terbit_blog DESC");
}
$blog = [];
while ($row = mysqli_fetch_assoc($result)) {
    $blog[] = $row;
}

if (isset($_GET['kategori'])) {
}

require('template/header.php')
?>

<div class="section-title-page area-bg area-bg_dark area-bg_op_70">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="b-title-page bg-primary_a">Blog</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end .b-title-page-->
<div class="container">
    <div class="row">
        <?php if (count($blog)) : ?>
            <div class="col-md-4">
                <aside class="l-sidebar-3">
                    <div class="widget widget-searce">
                        <form action="" method="post" class="form-sidebar" id="search-global-form">
                            <input class="form-sidebar__input form-control" name="search" type="search" placeholder="Cari Blog ..." />
                            <button type="submit" class="form-sidebar__btn"><i class="icon fa fa-search text-primary"></i>
                            </button>
                        </form>
                    </div>
                    <!-- end .widget-->
                    <section class="widget section-sidebar">
                        <h3 class="widget-title ui-title-inner">Kategori</h3>
                        <div class="widget-content">
                            <ul class="widget-list list list-mark-5">
                                <li class="widget-list_item"><a class="widget-list_link" href="blog.php?kategori=artikel">Artikel</a>
                                </li>
                                <li class="widget-list_item"><a class="widget-list_link" href="blog.php?kategori=berita">Berita</a>
                                </li>
                                <li class="widget-list_item"><a class="widget-list_link" href="blog.php?kategori=promo">Promo</a>
                                </li>
                                <li class="widget-list_item"><a class="widget-list_link" href="blog.php?kategori=review">Review</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <!-- end .widget-->
                    <section class="widget section-sidebar">
                        <h3 class="widget-title ui-title-inner">Daftar Postingan</h3>
                        <div class="widget-content">
                            <?php for ($i = 1; $i < count($blog); $i++) : ?>
                                <div class="post-widget clearfix">
                                    <div class="post-widget__media">
                                        <a href="blog-post.php?id=<?= $blog[$i]['ID_blog']; ?>">
                                            <img class="img-responsive" src="https://admin.cherysamarinda.site/public/img/upload/<?= $blog[$i]['gambar_blog']; ?>" alt="foto" />
                                        </a>
                                    </div>
                                    <div class="post-widget_inner"><a class="post-widget_title" href="blog-post.php?id=<?= $blog[$i]['ID_blog']; ?>"><?= $blog[$i]['judul_blog']; ?></a>
                                        <div class="post-widget__date">
                                            <time class="post-widget__time" datetime="2017-10-27 15:20"><?= date("j F Y", strtotime($blog[$i]['terbit_blog'])); ?></time>
                                        </div>
                                    </div>
                                    <!-- end .widget-post-->
                                </div>
                            <?php endfor; ?>
                        </div>
                    </section>
                    <!-- end .widget-->
                </aside>
                <!-- end .sidebar-->
            </div>
            <div class="col-md-8">
                <main class="l-main-content">
                    <div class="posts-group-2">
                        <section class="b-post b-post-full clearfix">
                            <div class="entry-media">
                                <a class="js-zoom-images" href="https://admin.cherysamarinda.site/public/img/upload/<?= $blog[0]['gambar_blog']; ?>">
                                    <img class="img-responsive" src="https://admin.cherysamarinda.site/public/img/upload/<?= $blog[0]['gambar_blog']; ?>" alt="Foto" />
                                </a>
                            </div>
                            <div class="entry-main">
                                <div class="entry-meta">
                                    <div class="entry-meta_group-left"><span class="entry-metaitem"><a class="entry-metalink" href="blog.php"></a></span><span class="entry-metaitem"><a class="entry-meta_link" href="blog.php"> <?= date("j F Y", strtotime($blog[0]['terbit_blog'])); ?> </a></span>
                                        <span class="entry-meta__categorie bg-primary" style="max-width: 25%;"><?= $blog[0]['kategori_blog']; ?></span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <h2 class="entry-title"><a href="blog-post.php"><?= $blog[0]['judul_blog']; ?></a></h2>
                                </div>
                                <div class="entry-content">
                                    <p><?= substr(strip_tags($blog[0]['isi_blog']), 0, 250) . " ..."; ?></p>
                                </div>
                                <div class="entry-footer"><a class="btn btn-default" href="blog-post.php?id=<?= $blog[0]['ID_blog']; ?>">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </section>
                        <!-- end .post-->
                    </div>
                </main>
                <!-- end .l-main-content-->
            </div>

        <?php endif; ?>
    </div>
</div>
<?php
require('template/footer.php')
?>
