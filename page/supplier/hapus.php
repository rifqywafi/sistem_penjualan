<?php

$id = $_GET['id_supplier'];

$query = "DELETE FROM supplier WHERE id_supplier= '$id'";

if($koneksi->query($query)) {
    header("location: index.php?page=supplier");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>