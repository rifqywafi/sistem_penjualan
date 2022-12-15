<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perusahaan | Input</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-headerborder-dark bg-primary">
            <div class="font1"> <center>Input Perusahaan</center> </div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=perusahaan&act=simpan" method="POST">
              <div class="font2">
                <div class="form-group">
                  <input type="hidden" name="id_perusahaan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Perusahaan</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Perusahaan" required>
                </div>
                
                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" class="form-control" name="nomor_telp" placeholder="Masukkan No Telepon Perusahaan"  required>
                </div>
                
                <div class="form-group">
                  <label>Email Perusahaan</label>
                  <input type="email" class="form-control" name="email" placeholder="Masukkan Email Perusahaan" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Berdiri Perusahaan</label><br>
                  <input type="date" name="tanggal_berdiri" placeholder="Masukkan Tanggal Berdiri Perusahaan"  class="form-control" required>
                </div>
                <div class="form-group">
                  <label>NPWP Perusahaan</label>
                  <input type="text" class="form-control" name="npwp" placeholder="Masukkan Input Perusahaan"  required>
                </div>
                </div><br>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                <button type="button" onclick="location.href='index.php?page=perusahaan'" class="btn btn-primary">LIHAT DATA</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
