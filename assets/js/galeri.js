// document.addEventListener("DOMContentLoaded", function () {
//   document
//     .querySelectorAll(".grid-item-galeri.video")
//     .forEach(function (videoItem) {
//       videoItem.style.display = "none";
//     });

//   document.querySelectorAll(".b-isotope-filter a").forEach(function (link) {
//     link.addEventListener("click", function (event) {
//       event.preventDefault();
//       var filterValue = this.getAttribute("data-filter");
//       var gridItems = document.querySelectorAll(".grid-item-galeri");
//       gridItems.forEach(function (item) {
//         if (item.classList.contains(filterValue)) {
//           item.style.display = "block";
//         } else {
//           item.style.display = "none";
//         }
//       });
//     });
//   });

//   document
//     .querySelector('.b-isotope-filter a[data-filter=".video"]')
//     .addEventListener("click", function () {
//       document
//         .querySelectorAll(".grid-item-galeri.video")
//         .forEach(function (videoItem) {
//           videoItem.style.display = "block";
//         });
//     });
// });
