<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <div class="title-content">
            <h1>Tempat Wisata <span>#Grobogan</span></h1>
            <p>Cari tempat wisata yang menarik dan pesan tiket!</p>
        </div>
        <div class="card-content d-flex flex-wrap justify-content-center">
            @foreach ($tourist_attractions as $tourist_attraction)
                <div class="card m-2 border-0 card-item" style="background-image: url('{{ asset('storage/'.$tourist_attraction -> image_post) }}'); ">
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
                                  <a href="#" class="btn btn-primary check-detail">Check Detail &#62;</a>
                                </div>
                                
                            </div>
                        </div>
                     </div>
                    {{-- <img src="{{ asset('storage/'.$tourist_attraction -> image_post) }}" class="card-img-top" alt="..."> --}}
                    
                  </div>
            @endforeach
        </div>
        {{ $tourist_attractions->links()}}
        

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>