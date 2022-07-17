<?php 
require'config.php' 

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
    <a class=" navbar-brand fw-bold text-secondary " href="./l1.php"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Keluar</a>
  </div>
</nav>
<h5 class=" container mt-5 pb-2 pt-3"><i class="fa-solid fa-bell pe-4"></i>Check Out</h5>

<section class="konten ">
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
    
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $totalbelanja=0; ?>
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
     
    </tr>
    <?php $nomor++; ?>
    <?php $totalbelanja+=$subharga; ?>
   <?php endforeach ?>
  
  </tbody> 
</table>
  </div>
</section>
<form action="" method="post">
<div class="row ps-2 pt-2">
    <div class="col-md-2">
        <div class="form-group">
<input type="text" readonly value="Total : Rp.<?php echo number_format($totalbelanja)?>" class="form-control p-2 bg-danger text-white mt-2 ">
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
<input type="text" readonly value="Nama Pembeli :  <?php echo $_SESSION  ["username"] ?>" class="form-control p-2 bg-white mt-2">
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
<input type="text" readonly value="nomor Hp :  <?php echo $_SESSION  ["nohp"] ?>" class="form-control p-2 bg-white mt-2 ">
        </div>
        </div>
        <div class="col-md-2">
          <select class="form-select mt-2" name="id_ongkir" required>
            <option value="">Pilih Ongkos Kirim</option>
            <?php 
            $ambil=$conn->query("SELECT * FROM ongkir");
            while ($perongkir=$ambil->fetch_assoc()){
              ?>
        
            <option value="<?php echo $perongkir["id_ongkir"]  ?>">
              <?php echo $perongkir['nama_kota'] ?>  -
              Rp.<?php echo number_format ($perongkir['tarif']); ?>
            </option>
            <?php } ?>
          </select>
        </div>
        </div>
        <div class="form-group" style="width:50% ; margin-top:20px; margin-left:20px;">
          <label class="pb-2" >Alamat Lengkap Pengiriman</label>
          <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman(termasuk kode pos)" required></textarea>
        </div>
<div class="btnku" style="margin-top:-10px; padding-bottom:140px ;">
<button class="btn btn-primary float-end me-3 mt-4" name="checkout"><i class="fa-solid fa-cart-shopping pe-2" ></i>   checkout</button>
      
</form>

<a class="btn btn-secondary float-end me-3 mt-4" href="keranjang.php" role="button">Kembali</a></div>
    <?php 
      if (isset($_POST["checkout"]))
      {
        $id_pelanggan=$_SESSION["id_user"];
        $id_ongkir = $_POST["id_ongkir"];
        $tanggal_pembelian=date("Y-m-d");
        $alamat_pengiriman=$_POST['alamat_pengiriman'];

        $ambil=$conn->query("SELECT * FROM ongkir WHERE id_ongkir ='$id_ongkir'");
        $arrayongkir=$ambil->fetch_assoc();
        $nama_kota = $arrayongkir['nama_kota'];
        $tarif=$arrayongkir['tarif'];
        $total_pembelian =$totalbelanja+$tarif ;

        //Menyimpan data ke tabel pembelian 

        $conn->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) 
                    VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

        //MENDAPATKAN ID YANG BARUSAN TERJADI
        $id_pembelian_barusan = $conn->insert_id;

        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
        {

          //mendapatkan data produk berdasarkan id produk
            // $ambil = $conn-> query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            // $perproduk=$ambil->fetch_assoc();

            // $nama =$perproduk['namaproduk'];
            // $harga =$perproduk['harga'];
            // $subharga =$perproduk['harga']*$jumlah;
            // $conn->query("INSERT INTO pembelian_produk(
            //   id_pembelian,id_produk,nama,harga,subharga,jumlah)
            //   VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$subharga','$jumlah')");




          $conn->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah)
                            VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");
        }
        //mengosongkan keranjang belanja
        unset ($_SESSION["keranjang"]);
        //tampilan dialihkan ke halaman nota
          echo "<script>alert('pembelian sukses');</script>";
          echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
      }
    ?>
<!-- <pre><?php print_r ($_SESSION) ?></pre> -->

<?php include './db_user/footer.php' ?>