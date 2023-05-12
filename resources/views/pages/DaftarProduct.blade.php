@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->

  <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Check Our Products</h2>
                        <span>Exporanger &amp; A Place Where You Can Get What You Want</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- ***** Main Banner Area End ***** -->

  <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
          <div class="row">
            @foreach($listProduct as $lp)
              <div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center mb-4">
                  <a href="/detailProduct/{{$lp -> id}}" style="text-decoration: none">
                    <div class="thumb">
                      <img src="{{asset ('storage/images/'.$lp -> foto_barang)}}" alt="{{$lp -> nama_barang}}" width="290px" height="221px" class="rounded">
                    </div>
                    <div class="down-content d-flex justify-content-between align-items-center mt-3">
                      <h4 class="text-capitalize fs-4">{{$lp -> nama_barang}}</h4>
                      <span class="text-secondary fs-4">Rp. {{number_format($lp -> harga_barang, 0)}}</span>
                    </div>
                  </a>
              </div>
              @endforeach
          </div>
        </div>
  </section>

  <!-- footer -->
  <footer>
        @include('parts.footer')
    </footer>
  <!-- end footer -->
@endsection