<header class="ud-header">
 <nav class="navbar navbar-expand-lg bg-info" id="navbar" >
  <div class="container">
      <a href="/" class="navbar-brand d-flex align-items-center scrollto me-auto me-lg-0">
          <img src="{{url ('/assets/img/logo.png')}}" alt="logo">
        </a>
      <button class="navbar-toggler">
        <span class="toggler-icon"> </span>
        <span class="toggler-icon"> </span>
        <span class="toggler-icon"> </span>
      </button>
      @guest
      <div class="navbar-collapse">
          <ul id="nav" class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="ud-menu-scroll" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href="#about">Location</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href="#pricing">Product</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href="#team">Review</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href="#contact">Be Our Partner</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href="#"></a>
            </li>
          </ul>
      </div>
      <div class="navbar-btn d-sm-inline-block me-5 me-sm-auto">
        <a class="ud-main-btn ud-white-btn" href="/login">
          Sign in
        </a>
      </div>  
      @endguest

      @if(Auth::check() && Auth::user()->isAdmin())
       <div class="navbar-collapse">
          <ul id="nav" class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="ud-menu-scroll" href="/">Pengimpor</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href=""></a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href="#pricing">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href=""></a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href="#contact">Pengekspor</a>
            </li>
          </ul>
      </div>
      <div class="navbar-btn d-none d-sm-inline-block me-5">
        <div class="dropdown">
          <button class="ud-main-btn ud-white-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/verifikasi">Verifikasi kelayakan</a></li>
            <li><a class="dropdown-item" href="/permintaanpickup">Permintaan pick up</a></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div>
      </div>
      @endif

      @if(Auth::check() && Auth::user()->isImportir())
      <div class="navbar-collapse">
          <ul id="nav" class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="ud-menu-scroll" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href=""></a>
            </li>
            <li class="nav-item dropdown">
              <a class="ud-menu-scroll dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Product
              </a>
              <ul class="dropdown-menu">
                <li><a class=" ud-menu-scroll dropdown-item" href="/product">Daftar produk</a></li>
                <li><a class=" ud-menu-scroll dropdown-item" href="/daftarRequest">Daftar Request</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href=""></a>
            </li>
            <li class="nav-item dropdown">
              <a class="ud-menu-scroll dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pesanan
              </a>
              <ul class="dropdown-menu">
                <li><a class=" ud-menu-scroll dropdown-item" href="/pesanan">Daftar pesanan</a></li>
                <li><a class=" ud-menu-scroll dropdown-item" href="/daftarPickup">Pesanan sedang di pick up</a></li>
              </ul>
            </li>
          </ul>
      </div>
      <div class="navbar-btn d-none d-sm-inline-block me-5">
        <div class="dropdown">
          <button class="ud-main-btn ud-white-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div>
      </div>
      @endif

      @if(Auth::check() && Auth::user()->isEksportir())
      <div class="navbar-collapse">
          <ul id="nav" class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="ud-menu-scroll" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href=""></a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href="#pricing">Negara</a>
            </li>
            <li class="nav-item">
              <a class="ud-menu-scroll" href=""></a>
            </li>
            <li class="nav-item dropdown">
              <a class="ud-menu-scroll dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Product
              </a>
              <ul class="dropdown-menu">
                <li><a class=" ud-menu-scroll dropdown-item" href="/product">Daftar produk</a></li>
                <li><a class=" ud-menu-scroll dropdown-item" href="/daftarRequest">Request para importir</a></li>
                <li><a class=" ud-menu-scroll dropdown-item" href="/addproduct">Tambah produk</a></li>
              </ul>
            </li>
          </ul>
      </div>
      <div class="navbar-btn d-none d-sm-inline-block me-5">
        <div class="dropdown">
          <button class="ud-main-btn ud-white-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/pickup">Pick up</a></li>
            <li><a class="dropdown-item" href="/permintaanrevisi">Product perlu direvisi</a></li>
            <li><a class="dropdown-item" href="/pencairanDana">Pencairan dana</a></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div>
      </div>
      @endif
    </div>
  </nav>
</header>


 