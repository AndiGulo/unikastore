<?php 

session_start();  
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LamanAwal</title>
</head>
<body>

<?php echo "<h1>Selamat Datang&nbsp;&nbsp;&nbsp;".  $_SESSION['username']."</h1>";?>
    
<a href="keluar.php">Keluar</a>

</body>
</html>