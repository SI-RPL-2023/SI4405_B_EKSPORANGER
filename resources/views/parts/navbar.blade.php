 <nav class="navbar navbar-expand-lg bg-light header" id="navbar" >
  <div class="container">
     <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <img src="{{url ('/assets/img/logopjg.png')}}" alt="logo">
      </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @guest
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav m-auto">
        <a class="nav-link scrollto color-white me-4" href="#home">Home</a>
        <a class="nav-link scrollto color-white me-4" href="#location">Location</a>
        <a class="nav-link scrollto color-white me-4" href="#product">Product</a>
        <a class="nav-link scrollto color-white me-4" href="#review">Review</a>
        <a class="nav-link scrollto color-white me-4" href="#partners">Be Our Partner</a>
      </div>
      <button type="button" class="btn btn-outline-info btn-getstarted scrollto" onclick="event.preventDefault(); location.href='{{ url('signin') }}';">Sign In</button>
    </div>
    @endguest

    @if(Auth::check() && Auth::user()->isAdmin())
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav m-auto">
        <a class="nav-link scrollto color-white me-4" href="#home">Home</a>
        <a class="nav-link scrollto color-white me-4" href="#location">Pengimpor</a>
        <a class="nav-link scrollto color-white me-4" href="#product">Pengekspor</a>
      </div>
      <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 me-5">
					<div class="dropdown">
						<button class="btn btn-outline-info btn-getstarted scrollto dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							{{Auth::user()->name}}
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<li><a class="dropdown-item" href="/verifikasi">verifikasi kelayakan</a></li>
							<li><a class="dropdown-item" href="/logout">Logout</a></li>
						</ul>
					</div>
					</ul>
    </div>
    @endif

    @if(Auth::check() && Auth::user()->isImportir())
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav m-auto">
        <a class="nav-link scrollto color-white me-4" href="#home">Home</a>
        <a class="nav-link scrollto color-white me-4" href="#product">Product</a>
        <a class="nav-link scrollto color-white me-4" href="#pesanan">Pesanan</a>
      </div>
      <button type="button" class="btn btn-outline-info btn-getstarted scrollto" onclick="event.preventDefault(); location.href='{{ url('logout') }}';">{{Auth::user()->name}}</button>
    </div>
    @endif

     @if(Auth::check() && Auth::user()->isEksportir())
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link scrollto color-white me-4" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link scrollto color-white me-4" href="#negara">negara</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link color-white me-4 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            product
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/addproduct">Tambah product ekspor</a></li>
            <li><a class="dropdown-item" href="/daftarproduct">Daftar product eskpor</a></li>
          </ul>
        </li>
      </ul>
      <button type="button" class="btn btn-outline-info btn-getstarted scrollto" onclick="event.preventDefault(); location.href='{{ url('logout') }}';">{{Auth::user()->name}}</button>
    </div>
    @endif
  </div>
</nav>

 