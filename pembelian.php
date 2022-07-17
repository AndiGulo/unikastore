<?php 
session_start();
    //mendapatkan produk dari url
    $id = $_GET['id'];

    //jika sudah ada produk itu dikeranjang, maka produk itu jumlahnya +1
        if (isset($_SESSION['keranjang'][$id]))
        {
            $_SESSION['keranjang'][$id]+=1;
        }
    //selain itu (belum ada di keranjang ), maka produk itu dianggap di beli 1
    else {
        $_SESSION ['keranjang'][$id]=1;
    }


    //masuk ke keranjang belanja
    echo "<script>alert ('produk telah dimasukkan didalam keranjang belanja');</script>";
    echo"<script>location='l1.php';</script>" ;
?>