<?php 
require 'config.php'

 ?>
 <?php 
 include './db_admin/headerboost.php'; 
 include './db_admin/bodynav.php'; ?>

<?php $ambil=$conn->query("SELECT * FROM pembelian JOIN user ON
                pembelian.id_pelanggan=user.id_user
                WHERE pembelian.id_pembelian='$_GET[id]'");
                $detail=$ambil->fetch_assoc() ;?>
                <!-- <pre><?php //print_r($detail) ?></pre> -->

<div class="col-md-10 ">
<div class="tambah">
<h5 class="fw-bold pt-5 text-center pb-5">DETAIL PEMBELIAN</h5>

<div class="row">
  <div class="col-md-4">
    <h5>Pembelian</h5>
    <p>
      Tanggal : <?php echo $detail ['tanggal_pembelian'] ;?><br>
      Total : <?php echo number_format($detail ['total_pembelian']) ;?><br>
      Status Pembelian : <?php echo $detail ['status_pembelian'] ;?>
    </p>
  </div>
  <div class="col-md-4">
    <h5>Pelanggan</h5>
    <strong><?php echo $detail['username'] ?></strong><br>
    <p>
      <?php echo $detail ['email'] ?><br>
      <?php echo $detail ['nohp'] ?>
    </p>
  </div>
  <div class="col-md-4">
    <h5>Pengiriman</h5>
    <strong><?php echo $detail ['nama_kota'] ?></strong><br>
    <p>
     Rp.<?php echo number_format($detail ['tarif']) ?><br>
     <?php echo $detail ['alamat_pengiriman']; ?>
    </p>
  </div>
</div>
  

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












</div></div></div>



<?php include './db_admin/dbfooter.php' ?>