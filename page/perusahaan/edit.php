<?php 
  
  
  $id = $_GET['id_perusahaan'];
  
  $query = "SELECT * FROM perusahaan WHERE id_perusahaan = $id";

  $result = mysqli_query($koneksi, $query);

  $row = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perusahaan | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT PERUSAHAAN</center></div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=perusahaan&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_perusahaan" value="<?php echo $row['id_perusahaan'] ?>" required>
                </div>

                <div class="form-group">
                  <label>Nama Perusahaan</label>
                  <input type="text" name="nama_perusahaan" value="<?php echo $row['nama_perusahaan'] ?>" placeholder="Masukkan Nama Perusahaan" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" name="nomor_telp" value="<?php echo $row['nomor_telp_pt'] ?>" placeholder="Masukkan No Telepon Perusahaan" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Email Perusahaan</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" placeholder="Masukkan Email Perusahaan" rows="1" required>
                </div>
                
                <div class="form-group">
                  <label>Tanggal Berdiri Perusahaan</label>
                  <input type="text" name="tanggal_berdiri" value="<?php echo $row['tanggal_berdiri'] ?>" placeholder="Masukkan Tanggal Berdiri Perusahaan" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>NPWP Perusahaan</label>
                  <input type="text" name="npwp" value="<?php echo $row['npwp'] ?>" placeholder="Masukkan NPWP Perusahaan" class="form-control" required>
                </div>
                <br>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <button type="button" onclick="location.href='index.php?page=perusahaan'" class="btn btn-primary">LIHAT DATA</button>

              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>