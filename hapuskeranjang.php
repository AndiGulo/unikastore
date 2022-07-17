<?php 
session_start();
$id =$_GET ["id"];
unset ($_SESSION["keranjang"][$id]);

    echo "<script>alert ('data berhasil dihapus');</script>";
    echo"<script>location='keranjang.php';</script>" ;
 ?>