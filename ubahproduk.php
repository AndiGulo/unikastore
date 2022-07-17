<?php 

session_start();
error_reporting(0);

if (!isset($_SESSION["login"])){
  header("location:login.php");
  exit;
}


    require ('config.php');

    //ambil data
    $id =$_GET["id"];
   

    //query data produkku
    $pdk = query("SELECT * FROM produk WHERE id =$id ")[0];
    

    if (isset($_POST["submit"]) ){



    //upload gambar
    $gambar =upload();
    if  (!$gambar){ 
      return false;
    }


        if (ubah($_POST) >0 ){
            echo "<script>
                alert('data Berhasil Diubah')
                document.location.href = 'db_produk.php';</script>";
            } else {
                echo "<script>
                alert('data Berhasil Diubah')
                document.location.href = 'db_produk.php';</script>";
                
              }   
            }

?>

<?php 
include ("./db_admin/headerboost.php") ?>
<div class="col-md-10 ">
<div class="tambah"><div class="mt-2 ">

<form action="" method="post" class="col-4  ">
        <h4 class="text-center">UBAH DATA PRODUK</h4>
        <input type="hidden" name="id" value="<?= $pdk["id"];?>">
        <label for="namaproduk" class="form-label ">Nama Produk</label>
        <input type="text" class="form-control" name="namaproduk"  id="namaproduk" required value="<?= $pdk["namaproduk"];?>">  
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi"  id="deskripsi" required value="<?= $pdk["deskripsi"];?>">  

        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" name="harga"  id="harga" required value="<?= $pdk["harga"];?>">  

        <label for="gambar" class="form-label">Gambar</label>
        <input type="File" class="form-control" name="gambar"  id="gambar" required >  
        </div>
        <div class="float-left p-5 ms-5 ">
        <a class="btn btn-secondary"  href="db_produk.php" role="button" >Batal</a>
        <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
      
        </div>
        </div>
        </form> </div>
    </div></div>
 


<?php 
include ("./db_admin/dbfooter.php") ?>
