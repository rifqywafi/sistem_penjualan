<?php

$id = $_GET['id_member'];

$query = "DELETE FROM member WHERE id_member= '$id'";

if($koneksi->query($query)) {
    header("location: index.php?page=member");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>