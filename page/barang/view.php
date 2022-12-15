<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barang | Data</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-primary w-100">
            <div class="card-header bg-primary">
            <div class="font1"> <center>DATA BARANG</center> </div>
            </div>
            <div class="card-body table-responsive">
              <a href="index.php?page=barang&act=input" class="btn btn-md btn-warning" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA_BARANG</th>
                    <th scope="col">NAMA KATEGORI</th>
                    <th scope="col">NAMA SUPPLIER</th>
                    <th scope="col">HARGA MODAL</th>
                    <th scope="col">HARGA JUAL</th>
                    <th scope="col">STOK</th>
                    <th scope="col">TANGGAL MASUK</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1;
                      $query = mysqli_query($koneksi,"SELECT * FROM barang inner join kategori on kategori.id_kategori=barang.id_kategori inner join supplier on supplier.id_supplier=barang.id_supplier");
                      while($row = mysqli_fetch_array($query)){
                  ?>
                  <?php
                  $harga_jual=$row['harga_jual'];
                  $harga_modal=$row['harga_modal'];
                  $result1 = number_format($harga_jual,2,',','.');
                  $result2 = number_format($harga_modal,2,',','.');
                  ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nama_barang'] ?></td>
                      <td><?php echo $row['nama_kategori'] ?></td>
                      <td><?php echo $row['nama_supplier'] ?></td>
                      <td>Rp.<?php echo $result2 ?></td>
                      <td>Rp.<?php echo $result1 ?></td>
                      <td><?php echo $row['stock'] ?></td>
                      <td><?php echo $row['tanggal_masuk'] ?></td>
                      <td class="text-center">
                        <a href="index.php?page=barang&act=edit&id_barang=<?php echo $row['id_barang'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="index.php?page=barang&act=hapusid_barang=<?php echo $row['id_barang'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
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
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>