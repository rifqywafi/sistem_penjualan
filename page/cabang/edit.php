<?php 
  
  $id = $_GET['id_cabang'];
  
  $query = "SELECT * FROM cabang WHERE id_cabang = $id";

  $result = mysqli_query($koneksi, $query);

  $row1 = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cabang | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT CABANG</center></div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=cabang&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_cabang" value="<?php echo $row1['id_cabang'] ?>" required>
                </div>

                <div class="form-group">
                  <label>ID Perusahaan</label>
                  <?php
                      $sql= "SELECT * FROM perusahaan";
                      $query=mysqli_query($koneksi,$sql);
                      $a=" ( ";
                      $b=" ) ";
                  ?>
                  <select name="id_perusahaan" class="form-control">
                  <?php while($row2=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row2['id_perusahaan']?>"><?php echo $row2['id_perusahaan'].$a.$row2['nama_perusahaan'].$b;?></option>
                  <?php }   ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Nama Cabang</label>
                  <input type="text" name="nama" value="<?php echo $row1['nama_cabang'] ?>" placeholder="Masukkan Nama Cabang" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $row1['alamat'] ?>" placeholder="Masukkan Alamat Cabang" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" name="nomor_telp" value="<?php echo $row1['nomor_telp'] ?>" placeholder="Masukkan Nomor Telepon Cabang" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" value="<?php echo $row1['email_cabang'] ?>" placeholder="Masukkan Email Cabang" class="form-control" required>
                </div><br>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <button type="button" onclick="location.href='index.php?page=cabang'" class="btn btn-primary">LIHAT DATA</button>

              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>