@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->

  <!-- ====== Hero Start ====== -->
  <section class="ud-hero" id="home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
              <h1 class="ud-hero-title">EKSPORANGER</h1>
              <p class="ud-hero-desc">
                Aplikasi Website Ekspor yang Menjadi Jembatan Antara Produsen
                dan Mitra Peusahaan Pembeli
              </p>
            </div>
            <div
              class="ud-hero-brands-wrapper wow fadeInUp"
              data-wow-delay=".3s"
            >
              <img src="assets/img/logo.png" alt="brand" />
            </div>
            @guest
            <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
              <img src="assets/img/sign.png" alt="hero-image" />
              <!-- <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-1"
              />
              <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-2"
              /> -->
            </div>
             @endguest

             @if(Auth::check() && Auth::user()->isAdmin())
             <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
              <img src="assets/img/admin.png" alt="hero-image" />
              <!-- <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-1"
              />
              <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-2"
              /> -->
            </div>
             @endif

             @if(Auth::check() && Auth::user()->isImportir())
            <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
              <img src="assets/img/impor.png" alt="hero-image" />
              <!-- <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-1"
              />
              <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-2"
              /> -->
            </div>
             @endif

              @if(Auth::check() && Auth::user()->isEksportir())
              <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
              <img src="assets/img/ekspor.png" alt="hero-image" />
              <!-- <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-1"
              />
              <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-2"
              /> -->
            </div>
              @endif
          </div>
        </div>
      </div>
  </section>
  <!-- ====== Hero End ====== -->

  <!-- footer -->
  <footer>
        @include('parts.footer')
    </footer>
  <!-- end footer -->
  
@endsection