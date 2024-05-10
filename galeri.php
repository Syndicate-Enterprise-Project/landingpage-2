<?php
require('logic/config.php');
$result = $conn->query("SELECT foto from galeri WHERE foto != '-'");
$dataFoto = [];
while ($row = mysqli_fetch_assoc($result)) {
  $dataFoto[] = $row['foto'];
}
$result = $conn->query("SELECT video from galeri WHERE video != '-'");
$dataVideo = [];
while ($row = mysqli_fetch_assoc($result)) {
  $dataVideo[] = $row['video'];
}

require('template/header.php');
?>                 
    <section class="section-isotope">
    <!-- Control buttons -->
    <div class="" style="margin-bottom: 2%;">
        <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="b-isotope-filter list-inline">
                    <li id="fotoFilter" class="current" onclick="filterSelection(this, 'foto')"><a>Foto</a></li>
                    <li onclick="filterSelection(this, 'video-chery')"><a>Video</a></li>
                </ul>
            </div>
        </div>
        </div>
    </div>

    <!-- The filterable elements -->
    <div class="container">
        <ul class="b-isotope-grid grid list-unstyled">
            <li class="grid-sizer"></li>
            <div class="galeri-foto-chery" style="justify-content: center; align-items: center; display: flex;">
                <div class="grid-container">
                    <?php
                    foreach ($dataFoto as $foto) { 
                        echo '<li class="grid-item-galeri filterDiv foto">';
                        echo '<img src="https://admin.cherysamarinda.site/public/img/upload/' . $foto . '" class="card-img-top" alt="Placeholder Image>"';
                        echo '</li>';
                    }
                    ?>
                
                </div>
            </div>
    
            <div class="galeri-video-chery" style="justify-content: center; align-items: center; display: flex;">
                <div class="daftar-video-chery" style="display: flex; flex-direction: column; margin-inline: 18%;">
                    <?php
                    foreach ($dataVideo as $video) {
                        echo '<li class="grid-item-galeri filterDiv video-chery">';
                        echo '<iframe class="iframe-chery" src="' . $video . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                        echo '</li>';
                    }
                    ?>
                </div>
            </div>
        </ul>
    </div>

    <script>
                // Function to set 'current' class on load
                document.addEventListener("DOMContentLoaded", function() {
            // Trigger click event on fotoFilter element
            document.getElementById('fotoFilter').click();
        });

        function filterSelection(element, c) {
            // Update 'current' class
            var lis = document.querySelectorAll('.b-isotope-filter li');
            for (var i = 0; i < lis.length; i++) {
                lis[i].classList.remove("current");
            }
            element.classList.add("current");

            // Filter elements
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        // Show filtered elements
        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        // Hide elements that are not selected
        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }
    </script>
</section>

<?php require('template/footer.php'); ?>
