<?php 
  
  $id = $_GET['id_detail'];
  
  $query = "SELECT * FROM detailtransaksi WHERE id_detail = $id";

  $result = mysqli_query($koneksi, $query);

  $row = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Detail Transaksi | Edit</title>
  </head>

  <body>
  <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-headerborder-dark bg-primary">
            <div class="font1"> <center>Edit Detail Transaksi</center> </div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=detail&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                  <input type="hidden" value="<?php echo $row['id_detail'] ?>" name="id_detail" class="form-control">
                </div>

                <div class="form-group">
                  <label>Deskripsi Transaksi : </label>
                  <?php
                      $id_transaksi = $row['id_transaksi'];
                      $query1 = "SELECT * , DATE_FORMAT(waktu_transaksi,'%W, %d/%M/%Y %H:%i') AS waktu FROM transaksi inner join kasir on transaksi.id_kasir=kasir.id_kasir WHERE id_transaksi = $id_transaksi";
                      $result = mysqli_query($koneksi, $query1);
                      $row2 = mysqli_fetch_array($result);
                      $a= " Kode Invoice : ";
                      $b= " | Nama Kasir : ";
                      $c=" | Waktu : ";
                  ?>
                  <div class="form-row">
                  <input type="text" name="id_transaksi" class="form-control" style="width:6%;margin-left:3px;" value="<?php echo $id_transaksi?>" readonly>
                  <input type="text" name="desk_transaksi" class="form-control" style="width:81%;" value="<?php echo $a.$row2['kode_inv'];?>" readonly>
                  <button type="button" style="width:12%;height:40px;padding:5px;" onclick="location.href='../transaksi/view_trans.php'" class="btn btn-primary">UBAH</button>
                </div></div>
                
                  <div class="form-group">
                  <label>ID Barang</label>
                  <?php
                      $sql= "SELECT * FROM barang";
                      $query=mysqli_query($koneksi,$sql);
                      $a= " ( ";
                      $b= " ) ";
                      $c= ", Harga : ";
                  ?>
                  <select name="id_barang" class="form-control">
                  <?php while($row1=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row1['id_barang']?>" <?php if($row1['id_barang'] == $row['id_barang']){ echo 'selected'; } ?>><?php echo $row1['id_barang'].$a.$row1['nama_barang'].$c.$row1['harga_jual'].$b;?></option>
                  <?php }   ?>
                  </select></div>

                <div class="form-group">
                  <input type="hidden" class="form-control" name="jumlah" value="0">
                </div>


                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                <a href="index.php?page=detail&id_transaksi=<?php echo $id_transaksi?>" class="btn btn-primary">LIHAT DATA</a>

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