<?php 
  $id = $_GET['id_member'];
  
  $query = "SELECT * FROM member WHERE id_member = $id";

  $result = mysqli_query($koneksi, $query);

  $row = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Member | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT MEMBER</center></div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=member&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_member" value="<?php echo $row['id_member'] ?>" required>
                </div>

                <div class="form-group">
                  <label>Nama Member</label>
                  <input type="text" name="nama" value="<?php echo $row['nama_member'] ?>" placeholder="Masukkan Nama Member" class="form-control" required>
                </div>
                
                <div class="form-group">
                  <label>No Telepon</label>
                  <input type="text" name="no_telp" value="<?php echo $row['no_telp'] ?>" placeholder="Masukkan No Telp Member" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" placeholder="Masukkan Alamat Member" class="form-control" required>
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
                <button type="button" onclick="location.href='index.php?page=member'" class="btn btn-primary">LIHAT DATA</button>

              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>