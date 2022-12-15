<?php 
  
  
  $id = $_GET['id_metode_pembayaran'];
  
  $query = "SELECT * FROM metode_pembayaran WHERE id_metode_pembayaran = $id";

  $result = mysqli_query($koneksi, $query);

  $row = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Metode | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT METODE</center></div>
            </div>
            <div class="card-body ">
              <form action="update_metode.php" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_metode" value="<?php echo $row['id_metode_pembayaran'] ?>" required>
                </div>

                <div class="form-group">
                  <label>Nama Metode Pembayaran</label>
                  <input type="text" name="nama" value="<?php echo $row['nama_metode'] ?>" placeholder="Masukkan Nama Metode Pembayaran" class="form-control" required>
                </div><br>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <button type="button" onclick="location.href='index.php?page=metode_pembayaran'" class="btn btn-primary">LIHAT DATA</button>

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