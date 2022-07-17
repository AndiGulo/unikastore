<?php 

require 'config.php';
session_start();
$id =$_GET ["id"];
$conn->query ("DELETE FROM pembelian WHERE id_pembelian='$id'");

    echo "<script>alert ('Terima Kasih Sudah Belanja');</script>";
    echo"<script>location='riwayat.php';</script>" ;
 ?>


                            