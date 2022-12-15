<?php 
  
  
  $id = $_GET['id_supplier'];
  
  $query = "SELECT * FROM supplier WHERE id_supplier = $id";

  $result = mysqli_query($koneksi, $query);

  $row = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <a href="../index.php">Home</a>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Supplier | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT SUPPLIER</center></div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=supplier&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_supplier" value="<?php echo $row['id_supplier'] ?>" required>
                </div>

                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input type="text" name="nama" value="<?php echo $row['nama_supplier'] ?>" placeholder="Masukkan Nama Supplier" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>No Handphone</label>
                  <input type="text" name="no_hp" value="<?php echo $row['no_hp'] ?>" placeholder="Masukkan No HP Supplier" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Supplier" rows="4" required><?php echo $row['alamat'] ?></textarea>
                </div>
                
                <div class="form-group">
                  <label>No Rekening</label>
                  <input type="text" name="no_rekening" value="<?php echo $row['no_rekening'] ?>" placeholder="Masukkan No Rekening Supplier" class="form-control" required>
                </div><br>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <button type="button" onclick="location.href='index.php?page=supplier'" class="btn btn-primary">LIHAT DATA</button>

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