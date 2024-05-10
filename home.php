<?php
session_start();
require('logic/config.php');
if (isset($_SESSION['flash'])) {
    $flashdata = $_SESSION['flash'];
    unset($_SESSION['flash']);
} else {
    $flashdata = null;
}

$result = $conn->query("SELECT * FROM blogpost");
?>

<?php

$file = 'visitor_count.json';

$today = date('Y-m-d');
$week = date('W');
$month = date('Y-m');
$year = date('Y');

$data = [];
if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
}

if (!isset($_COOKIE['visitedday'])) {
    if (!isset($data[$today])) {
        $data[$today] = 1;
    } else {
        $data[$today]++;
    }
    setcookie('visitedday', '1', time() + (24 * 60 *60), '/');
}

if (!isset($_COOKIE['visitedweek'])) {
    if (!isset($data[$week])) {
        $data[$week] = 1;
    } else {
        $data[$week]++;
    }
    setcookie('visitedweek', '1', time() + (7 * 24 * 60 * 60), '/');
}

if (!isset($_COOKIE['visitedmonth'])) {
    if (!isset($data[$month])) {
        $data[$month] = 1;
    } else {
        $data[$month]++;
    }
    setcookie('visitedmonth', '1', time() + (30 * 24 * 60 * 60), '/');
}

if (!isset($_COOKIE['visitedyear'])) {
    if (!isset($data[$year])) {
        $data[$year] = 1;
    } else {
        $data[$year]++;
    }
    setcookie('visitedyear', '1', time() + (365 * 24 * 60 * 60), '/');
}

if (date('N') == 1) { // Jika hari ini adalah Senin (1 adalah kode untuk Senin)
    $data[$week] = []; // Reset kunjungan mingguan
}
if (date('d') == 1) { // Jika hari ini adalah tanggal 1
    $data[$month] = []; // Reset kunjungan bulanan
}
if (date('m') == 1) { // Jika hari ini adalah bulan Januari
    $data[$year] = []; // Reset kunjungan tahunan
}

// Simpan kembali data kunjungan ke file
file_put_contents($file, json_encode($data));

?>

<?php
require('template/header.php');
?>

<div class="flash-data" data-flashdata="<?= htmlspecialchars(json_encode($flashdata)); ?>"></div>
<!-- Carousel -->
<div class="main-slider main-slider-1">
    <div class="slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="700px" data-slider-arrows="true" data-slider-buttons="false">
        <div class="sp-slides">
            <!-- Slide 1-->
            <div class="sp-slide">
                <img class="sp-image" src="./assets/media/general/Varian/CHERY-TIGGO-5X/Tiggo-5X.png" alt="slider" />
                <div class="main-slider__wrap sp-layer" data-width="" data-position="centerLeft" data-horizontal="62%" data-show-transition="left" data-hide-transition="left" data-show-duration="2000" data-show-delay="1200" data-hide-delay="400">
                    <div class="main-slider__title">Chery Tiggo 5x<span class="main-slider__label bg-primary">Populer</span>
                    </div>
                    <div class="main-slider__subtitle">smart drive</div><a class="main-slider__btn btn btn-white" href="model.php">Mulai<span class="main-slider__btn-price"> Rp<strong>300jt</strong></span></a><a class="main-slider__btn btn btn-primary" href="home.php#kontak">Pesan Sekarang</a>
                </div>
            </div>
            <!-- Slide 2-->
            <div class="sp-slide">
                <img class="sp-image" src="./assets/media/general/Varian/CHERY-TIGGO-8-PRO/Tiggo-8Pro.png" alt="slider" />
                <div class="main-slider__wrap sp-layer" data-width="" data-position="centerLeft" data-horizontal="62%" data-show-transition="left" data-hide-transition="left" data-show-duration="2000" data-show-delay="1200" data-hide-delay="400">
                    <div class="main-slider__title">Chery Tiggo 8 Pro<span class="main-slider__label bg-primary">Populer</span></div>
                    <div class="main-slider__subtitle">smart drive</div><a class="main-slider__btn btn btn-white" href="model.php">Mulai<span class="main-slider__btn-price"> Rp<strong>500jt</strong></span></a><a class="main-slider__btn btn btn-primary" href="home.php#kontak">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end .main-slider-->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-advantages-1">
                <section class="b-advantages-1"><i class="b-advantages-1__icon flaticon-gearbox"></i>
                    <h3 class="b-advantages-1__title">Dealer Mobil Chery Terbesar</h3>
                    <div class="b-advantages-1__info">Chery Samarinda adalah dealer mobil Chery terbesar di Indonesia. Kami menawarkan berbagai pilihan mobil Chery dengan kualitas terbaik.</div><span class="ui-decor-2"></span>
                </section>
                <!-- end .b-advantages-->
                <section class="b-advantages-1 active"><i class="b-advantages-1__icon flaticon-steering-wheel"></i>
                    <h3 class="b-advantages-1__title">Menawarkan Harga Mobil Chery yang Terjangkau</h3>
                    <div class="b-advantages-1__info">Chery Samarinda menawarkan harga mobil Chery yang terjangkau kepada pelanggan. Kami memahami pentingnya memiliki mobil berkualitas tanpa harus menguras budget.</div><span class="ui-decor-2"></span>
                </section>
                <!-- end .b-advantages-->
                <section class="b-advantages-1"><i class="b-advantages-1__icon flaticon-wrench"></i>
                    <h3 class="b-advantages-1__title">Pemeriksaan Keselamatan Multipoint</h3>
                    <div class="b-advantages-1__info">Setiap mobil Chery di Chery Samarinda melalui pemeriksaan keselamatan multipoint untuk memastikan kualitas dan keamanannya sebelum diserahkan kepada pelanggan.</div><span class="ui-decor-2"></span>
                </section>
                <!-- end .b-advantages-->
            </div>
            <!-- end .section-advantages-1-->
        </div>
    </div>

