document.addEventListener("DOMContentLoaded", function () {
  var filterLinks = document.querySelectorAll(".b-isotope-filter a");
  var filterContainers = document.querySelectorAll(".filter-container");
  var omodaImage = document.querySelector(".omoda");
  var tiggoImage = document.querySelector(".tiggo");

  // Fungsi untuk menampilkan atau menyembunyikan elemen berdasarkan filter yang aktif
  function toggleFilterContainers(activeFilter) {
    filterContainers.forEach(function (container) {
      if (container.classList.contains(activeFilter)) {
        container.style.display = "flex";
      } else {
        container.style.display = "none";
      }
    });
  }

  // Set filter "omoda" sebagai filter aktif dan tampilkan kontennya saat halaman dimuat
  var activeFilter = ".omoda";
  toggleFilterContainers(activeFilter);

  // Menampilkan atau menyembunyikan gambar sesuai dengan filter yang aktif
  omodaImage.style.display = "block";
  tiggoImage.style.display = "none";

  // Tambahkan kelas "current" pada link filter "omoda"
  filterLinks.forEach(function (link) {
    if (link.getAttribute("data-filter") === activeFilter) {
      link.parentElement.classList.add("current");
    } else {
      link.parentElement.classList.remove("current");
    }
  });

  // Tangani klik pada filter
  filterLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault();

      // Menghapus kelas "current" dari semua link
      filterLinks.forEach(function (link) {
        link.parentElement.classList.remove("current");
      });

      // Menambah kelas "current" pada link yang diklik
      this.parentElement.classList.add("current");

      // Mendapatkan nilai filter yang aktif
      activeFilter = this.getAttribute("data-filter");

      // Menampilkan atau menyembunyikan elemen berdasarkan filter yang aktif
      toggleFilterContainers(activeFilter);

      // Menampilkan atau menyembunyikan gambar sesuai dengan filter yang aktif
      if (activeFilter === ".omoda") {
        omodaImage.style.display = "block";
        tiggoImage.style.display = "none";
      } else if (activeFilter === ".tiggo") {
        omodaImage.style.display = "none";
        tiggoImage.style.display = "block";
      }
    });
  });
});

function hitungKredit() {
  // Ambil nilai DP minimal dari input
  var dpMinimal = parseFloat(document.getElementById("dp").value);

  if ($(".b-isotope-filter li").attr("class") == "current") {
    var harga = $(".omoda-div select option:selected").text();
  } else {
    var harga = $(".tiggo-div select option:selected").text();
  }
  var angka = parseFloat(harga.split("-")[1]);

  let angkaDitambahNol = parseInt(angka.toString() + "000000");

  if (dpMinimal < 30) {
    alert("DP minimal harus 30% atau lebih.");
    return;
  }

  // Harga barang yang akan dihitung kreditnya
  var hargaBarang = angkaDitambahNol; // Misalnya harga barang adalah 1000

  // Hitung DP
  var dp = (dpMinimal / 100) * hargaBarang;

  // Hitung sisa harga yang harus dicicil
  var sisaHarga = hargaBarang - dp;

  // Ambil elemen tabel untuk mengisi hasil perhitungan
  var tabel = document.getElementsByTagName("table")[0];

  // Hitung angsuran, admin fee, asuransi, dan total untuk setiap tenor
  for (var i = 1; i <= 5; i++) {
    var angsuran = sisaHarga / i;
    var adminFee = 50 * i; // Misalnya admin fee adalah 50 per tenor
    var asuransi = 100 * i; // Misalnya asuransi adalah 100 per tenor
    var total = dp + angsuran * i + adminFee + asuransi;

    // Isi nilai ke dalam tabel
    tabel.rows[1].cells[i].innerText = dp.toFixed(2);
    tabel.rows[2].cells[i].innerText = angsuran.toFixed(2);
    tabel.rows[3].cells[i].innerText = adminFee.toFixed(2);
    tabel.rows[4].cells[i].innerText = asuransi.toFixed(2);
    tabel.rows[5].cells[i].innerText = total.toFixed(2);
  }

  // Tampilkan hasil perhitungan
  document.getElementById("result").style.display = "block";
}

function showImageOmoda() {
  const mobilomoda = $("#datamobilomoda").data("mobil");
  var selectBox = document.getElementById("omoda-car");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  var image = document.getElementById("car-image-omoda");
  mobilomoda.forEach((element) => {
    if (selectedValue === element.nama_mobil) {
      if (element.gambar_mobil === "") {
        image.src = "./assets/media/general/siluet.png";
        image.style.display = "block";
      } else {
        image.src =
          "https://admin.cherysamarinda.site/public/img/upload/" + element.gambar_mobil;
        image.style.display = "block";
      }
    }
  });
}

function showImageTiggo() {
  const mobiltiggo = $("#datamobiltiggo").data("mobil");
  var selectBox = document.getElementById("tiggo-car");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  var image = document.getElementById("car-image-tiggo");

  mobiltiggo.forEach((element) => {
    if (selectedValue === element.nama_mobil) {
      if (element.gambar_mobil === "") {
        image.src =
          "https://admin.cherysamarinda.site/public/img/upload/" + element.gambar_mobil;
        image.style.display = "block";
      } else {
        image.src =
          "https://admin.cherysamarinda.site/public/img/upload/" + element.gambar_mobil;
        image.style.display = "block";
      }
    }
  });
}
