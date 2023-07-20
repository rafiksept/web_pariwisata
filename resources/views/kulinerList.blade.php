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
<style>
    .pagination {
    margin-top: 20px;
    text-align: center;
}

.pagination a, .pagination span {
    display: inline-block;
    padding: 8px 12px;
    margin-right: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    text-decoration: none;
    color: #333;
}

.pagination a:hover {
    background-color: #f5f5f5;
}

.pagination .current {
    background-color: #337ab7;
    color: #fff;
    border-color: #337ab7;
}

</style>
@endsection

 
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
 
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
                          <a href="/kuliner/{{$kuliner -> id}}" class="btn btn-primary check-detail ">Cek Kuliner &#62;</a>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        @endforeach
      </div>
      <div class="pagination-links">
        {{ $kuliners->links("paginate") }}
    </div>
</div>
<div class="kotak"></div>
<!--Page-->
 
@endsection