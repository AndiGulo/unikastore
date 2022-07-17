<?php 
 $server = "localhost";
 $user = "root";
 $pass = "";
 $database = "unikaku";
 

 $conn = mysqli_connect($server,$user,$pass,$database);


       function query($query)  {
              global $conn;
              $result = mysqli_query($conn,$query);
              $rows=[];     
              while ($row = mysqli_fetch_assoc($result)){
                     $rows[] =$row;
              }
              return $rows;
       }    

 if (!$conn) {
        die(" <script>alert ('periksa koneksi anda.')</script>");
 }

//hapus
 function hapus ($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM produk WHERE  id =$id");
        return mysqli_affected_rows($conn);
 }

//ubah

function ubah ($data){
        global $conn;
  $id         = $_POST["id"];
  $namaproduk = htmlspecialchars($data ["namaproduk"]);
  $deskripsi  = htmlspecialchars($data ["deskripsi"]);
  $harga      = htmlspecialchars($data ["harga"]);
  $gambar     = htmlspecialchars($data ["gambar"]);

      $query = "UPDATE produk SET 
                     namaproduk= '$namaproduk',
                     deskripsi = '$deskripsi',
                     harga     = '$harga',
                     gambar    = '$gambar'
                     WHERE id =$id
                     ";

            mysqli_query($conn,$query);

      if (mysqli_affected_rows($conn));
 }


 function upload () {
       $namafile  =$_FILES['gambar']['name'];
       $ukuranfile=$_FILES['gambar']['size'];
       $error     =$_FILES['gambar']['error'];
       $tmpName   =$_FILES['gambar']['tmp_name'];
      

       if($error=== 4) {
              echo"<script>
                     alert('Pilih Gambar Terlebih Dahulu');
              </script>";
              return false;
       }

       //ngecek yg diupload gambar
       $ekstensiGambarValid = ['jpg','jpeg','png'];
       $ekstensiGambar = explode('.',$namafile );
       $ekstensiGambar = strtolower(end ( $ekstensiGambar));
       if (!in_array($ekstensiGambar,$ekstensiGambarValid)){
              echo"<script>
              alert('Yang Anda Upload Bukan Gambar');
           
       </script>";
       echo "<script>location='db_produk.php'</script>";

       return false;

       }
       //ukuran gambar terlalu besar
       if ( $ukuranfile >1000000) {
              echo"<script>
              alert('Ukuran Gambar Terlalu Besar');
       </script>";
       echo "<script>location='db_produk.php'</script>";
       return false;

       }
       //jika lolos  gambar siap di upload
       move_uploaded_file($tmpName,'img/'. $namafile);

       return $namafile;
}


// function cari ($keyword){
//        $query = "SELECT * FROM produk 
//                      WHERE
//                      namaproduk ='$keyword'
//                      ";
//        return query ($query);
// }

function hapussin ($id) {
       global $conn;
       mysqli_query($conn, "DELETE FROM pembelian WHERE  id_pelanggan =$id");
       return mysqli_affected_rows($conn);
}


?>

