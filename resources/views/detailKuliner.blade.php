@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title')
    {{$kuliners -> name}}
@endsection

@section('css')
<link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
<link href="{{ asset('css/style1.css') }}" rel="stylesheet">
<link href="{{ asset('css/detailTouristAttraction.css') }}" rel="stylesheet">
@endsection
 
 @section('content')
 <div class="container-wisata w-100 bg-light p-3">
        <div class="content py-4 px-5">
            <div class="title-wisata">
                <h1 class="">{{$kuliners -> name}}</h1>
                <div class="informasi-title d-flex flex-row mt-3 mb-4 flex-wrap">
                    <div class="informasi-item jenis py-1 px-3">
                        <p>Kuliner</p>
                    </div>
                </div>
            </div>
            
            <div class="gambar-wisata mt-3 w-100" style="height: 650px">
                <img src='{{ asset('storage/'.$kuliners -> image_post) }}' alt="{{$kuliners -> name}}" class = "w-100 h-100 rounded">
            </div>

            <div class="informasi-singkat mt-5">
                <h2 class="mb-4">Detail Kuliner</h2>
                <div class="detail-lengkap">
                    {!! html_entity_decode($kuliners->description) !!}
                </div>
                
            </div>
        </div>
     </div>
        
        
 @endsection