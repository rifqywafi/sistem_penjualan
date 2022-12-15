<?php
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
$ppn                 = $_POST['ppn'];
$total_bayar         = $_POST['total_bayar'];
$harga_str           = preg_replace("/[^0-9]/", "", $total_bayar);
$harga_int           = (int) $harga_str;

$query = "INSERT INTO transaksi (id_transaksi, id_kasir, id_member, id_metode_pembayaran, nama_pembeli, kode_inv, diskon, ppn, total_bayar, status)
        VALUES ('$id_transaksi', '$id_kasir', '$id_member', '$id_metode', '$nama_pembeli', '$kode_inv', '$diskon', '$ppn', '$harga_int', '$status')";
if($koneksi->query($query)) {

    header("location: index.php?page=transaksi");

} else {

    echo "Data Gagal Disimpan!";

}

?>