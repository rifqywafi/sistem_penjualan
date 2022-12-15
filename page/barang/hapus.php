<?php

$id = $_GET['id_barang'];

$query = "DELETE FROM barang WHERE id_barang= '$id'";

if($koneksi->query($query)) {
    header("location: index.php?page=barang");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>