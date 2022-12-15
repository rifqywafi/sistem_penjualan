<!doctype html>
<html lang="en">
<title>Perusahaan | Data</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-primary w-100">
            <div class="card-header bg-primary">
            <div class="font1"> <center>DATA PERUSAHAAN</center> </div>
            </div>
            <div class="card-body table-responsive">
              <a href="index.php?page=perusahaan&act=input" class="btn btn-md btn-warning" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NO.TELP</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">BERDIRI PADA</th>
                    <th scope="col">NPWP</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1;
                      $query = mysqli_query($koneksi,"SELECT * FROM perusahaan");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nama_perusahaan'] ?></td>
                      <td><?php echo $row['nomor_telp_pt'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><?php echo $row['tanggal_berdiri'] ?></td>
                      <td><?php echo $row['npwp'] ?></td>
                      <td class="text-center">
                        <a href="index.php?page=perusahaan&act=edit&id_perusahaan=<?php echo $row['id_perusahaan'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="index.php?page=perusahaan&act=hapus&id_perusahaan=<?php echo $row['id_perusahaan'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
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