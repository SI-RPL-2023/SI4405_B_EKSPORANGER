<!-- =========

	Template Name: Play
	Author: UIdeck
	Author URI: https://uideck.com/
	Support: https://uideck.com/support/
	Version: 1.1

========== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @guest
      <title>exporanger</title>
    @endguest

    @if(Auth::check() && Auth::user()->isAdmin())
      <title>exporanger - admin</title>
    @endif

    @if(Auth::check() && Auth::user()->isImportir())
      <title>exporanger - importir</title>
    @endif

    @if(Auth::check() && Auth::user()->isEksportir())
      <title>exporanger - eksportir</title>
    @endif

    <link
      rel="shortcut icon"
      href="assets/img/logo-1.png"
      type="image/svg"
    />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">


  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="{{url ('/assets/css/variables.css')}}" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="{{url ('/assets/css/main.css')}}" rel="stylesheet">
  <link href="{{url ('/assets/css/animate.css')}}" rel="stylesheet">
  <link href="{{url ('/assets/css/lineicons.css')}}" rel="stylesheet">
  <link href="{{url ('/assets/css/ud-styles.css')}}" rel="stylesheet">
  <link href="{{url ('/assets/css/exporanger.css')}}" rel="stylesheet">

  <!-- icon -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 
</head>
<body>
    @yield('content')

  <!-- Vendor JS Files -->
  <script src="{{url ('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url ('/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url ('/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url ('/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url ('/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url ('/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{url ('/assets/js/wow.min.js')}}"></script>

    <!-- jQuery -->
    
    <script src="{{url ('/assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{url ('/assets/js/popper.js')}}"></script>
    <script src="{{url ('/assets/js/bootstrap.min.js.js')}}"></script>
    
    <!-- Plugins -->
    <script src="{{url ('/assets/js/bootstrap.min.js.js')}}"></script>
    <script src="{{url ('/assets/js/owl-carousel.js')}}"></script>
    <script src="{{url ('/assets/js/accordions.js')}}"></script>
    <script src="{{url ('/assets/js/datepicker.js')}}"></script>
    <script src="{{url ('/assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{url ('/assets/js/waypoints.min.js')}}"></script>
    <script src="{{url ('/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{url ('/assets/js/imgfix.min.js')}}"></script>
    <script src="{{url ('/assets/js/slick.js')}}"></script>
    <script src="{{url ('/assets/js/lightbox.js')}}"></script>
    <script src="{{url ('/assets/js/isotope.js')}}"></script>
    
    <!-- Global Init -->
    <script src="{{url ('/assets/js/custom.js')}}"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  <!-- Template Main JS File -->
</body>
</html>