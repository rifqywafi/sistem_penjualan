<?php
    $id_cabang      = $_POST['id_cabang'];
    $id_perusahaan  = $_POST['id_perusahaan'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $nomor_telp     = $_POST['nomor_telp'];
    $email          = $_POST['email'];

$query = "UPDATE cabang SET  id_perusahaan = '$id_perusahaan', nama_cabang = '$nama', alamat = '$alamat', nomor_telp = '$nomor_telp', email_cabang = '$email' WHERE id_cabang = '$id_cabang'";

if($koneksi->query($query)) {
    header("location:index.php?page=cabang");
} else {
    echo "Data Gagal Diupdate!";
}

?>