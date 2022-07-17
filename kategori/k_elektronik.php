<?php 
include '../config.php';
session_start();

?>
 <?php 
 
 $semuadata=array();
 $ambil=$conn->query("SELECT * FROM produk WHERE namaproduk LIKE '%elektronik%' OR  namaproduk  LIKE '%laptop%'
                       OR  namaproduk  LIKE '%handphone%'  OR  namaproduk  LIKE '%hp%'  OR  namaproduk  LIKE '%earphone%'  OR  namaproduk  LIKE '%powerbank%' ");
 while ($pecah = $ambil->fetch_assoc())
 {

     $semuadata[]=$pecah;

//  echo "<pre>";
// print_r($pecah);
// echo "</pre>";
 }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kategori Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    
    <!-- cssku -->
    <link rel="stylesheet" href="../css/stylel1.css" />
    <!-- css search -->
    <!-- <link rel="stylesheet" href="../css/search.css"> -->
    <?php include '../db_user/footerkit.php' ?>
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/68a49fac32.js" crossorigin="anonymous"></script>
    <!-- icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">


    <!-- nav user -->
    <nav class="navbar navbar-expand-lg bg-light shadow-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="">UnikaStore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item dropdown pe-5">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user pe-2" ></i> Akun</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li><a class="dropdown-item" href="#">perbaharui</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="../keluar.php">Keluar</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link pe-5" aria-current="page" href="../contact us/contact.php"><i class="fa-solid fa-phone pe-2"></i>Hubungi-Kami</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link pe-5" href="#"><i class="fa-solid fa-store pe-2"></i>Mulai Jualan</a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" href="../riwayat.php"><i class="fa-solid fa-clipboard pe-2"></i>Nota</a>
            </li>
          </ul>
          <form class=" d-flex"  action="../search.php" method="get">
            <input type="text" class="form-control me-2" placeholder="Cari baju bekas"  name="keyword"  required />
            <button class="btn btn-outline-success" >Search</button>
          </form>
         
          <div class="keranjang" ><a href="../keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
          </li>
        </div>
      </div>
    </nav>

      
  </head>
  <br><br><br><br>


  

     <div class="row">
            <?php foreach ($semuadata as $key => $value) : ?>
                <div class="card shadow " style="width:12rem; background-color: #14ee80; ">
      <img src="../img/<?php echo $value['gambar'] ?>" alt="..." style="width:170px; height:170px; box-sizing :border-box;">
      <div class="card-body">
        <div class="bagian1">
        <h5 class="card-title"><?php echo $value['namaproduk'] ?></h5><br>
        <p class="card-text">Rp.<?php echo number_format($value ['harga'])  ?></p></div>
        <div class="bagian2">
        <a href="../detail.php?id=<?php echo $value['id']; ?>" class=" btn btn-light"style="font-size:10px;">Detail</a>
        <a href="../pembelian.php?id=<?php echo $value['id'];  ?>" class=" btn btn-warning"style="font-size:10px;">Beli Produk </a></div>
      </div>
    </div>
    <?php endforeach ?>
    </div>
    </div>
    




            





<?php '../db_user/footerkit.php' ?>

<?php include '../db_user/footer.php' ?>

</html>