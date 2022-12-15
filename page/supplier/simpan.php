<?php
$id_supplier = $_POST['id_supplier'];
$nama        = $_POST['nama'];
$no_hp       = $_POST['no_hp'];
$alamat      = $_POST['alamat'];
$no_rekening = $_POST['no_rekening'];

$query = "INSERT INTO supplier (id_supplier, nama_supplier, no_hp, alamat, no_rekening) VALUES ('$id_supplier', '$nama', '$no_hp', '$alamat', '$no_rekening')";

if($koneksi->query($query)) {

    header("location: index.php?page=supplier");

} else {

    echo "Data Gagal Disimpan!";

}

?>