<!doctype html>
<html lang="en">
<title>Transaksi | Data</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"> <center>DATA TRANSAKSI</center> </div>
            </div>
            <div class="card-body table-responsive">
              <a href="index.php?page=transaksi&act=input" class="btn btn-md btn-warning" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <div class="font2">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">KODE INVOICE</th>
                    <th scope="col">NAMA KASIR</th>
                    <th scope="col">NAMA MEMBER</th>
                    <th scope="col">METODE BAYAR</th>
                    <th scope="col">NAMA PEMBELI</th>
                    <th scope="col">WAKTU</th>
                    <th scope="col">PPN</th>
                    <th scope="col">DISKON</th>
                    <th scope="col">TOTAL BAYAR</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $query = mysqli_query($koneksi,"SELECT * , 
                                                  DATE_FORMAT(waktu_transaksi,'%W, %d/%M/%Y %H:%i') AS waktu FROM transaksi 
                                                  inner join kasir on kasir.id_kasir=transaksi.id_kasir
                                                  inner join member on member.id_member=transaksi.id_member
                                                  inner join metode_pembayaran on metode_pembayaran.id_metode_pembayaran=transaksi.id_metode_pembayaran");
                  while($row = mysqli_fetch_array($query)){
                  $id_transaksi=$row['id_transaksi'];
                  $query2 = mysqli_query($koneksi,"SELECT SUM(total_harga) AS total FROM detailtransaksi where id_transaksi='$id_transaksi'");
                  while($row2 = mysqli_fetch_array($query2)){
                  $total_harga=$row2['total'];
                  $ppn_awal=$row['ppn'];
                  $diskon_awal=$row['diskon'];
                  $persen=100;
                      
                  $ppn_akhir=$ppn_awal / $persen;
                  $diskon_akhir=$diskon_awal / $persen;
                  $hitung_diskon=$total_harga * $diskon_akhir;
                  $harga_diskon=$total_harga - $hitung_diskon;
                  $hitung_ppn=$harga_diskon * $ppn_akhir;
                  $total_bayar=$harga_diskon + $hitung_ppn; 
                  $query3 = mysqli_query($koneksi,"UPDATE transaksi SET total_bayar = '$total_bayar' where id_transaksi = '$id_transaksi'");
                  ?>
                  <?php
                  $result1 = number_format($total_bayar,2,',','.');
                  ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['kode_inv'] ?></td>
                      <td><?php echo $row['nama_kasir'] ?></td>
                      <td><?php echo $row['nama_member']?></td>
                      <td><?php echo $row['nama_metode'] ?></td>
                      <td><?php echo $row['nama_pembeli'] ?></td>
                      <td><?php echo $row['waktu'] ?></td>
                      <td><?php echo $row['ppn'] ?>%</td>
                      <td><?php echo $row['diskon'] ?>%</td>
                      <td>Rp.<?php echo $result1 ?></td>
                      <td><?php echo $row['status'] ?></td>
                      <td class="text-center">
                      <?php if ($row['status'] === "proses"){echo '<a href="index.php?page=transaksi&act=edit&id_transaksi='.$id_transaksi.'" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="index.php?page=transaksi&act=hapus&id_transaksi='.$id_transaksi.'" class="btn btn-sm btn-danger">HAPUS</a>
                        <a href="index.php?page=detail&act=view&id_transaksi='.$id_transaksi.'" class="btn btn-sm btn-warning">DETAIL</a>';}
                        else if($row['status'] === "selesai"){echo '<a href="index.php?page=cetak&id_transaksi='.$id_transaksi.'" class="btn btn-sm btn-success">INVOICE</a>';}
                      ?>
                      
                        
                      </td>
                  </tr>

                <?php }  }  ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>