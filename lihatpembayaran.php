<?php
session_start();
require 'config.php' ?>
<?php 
$id_pembelian=$_GET["id"];

$ambil=$conn->query("SELECT * FROM pembayaran LEFT JOIN 
                        pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
                        WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay=$ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";

//keamanan
if (empty($detbay))
 {
    echo"<script>alert('Belum Ada Data pembayaran')</script>";
    echo"<script>location='riwayat.php';</script>";
    exit();
}
//jika ada yang mau lihat pembayaran orang lain

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
if ($_SESSION["id_user"]!==$detbay["id_pelanggan"])
 {
    echo"<script>alert('Anda Tidak Berhak Melihat Pembayaran Orang Lain')</script>";
    echo"<script>location='riwayat.php';</script>";
    exit();
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nota/Riwayat Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/68a49fac32.js" crossorigin="anonymous"></script>
    <?php include './db_user/footerkit.php' ?>

    <!-- buat gambar bisa dizoom  -->
    <script src="./zoom/lib/jquery-1.10.1.min.js"></script>
    <script src="./zoom/source/jquery.fancybox.js"></script>
    <link rel="stylesheet" href="./zoom/source/jquery.fancybox.css">    

    <!-- script nya -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".perbesar").fancybox();
        });

    </script>

</head>
  <body>
  
  <nav class="navbar bg-light shadow fixed-top">
  <div class="container">
    <a class=" navbar-brand fw-bold text-secondary " href="riwayat.php"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Kembali</a>
  </div>
</nav><br><br><br><br>
<div class="container">
<h4 class="fw-bold text-center text-secondary pb-5"> Lihat Pembayaran</h4>
    <div class="row pt-5">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?php echo $detbay['nama'] ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $detbay['bank'] ?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp. <?php echo number_format($detbay['jumlah']) ?></td>
                </tr>
            </table>    
        </div>
        <div class="col-md-6">
            <a href="./bukti_pembayaran/<?php echo $detbay ['bukti'] ?>" class="perbesar" target="_blank">
        <img src="./bukti_pembayaran/<?php echo $detbay ['bukti'] ?>" alt="" class="image-responsive" width="100">
        </a>
        </div>
    </div>
</div>





