<?php
require('logic/config.php');
$result = $conn->query("SELECT * FROM mobil WHERE nama_mobil LIKE '%tiggo%'");
$dataTiggo = [];
while ($row = mysqli_fetch_assoc($result)) {
  $dataTiggo[] = $row;
}
$result = $conn->query("SELECT * FROM mobil WHERE nama_mobil LIKE '%omoda%'");
$dataOmoda = [];
while ($row = mysqli_fetch_assoc($result)) {
  $dataOmoda[] = $row;
}

require('template/header.php');
?>

<section class="" style="margin-bottom: 10rem; margin-top: 15rem;">
  <div class="">
  </div>
  <div class="b-isotope">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul class="b-isotope-filter list-inline">
            <li class="current"><a href="" data-filter="*">semua</a>
            </li>
            <li><a data-filter=".omoda">omoda</a>
            </li>
            <li><a data-filter=".tiggo">tiggo</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <ul class="b-isotope-grid grid list-unstyled" style="margin-left: 16%;">
      <li class="grid-sizer"></li>
      <?php foreach ($dataOmoda as $mobil) : ?>
        <li class="grid-item omoda">
          <div class="container">
            <div class="card text-center" style="width: 25rem; margin-bottom: 5%;">
              <img src="https://admin.cherysamarinda.site/public/img/upload/<?= $mobil['gambar_mobil']; ?>" class="card-img-top" alt="Placeholder Image">
              <div class="card-body">
                <h5 class="card-title mb-5"><?= $mobil['nama_mobil']; ?></h5>
                <a href="detailmobil.php?id=<?= $mobil['ID_mobil']; ?>" class="btn btn-primary">Lihat Detail</a>
              </div>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
      <?php foreach ($dataTiggo as $mobil) : ?>
        <li class="grid-item tiggo">
          <div class="container">
            <div class="card text-center" style="width: 25rem; margin-bottom: 5%;">
              <img src="https://admin.cherysamarinda.site/public/img/upload/<?= $mobil['gambar_mobil']; ?>" class="card-img-top" alt="Placeholder Image">
              <div class="card-body">
                <h5 class="card-title mb-5"><?= $mobil['nama_mobil']; ?></h5>
                <a href="detailmobil.php?id=<?= $mobil['ID_mobil']; ?>" class="btn btn-primary">Lihat Detail</a>
              </div>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <!-- end .b-isotope-->
  </section>
        <!-- Footer -->
        <footer class="footer area-bg" style="display: block; background-color: black;">
            <div class="area-bg__inner">
                <div class="footer__main">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="footer-section">
                                    <a class="footer__logo" href="home.html">
                                        <img class="img-responsive" src="assets/media/general/logo.png" alt="Logo" />
                                    </a>
                                    <div class="footer__info">
                                        Chery Hayyu Pratama adalah Authorized dealer mobil Chery di Kalimantan Timur yang saat ini ada di Samarinda dan Balikpapan. Melayani penjualan dan dukungan layanan purna jual. 
                                        Jika anda membutuhkan informasi apapun terkait mobil Chery, silakan berbicara dengan sales consultant kami.
                                    </div>
                                    <ul class="social-net list-inline">
                                        <li class="social-net__item"><a  class="social-net__link text-primary_h" target="_blank" href="https://www.facebook.com/Hayyu-Chery-Samarinda"><i class="fa-brands fa-facebook" style="font-size: 2.5rem;"></i></a>
                                        </li>
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" target="_blank" href="https://wa.me/6285250839520"><i class="fa-brands fa-whatsapp" style="font-size: 2.5rem;"></i></a>
                                        </li>
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" target="_blank" href="https://www.instagram.com/chery.samarinda/"><i class="fa-brands fa-instagram" style="font-size: 2.5rem;"></i></a>
                                        </li>
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" target="_blank" href="https://youtube.com/@cherysamarinda?si=m2kZnvgGSoNyCaoq"><i class="fa-brands fa-youtube-play" style="font-size: 2.5rem;"></i></a>
                                        </li>
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" target="_blank" href="https://www.tiktok.com/@chery.samarinda"><i class="fa-brands fa-tiktok" style="font-size: 2.5rem;"></i></a>
                                        </li>
                                    </ul>
                                    <!-- end .social-list-->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <section class="footer-section footer-section_list-columns">
                                    
                                </section>
                            </div>
                            <div class="col-md-2">
                                <section class="footer-section footer-section_list-one">
                                    </ul>
                                </section>
                            </div>
                            <div class="col-md-3">
                                <section class="footer-section">
                                    <h3 class="footer-section__title ui-title-inner">Informasi</h3>
                                    <div class="footer-contact footer-contact_lg"><span class="text-primary"></span>
                                    </div>
                                    <div class="footer-contact"><i class="icon icon-lg fa-solid fa-phone"></i>+ 6285250839520</div>
                                    <div class="footer-contact"><i class="icon icon-lg fa fa-envelope-o"></i>cherysamarinda@gmail.com</div>
                                    <div class="footer-contact"><i class="icon icon-lg fa fa-location-dot"></i>Jl. Wahid Hasyim 1 No. 40 RT. 010 Kel. Sempaja Selatan, Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75117</div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                Copyrights 2024<a class="copyright__brand" href="home.html">
                                Chery Samarinda</a> All Rights Reserved
                            </div>
                        </div>
                    </div>
                </div><span class="btn-up" id="toTop">TOP</span>
            </div>
        </footer>
        <!-- .footer-->
    </div>
    
    <script src="assets/js/model.js"></script>
    <script src="assets/libs/jquery-1.12.4.min.js"></script>
    <script src="assets/libs/jquery-migrate-1.2.1.js"></script>
    <!-- Bootstrap-->
    <script src="assets/libs/bootstrap/bootstrap.min.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>
    <!-- Headers scripts-->
    <script src="assets/plugins/headers/slidebar.js"></script>
    <script src="assets/plugins/headers/header.js"></script>
    <!-- Color scheme-->
    <script src="assets/plugins/switcher/js/dmss.js"></script>
    <!-- Select customization & Color scheme-->
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!-- Slider-->
    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- Pop-up window-->
    <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Mail scripts-->
    <script src="assets/plugins/jqBootstrapValidation.js"></script>
    <script src="assets/plugins/contact_me.js"></script>
    <!-- Filter and sorting images-->
    <script src="assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/plugins/isotope/imagesLoaded.js"></script>
    <!-- Progress numbers-->
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/plugins/rendro-easy-pie-chart/waypoints.min.js"></script>
    <!-- NoUiSlider-->
    <script src="assets/plugins/noUiSlider/nouislider.min.js"></script>
    <script src="assets/plugins/noUiSlider/wNumb.js"></script>
    <!-- Animations-->
    <script src="assets/plugins/scrollreveal/scrollreveal.min.js"></script>
    <!-- Main slider-->
    <script src="assets/plugins/slider-pro/jquery.sliderPro.min.js"></script>
</body>