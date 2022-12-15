<?php
    $id_metode      = $_POST['id_metode'];
    $nama           = $_POST['nama'];;

$query = "UPDATE metode_pembayaran SET nama_metode = '$nama' WHERE id_metode_pembayaran = '$id_metode'";

if($koneksi->query($query)) {
    header("location:index.php?page=metode_pembayaran");
} else {
    echo "Data Gagal Diupdate!";
}

?>