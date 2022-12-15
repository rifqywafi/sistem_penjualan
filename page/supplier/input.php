<!doctype html>
<html lang="en">
  <head>
  </head>
  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-headerborder-dark bg-primary">
            <div class="font1"> <center>Input Supplier</center> </div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=supplier&act=simpan" method="POST">
              <div class="font2">
                <div class="form-group">
                  <input type="hidden" name="id_supplier" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Supplier" required>
                </div>
                
                <div class="form-group">
                  <label>Nomor Handphone</label>
                  <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No HP Supplier"  required>
                </div>
                
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Supplier" rows="3" required></textarea>
                </div>

                <div class="form-group">
                  <label>Nomor Rekening</label>
                  <input type="text" class="form-control" name="no_rekening" placeholder="Masukkan No Rekening Supplier"  required>
                </div></div><br>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                <button type="button" onclick="location.href='index.php?page=supplier'" class="btn btn-primary">LIHAT DATA</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
