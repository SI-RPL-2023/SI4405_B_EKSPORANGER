@extends('layout.master')
@section('content')
 <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-6 d-none d-xl-block" style="margin-left: -12px;">
                <img src="{{url ('/assets/img/login.jpg')}}" alt="gambar login" width="588px" height="647px">
            </div>
            <div class="col-xl-4 mt-4">
                <h1 class="fw-bold mb-4">Login</h1>
                @if(Session::has('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password"> <b>Kata Sandi</b></label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Kata Sandi Anda">
                    </div>

                    <div class="mb-3">
                        <input type="checkbox" name="remember" id="remember">                
                        <label for="remember">Remember Me</label>
                    </div>
                     <button type="submit" class="btn btn-dark" tabindex="-1" role="button" style="width: 140px;">Login</button>
                    <h6 class="forRegister fw-normal mt-3 text-dark fs-5">Anda belum punya akun? <a href="/signin" style="text-decoration: none;">Daftar</a></h6>
                </form>
            </div>
        </div>
</div>
@endsection