<?php 

  session_start();
  $_SESSION = [];
  session_unset();
  session_destroy();

  setcookie('ID', '', time() - 3600);
  setcookie('Key', '', time() - 3600);

  header("Location: login.php");
  exit;

?>