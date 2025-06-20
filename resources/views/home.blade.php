<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SISTEM INFORMASI TUMBUH KEMBANG BALITA DI POSYANDU DESA KIDANG</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('images/logo-posyandu.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&family=Poppins:wght@100;400;700;900&family=Raleway:wght@100;400;700;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-center">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
         <img src="{{ asset('images/logo-posyandu.png') }}" alt="" srcset="" width="60px" height="150px">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Utama<br></a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#">Hubungi Kami</a></li>
            <li><a href="#contact">Lokasi</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn d-none d-sm-block" href="/admin">Sign In</a>
      </div>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
      <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">
      <div class="container position-relative">
        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h2 class="text-start" style="max-width: 600px;">
            Selamat Datang Di Sistem Informasi Tumbuh Kembang Balita Di POSYANDU Desa Kidang
          </h2>
          <p>Sebuah Sistem informasi yang menyajikan inforasi perkembangan balita sacara lengkap dan aktual</p>
        </div>

        <div class="content row gy-4">
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="d-flex flex-column justify-content-center">
              <div class="row gy-4">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                    <i class="bi bi-clipboard-data"></i>
                    <h4>Cek Gizi Anak Balita</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                    <i class="bi bi-gem"></i>
                    <h4>Pola Makan Bergizi</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                    <i class="bi bi-inboxes"></i>
                    <h4>Edukasi Balita Usia Dini</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container">
        <div class="row gy-4 gx-5">
          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('images/doctor.png') }}" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Tentang Kami</h3>
            <p>Posyandu Desa Kidang menyediakan layanan kesehatan yang lengkap...</p>
            <ul>
              <li><i class="bi bi-check-circle-fill"></i>
                <div>
                  <h5>Fasilitas yang nyaman dan bersih</h5>
                  <p>Fasilitas yang nyaman dan bersih</p>
                </div>
              </li>
              <li><i class="bi bi-check-circle-fill"></i>
                <div>
                  <h5>Tenaga kesehatan yang sigap dan cekatan</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li>
              <li><i class="bi bi-check-circle-fill"></i>
                <div>
                  <h5>Pelayanan yang ramah</h5>
                  <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam</p>
                </div>
              </li>
              <li><i class="bi bi-check-circle-fill"></i>
                <div>
                  <h5>Terjangkau serta mudah</h5>
                  <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center text-center">
          
          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <i class="fa-solid fa-user-doctor fa-3x mb-2"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahLaki }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Laki-laki</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <i class="fa-regular fa-hospital fa-3x mb-2"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahPerempuan }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Perempuan</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <i class="fas fa-flask fa-3x mb-2"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="{{ $totalBalita }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Total Balita</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Lokasi</h2>
        <p>Lokasi Posyandu Pemeriksaan Anak Usia Dini (Balita)</p>
      </div>
      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31540.878597283954!2d116.33382171083984!3d-8.822675499999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdab3075dbbaef%3A0xee39106dc60586f!2sKANTOR%20KEPALA%20DESA%20KIDANG!5e0!3m2!1sid!2sid!4v1750421351615!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer light-background">
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Medilab</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- JS -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
