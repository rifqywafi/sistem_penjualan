<?php
$id_detail           = $_POST['id_detail'];
$id_transaksi        = $_POST['id_transaksi'];
$id_barang           = $_POST['id_barang'];
$jumlah              = $_POST['jumlah'];
$persen              = 100;
?>
<script>
var id_transaksi = '<?php echo $id_transaksi?>';
</script>
<?php
$sql2=mysqli_query($koneksi, "SELECT harga_jual from barang where id_barang='$id_barang'");

$harga=mysqli_fetch_array($sql2);

$harga_jual=$harga['harga_jual'];

$total_harga=$harga_jual * $jumlah; 

$sql2 = mysqli_query($koneksi,"SELECT * FROM detailtransaksi WHERE id_transaksi='$id_transaksi' AND id_barang='$id_barang'");
if(mysqli_num_rows($sql2) == 0){
        $sql = mysqli_query($koneksi,"INSERT INTO detailtransaksi (id_detail, id_transaksi, id_barang, jumlah, total_harga, harga_jual)
        VALUES ('$id_detail', '$id_transaksi', '$id_barang', '$jumlah', '$total_harga', '$harga_jual')");
        header("location:index.php?page=detail&id_transaksi=$id_transaksi");
}else if(mysqli_num_rows($sql2) >= 1){
        echo '<script>
        alert("Barang Sudah Ada, Tidak Bisa Ditambah Lagi, Jika Ingin Mengubah Jumlahnya, Silahkan Ubah di Halaman View");
        window.location.href="index.php?page=detail&id_transaksi="+ id_transaksi;
        </script>';
}
?>