<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barang | Input</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-headerborder-dark bg-primary">
            <div class="font1"> <center>Input Barang</center> </div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=barang&act=simpan" method="POST">
              <div class="font2">
                <div class="form-group">
                  <input type="hidden" name="id_barang" class="form-control">
                </div>
                
                <div class="form-group">
                  <label>ID Supplier</label>
                  <?php
                      $sql= "SELECT * FROM supplier";
                      $query=mysqli_query($koneksi,$sql);
                      $a=" ( ";
                      $b=" ) ";
                  ?>
                  <select name="id_supplier" class="form-control">
                  <?php while($row2=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row2['id_supplier']?>"><?php echo $row2['id_supplier'].$a.$row2['nama_supplier'].$b;?></option>
                  <?php }   ?>
                  </select></div>

                <div class="form-group">
                  <label>Kategori</label>
                  <?php
                      $sql= "SELECT * FROM kategori";
                      $query=mysqli_query($koneksi,$sql);
                      $a=" ( ";
                      $b=" ) ";
                  ?>
                  <select name="id_kategori" class="form-control">
                  <?php while($row=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row['id_kategori']?>"><?php echo $row['id_kategori'].$a.$row['nama_kategori'].$b;?></option>
                  <?php }   ?>
                  </select></div>

                <div class="form-group">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Barang" required>
                </div>
                
                <div class="form-group">
                  <label for="harga_modal">Harga Modal</label>
                  <input type="text" class="form-control" id="harga_modal" name="harga_modal" placeholder="Masukkan Harga Modal" required>
                </div>

                <div class="form-group">
                  <label for="harga_jual">Harga Jual</label>
                  <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual" required>
                </div>
                  
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="number" class="form-control" name="stock" placeholder="Masukkan Stok Barang" required>
                </div>

                <div class="form-group">
                  <label for="tanggal_masuk">Tanggal Masuk</label>
                  <input type="datetime-local" class="form-control" name="tanggal_masuk" required>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                <button type="button" onclick="location.href='index.php?page=barang'" class="btn btn-primary">LIHAT DATA</button>

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
