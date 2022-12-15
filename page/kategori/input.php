<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kategori | Input</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-headerborder-dark bg-primary">
            <div class="font1"> <center>Input Kategori</center> </div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=kategori&act=simpan" method="POST">
              <div class="font2">
                <div class="form-group">
                  <input type="hidden" name="id_kategori" class="form-control">
                </div>
                
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kategori" required>
                </div><br>
                
                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                <button type="button" onclick="location.href='index.php?page=kategori'" class="btn btn-primary">LIHAT DATA</button>

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
