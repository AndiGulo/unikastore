<?php 
include 'config.php' 
?>
<?php 

session_start();
error_reporting(0);


    // echo "<pre>";
    // print_r($_SESSION['keranjang']);
    // echo  "</pre>";
    
  if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
  {
    echo "<script>alert ('Tidak Ada Produk dikeranjang, Belanja Dulu Yaaaaa');</script>";
    echo"<script>location='l1.php';</script>" ;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
   <?php include './db_user/footerkit.php' ?>

    <!-- my css -->
    <link rel="stylesheet" href="./css/keranjang.css">
    <!-- font awesome link -->

    <script src="https://kit.fontawesome.com/68a49fac32.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar bg-light shadow fixed-top">
  <div class="container-fluid ">
    <a class=" navbar-brand fw-bold text-secondary " ><i class="fa-solid fa-bell pe-4"></i>Keranjang Belanja</a>
  </div>
</nav>
<h5 class=" container mt-5 pb-2 pt-3"></h5>

<section class="konten">
  <div class="container">
   
    <table class="table">
  <thead>
    <tr class="table">
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Subharga</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
  <?php foreach ($_SESSION["keranjang"] as $id => $jumlah ) : ?>

      <!-- menampilkan produk yang sedang diperulang berdasarkan id -->
      <?php 
      $ambil = $conn->query("SELECT * FROM produk 
                              WHERE id='$id'");
      $pecah =$ambil->fetch_assoc();
      $subharga=$pecah["harga"]*$jumlah;
      // echo "<pre>";
      // print_r($pecah);
      // echo  "</pre>";
      
      ?>
    <tr>
    
      <th><?php echo $nomor; ?></th>
      <td><img src="img/<?php echo $pecah ["gambar"]; ?>" alt="" width="170px" height="170px"></td>
      <td><?php echo $pecah ["namaproduk"]; ?></td>
      <td>Rp.<?php echo number_format($pecah["harga"]); ?></td>
      <td><?php echo $jumlah ?></td>
      <td>Rp.<?php echo number_format  ($subharga); ?></td>
      <td>
        <a href="hapuskeranjang.php?id=<?php echo $id?>" class="btn btn-danger btn-xs">hapus</a>
      </td>
    </tr>
    <?php $nomor++; ?>
   <?php endforeach ?>
  
  </tbody>
</table>
  </div>
</section>
<div class="btnku" style="margin-top:20px; padding-bottom:100px;">
<a class="btn btn-primary float-end me-5 mt-4" href="checkout.php" role="button"><i class="fa-solid fa-cart-shopping pe-2"></i>Checkout</a>
<a class="btn btn-secondary float-end me-3 mt-4" href="l1.php" role="button">Kembali Belanja</a></div>

<?php include './db_user/footer.php' ?>