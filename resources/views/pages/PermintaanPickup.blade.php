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
        <h1 class="fs-4 mb-3" style="font-weight: 600;">Permintaan Pickup</h1>
        <form class="form-inline search-form d-flex justify-content-end" action="" method="get">
            <input class="form-control me-4" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">search</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama Toko</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Waktu Penjemputan</th>
                <th scope="col">Tanggal Penjemputan</th>
                <th scope="col">Detail Produk</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">   
            @foreach($permintaanpickup as $ppu)
            <tr>
                <td>{{$ppu -> nama_toko}}</td>
                <td>{{$ppu -> nama_produk}}</td>
                <td>{{$ppu -> waktu_penjemputan}}</td>
                <td>{{$ppu -> tanggal_penjemputan}}</td>
                <td>{{$ppu -> detail_produk}}</td>
                <td>
                    <a href="/permintaanpickup/detailpermintaan/{{$ppu -> id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="/permintaanpickup/verifikasipermintaan/{{$ppu -> id}}"class="btn btn-warning btn-circle btn-sm button-edit"><i class="fas fa-edit"></i></a>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>  
  <!-- end table -->

  @endsection