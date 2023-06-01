@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product" style="margin-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-7 mx-auto">
                    <div class="card" style="width: 36rem;">
                    <img src="{{asset ('storage/images/'.$detailpesanan -> product -> foto_barang)}}" class="card-img-top" alt="{{$detailpesanan -> nama_barang}}">
                        <div class="card-body">
                            <h3 class="card-title">{{$detailpesanan -> product -> nama_barang}}</h3>
                            <hr>
                            <p class="card-text">{{$detailpesanan -> product -> deskripsi_barang}}</p>
                            <hr>
                            <div class="row">
                                <div class="col-6 description">
                                    <img
                                        src="{{URL ('assets/img/ic_event.png')}}"
                                        alt="event"
                                        class="features-image"
                                    />
                                    <h5>Status pemesanan</h5>
                                    <input type="text" readonly class="form-control-plaintext font-weight-bold" value="{{$detailpesanan -> status_pemesanan}}">
                                </div>
                                <div class="col-6 description">
                                    <img
                                        src="{{URL ('assets/img/ic_event.png')}}"
                                        alt="event"
                                        class="features-image"
                                    />
                                    <h5>Harga barang</h5>
                                    <input type="text" readonly class="form-control-plaintext font-weight-bold" value="Rp. {{number_format($detailpesanan -> harga,0)}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header fw-bold text-dark">
                            Detail pemesanan
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Nama pemesan</label>
                                    <input type="text" readonly class="form-control-plaintext" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$detailpesanan -> nama_pemesan}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fw-bold text-dark">Email</label>
                                    <input type="email" readonly class="form-control-plaintext" id="exampleInputPassword1" value="{{$detailpesanan -> email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fw-bold text-dark">Nomor handphone</label>
                                    <input type="text" readonly class="form-control-plaintext" id="exampleInputPassword1" value="{{$detailpesanan -> no_telpon}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fw-bold text-dark">Jumlah pemesanan</label>
                                    <input type="text" readonly class="form-control-plaintext" id="exampleInputPassword1" value="{{$detailpesanan -> jumlah_pemesan}} Kg">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    <footer>
        @include('parts.footer')
    </footer>
  @endsection