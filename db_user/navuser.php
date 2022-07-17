<nav class="navbar navbar-expand-lg bg-light shadow-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="">UnikaStore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item dropdown pe-5">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user pe-2" ></i> Akun</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!-- <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li><a class="dropdown-item" href="#">perbaharui</a></li> -->
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="keluar.php">Keluar</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link pe-5" aria-current="page" href="./contact us/contact.php"><i class="fa-solid fa-phone pe-2"></i>Hubungi-Kami</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link pe-5" href="#"><i class="fa-solid fa-store pe-2"></i>Mulai Jualan</a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" href="riwayat.php"><i class="fa-solid fa-clipboard pe-2"></i>Nota</a>
            </li>
          </ul>
          <form class=" d-flex"  action="./search.php" method="get">
            <input type="text" class="form-control me-2" placeholder="Cari baju bekas"  name="keyword"  required />
            <button class="btn btn-outline-success" >Search</button>
          </form>
         
          <div class="keranjang" ><a href="keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
          </li>
        </div>
      </div>
    </nav>