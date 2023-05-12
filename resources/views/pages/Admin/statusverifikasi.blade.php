@extends('layout.master')
@section('content')
  <!-- navbar -->
  <div class="fixed-top" data-scrollto-offset="0">
  @include('parts.navbar')
  </div>
  <!-- end navbar -->
  <div class="container-fluid" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset ('storage/images/'.$statusverifikasi -> foto_barang)}}" alt="gambar login" width="588px" height="487px">
            </div>
            <div class="col-md-5 ms-4 align-self-center">
                <h1 class="fw-bold mb-4">Verifikasi Kelayakan {{$statusverifikasi -> nama_barang}}</h1>
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
                <form method="POST" action="" class="form-input" >
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <select id="verification" class="form-select" name="status_kelayakan">
                            <option disabled selected value="">pilih status konfirmasi</option>
                            <option value="Menunggu konfirmasi" @if($statusverifikasi -> status_kelayakan == "Menunggu konfirmasi") selected @endif>Menunggu Konfirmasi</option>
                            <option value="Disetujui" @if($statusverifikasi -> status_kelayakan == "Disetujui") selected @endif>Disetujui</option>
                            <option value="Ditolak" @if($statusverifikasi -> status_kelayakan == "Ditolak") selected @endif>Ditolak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-dark">Konfirmasi</button>
                    </div>
                  </form>               
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        @include('parts.footer')
    </footer>
    <!-- end footer -->
  @endsection