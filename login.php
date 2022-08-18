<?php 
  session_start();
  require 'functions.php';

  // cek cookie
  if(isset($_COOKIE['ID']) && isset($_COOKIE['Key'])) {
    $id = $_COOKIE['ID'];
    $key = $_COOKIE['Key']; // sudah dihash atau dienkripsi

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT Username FROM user WHERE ID = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if($key === hash('sha256', $row['Username'])) {
      $_SESSION['Login'] = true;
    }
  }


  // kalau sudah ada session login
  if(isset($_SESSION['Login'])) {
    header("Location: index.php");
    exit;
  }


  if(isset($_POST['Login'])) {

    $username = $_POST['Username'];
    $password = $_POST['Password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE Username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1) {
      
      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['Password'])) {
        // set session variabel login = true, jika ada username dan password match di db
        $_SESSION['Login'] = true;

        // jika checkbox remember me diceklis
        if(isset($_POST['Remember'])) {
          // buat cookie
          setcookie('ID', $row['ID'], time()+3600);
          setcookie('Key', hash('sha256', $row['Username']), time()+3600);
        }
        
        header("Location: index.php");
        exit;
      }
    }

  $error = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Halaman Login</title>
</head>
<body>

  <nav class="navbar navbar-primary bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-light">Halaman Login</span>
    </div>
  </nav>

  <?php if(isset($error)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Username</strong> atau <strong>Password</strong> salah!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <form action="" method="post" class="container-md border border-5 mt-4 col-6">
    <div class="mb-3 mt-2">
      <label for='Username' class="form-label">Username :</label>
      <input type='text' class="form-control" name='Username' id='Username' placeholder="admin">
    </div>
    <div class="mb-3 mt-1">
      <label for='Password' class="form-label">Password :</label>
      <input type='password' class="form-control" name='Password' id='Password' placeholder="123">
    </div>
    <div class="mb-3 mt-1">
      <input type='checkbox' class="form-check-input" name='Remember' id='Remember'>
      <label for='Remember' class="form-check-label">Remember Me</label>
    </div>
    <button type="submit" name="Login" class="btn btn-primary">Login</button>
    <br><br>
    <p>Belum punya akun? Buat akun baru <a href="registrasi.php">disini</a></p>
  </form>

</body>
</html>