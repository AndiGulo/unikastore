<?php 
session_start();  

require '../config.php';


$querypesan = mysqli_query($conn,"SELECT * FROM pesan ORDER BY id_pesan DESC");


// echo "<pre>";
// print_r($querypesan);
// echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/admin.css" />
    <script src="https://kit.fontawesome.com/68a49fac32.js" crossorigin="anonymous"></script>
  </head>
  
<body>
    <nav class="navbar navbar-expand-lg " style="background-color: #14ee80">
      <div class="container" >
        <a class="navbar-brand" href="#"><img src="../image/logo1.png" alt="" width="150px;" height="80px;" style="position: relative; margin-top: -25px" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item">
              <a class="nav-link ps-md-5" aria-current="page" href="#"><i class="fa-solid fa-bell pe-2"></i>Notifikasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-md-5" href="contactadmin.php"><i class="fa-solid fa-message pe-2"></i>Pesan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-md-5" href="#"><i class="fa-solid fa-lightbulb pe-2"></i>Perencanaan</a>
            </li>
          </ul>
          
          

          <li class="navbar-nav nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-user-gear pe-2"></i>Admin</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#"><i class="fa-solid fa-user-gear pe-2"></i>UNIKASTORE</a>
              </li>
              <!-- <li>
                <a class="dropdown-item" href="#"><i class="fa-solid fa-gear pe-2"></i>pengaturan</a>
              </li> -->
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="../keluar.php "><i class="fa-solid fa-right-from-bracket pe-2"></i>keluar</a>
              </li>
            </ul>
          </li>
        </div>
      </div>
    </nav>
    <div class="EHEM col-md-12 ">
  <div class="row">
    <div class="col-md-2 "> 
        <div class="list-group " >
  <a href="../admin.php" class="list-group-item list-group-item-action col-md-2"><i class="fa-solid fa-users pe-3"></i>Database</a>
  <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-gears pe-3"></i>Menunggu</a>
  <a href="../adminpembelian.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-upload pe-3"></i>Transaksi</a>
  <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-share-from-square pe-3"></i>Tabel Produk</a>
  <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-chart-line pe-3"></i>Analyst</a>
 <a href="../kalender.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-calendar-days pe-3"></i>Kalender</a>

</div>
</div>
<div class="col-md-10  pt-5  ">
    <h4 class="pb-2 text-success"><i class="fa-solid fa-message pe-2"></i>Perpesanan</h4>



    <table class="table  table-bordered border-success">
  <thead>
    <tr class="text-success">
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Pesan</th>
    </tr>
  </thead>
  <tbody >

    <tr>
    <?php $no=1; ?>
    <?php while($pesan = mysqli_fetch_array($querypesan)) { ?>
      <th scope="row"><?php echo $no ?></th>
      <td><?php echo $pesan['nama'] ?></td>
      <td><?php echo $pesan ['email'] ?></td>
      <td><div class="form-floating">
  <textarea class="form-control"  readonly id="floatingTextarea2" style="height: 100px"><?php echo $pesan['pesan'] ?></textarea>

</div></td>
    </tr>
    <?php $no++; ?>
    <?php } ?>
  </tbody>
</table>














</div></div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
</body>
</html>
  
