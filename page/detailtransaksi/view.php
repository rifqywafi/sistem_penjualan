<!doctype html>
<html lang="en">
<title>Transaksi | Data</title>
<head>
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  </head>

  <body>
    <?php
    $id = $_GET['id_transaksi'];
    ?>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-primary w-100">
            <div class="card-header bg-primary">
            <div class="font1"> <center>DETAIL TRANSAKSI</center> </div>
            </div>
            <div class="card-body table-responsive">
              <a href="index.php?page=detail&act=input&id_transaksi=<?php echo $id ?> " class="btn btn-md btn-warning" style="margin-bottom: 10px">TAMBAH DATA</a>
              <a href="index.php?page=transaksi" class="btn btn-md btn-warning" style="margin-bottom: 10px">LIHAT TRANSAKSI</a>
              <table class="table table-bordered" id="myTable">
                <div class="font2">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">KODE INVOICE</th>
                    <th scope="col">NAMA BARANG</th>
                    <th scope="col">JUMLAH</th>
                    <th scope="col">PPN</th>
                    <th scope="col">DISKON</th>
                    <th scope="col">HARGA JUAL</th>
                    <th scope="col">TOTAL HARGA</th>
                    <th scope="col">WAKTU TRANSAKSI</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $no=1;
                      $query = mysqli_query($koneksi,"SELECT *,DATE_FORMAT(waktu_transaksi,'%W, %d/%M/%Y %H:%i') AS waktu FROM detailtransaksi inner join transaksi on transaksi.id_transaksi=detailtransaksi.id_transaksi
                                inner join barang on barang.id_barang=detailtransaksi.id_barang where detailtransaksi.id_transaksi=$id");
                      while($row = mysqli_fetch_array($query)){
                  ?>
                  <?php
                  $harga_jual=$row['harga_jual'];
                  $total_harga=$row['total_harga'];
                  $result1 = number_format($harga_jual,2,',','.');
                  $result2 = number_format($total_harga,2,',','.');
                  ?> 
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['kode_inv'] ?></td>
                      <td><?php echo $row['nama_barang'] ?>
                      
                      </td>
                      <td><form method="POST" action="index.php?page=detail&act=tambah&id_detail=<?php echo $row['id_detail']?>&id_barang=<?php echo $row['id_barang']?>">
                      <input type="number" name="jumlah" style="border:none;outline:none;width:75px;height:45px;" value="<?php echo $row['jumlah']?>">
                      <button type="submit" style="width:75px;" class="btn btn-primary">UBAH</button></form>
                      </td>
                      <td><?php echo $row['ppn'] ?>%</td>
                      <td><?php echo $row['diskon'] ?>%</td>
                      <td>Rp.<?php echo $result1 ?></td>
                      <td>Rp.<?php echo $result2 ?></td>
                      <td><?php echo $row['waktu'] ?></td>
                      <td class="text-center">
                      <a href="index.php?page=detail&act=edit&id_detail=<?php echo $row['id_detail'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                      <a href="index.php?page=detail&act=hapus&id_detail=<?php echo $row['id_detail'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                      </td>
                  </tr>
                <?php } ?>
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
    <script type="text/javascript" src="libs/jquery.latest.js"></script>
		<script type="text/javascript" src="libs/jquery.maskMoney.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>