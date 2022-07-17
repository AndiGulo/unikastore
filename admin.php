<?php 
require ('config.php');
?>
<?php 
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("location:login.php"); 
    die ("anda belum login");
    }

?>




<?php 
include './db_admin/headerboost.php' ?>
<?php 
include './db_admin/bodynav.php' ?>
    <div class="col-md-10 ">
      <div class="text-center pt-4 pe-2 ">
        <div class="row">
  <div class="col-sm-6">
    <div class="card border-0">
      <div class="card-body bg-info rounded-4 text-white " >
        <h5 class="card-title fs-4 fw-semibold">DATABASE PRODUK</h5>
        <p class="card-text fs-2"><i class="fa-solid fa-users"></i></p>
        <a href="./db_produk.php" class="btn btn-warning text-dark">KLIK DISINI</a>
      </div>
    </div>
  </div>
  <!-- <div class="col-sm-6">
    <div class="card border-0">
      <div class="card-body  bg-info rounded-4 text-white">
        <h5 class="card-title fs-4 fw-semibold ">DATABASE USER</h5>
        <p class="card-text fs-2"><i class="fa-solid fa-users"></i></p>
        <a href="#" class="btn btn-warning text-dark">KLIK DISINI</a>
      </div>
    </div>
  </div> -->


  
</div></div>
    </div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
