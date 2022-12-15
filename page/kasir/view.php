<!doctype html>
<title>Kasir | Data</title>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kasir | Data</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-primary w-100">
            <div class="card-header bg-primary">
            <div class="font1"> <center>DATA KASIR</center> </div>
            </div>
            <div class="card-body table-responsive">
              <a href="index.php?page=kasir&act=input" class="btn btn-md btn-warning" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA CABANG</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">NO.TELP</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1;
                      $query = mysqli_query($koneksi,"SELECT * FROM kasir inner join cabang on cabang.id_cabang=kasir.id_cabang");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nama_cabang'] ?></td>
                      <td><?php echo $row['nama_kasir'] ?></td>
                      <td><?php echo $row['alamat_kasir'] ?></td>
                      <td><?php echo $row['jenis_kelamin'] ?></td>
                      <td><?php echo $row['nomor_telp'] ?></td>
                      <td class="text-center">
                        <a href="index.php?page=kasir&act=edit&id_kasir=<?php echo $row['id_kasir'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="index.php?page=kasir&act=hapus&id_kasir=<?php echo $row['id_kasir'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
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