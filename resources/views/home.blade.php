<!-- Menghubungkan dengan view template master -->
@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->

@section('title')
    Home
@endsection
@section('css')
<link href="{{ asset('css/chatbot.css') }}" rel="stylesheet">
<link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
<link href="{{ asset('css/style1.css') }}" rel="stylesheet">
<style>
  .hero {
    height: 100vh;
  }


</style>
@endsection
 

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
<div class="card chat-card chat-box rounded">
  <div class="head-chat bg-warning w-100 py-1 d-flex justify-content-center chat-header">
      <span>Chat Bantuan</span>
  </div>
  <div class="card-body body-chat chat-body">
      <div class="room-chat">
          <div class="chat-admin pt-2">
              <div class="speech-bubble">
                  <span class="py-1 pertanyaan-pertama">Pilih pertanyaan di bawah ini agar kami dapat membantu mu!</span>
                  <div class="pertanyaan w-100 py-1" id="2" name = "grobogan"><span class="text-primary">Pertanyaan terkait grobogan?</span></div>
                  <div class="pertanyaan w-100 py-1" id="3" name ="tiket"><span class="text-primary">Pertanyaan terkait tiket?</span></div>
                  <div class="pertanyaan w-100 py-1" id="4" name = "tempat wisata"><span class="text-primary">Pertanyaan terkait tempat wisata?</span></div>
                  <div class="clock d-flex justify-content-end"><span></span></div>
              </div>
          </div>
          {{-- <div class="chat-user pt-2">
              <div class="speech-bubble-user">
                  <span class="py-1 pertanyaan-pertama">Apa itu kabupaten grobogan?</span>
              </div>
          </div>
          <div class="chat-admin pt-2">
              <div class="speech-bubble">
                  <div class="jawaban">
                      <p class="py-1">Grobogan adalah salah satu kabupaten yang berada di provinsi Jawa Tengah, Indonesia. Ibu kotanya adalah Kecamatan Purwodadi Kota. Pada Sensus Penduduk Indonesia 2020, penduduk kabupaten Grobogan berjumlah 1.453.526 jiwa, dengan kepadatan penduduk 719 jiwa/km</p>
                  </div>
                  
                  <span class="py-1 pertanyaan-pertama">Pilih pertanyaan di bawah ini agar kami dapat membantu mu!</span>
                  <div class="pertanyaan w-100 py-1 "><span class="text-primary">Apa itu kabupaten grobogan?</span></div>
                  <div class="pertanyaan w-100 py-1 "><span class="text-primary">Bagaimana melihat promo?</span></div>
                  <div class="pertanyaan w-100 terakhir py-1"><span class="text-primary">Bagaimana memesan tiket?</span></div>
                  <div class="clock d-flex justify-content-end"><span>05:59</span></div>
              </div>
              
          </div> --}}
      </div>
  </div>
</div>

<div class="container tourist-attraction">
    <div class="title-content">
        <h4><span class="emoticon">&#127914;</span> Tempat Wisata <span class="text-warning">#Grobogan</span></h4>
        <p class="home">Cari tempat wisata yang menarik dan pesan tiket!</p>
    </div>
    <div class="card-content d-flex flex-wrap justify-content-between">
        @foreach ( $tourist_attractions as $tourist_attraction)
        <div class="card card-home m-2 border-0 card-item" style="background-image: url('{{ asset('storage/'.$tourist_attraction -> image_post) }}'); ">
            <div class="mask h-100 rounded " style="background-color: rgba(0, 0, 0, 0.3);">
                <div class="h-100">
                    <div class="card-body px-3 py-4 d-flex justify-content-end flex-column h-100  " >
                        <h5 class="card-title judul-wisata" >{{ $tourist_attraction -> name }}</h5>
                        {{-- <p class="card-text text-thumbnail">{!! \Illuminate\Support\Str::limit($tourist_attraction -> definition, 100, $end='...') !!}</p> --}}
                        <div class="information">
                          <div class="location information-content">
                              {{-- <img src="{{asset('image/lokasi.png')}}"  alt="lokasi" class="information-picture"> --}}
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill information-picture" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                              </svg>
                              <p>{{ $tourist_attraction -> location }}</p>
                          </div>
                          <div class="ticket information-content">
                              {{-- <img src="{{asset('image/ticket.png')}}" alt="ticket" class="information-picture" > --}}
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill information-picture" viewBox="0 0 16 16">
                                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
                              </svg>
                              <p>Rp. {{ $tourist_attraction -> ticket }}</p>
                          </div>
                        </div>
                        <div class="button-detail">
                          <a href="{{route('detailPariwisata',['id' => $tourist_attraction -> id])}}" class="btn btn-primary check-detail btn-warning">Check Detail &#62;</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- <img src="{{ asset('storage/'.$tourist_attraction -> image_post) }}" class="card-img-top" alt="..."> --}}
        </div>
        @endforeach
    </div>
    <div class="more d-flex justify-content-end"><a href="/tempat-wisata" class="text-warning">Eksplor lebih Lanjut &#62;</a> </div>
