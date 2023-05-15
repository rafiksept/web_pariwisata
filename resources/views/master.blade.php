<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <style>
        .users{
            font-size: 20px;
            margin-left: 5px;
            font-weight: bold;
        }

        .floating-menu {
  position: fixed;
  top: 60px;
  right: 10px;
  z-index: 9999;
  display: none;
}

.floating-menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.floating-menu li {
  margin: 10px 0;
}

.floating-menu a {
  display: block;
  padding: 5px;
  background-color: #fff;
  text-decoration: none;
  color: #333;
}

.floating-menu a:hover {
  background-color: #f2f2f2;
}

.floating-menu.show {
  display: block;
}

.floating-menu .card{
    width: 150px;
    height: 100%;
    padding: 0px 10px ;
}

.floating-menu .card li{
    border: none;
}
    </style>
    @yield('css')
</head>
<body>
        <!--Navbar-->
        <nav class="navbar fixed-top navbar-expand-lg bg-transparent">
          <div class="container">
              <a class="navbar-brand text-white" href="#">Pariwisata Grobogan</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse flex-row-reverse bd-highlight" id="navbarNav">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active text-white" aria-current="page" href="/tempat-wisata">Tempat Wisata</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active text-white" aria-current="page" href="/kebudayaan">Event</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active text-white" aria-current="page" href="/promo">Promo</a>
                      </li>
                      <li class="nav-item d-flex">

                          <div class="md-4 justify-content-between  align-self-center ">
                              {{-- <button type="button" class="btn btn-warning">Masuk</button>
                              <button type="button" class="btn btn-warning">Register</button> --}}
                              @if (Auth::check())
                                    <span class="users text-white">Hi, {{ Auth::user()->name }}!</span>
                            @else 
                            <button type="button" class="btn btn-warning masuk"><a href="/login">Masuk</a></button>
                              <button type="button" class="btn btn-warning masuk"><a href="/register">Register</a></button>
                              @endif
                              
                              </div>
                          </div>
                      </li>
                  </ul>
  
              </div>
          </div>
      </nav>

      <div class="floating-menu">
        <div class="card">
            <ul>
              <li><a href="/profile">Profile > </a></li>
              <li><a href="/daftar-tiket">Tiket Kamu ></a></li>
              <li><a href="/logout">Logout ></a></li>
            </ul>

        </div>
      </div>
      <!--Jumbroton-->
      <div class="hero" style="background-image: url('{{asset("image/kalibiru2.jpg")}}')">
          <div class="gambar-hitam">
            <div class="title-jumbotron w-100 h-100">
                <h1 class="text-white">Selamat Datang di <span class="text-warning">Grobogan</span> </h1>
                <p class="text-white">Halo! Selamat datang di website pariwisata Grobogan, Eksplor lebih lanjut terkait pariwisata grobogan</p>
            </div>
          </div>
      </div>
          <!--Garis Pembatas-->

          <div class="kotak-2">
            <li class="container page-item" style="list-style: none; padding: 5px;"><a href="">Home</a> ></li>
          </div>
           
  

  <!--card-->

  @yield('content')

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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/home.js') }}"> </script>
</html>