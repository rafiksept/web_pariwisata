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
        <div class="box-content mb-5" style="box-sizing: border-box">
            <form action="{{route('createPop',['id' => $tourist_attractions -> id, 'pax' => $pax,'code' => $code])}}" method = "post" enctype="multipart/form-data">
                @csrf
                <div class="bukti-pembayaran">
                    <h3 class="mb-3">Bukti Pembayaran</h3>
                    <div class="card mb-3" style="width: 100%;">
                        <div class="card-body">
                            <div class="title-ta border-bottom">
                                <h5 class="card-title">Kode Bukti Pembayaran : {{$code}}</h5>
                            </div>
                            @if(session()->has('success'))
                            <div class="alert alert-success mt-2">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (session('errors'))
                                <div class="alert alert-danger mt-2">
                                    <ul>
                                        @foreach (session('errors')->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="payment-contact my-1">
                                <h6 class="card-title text-dark">Status Pembayaran:
                                    @if($pop_id[0] -> is_verify)
                                    <i class="text-success"> Lunas </i>
                                    @else
                                    <i class="text-danger"> Belum Bayar </i>
                                    @endif
                                    
                                </h6>
                                <p>Pembayaran Tiket Dapat Dilakukan Melalui:</p>
                            <ul>
                                <li>VA DANA <span class="ml-1">: 3901089505859637</span></li>
                            </ul>
                            </div>
                            @if(!$pop_id[0] -> is_verify)
                            <div class="form-group w-100">
                                <div class="row">
                                    <label class="mb-2">Bukti Pembayaran Pembayaran</label>
                                    <div class="px-2"><input type="file" accept="image/png, image/jpeg" name="image" class="form-control" >
                                    </div>
                                
                                </div>
                        </div>
                             @else
                             <div class="form-group w-100">
                                    
    
              
                        </div>
                            @endif
                            
                            
                                
                            </form>
                        </div>
                    </div>
    
                    <div class="card mb-3" style="width: 100%">

                        <div class="card-body px-7">
                          
                          <div class="price-content d-flex flex-row justify-content-between px-2">
                            
                            <div class="harga-title">
                              <h5>Harga  Tiket</h5>
                            </div>
                            <div class="nominal-harga ">
                              <h4>Rp. {{ $pop_id[0] -> price}}</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                      @if(!$pop_id[0] -> is_verify)
                      <div class="tombol d-flex justify-content-end" style="width: 100%">
                        <button type="submit" class="tombol-pembayaran mb-3 mt-4">Kirim Bukti Pembayaran</button>
                      </div>
                      @endif
                    </div>
            </form>

            
            <h3 class="mb-3">Pesanan Kamu</h3>
            <h6 class = "mb-3">Isilah data mu dengan benar dan pesan tiket!</h6>
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="title-ta border-bottom">
                        <h5 class="card-title">Tempat Wisata</h5>
                    </div>
                  
                  <div class="content-body py-2 d-flex">
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
                                  <p>{{$pax_order[0] -> tanggal_pemesanan}}</p>
                            </div>
                            <div class="ticket-list d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                  </svg>
                                  <p>{{$pax}} Pengunjung</p>
                            </div>
                    </div>
                  </div>
                </div>
            </div>
            <h5 class="mb-3 mt-4">Data Pengunjung</h5>
            
            <div class="card mt-4" style="width: 100%;">
              <div class="card-body px-4 ">
                <div class="title-ta border-bottom py-2">
                      <h5 class="card-title"></h5>
                </div>
                
                <div class="content-body py-3 d-flex">
                      <div class="form-group w-100">
                          <label for="exampleInputEmail1" class="mb-2">Nama Lengkap</label>
                          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" value="{{$pax_order[0] -> name}}" disabled>
                          <small class="form-text ml-1">(without title and punctuation)</small>
                          <div class="row mt-4">
                              <div class="col">
                                <label for="exampleInputEmail1"  class="mb-2">Nomor Telepon</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Masukkan No Hp Aktif" value="{{$pax_order[0] -> phone_number}}" disabled>
                                <small class="form-text ml-1">(e.g. +62812345678, for Country Code (+62) and Mobile No. 0812345678</small>
                              </div>
                              <div class="col">
                                  <label for="exampleInputEmail1" class="mb-2">Email Address</label>
                                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email Address" value="{{$pax_order[0] -> email}}" disabled>
                                  <small class="form-text ml-1">e.g. email@example.com</small>
                              </div>
                          </div>
                      </div>
                </div>
              </div>
            </div>
     
            @if (!$pop_id[0] -> is_verify)
            <div class="tombol d-flex justify-content-end" style="width: 100%">
                <a href="{{route('editTiket',['id' => $tourist_attractions -> id, 'pax' => $pax, 'code' => $code ])}}">
                    <button type="submit" class="tombol-pembayaran mb-3 mt-4">Edit Data</button>
                </a>
              
            </div>
            @endif

           
          
        </div>
    </div>
</div>
@endsection
