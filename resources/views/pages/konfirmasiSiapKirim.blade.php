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
        <h5 class="card-header text-dark">Konfirmasi Siap Kirim</span></h5>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">ID pesanan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan id pesanan..." required name="id_transaksi">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Jumlah unit barang</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan jumlah pesanan..." required name="jumlah_unit">
                    </div>
                   <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Dokumen detail revisi</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="dokumen_revisi">
                    </div>
                    <div class="col-12">
                       <input class="form-check-input ms-1 me-3" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                            Barang sudah sesuai dengan tenggat waktu yang diberikan
                        </label>
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