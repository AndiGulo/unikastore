<?php 
include 'config.php';

?>
<?php session_start();
if (!isset($_SESSION["login"])){
    header("location:login.php");
    exit;
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
</head>
  <body>
  
  <nav class="navbar bg-light shadow fixed-top">
  <div class="container">
    <a class=" navbar-brand fw-bold text-secondary " href="./l1.php"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Keluar</a>
  </div>
</nav><br><br><br><br>

<!-- <pre><?//php print_r ($_SESSION) ?></pre> -->
<div class="container">

    <h5 class="text-secondary"><i class="fa-solid fa-clock-rotate-left pe-2"></i>Nota Dan Pembayaran Belanja <?php echo $_SESSION['username'] ?> &nbsp;<i class="fa-solid fa-face-smile"></i></h5>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
                <th>Opsi</th>
                <th>Barang Sampai</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $nomor=1;
                //mendapatkan id pelanggan dari session
                $id_pelanggan=$_SESSION["id_user"];

                $ambil=$conn->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'
                ");
                while ($pecah=$ambil->fetch_assoc()){

               
                    ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td ><?php echo $pecah["tanggal_pembelian"] ?></td>
                <td >
                  <?php echo $pecah["status_pembelian"] ?>
                  <br>
                  <?php if (!empty($pecah['resi_pengiriman'])) :?>
                   <span class="text-danger"> Resi : <?php echo $pecah['resi_pengiriman']; ?></span>
                   <?php endif ?></td>
                <td ><?php echo number_format ($pecah["total_pembelian"]); ?></td>
                <td>
                    <a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>
                    <?php if($pecah['status_pembelian']=="pending"): ?>
                    <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success">
                    Input Pembayaran
                  </a>
                  <?php else :  ?>
                    <a href="lihatpembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning">Lihat Pembayaran</a>
                  <td><a href="hapusriwayat.php?id=<?php echo $pecah ["id_pembelian"]; ?>" class="btn btn-danger"  onclick="
      return confirm('Yakin mau hapus,data barang anda akan dihapus dan tidak dapat lagi dipulihkan');"><i class="fa-solid fa-circle-check pe-2"></i>Selesai</a></td>
                  <?php endif ?>

                    



                    
 


            </td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table>

  </div>

                  

  <?php include './db_user/footer.php' ?>