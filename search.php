<?php 
include 'config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION["login"])){
  header("location:login.php");
  exit;
}

?>
<?php 
$keyword = $_GET ["keyword"] ;

    $semuadata=array();
    $ambil=$conn->query("SELECT * FROM produk WHERE namaproduk LIKE '%$keyword%'
                            OR deskripsi LIKE '%$keyword%' ");
    while ($pecah = $ambil->fetch_assoc())
    {

        $semuadata[]=$pecah;
    }
    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>"
?>
<?php include './db_user/headeruser.php' ?>
<nav class="navbar bg-light shadow">
  <div class="container-fluid ">
    <a class=" navbar-brand fw-bold text-secondary float-end" href="./l1.php"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Keluar</a>
  </div>
</nav>


    <div class="container pt-2">
        <h4 class="text-success text-opacity-75"><i class="fa-solid fa-align-left pe-5"></i>Hasil Pencarian : <?php echo $keyword ?><i class="fa-regular fa-face-laugh-wink ps-2"></i></h4>
    

<?php if (empty($semuadata)): ?>
    <div class="alert alert-danger">Pencarian Anda <strong>(<?php echo $keyword ?>)</strong>  Tidak Ditemukan</div>
    <?php endif ?>
        <div class="row">
            <?php foreach ($semuadata as $key => $value) : ?>
        <div class="card shadow " style="width:12rem; background-color: #14ee80; ">
      <img src="img/<?php echo $value ['gambar'] ?>" alt="...">
      <div class="card-body">
        <div class="bagian1">
        <h5 class="card-title"><?php echo $value['namaproduk'] ?></h5>
        <p class="card-text">Rp.<?php echo number_format($value ['harga'])  ?></p></div>
        <div class="bagian2">
        <a href="detail.php?id=<?php echo $value ['id']; ?>" class=" btn btn-light"style="font-size:10px;">Detail</a>
        <a href="pembelian.php?id=<?php echo $value ['id'];  ?>" class=" btn btn-warning"style="font-size:10px;">Beli Produk </a></div>
      </div>
    </div>
    <?php endforeach ?>
    </div>
    </div>
   
