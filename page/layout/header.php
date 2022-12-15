<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" a href="https://indomaret.com" target="_blank" ><img src="assets/img/indomaret.png" width="125px" height="40px" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;"  href="index.php">Home </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=supplier">Supplier </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=perusahaan">Perusahaan </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=kategori">Kategori </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=member">Member </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=barang">Barang </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=kasir">Kasir </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=metode_pembayaran">Metode Pembayaran </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=cabang">Cabang </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="index.php?page=transaksi">Transaksi </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link bgnav" style="color:white;" href="user/logout.php">Logout </a> 
        </li>
      </ul>
    </div>
      <span class="navbar-text" style="color:white;font-size:20px;">
      <img src="assets/img/person-circle.svg" style="height:25px;width:25px;margin-right:5px;">
      <?php echo $_SESSION['username'] ?>
      </span>
    </div>
</nav>
  </body>
</html>