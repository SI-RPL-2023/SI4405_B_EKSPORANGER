@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->

  <!-- table -->
  <div class="container" style="margin-top: 100px;">
    <div class="col-lg-4">
        <h1 class="fs-4 mb-3" style="font-weight: 600;">Daftar Request</h1>
        <form class="form-inline search-form d-flex justify-content-end" action="" method="get">
            <input class="form-control me-4" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">search</button>
        </form>
    </div>
    <div class="col-lg-12 mb-4 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" tabindex="-1" role="button" style="width: 140px;" onclick="event.preventDefault(); location.href='{{ url('requestBarang') }}';">Buat request</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama produk</th>
                <th scope="col">Kategori</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Status request</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach($daftarRequest as $dr)
                @if($dr -> status_request == 'Sedang dicari' && Auth::check() && Auth::user()->isEksportir())   
                <tr>
                    <td>{{$dr -> nama_produk}}</td>
                    <td>{{$dr -> kategori}}</td>
                    <td>{{$dr -> jumlah}}</td>
                    <td>{{$dr -> status_request}}</td>
                    <td>
                        <a href="/detailRequest/{{$dr -> id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=6288224923407&text=Permisi, saya ingin memberikan sample yang saya miliki untuk barang yang mas request" class="btn btn-success btn-circle btn-sm"><i class="fas fa-phone"></i>
                        </a>
                    </td> 
                </tr>
                @endif
                @if(Auth::check() && Auth::user()->isImportir())  
                <tr>
                    <td>{{$dr -> nama_produk}}</td>
                    <td>{{$dr -> kategori}}</td>
                    <td>{{$dr -> jumlah}}</td>
                    <td>{{$dr -> status_request}}</td>
                    <td>
                        <a href="/detailRequest/{{$dr -> id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="/updateRequest/{{$dr -> id}}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                    </td> 
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
  </div>  
  <!-- end table -->

  @endsection