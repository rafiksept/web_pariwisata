<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link href="{{ asset('css/chatbot.css') }}" rel="stylesheet">
    
    <title>Testing chat bot</title>
</head>
<body>
    <div class="container p-3">
        <div class="card chat-card rounded">
            <div class="head-chat bg-warning w-100 py-1 d-flex justify-content-center">
                <span>Chat Bantuan</span>
            </div>
            <div class="card-body body-chat">
                <div class="room-chat">
                    <div class="chat-admin pt-2">
                        <div class="speech-bubble">
                            <span class="py-1 pertanyaan-pertama">Pilih pertanyaan di bawah ini agar kami dapat membantu mu!</span>
                            <div class="pertanyaan w-100 py-1" id="8" name = "grobogan"><span class="text-primary">Pertanyaan terkait grobogan?</span></div>
                            <div class="pertanyaan w-100 py-1" id="9" name ="tiket"><span class="text-primary">Pertanyaan terkait tiket?</span></div>
                            <div class="pertanyaan w-100 py-1" id="10" name = "tempat wisata"><span class="text-primary">Pertanyaan terkait tempat wisata?</span></div>
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
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/chatBot.js') }}"> </script>
</html>