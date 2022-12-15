<?php
    $id_perusahaan  = $_POST['id_perusahaan'];
    $nama           = $_POST['nama_perusahaan'];
    $nomor_telp     = $_POST['nomor_telp'];
    $email          = $_POST['email'];
    $tanggal_berdiri= $_POST['tanggal_berdiri'];
    $npwp           = $_POST['npwp'];

$query = "UPDATE perusahaan SET nama_perusahaan = '$nama', nomor_telp_pt = '$nomor_telp', email = '$email', tanggal_berdiri = '$tanggal_berdiri', npwp = '$npwp' WHERE id_perusahaan = '$id_perusahaan'";

if($koneksi->query($query)) {
    header("location:index.php?page=perusahaan");
} else {
    echo "Data Gagal Diupate!";
}

?>