@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->

@section('title')
    Home
@endsection
@section('css')
<link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
<link href="{{ asset('css/addTicket.css') }}" rel="stylesheet">
<link href="{{ asset('css/style1.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-ticket bg-light  d-flex justify-content-center h-100">
  <div class="content-ticket bg-light pt-5">
      <div class="box-content " style="box-sizing: border-box">
        @if ($edited)
        <form class="w-100" action="{{route('actionEditTiket',['id' => $tourist_attractions -> id, 'pax' => $pax, 'code' => $code])}}" method="POST">
        @else
        <form class="w-100" action="{{route('createOrder',['id' => $tourist_attractions -> id, 'pax' => $pax])}}" method="POST">
        @endif
        

          @csrf
          <h3 class="mb-3">Pesanan Kamu</h3>
          <h6 class = "mb-3">Isilah data mu dengan benar dan pesan tiket!</h6>
          <div class="card" style="width: 100%;">
              <div class="card-body">
                  <div class="title-ta border-bottom">
                      <h5 class="card-title">Tempat Wisata</h5>
                  </div>
                
                <div class="content-body py-2 d-flex flex-wrap">
                  <div class="attraction-picture">
                      <img class="picture-detail rounded" src="{{asset('storage/'. $tourist_attractions -> image_post) }}" alt="attraction">
                  </div>
                  <div class="attraction-detail mx-3">
                      <p class="text-dark font-weight-normal mb-3">{{ $tourist_attractions -> name }}</p>
                      <div class="detail-ticket">
                          <div class="ticket-list d-flex m-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar-week " viewBox="0 0 16 16">
                                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                                @if ($edited)
                                <p>{{$pax_order[0] -> tanggal_pemesanan}}</p>
                                
                                @else
                                <p><input type="date" name ="tanggal-pemesanan" class="tanggal-pemesanan"></p>
                                @endif
                               
                          </div>
                          <div class="ticket-list d-flex">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                </svg>
                                <p>{{$pax}} Pengunjung</p>
                          </div>
                          <div class="ticket-list d-flex">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                                <p>089672735548 (Contact Person) </p>
                          </div>
                      </div>
                      <h6 class=""><a href="" class="text-decoration-none text-primary">View Details</a></h6>
                  </div>
                </div>
              </div>
          </div>
          @if($errors->any())
              <div class="alert alert-danger mt-4">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <h5 class="mb-3 mt-4">Data Pengunjung</h5>
          @if ($edited)
          @for ($i = 1; $i <= $pax ; $i++)
          <div class="card mt-4" style="width: 100%;">
            <div class="card-body px-4 ">
              <div class="title-ta border-bottom py-2">
                    <h5 class="card-title">Pax {{$i}}</h5>
              </div>
              
              <div class="content-body py-3 d-flex">
                    <div class="form-group w-100">
                        <label for="exampleInputEmail1" class="mb-2">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name[{{$i-1}}]" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" value = "{{$pax_order[$i-1] -> name}}">
                        <small class="form-text ml-1">(without title and punctuation)</small>
                        <div class="row mt-4">
                            <div class="col">
                              <label for="exampleInputEmail1"  class="mb-2">Nomor Telepon</label>
                              <input type="text" class="form-control" name="phone_number[{{$i-1}}]" placeholder="Masukkan No Hp Aktif" value = "{{$pax_order[$i-1] -> phone_number}}">
                              <small class="form-text ml-1">(e.g. +62812345678, for Country Code (+62) and Mobile No. 0812345678</small>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="mb-2">Email Address</label>
                                <input type="email" class="form-control" name="email[{{$i-1}}]" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email Address" value = "{{$pax_order[$i-1] -> email}}">
                                <small class="form-text ml-1">e.g. email@example.com</small>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
          @endfor
          @else
          @for ($i = 1; $i <= $pax ; $i++)
          <div class="card mt-4" style="width: 100%;">
            <div class="card-body px-4 ">
              <div class="title-ta border-bottom py-2">
                    <h5 class="card-title">Pax {{$i}}</h5>
              </div>
              
              <div class="content-body py-3 d-flex">
                    <div class="form-group w-100">
                        <label for="exampleInputEmail1" class="mb-2">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name[]" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap">
                        <small class="form-text ml-1">(without title and punctuation)</small>
                        <div class="row mt-4">
                            <div class="col">
                              <label for="exampleInputEmail1"  class="mb-2">Nomor Telepon</label>
                              <input type="text" class="form-control" name="phone_number[]" placeholder="Masukkan No Hp Aktif">
                              <small class="form-text ml-1">(e.g. +62812345678, for Country Code (+62) and Mobile No. 0812345678</small>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="mb-2">Email Address</label>
                                <input type="email" class="form-control" name="email[]" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email Address">
                                <small class="form-text ml-1">e.g. email@example.com</small>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
          @endfor
              
          @endif

          <h5 class="mb-3 mt-4">Total Harga</h5>
          <div class="card " style="width: 100%">
            <div class="card-body px-7">
              
              <div class="price-content d-flex flex-row justify-content-between px-2">
                
                <div class="harga-title d-flex align-items-center">
                  <h5>Harga  Tiket</h5>
                </div>
                <div class="nominal-harga d-flex flex-row align-items-center ">
            
                  <h4>Rp. {{ $tourist_attractions -> ticket * $pax }}</h4>

                  
                </div>
              </div>
            </div>
          </div>
          <div class="tombol d-flex justify-content-end" style="width: 100%">
            <button type="submit" class="tombol-pembayaran mb-3 mt-4">Lanjut ke Pembayaran</button>
          </div>
         
        </form>
      </div>
  </div>
</div>

<script>
// Fungsi untuk mengatur nilai value dan min dengan tanggal sekarang
function setToday() {
  var today = new Date().toISOString().substr(0, 10);
  document.querySelector(".tanggal-pemesanan").value = today;
  document.querySelector(".tanggal-pemesanan").setAttribute("min", today);
}

// Jalankan fungsi setToday() pada saat halaman dimuat
window.onload = setToday;
</script>
@endsection

