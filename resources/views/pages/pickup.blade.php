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
        <h1 class="fs-4 mb-3" style="font-weight: 600;">Pesanan yang diterima</h1>
        <form class="form-inline search-form d-flex justify-content-end" action="" method="get">
            <input class="form-control me-4" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">search</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Barang yang dibeli</th>
                <th scope="col">Nomor handphone</th>
                <th scope="col">Harga barang</th>
                <th scope="col">Status pemesanan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">   
            @foreach($listPickup as $lp)
            <tr>
                <td>{{$lp -> nama_pemesan}}</td>
                <td>{{$lp -> product -> nama_barang}}</td>
                <td>{{$lp -> no_telpon}}</td>
                <td>Rp. {{number_format($lp -> harga, 0)}}</td>
                <td>{{$lp -> status_pemesanan}}</td>
                <td>
                    <a href="/pesanan/detailPesanan/{{$lp -> id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="/requestPickup/{{$lp -> id}}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-truck-pickup"></i></a>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>  
  <!-- end table -->

  @endsection