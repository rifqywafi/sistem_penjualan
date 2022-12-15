<?php
include ('../koneksi.php');
$id_member     = $_POST['id_member'];
$nama          = $_POST['nama'];
$no_telp       = $_POST['no_telp'];
$alamat        = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$query = "INSERT INTO member (id_member, nama_member, no_telp, alamat, jenis_kelamin) VALUES ('$id_member', '$nama', '$no_telp', '$alamat', '$jenis_kelamin')";

if($koneksi->query($query)) {

    header("location: index.php?page=member");

} else {

    echo "Data Gagal Disimpan!";

}

?>