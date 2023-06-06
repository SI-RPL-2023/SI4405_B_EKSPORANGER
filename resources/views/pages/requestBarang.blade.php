@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->

  <!-- form verifikasi -->
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-6">
                <img src="{{url ('/assets/img/ekspor.jpg')}}" alt="gambar login" width="588px" height="487px">
            </div>
            <div class="col-md-5 ms-4">
                <h1 class="fw-bold">Request Barang</h1>
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
                <form method="POST" action="" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="nama_barang" name="kategori" placeholder="Masukan kategori Barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Nama produk</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_produk" placeholder="Masukan Nama Barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">jumlah</label>
                        <input class="form-control" type="number" id="harga_barang" name="jumlah" placeholder="masukan jumlah barang">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Detail Produk</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail_produk" placeholder="masukan detail barang"></textarea>
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-dark" tabindex="-1" role="button" style="width: 140px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <!-- end form verifikasi -->

  <!-- footer -->
  <footer>
        @include('parts.footer')
    </footer>
  <!-- end footer -->
@endsection