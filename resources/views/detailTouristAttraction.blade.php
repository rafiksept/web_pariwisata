@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title')
    {{$tourist_attractions -> name}}
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
                <h1 class="">{{$tourist_attractions -> name}}</h1>
                <div class="informasi-title d-flex flex-row mt-3 mb-4 flex-wrap">
                    <div class="informasi-item jenis py-1 px-3">
                        <p>Tempat Wisata</p>
                    </div>
                    <div class="informasi-item ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill information-picture" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                          </svg>
                          <p>{{ $tourist_attractions -> location }}</p>
                    </div>
                    <div class="informasi-item ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill information-picture" viewBox="0 0 16 16">
                            <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
                          </svg>
                          <p>Rp. {{ $tourist_attractions -> ticket }}</p>
                    </div>
                </div>
            </div>

            <div class="gambar-wisata mt-3 w-100" style=" display:flex;align-items:center;justify-content: center;">
                <img src='{{ asset('storage/'.$tourist_attractions -> image_post) }}' alt="{{$tourist_attractions -> name}}" class = " rounded" style="height:500px; width:900px;">
            </div>

            <div class="informasi-singkat mt-5">
                <h2 class="mb-4">Location</h2>
                <div class="detail-lengkap">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q={{$tourist_attractions -> name}}&t=&z=7&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}</style><a href="https://embedgooglemap.2yu.co/">html embed google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div></div>
                </div>
                
            </div>
            <div class="informasi-singkat mt-5">
                <h2 class="mb-4">Detail Pariwisata</h2>
                <div class="detail-lengkap">
                    {!! html_entity_decode($tourist_attractions->description) !!}
                </div>
                
            </div>

            <div class="pesan-ticket border-top d-flex flex-row py-3 justify-content-between flex-wrap">
                
                
                <div class="input-tiket d-flex flex-row">
                    <div class="detail-pengunjung" style="margin-right: 10px">
                        <h5>Jumlah Pengunjung</h5>
                        <div class="pax d-flex flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people information-picture" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                              </svg>
                            <button class="decrement-button">-</button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="5">
                            
                            
                            <button class="increment-button">+</button>
                        </div>
                    </div>
                </div>
                
                <div class="tombol d-flex justify-content py-3">
                    <button type="submit" class="tombol-pembayaran"><a id="tombol-ticket">Pesan Tiket</a></button>
                </div>
            </div>
        </div>
     </div>

     <script>
        function decreaseValue() {
          var value = parseInt(document.getElementById('quantity').value, 10);
          value = isNaN(value) ? 1 : value;
          value--;
          if (value < 1) {
            value = 1;
          }
          document.getElementById('quantity').value = value;
          
         var linkTombol = "http://" + window.location.hostname + (window.location.port ? ':' + window.location.port : '') + "/"+ "pesan-tiket" + "/" + {{$tourist_attractions -> id}} + "/" + document.getElementById('quantity').value;
         document.getElementById('tombol-ticket').setAttribute("href",linkTombol)
        }
        
        function increaseValue() {
          var value = parseInt(document.getElementById('quantity').value, 10);
          value = isNaN(value) ? 1 : value;
          value++;
          if (value > 5) {
            value = 5;
          }
          document.getElementById('quantity').value = value;

          
         var linkTombol = "http://" + window.location.hostname + (window.location.port ? ':' + window.location.port : '') + "/"+ "pesan-tiket" + "/" + {{$tourist_attractions -> id}} + "/" + document.getElementById('quantity').value;
         document.getElementById('tombol-ticket').setAttribute("href",linkTombol)
        }
        
        document.querySelector('.decrement-button').addEventListener('click', decreaseValue);
        document.querySelector('.increment-button').addEventListener('click', increaseValue);

        

         var linkTombol = "http://" + window.location.hostname + (window.location.port ? ':' + window.location.port : '') + "/"+ "pesan-tiket" + "/" + {{$tourist_attractions -> id}} + "/" + document.getElementById('quantity').value ;
         document.getElementById('tombol-ticket').setAttribute("href",linkTombol)

        
        

        

        

        
        </script>
        
        
        
 @endsection