</div>
<div class="container tourist-attraction">
  <div class="title-content">
    <h4><span class="emoticon">&#127926;</span> Kebudayaan <span class="text-primary">#Grobogan</span></h4>
    <p class="home">Eksplorasi Kebudayaan Grobogan Lebih Lanjut!</p>
  </div>
  <div class="card-content d-flex flex-wrap justify-content-between">
    @foreach ( $events as $event)
    <div class="card card-home m-2 border-0 card-item" style="background-image: url('{{ asset('storage/'.$event -> image_post) }}'); ">
        <div class="mask h-100 rounded " style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="h-100">
                <div class="card-body px-3 py-4 d-flex justify-content-end flex-column h-100  " >
                    <h5 class="card-title judul-wisata" >{{ $event -> name }}</h5>
                    {{-- <p class="card-text text-thumbnail">{!! \Illuminate\Support\Str::limit($event -> definition, 100, $end='...') !!}</p> --}}
                    
                    <div class="button-detail">
                      <a href="{{route('detailEvent',['id' => $event -> id])}}" class="btn btn-primary check-detail ">Eksplorasi &#62;</a>
                    </div>
                    
                </div>
            </div>
        </div>
        {{-- <img src="{{ asset('storage/'.$event -> image_post) }}" class="card-img-top" alt="..."> --}}
        
    </div>
    @endforeach
  </div>
  <div class="more d-flex justify-content-end">
    <a href="/kebudayaan" class="text-primary">Eksplor lebih Lanjut &#62;</a> 
  </div>
</div>
<div class="container tourist-attraction">
  <div class="title-content">
    <h4><span class="emoticon">&#9992; </span>Kuliner <span style = "color:#E4801A;">#Grobogan</span></h4>
    <p class="home">Eksplorasi Kuliner dan Bagikan Pengalamanmu! </p>
  </div>
  <div class="card-content d-flex flex-wrap justify-content-between">
    @foreach ( $kuliners as $kuliner)
    <div class="card card-home m-2 border-0 card-item" style="background-image: url('{{ asset('storage/'.$kuliner -> image_post) }}'); ">
        <div class="mask h-100 rounded " style="background-image: linear-gradient(to right, #E4801A,#e47f1a3f, rgba(255, 0, 0, 0)">
            <div class="h-100">
                <div class="card-body px-3 py-4 d-flex justify-content-end flex-column h-100  " >
                    <h5 class="card-title judul-wisata " style = "font-size:25px; width:140px;">{{$kuliner -> name}}</h5>
                    <div class="button-detail">
                      <a href="/promo/{{$kuliner -> id}}" class="btn btn-primary check-detail ">Cek Kuliner &#62;</a>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    @endforeach
  </div>
  <div class="more d-flex justify-content-end">
    <a href="/promo" class="text-primary">Eksplor lebih Lanjut &#62;</a> 
  </div>
</div>



<div class="kotak"></div>
<script src="{{ asset('js/chatBot.js') }}"> </script>
<!--Page-->
 
@endsection