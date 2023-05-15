<!-- Menghubungkan dengan view template master -->
@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title')
    Tempat Wisata Grobogan
@endsection
@section('css')
<link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
<link href="{{ asset('css/viewTiketByUser.css') }}" rel="stylesheet">
<link href="{{ asset('css/style1.css') }}" rel="stylesheet">
@endsection

 
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
 
<div class="container tourist-attraction">
    <div class="title-content">
        <h4>Daftar Tiket Mu!</h4>
        <p class="home">Kunjungi tempat wisata dan pastikan sudah memesan tiket!</p>
    </div>
    <div class="card-content d-flex flex-wrap ">
        @if ($tickets)
        @foreach ($tickets as $ticket)
        <div class="card card-tiket">
            <div class="detail-tiket">

                <div class="list-detail date">
                    <p  class="penjelasan">Tanggal</p>
                    <p class="isi">{{$ticket -> tanggal_pemesanan}}</p>
                </div>
                <div class="list-detail location">
                    <p  class="penjelasan">Lokasi</p>
                    <p class="isi">{{$ticket ->touristAttraction-> name}}</p>
                </div>
                <div class="list-detail status">
                    <p  class="penjelasan">Status</p>
                    @if ($ticket ->proofOfPayment-> is_verify ==  1)
                    <p class="isi">Lunas</p>
                    @else
                    <p class="isi">Belum Bayar</p>
                    @endif
                    
                </div>
            </div>
            <div class="location-tiket">
                <div class="nama mb-2">
                    <p class="penjelasan">Kode Tiket</p>
                    <p class="isi">{{$ticket -> uuid}}</p>
                </div>
                <div class="nama">
                    <p class="penjelasan">Nama</p>
                    <p class="isi">{{$ticket -> name}}</p>
                </div>
                <div class="lebih-detail">
                    <a href="{{route('detailTicket',[
                        'id' => $ticket ->touristAttraction-> id,
                        'pax' => $ticket -> pax, 
                        'code' => $ticket -> proofOfPayment -> uuid
                        ])}}"><button class="">Detail</button></a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        
        
    </div>
</div>
<div class="kotak"></div>
<!--Page-->
 
@endsection