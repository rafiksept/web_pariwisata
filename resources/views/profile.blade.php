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
                    

                <form action="{{route('actionUpdateProfile')}}" method="post">
                    @csrf
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" name = "email" value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name = "name" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pertama</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name = "first_name" value="{{ Auth::user()->first_name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Akhir</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name = "last_name" value="{{ Auth::user()->last_name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name = "phone_number" value="{{ Auth::user()->phone_number }}">
                      </div>
                    </div>
                    <div class="tombol">
                      <button class="btn btn-warning password-button"><a href="/profile/edit-password" class="edit-password">Edit Password</a></button>
                      <button class="btn btn-warning" type="submit">Simpan</button>
                    </div>
                  </form>

            </div>
        </div>
    </div>
@endsection