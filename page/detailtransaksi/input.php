<!doctype html>
<html lang="en">
<?php 
  
  $id = $_GET['id_transaksi'];

  $query = "SELECT * FROM transaksi WHERE id_transaksi = '$id'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_array($result);

?>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detail Transaksi | Input</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-headerborder-dark bg-primary">
            <div class="font1"> <center>Input Detail Transaksi</center> </div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=detail&act=simpan" method="POST">
              <div class="font2">
                <div class="form-group">
                  <input type="hidden" name="id_detail" class="form-control">
                </div>

                <div class="form-group">
                  <label>ID Transaksi : </label>
                  <?php
                      $id = $_GET['id_transaksi'];
                      $query = "SELECT *,DATE_FORMAT(waktu_transaksi,'%W, %d/%M/%Y %H:%i') AS waktu FROM transaksi WHERE id_transaksi = '$id'";
                      $result = mysqli_query($koneksi, $query);
                      $row2 = mysqli_fetch_array($result);
                      $a= " Kode Invoice : ";
                      $b= " | Nama Kasir : ";
                      $c=" | Waktu : ";
                  ?>
                  <div class="form-row">
                  <input type="text" name="id_transaksi" class="form-control" style="width:6%;margin-left:3px;" value="<?php echo $id?>" readonly>
                  <input type="text" name="desk_transaksi" class="form-control" style="width:81%;" value="<?php echo $a.$row['kode_inv'];?>" readonly>
                  <button type="button" style="width:12%;height:40px;padding:5px;" onclick="location.href='../transaksi/view_trans.php'" class="btn btn-primary">UBAH</button>
                </div></div>
                
                  <div class="form-group">
                  <label>ID Barang</label>
                  <?php
                      $query=mysqli_query($koneksi,"SELECT * FROM barang");
                      $a= " ( ";
                      $b= " ) ";
                      $c= ", Harga : ";
                      $rp="Rp."
                  ?>
                  <select name="id_barang" class="form-control">
                  <?php while($row1=mysqli_fetch_array($query)){?>
                  <?php 
                      $harga_jual=$row1['harga_jual'];
                      $result1 = number_format($harga_jual,2,',','.');?>
                  <option value= "<?php echo $row1['id_barang']?>"><?php echo $row1['id_barang'].$a.$row1['nama_barang'].$c.$rp.$result1.$b;?></option>
                  <?php }   ?>
                  </select></div>

                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Barang" required>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                <a href="index.php?page=detail&id_transaksi=<?php echo $id?>" class="btn btn-primary">LIHAT DATA</a>

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
