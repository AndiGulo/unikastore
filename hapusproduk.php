<?php 

require ('config.php');
    $id = $_GET["id"];

    if ( hapus($id)> 0) {
        echo "<script>
        alert('data Berhasil Dihapus')
        document.location.href = './db_produk.php';</script>";

        } else {    
        echo "<script>
        alert('data Gagal Dihapus')
        document.location.href = './db_produk.php';</script>";

}

    
?>