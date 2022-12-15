<!DOCTYPE html>
<html lang="en">
<?php
include '../database/koneksi.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
    <title>Registrasi</title>
</head>
<body>
<div class="card mt-5" style="margin:auto;width:450px;">
  <div class="card-header text-center bg-primary" style="color:white;">
    REGISTRASI
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
    <div class="form-group">
        <label>Konfirmasi Password</label>
        <input type="password" class="form-control" name="konfirmpass" placeholder="Konfirmasi Password" required>
    </div>
    <a class="mx-3" href="login.php">Login Akun</a>
    <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
    </div>
</div>
</body>
<?php
if(isset($_POST["daftar"])){
$username=strtolower(stripslashes($_POST['username']));
$password=mysqli_real_escape_string($koneksi, $_POST['password']);
$password2=mysqli_real_escape_string($koneksi, $_POST['konfirmpass']);
$check=mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
if(mysqli_num_rows($check) == 0){
    $password=password_hash($password, PASSWORD_DEFAULT);
    $query=mysqli_query($koneksi,"INSERT INTO user(id_user, username, password) VALUES('','$username','$password')");
    echo '<script>
        alert("Akun Berhasil Dibuat");
        window.location.href="../index.php";
        </script>';
}else if(mysqli_num_rows($check) >= 0){
    echo "<script>
        alert('Akun Gagal Dibuat, Username Sudah Ada')
        </script>";
    return false;
}else{
    echo "<script>
    alert('Akun Gagal Dibuat, Terjadi Kesalahan')
    </script>";
    return false;
}

if($password !== $password2){
    echo "<script>
        alert('Password dan Konfirmasinya Tidak Sesuai')
        </script>";
    return false;
}
}
?>
</html>