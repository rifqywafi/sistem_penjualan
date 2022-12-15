<?php
$id_perusahaan   = $_POST['id_perusahaan'];
$nama            = $_POST['nama'];
$nomor_telp      = $_POST['nomor_telp'];
$email           = $_POST['email'];
$tanggal_berdiri = $_POST['tanggal_berdiri'];
$npwp            = $_POST['npwp'];

$query = "INSERT INTO perusahaan (id_perusahaan, nama_perusahaan, nomor_telp_pt, email, tanggal_berdiri, npwp) VALUES ('$id_perusahaan', '$nama', '$nomor_telp', '$email', '$tanggal_berdiri', $npwp)";

if($koneksi->query($query)) {

    header("location: index.php?page=perusahaan");

} else {

    echo "Data Gagal Disimpan!";

}

?>