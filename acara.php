<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Acara</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  
  <link href="assets/css/main.css" rel="stylesheet">
  
  <style>
  .acara .card {
  background-color: var(--background-color);
  border: 0;
  padding: 0 30px;
  margin-bottom: 60px;
  position: relative;
}

.acara .card-img {
  width: calc(100% + 60px);
  margin-left: -30px;
  overflow: hidden;
  z-index: 9;
  border-radius: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 450px;
}

.acara .card-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: all 0.3s ease-in-out;
}

.acara .card-body {
  z-index: 10;
  background: var(--surface-color);
  border-top: 4px solid var(--surface-color);
  padding: 30px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  margin-top: -60px;
  transition: 0.3s;
}

.acara .card-title {
  font-weight: 700;
  text-align: center;
  margin-bottom: 20px;
}

.acara .card-title a {
  color: var(--default-color);
  transition: 0.3s;
}

.acara .card-text {
  color: color-mix(in srgb, var(--default-color), transparent 30%);
}

.acara .card:hover img {
  transform: scale(1.1);
}

.acara .card:hover .card-body {
  border-color: var(--accent-color);
}

.acara .card:hover .card-body .card-title a {
  color: var(--accent-color);
}



  </style>

</head>

<body class="acara-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Taud Saqu Ashabul Quran</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="index.php">Home<br></a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="pelajaran.php">Pelajaran</a></li>
            <li><a href="kelas.php">Kelas</a></li>
            <li><a href="acara.php" class="active">Acara</a></li>
            <li><a href="kontak.php">Kontak</a></li>
            <li class="dropdown"><a href="#"><span class="toggle-dropdown" id="dftr">Pendaftaran</span></a>
            <ul>
              <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfCMNUpPXp7UKbl-zEVZbMEn9FUM7yPGJR5MiBASN3IrWKupg/viewform?usp=sf_link">Pendaftaran siswa Taud</a></li>
              <li><a href="https://intip.in/FormDaftarAQ/">Pendaftaran Tahfizh</a></li>
              <li><a href="https://forms.gle/Fy2KgMUxtk1H82Do7">Pendaftaran siswa trial</a></li>
            </ul>
          </li>
            <li><a href="admin-login.php">Login Admin</a></li>
            
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    </div>
  </header>

  <main class="main">
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Acara</h1>
              <p class="mb-0">Serangkaian acara yang ada di Taud kami.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Acara</li>
          </ol>
        </div>
      </nav>
    </div>

    
     
     <section id="acara" class="acara section">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <?php
          include('config.php');
          $result = $conn->query("SELECT * FROM acara");

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<div class='col-md-6 d-flex align-items-stretch'>
                          <div class='card'>
                            <div class='card-img'>
                              <img src='images/{$row['image']}' loading='lazy' alt=''>
                            </div>
                            <div class='card-body'>
                              <h5 class='card-title'>{$row['namaAcara']}</h5>
                              <p class='card-text'>{$row['deskripsi']}</p>
                            
                            </div>
                          </div>
                        </div>";
              }
          } else {
              echo "<p>Error</p>";
          }

          $conn->close();
          ?>
          
        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-tentang">
          <a href="index.php" class="logo d-flex align-items-center">
            <span class="sitename">Taud Saqu Ashabul Quran</span>
          </a>
          <div class="footer-kontak pt-3">
            <p>CITY HOME REGENCY blok E No. 9</p>
            <p>Keputih, Sukolilo, Surabaya 60111</p>
            <p class="mt-3"><strong>Telpon:</strong> <span><a href="https://wa.me/6281259417460">+6281259417460</a></span></p>
            <p><strong>Email:</strong> <span>taudsaqusby@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="https://www.facebook.com/p/TAUD-Saqu-Ashabul-Quran-Surabaya-100065108978114/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/taud_ashabul_quran/?hl=id"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="acara.php">Acara</a></li>
            <li><a href="pelajaran.php">Pelajaran</a></li>
            <li><a href="kontak.php">Kontak</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Kelas</h4>
          <ul>
            <li><a href="kelas.php">Kelas Alif (PAUD)</a></li>
            <li><a href="kelas.php">Kelas Ba' (TK A)</a></li>
            <li><a href="kelas.php">Kelas Ta' (TK B)</a></li>
          </ul>
        </div>

        

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Taud Saqu Ashabul Quran</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>