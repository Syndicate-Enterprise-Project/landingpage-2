$(function () {
  const flashdata = $(".flash-data").data("flashdata");
  if (flashdata) {
    Swal.fire({
      title: flashdata.title,
      text: flashdata.pesan,
      icon: flashdata.icon,
    });
  }
});
