<?php
session_start();
if (isset($_SESSION['flash'])) {
    $flashdata = $_SESSION['flash'];
    unset($_SESSION['flash']);
} else {
    $flashdata = null;
}
?>
<div class="flash-data" data-flashdata="<?= htmlspecialchars(json_encode($flashdata)); ?>"></div>

<?php
require('template/header.php')
?>

<section class="section-default" style="margin-top: 10%;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <h2 class="ui-title-block">Layanan Kami</h2>
                    <div class="ui-subtitle-block">Temukan Layanan Terbaik untuk Kendaraan Anda</div>
                    <div class="ui-decor"></div>
                </div>
            </div>
        </div>
        <div class="wrap-inl-bl">
            <div class="row">
                <div class="col-md-4">
                    <section class="b-advantages-4"><i class="b-advantages-4__icon flaticon-voltage"></i>
                        <h3 class="b-advantages-4__title">Pekerjaan Listrik</h3>
                        <div class="b-advantages-4__info">Chery Indonesia menyediakan layanan pekerjaan listrik untuk memastikan sistem listrik kendaraan Anda berfungsi dengan baik.</div><span class="ui-decor-2"></span>
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-4"><i class="b-advantages-4__icon flaticon-screwdriver-and-wrench"></i>
                        <h3 class="b-advantages-4__title">Perbaikan Umum</h3>
                        <div class="b-advantages-4__info">Chery Indonesia menyediakan layanan perbaikan umum untuk memperbaiki masalah umum pada kendaraan Anda.</div><span class="ui-decor-2"></span>
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-4"><i class="b-advantages-4__icon flaticon-transmision"></i>
                        <h3 class="b-advantages-4__title">Pengecekan Rem</h3>
                        <div class="b-advantages-4__info">Chery Indonesia menyediakan layanan pengecekan rem untuk memastikan rem kendaraan Anda berfungsi dengan baik dan aman.</div><span class="ui-decor-2"></span>
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-4"><i class="b-advantages-4__icon flaticon-gears"></i>
                        <h3 class="b-advantages-4__title">Perbaikan Suspensi</h3>
                        <div class="b-advantages-4__info">Chery Indonesia menyediakan layanan perbaikan suspensi untuk memastikan kenyamanan dan kestabilan berkendara.</div><span class="ui-decor-2"></span>
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-4"><i class="b-advantages-4__icon flaticon-oil"></i>
                        <h3 class="b-advantages-4__title">Penggantian Oli Mobil</h3>
                        <div class="b-advantages-4__info">Chery Indonesia menyediakan layanan penggantian oli mobil untuk menjaga kesehatan mesin kendaraan Anda.</div><span class="ui-decor-2"></span>
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-4"><i class="b-advantages-4__icon flaticon-wheel-and-manometer"></i>
                        <h3 class="b-advantages-4__title">Pengimbangan Ban</h3>
                        <div class="b-advantages-4__info">Chery Indonesia menyediakan layanan pengimbangan ban untuk memastikan kestabilan dan keamanan berkendara Anda.</div><span class="ui-decor-2"></span>
                    </section>
                    <!-- end .b-advantages-->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end .section-default-->

<div class="section-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="section-type-1">
                    <h2 class="ui-title-block-2">Pesan Jadwal Servis</h2>
                    <div class="ui-subtitle-block">Jadwalkan Layanan Servis Kendaraan Anda Sekarang</div>
                    <div class="ui-decor"></div>
                    <div id="success"></div>
                    <form class="b-form-checkup ui-form-3" enctype="multipart/form-data" id="contactForm" action="./logic/servis.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="user-name" type="text" name="user-name" placeholder="Nama" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="user-phone" type="tel" name="user-phone" placeholder="Nomor Telepon" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="user-email" type="email" name="user-email" placeholder="Email" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="date">
                                    <!-- <input class="form-control" type="date" id="datetimepicker" required /> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <select class="selectpicker" data-width="100%" name="servis">
                                        <option selected>Pilih Jenis Servis</option>
                                        <option value="Servis Reguler">Servis Reguler</option>
                                        <option value="Kelistrikan">Kelistrikan</option>
                                        <option value="Pengecekan Rem">Pengecekan Rem</option>
                                        <option value="Perbaikan Suspensi">Perbaikan Suspensi</option>
                                        <option value="Penggantian Oli">Penggantian Oli</option>
                                        <option value="Pengimbangan Ban">Pengimbangan Ban</option>
                                    </select>
                                </div>
                                <textarea class="form-control" id="user-message" rows="6" placeholder="Pesan" name="pesan" required></textarea>
                                <button type="submit" name="send" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                    <!-- end .b-form-checkup-->
                </section>
            </div>
        </div>
    </div>
</div>
<!-- end .section-area-->
<?php
require('template/footer.php')
?>