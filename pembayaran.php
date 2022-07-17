<?php 
session_start();
include 'config.php'
 ?>

<?php //mendapatkan id pembelian  dari url 
      $idpem =$_GET["id"];
      $ambil=$conn->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
      $detpem=$ambil->fetch_assoc();


      
      //mendapatkan id pelanggan yang beli
      $id_pelanggan_beli = $detpem["id_pelanggan"];
      //mendapatkan id pelanggan yang login
      $id_pelanggan_login=$_SESSION["id_user"];

      if ($id_pelanggan_login !== $id_pelanggan_beli )
      {
        //masukkan id sembarang
        echo "<script>alert('jangan Nakal kamuu');</script>";
        echo "<script>location='riwayat.php';</script>";
        
      }
// echo "<pre>";
// print_r($detpem);
// print_r($_SESSION);
// echo "</pre>";

      ?>

<?php include './db_user/headeruser.php';
        include './db_user/navuser.php' ?><br><br><br>
  
        <div class="container-fluid ">
            <h3>Konfirmasi Pembayaran!</h3>
            <p class="text-secondary">Kirim Pembayaran Anda Disini !!</p>

            <div class="alert alert-info col-md-8">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?>
        </strong></div>

<form method="POST" enctype="multipart/form-data" class="col-md-8 ">
        <div class="form-group ">
          <label>Nama Penyetor</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group mt-4">
          <label>Bank</label>
          <input type="text" class="form-control" name="bank">
        </div>
        <div class="form-group mt-4">
          <label>Jumlah</label>
          <input type="text" class="form-control" name="jumlah" min="1">
        </div>
        <div class="form-group mt-4">
          <label>Foto Bukti</label>
          <input type="File" class="form-control" name="bukti"><br>
          <p>foto bukti berformat JPG maksimal 2 mb</p>
        </div>
        <button class="btn btn-primary mb-4" name="kirim">Kirim</button>
      </form>
      </div>

<?php 

        //jika ada tombol dikirim
        if (isset($_POST["kirim"])) {

            //upload dulu foto bukti
            $namabukti =$_FILES ["bukti"]["name"];
            $lokasibukti=$_FILES["bukti"]["tmp_name"];
            $namafiks = date("YmdHis").$namabukti;
            move_uploaded_file($lokasibukti,"bukti_pembayaran/$namafiks");

            $nama=$_POST["nama"];
            $bank=$_POST["bank"];
            $jumlah=$_POST["jumlah"];
            $tanggal=date("Y-m-d");


            $conn->query("INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti)
                          VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");


            //update data pembayaran dari pending jadi terbayar\
            $conn->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran'  WHERE 
                              id_pembelian='$idpem'");
          //pesan alert
          echo "<script>alert('Terima kasih Sudah Mengirim Bukti Pembayaran');</script>";
          echo "<script>location='riwayat.php';</script>";

        }
?>


     <?php include './db_user/footer.php' ?>

      
  </body>    
    </html>