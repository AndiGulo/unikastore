<?php 
include 'config.php'

?>
 
<?php session_start();
if (!isset($_SESSION["login"])){
    header("location:login.php");
    exit;
  } 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <?php include './db_user/footerkit.php' ?>
    <!-- my css -->
    <link rel="stylesheet" href="./css/nota.css">
    <!-- font awesome link -->

    <script src="https://kit.fontawesome.com/68a49fac32.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar bg-light shadow fixed-top">
  <div class="container-fluid ">
    <a class=" navbar-brand fw-bold text-secondary " href="./l1.php"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Keluar</a>
  </div>
</nav>
<div class="konten">
    <div class="container  " style="margin-top:100px;">
        <h4> <i class="fa-solid fa-receipt pe-2 "></i>Detail Pembelian</h4  >

    <?php 
    $ambil = $conn->query("SELECT * FROM pembelian JOIN user
            ON pembelian.id_pelanggan =user.id_user
            WHERE pembelian.id_pembelian='$_GET[id]'");
        $detail =$ambil->fetch_assoc();
         ?>

         <!-- debugging -->
    <!-- <pre><?//php print_r($detail) ;?></pre>
    <pre><?//php print_r($_SESSION) ;?></pre> -->

               <!-- security user tidak bisa melihat nota user lain -->

            <?php 
                    //mendapatkan id pelanggan yang beli
            $idpelangganyangbeli = $detail["id_pelanggan"];

                    //mendapatkan id pelanggan login

            $idpelangganyanglogin = $_SESSION["id_user"];
        if ($idpelangganyangbeli!==$idpelangganyanglogin)
        
        {
         echo "<script>alert('Jangan Nakal Heiiii');</script>";
         echo "<script>location='riwayat.php';</script>";   
        }
             ?>
    <div class="row mt-5">
        <div class="col-md-4 ">
    <h6 class="text-primary"><i class="fa-brands fa-squarespace pe-2"></i>pembelian</h6>
  
    <p>
        <strong>No.Pembelian :&nbsp;<?php echo $detail ['id_pembelian'] ?></strong><br>
        tanggal : <?php echo $detail ['tanggal_pembelian'] ?> <br>
        total Pembelian : Rp.<?php echo number_format($detail ['total_pembelian']); ?>
    </p>
    </div>
    <div class="col-md-4">
    <h6 class="text-primary"><i class="fa-brands fa-squarespace pe-2"></i>pelanggan</h6>
    <strong><?php echo $detail['username']; ?></strong> <br>
    <p><?php echo $detail ['nohp']; ?><br>
        <?php echo $detail ['email']; ?><br></p>
    </div>
    <div class="col-md-4">
        <h6 class="text-primary"><i class="fa-brands fa-squarespace pe-2"></i>pengiriman</h6>
        <p><?php echo $detail ['nama_kota']; ?><br>
        Rp.<?php echo number_format($detail ['tarif']); ?><br></p>
       <?php echo $detail ['alamat_pengiriman']; ?><br></p>
    </div>
    </div>

    <div class="overplow">
    <table class="table table-bordered">
    <thead>
    <tr class="table">
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Subharga</th>
    
    </tr>
  </thead>
  <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$conn->query("SELECT * FROM pembelian_produk JOIN produk ON
                pembelian_produk.id_produk=produk.id
                WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
            <?php while ($pecah=$ambil->fetch_assoc()){ ?>
        <tr>
                <td><?php echo $nomor; ?></td>
                <td><img src="img/<?php echo $pecah['gambar']; ?>" alt="" width="150px" height="150px"></td>
                <td><?php echo $pecah['namaproduk']; ?></td>
                <td>Rp.<?php echo number_format($pecah['harga']); ?></td>
                <td><?php echo $pecah['jumlah']; ?></td>
                <td>
                    Rp.<?php echo number_format($pecah['harga']*$pecah['jumlah']); ?>
                </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
  </tbody>
    </table>
    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="alert alert-primary mt-2" role="alert">
                                <p>
                                <i class="fa-solid fa-triangle-exclamation" ></i> &nbsp; Silahkan Melakukan pembayaran Rp.<?php echo number_format($detail ['total_pembelian']); ?> ke <br>
                                    <strong>&nbsp; &nbsp;&nbsp; BANK BNI 123-456-789-0&nbsp;&nbsp;  <i>An.UnikaStore</i> </strong> untuk segera di proses
                                </p>
                            </div>
                        </div>
                    </div>
    </div>
</div>

<?php include './db_user/footer.php' ?>