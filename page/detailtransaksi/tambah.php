<?php
$id_detail = $_GET['id_detail'];
$id_barang = $_GET['id_barang'];
$jumlah = $_POST['jumlah'];

$sql2=mysqli_query($koneksi, "SELECT harga_jual from barang where id_barang='$id_barang'");
$harga=mysqli_fetch_array($sql2);
$harga_jual=$harga['harga_jual'];
$total_harga=$harga_jual * $jumlah;

$query = "UPDATE detailtransaksi SET jumlah = '$jumlah', total_harga = '$total_harga' WHERE id_detail = '$id_detail'";

$sql= mysqli_query($koneksi,'SELECT id_transaksi FROM detailtransaksi WHERE id_detail = "'.$id_detail.'"');
$data=mysqli_fetch_array($sql);
$id_transaksi=$data['id_transaksi'];

if($koneksi->query($query)) {
    header("location:index.php?page=detail&id_transaksi=$id_transaksi");
} else {
    echo "Data Gagal Diupate!";
}

?>