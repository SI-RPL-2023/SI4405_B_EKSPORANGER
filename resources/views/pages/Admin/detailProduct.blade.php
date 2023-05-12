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
        <button type="button" class="btn btn-primary" tabindex="-1" role="button" style="width: 140px;" onclick="event.preventDefault(); location.href='{{ url('verifikasi') }}';">Back</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">Foto Barang</th>
                <th scope="col" class="text-center">Nama Barang</th>
                <th scope="col" class="text-center">Harga Barang</th>
                <th scope="col" class="text-center">Deskripsi Barang</th>
                <th scope="col" class="text-center">Status Kelayakan</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">   
            <tr>
                <td class="align-middle text-center"><img src="{{asset ('storage/images/'.$detailProduct -> foto_barang)}}" alt="" width="200px"></td>
                <td class="align-middle text-center">{{$detailProduct -> nama_barang}}</td>
                <td class="align-middle text-center">Rp. {{number_format($detailProduct -> harga_barang, 0)}}</td>
                <td class="align-middle text-center">{{$detailProduct -> deskripsi_barang}}</td>
                <td class="align-middle text-center">{{$detailProduct -> status_kelayakan}}</td>
                <td class="align-middle text-center">
                    <a href="/verifikasi/VerifikasiProduct/{{$detailProduct -> id}}"class="btn btn-warning btn-circle btn-sm button-edit"><i class="fas fa-edit"></i></a>
                </td> 
            </tr>
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