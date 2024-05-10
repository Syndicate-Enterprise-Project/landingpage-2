<?php
require("logic/config.php");
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
?>

<?php
require('template/header.php')
?>


<div id="datamobiltiggo" data-mobil="<?= htmlspecialchars(json_encode($dataTiggo)) ?>"></div>
<div id="datamobilomoda" data-mobil="<?= htmlspecialchars(json_encode($dataOmoda)) ?>"></div>
<section class="">
    <div class="section-isotope__header bg-grey">
        <div class="container" style="min-height: 100vh;">
            <div class="car-selection">
                <div class="container">
                    <div class="row">
                        <div class="col-4 car-selection" style="margin-top: 10%;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="b-isotope-filter list-inline">
                                        <li class="current"><a href="" data-filter=".omoda">omoda</a>
                                        </li>
                                        <li><a href="" data-filter=".tiggo">tiggo</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="b-isotope-grid grid list-unstyled">
                                <!-- <li class="grid-sizer" style="margin: 25px;"></li> -->
                                <li class="omoda">
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <img class="omoda" id="car-image-omoda" src="./assets/media/general/chery-all-varian.jpg" alt="Mobil" style="width: 50%; margin-bottom: 5%;">
                                    </div>
                                    <div style="display: flex; flex-wrap: wrap;">
                                        <div class="omoda-div" style="flex: 1; margin-right: 10px;">
                                            <select id="omoda-car" class="form-control" style="width: 100%;" onchange="showImageOmoda()">
                                                <option value="">Pilih Varian</option>
                                                <?php
                                                $namaMobilArray = [];
                                                foreach ($dataOmoda as $omoda) :
                                                    if (!in_array($omoda['nama_mobil'], $namaMobilArray)) {
                                                        $namaMobilArray[] = $omoda['nama_mobil'];
                                                ?>
                                                        <option value="<?= $omoda['nama_mobil']; ?>"><?= $omoda['nama_mobil']; ?> - <?= number_format(intval($omoda['harga_mobil'])); ?></option>
                                                <?php
                                                    }
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="warna-div" style="flex: 1;">
                                            <select id="warna" class="form-control" style="width: 100%;">
                                                <option value="">Pilih Warna</option>
                                                <?php
                                                $warnaMobil = [];
                                                foreach ($dataOmoda as $omoda) :
                                                    if (!in_array($omoda['warna_mobil'], $warnaMobil)) {
                                                        $warnaMobil[] = $omoda['warna_mobil'];
                                                ?>
                                                        <option value="<?= $omoda['warna_mobil']; ?>"><?= $omoda['warna_mobil']; ?></option>
                                                <?php
                                                    }
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li class="tiggo">
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <img class="tiggo" id="car-image-tiggo" src="./assets/media/general/chery-all-varian.jpg" alt="Mobil" style="width: 50%; margin-bottom: 5%;">
                                    </div>
                                    <div style="display: flex; flex-wrap: wrap;">
                                        <div class="tiggo-div" style="flex: 1; margin-right: 10px;">
                                            <select id="omoda-car" class="form-control" style="width: 100%;" onchange="showImageOmoda()">
                                                <option value="">Pilih Varian</option>
                                                <?php
                                                $namaMobilArray = [];
                                                foreach ($dataTiggo as $tiggo) :
                                                    if (!in_array($tiggo['nama_mobil'], $namaMobilArray)) {
                                                        $namaMobilArray[] = $tiggo['nama_mobil'];
                                                ?>
                                                        <option value="<?= $tiggo['nama_mobil']; ?>"><?= $tiggo['nama_mobil']; ?> - <?= number_format(intval($tiggo['harga_mobil'])); ?></option>
                                                <?php
                                                    }
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="warna-div" style="flex: 1;">
                                            <select id="warna" class="form-control" style="width: 100%;">
                                                <option value="">Pilih Warna</option>
                                                <?php
                                                $warnaMobil = [];
                                                foreach ($dataTiggo as $tiggo) :
                                                    if (!in_array($tiggo['warna_mobil'], $warnaMobil)) {
                                                        $warnaMobil[] = $tiggo['warna_mobil'];
                                                ?>
                                                        <option value="<?= $tiggo['warna_mobil']; ?>"><?= $tiggo['warna_mobil']; ?></option>
                                                <?php
                                                    }
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div>
                                <div style="display: flex; align-items: center;">
                                    <!-- <label for="dp" style="margin-right: 10px;">DP:</label> -->
                                    <input type="number" id="dp" placeholder="DP Minimal 30%" class="form-control dp">
                                    <button onclick="hitungKredit()" class="btn btn-primary">Hitung Kredit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="result" style="margin-top: 5%; display: none; overflow-x: scroll;">
                <h4 class="text-center" style="margin-bottom: 2%;">Hasil Simulasi Kredit</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Tenor</th>
                            <th scope="col" class="text-center">1</th>
                            <th scope="col" class="text-center">2</th>
                            <th scope="col" class="text-center">3</th>
                            <th scope="col" class="text-center">4</th>
                            <th scope="col" class="text-center">5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center">Uang Muka</th>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">Angsuran</th>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">Admin Fee</th>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">Asuransi</th>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                            <td class="text-center">999</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- end .block-table-->
<?php
require('template/footer.php')
?>