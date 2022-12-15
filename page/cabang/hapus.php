<?php

$id = $_GET['id_cabang'];

$query = "DELETE FROM cabang WHERE id_cabang= '$id'";

if($koneksi->query($query)) {
    header("location: index.php?page=cabang");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>