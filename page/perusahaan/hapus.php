<?php


$id = $_GET['id_perusahaan'];

$query = "DELETE FROM perusahaan WHERE id_perusahaan= '$id'";

if($koneksi->query($query)) {
    header("location: index.php?page=perusahaan");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>