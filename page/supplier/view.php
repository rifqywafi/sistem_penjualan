<!doctype html>
  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"> <center>DATA SUPPLIER</center> </div>
            </div>
            <div class="card-body table-responsive">
              <a href="index.php?page=supplier&act=input" class="btn btn-md btn-warning" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NO.HP</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">NO.REK</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1;
                      $query = mysqli_query($koneksi,"SELECT * FROM supplier");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nama_supplier'] ?></td>
                      <td><?php echo $row['no_hp'] ?></td>
                      <td><?php echo $row['alamat'] ?></td>
                      <td><?php echo $row['no_rekening'] ?></td>
                      <td class="text-center">
                        <a href="index.php?page=supplier&act=edit&id_supplier=<?php echo $row['id_supplier'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="index.php?page=supplier&act=hapus&id_supplier=<?php echo $row['id_supplier'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
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

    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>