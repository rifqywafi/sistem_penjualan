<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Transaksi | Input</title>
  </head>

  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card border-primary">
            <div class="card-headerborder-dark bg-primary">
            <div class="font1"> <center>Input Transaksi</center> </div>
            </div>
            <div class="card-body ">
              <form action="index.php?page=transaksi&act=simpan" method="POST">
              <div class="font2">
                <div class="form-group">
                  <input type="hidden" name="id_transaksi" class="form-control">
                </div>

                <div class="form-group">
                  <label>Kasir</label>
                  <?php
                      $sql= "SELECT * FROM kasir";
                      $query=mysqli_query($koneksi,$sql);
                      $a= " ( ";
                      $b= " ) ";
                  ?>
                  <select name="id_kasir" class="form-control">
                  <?php while($row=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row['id_kasir']?>"><?php echo $row['id_kasir'].$a.$row['nama_kasir'].$b;?></option>
                  <?php }   ?>
                  </select></div>

                  <div class="form-group">
                  <label style="display:block;">Pilih Salah Satu :</label>
                  <div class="row">
                    <div class="col"><button type="button" class="btn btn-primary w-100" style="padding:5px;"id="member">Member</button></div>
                    <div class="col"><button type="button" class="btn btn-primary w-100" style="padding:5px;" id="nonmember" >Non-Member</button></div>
                  </div></div>
                  
                  <div class="form-group">
                  <?php
                      $sql= "SELECT * FROM member";
                      $query=mysqli_query($koneksi,$sql);
                      $a= " ( ";
                      $b= " ) ";
                  ?>
                  <select name="id_member" id="showmember" style="display:none;" class="form-control">
                  <option value= "7" selected>Pilih Nama Member</option>
                  <?php while($row1=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row1['id_member']?>"><?php echo $row1['id_member'].$a.$row1['nama_member'].$b;?></option>
                  <?php }   ?>
                  </select></div>

                <div class="form-group">
                  <input type="text" style="display:none;" id="showpembeli"  name="nama_pembeli" placeholder="Masukkan Nama Pembeli"  class="form-control">
                </div>

                <div class="form-group">
                  <input type="hidden" my-date="" my-date-format="DD/MM/YYYY, hh:mm:ss" class="form-control" placeholder="dd-mm-yyyy --:-- --" name="waktu_transaksi"   required>
                </div>

                <div class="form-group">
                  <label>Diskon(%)</label>
                  <input type="number" value="0" min="0" max="100" class="form-control" name="diskon" placeholder="Masukkan Diskon (maks 100%)"  required>
                </div>
                
                <div class="form-group">
                  <label>PPN(%)</label>
                  <input type="number" value="0" min="0" max="100" class="form-control" name="ppn" placeholder="Masukkan PPN (maks 100%)"  required>
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
                  <?php while($row2=mysqli_fetch_array($query)){?>
                  <option value= "<?php echo $row2['id_metode_pembayaran']?>"><?php echo $row2['id_metode_pembayaran'].$a.$row2['nama_metode'].$b;?></option>
                  <?php }   ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <input type="hidden" value="proses" class="form-control" name="status">
                </div>
                </div><br>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                <button type="button" onclick="location.href='index.php?page=transaksi'" class="btn btn-primary">LIHAT DATA</button>

              </form>
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
