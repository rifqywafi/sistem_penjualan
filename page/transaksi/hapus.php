<?php

$id = $_GET['id_transaksi'];

$query = "DELETE FROM transaksi WHERE id_transaksi= '$id'";
$query2 = mysqli_query($koneksi,"DELETE FROM detailtransaksi WHERE id_transaksi= '$id'");

if($koneksi->query($query)) {
    header("location: index.php?page=transaksi");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>