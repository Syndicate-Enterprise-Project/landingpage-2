<?php
require('logic/config.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM mobil WHERE ID_mobil = $id");
    $data = mysqli_fetch_assoc($result);
} else {
    header("Location: mobil.php");
}

require('template/header.php')
?>

<main class="l-main-content" style="margin-top: 10%;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="b-car-details">
                    <div class="b-car-details__header">
                        <h2 class="b-car-details__title"><?= $data['nama_mobil']; ?></h2>
                        <!-- <div class="b-car-details__subtitle">AWD 430i xSmart Drive Coupe</div> -->
                        <!-- <div class="b-car-details__address"><i class="icon fa fa-map-marker text-primary"></i> 13165 N Auto Show Ave Surprise, AZ 85388</div> -->
                    </div>
                    <div class="slider-car-details slider-pro" id="slider-car-details">
                        <div class="sp-slides">
                            <div class="sp-slide" style="padding-left:20%;">
                                <img class="sp-image-2" src="https://admin.cherysamarinda.site/public/img/upload/<?= $data['gambar_mobil']; ?>" alt="img" style="height: 100%; width: auto;" />
                            </div>
                            <div class="sp-slide" style="padding-left:20%;" >
                                <img class="sp-image-2" src="https://admin.cherysamarinda.site/public/img/upload/<?= $data['gambar_interior']; ?>" alt="img" style="height: 100%; width: auto;"/>
                            </div>
                            <div class="sp-slide" style="padding-left:20%;">
                                <img class="sp-image-2" src="https://admin.cherysamarinda.site/public/img/upload/<?= $data['gambar_eksterior']; ?>" alt="img" style="height: 100%; width: auto;"/>
                            </div>
                        </div>
                        <div class="sp-thumbnails">
                            <div class="sp-thumbnail" style="padding-left:15%;">
                                <img class="img-responsive" src="https://admin.cherysamarinda.site/public/img/upload/<?= $data['gambar_mobil']; ?>"  alt="img" style="height: 100%; width: auto;"/>
                            </div>
                            <div class="sp-thumbnail" style="padding-left:15%;">
                                <img class="img-responsive" src="https://admin.cherysamarinda.site/public/img/upload/<?= $data['gambar_interior']; ?>"  alt="img" style="height: 100%; width: auto;" />
                            </div>
                            <div class="sp-thumbnail" style="padding-left:15%;">
                                <img class="img-responsive" src="https://admin.cherysamarinda.site/public/img/upload/<?= $data['gambar_eksterior']; ?>"  alt="img" style="height: 100%; width: auto;"/>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <aside class="l-sidebar-2">
                    <div class="b-car-info">
                        <div class="b-car-info__price"><span class="b-car-info__price-msrp">Mulai </span>Rp<?= intval(substr($data['harga_mobil'], 0, -6)); ?>JT
                        </div>
                        <dl class="b-car-info__desc dl-horizontal bg-grey">
                            <dt class="b-car-info__desc-dt">Tipe Kendaraan</dt>
                            <dd class="b-car-info__desc-dd"><?= $data['tipe_mobil']; ?></dd>
                            <dt class="b-car-info__desc-dt">Tahun</dt>
                            <dd class="b-car-info__desc-dd"><?= $data['tahun_mobil']; ?></dd>
                            <dt class="b-car-info__desc-dt">Mesin</dt>
                            <dd class="b-car-info__desc-dd"><?= $data['mesin_mobil']; ?></dd>
                            <dt class="b-car-info__desc-dt">Transmisi</dt>
                            <dd class="b-car-info__desc-dd"><?= $data['transmisi_mobil']; ?></dd>
                            <dt class="b-car-info__desc-dt">Tenaga</dt>
                            <dd class="b-car-info__desc-dd"><?= $data['tenaga_mobil']; ?></dd>
                            <dt class="b-car-info__desc-dt">Bahan Bakar</dt>
                            <dd class="b-car-info__desc-dd"><?= $data['bb_mobil']; ?></dd>
                            <dt class="b-car-info__desc-dt">Penggerak</dt>
                            <dd class="b-car-info__desc-dd"><?= $data['penggerak_mobil']; ?></dd>
                            <dt class="b-car-info__desc-dt">Warna</dt>
                            <dd class="b-car-info__desc-dd"><?= $data['warna_mobil']; ?></dd>
                        </dl>
                        <!-- end .b-banner-->
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- end .b-car-details-->
</main>
<!-- end .l-main-content-->
<?php
require('template/footer.php')
?>