<?php 
include 'config.php';

session_start();
error_reporting(0);




if (isset($_POST['submit'])){
    $email = $_POST ['email'];
    $password = md5($_POST ['password']);

    
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";  
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0 ) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['id_user']= $row['id_user'];
        $_SESSION['username']= $row['username'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['nohp'] = $row['nohp'];
        $_SESSION ['password'] = $row['password'];
        $_SESSION["login"]=true;
//user/admin
        if ($row['level']=="admin"){
          header("location:admin.php") ;

        }else if ($row['level']==""){
          header("location:l1.php");
        }

        
    }else {
      echo  "<script>alert('Woops! Email atau Password yang anda masukkan salah.')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/stylelogin.css" />
    
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="text1">Login</div>
      <form action="" method="POST">
        <input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" autocomplete="off"  required/></br>
       
        <input type="password" name="password" placeholder="Password"  value="<?php echo($_POST ['password'])  ?>" required/>
        
        <button name="submit">Masuk</button>
      </form>
      
      <img src="image/icon2.png" alt="">

     <div class="linked">Belum Punya Akun&nbsp;&nbsp;<a href="daftar.php">Daftar</a></div>
     
    </div>
  </body>
</html>
