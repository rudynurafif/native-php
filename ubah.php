<?php 
  session_start();

  // cek tidak ada session login
  if(!isset($_SESSION['Login'])) {
    header("Location: login.php");
    exit;
  }
  
  require 'functions.php';

  // mengambil data di url
  $id = $_GET["id"];

  // query data mahasiswa berdasarkan id
  $phone = query("SELECT * FROM handphones WHERE ID = $id")[0];
  

  // cek apakah tombol ubah data sudah ditekan apa belum
  if(isset($_POST["Submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0) {
      echo "<script>
              alert('Data Berhasil Diubah!');
              document.location.href = 'index.php';
            </script>";
    } else {
      echo "<script>
              alert('Data Gagal Diubah!');
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
  <title>Ubah Data Handphone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-primary bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-light">Ubah Data Handphone</span>
      <a href="index.php" class="position-absolute top-50 end-0 translate-middle-y badge bg-light text-dark mt-2 me-2" style="text-decoration: none;">Kembali</a>
    </div>
  </nav>

  <form action="" method="post" enctype="multipart/form-data" class="container-md border border-5 mt-4 col-10">
    <input type="hidden" name="ID" value="<?= $phone["ID"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $phone["Gambar"]; ?>">
    <div class="mb-3">
      <label for="Nama" class="form-label">Nama : </label>
      <input type="text" class="form-control" name="Nama" id="Nama" required value="<?= $phone["Nama"]; ?>">
    </div>
    <div class="mb-3"> 
      <label for="Produsen" class="form-label">Produsen : </label>
      <input type="text" class="form-control" name="Produsen" id="Produsen" required value="<?= $phone["Produsen"]; ?>">
    </div>
    <div class="mb-3">
      <label for="OS" class="form-label">Sistem Operasi : </label>
      <input type="text" class="form-control" name="OS" id="OS" required value="<?= $phone["OS"]; ?>">
    </div>
    <div class="mb-3">
      <label for="Harga" class="form-label">Harga : </label>
      <input type="text" class="form-control" name="Harga" id="Harga" required value="<?= $phone["Harga"]; ?>">
    </div>
    <div class="mb-3">
      <label for="Gambar" class="form-label">Gambar : </label> <br>
      <img src="img/<?= $phone['Gambar']; ?>" alt="" width="100px"> <br>
      <input type="file" class="form-control" name="Gambar" id="Gambar">
    </div>
    <div class="mb-3" class="form-label">
      <button type="submit" name="Submit" class="btn btn-primary">Update Data</button>
    </div>
     
  </form>
</body>
</html>