</div>
<!-- end .section-filter-->

<!-- Daftar Mobil -->
<section class="section-type-3 section-default area-bg area-bg_light">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <h2 class="ui-title-block">Daftar Mobil</h2>
                        <div class="ui-subtitle-block">Temukan Penawaran Terbaik untuk Mobil Terbaru Kami</div>
                        <div class="ui-decor"></div>
                    </div>
                    <div class="slider-thumbnail slider-pro" id="slider-thumbnail">
                        <div class="sp-slides">
                            <div class="sp-slide">
                                <img class="sp-image" src="./assets/media/general/Varian/CHERY-OMODA-E5/1.png" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="./assets/media/general/Varian/CHERY-OMODA-5-GT/Omoda 5 GT.png" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="./assets/media/general/Varian/CHERY-TIGGO-5X/Tiggo-5X.png" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="./assets/media/general/Varian/CHERY-OMODA-5/Omoda 5 (2).png" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="./assets/media/general/Varian/CHERY-TIGGO-7-PRO/Tiggo 7 Pro.png" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="./assets/media/general/Varian/CHERY-TIGGO-8-PRO/Tiggo-8Pro.png" alt="img" />
                            </div>

                        </div>
                        <div class="sp-thumbnails">
                            <div class="sp-thumbnail">
                                <div class="sp-thumbnail-text">
                                    <div class="sp-thumbnail-title">Chery Omoda E5</div>
                                    <div class="sp-thumbnail-description"><strong>Harga Rp500 jutaan</strong></div>
                                </div>
                            </div>
                            <div class="sp-thumbnail">
                                <div class="sp-thumbnail-text">
                                    <div class="sp-thumbnail-title">Chery Omoda 5 GT</div>
                                    <div class="sp-thumbnail-description"><strong>Harga Rp400 jutaan</strong></div>
                                </div>
                            </div>
                            <div class="sp-thumbnail">
                                <div class="sp-thumbnail-text">
                                    <div class="sp-thumbnail-title">Chery Tiggo 5X</div>
                                    <div class="sp-thumbnail-description"><strong>Harga Rp200 jutaan</strong></div>
                                </div>
                            </div>
                            <div class="sp-thumbnail">
                                <div class="sp-thumbnail-text">
                                    <div class="sp-thumbnail-title">Chery Omoda 5</div>
                                    <div class="sp-thumbnail-description"><strong>Harga Rp300 jutaan</strong></div>
                                </div>
                            </div>
                            <div class="sp-thumbnail">
                                <div class="sp-thumbnail-text">
                                    <div class="sp-thumbnail-title">Chery Tiggo 7 Pro</div>
                                    <div class="sp-thumbnail-description"><strong>Harga Rp400 jutaan</strong></div>
                                </div>
                            </div>
                            <div class="sp-thumbnail">
                                <div class="sp-thumbnail-text">
                                    <div class="sp-thumbnail-title">Chery Tiggo 8 Pro</div>
                                    <div class="sp-thumbnail-description"><strong>Harga Rp500 jutaan</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end .b-thumb-slider-->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end .section-default-->

<!-- Search Mobil Impian -->
<div class="info-group block-table block-table_md">
    <section class="b-info b-info_mod-a area-bg area-bg_op_80 area-bg_prim parallax" style="background-image: url(assets/media/content/bg/bg-4.jpg);">
        <div class="area-bg__inner">
            <h2 class="b-info__title ">Ingin<strong class="b-info__title_lg">Membeli mobil?</strong></h2>
            <div class="">
                Chery Samarinda adalah tempat terbaik untuk menemukan mobil impian Anda!
                Kami menyediakan berbagai pilihan mobil Chery untuk memenuhi kebutuhan Anda.
            </div>
            <a class="btn btn-white" href="model.php">Cari Mobil Impian Anda</a>
        </div>
    </section>
</div>

