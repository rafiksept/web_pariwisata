@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title')
    Tempat Wisata Grobogan
@endsection
@section('css')
<link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
<link href="{{ asset('css/style1.css') }}" rel="stylesheet">
<link href="{{ asset('css/promo.css') }}" rel="stylesheet">
@endsection
 
 
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
<div class="tombol d-flex">
    <a href="/promo" class="text-warning">&#8592; Kembali</a>
</div>
<div class="container-promo d-flex flex-column justify-content-center align-items-center">
    <h2 class="title-promo">{{$promos[0] -> name}}</h2>
    <div class="card-content d-flex flex-wrap justify-content-center">
       <div class="card card-home m-2 border-0 card-item" style="background-image: url('{{ asset('storage/'.$tourist_attraction_promos[0] ->image_post) }}'); ">
           <div class="mask h-100 rounded " style="background-image: linear-gradient(to right, #E4801A,#e47f1a3f, rgba(255, 0, 0, 0)">
               <div class="h-100">
                   <div class="card-body px-3 py-4 d-flex justify-content-end flex-column h-100  " >
                       <h5 class="card-title judul-wisata " style = "font-size:35px; width:140px;">PROMO {{$promos[0] -> diskon}}%</h5>
                       {{-- <p class="card-text text-thumbnail">{!! \Illuminate\Support\Str::limit($event -> definition, 100, $end='...') !!}</p> --}}
                       <div class="information">
                         <div class="location information-content">
                             {{-- <img src="{{asset('image/lokasi.png')}}"  alt="lokasi" class="information-picture"> --}}
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill information-picture" viewBox="0 0 16 16">
                               <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                             </svg>
                             <p>{{ $tourist_attraction_promos[0]->name}}</p>
                         </div>
                       </div>
                   </div>
               </div>
           </div>
           {{-- <img src="{{ asset('storage/'.$event -> image_post) }}" class="card-img-top" alt="..."> --}}
           
       </div>
     </div>
     <div class="detail-promo">
       <h5>Description</h5>
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem labore deleniti similique dolores saepe, numquam, ea, fugiat soluta ratione commodi pariatur animi ex. Harum omnis, eius quo quae deleniti provident.</p>
       <p>Location : {{$tourist_attraction_promos[0]->name}}</p>
       <p>Minimal tiket : {{$promos[0] -> minimal_promo}}</p>
       <p>expired date : {{$promos[0] -> expired}}</p>
     </div>
     <div class="kupon d-flex flex-column justify-content-center align-items-center">
        <h5>&#128317; &#128317; &#128317; Dapatkan Kupon Mu &#128317; &#128317; &#128317;</h5>
        <div class="card">
            <h6>{{$promos[0] -> name}}</h6>
            <div class="kode-promo">
                <input type="text" id="text-to-copy" value = "{{$promos[0] -> kode_promo}}" style = "width:80%;" disabled>
                <button onclick="copyToClipboard()" class="text-primary">Copy</button>
            </div>
            <p id="copy-success"></p>
            <p>This coupon is only valid while stock lasts</p>
        </div>
     </div>
   <div class="kotak"></div>
</div>
<script>
    function copyToClipboard() {
        var text = document.getElementById("text-to-copy").value;
        navigator.clipboard.writeText(text)
        var copySuccess = document.getElementById("copy-success");
		copySuccess.innerHTML = "Teks telah disalin: " + text;
    }
</script>
<!--Page-->
 
@endsection