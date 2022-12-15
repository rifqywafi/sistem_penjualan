<?php
    $id_supplier    = $_POST['id_supplier'];
    $nama           = $_POST['nama'];
    $no_hp          = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];
    $no_rekening    = $_POST['no_rekening'];

$query = "UPDATE supplier SET nama_supplier = '$nama', no_hp = '$no_hp', alamat = '$alamat', no_rekening = '$no_rekening' WHERE id_supplier = '$id_supplier'";

if($koneksi->query($query)) {
    header("location:index.php?page=supplier");
} else {
    echo "Data Gagal Diupate!";
}

?>