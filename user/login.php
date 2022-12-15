<?php
include '../database/koneksi.php';
session_start();
if(isset($_SESSION['login'])){
  header("location:../index.php");
  exit;
}
if(isset($_POST["login"])){
$username=$_POST['username'];
$password=$_POST['password'];

$check=mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
if(mysqli_num_rows($check) === 1){
    $row=mysqli_fetch_assoc($check);
    if(password_verify($password, $row['password'])){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $row['username'];
        header("location:../index.php");
        exit;
    }
}
$error= true;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
    <title>Login</title>
</head>
<body>
<div class="card mt-5 border-primary" style="margin:auto;width:450px;">
  <div class="card-header text-center bg-primary" style="color:white;">
    LOGIN
  </div>
  <div class="card-body">
    <form action="" method="POST">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
    </div>
    <?php if (isset($error)) : ?>
    <div style="color:red;margin-bottom:15px;">
    Username atau Password Salah
    </div>
    <?php endif; ?>
    <a class="mx-3" href="registrasi.php">Daftar Akun</a>
    <button type="submit" name="login" class=" btn btn-primary">Login</button>
    </div>
</div>
</body>
</html>