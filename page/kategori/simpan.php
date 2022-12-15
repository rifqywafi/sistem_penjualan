<?php
$id_kategori     = $_POST['id_kategori'];
$nama            = $_POST['nama'];

$query = "INSERT INTO kategori (id_kategori, nama_kategori) VALUES ('$id_kategori', '$nama')";

if($koneksi->query($query)) {

    header("location: index.php?page=kategori");

} else {

    echo "Data Gagal Disimpan!";

}

?>