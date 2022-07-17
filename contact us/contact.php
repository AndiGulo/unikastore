<?php 
session_start();
require '../config.php' ;

 if(isset($_POST['kirim'])){
  mysqli_query($conn,"INSERT INTO pesan SET 
  nama='$_POST[nama]',
  email='$_POST[email]',
  pesan='$_POST[pesan]'");

 echo"<script>alert('Terima Kasih Pesan Anda Sudah Dikirim')</script>";
}
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet" />

    <title>Hubungi Kami</title>
      <!-- cssku -->
    <link rel="stylesheet" href="../css/stylel1.css" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/tooplate-main.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/flex-slider.css" />
  </head>

  <body>
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>UNIKA STORE</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->

    <!-- Page Content -->
    <!-- About Page Starts Here -->
    <div class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Contact Us</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div id="map">
              <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.1890547117723!2d98.6194426140499!3d3.5438200974209866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303125776056f2f9%3A0x5c0b06ec6e0c366!2sUniversitas%20Katolik%20Santo%20Thomas%20Medan!5e0!3m2!1sid!2sid!4v1654082073992!5m2!1sid!2sid"
                width="600"
                height="450"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              >
              </iframe>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <div class="container" style="margin-left: 30px">

                <form id="contact" action="" method="post">
                  <div class="row">
                
                    <div class="col-md-6">
                      <fieldset>
                        <input name="nama" type="text" class="form-control" id="name" placeholder="Nama..." autocomplete="off"required="" />
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" placeholder="email..." required="" />
                      </fieldset>
                    </div>
                    
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="pesan" rows="6" class="form-control" id="message" placeholder="Pesan/komplain..." required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button" name="kirim">Kirim</button>
                      </fieldset>
                    </div>
             
                    <div class="col-md-12">
                      <div class="share">
                        <h6>
                         Kamu juga bisa mengunjungi
                          <span
                            ><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a
                          ></span>
                        </h6>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About Page Ends Here -->

   <!-- footer -->
   <div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>Servis</h3>
                    <ul>
                        <li><a href="#">Desain web</a></li>
                        <li><a href="#">Yang telah mendevelop</a></li>
                        <li><a href="#">Hosting</a></li>
                        <li><a href="#">programming</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3>Tentang</h3>
                    <ul>
                        <li><a href="#">UNIVERSITAS KATOLIK SANTO THOMAS</a></li>
                        <li><a href="#">MEDAN</a></li>
                        <li><a href="#">karir</a></li>
                        <li><a href="#">team</a></li>
                        <li><a href="#">indonesia</a></li>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3>UNIKA STORE</h3>
                    <p style="color:white ;">Ini adalah halaman web yang kami bangun dengan susah payah secara otodidak untuk menambah skill dan wawasan tentang programming language</p>
                </div>
                <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
            </div>
            <p class="copyright" style="color:white;">create with love kelompok 1 © 2022</p>
        </div>
    </footer>
<!-- akhir footer -->
  </body>
</html>
