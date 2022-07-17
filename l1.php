<?php 
include ('config.php');
    $queryProduk = mysqli_query($conn,"SELECT id,namaproduk,deskripsi,harga,gambar FROM produk ORDER BY id DESC;");
session_start();  
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}


?>


    <?php 
    include ('./db_user/headeruser.php') ?>

      <?php include ("./db_user/navuser.php") ?>
   
    <!-- <div id=" carouselExampleControls " class="carousel slide" data-bs-ride="carousel">
      <div class=" gambar1 container carousel-inner ">
        <div class="carousel-item active">
          <img src="./image/l3.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./image/l2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./image/l1.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div> -->

    <div class="atas">.</div>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="./image/l3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./image/l1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./image/l2.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <h4 class="text-center">KATEGORI</h4>
    <div class="row ">
    <div class="card shadow " style="width:12rem; background-color: #14ee80;  " >
      <img src="./img/kategori/k1.jpg" class="card-img-top" alt="..." style="padding-top : 10px;" width="170px" height="165px">
      <div class="card-body">
        <h5 class="card-title">Barang Bekas/second hand</h5>
        <p class="card-text">bekas tapi berkualitas</p>
        <a href="kategori/k_barangbekas.php" class="btn btn-light"style="font-size:10px;">Kunjungi</a>
     
      </div>
    </div>

    <div class="card shadow " style="width:12rem; background-color: #14ee80; ">
      <img src="./img/kategori/k2.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Baju/pakaian</h5>
        <p class="card-text">berkualitas dan terjamin keaslianya</p>
        <a href="kategori/k_pakaian.php" class="btn btn-light"style="font-size:10px;">Kunjungi</a>
      
      </div>
    </div>

    <div class="card shadow " style="width:12rem; background-color: #14ee80; ">
      <img src="./img/kategori/k3.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">sepatu</h5>
        <p class="card-text">mencari segala jenis sepatu disini</p>
        <a href="./kategori/k_sepatu.php" class="btn btn-light"style="font-size:10px;">Kunjungi</a>
       
      </div>
    </div>
    <div class="card shadow " style="width:12rem; background-color: #14ee80; ">
      <img src="./img/kategori/k4.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Furnitur</h5>
        <p class="card-text">Lengkapi semua furnitur rumah atau kosmu</p>
        <a href="./kategori/k_furnitur.php" class="btn btn-light"style="font-size:10px;">Kunjungi</a>
      
      </div>
    </div>
  

    <div class="card shadow " style="width:12rem; background-color: #14ee80; ">
      <img src="./img/kategori/k5.jpg" class="card-img-top" alt="..." style="width:170px; height:170px; box-sizing :border-box;">
      <div class="card-body">
        <h5 class="card-title">Laptop dan alat elektronik lainnya</h5>
        <p class="card-text">mau cari barang elektronik</p>
        <a href="./kategori/k_elektronik.php" class="btn btn-light"style="font-size:10px;">Kunjungi</a>
    </div>
    </div>


    <!-- garis  -->
      <div class="garis">
          .
      </div>


      <div class="proc"><h4 class="text-center">PRODUK UNGGULAN</h3></div>

      <!-- memunculkan produk -->
        <?php while($produk = mysqli_fetch_array($queryProduk)) { ?>
    <div class="card shadow " style="width:12rem; background-color: #14ee80; ">
      <img src="img/<?php echo $produk['gambar'] ?>" alt="..." style="width:170px; height:170px; box-sizing :border-box;">
      <div class="card-body">
        <div class="bagian1">
        <h5 class="card-title"><?php echo $produk['namaproduk'] ?></h5><br>
        <p class="card-text">Rp.<?php echo number_format($produk ['harga'])  ?></p></div>
        <div class="bagian2">
        <a href="detail.php?id=<?php echo $produk ['id']; ?>" class=" btn btn-light"style="font-size:10px;">Detail</a>
        <a href="pembelian.php?id=<?php echo $produk['id'];  ?>" class=" btn btn-warning"style="font-size:10px;">Beli Produk </a></div>
      </div>
    </div>
    <?php } ?>
   


<!-- footer -->
    <div class="footer-dark">
      <footer>
          <div class="container">
              <div class="row">
                  <div class="col-sm-6 col-md-3 item">
                      <h3>Servis</h3>
                      <ul>
                          <li><a href="#">Desain web</a></li>
                          <li><a href="#">Yang telah mendevelop</a></li>
                          <li><a href="#">Hosting</a></li>
                          <li><a href="#">programming</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-6 col-md-3 item">
                      <h3>Tentang</h3>
                      <ul>
                          <li><a href="#">UNIVERSITAS KATOLIK SANTO THOMAS</a></li>
                          <li><a href="#">MEDAN</a></li>
                          <li><a href="#">karir</a></li>
                          <li><a href="#">team</a></li>
                          <li><a href="#">indonesia</a></li>
                      </ul>
                  </div>
                  <div class="col-md-6 item text">
                      <h3>UNIKA STORE</h3>
                      <p>Ini adalah halaman web yang kami bangun dengan susah payah secara otodidak untuk menambah skill dan wawasan tentang programming language</p>
                  </div>
                  <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
              </div>
              <p class="copyright">create with love kelompok 1 © 2022</p>
          </div>
      </footer>
 <!-- akhir footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
