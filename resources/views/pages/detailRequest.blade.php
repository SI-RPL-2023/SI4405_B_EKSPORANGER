@extends('layout.master')
@section('content')
    <!-- navbar -->
    <div class="fixed-top" data-scrollto-offset="0">
        @include('parts.navbar')
    </div>
    <!-- end navbar -->
    <!-- form request pick up -->
    <div class="container d-flex justify-content-center" style="margin-top: 150px;">
        <div class="card" style="width:42rem;">
        <h5 class="card-header text-dark">Detail Request product</h5>
            <div class="card-body">
                <form class="row g-3" action="" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Nama produk</label>
                        <input type="text" class="form-control" readonly value="{{$detailRequest -> nama_produk}}" >
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Kategori</label>
                        <input type="text" class="form-control" readonly value="{{$detailRequest -> kategori}}" >
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Jumlah</label>
                        <input type="number" class="form-control" readonly value="{{$detailRequest -> jumlah}}" >
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label fst-normal text-dark">Detail Produk</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" readonly rows="3" name="detail_produk">{{$detailRequest -> detail_produk}}</textarea>
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