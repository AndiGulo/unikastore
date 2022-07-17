<?php 
require 'config.php'

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/admin.css" />
    <script src="https://kit.fontawesome.com/68a49fac32.js" crossorigin="anonymous"></script>
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
  


 <?php include './db_admin/bodynav.php'; ?>

<!-- pemanggilan zoom gambar -->    



<div class="col-md-10 ">
<div class="tambah">
    <h5 class="fw-bold pt-5 text-center pb-5">DATA PEMBAYARAN</h5>
    <?php 
//mendapatkan pembelian dari url
$id_pembelian=$_GET['id'];

//mengambil data pembayaran berdasarkan id
$ambil = $conn->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail=$ambil->fetch_assoc();


// echo "<pre>";
// print_r ($detail);
// echo "</pre>";



?>

<div class="row ">

<div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td class="fw-bold"><?php echo $detail ['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $detail ['bank'] ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah </th>
                        <td>Rp.<?php echo number_format($detail ['jumlah']) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $detail ['tanggal'] ?></td>
                    </tr>
                </table>
</div>


    <div class="col-md-5">
        <a href="./bukti_pembayaran/<?php echo $detail ['bukti'] ?>" class="perbesar" >
        <img src="./bukti_pembayaran/<?php echo $detail ['bukti'] ?>" alt="" class="image-responsive" width="200">
        </a><table></table>
    </div>
</div>

<form action="" method="post">
    <div class="form-group">
        <label>No Resi Pengiriman</label>
        <input type="text" class="form-control " name="resi">
    </div>
    <div class="form-froup">
        <label >Status</label>
        <select  name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="barang dikirim">Barang Dikirim</option>
            <option value="batal">Batal</option>
        </select>
    </div><br>
     <button class="btn btn-success" name="proses">Proses</button>
</form>
<?php
    if (isset($_POST['proses'])) 
    {
           $resi=$_POST["resi"];
           $status=$_POST["status"];
           $conn->query("UPDATE pembelian SET resi_pengiriman='$resi',status_pembelian='$status'
                            WHERE id_pembelian='$id_pembelian'");

            echo "<script>alert('data pembelian terupdate');</script>";
            echo "<script>location='adminpembelian.php';</script>";
    }
    
?> 


</div></div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>



