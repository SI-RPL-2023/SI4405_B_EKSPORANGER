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
        <h1 class="fs-4 mb-3" style="font-weight: 600;">Pesanan sedang di pick up</h1>
        <form class="form-inline search-form d-flex justify-content-end" action="" method="get">
            <input class="form-control me-4" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">search</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama produk</th>
                <th scope="col">alamat penjemputan</th>
                <th scope="col">waktu penjemputan</th>
                <th scope="col">tanggal penjemputan</th>
                <th scope="col">Status pickup</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">   
            @foreach($daftarPickup as $dp)
              @if($dp -> status_pickup == 'Barang disetujui untuk di pick up')
                <tr>
                    <td>{{$dp -> nama_produk}}</td>
                    <td>{{$dp -> alamat_penjemputan}}</td>
                    <td>{{$dp -> waktu_penjemputan}}</td>
                    <td>{{$dp -> tanggal_penjemputan}}</td>
                    <td>{{$dp -> status_pickup}}</td>
                </tr>
              @endif
            @endforeach
        </tbody>
    </table>
  </div>  
  <!-- end table -->

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Proses pencairan dana</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="assets/img/check.png" alt="">
        <h1 class="fw-bold text-capitalize fs-4 mt-3">Proses pencairan dana mu <br> sedang di proses</h1>
        <p class="fw-light text-capitalize fs-6 mt-4">Mohon menunggu 3 x 24 Jam hari kerja untuk proses pencairan dana mu</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  @endsection