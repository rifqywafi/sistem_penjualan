
<!DOCTYPE html>
<html lang="en">
<head>
<style>
  @media print {
    body * {
    visibility: hidden;
  }
  #konten, #konten * {
    visibility: visible;
  }
  #konten {
    position: absolute;
    left: 0;
    top: 0;
  }
  #buttonprint{
    display : none
  }

}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <?php
    $id_transaksi = $_GET['id_transaksi'];
    $query = mysqli_query($koneksi, "SELECT * FROM transaksi
                        INNER JOIN detailtransaksi ON detailtransaksi.id_transaksi = transaksi.id_transaksi
                        INNER JOIN member on member.id_member = transaksi.id_member
                        INNER JOIN metode_pembayaran on metode_pembayaran.id_metode_pembayaran = transaksi.id_metode_pembayaran
                        INNER JOIN kasir on kasir.id_kasir = transaksi.id_kasir
                        INNER JOIN cabang on cabang.id_cabang = kasir.id_cabang
                        INNER JOIN perusahaan on perusahaan.id_perusahaan = cabang.id_perusahaan 
                        WHERE transaksi.id_transaksi = $id_transaksi");
    $query2 = mysqli_query($koneksi,"SELECT * FROM detailtransaksi inner join transaksi on transaksi.id_transaksi=detailtransaksi.id_transaksi
    inner join barang on barang.id_barang=detailtransaksi.id_barang where detailtransaksi.id_transaksi=$id_transaksi");
    $row=mysqli_fetch_array($query);
    $total = number_format($row['total_bayar'],2,',','.');
    ?>
</head>
<body>
  <center>
    <div class="card" id="konten" style="width:35%;margin:auto;margin-top:30px;">
      <div class="card-body" style="margin:auto;">
        <h5 class="card-title"><?php echo $row['nama_perusahaan']?></h5>
        <p class="card-text"><?php echo $row['nama_cabang'] ?><br>
        <?php echo $row['alamat']?>
        No. Telp : <?php echo $row['nomor_telp']?>
        <hr>
        <?php echo $row['kode_inv']?>&nbsp; | &nbsp;
        <?php echo $row['nama_member']?>&nbsp; | &nbsp;
        <?php echo $row['nama_metode']?><br>
        Kasir : <?php echo $row['nama_kasir']?>
        <hr>
        <table cellpadding="5" id="table">
          <tr>
            <th>Nama</th>
            <th>Qty </th>
            <th>Harga(pcs) </th>
            <th>Harga Total*</th>
          </tr>
        <?php while($row2=mysqli_fetch_array($query2)){?>
          <tr>
            <td><?php echo $row2['nama_barang']?></td>
            <td><?php echo $row2['jumlah']?></td>
            <td><?php echo $row2['harga_jual']?></td>
            <td><?php echo $row2['total_harga']?></td><?php }?></p>
          </tr>
          <tr>
            <td colspan="3">Total : </td>
            <td>Rp.<?php echo $total?></td>
          </tr>
        </table>
        <hr>
        *sudah termasuk kalkulasi ppn dan diskon
        <br>
        PPN : <?php echo $row['ppn']?>%
        <br>
        Diskon :  <?php echo $row['diskon']?>%
        <hr>
        Call Center : <?php echo $row['nomor_telp_pt']?><br>
        Email : <?php echo $row['email']?>
      </div>
      <div class="btn btn-primary center" id="buttonprint" onClick="window.print();"  style="margin:auto;width:50%;margin-bottom:20px;">Print
      </div>
    </div>
  </div>
  </center>
</body>
</html>