<?php include 'config.php' ?>
<?php 
    //mendapatkan id_produk dari url
    $id_produk =$_GET['id'];

    //query ambil data
    $ambil = $conn->query("SELECT * FROM produk WHERE id='$id_produk'");
    $detail =$ambil->fetch_assoc();
    
    // echo "<pre>";
    // print_r($detail);
    // echo "</pre>"
      
    
        ?>

 
<?php include './db_user/headeruser.php';
     include './db_user/navuser.php' ?>
   <div class="gogo" >.</div>
    <section class="konten">
        <div class="container  " >
            <div class="row " style="box-sizing:border-box ;">
                <div class="col-md-6"> 
                    <img src="img/<?php echo $detail['gambar'] ?>" alt="" class="img-resposive" width="400px;" height="400px;">
                </div>
                <div class="col-md-6 ">
                    <h2 ><?php echo $detail ["namaproduk"] ?></h2> <br><br>
                    <h4>Rp.<?php echo number_format ($detail["harga"]) ?></h4>
                    <p class="deskripsi1"><?php echo $detail ["deskripsi"] ?></p>
         <a href="l1.php" class="btn btn-light">Kembali Belanja</a>          
        <a   href="pembelian.php?id=<?php echo $detail['id'];  ?>" class=" tombol btn btn-warning"style="font-size:16px;">Beli Produk </a></div>
                </div>
            </div>
        </div>
    </section>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>