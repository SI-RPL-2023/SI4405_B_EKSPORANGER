@extends('layout.master')
  @section('content')
   

<!-- navbar -->
  <div class="container mt-4">
    @include('parts.navbar')
  </div>
<!-- end  navbar -->

    <!-- notif sukses -->
    <div class="container mt-5">
        <center>
            <img src="{{url('assets/img/sukses_checkout.png')}}" alt="" style="margin-top: 150px;">
            <h1 class="fw-bold mt-3" style="font-size: 24px">
                Pesanan berhasil dibuat
            </h1>
            <p class="fw-light mt-2" style="width:400px;">
               Mohon menunggu konfirmasi lebih lanjut dari kami selama 1 x 24 jam.
            </p>
           <button class="btn btn-primary mt-3" onclick="event.preventDefault(); location.href='{{ url('/') }}';">Kembali ke home</button>
        </center>
    </div>
    <!-- end notif sukses -->

    <!-- footer -->
    <footer>
        @include('parts.footer')
    </footer>
    <!-- end footer -->
@endsection
