@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->

@section('title')
    Profile
@endsection
@section('css')
<link href="{{ asset('css/profilePage.css') }}" rel="stylesheet">
<link href="{{ asset('css/touristAttractionPage.css') }}" rel="stylesheet">
<link href="{{ asset('css/style1.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-profile">
        <div class="profile">
            <div class="card">
                <div class="judul">
                    <h5 class="text-warning">Personal information</h5>
                    <p>Update Profile dan Simpan</p>
                </div>

                @if(session('message'))
                    <div class="success-message">
                        {{session('message')}}
                    </div>
                    @endif
                    <ul>
                        @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <li class="item-error">
                            <p class="error-message">{{ $error }}</p>

                        </li>
                        @endforeach
                    @endif
                    </ul>
                    

                <form action="{{route('actionEditPassword')}}" method="post">
                    @csrf
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Password Sekarang</label>
                      <div class="col-sm-10">
                        <input type="password"  class="form-control" name = "password_sekarang" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Password Baru</label>
                      <div class="col-sm-10">
                        <input type="password"  class="form-control" name = "password" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                      <div class="col-sm-10">
                        <input type="password"  class="form-control" name = "password_verify" value="">
                      </div>
                    </div>
                    <div class="tombol">
                        <button class="btn btn-warning password-button"><a href="/profile/" class="edit-password">Batal</a></button>
                        <button class="btn btn-warning" type="submit">Simpan</button>
                      </div>
                  </form>

            </div>
        </div>
    </div>
@endsection