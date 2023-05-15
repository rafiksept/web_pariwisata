<!-- Menghubungkan dengan view template master -->
@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title')
    Tempat Wisata Grobogan
@endsection
@section('css')
<link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
<link href="{{ asset('css/style1.css') }}" rel="stylesheet">
@endsection
 
 
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
 
<div class="container tourist-attraction">
    <div class="title-content">
      <h4><span class="emoticon">&#9992; </span>Promo <span style = "color:#E4801A;">#Grobogan</span></h4>
      <p class="home">Eksplorasi Promo dan Dapatkan Diskon Menarik! </p>
    </div>
    <div class="card-content d-flex flex-wrap justify-content-between">
      @foreach ( $promos as $promo)
      <div class="card card-home m-2 border-0 card-item" style="background-image: url('{{ asset('storage/'.$tourist_attraction_promos[ $loop->iteration  - 1] ->touristAttraction-> image_post) }}'); ">
          <div class="mask h-100 rounded " style="background-image: linear-gradient(to right, #E4801A,#e47f1a3f, rgba(255, 0, 0, 0)">
              <div class="h-100">
                  <div class="card-body px-3 py-4 d-flex justify-content-end flex-column h-100  " >
                      <h5 class="card-title judul-wisata " style = "font-size:35px; width:140px;">PROMO {{$promo -> diskon}}%</h5>
                      {{-- <p class="card-text text-thumbnail">{!! \Illuminate\Support\Str::limit($event -> definition, 100, $end='...') !!}</p> --}}
                      <div class="information">
                        <div class="location information-content">
                            {{-- <img src="{{asset('image/lokasi.png')}}"  alt="lokasi" class="information-picture"> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill information-picture" viewBox="0 0 16 16">
                              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p>{{ $tourist_attraction_promos[ $loop->iteration  - 1] ->touristAttraction->name}}</p>
                        </div>
                      </div>
                      <div class="button-detail">
                        <a href="/promo/{{$promo -> id}}" class="btn btn-primary check-detail ">Cek Promo &#62;</a>
                      </div>
                  </div>
              </div>
          </div>
          {{-- <img src="{{ asset('storage/'.$event -> image_post) }}" class="card-img-top" alt="..."> --}}
          
      </div>
      @endforeach
    </div>
  </div>
<div class="kotak"></div>
<!--Page-->
 
@endsection