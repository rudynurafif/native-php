<?php
  session_start();

  // cek tidak ada session login
  if( !isset($_SESSION['Login']) ) {
    header("Location: login.php");
    exit;
  }

  // menghubungkan file index dgn file function
  require 'functions.php';

  // pagination
  // konfigurasi
  $jumlahDataPerHalaman = 5;
  $jumlahData = count(query("SELECT * FROM handphones"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman; // awalData = index datanya

  // menjalankan fungsi query ke table di database, hasilnya simpan kedalam variabel
  $handphones = query("SELECT * FROM handphones LIMIT $awalData, $jumlahDataPerHalaman");

  // ketika tombol cari diklik
  if(isset($_POST['cari'])) {
    $handphones = cari($_POST['keyword']);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <title>Halaman Admin</title>

  <style>
    #container {
      width: 100%;
      overflow: auto;
    }
    .table {
      vertical-align: middle;
    }
  </style>

</head>
<body>
  <nav class="navbar navbar-primary bg-primary">
    <div class="container">
      <span class="navbar-brand mb-0 h1 text-light">Daftar Handphone</span>
      <a href="logout.php" class="position-absolute top-50 end-0 translate-middle-y badge bg-danger mt-2 me-2" style="text-decoration: none;">Logout</a>
    </div>
  </nav>

  <div class="container">
    <a href="tambah.php" class="btn btn-primary tombolTambahData mt-4">Tambah Data Handphone</a>

    <form action="" method="post" class="d-flex col-4 mt-4 mb-4">
      <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off" id="keyword" class="form-control me-2">
      <button type="submit" name="cari" id="tombol-cari">Search</button>
    </form>
  </div>

  <div id="container">
    <div class="container">
      <div class="row">
        <div class="col">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Aksi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Produsen</th>
                <th scope="col">OS</th>
                <th scope="col">Harga</th>
              </tr>
            </thead>

            <tbody>
              <?php $i = 1 ?>
              <?php foreach ($handphones as $row) : ?>
                <tr>
                  <td><?= $i + $awalData; ?></td>
                  <td>
                    <a href="ubah.php?id=<?= $row['ID']; ?>" class="badge bg-warning text-light" style="text-decoration: none;">Ubah</a> 
                    <a href="hapus.php?id=<?= $row['ID']; ?>" onclick="return confirm('Yakin ingin menghapus data handphone ini?');" class="badge bg-danger" style="text-decoration: none;">Hapus</a>
                  </td>
                  <td><img src="img/<?= $row['Gambar']; ?>" alt="" width="75px"></td>
                  <td><?= $row['Nama']; ?></td>
                  <td><?= $row['Produsen']; ?></td>
                  <td><?= $row['OS']; ?></td>
                  <td><?= $row['Harga']; ?></td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <br>
  
  <!-- NAVIGASI -->
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

      <?php if($halamanAktif > 1) : ?>
        <li class="page-item">
          <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
      <?php endif; ?>

      <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
          <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
        <?php else : ?>
          <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if($halamanAktif < $jumlahHalaman) : ?>
        <li class="page-item">
          <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      <?php endif; ?>

    </ul>
  </nav>

</body>
</html>