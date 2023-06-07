@extends('layout.master')
@section('content')

<div class="container px-5 py-5 mt-5 align-items-center">
        <div class="row align-items-center">
            <div class="col-sm">
            <img src="{{url ('/assets/img/signin.jpg')}}" alt="gambar login" width="500px" height="500px">    
            </div>
            <div class="col-sm">
                <h1 class="fw-bold mb-4">Create your account</h1>
                @if(Session::has('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="email"> <b>Email</b></label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat E-mail" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama"> <b>Nama</b></label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Masukan Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp"> <b>Nomor Handphone</b></label>
                        <input type="text" class="form-control" id="no_hp" name="phone_number" placeholder="Masukkan Nomor Handphone" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp"> <b>Alamat</b></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Masukkan alamat lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="password"> <b>Kata Sandi</b></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi Anda" required>

                    </div>
                    <div class="mb-3">
                        <label for="password2"> <b>Komfirmasi Kata Sandi</b></label>
                        <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="Konfirmasi Kata Sandi Anda" required> 
                    </div>
                    <div class="">
                        <label class="form-label mb-3" for="nohp">Daftar sebagai</label><br>
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="Pengimpor">
                            <label class="form-check-label" for="inlineRadio1">Pengimpor</label>
                        </div>
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="Pengekspor">
                            <label class="form-check-label" for="inlineRadio2">Pengekspor</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" tabindex="-1" role="button" style="width: 140px;">Register</button>
                    <h6 class="forRegister fw-normal mt-3 text-dark fs-5">Anda sudah punya akun? <a href="/login" style="text-decoration: none;">Login</a></h6>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection