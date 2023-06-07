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
                        <h2 class="text-capitalize">{{$detailProduct -> nama_barang}}</h2>
                        <span>Exporanger &amp; A Place Where You Can Get What You Want</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-7 mx-auto">
                    <div class="card" style="width: 36rem;">
                    <img src="{{asset ('storage/images/'.$detailProduct -> foto_barang)}}" class="card-img-top" alt="{{$detailProduct -> nama_barang}}">
                        <div class="card-body">
                            <h3 class="card-title">{{$detailProduct -> nama_barang}}</h3>
                            @if(Auth::check() && Auth::user()->isEksportir())
                            <p class="fs-6">Status produk : {{$detailProduct -> status_kelayakan}}</p>
                            @endif
                            <hr>
                            <p class="card-text">{{$detailProduct -> deskripsi_barang}}</p>
                            <hr>
                            <img
                                src="{{URL ('assets/img/ic_event.png')}}"
                                alt="event"
                                class="features-image"
                            />
                            <div class="description">
                                <h5>Harga barang</h5>
                                <input type="text" readonly class="form-control-plaintext font-weight-bold" value="Rp. {{number_format($detailProduct -> harga_barang,0)}}">
                            </div>
                            @if(Auth::check() && Auth::user()->isEksportir())
                            <hr>
                           <a href="/updateProduk/{{$detailProduct->id}}" class="btn btn-info" style="width: 100%; color: #fff; background: #0dcaf0;">
                            Update Produk
                        </a>
                        @endif
                        </div>
                    </div>
                </div>
                @if(Auth::check() && Auth::user()->isImportir())
                <div class="col-5">
                    <div class="card">
                        <div class="card-header fw-bold text-dark">
                            Isi data pemesanan
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="produk_dibeli" value="{{$detailProduct -> nama_barang}}">
                                <input type="hidden" value="{{$detailProduct -> harga_barang}}" name="harga">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-normal text-dark">Nama pemesan</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan nama pemesanan..."
                                    name="nama_pemesan">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fw-normal text-dark">Email</label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="masukan email..."
                                    name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fw-normal text-dark">Nomor handphone</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="masukan nomor handphone..."
                                    name="no_telpon">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fw-normal text-dark">Jumlah pemesanan</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="masukan jumlah pemesanan (dalam KG)..."
                                    name="jumlah_pemesan">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label fw-normal text-dark">Masukan bukti pembayaran</label>
                                    <input class="form-control" type="file" id="formFile"
                                    name="bukti_pembayaran">
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-info"
                                    style="width: 100%; color: #fff; background: #0dcaf0;"
                                >
                                    Bayar sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    <footer>
        @include('parts.footer')
    </footer>
  @endsection