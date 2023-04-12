@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->
  <section id="product" class="mt-3">
    <div class="container">
        <div class="headline mt-4">
          <div class="row">
            <div class="col-lg-8">
              <h1 class="fs-3">Daftar Product</h1>
              <hr align="left" width="400px">
            </div>
            <div class="col-lg-4 ">
                <form class="form-inline search-form d-flex justify-content-end " action="" method="get">
                  <input class="form-control me-4" type="search" name="cari" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">search</button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
        @foreach($listProduct as $lp)
          <div
            class="figure col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center mb-3"
          >
            <a href="/detailProduct/{{$lp -> id}}" style="text-decoration: none"
              ><center>
                <img src="{{ asset ('storage/images/'.$lp -> foto_barang) }}" alt="foto product" width="250px" height="200px">
              </center>
              <h1 class="fs-3 fw-medium mt-2 text-dark d-flex justify-content-between">
               {{$lp -> nama_barang}}
                <span class="fs-3" style="font-weight: 600; color: #001D6E"
                  >Rp. {{number_format($lp -> harga_barang, 0)}}</span
                >
              </h1>
              <h3 class="fw-bold fs-5 text-dark">({{$lp -> status_kelayakan}})</h3>
            </a>
          </div>
        @endforeach
        </div>
        </div>
      </div>
    </section>

@endsection