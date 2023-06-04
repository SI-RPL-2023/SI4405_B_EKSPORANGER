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
        <h5 class="card-header text-dark">Ubah status request</h5>
            <div class="card-body">
                <form class="row g-3" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label fst-normal text-dark">Status request</label>
                        <select class="form-select" aria-label="Default select example" name="status_request">
                            <option selected>Open this select menu</option>
                            <option value="Sedang dicari" @if($updateStatus -> status_request == "Sedang dicari") selected @endif>Sedang dicari</option>
                            <option value="Eksportir sudah ditemukan" @if($updateStatus -> status_request == "Eksportir sudah ditemukan") selected @endif>Eksportir sudah ditemukan</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Ubah status</button>
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