@extends('layout.master')
@section('content')
    <!-- navbar -->
    <div class="fixed-top" data-scrollto-offset="0">
        @include('parts.navbar')
    </div>
    <!-- end navbar -->
    
    <!-- form request pick up -->
    <div class="container d-flex justify-content-center">
        <div class="card" style="margin-top: 150px; width:42rem;">
        <h5 class="card-header text-dark">Detail permintaan pick up - <span class="fw-light">{{$detailpermintaan -> status_pickup}}</span></h5>
            <div class="card-body">
                <form class="row g-3" action="" method="POST">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fst-normal text-dark">Nama toko</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="nama toko anda" name="nama_toko" value="{{$detailpermintaan -> nama_toko}}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fst-normal text-dark">Nama produk</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="nama produk yang akan di pick up" name="nama_produk" value="{{$detailpermintaan -> nama_produk}}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fst-normal text-dark">Alamat penjemputan</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="alamat penjemputan produk" name="alamat_penjemputan" value="{{$detailpermintaan -> alamat_penjemputan}}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fst-normal text-dark">No. telpon</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Nomor telpon" name="no_telpon" value="{{$detailpermintaan -> no_telpon}}" disabled>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label fst-normal text-dark mb-3">Jenis pengimiram cargo</label> 
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_cargo" disabled id="inlineRadio1" value="General" {{ $detailpermintaan->jenis_cargo === 'General' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_cargo"  disabled id="inlineRadio2" value="Special" {{ $detailpermintaan->jenis_cargo === 'Special' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Special</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_cargo"  disabled id="inlineRadio2" value="Irregularity" {{ $detailpermintaan->jenis_cargo === 'Irregularity' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Irregularity</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_cargo" disabled id="inlineRadio2" value="Dangerous" {{ $detailpermintaan->jenis_cargo === 'Dangerous' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Dangerous</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Waktu Penjemputan</label>
                        <select class="form-select" aria-label="Default select example" name="waktu_penjemputan" disabled>
                            <option selected>Open this select menu</option>
                            <option value="Pukul 05.00-07.00" @if($detailpermintaan -> waktu_penjemputan == "Pukul 05.00-07.00") selected @endif>Pukul 05.00-07.00</option>
                            <option value="Pukul 10.00-12.00" @if($detailpermintaan -> waktu_penjemputan == "Pukul 10.00-12.00") selected @endif>Pukul 10.00-12.00</option>
                            <option value="Pukul 14.00-16.00" @if($detailpermintaan -> waktu_penjemputan == "Pukul 14.00-16.00") selected @endif>Pukul 14.00-16.00</option>
                            <option value="Pukul 19.00-21.00" @if($detailpermintaan -> waktu_penjemputan == "Pukul 19.00-21.00") selected @endif>Pukul 19.00-21.00</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Tanggal Penjemputan</label>
                        <input type="date" class="form-control" id="inputPassword4" name="tanggal_penjemputan" value="{{ $detailpermintaan -> tanggal_penjemputan }}" disabled>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label fst-normal text-dark">Detail Produk</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail_produk" placeholder="cantumkan detail produk dengan jelas agar produk anda aman" disabled>{{$detailpermintaan -> detail_produk}}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end form request pick up -->

    <!-- footer -->
    <footer>
        @include('parts.footer')
    </footer>
    <!-- end footer -->
  @endsection