<?php
$id_cabang     = $_POST['id_cabang'];
$id_perusahaan = $_POST['id_perusahaan'];
$nama          = $_POST['nama_cabang'];
$nomor_telp    = $_POST['nomor_telp'];
$alamat        = $_POST['alamat'];
$email         = $_POST['email'];

$query = "INSERT INTO cabang (id_cabang, id_perusahaan, nama_cabang, alamat, nomor_telp, email_cabang) VALUES ('$id_cabang', '$id_perusahaan', '$nama', '$alamat', '$nomor_telp', '$email')";
if($koneksi->query($query)) {
    header("location: index.php?page=cabang");

} else {

    echo "Data Gagal Disimpan!";

}

?>