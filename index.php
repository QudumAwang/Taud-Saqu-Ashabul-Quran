<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Taud Saqu Ashabul Quran</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Taud Saqu Ashabul Quran</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="index.php" class="active">Home<br></a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="pelajaran.php">Pelajaran</a></li>
            <li><a href="kelas.php">Kelas</a></li>
            <li><a href="acara.php">Acara</a></li>
            <li><a href="kontak.php">Kontak</a></li>
            <li class="dropdown" id="dftr"><a href="#" id="dftr"><span class="toggle-dropdown" id="dftr">Pendaftaran</span></a>
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

    <section id="hero" class="hero section dark-background">
      <img src="assets/img/image.png" loading="lazy" alt="" data-aos="fade-in">
      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Learning Today,<br>Leading Tomorrow</h2>
        <p data-aos="fade-up" data-aos-delay="200"></p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <!--<a href="#dftr" class="btn-get-started">Daftar<i class="bi bi-chevron-right"></i></a>-->
        </div>
      </div>
    </section>

    
    <section id="tentang" class="tentang section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/tentang.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Taud Saqu Ashabul Quran</h3>
            <p class="fst-italic">
              Sekolah TAUD Saqu Ashabul Quran adalah lembaga pendidikan yang berfokus pada pembelajaran Al-Quran sejak usia 
              dini. Sekolah ini menyediakan program pendidikan yang mengintegrasikan kurikulum formal dengan pendidikan 
              agama, terutama tahfiz Al-Quran. Dengan guru-guru yang kompeten dan berdedikasi, sekolah ini menerapkan metode 
              pengajaran yang interaktif dan menyenangkan untuk anak-anak, sehingga mereka dapat menghafal Al-Quran dengan 
              mudah dan menyenangkan.
            </p>
          </div>
        </div>
      </div>
    </section>

    
    <section id="counts" class="section counts light-background">
    <?php
    include('config.php');

    $siswaResult = $conn->query("SELECT COUNT(*) AS count FROM DataSiswa");
    $siswa = $siswaResult->fetch_assoc()['count'];
    
    $pelajaranResult = $conn->query("SELECT COUNT(*) AS count FROM pelajaran");
    $pelajaran = $pelajaranResult->fetch_assoc()['count'];

    $acaraResult = $conn->query("SELECT COUNT(*) AS count FROM acara");
    $acara = $acaraResult->fetch_assoc()['count'];

    $kelasResult = $conn->query("SELECT COUNT(*) AS count FROM kelas");
    $kelas = $kelasResult->fetch_assoc()['count'];

    $conn->close();
    ?>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $siswa ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Murid</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $pelajaran ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>pelajaran</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $acara ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Acara</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $kelas ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Kelas</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    
    <section id="why-us" class="section why-us">
      <div class="container">
        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Kenapa Harus Sekolah disini?</h3>
              <p>
                Memilih Taud ini penting untuk perkembangan awal anak karena menawarkan kurikulum. Guru-guru yang kompeten dan berdedikasi mengajar dalam lingkungan yang aman dan nyaman. Taud ini juga melibatkan orang tua secara aktif, menyediakan fasilitas modern, dan menerapkan pendekatan personal. Taud ini memastikan anak-anak siap melanjutkan pendidikan dengan kepercayaan diri dan keterampilan yang diperlukan.
              </p>
              <div class="text-center">
                <a href="tentang.php" class="more-btn"><span>Lebih Lanjut</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

              <div class="col-xl-4" onclick="window.location.href='#profil-guru';" style="cursor: pointer;">
                <div href="#profil-guru" class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Pengajar Profesional</h4>
                  <p>Pengajar telah mendapat sertifikasi dari PC TAUD Pusat Wadi Mubarok Bogor</p>
                </div>
              </div>

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300" onclick="window.location.href='pelajaran.php';" style="cursor: pointer;">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Kurikulum Berkualitas</h4>
                  <p>Pembelajaran Tahfizhul qur'an intensif dengan Kurikulum Jelas</p>
                </div>
              </div>

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400" onclick="window.location.href='kelas.php';" style="cursor: pointer;">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Ruang kelas nyaman</h4>
                  <p>Ruang kelas ber AC dan kondusif</p>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>


    <section id="pelajaran" class="pelajaran section">
      <div class="container section-title" data-aos="fade-up">
        <h2>pelajaran</h2>
        <p>Pelajaran Populer</p>
      </div>

      <div class="container">
        <div class="row">
          <?php
            include('config.php');
            $result = $conn->query("SELECT * FROM pelajaran");
      
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-4 col-md-6 d-flex align-items-stretch' data-aos='zoom-in' data-aos-delay='100'>
                            <div class='course-item'>
                              <img src='images/{$row['image']}' loading='lazy' class='img-fluid' alt=''>
                                <div class='course-content'>
                                  <h3>{$row['namaPelajaran']}</h3>
                                    <p class='description'>{$row['deskripsi']}</p>
                                      <div class='trainer d-flex justify-content-between align-items-center'>
                                        <div class='trainer-profile d-flex align-items-center'>
                                          <img src='' class='img-fluid' alt=''>
                                        </div>
                                      </div>
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

    
    <section id="kelas-index" class="section kelas-index" >
      <div class="container" id="profil-guru">
        <div class="row">

          <?php
            include('config.php');
              $result = $conn->query("SELECT * FROM guru");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<div class='col-lg-4 col-md-6 d-flex' data-aos='fade-up' data-aos-delay='100'>
                              <div class='member'>
                                <img src='' loading='lazy' class='img-fluid' alt=''>
                                  <div class='member-content'>
                                    <h4>{$row['namaGuru']}</h4>
                                    <span>{$row['kelas']}</span>
                                    <p>{$row['deskripsi']}</p>
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