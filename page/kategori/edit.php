<?php 
  
  $id = $_GET['id_kategori'];
  
  $query = "SELECT * FROM kategori WHERE id_kategori = $id";

  $result = mysqli_query($koneksi, $query);

  $row = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Kategori | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT KATEGORI</center></div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=kategori&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_kategori" value="<?php echo $row['id_kategori'] ?>" required>
                </div>

                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="nama" value="<?php echo $row['nama_kategori'] ?>" placeholder="Masukkan Nama Kategori" class="form-control" required>
                </div><br>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>
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