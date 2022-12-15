<?php

$id = $_GET['id_detail'];

$query = "DELETE FROM detailtransaksi WHERE id_detail= '$id'";
$sql = mysqli_query($koneksi,"SELECT id_transaksi FROM detailtransaksi WHERE id_detail='$id'");
$fetch = mysqli_fetch_array($sql);
$id_transaksi = $fetch['id_transaksi'];

if($koneksi->query($query)) {
    header("location:index.php?page=detail&id_transaksi=$id_transaksi");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>