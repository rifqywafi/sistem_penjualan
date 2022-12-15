<?php

$id = $_GET['id_metode_pembayaran'];

$query = "DELETE FROM metode_pembayaran WHERE id_metode_pembayaran= '$id'";

if($koneksi->query($query)) {
    header("location: index.php?page=metode_pembayaran");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>