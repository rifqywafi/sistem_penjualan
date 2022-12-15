<?php
session_start();
include 'database/koneksi.php';
include 'library/romawi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <title>Penjualan | Home</title>
</head>

<body>
    <?php
    $page = '';
    include 'page/layout/header.php';
    ?>
    <?php
    if(!isset($_SESSION['login'])){
        header("location:user/login.php");
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    switch ($page) {
        case 'kategori':
            include 'page/kategori/index.php';
            break;
        case 'barang':
            include 'page/barang/index.php';
            break;
        case 'supplier':
            include 'page/supplier/index.php';
            break;
        case 'perusahaan':
            include 'page/perusahaan/index.php';
            break;
        case 'member':
            include 'page/member/index.php';
            break;
        case 'kasir':
            include 'page/kasir/index.php';
            break;
        case 'metode_pembayaran':
            include 'page/metode/index.php';
            break;
        case 'transaksi':
            include 'page/transaksi/index.php';
            break;
        case 'detail':
            include 'page/detailtransaksi/index.php';
            break;
        case 'cabang':
            include 'page/cabang/index.php';
            break;
        case 'cetak':
            include 'page/cetak/index.php';
            break;                      
        default:
            include 'page/home/index.php';
            break;
    }
    ?>
    <?php
    include 'page/layout/footer.php';
    include 'page/layout/js.php';
    ?>

</body>

</html>