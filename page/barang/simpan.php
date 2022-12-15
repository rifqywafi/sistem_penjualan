<?php
$id_barang          = $_POST['id_barang'];
$id_supplier        = $_POST['id_supplier'];
$id_kategori        = $_POST['id_kategori'];
$nama_barang        = $_POST['nama_barang'];
$harga_modal        = $_POST['harga_modal'];
$harga_jual         = $_POST['harga_jual'];
$stock              = $_POST['stock'];
$tanggal_masuk      = $_POST['tanggal_masuk'];
$harga_jual_str     = preg_replace("/[^0-9]/", "", $harga_jual);
$harga_jual_int     = (int) $harga_jual_str;
$harga_modal_str     = preg_replace("/[^0-9]/", "", $harga_modal);
$harga_modal_int     = (int) $harga_modal_str;


$query = "INSERT INTO barang (id_barang, id_supplier, nama_barang, id_kategori, harga_modal, harga_jual, stock, tanggal_masuk)
        VALUES ('$id_barang', '$id_supplier', '$nama_barang', '$id_kategori', '$harga_modal_str', '$harga_jual_str', '$stock', '$tanggal_masuk')";

if($koneksi->query($query)) {

    header("location: index.php?page=barang");

} else {

    echo "Data Gagal Disimpan!";

}
?>
?>