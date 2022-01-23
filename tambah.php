<?php 
  session_start();

  // cek tidak ada session login
  if(!isset($_SESSION['Login'])) {
    header("Location: login.php");
    exit;
  }
  
  require 'functions.php';

  // cek apakah tombol submit sudah ditekan apa belum
  if(isset($_POST["Submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if(tambah($_POST) > 0) {
      echo "<script>
              alert('Data Berhasil Ditambahkan!');
              document.location.href = 'index.php';
            </script>";
    } else {
      echo "<script>
              alert('Data Gagal Ditambahkan!');
              document.location.href = 'index.php';
            </script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Handphone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-primary bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-light">Tambah Data Handphone Baru</span>
      <a href="index.php" class="position-absolute top-50 end-0 translate-middle-y badge bg-light text-dark mt-2 me-2" style="text-decoration: none;">Kembali</a>
    </div>
  </nav>

  <form action="" method="post" enctype="multipart/form-data" class="container-md border border-5 mt-4 col-10">
    <div class="mb-3">
      <label for="Nama" class="form-label">Nama : </label>
      <input type="text" class="form-control" name="Nama" id="Nama" required>
    </div>
    <div class="mb-3">   
      <label for="Produsen" class="form-label">Produsen : </label>
      <input type="text" class="form-control" name="Produsen" id="Produsen" required>
    </div>
    <div class="mb-3">
      <label for="OS" class="form-label">OS : </label>
      <input type="text" class="form-control" name="OS" id="OS" required>
    </div>
    <div class="mb-3">
      <label for="Harga" class="form-label">Harga : </label>
      <input type="text" class="form-control" name="Harga" id="Harga" required>
    </div>
    <div class="mb-3">
      <label for="Gambar" class="form-label">Gambar : </label>
      <input type="file" class="form-control" name="Gambar" id="Gambar">
    </div>
    <div class="mb-3" class="form-label">
      <button type="submit" class="btn btn-primary" name="Submit">Tambah Data Handphone</button>
    </div>
  </form>
</body>
</html>