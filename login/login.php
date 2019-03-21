<?php
session_start();
include '../connect.php';
$username = $_POST['Username'];
$password = $_POST['password'];

if ($username == "" || $password == "")
{
  header ("location: form-login.php");
}
else {
  $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($connect,$query);

  $num = mysqli_num_rows($result);
if ($num == 1)
  {
    header ("location: ../t_guru/read.php");
    $_SESSION['user'] = $username;
  }
  else {
    	echo "<script>alert('Masukkann ID Anda dengan benar !');location.href='form-login.php';</script>";
  }
}
 ?>
