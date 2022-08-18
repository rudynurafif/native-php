<?php 

  // function ini bagian logic

  // koneksi ke database, simpan ke dalam variabel
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");

  function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }

    
  function tambah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["Nama"]);
    $produsen = htmlspecialchars($data["Produsen"]);
    $os = htmlspecialchars($data["OS"]);
    $harga = htmlspecialchars($data["Harga"]);

    // upload gambar
    $gambar = upload();
    if($gambar === false) {
      return false;
    }

    // query insert data
    $query = "INSERT INTO handphones
                VALUES
                (0, '$nama', '$produsen', '$os', '$harga', '$gambar')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }


  // Upload file gambar
  function upload() {
    $namaFile = $_FILES['Gambar']['name'];
    $ukuranFile = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpName = $_FILES['Gambar']['tmp_name'];

    // cek apakah tidak ada gambar diupload
    if ($error === 4) {
      echo "<script>
              alert('Pilih gambar terlebih dahulu!');
            </script>";
      return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
              alert('Yang Anda upload bukan gambar!');
            </script>";
      return false;
    }

    // cek jika ukuran file gambar terlalu besar
    if($ukuranFile > 2000000) {
      echo "<script>
              alert('Maksimal ukuran file adalah 2 MB');
            </script>";
      return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama baru ke db untuk menghindari nama file yg sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
  }


  function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM handphones WHERE ID = $id");

    return mysqli_affected_rows($conn);
  }


  function ubah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["ID"];
    $nama = htmlspecialchars($data["Nama"]);
    $produsen = htmlspecialchars($data["Produsen"]);
    $os = htmlspecialchars($data["OS"]);
    $harga = htmlspecialchars($data["Harga"]);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek apakah user upload gambar baru atau tidak
    if($_FILES['Gambar']['error'] === 4) {
      $gambar = $gambarLama; // kalau tidak pilih gambar baru
    } else {
      $gambar = upload(); // kalau pilih gambar baru
    }

    // query insert data
    $query = "UPDATE handphones SET
                Nama = '$nama',
                Produsen = '$produsen',
                OS = '$os',
                Harga = '$harga',
                Gambar = '$gambar'
              WHERE ID = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }


  function cari($keyword) {
    $query = "SELECT * FROM handphones
                WHERE
              Nama LIKE '%$keyword%' OR
              Produsen LIKE '%$keyword%' OR
              OS LIKE '%$keyword%' OR
              Harga LIKE '%$keyword%'
              ";
    return query($query);
  }


  function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result)) {
      echo "<script>
              alert('Username sudah terdaftar, silahkan pilih username lain');
            </script>";
      return false;
    }
    
    // cek konfirmasi password
    if($password !== $password2) {
      echo "<script>
              alert('Konfirmasi password tidak sesuai!');
            </script>";
      return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
  }

?>