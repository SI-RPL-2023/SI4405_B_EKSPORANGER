@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->

  <!-- table -->
  <div class="container" style="margin-top: 100px;">
    <div class="col-lg-4 mb-4">
        <h1 class="fs-4 mb-3" style="font-weight: 600;">Permintaan Revisi</h1>
        <form class="form-inline search-form d-flex justify-content-end" action="" method="get">
            <input class="form-control me-4" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">search</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">Foto Barang</th>
                <th scope="col" class="text-center">Nama Barang</th>
                <th scope="col" class="text-center">Status Revisi</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">   
            @foreach($listProduct as $lp)
            <tr>
                <td class="text-center"><img src="{{asset ('storage/images/'.$lp -> foto_barang)}}" alt="" width="200px"></td>
                <td class="text-center">{{$lp -> nama_barang}}</td>
                <td class="text-center">{{$lp -> status_kelayakan}}</td>
                <td class="text-center">
                    <a href="/detailProduct/{{$lp -> id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="/updateProduk/{{$lp -> id}}"class="btn btn-warning btn-circle btn-sm button-edit"><i class="fas fa-edit"></i></a>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>  
  <!-- end table -->

  <!-- footer -->
  <footer>
        @include('parts.footer')
    </footer>
  <!-- end footer -->
@endsection