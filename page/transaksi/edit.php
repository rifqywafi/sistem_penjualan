<?php 
  
  $id = $_GET['id_transaksi'];
  
  $query = "SELECT * FROM transaksi WHERE id_transaksi = $id";

  $result = mysqli_query($koneksi, $query);

  $row = mysqli_fetch_array($result);

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Transaksi | Edit</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-header bg-primary">
            <div class="font1"><center>EDIT TRANSAKSI</center></div>
            </div>
            <div class="card-body">
              <form action="index.php?page=transaksi&act=update" method="POST">
              <div class="font2">
                <div class="form-group">
                <input type="hidden" name="id_transaksi" value="<?php echo $id ?>" required>
                </div>

                <div class="form-group">
                  <label>Kasir</label>
                  <?php
                      $sql= "SELECT * FROM kasir";
                      $query=mysqli_query($koneksi,$sql);
                      $a=" ( ";
                      $b=" ) ";
                  ?>
                  <select name="id_kasir" class="form-control">
                  <?php while($row2=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row2['id_kasir']?>" <?php if($row2['id_kasir'] == $row['id_kasir']){ echo 'selected'; } ?>><?php echo $row2['id_kasir'].$a.$row2['nama_kasir'].$b;?></option>
                  <?php }   ?>
                  </select>
                </div>
                
                <div class="form-group">
                <label style="display:block;">Pilih Salah Satu : </lasbel>
                <div class="row">
                    <div class="col"><button type="button" class="btn btn-primary w-100" style="padding:5px;"id="member">Member</button></div>
                    <div class="col"><button type="button" class="btn btn-primary w-100" style="padding:5px;" id="nonmember" >Non-Member</button></div>
                </div></div>

                <div class="form-group">
                  <?php
                      $sql= "SELECT * FROM member";
                      $query=mysqli_query($koneksi,$sql);
                      $a=" ( ";
                      $b=" ) ";
                  ?>
                  <select name="id_member" id="showmember" style="display:none;" class="form-control">
                  <?php while($row1=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row1['id_member']?>" <?php if($row1['id_member'] == $row['id_member']){ echo 'selected'; } ?>><?php echo $row1['id_member'].$a.$row1['nama_member'].$b;?></option>
                  <?php }   ?>
                  </select>
                </div>

                <div class="form-group">
                  <input type="hidden" name="kode_inv" value="<?php echo $row['kode_inv'] ?>" placeholder="Masukkan Kode Invoice Transaksi" class="form-control" >
                </div>

                <div class="form-group">
                  <input type="text" name="nama_pembeli" style="display:none;" id="showpembeli" value="<?php echo $row['nama_pembeli'] ?>" placeholder="Masukkan Nama Pembeli" class="form-control">
                </div>

                <div class="form-group">
                  <label>Diskon(%)</label>
                  <input type="number" min="0" max="100" value="<?php echo $row['diskon'] ?>" class="form-control" name="diskon" placeholder="Masukkan Diskon (maks 100%)"  required>
                </div>

                <div class="form-group">
                  <label>PPN(%)</label>
                  <input type="number" min="0" max="100" value="<?php echo $row['ppn'] ?>" class="form-control" name="ppn" placeholder="Masukkan PPN (maks 100%)"  required>
                </div>

                <div class="form-group">
                  <label>Metode Pembayaran</label>
                  <?php
                      $sql= "SELECT * FROM metode_pembayaran";
                      $query=mysqli_query($koneksi,$sql);
                      $a= " ( ";
                      $b= " ) ";
                  ?>
                  <select name="id_metode_pembayaran" class="form-control">
                  <?php while($row3=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row3['id_metode_pembayaran']?>" <?php if($row3['id_metode_pembayaran'] == $row['id_metode_pembayaran']){ echo 'selected'; } ?>><?php echo $row3['id_metode_pembayaran'].$a.$row3['nama_metode'].$b;?></option>
                  <?php }   ?>
                  </select></div>

                <div class="form-group">
                  <label>Status : </label><br>
                  <input type="radio" name="status" id="proses" value="<?php echo $row['status']?>" checked>
                  <label for="proses">Proses</label><br>
                  <input type="radio" name="status" id="selesai" value="selesai">
                  <label for="selesai">Selesai</label>
                </div>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <button type="button" onclick="location.href='index.php?page=transaksi'" class="btn btn-primary">LIHAT DATA</button>

              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      document.getElementById('member').addEventListener('click', () => {
      document.getElementById('showpembeli').style.display = 'none';
      document.getElementById('showmember').style.display = 'block';
      })
      document.getElementById('nonmember').addEventListener('click', () => {
      document.getElementById('showmember').style.display = 'none';
      document.getElementById('showpembeli').style.display = 'block';
      })
    </script>
  </body>
</html>