<?php

$id = $_GET['id_kategori'];

$query = "DELETE FROM kategori WHERE id_kategori= '$id'";

if($koneksi->query($query)) {
    header("location: index.php?page=kategori");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>