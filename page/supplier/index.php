
<?php
    $act = '';
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'input':
            include 'input.php';
            break;
        case 'simpan':
            include 'simpan.php';
            break;
        case 'edit':
            include 'edit.php';
            break;
        case 'update':
            include 'update.php';
            break;
        case 'hapus':
            include 'hapus.php';
            break;            
        default:
            include 'view.php';
            break;
    }
?>