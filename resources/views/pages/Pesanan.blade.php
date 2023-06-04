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
        <h1 class="fs-4 mb-3" style="font-weight: 600;">Pesanan Importir</h1>
        <form class="form-inline search-form d-flex justify-content-end" action="" method="get">
            <input class="form-control me-4" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">search</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id pesanan</th>
                <th scope="col">Barang yang dibeli</th>
                <th scope="col">Nomor handphone</th>
                <th scope="col">Harga barang</th>
                <th scope="col">Status pemesanan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">   
            @foreach($listTransaksi as $lt)
            <tr>
                <td>{{$lt -> id}}</td>
                <td>{{$lt -> product -> nama_barang}}</td>
                <td>{{$lt -> no_telpon}}</td>
                <td>Rp. {{number_format($lt -> harga, 0)}}</td>
                <td>{{$lt -> status_pemesanan}}</td>
                <td>
                    <a href="/pesanan/detailPesanan/{{$lt -> id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="/pesanan/statusPesanan/{{$lt -> id}}"class="btn btn-warning btn-circle btn-sm button-edit"><i class="fas fa-edit"></i></a>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>  
  <!-- end table -->

  @endsection