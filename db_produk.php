<?php 
session_start();

if (!isset($_SESSION["login"])){
  header("location:login.php");
  exit;
}
require ("./config.php") ;



$result = mysqli_query($conn, "SELECT  * FROM produk ORDER BY id DESC");



if (isset($_POST["submit"]) ){
     

  $namaproduk = htmlspecialchars($_POST ["namaproduk"]);
  $deskripsi  = htmlspecialchars($_POST ["deskripsi"]);
  $harga      = htmlspecialchars($_POST ["harga"]);
  


    //upload gambar
    $gambar =upload();
    if  (!$gambar){ 
      return false;
    }

      $query = "INSERT INTO produk
                 VALUES
                  ('','$namaproduk','$deskripsi','$harga','$gambar')
                  ";

            mysqli_query($conn,$query);

      if (mysqli_affected_rows($conn)>0){
        echo "<script>
                alert('data Berhasil Ditambahkan')
                document.location.href = 'db_produk.php';</script>";

      } else {
        echo "<script>
        alert('data Gagal Ditambahkan')
        document.location.href = 'db_produk.php';</script>";
        
      }


}


?>

<?php 
include ("./db_admin/headerboost.php") ?>
<?php 
include './db_admin/bodynav.php' ?>
<div class="col-md-10 ">
<div class="tambah"><div class="position-relative mt-2 float-start">
  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah Produk</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="" method="post" enctype="multipart/form-data">
       <label for="namaproduk" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" name="namaproduk"  id="namaproduk" autocomplete="off" required>  

    <label for="deskripsi" class="form-label">Deskripsi</label>
    <input type="text" class="form-control" name="deskripsi"  id="deskripsi" autocomplete="off" required>  

   <label for="harga" class="form-label">Harga</label>
    <input type="number"  class="form-control" name="harga" placeholder="Rp." id="harga"  autocomplete="off"  required>  
    

    <label for="gambar" >Gambar</label>
   <input type="file" class="form-control" name="gambar" id="gambar">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">keluar</button>
        <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
      
      </div>
      </div>
    </form> </div>
</div></div>


      <div class="  pt-2  m-auto"><div class="text p-4 fw-bold text-decoration-underline text-center">DATABASE PRODUK</div>

      <table class="table table table-bordered ">
  <thead>
    <tr class="table-success ">
      <th scope="col">No</th>
      <th scope="col">namaproduk</th>
      <th scope="col">deskripsi</th>
      <th scope="col">harga</th>
      <th scope="col">gambar</th>
      <th></th>
      
    </tr>
  </thead>  

  <?php $i = 1; ?>
  <?php while($row = mysqli_fetch_assoc($result)): ?>
      <th scope="row" class="text-center"><?= $i; ?></th>
      <td><?= $row["namaproduk"]; ?></td>
      <td><?= $row["deskripsi"]; ?></td>
      <td>Rp.<?=  number_format ($row  ["harga"]); ?></td>
      <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="170px;" height="170px;"></td>
      <td class="float-left">
      <a class="btn btn-warning " style="font-size:8px;color:white;" href="hapusproduk.php?id=<?= $row["id"]; ?>" role="button" onclick="
      return confirm('Yakin Mau Menghapus');">Hapus</a>
      <a class="btn btn-danger " style="font-size:8px; " href="ubahproduk.php?id=<?= $row["id"]; ?>" role="button" >Ubahh</a>
    </td>
    </tr>
    
  <?php $i++; ?>

    <?php endwhile; ?>
</table> 

<?php 
include ("./db_admin/dbfooter.php") ?>

