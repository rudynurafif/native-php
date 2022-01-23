$(document).ready(function() { // sama denganjQuery(document) -> untuk jQuery mengambil document misalnya

  //hilangkan tombol cari
  $('#tombol-cari').hide();

  // membuat event ketika keyword ditulis
  $('#keyword').on('keyup', function() {
    $('#container').load('ajax/handphones.php?keyword=' + $('#keyword').val());
  });
}) 