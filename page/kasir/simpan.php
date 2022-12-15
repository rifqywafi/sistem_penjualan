<?php
$id_kasir      = $_POST['id_kasir'];
$id_cabang     = $_POST['id_cabang'];
$nama          = $_POST['nama'];
$nomor_telp    = $_POST['nomor_telp'];
$alamat        = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$query = "INSERT INTO kasir (id_kasir, id_cabang, nama_kasir, alamat_kasir, jenis_kelamin, nomor_telp) VALUES ('$id_kasir', '$id_cabang', '$nama', '$alamat', '$jenis_kelamin', '$nomor_telp')";
if($koneksi->query($query)) {
    header("location: index.php?page=kasir");

} else {

    echo "Data Gagal Disimpan!";

}

?>