<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Request Pick Up</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy - v1.3.0
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
      <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="https://www.identites-mutuelle.com/sites/default/themes/identite_v2/templates/landing/assets/img/logo.png" alt=""> 
      </a>

      <nav id="navbar" class="navbar">
        <img src="https://www.identites-mutuelle.com/sites/default/themes/identite_v2/templates/landing/assets/img/logo.png" alt="">
        <ul>
          <li><a href="{{ ('pengiriman') }}">Pengiriman</a></li>
          <li><a href="{{ ('pesanan') }}">Pesanan</a></li> 
          <li><a href="{{ ('produk') }}">Produk</a></li>
          <li><a href="{{ ('keuangan') }}">Keuangan</a></li>
          <li><a href="{{ ('data') }}">Data</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="{{ ('login') }}">Login</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  
    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
    <br>
    <br>
      <div class="section-header">
        <p><span>Request Pick Up</span></p>
      </div>
      <div class="card" style="border-radius: 15px;">
        <div class="card-body p-5"> 
          <form>
            <div class="form-outline mb-3">
              <input type="text" id="name" class="form-control form-control-lg" />
              <label class="form-label" for="name">Admin Name</label>
            </div>

            <div class="form-outline mb-3">
              <input type="text" id="number" class="form-control form-control-lg" />
              <label class="form-label" for="number">Number Phone</label>
            </div>

            <div class="form-outline mb-3">
                <input type="text" id="email" class="form-control form-control-lg" />
                <label class="form-label" for="email">Email</label>
              </div>

            <div class="form-outline mb-3">
                <textarea class="form-control" id="alamat" name='alamat' ></textarea>
                <label for="alamat">Address</label>
            </div>

            <div class="d-flex justify-content-between">
              <button type="submit"
                class="btn btn-success btn-block btn-lg text-body" style="background-color: #CE1212;">Submit</button>
            </div>
          </form>
        </div>
      </div> 
      </section><!-- End Book A Table Section -->

      <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>