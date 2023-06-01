@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->
  <div class="container-fluid" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset ('storage/images/'.$detailProduct -> foto_barang)}}" alt="gambar login" width="588px" height="487px">
            </div>
            <div class="col-md-5 ms-4 align-self-center">
                <h1 class="fw-bold mb-4">Update produk {{$detailProduct -> nama_barang}}</h1>
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
                <form method="POST" action="" class="form-input" >
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" required value="{{$detailProduct -> nama_barang}}">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Barang</label>
                        <input class="form-control" type="file" id="formFile" name="foto_barang">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Barang</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi_barang" placeholder="masukan deskripsi barang">{{$detailProduct -> deskripsi_barang}}</textarea>
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-dark" tabindex="-1" role="button" style="width: 140px;">Update</button>
                    </div>
                  </form>               
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        @include('parts.footer')
    </footer>
    <!-- end footer -->
  @endsection