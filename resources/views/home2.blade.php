<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parawisata Grobongan</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="#">Pariwisata Grobongan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row-reverse bd-highlight" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">Beli Tiket</a>
                    </li>
                    <div class="md-4 justify-content-between">
                        <button type="button" class="btn btn-warning">Masuk</button>
                        <button type="button" class="btn btn-warning">Register</button>
                    </div>
                </ul>

            </div>

        </div>
    </nav>
    <!--Jumbroton-->
    <div class="hero d-flex align-items-center" style="background-image: url('{{asset("image/pantai.jpg")}}')">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-white">Pariwisata<br>Grobongan</h1>
                    <button type="button" class="btn btn-primary">Join With Us</button>
                    <button type="button" class="btn btn-primary">About Us</button>
                </div>
            </div>
        </div>
    </div>

    <!--Garis Pembatas-->
    <div class="kotak-2">
        <li class="container page-item" style="list-style: none; padding: 5px;">Home > <a class="" href="#">  Home</a></li>
    </div>
    
    <div class="kotak"></div>
    <!--card-->

    <div class="container tourist-attraction">
        <div class="title-content">
            <h4>Tempat Wisata <span class="text-warning">#Grobogan</span></h4>
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
                              <a href="#" class="btn btn-primary check-detail btn-warning">Check Detail &#62;</a>
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



    <!--Fooster-->

    <footer class="bg-dark text-white pt-5">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left mb-5">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Pariwisata Grobongan</h5>
                    <p>Pariwisata Grobongan menyajikan wisata budaya yang berada di kebupaten Grobongan, disini kami menyediakan kemudahan untuk memesan tiket masuk wisata budaya kami</p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Kuliner</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Budaya</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Wisata</a>
                    </p>

                </div>
                <div class="col-md-3 col-lg-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">What's Happen</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Promo</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Event</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Tiket</a>
                    </p>
                </div>
                 <div class="col-md-3 col-lg-2 mx-auto mt-3">
                     <h5 class="text-uppercase mb-4 height-3 font-weight-bold text-warning">Userful Links</h5>
                  <p>
                      <a href="#" class="text-white" style="text-decoration: none;"><img src="house-door.svg" alt="">&ensp;Jln.Bnadung</a>
                  </p>
                  <p>
                      <a href="#" class="text-white" style="text-decoration: none;"><img src="telephone-fill.svg">&ensp;+62 878 878 878</a>
                  </p>
                 
                 </div>

            </div>
            <div class="row mt-5">
                <p>Copyright @2023 All Right reserved by:
                    <a href="#" style="text-decoration: none;">
                    <strong class="text-warning">PT. Pariwisata Grobongan</strong></a>
                </p>
             </div>
        </div>
        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>