<?php

$id = $_GET['id_kasir'];

$query = "DELETE FROM kasir WHERE id_kasir= '$id'";

if($koneksi->query($query)) {
    header("location: index.php?page=kasir");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>