<!-- Section Postingan Blog -->
<section class="section-news area-bg area-bg_light area-bg_op_90 parallax" style="background-image: url(assets/media/content/bg/bg-7.jpg)">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <h2 class="ui-title-block">Blog Terbaru</h2>
                        <!-- <div class="ui-subtitle-block">Tempor incididunt labore dolore magna clium fugiat alique</div> -->
                        <div class="ui-decor"></div>
                    </div>
                    <div class="carousel-news owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <section class="b-post b-post-1 clearfix">
                                <div class="entry-media">
                                    <img class="img-responsive" src="https://admin.cherysamarinda.site/public/img/upload/<?= $row['gambar_blog']; ?>" alt="Foto" />
                                </div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <div class="entry-meta__face">
                                                <!-- <img class="img-responsive" src="assets/media/content/posts/face/76x76_3.jpg" alt="face" /> -->
                                            </div><span class="entry-meta_item"><a class="entry-metalink" href="blog.html"></a></span><a class="entry-meta_categorie" href="blog.html"><strong><?= $row['kategori_blog']; ?></strong></a>
                                        </div>
                                        <h2 class="entry-title"><a href="blog-post.html"><?php
                                            $max_length = 50;
                                            $isi_blog = $row['judul_blog'];

                                            if (strlen($isi_blog) > $max_length) {
                                                $trimmed_text = substr($isi_blog, 0, $max_length) . "...";
                                                echo $trimmed_text;
                                            } else {
                                                echo $isi_blog;
                                            }
                                            ?></a></h2>
                                    </div>
                                    <div class="entry-content">
                                        <p><?php
                                            $max_length = 250;
                                            $isi_blog = $row['isi_blog'];

                                            if (strlen($isi_blog) > $max_length) {
                                                $trimmed_text = substr($isi_blog, 0, $max_length) . "...";
                                                echo $trimmed_text;
                                            } else {
                                                echo $isi_blog;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </section>
                        <?php endwhile; ?>
                    </div>
                    <!-- end .carousel-news-->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end .section-news-->

<!-- Kunjungan -->
<div class="section-default">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="b-progress-list js-progress-list list-unstyled">
                    <li class="b-progress-list__item clearfix"><span class="b-progress-list__percent js-chart"><span class="js-percent"></span><span><?php echo $data[$today] ?></span></span><span class="b-progress-list__name">Kunjungan/Hari</span>
                    </li>
                    <li class="b-progress-list__item clearfix"><span class="b-progress-list__percent js-chart"><span class="js-percent"></span><span><?php echo $data[$week] ?></span></span><span class="b-progress-list__name">Kunjungan/Minggu</span>
                    </li>
                    <li class="b-progress-list__item clearfix"><span class="b-progress-list__percent js-chart"><span class="js-percent"></span><span><?php echo $data[$month] ?></span></span><span class="b-progress-list__name">Kunjungan/Bulan</span>
                    </li>
                    <li class="b-progress-list__item clearfix"><span class="b-progress-list__percent js-chart"><span class="js-percent"></span><span><?php echo $data[$year] ?></span></span><span class="b-progress-list__name">Kunjungan/Tahun</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Berlangganan -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="b-subscribe area-bg area-bg_prim area-bg_op_90 parallax" style="background-image: url(assets/media/components/b-subscribe/bg.jpg)">
                <div class="area-bg__inner">
                    <div class="b-subscribe__info">Dapatkan Informasi terbaru dari Chery Samarinda</div>
                    <h2 class="b-subscribe__title">Berlanggan blog terbaru kami</h2>
                    <form class="b-subscribe__form ui-form" id="subscribeForm" action="logic/berlangganan.php" method="post">
                        <div class="form-group">
                            <input name="email" class="form-control" type="text" placeholder="Masukan Email Anda ..." required="required" />
                            <button name="berlangganan" class="b-subscribe__submit"><i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end .b-subscribe-->
<div class="block-table">
    <div class="block-table__cell col-md-12">
        <div class="block-table__inner">
            <section class="section-form-contacts" style="padding-bottom: 10%;">
                <div class="section-form-contacts__label" id="kontak">Kontak</div>
                <h2 class="section-form-contacts__title">Kirim Pesan Kepada Kami</h2>
                <div class="section-form-contacts__info">
                    Jika ada pertanyaan atau permintaan informasi lebih lanjut, jangan ragu untuk menghubungi kami.
                </div>
                <div id="success"></div>
                <form action="https://api.web3forms.com/submit" method="POST">
                    <input type="hidden" name="access_key" value="db00d163-6837-4ccf-95b8-d13f97b23dbc">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                    </div>
                    <div class="text-center">
                        <div class="validate"></div>
                        <div class="error-message"></div>
                        <!-- <div class="sent-message">Your message has been sent. Thank you!</div>
                                  <div class="loading"><i class="fas fa-spinner fa-spin"></i> Loading...</div> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </section>
            <!-- end .b-form-contact-->
        </div>
    </div>
</div>

<div class="map" style="max-height: 75vh;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.691522006697!2d117.14947427395109!3d-0.4567925352799323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df6798bc5e9f58b%3A0x3a6889f52b0c0e97!2sChery%20Samarinda!5e0!3m2!1sid!2sid!4v1714355031423!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- end .block-table-->

<?php
require('template/footer.php');
?>