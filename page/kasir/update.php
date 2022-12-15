<?php
    $id_kasir       = $_POST['id_kasir'];
    $id_cabang      = $_POST['id_cabang'];
    $nama           = $_POST['nama_kasir'];
    $alamat         = $_POST['alamat'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $nomor_telp     = $_POST['nomor_telp'];

$query = "UPDATE kasir SET id_cabang = '$id_cabang', nama_kasir = '$nama', alamat_kasir = '$alamat', jenis_kelamin = '$jenis_kelamin', nomor_telp = '$nomor_telp'  WHERE id_kasir = '$id_kasir'";

if($koneksi->query($query)) {
    header("location:index.php?page=kasir");
} else {
    echo "Data Gagal Diupdate!";
}

?>