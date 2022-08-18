<?php 
  require 'functions.php';

  if(isset($_POST['register'])) {
    if(registrasi($_POST) > 0) {
      echo "<script>
              alert('Registrasi berhasil!');
            </script>";
    } else {
      echo mysqli_error($conn);
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Registrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    label {
      display: block;
    }
  </style>
</head>
<body>
  
  <nav class="navbar navbar-primary bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-light">Halaman Registrasi</span>
    </div>
  </nav>

  <form action="" method="post" class="container-md border border-5 mt-4 col-10">
    <div class="mb-3">
      <label for='username' class="form-label">Username :</label>
      <input type='text' class="form-control" name='username' id='username'>
    </div>
    <div class="mb-3">
      <label for='password' class="form-label">Password :</label>
      <input type='password' class="form-control" name='password' id='password'>
    </div>
    <div class="mb-3">
      <label for='password2' class="form-label">Konfirmasi Password :</label>
      <input type='password' class="form-control" name='password2' id='password2' placeholder="tuliskan password sekali lagi..">
    </div>
    <div class="mb-3">
      <button type="submit" name="register" class="btn btn-primary">Register</button>
    </div>
    <p>Kembali ke halaman <a href="login.php">login</a></p>
  </form>


</body>
</html>