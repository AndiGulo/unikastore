<?php 
  include 'config.php';

  error_reporting(0);

  session_start();
  if (isset($_SESSION['username'])) {
    header("location:login.php");
}

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST ['email'];
    $nohp = $_POST ['nohp'];
    $password =md5($_POST ['password']);
    $password2 =md5($_POST ['password2']);

    if ($password == $password2) {
      $sql = "SELECT * FROM user WHERE email='$email'  ";
      $result= mysqli_query($conn, $sql);
      if (!$result->num_rows > 0) {
        $sql ="INSERT INTO user (username, email,nohp, password,level)
              VALUES ('$username','$email','$nohp','$password','$level')";

      $result = mysqli_query($conn, $sql);

      if ($result) 
        {
          echo "<script>alert ('Selamat Akun Anda Sudah Dibuat Silahkan Login.')</script>";
          echo"<script>location='login.php';</script>" ;
          $username = "";
          $email ="";
          $nohp ="";
          $_POST ['password']="";
          $_POST ['password2']="";


        } else {
          echo "<script>alert ('Sepertinya Ada Yang Tidak Beres.')</script>";
        }

      }else {
        
        echo "<script>alert ('Upsss!! Email Sudah Digunakan.')</script>";

      }
      
        }else {
           echo "<script>alert ('Password Yang Anda Buat Tidak Sama.')</script>";
    }
    
  }
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styledaftar.css" />
    
    <title>daftar</title>
  </head>
  <body>
    <div class="container">
      <div class="text1">Daftar</div>
      <form action="" method="POST">
        <input type="text" name="username" placeholder="Username"  value="<?php echo $username ?>" required autocomplete="off"/></br>
        <input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" required autocomplete="off"/></br>
        <input type="number" name="nohp" placeholder="Nomor Hp" value="<?php echo $nohp ?>" required autocomplete="off"/></br>

        <input type="password" name="password" placeholder="Password" value="<?php echo $_POST ['password'] ?>" required autocomplete="off"/></br>
        <input type="password" name="password2" placeholder="Ulangi Password" value="<?php echo $_POST ['password2'] ?>" required autocomplete="off"/><br>
        
        
      <button  name="submit">Daftar</button>
       
      </form>
   

      <img src="image/icon3.png" alt="">
      <div class="linked">Sudah Punya Akun&nbsp;&nbsp;<a href="login.php">Login</a></div>
     
    </div>
  </body>
</html>
