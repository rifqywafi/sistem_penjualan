<?php
$id_transaksi        = $_POST['id_transaksi'];
$id_kasir            = $_POST['id_kasir'];
$id_member           = $_POST['id_member'];
$id_metode           = $_POST['id_metode_pembayaran'];
$nama_pembeli        = $_POST['nama_pembeli'];
$status              = $_POST['status'];
$tanggal             = date('d');
$tanggal_romawi      = tanggal($tanggal);
$bulan               = date('n');
$bulan_romawi        = bulan($bulan);
$tahun               = date('y');
$tahun_romawi        = tahun($tahun);
$query               = mysqli_query($koneksi,"SHOW TABLE STATUS LIKE 'transaksi'");
$row                 = mysqli_fetch_array($query);
$getid               = $row["Auto_increment"];
$slash               = "/";
$kode_inv            = $getid.$slash.$id_kasir.$slash.$id_metode.$slash.$id_member.$slash.$tanggal_romawi.$slash.$bulan_romawi.$slash.$tahun_romawi;
$diskon              = $_POST['diskon'];
$kode_inv            = $_POST['kode_inv'];
$diskon              = $_POST['diskon'];
$ppn                 = $_POST['ppn'];

$query = "UPDATE transaksi SET id_kasir = '$id_kasir', id_member = '$id_member', id_metode_pembayaran = '$id_metode', nama_pembeli = '$nama_pembeli', kode_inv = '$kode_inv', diskon = '$diskon', ppn = '$ppn', status = '$status' WHERE id_transaksi = '$id_transaksi'";

if($koneksi->query($query)) {
    header("location:index.php?page=transaksi");
} else {
    echo "Data Gagal Diupate!";
}

?>