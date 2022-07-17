<?php 
require 'config.php'

 ?>
 <?php 
 include './db_admin/headerboost.php'; 
 include './db_admin/bodynav.php'; ?>

<div class="col-md-10 ">
<div class="tambah">


    <h4 class="fw-bold text-center pt-4 pb-5">DATA PEMBELIAN</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Status Pembelian</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$conn->query("SELECT * FROM pembelian JOIN user ON
                pembelian.id_pelanggan=user.id_user");?>
            
            <?php while ($pecah=$ambil->fetch_assoc()){ ?>
        <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['username']; ?></td>
                <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                <td><?php echo $pecah['status_pembelian']; ?></td>
                <td><?php echo $pecah['total_pembelian']; ?></td>
                <td>
                    <a href="admindetailpembelian.php?&id=<?php echo $pecah ['id_pembelian'];?>" class="btn btn-info">Detail</a>

                    <?php if ($pecah['status_pembelian']!=="pending"): ?>
                        <a href="adminpembayaran.php?&id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-success">Lihat Pembayaran</a>         
                    <?php endif ?>
                </td>
                      
             
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
        </tbody>
    </table>


</div></div></div>



<?php include './db_admin/dbfooter.php' ?>