<?php 

  $id = $_GET['id_kasir'];
  
  $query = "SELECT * FROM kasir WHERE id_kasir = $id";

  $result = mysqli_query($koneksi, $query);

  $row = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kasir | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT KASIR</center></div>
            </div>
            <div class="card-body">
              <form action="index.php?page=kasir&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_kasir" value="<?php echo $row['id_kasir'] ?>" required>
                </div>

                <div class="form-group">
                  <label>ID Cabang</label>
                  <?php
                      $sql= "SELECT * FROM cabang";
                      $query=mysqli_query($koneksi,$sql);
                      $a=" ( ";
                      $b=" ) ";
                  ?>
                  <select name="id_cabang" class="form-control">
                  <?php while($row2=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row2['id_cabang']?>" <?php if($row2['id_cabang'] == $row['id_cabang']){ echo 'selected'; } ?>><?php echo $row2['id_cabang'].$a.$row2['nama_cabang'].$b;?></option>
                  <?php }   ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Nama Kasir</label>
                  <input type="text" name="nama_kasir" value="<?php echo $row['nama_kasir'] ?>" placeholder="Masukkan Nama Kasir" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $row['alamat_kasir'] ?>" placeholder="Masukkan Alamat Kasir" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" name="nomor_telp" value="<?php echo $row['nomor_telp'] ?>" placeholder="Masukkan Nomor Telepon Kasir" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin" required>
                  <option value="Laki-Laki" <?php if($row['jenis_kelamin'] == 'Laki-Laki'){ echo 'selected'; } ?>>Laki-Laki</option>
                  <option value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option>
                  </select>
                </div><br>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <button type="button" onclick="location.href='index.php?page=kasir'" class="btn btn-primary">LIHAT DATA</button>

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