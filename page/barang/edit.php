<?php 
  
  $id = $_GET['id_barang'];
  
  $query = "SELECT * FROM barang WHERE id_barang = $id";

  $result = mysqli_query($koneksi, $query);

  $row1 = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barang | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT BARANG</center></div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=barang&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_barang" value="<?php echo $row1['id_barang'] ?>" required>
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
                  <option value= "<?php echo $row2['id_supplier']?>" <?php if($row2['id_supplier'] == $row1['id_supplier']){ echo 'selected'; } ?>><?php echo $row2['id_supplier'].$a.$row2['nama_supplier'].$b;?></option>
                  <?php }   ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <?php
                      $sql1= "SELECT * FROM kategori";
                      $query=mysqli_query($koneksi,$sql1);
                      $a=" ( ";
                      $b=" ) ";
                  ?>
                  <select name="id_kategori" class="form-control">
                  <?php while($row3=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row3['id_kategori']?>" <?php if($row3['id_kategori'] == $row1['id_kategori']){ echo 'selected'; } ?>><?php echo $row3['id_kategori'].$a.$row3['nama_kategori'].$b;?></option>
                  <?php }   ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_barang" value="<?php echo $row1['nama_barang'] ?>" placeholder="Masukkan Nama Barang" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Harga Modal</label>
                  <input type="text" name="harga_modal" id="harga_modal" value="<?php echo $row1['harga_modal'] ?>" placeholder="Masukkan Harga Modal" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="text" name="harga_jual" id="harga_jual" value="<?php echo $row1['harga_jual'] ?>" placeholder="Masukkan Harga Jual" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Stock</label>
                  <input type="number" name="stock" value="<?php echo $row1['stock'] ?>" placeholder="Masukkan Stok Barang" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Masuk</label>
                  <input type="text" name="tanggal_masuk" value="<?php echo $row1['tanggal_masuk'] ?>" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>
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