@extends('layout.master')
@section('content')
    <!-- navbar -->
    <div class="fixed-top" data-scrollto-offset="0">
        @include('parts.navbar')
    </div>
    <!-- end navbar -->
    <!-- flash message -->
    <div class="container d-flex justify-content-center" style="margin-top: 150px; width:42rem;">
        @if(Session::has('status'))
            @if(Session::get('status') == 'success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(Session::get('status') == 'failed')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @endif
    </div>
    <!-- end flash -->
    <!-- form request pick up -->
    <div class="container d-flex justify-content-center">
        <div class="card" style="width:42rem;">
        <h5 class="card-header text-dark">Request Pick Barang - <span class="fw-light">{{$requestPickup -> product -> nama_barang}} oleh {{$requestPickup -> nama_pemesan}}</span></h5>
            <div class="card-body">
                <form class="row g-3" action="" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fst-normal text-dark">Nama toko</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="nama toko anda" name="nama_toko">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fst-normal text-dark">Nama produk</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="nama produk yang akan di pick up" name="nama_produk" readonly value="{{$requestPickup -> product -> nama_barang}}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fst-normal text-dark">Alamat penjemputan</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="alamat penjemputan produk" name="alamat_penjemputan">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fst-normal text-dark">No. telpon</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Nomor telpon" name="no_telpon" readonly value="{{$requestPickup -> no_telpon}}">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label fst-normal text-dark mb-3">Jenis pengimiram cargo</label> 
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_cargo" id="inlineRadio1" value="General">
                            <label class="form-check-label" for="inlineRadio1">General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_cargo" id="inlineRadio2" value="Special">
                            <label class="form-check-label" for="inlineRadio2">Special</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_cargo" id="inlineRadio2" value="Irregularity">
                            <label class="form-check-label" for="inlineRadio2">Irregularity</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_cargo" id="inlineRadio2" value="Dangerous">
                            <label class="form-check-label" for="inlineRadio2">Dangerous</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Waktu Penjemputan</label>
                        <select class="form-select" aria-label="Default select example" name="waktu_penjemputan">
                            <option selected>Open this select menu</option>
                            <option value="Pukul 05.00-07.00">Pukul 05.00-07.00</option>
                            <option value="Pukul 10.00-12.00">Pukul 10.00-12.00</option>
                            <option value="Pukul 14.00-16.00">Pukul 14.00-16.00</option>
                            <option value="Pukul 19.00-21.00">Pukul 19.00-21.00</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Tanggal Penjemputan</label>
                        <input type="date" class="form-control" id="inputPassword4" name="tanggal_penjemputan" >
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label fst-normal text-dark">Detail Produk</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" readonly rows="3" name="detail_produk">{{$requestPickup -> product -> deskripsi_barang}}</textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input ms-1 me-3" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Data yang saya masukan sudah benar</label>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Request Pick up</button>
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