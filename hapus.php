<?php 
  session_start();

  // cek tidak ada session login
  if(!isset($_SESSION['Login'])) {
    header("Location: login.php");
    exit;
  }

  require 'functions.php';

  $id = $_GET["id"];

  if( hapus($id) > 0 ) {
    echo "<script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
          alert('Data Gagak Dihapus!');
          document.location.href = 'index.php';
        </script>";
  }

?>