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
      <h4><span class="emoticon">&#127926;</span> Kebudayaan <span class="text-primary">#Grobogan</span></h4>
        <p class="home">Eksplorasi Kebudayaan Grobogan Lebih Lanjut!</p>
    </div>
    <div class="card-content d-flex flex-wrap">
        @foreach ( $events as $event)
        <div class="card card-home m-2 border-0 card-item" style="background-image: url('{{ asset('storage/'.$event -> image_post) }}'); ">
            <div class="mask h-100 rounded " style="background-color: rgba(0, 0, 0, 0.3);">
                <div class="h-100">
                    <div class="card-body px-3 py-4 d-flex justify-content-end flex-column h-100  " >
                        <h5 class="card-title judul-wisata" >{{ $event -> name }}</h5>
                        {{-- <p class="card-text text-thumbnail">{!! \Illuminate\Support\Str::limit($tourist_attraction -> definition, 100, $end='...') !!}</p> --}}
                        <div class="information">
                          <div class="location information-content">
                              {{-- <img src="{{asset('image/lokasi.png')}}"  alt="lokasi" class="information-picture"> --}}
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill information-picture" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                              </svg>
                              <p>{{ $event -> location }}</p>
                          </div>
                        </div>
                        <div class="button-detail">
                          <a href="{{route('detailEvent',['id' => $event -> id])}}" class="btn btn-primary check-detail ">Eksplorasi &#62;</a>
                        </div>
                        
                    </div>
                </div>
             </div>
            {{-- <img src="{{ asset('storage/'.$tourist_attraction -> image_post) }}" class="card-img-top" alt="..."> --}}
            
          </div>
        @endforeach
    </div>
</div>
<div class="kotak"></div>
<!--Page-->
 
@endsection