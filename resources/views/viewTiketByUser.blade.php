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
<style>
    /* Gaya CSS untuk latar belakang transparan */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    /* Gaya CSS untuk kotak konfirmasi */
    .confirmation-box {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    /* Gaya CSS untuk tombol */
    .confirmation-buttons {
      display: flex;
      justify-content: flex-end;
      margin-top: 20px;
    }

    .confirmation-buttons button {
      margin-left: 10px;
    }
  </style>
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
                    <a onclick="showConfirmation(<?= $ticket->id ?>)"><button class="konfirmasi">Hapus</button></a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        
        
    </div>
</div>
<div class="kotak"></div>
 <!-- Kotak konfirmasi tersembunyi -->
 <div id="confirmationBox" class="overlay" style="display: none;">
    <div class="confirmation-box">
      <p>Apakah Anda yakin ingin menghapus?</p>
      <div class="confirmation-buttons">
        <a href="" class="tombol-hapus">
            <button class="btn btn-danger">Ya</button>
        </a>
        <button onclick="hideConfirmation()" class="btn btn-primary">Tidak</button>
      </div>
    </div>
  </div>
<!--Page-->
<script>
    function showConfirmation(id) {
      // Tampilkan kotak konfirmasi
      document.getElementById('confirmationBox').style.display = 'flex';
      var tombolHapus = document.querySelector(".tombol-hapus")
      tombolHapus.setAttribute('href', `/hapus-tiket/${id}`);
    }

    function hideConfirmation() {
      // Sembunyikan kotak konfirmasi
      document.getElementById('confirmationBox').style.display = 'none';
    }
  </script>
@endsection