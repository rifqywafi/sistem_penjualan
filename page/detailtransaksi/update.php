<?php
$id_detail           = $_POST['id_detail'];
$id_transaksi        = $_POST['id_transaksi'];
$id_barang           = $_POST['id_barang'];
$jumlah              = $_POST['jumlah'];
?>
<script>
var id_detail = '<?php echo $id_detail?>';
</script>
<?php
$sql2=mysqli_query($koneksi, "SELECT harga_jual from barang where id_barang='$id_barang'");

$harga=mysqli_fetch_array($sql2);

$harga_jual=$harga['harga_jual'];

$total_harga=$harga_jual * $jumlah;

$query = 

$sql2 = mysqli_query($koneksi,"SELECT * FROM detailtransaksi WHERE id_transaksi='$id_transaksi' AND id_barang='$id_barang'");
if(mysqli_num_rows($sql2) == 0){
        $sql = mysqli_query($koneksi,"UPDATE detailtransaksi SET id_transaksi = '$id_transaksi', id_barang = '$id_barang',
        jumlah = '$jumlah', total_harga = '$total_harga', harga_jual = '$harga_jual' WHERE id_detail = '$id_detail'");
        header("location:index.php?page=detail&id_transaksi=$id_transaksi");
}else if(mysqli_num_rows($sql2) >= 1){
        echo '<script>
        alert("Barang Sudah Ada, Silahkan Ubah ke Barang Lain ");
        window.location.href="index.php?page=detail&act=edit&id_detail="+ id_detail;
        </script>';
}

?>