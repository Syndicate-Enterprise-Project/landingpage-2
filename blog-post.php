<?php
require('logic/config.php');
if (isset($_GET['id'])) {
    $result = $conn->query("SELECT * FROM blogpost WHERE ID_blog = '{$_GET['id']}'");
} else {
    $result = $conn->query("SELECT * FROM blogpost");
}
$blog = [];
while ($row = mysqli_fetch_assoc($result)) {
    $blog[] = $row;
}
require('template/header.php');
?>

<div class="container" style="margin-top: 10rem;">
    <div class="row">
        <?php if (count($blog)) : ?>
            <div class="col-md-12">
                <main class="l-main-content">
                    <article class="b-post b-post-full clearfix">
                        <div class="entry-media">
                            <a class="js-zoom-images" href="https://admin.cherysamarinda.site/public/img/upload/<?= $blog[0]['gambar_blog']; ?>">
                                <img class="img-responsive" src="https://admin.cherysamarinda.site/public/img/upload/<?= $blog[0]['gambar_blog']; ?>" alt="Foto" />
                            </a>
                        </div>
                        <div class="entry-main">
                            <div class="entry-meta">
                                <div class="entry-meta_group-left"><span class="entry-metaitem"><a class="entry-metalink" href="blog.php"></a></span><span class="entry-metaitem"><a class="entry-meta_link" href="blog.php"> 22 April 2024 </a></span>
                                    <span class="entry-meta__categorie bg-primary" style="max-width: 25%;"><?= $blog[0]['kategori_blog']; ?></span>
                                </div>
                            </div>
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="blog-post.php"><?= $blog[0]['judul_blog']; ?></a></h2>
                            </div>
                            <div class="entry-content">
                                <p><?= $blog[0]['isi_blog'] ?></p>
                            </div>
                        </div>
                    </article>
                </main>
                <!-- end .l-main-content-->
            </div>
        <?php endif; ?>
    </div>
</div>


<?php
require('template/footer.php');
?>
