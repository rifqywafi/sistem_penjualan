<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cabang | Input</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-headerborder-dark bg-primary">
            <div class="font1"> <center>Input Cabang</center> </div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=cabang&act=simpan" method="POST">
              <div class="font2">
                <div class="form-group">
                  <input type="hidden" name="id_cabang" class="form-control">
                </div>
                
                <div class="form-group">
                  <label>ID Perusahaan</label>
                  <?php
                      $sql= "SELECT * FROM perusahaan";
                      $query=mysqli_query($koneksi,$sql);
                      $a= " ( ";
                      $b= " ) ";
                  ?>
                  <select name="id_perusahaan" class="form-control">
                  <?php while($row=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row['id_perusahaan']?>"><?php echo $row['id_perusahaan'].$a.$row['nama_perusahaan'].$b;?></option>
                  <?php }   ?>
                  </select></div>

                <div class="form-group">
                  <label for="nama">Nama Cabang</label>
                  <input type="text" class="form-control" name="nama_cabang" placeholder="Masukkan Nama Cabang" required>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Cabang" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" class="form-control" name="nomor_telp" placeholder="Masukkan Nomor Telepon Cabang" required>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Masukkan Email Cabang" required>
                </div><br>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                <button type="button" onclick="location.href='index.php?page=cabang'" class="btn btn-primary">LIHAT DATA</button>

              </form>
            <</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
