<?php
    $id_member      = $_POST['id_member'];
    $nama           = $_POST['nama'];
    $no_telp        = $_POST['no_telp'];
    $alamat         = $_POST['alamat'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];

$query = "UPDATE member SET nama_member = '$nama', no_telp = '$no_telp', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin' WHERE id_member = '$id_member'";

if($koneksi->query($query)) {
    header("location:index.php?page=member");
} else {
    echo "Data Gagal Diupdate!";
}

?>